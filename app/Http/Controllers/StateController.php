<?php

namespace App\Http\Controllers;

use App\Models\State;

class StateController extends Controller
{
    public function getStates()
    {
        return State::all();
    }
}
