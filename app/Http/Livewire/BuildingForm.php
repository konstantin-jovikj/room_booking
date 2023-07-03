<?php

namespace App\Http\Livewire;

use App\Models\Building;
use Livewire\Component;

class BuildingForm extends Component
{


    public string $building_name = '';
    public string $building_address = '';
    public string $building_zip = '';
    public $building_place = '';
    public string $building_country = '';

    protected $rules = [
        'building_name' => ['required', 'min:2'],
        'building_address' => ['required', 'min:5'],
        'building_zip' => ['required', 'min:3'],
        'building_zip' => ['required', 'min:2'],
        'building_country' => ['required', 'min:3'],

    ];


    public function render()
    {
        return view('livewire.building-form');
    }

    public function register()
    {

        $this->validate();

        $building = new Building();
        $building->building_name = $this->building_name;
        $building->building_address = $this->building_address;
        $building->building_zip = $this->building_zip;
        $building->building_place = $this->building_place;
        $building->building_country = $this->building_country;


        if($building->save()){
            return redirect()->route('index.buildings')->with('success', 'New Building was successfully created');
        }else{
            return redirect()->route('index.buildings')->with('error', 'An error ocured. Please try again');
        }


        $this->building_name = '';
        $this->building_address = '';
        $this->building_zip = '';
        $this->building_place = '';
        $this->building_country = '';
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
