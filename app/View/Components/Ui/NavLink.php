<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavLink extends Component
{
    public string $href;
    /**
     * Create a new component instance.
     */
    public function __construct(string $href)
    {
        $this->href = $href;
    }

    public function isActive(): bool
    {
        return request()->url() === url($this->href);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.nav-link');
    }
}
