<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RoomCard extends Component
{
    /**
     * Create a new component instance.
     */

    public $buildings;
    public $rooms;

    public function __construct($buildings, $rooms)
    {
        $this->buildings = $buildings;
        $this->rooms = $rooms;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.room-card');
    }
}
