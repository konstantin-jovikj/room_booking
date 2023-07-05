<?php

namespace App\Http\Livewire;

use App\Models\Room;
use Livewire\Component;

class EditRoom extends Component
{



    public $room ;

    public string $room_number = '';
    public string $room_description = '';
    public ?float $price = null;
    // public int $room_price = 0;



    protected $rules = [
        'room.room_number' => ['required', 'min:1'],
        'room.room_description' => ['required', 'min:5'],
        'room.price' => ['required', 'numeric'],
    ];


    public function mount(Room $room)
    {
        // if (old('room_number')) {
            $this->room = $room;

            $this->room_number = $room->room_number;
            $this->room_description = $room->room_description;
            $this->price = $room->room_price;

        // }
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
