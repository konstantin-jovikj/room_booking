<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Building;

class EditBuilding extends Component
{

    public $building ;
    public $updateMode = false;

    public function mount(Building $building)
    {
        if (old('building')){
            $this->building = $building;
        }
    }


    public function toggleUpdateMode()
    {
        $this->updateMode = true;
    }

    public function cancelUpdate()
    {
        $this->updateMode = false;
    }



    public function update()
    {
        $validatedData = $this->validate([
            'building.name' => ['required', 'min:2'],
            'building.address' => ['required', 'min:5'],
            'building.zip' => ['required', 'min:3'],
            'building.country' => ['required', 'min:3'],
        ]);



        if ($this->building->update($validatedData['building'])) {
            return redirect()->route('index.buildings')->with('success', 'The Building was successfully updated');
        } else {
            return redirect()->route('index.buildings')->with('error', 'An error ocured. Please try again');
        }
    }


    public function render()

    {
        // dd($this->building);
        return view('livewire.edit-building', [
            'building' => $this->building,
        ]);
    }
}
