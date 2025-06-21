<?php

namespace App\View\Components\Course;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Section extends Component
{
    public string $titulo;
    public string $descripcion;
    public string $color;
    public string $icono;
    public string $tipo;
    public Collection $cursos;

    public function __construct(
        string $titulo,
        string $descripcion,
        string $color = 'green',
        string $icono = 'book',
        string $tipo = 'gratis',
        Collection $cursos
    ) {
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->color = $color;
        $this->icono = $icono;
        $this->tipo = $tipo;
        $this->cursos = $cursos;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.course.section');
    }
}
