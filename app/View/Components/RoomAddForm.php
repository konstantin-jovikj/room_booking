<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RoomAddForm extends Component
{
    /**
     * Create a new component instance.
     */
    public $buildingsId;

    public function __construct($buildingsId)
    {
        $this->buildingsId = $buildingsId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.room-add-form');
    }
}
