<?php

namespace App\Http\Controllers;

use App\Models\Hobby;

class HobbyController extends Controller
{
    public function getHobbies()
    {
        return Hobby::all();
    }
}
