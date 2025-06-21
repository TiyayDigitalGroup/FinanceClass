<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use OpenAI\Laravel\Facades\OpenAI;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gratuitos = Curso::where('premium', false)->get();
        $premium = Curso::where('premium', true)->get();

        return view('pages.cursos.index', compact('gratuitos', 'premium'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $codigo)
    {
        $curso = Curso::with('archivos')->where('codigo', $codigo)->firstOrFail();
        return view('pages.cursos.curso', compact('curso'));
    }

    public function chat(string $codigo)
    {
        $curso = Curso::where('codigo', $codigo)->firstOrFail();
        return view('pages.cursos.chat', compact('curso'));
    }

    public function responderChat(Request $request, string $codigo)
    {
        $request->validate([
            'pregunta' => 'required|string|max:500',
        ]);

        $curso = Curso::where('codigo', $codigo)->with('archivos')->firstOrFail();

        if ($curso->archivos->isEmpty()) {
            return response('Este curso no tiene materiales para contextualizar.', 400);
        }

        $baseUrl = config('app.url');

        try {
            $curso = Curso::where('codigo', $codigo)->firstOrFail();
            $pregunta = $request->input('pregunta');

            $contexto = <<<EOT
        Eres un tutor virtual especializado en el curso "{$curso->titulo}". Debes responder exclusivamente preguntas relacionadas con el contenido de este curso.
        A continuación, se describen los materiales del curso. Usa esta información como referencia para tus respuestas:
        EOT;

            foreach ($curso->archivos as $archivo) {
                if (!empty($archivo->descripcion)) {
                    $contexto .= <<<EOT
                [Archivo]
                Nombre: {$archivo->nombre_original}
                Título: {$archivo->titulo}
                Descripción: {$archivo->descripcion}
                EOT;
                }
            }

            $contexto .= <<<EOT
        Instrucciones adicionales para tus respuestas:
        - Considera los títulos de los archivos como el temario del curso.
        - No inicies con saludos, ya hay uno automático antes de tu intervención.
        - No incluyas enlaces externos. Si necesitas mencionar uno, usa solo: "{$baseUrl}/cursos/{$codigo}".
        - Si haces referencia a materiales, menciona su título y sugiere que el usuario lo consulte dentro del curso.
        - Nunca menciones el código interno del curso ("{$codigo}"); usa siempre el nombre completo: "{$curso->titulo}".
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
        $curso = Curso::where('codigo', $codigo)->firstOrFail();
        return view('pages.cursos.examen', compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curso $curso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curso $curso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso)
    {
        //
    }
}
