<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Building;
use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function index()
    {
        $buildings = Building::all();
        $rooms = Room::with('building')->get();
        return view('welcome', compact('buildings', 'rooms'));
    }
}
