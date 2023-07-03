<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowBuilding extends Component
{
    /**
     * Create a new component instance.
     */
    public $building;
    public function __construct($building)
    {
        $this->building = $building;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.show-building');
    }
}
