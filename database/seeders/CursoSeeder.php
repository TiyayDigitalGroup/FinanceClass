<?php

namespace Database\Seeders;

use App\Models\Archivo;
use App\Models\Curso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $archivosDisponibles = [
            ['nombre' => 'ejemplo.pdf', 'tipo' => 'pdf'],
            ['nombre' => 'video.mp4', 'tipo' => 'mp4'],
            ['nombre' => 'imagen.png', 'tipo' => 'png'],
            ['nombre' => 'audio.mp3', 'tipo' => 'mp3'],
            ['nombre' => 'otro.docx', 'tipo' => 'docx'],
        ];

        // Crear cursos gratuitos
        Curso::factory(5)->state(['premium' => false])->create()->each(function ($curso) use ($archivosDisponibles) {
            $this->asignarArchivosReales($curso, $archivosDisponibles);
        });

        // Crear cursos premium
        Curso::factory(5)->state(['premium' => true])->create()->each(function ($curso) use ($archivosDisponibles) {
            $this->asignarArchivosReales($curso, $archivosDisponibles);
        });
    }

    protected function asignarArchivosReales(Curso $curso, array $archivosDisponibles): void
    {
        $carpetaDestino = "cursos/{$curso->codigo}";
        Storage::disk('public')->makeDirectory($carpetaDestino);

        collect($archivosDisponibles)
            ->shuffle()
            ->take(rand(2, 4))
            ->each(function ($archivo) use ($curso, $carpetaDestino) {
                $origen = resource_path("sample-files/{$archivo['nombre']}");
                $nombreDestino = Str::uuid() . '_' . $archivo['nombre'];
                $destino = "{$carpetaDestino}/{$nombreDestino}";

                if (!file_exists($origen)) return;

                copy($origen, storage_path("app/public/{$destino}"));

                $curso->archivos()->create([
                    'titulo' => ucfirst(pathinfo($archivo['nombre'], PATHINFO_FILENAME)),
                    'nombre_original' => $archivo['nombre'],
                    'ruta' => $destino,
                    'tipo' => $archivo['tipo'],
                    'descripcion' => 'Archivo de prueba generado automáticamente.',
                ]);
            });
    }
}
