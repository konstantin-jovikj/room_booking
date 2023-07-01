<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;
use App\Models\BildingImages;
use Illuminate\Support\Facades\Auth;

class BildingImagesController extends Controller
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
    public function create(Building $building)
    {
        return view('buildings.upload-building-image', compact('building'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Building $building)
    {
        // $buildingimages = BildingImages::where('building_id', $building->id)->count();
        // dd($buildingimages);
        // $buildingimages += 1;
        // $fileName = 'building' . Auth::id() . '-'. $buildingimages . '.' . $request->building_image->extension();
        $fileName = Auth::id() . '.' . $request->building_image->extension();
        $request->building_image->storeAs('public/images', $fileName);

        $building_image = new BildingImages();

        $building_image->building_id = $building->id;
        $building_image->building_image = $request->building_image;

        if ($building_image->save()) {
            return redirect()->route('index.buildings')->with('success', 'The Image succesffuly added');
        } else {
            return redirect()->route('index.buildings')->with('error', 'Something went wrong. Image cannot be added');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(BildingImages $bildingImages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BildingImages $bildingImages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BildingImages $bildingImages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BildingImages $bildingImages)
    {
        //
    }
}
