<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buildings = Building::all();
        $rooms = Room::with('building')->get();
        return view('rooms.view-rooms', compact('buildings', 'rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buildingsId = Building::all();
        return view('rooms.add-room', compact('buildingsId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $room = new Room();

        $room->building_id = $request->buildingId;
        $room->room_number = $request->room_number;
        $room->room_description = $request->room_description;
        $room->price = $request->room_price;

        if ($room->save()) {
            return redirect()->route('index.rooms')->with('success', 'The Room was succesffuly added');
        } else {
            return redirect()->route('index.rooms')->with('error', 'Something went wrong. Room cannot be added');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }
}
