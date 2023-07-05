<?php

namespace App\View\Components;

use Closure;
use App\Models\Room;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ShowRoom extends Component
{
    public $room;

    public function __construct($room)
    {
        $this->room = $room;

    }


    public function render(): View|Closure|string
    {
        return view('components.show-room');
    }
}
