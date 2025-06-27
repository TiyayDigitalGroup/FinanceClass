<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use OpenAI\Laravel\Facades\OpenAI;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gratuitos = Course::where('premium', false)->get();
        $premium = Course::where('premium', true)->get();

        return view('pages.cursos.index', compact('gratuitos', 'premium'));
    }

    public function adminIndex()
    {
        $cursos = Course::with('files')->get();
        return view('pages.dashboard.cursos', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'premium' => 'required|boolean',
            'file' => 'required|file|max:10240',
            'file_title' => 'required|string|max:255',
        ]);

        $curso = Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'premium' => $request->premium,
        ]);

        // Simula la lógica de ArchivoController@store internamente
        $archivoController = new ArchivoController();
        $archivoRequest = new Request([
            'title' => $request->file_title,
            'file' => $request->file('file'),
        ]);
        $archivoRequest->files->set('file', $request->file('file'));

        app()->call([$archivoController, 'store'], [
            'request' => $archivoRequest,
            'course' => $curso
        ]);

        return redirect()->route('dashboard.cursos')->with('success', 'Curso y archivo creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $codigo)
    {
        $curso = Course::with('files')->where('code', $codigo)->firstOrFail();
        return view('pages.cursos.curso', compact('curso'));
    }

    public function chat(string $codigo)
    {
        $curso = Course::where('code', $codigo)->firstOrFail();
        return view('pages.cursos.chat', compact('curso'));
    }

    public function responderChat(Request $request, string $codigo)
    {
        $request->validate([
            'pregunta' => 'required|string|max:500',
        ]);

        $curso = Course::where('code', $codigo)->with('files')->firstOrFail();

        if ($curso->files->isEmpty()) {
            return response('Este curso no tiene materiales para contextualizar.', 400);
        }

        $baseUrl = config('app.url');

        try {
            $curso = Course::where('code', $codigo)->firstOrFail();
            $pregunta = $request->input('pregunta');

            $contexto = <<<EOT
        Eres un tutor virtual especializado en el curso "{$curso->title}". Debes responder exclusivamente preguntas relacionadas con el contenido de este curso.
        A continuación, se describen los materiales del curso. Usa esta información como referencia para tus respuestas:
        EOT;

            foreach ($curso->files as $archivo) {
                if (!empty($archivo->transcription)) {
                    $contexto .= <<<EOT
                [Archivo]
                Nombre: {$archivo->original_name}
                Título: {$archivo->title}
                Descripción: {$archivo->transcription}
                EOT;
                }
            }

            $contexto .= <<<EOT
        Instrucciones adicionales para tus respuestas:
        - Considera los títulos de los archivos como el temario del curso.
        - No inicies con saludos, ya hay uno automático antes de tu intervención.
        - No incluyas enlaces externos. Si necesitas mencionar uno, usa solo: "{$baseUrl}/cursos/{$codigo}".
        - Si haces referencia a materiales, menciona su título y sugiere que el usuario lo consulte dentro del curso.
        - Nunca menciones el código interno del curso ("{$codigo}"); usa siempre el nombre completo: "{$curso->title}".
        - Si detectas lenguaje inapropiado, responde con una advertencia y no continúes.
        - Si la pregunta no está relacionada con el curso, responde que no puedes ayudar y sugiere revisar el contenido disponible.
        EOT;

            $contexto = mb_convert_encoding($contexto, 'UTF-8', 'UTF-8');

            Log::info("Respondiendo chat para curso: {$codigo}, pregunta: {$request->input('pregunta')}");

            $response = OpenAI::chat()->createStreamed([
                'model' => 'deepseek/deepseek-r1-0528:free',
                'messages' => [
                    ['role' => 'system', 'content' => $contexto],
                    ['role' => 'user', 'content' => $pregunta],
                ],
            ]);

            Log::info('OpenAI respondió correctamente, comenzando a hacer stream');

            set_time_limit(0);

            return response()->stream(function () use ($response) {
                foreach ($response as $chunk) {
                    try {
                        if (isset($chunk->choices[0]->delta->content)) {
                            echo mb_convert_encoding($chunk->choices[0]->delta->content, 'UTF-8', 'UTF-8');
                            ob_flush();
                            flush();
                        }
                    } catch (\Throwable $e) {
                        echo "[ERROR DE FORMATO]";
                    }
                }
            }, 200, [
                'Content-Type' => 'text/plain',
                'Cache-Control' => 'no-cache',
                'X-Accel-Buffering' => 'no',
            ]);
        } catch (\Throwable $e) {
            Log::error('Error en responderChat: ' . $e->getMessage());
            return response()->json([
                'error' => true,
                'message' => 'Error interno del servidor: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function examen(string $codigo)
    {
        $curso = Course::where('code', $codigo)->firstOrFail();
        $examen = $curso->exam()->with('questions.options')->first();

        if (!$examen) {
            abort(404, 'Este curso no tiene un examen disponible.');
        }

        return view('pages.cursos.examen', compact('curso', 'examen'));
    }

    public function enviarExamen(Request $request, string $codigo)
    {
        $curso = Course::where('code', $codigo)->with('exam.questions.options')->firstOrFail();
        $examen = $curso->exam;
        if (!$examen) abort(404, 'Este curso no tiene examen.');

        $data = $request->validate([
            'respuestas' => 'required|array',
            'respuestas.*' => 'integer|exists:options,id',
        ]);

        $respuestas = $data['respuestas'];
        $preguntas = $examen->questions;
        $total = $preguntas->count();
        $correctas = 0;

        foreach ($preguntas as $pregunta) {
            if (($respuestas[$pregunta->id] ?? null) == $pregunta->options->where('is_correct', true)->first()->id) {
                $correctas++;
            }
        }

        $calificacion = round(($correctas / max($total, 1)) * 100, 2);
        $aprobado = $calificacion >= 70;

        $user = Auth::user();

        // Comprobar si ya está inscrito
        $pivot = $user->courses()->where('course_id', $curso->id)->first();

        if ($pivot) {
            // Update manual
            DB::table('course_user')
                ->where('user_id', $user->id)
                ->where('course_id', $curso->id)
                ->update([
                    'grade' => $calificacion,
                    'passed' => $aprobado,
                    'last_attempt' => now(),
                    'attempts' => DB::raw('attempts + 1'),
                    'updated_at' => now(),
                ]);
        } else {
            // Nuevo registro
            $user->courses()->attach($curso->id, [
                'grade' => $calificacion,
                'passed' => $aprobado,
                'last_attempt' => now(),
                'attempts' => 1,
            ]);
        }

        return redirect()
            ->route('cursos.examen', $codigo)
            ->with('resultado', [
                'correctas' => $correctas,
                'total' => $total,
                'nota' => $calificacion,
                'aprobado' => $aprobado,
            ]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $directorio = "cursos/{$course->code}";
        Storage::disk('public')->deleteDirectory($directorio);
        $course->delete();
        return redirect()->route('dashboard.cursos')->with('success', 'Curso y sus archivos eliminados.');
    }
}
