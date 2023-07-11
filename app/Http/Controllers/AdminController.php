<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Building;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()

    {
        $buildings = Building::all();
        $rooms = Room::all();
        $users = User::with('rooms')->where('role_id', 2)->get();
        $bookings = Room::with('users', 'building')->get();


        return view('admin-dashboard', compact('buildings', 'rooms', 'users', 'bookings'));
    }
}
