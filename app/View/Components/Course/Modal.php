<?php

namespace App\View\Components\Course;

use App\Models\Course;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    public Course $curso;
    public string $tipo;
    public string $color;

    public function __construct(Course $curso, string $tipo = 'gratis', string $color = 'green')
    {
        $this->curso = $curso;
        $this->tipo = $tipo;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.course.modal');
    }
}
