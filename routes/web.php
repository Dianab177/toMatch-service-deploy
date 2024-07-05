<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    echo "API-PM-DTD";
    
});


Route::get('/match/demo','App\Http\Controllers\MatchController@demo');
Route::get('/schedule/demo','App\Http\Controllers\ScheduleController@demo');

Route::get('/schedule/prueba','App\Http\Controllers\ScheduleController@countScheduleXCoder');

