<?php

namespace App\View\Components\Course;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    public string $titulo;
    public string $descripcion;
    public string $icono;
    public string $color;
    public int $cantidad;

    public function __construct(
        string $titulo,
        string $descripcion,
        string $icono = 'book',
        string $color = 'green',
        int $cantidad = 0
    ) {
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->icono = $icono;
        $this->color = $color;
        $this->cantidad = $cantidad;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.course.header');
    }
}
