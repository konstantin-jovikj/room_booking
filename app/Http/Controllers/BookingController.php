<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // public function bookRoom(Room $room)
    // {


    //     $id = Auth::id();
    //     $user = User::find($id);

    //     $room = Room::with('roomImages', 'building', 'users')->findOrFail($room->id);

    //     $events = [];

    //     $events = $room->users->map(function ($user) {
    //         return [
    //             'title' => 'BOOKED DATES',
    //             'start' => $user->pivot->check_in,
    //             'end' => $user->pivot->check_out,
    //         ];
    //     })->toArray();

    //     // dd($events);
    //     return view('rooms.book-room-page', compact('room', 'events'));
    // }



    public function bookRoom(Room $room)
    {
        $id = Auth::id();
        $user = User::find($id);

        $room = Room::with('roomImages', 'building', 'users')->findOrFail($room->id);

        $events = $room->users->map(function ($user) {
            $start = $user->pivot->check_in;
            $end = $user->pivot->check_out;

            // Adjust the end date by adding one day
            $endAdjusted = date('Y-m-d', strtotime($end . ' +1 day'));

            return [
                'title' => 'BOOKED DATES',
                'start' => $start,
                'end' => $endAdjusted,
            ];
        })->toArray();

        return view('rooms.book-room-page', compact('room', 'events'));
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


        ($user->rooms()->attach($room->id, [
            'check_in' => $check_in,
            'check_out' => $check_out
        ]));
        return redirect()->route('index.rooms')->with('success', 'The booking was successful. Thank you!');
    }

    public function userBookings()
    {

        $id = Auth::id();
        $user = User::find($id);

        $myBookings = $user->rooms()->get();

        return view('mybookings-view', compact('myBookings'));
    }

    public function destroyBooking($pivot_id)
    {
        $idUser = Auth::id();
        $user = User::find($idUser);

        $pivot_id = intval($pivot_id);

        $bookingForDelete = DB::table('room_user')->find($pivot_id);

        if ($bookingForDelete) {
            $user->rooms()->wherePivot('check_in', $bookingForDelete->check_in)
                ->wherePivot('check_out', $bookingForDelete->check_out)
                ->detach($bookingForDelete->room_id);

            return redirect()->route('index.rooms')->with('success', 'Booking deleted successfully.');
        } else {
            return redirect()->route('index.rooms')->with('error', 'Error.');
        }
    }
}
