<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarItem extends Component
{
    /**
     * Create a new component instance.
     */
    public string $route;
    public string $icon;
    public string $iconTitle;

    public function __construct(string $route, string $icon, string $iconTitle)
    {
        $this -> route = $route;
        $this -> icon = $icon;
        $this -> iconTitle = $iconTitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar-item');
    }
}
