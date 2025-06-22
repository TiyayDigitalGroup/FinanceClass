<?php

namespace Database\Factories;

use App\Models\Curso;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Archivo>
 */
class ArchivoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nombreOriginal = $this->faker->word() . '.pdf';
        $ruta = 'cursos/' . $this->faker->uuid . '/' . $nombreOriginal;

        return [
            'curso_id' => Curso::factory(),
            'titulo' => $this->faker->sentence(3),
            'nombre_original' => $nombreOriginal,
            'ruta' => $ruta,
            'tipo' => 'pdf',
            'descripcion' => $this->faker->paragraph(3),
        ];
    }
}
