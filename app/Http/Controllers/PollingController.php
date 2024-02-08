<?php

namespace App\Http\Controllers;

use App\Models\Ward;
use App\Models\Polling;
use Illuminate\Http\Request; // Import Request class
use App\Http\Requests\StorePollingRequest;
use App\Http\Requests\UpdatePollingRequest;

class PollingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getWardList($lgaId)
    {
        // $wards = Ward::where('Lga_id', $LgaId)->get();
        // return response()->json(['data' => $wards]);
        return response()->json([
            'data' => Ward::where('lga_id', $lgaId)->get()
        ]);
    }

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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'polling_name' => ['required', 'max:50', 'min:3', 'unique:pollings'],
            'state_id' => ['required', 'integer'],
            'lga_id' => ['required', 'integer'],
            'ward_id' => ['required', 'integer'],
        ]);
    Polling::create($validatedData);


    }

    /**
     * Display the specified resource.
     */
    public function show(Polling $polling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Polling $polling)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePollingRequest $request, Polling $polling)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Polling $polling)
    {
        //
    }
}
