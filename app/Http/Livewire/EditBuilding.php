<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Building;

class EditBuilding extends Component
{

    public $building ;

    public string $building_name = '';
    public string $building_address = '';
    public string $building_zip = '';
    public string $building_place = '';
    public string $building_country = '';


    protected $rules = [
        'building.building_name' => ['required', 'min:2'],
        'building.building_address' => ['required', 'min:5'],
        'building.building_zip' => ['required', 'min:3'],
        'building.building_place' => ['required', 'min:2'],
        'building.building_country' => ['required', 'min:3'],
    ];

    public function mount(Building $building)
    {
        if (old('building_name')) {
            $this->building = $building;
            $this->building_name = $building->building_name;
            $this->building_address = $building->building_address;
            $this->building_zip = $building->building_zip;
            $this->building_place = $building->building_place;
            $this->building_country = $building->building_country;
        }
    }



    public function update()
    {
        $validatedData = $this->validate();

        if ($this->building->update($validatedData)) {
            return redirect()->route('index.buildings')->with('success', 'The Building was successfully updated');
        } else {
            return redirect()->route('index.buildings')->with('error', 'An error occurred. Please try again');
        }
    }


    public function render()

    {
        return view('livewire.edit-building', [
            'building' => $this->building,
        ]);
    }
}
