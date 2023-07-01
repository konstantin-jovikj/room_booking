<?php

namespace App\Http\Livewire;

use App\Models\BildingImages;
use Livewire\Component;
use Livewire\WithFileUploads;

class BuildingImage extends Component
{
    use WithFileUploads;


    public $building_image;

    public $building_id;

    public function mount($building)
    {
        $this->building_id = $building->id;
    }

    public function upload()
    {
        $this->validate([
            'building_image' => 'image|max:2048', // 2MB Max
        ]);

        $this->building_image->store('building-images', 'public');

        $buildingImage = new BildingImages();

        $buildingImage->building_id = $this->building_id;
        $buildingImage->building_image = $this->building_image;



        if($buildingImage->save()){
            return redirect()->route('index.buildings')->with('success', 'New Image was successfully Added');
        }else{
            return redirect()->route('index.buildings')->with('error', 'An error ocured. Please try again');
        }
    }

    public function render()
    {
        return view('livewire.building-image');
    }
}
