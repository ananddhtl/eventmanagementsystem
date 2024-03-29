<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NormalUsersController;

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
    return view('admindashboard.index');
});

Route::get('getall-events', [EventController::class, 'allevents'])->name('getallevents');

Route::get('getall-organizer', [NormalUsersController::class, 'allorganizers'])->name('getallorganizer');
