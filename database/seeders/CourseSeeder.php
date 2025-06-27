<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $curso = Course::create([
      'title' => 'Fundamentos de Finanzas',
      'description' => 'Curso introductorio sobre finanzas personales y toma de decisiones financieras.',
      'premium' => false,
    ]);

    $archivoOrigen = resource_path('sample-files/ejemplo.pdf');
    $archivoDestino = "cursos/{$curso->code}/" . Str::random(40) . ".pdf";
    Storage::disk('public')->makeDirectory("cursos/{$curso->code}");
    copy($archivoOrigen, storage_path("app/public/{$archivoDestino}"));

    $curso->files()->create([
      'title' => 'Guía Introductoria',
      'original_name' => 'ejemplo.pdf',
      'path' => $archivoDestino,
      'type' => 'pdf',
      'transcription' => 'Este documento proporciona una introducción a los conceptos de finanzas personales.',
    ]);

    $examen = $curso->exam()->create([
      'title' => 'Examen Final de Fundamentos',
    ]);

    for ($i = 1; $i <= 5; $i++) {
      $pregunta = $examen->questions()->create([
        'text' => "¿Cuál es la respuesta correcta a la pregunta $i?",
      ]);

      foreach (range(1, 3) as $j) {
        $pregunta->options()->create([
          'text' => "Opción $j de la pregunta $i",
          'is_correct' => $j === 1,
        ]);
      }
    }
  }
}
