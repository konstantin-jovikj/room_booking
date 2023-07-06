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
        // $room = Room::with('roomImages', 'building')->where('id', $room->id)->get();
        // return view('rooms.book-room-page', compact('room'));

        $user = auth()->user();

        $room = Room::with('roomImages', 'building', 'users')->findOrFail($room->id);

        $bookedRanges = $room->users->map(function ($user) {
            return [
                'check_in' => $user->pivot->check_in,
                'check_out' => $user->pivot->check_out,
            ];
        })->toArray();


        $events = [];

        // $appointments = Room::with('roomImages', 'building', 'users')->findOrFail($room->id)->get();

        // foreach ($bookedRanges as $bookedRange) {
        //     $events[] = [
        //         'check_in' => $bookedRange['check_in'],
        //         'check_out' => $bookedRange['check_out'],
        //     ];
        // }

        $events = $room->users->map(function ($user) {
            return [
                'title' => 'Booked',
                'start' => $user->pivot->check_in,
                'end' => $user->pivot->check_out,
            ];
        })->toArray();

        // dd($events);
        return view('rooms.book-room-page', compact('room', 'bookedRanges', 'events'));
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
