<?php

namespace App\View\Components\Course;

use App\Models\Archivo;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Viewer extends Component
{
    public Archivo $archivo;

    public function __construct(Archivo $archivo)
    {
        $this->archivo = $archivo;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.course.viewer');
    }
}
