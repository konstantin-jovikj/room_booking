<?php

namespace App\Http\Controllers;

use App\Models\BildingImages;
use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $buildings = Building::all();
        $buildings = Building::with('buildingImages')->get();
        // $cardImage = BildingImages::first();
        $cardImage =  Building::with('buildingImages')->first();
        // dd($buildings);
        return view('buildings.view-buildings', compact('buildings', 'cardImage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buildings.add-building');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Building $building)
    {
        $building = Building::with('buildingImages')->where('id', $building->id)->get();
        // dd($building);
        return view('buildings.show-building details', compact('building'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Building $building)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Building $building)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Building $building)
    {
        if ($building->delete()) {
            return redirect()->route('index.buildings')->with('success', 'The Building was succesffuly deleted');
        } else {
            return redirect()->route('index.buildings')->with('error', 'Something went wrong. Building cannot be deleted');
        }
    }
}
