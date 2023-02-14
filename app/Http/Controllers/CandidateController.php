<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::all();
        return view('candidates.index')->with('candidates', $candidates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statesController = new StateController();
        $states = $statesController->getStates();

        $hobbiesController = new HobbyController();
        $hobbies = $hobbiesController->getHobbies();

        return view('candidates.create', compact('states', 'hobbies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:candidates',
            'state' => 'required',
            'city' => 'required',
            'hobbies' => 'required|array|min:1',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $state = $request->input('state');
        $city = $request->input('city');
        $checkboxValues = $request->input('hobbies', []);
        $hobbies = implode(', ', $checkboxValues);

        $candidate = new Candidate;
        $candidate->name = $name;
        $candidate->email = $email;
        $candidate->state = $state;
        $candidate->city = $city;
        $candidate->hobbies = $hobbies;
        $candidate->save();

        return redirect('candidate')->with('flash_message', 'Candidate Successfully Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $candidate = Candidate::find($id);
        return view('candidates.show')->with('candidates', $candidate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidate = Candidate::find($id);
        $statesController = new StateController();
        $states = $statesController->getStates();

        $hobbiesController = new HobbyController();
        $hobbies = $hobbiesController->getHobbies();

        return view('candidates.edit', compact('states', 'hobbies'))->with('candidates', $candidate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'state' => 'required',
            'city' => 'required',
            'hobbies' => 'required|array|min:1',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $state = $request->input('state');
        $city = $request->input('city');
        $checkboxValues = $request->input('hobbies', []);
        $hobbies = implode(', ', $checkboxValues);

        $candidate = Candidate::find($id);

        $candidate->name = $name;
        $candidate->email = $email;
        $candidate->state = $state;
        $candidate->city = $city;
        $candidate->hobbies = $hobbies;
        $candidate->save();

        return redirect('candidate')->with('flash_message', 'Candidate Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Candidate::destroy($id);
        return redirect('candidate')->with('flash_message', 'Candidate Successfully Deleted!');
    }
}
