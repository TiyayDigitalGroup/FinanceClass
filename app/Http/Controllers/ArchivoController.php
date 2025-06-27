<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\IOFactory as WordIOFactory;
use PhpOffice\PhpWord\Element\Text;
use Smalot\PdfParser\Parser as PdfParser;

class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, Course $course)
    {
        $request->validate([
            'file' => 'required|file|max:10240',
            'title' => 'required|string|max:255',
        ]);

        Log::info('Curso recibido:', ['course_id' => $course->id ?? 'NULO']);

        $archivo = $request->file('file');
        $directorio = "cursos/{$course->code}";
        Storage::disk('public')->makeDirectory($directorio);
        $ruta = $archivo->store($directorio, 'public');

        if (!Storage::disk('public')->exists($ruta)) {
            Log::error("Error guardando archivo: {$ruta}");
            return back()->with('error', 'No se pudo guardar el archivo');
        }

        $extension = strtolower($archivo->getClientOriginalExtension());
        $texto = '';

        try {
            $realPath = $archivo->getRealPath();

            $texto = match ($extension) {
                'txt' => file_get_contents($realPath),
                'pdf' => (new PdfParser())->parseFile($realPath)->getText(),
                'docx' => $this->extraerTextoDocx($realPath),
                'mp3', 'wav', 'mp4', 'm4a', 'mov' => $this->transcribirAudioVideo($ruta),
                default => '[Formato no soportado]',
            };

            $texto = mb_convert_encoding($texto, 'UTF-8', 'UTF-8');
        } catch (\Exception $e) {
            Log::error("Error procesando archivo: " . $e->getMessage());
            $texto = '[Error al procesar el archivo]';
        }

        $course->files()->create([
            'original_name' => $archivo->getClientOriginalName(),
            'title' => $request->input('title'),
            'path' => str_replace('public/', '', $ruta),
            'type' => $extension,
            'transcription' => $texto,
        ]);

        return back()->with('success', 'Archivo subido correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $archivo = File::findOrFail($id);

        // Elimina el archivo físico
        Storage::disk('public')->delete($archivo->path);

        // Elimina el registro en la BD
        $archivo->delete();

        return back()->with('success', 'Archivo eliminado correctamente.');
    }


    private function extraerTextoDocx($ruta): string
    {
        $phpWord = WordIOFactory::load($ruta);
        $texto = '';

        foreach ($phpWord->getSections() as $section) {
            foreach ($section->getElements() as $element) {
                if ($element instanceof Text) {
                    $texto .= $element->getText() . "\n";
                }
            }
        }

        return $texto;
    }

    private function transcribirAudioVideo(string $rutaRelativa): string
    {
        $ruta = storage_path('app/public/' . $rutaRelativa);
        if (!file_exists($ruta)) {
            Log::error("Archivo no encontrado para transcripción: {$ruta}");
            return '[Archivo no encontrado]';
        }

        $script = base_path('app/NodeScripts/Python/transcribir.py');
        if (!file_exists($script)) {
            Log::error("Script de transcripción no encontrado: {$script}");
            return '[Script no disponible]';
        }

        $cmd = escapeshellcmd("python3 {$script} " . escapeshellarg($ruta));
        exec($cmd, $output, $code);

        return $code === 0 ? implode("\n", $output) : '[Error en la transcripción]';
    }
}
