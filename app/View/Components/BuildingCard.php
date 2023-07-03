<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BuildingCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $buildings;
    public $cardImage;


    public function __construct($buildings, $cardImage)
    {
        // var_dump($buildings);
        $this->buildings = $buildings;
        $this->cardImage = $cardImage;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.building-card');
    }
}
