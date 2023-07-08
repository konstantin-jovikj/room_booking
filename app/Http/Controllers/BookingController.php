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


        $user = auth()->user();

        $room = Room::with('roomImages', 'building', 'users')->findOrFail($room->id);

        $bookedRanges = $room->users->map(function ($user) {
            return [
                'check_in' => $user->pivot->check_in,
                'check_out' => $user->pivot->check_out,
            ];
        })->toArray();


        $events = [];

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

        $id = Auth::id();
        $user = User::find($id);



        $check_in = $request->check_in;
        $check_out = $request->check_out;


        $bookedRanges = $room->users->map(function ($user) {
            return [
                'check_in' => $user->pivot->check_in,
                'check_out' => $user->pivot->check_out,
            ];
        });


        $conflictingBooking = $bookedRanges->first(function ($bookRange) use ($check_in, $check_out) {
            return $check_in >= $bookRange['check_in'] && $check_in <= $bookRange['check_out']
                || $check_out >= $bookRange['check_in'] && $check_out <= $bookRange['check_out'];
        });

        if ($conflictingBooking) {
            return redirect()->route('index.rooms')->with('error', 'The selected dates are already occupied. Please choose different dates.');
        }


        if ($user->rooms()->attach($room->id, [
            'check_in' => $check_in,
            'check_out' => $check_out
        ])) {
            return redirect()->route('index.rooms')->with('error', 'Something went wrong. Please try again later.');
        } else {
            return redirect()->route('index.rooms')->with('success', 'The booking was successful. Thank you!');
        }
    }

    public function userBookings()
    {
        // $user = Auth::user();
        $id = Auth::id();
        $user = User::find($id);
        // $user = User::auth();

        $myBookings = $user->rooms()->get();

        // dd($myBookings);
        return view('mybookings-view', compact('myBookings'));
    }

    public function destroyBooking($pivot_id)
    {

        $idUser = Auth::id();
        $user = User::find($idUser);


        $pivot_id = intval($pivot_id); // Convert to integer

        // dd($idUser, $pivot_id);
        // $user->rooms()->detach($pivot_id);

        // dd($pivot_id);
        $user->rooms()->detach($pivot_id);
        return redirect()->route('index.rooms')->with('success', 'Booking deleted successfully.');
    }
}

