<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MyBookings extends Component
{
    /**
     * Create a new component instance.
     */
    public $myBookings;

    public function __construct($myBookings)
    {
        $this->myBookings = $myBookings;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.my-bookings');
    }
}
