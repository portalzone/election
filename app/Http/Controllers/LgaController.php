<?php

namespace App\Http\Controllers;

use App\Models\Lga;
use App\Http\Requests\StoreLgaRequest;
use App\Http\Requests\UpdateLgaRequest;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class LgaController extends Controller
{
    public function view() {
        $states = DB::table('states')->get();
        return $states;
    }
    public function index(State $state)
    {
        $lgas = $state->lgas;
        return $lgas;
    }

    // public function index()
    // {
        // $stateData = State::find($id);
        // if (!empty($stateData)) {
        //     $lgas = Lga::where('state_id', $stateData->id)->get();
        //     return response()->json(['status' => 200, 'message' => 'Local government list', 'data' => $lgas], Response::HTTP_OK);
        // } else {
        //     return response()->json(['status' => 422, 'message' => 'No Data Found', 'data' => []], Response::HTTP_UNPROCESSABLE_ENTITY);
        // }

        // $lgas = Lga::where('state_id', $Id)->get();
        // return response()->json(['data' => $lgas]);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $states = State::all();

        // return Inertia::render('Lga/Create', [
        //     'states' => $states,
        // ]);
        return Inertia::render('Lgas/Index', [
            'lgas' => Lga::all(),
          ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Lga::create($request->validate([
            'state_id' => ['required', 'integer' ],
            'lga_name' => ['required', 'max:50', 'min:3',  'unique:lgas'],
            // 'state_name' => ['required', 'max:50', 'min:3', 'unique:states'],
          ]));

          return to_route('lgas.index');

        // $request->validate([
        //     'state_id' => 'required|exists:states,id',
        //     'lga_name' => 'required|string',
        // ]);

        // Lga::create($request->all());

        // return redirect()->route('lgas.create')
        //     ->with('success', 'LGA created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Lga $lga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lga $lga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLgaRequest $request, Lga $lga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lga $lga)
    {
        //
    }
}
