<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;
use App\Models\State;
use App\Models\City;
use App\Models\Hobby;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('/candidate', CandidateController::class);

Route::get('/get-states', function () {
    return State::all();
});

Route::get('/get-hobbies', function () {
    return Hobby::all();
});

Route::get('/get-cities', function () {
    return City::all();
});