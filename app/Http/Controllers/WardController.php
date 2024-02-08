<?php

namespace App\Http\Controllers;

use App\Models\Lga;
use App\Models\Ward;
use App\Models\State;
use Illuminate\Http\Request; // Import Request class
use App\Http\Requests\StoreWardRequest;
use App\Http\Requests\UpdateWardRequest;

class WardController extends Controller
{
    public function getStateList()
    {
        $states = State::all();
        return response()->json(['data' => $states]);
    }

    public function getLgaList($stateId)
    {
        $lgas = Lga::where('state_id', $stateId)->get();
        return response()->json(['data' => $lgas]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ward_name' => ['required', 'max:50', 'min:3', 'unique:wards'],
            'state_id' => ['required', 'integer'],
            'lga_id' => ['required', 'integer'],
        ]);
        Ward::create($validatedData);


    }

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreWardRequest $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     */
    public function show(Ward $ward)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ward $ward)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWardRequest $request, Ward $ward)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ward $ward)
    {
        //
    }
}
