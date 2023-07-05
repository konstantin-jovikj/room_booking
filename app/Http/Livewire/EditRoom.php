<?php

namespace App\Http\Livewire;

use App\Models\Building;
use App\Models\Room;
use Livewire\Component;

class EditRoom extends Component
{



    public $room;
    public $buildings;

    public string $room_number = '';
    public string $room_description = '';
    public ?float $price = null;


    public ?int $building_id = null;




    protected $rules = [
        'room.building_id' => ['required'],
        'room.room_number' => ['required', 'min:1'],
        'room.room_description' => ['required', 'min:5'],
        'room.price' => ['required', 'numeric'],
    ];


    public function mount(Room $room)
    {
        $this->room = $room;
        $this->building_id = $room->building_id;
        $this->room_number = $room->room_number;
        $this->room_description = $room->room_description;
        $this->price = $room->room_price;

        $this->buildings = Building::all();
    }



    public function update()
    {
        $validatedData = $this->validate();

        if ($this->room->update($validatedData)) {
            return redirect()->route('index.rooms')->with('success', 'The Room was successfully updated');
        } else {
            return redirect()->route('index.rooms')->with('error', 'An error occurred. Please try again');
        }
    }


    public function render()
    {
        return view('livewire.edit-room');
    }
}
