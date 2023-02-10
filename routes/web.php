<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dateTimePicker;
use App\Http\Controllers\fullCalendarController;
use App\Http\Controllers\countryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('dateTime',[dateTimePicker::class,'index'])->name('dateTime.index');
Route::post('create',[dateTimePicker::class,'create'])->name('booking.create');

// fullcalendar//
Route::get('fullCalendar',[fullCalendarController::class,'view'])->name('fullCalendar.view');

Route::get('view',[countryController::class,'view'])->name('country.view');
Route::post('/fetchState', [countryController::class, 'fetchState'])->name('fetch.states');
Route::post('/fetchCities', [countryController::class, 'fetchCity'])->name('fetch.city');