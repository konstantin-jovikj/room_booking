<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Room $room)
    {
        return view('rooms.upload-room-image',compact('room'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Room $room)
    {
        if ($request->hasFile('room_image')) {
            $roomimages = RoomImage::where('room_id', $room->id)->count();
            $roomimages += 1;

            $room_image = new RoomImage();

            $uploadedFile = $request->file('room_image');
            $extension = $uploadedFile->extension();

            $fileName = 'room-' . Auth::id() . '-' . $room->id . '-' . $roomimages . '.' . $request->room_image->extension();
            $request->room_image->storeAs('public/images', $fileName);

            $room_image->room_id = $room->id;
            $room_image->room_image = $fileName;

            if ($room_image->save()) {
                return redirect()->route('index.rooms')->with('success', 'The Room Image was successfully added');
            } else {
                return redirect()->route('index.rooms')->with('error', 'Something went wrong. The Room Image could not be added');
            }
        } else {
            return redirect()->route('index.rooms')->with('error', 'No file selected for upload');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(RoomImage $roomImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoomImage $roomImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RoomImage $roomImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoomImage $roomImage)
    {
        if ($roomImage->delete()) {
            return redirect()->route('index.rooms')->with('success', 'The RoomImage was succesffuly deleted');
        } else {
            return redirect()->route('index.rooms')->with('error', 'Something went wrong. RoomImage cannot be added');
        }
    }
}
