<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public string $tag;
    public string $finalClass;
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $href = null,
        public string $type = 'button',
        public string $variant = '',
        // public string $padding = 'px-6 py-3',
        public string $textStyle = 'font-semibold',
        public string $rounded = 'rounded-xl',
        public string $extra = ''
    ) {
        $this->tag = $this->href ? 'a' : 'button';

        $baseClasses = 'flex items-center justify-center transform transition-all duration-300 cursor-pointer hover:saturate-150 h-fit';

        $variantClasses = match ($variant) {
            'primary' => 'bg-gradient-to-r from-blue-600 to-indigo-600',
            'secondary' => 'bg-gradient-to-r from-gray-600 to-gray-800',
            'success' => 'bg-gradient-to-r from-green-500 to-emerald-600',
            'danger' => 'bg-gradient-to-r from-red-500 to-rose-600',
            'warning' => 'bg-gradient-to-r from-yellow-500 to-orange-500',
            'info' => 'bg-gradient-to-r from-cyan-500 to-blue-500',
            'purple' => 'bg-gradient-to-r from-purple-500 to-violet-600',
            'pink' => 'bg-gradient-to-r from-pink-500 to-rose-500',
            'teal' => 'bg-gradient-to-r from-teal-500 to-cyan-600',
            'orange' => 'bg-gradient-to-r from-orange-500 to-red-500',
            'lime' => 'bg-gradient-to-r from-lime-500 to-green-500',
            'amber' => 'bg-gradient-to-r from-amber-500 to-yellow-500',
            'sunset' => 'bg-gradient-to-r from-orange-400 to-pink-500',
            'ocean' => 'bg-gradient-to-r from-blue-400 to-teal-500',
            'midnight' => 'bg-gradient-to-r from-slate-800 to-black',
            'neon' => 'bg-gradient-to-r from-blue-500 via-purple-500 to-indigo-600',
            default => '',
        };

        $this->finalClass = implode(' ', [
            $baseClasses,
            // $this->padding,
            $variantClasses,
            $this->textStyle,
            $this->rounded,
            $this->extra,
        ]);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.button');
    }
}
