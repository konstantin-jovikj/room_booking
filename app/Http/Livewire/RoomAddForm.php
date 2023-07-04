<?php

namespace App\Http\Livewire;

use App\Models\Room;
use Livewire\Component;

class RoomAddForm extends Component
{

    public $buildingId;


    // public string $building_id = '';
    public string $room_number = '';
    public string $room_description = '';
    // public $avg_rate = '';


    protected $rules = [
        // 'building_id' => ['required'],
        'room_number' => ['required', 'min:1'],
        'room_description' => ['required', 'min:5'],
        // 'avg_rate' => [],
    ];



    public function mount($buildingId)
    {
        $this->buildingId = $buildingId;
    }



    public function register()
    {
        $this->validate();

        $room = new Room();
        $room->building_id = $this->building_id;
        $room->room_number = $this->room_number;
        $room->room_description = $this->room_description;

        if ($room->save()) {
            return redirect()->route('index.rooms')->with('success', 'New Room was successfully created');
        } else {
            return redirect()->route('index.rooms')->with('error', 'An error occurred. Please try again');
        }

        $this->room_number = '';
        $this->room_description = '';
    }



    public function render()
    {
        return view('livewire.room-add-form');
    }
}

