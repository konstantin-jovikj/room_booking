<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BookRoom extends Component
{
    /**
     * Create a new component instance.
     */

    public $room;
    public $bookedRanges;

    public function __construct($room, $bookedRanges)
    {
        $this->room = $room;
        $this->bookedRanges = $bookedRanges;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.book-room');
    }
}
