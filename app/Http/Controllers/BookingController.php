<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function bookRoom(Room $room)
    {
        $room = Room::with('roomImages', 'building')->where('id', $room->id)->get();
        return view('rooms.book-room-page', compact('room'));
    }

    public function store(Request $request, Room $room)
    {

        $user = auth()->user();


        $check_in = $request->check_in;
        $check_out = $request->check_out;


        if ($user->rooms()->attach($room->id, [
            'check_in' => $check_in,
            'check_out' => $check_out
        ])) {
            return redirect()->route('index.rooms')->with('error', 'Something went wrong. Please try again later.');
        } else {
            return redirect()->route('index.rooms')->with('success', 'The booking was successful. Thank you!');
        }
    }
}
