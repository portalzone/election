<?php

namespace App\Http\Controllers;

use App\Models\Lga;
use Inertia\Inertia;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\StoreStateRequest;
use App\Http\Requests\UpdateStateRequest;


class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // Inertia controller method
// public function index()
// {
//     // Fetch states from the database
//     $states = State::all();

//     // Render the Vue.js component using Inertia and pass props
//     return Inertia::render('Base', [
//         'states' => $states, // Pass the "states" prop
//     ]);
// }


//     public function submitForm(Request $request)
//     {
//         // Handle form submission logic here
//         // You can access the submitted data using $request->input('selectedState')

//         // Redirect back after form submission
//         return redirect()->back();
//     }
    public function index()
    {

    //     $states = State::all();
    //     return $states;


        // $stateList = State::all();

        // // Return Inertia response
        // return Inertia::render('Lga', [
        //     'states' => $stateList,
        // ]);

        $states = State::all(); // Fetch the states from the database
        return response()->json(['data' => $states]);



        // $stateList = State::all();

// Inertia

    // if (!empty($stateList)) {
    //     return Inertia::render('Lga', [
    //         'status' => 200,
    //         'message' => 'Contact list',
    //         'data' => $stateList,
    //     ])->toResponse(request());
    // } else {
    //     return Inertia::render('Lga', [
    //         'status' => 422,
    //         'message' => 'No Data Found',
    //         'data' => [],
    //     ])->toResponse(request())->setStatusCode(422);
    // }
// Json
    // if (!empty($stateList)) {
    //     return response()->json(['status' => 200, 'message' => 'Conntact list', 'data' => $stateList], Response::HTTP_OK);
    // } else {
    //     return response()->json(['status' => 422, 'message' => 'No Data Found', 'data' => []], Response::HTTP_UNPROCESSABLE_ENTITY);
    // }


    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('States/Index', [
            'states' => State::all(),
          ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        State::create($request->validate([
            'state_name' => ['required', 'max:50', 'min:3', 'unique:states'],
          ]));


    }

    /**
     * Display the specified resource.
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(State $state)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStateRequest $request, State $state)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        //
    }
}
