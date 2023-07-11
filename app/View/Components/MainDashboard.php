<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MainDashboard extends Component
{
    /**
     * Create a new component instance.
     */

    public $buildings;
    public $rooms;
    public $users;
    public $bookings;

    public function __construct($buildings,$rooms, $users, $bookings)
    {
        $this->buildings = $buildings;
        $this->rooms = $rooms;
        $this->users = $users;
        $this->bookings = $bookings;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.main-dashboard');
    }
}
