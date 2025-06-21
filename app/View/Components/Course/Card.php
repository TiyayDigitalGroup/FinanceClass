<?php

namespace App\View\Components\Course;

use App\Models\Curso;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public Curso $curso;
    public string $tipo;
    public string $color;

    public string $borderClass;
    public string $textHoverClass;
    public string $arrowHoverClass;
    public string $gradientFrom;
    public string $gradientTo;

    public function __construct(Curso $curso, string $tipo = 'gratis', string $color = 'green')
    {
        $this->curso = $curso;
        $this->tipo = $tipo;
        $this->color = $color;

        $this->borderClass = "hover:border-{$color}-300";
        $this->textHoverClass = "group-hover:text-{$color}-600";
        $this->arrowHoverClass = "group-hover:text-{$color}-500";

        [$this->gradientFrom, $this->gradientTo] = $this->gradientClasses($color);
    }

    protected function gradientClasses(string $color): array
    {
        return match ($color) {
            'green' => ['from-green-400', 'to-green-600'],
            'purple' => ['from-purple-400', 'to-purple-600'],
            'blue' => ['from-blue-400', 'to-blue-600'],
            default => ['from-gray-400', 'to-gray-600'],
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.course.card');
    }
}
