<?php

namespace App\View\Components\Course;

use App\Models\Archivo;
use App\Models\File;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Viewer extends Component
{
    public File $archivo;

    public function __construct(File $archivo)
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
