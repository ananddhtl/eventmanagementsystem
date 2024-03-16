<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\NormalUsersController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BookEventController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'auth'], function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('forgot-password', [AuthController::class, 'forgotPassword']);
    Route::middleware('api')->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('change-password', [AuthController::class, 'changePassword']);
        Route::post('verify-otp', [AuthController::class, 'forgotOTPVerify']);
        Route::post('reset-password', [AuthController::class, 'resetPassword']);
        Route::post('become-organizer', [NormalUsersController::class, 'becomeorganizer']);


        // CRUD API for the event
        Route::post('store-event', [EventController::class, 'store']);
        Route::get('geteventdetails/{id}', [EventController::class, 'index']);
        Route::post('deletevent/{id}', [EventController::class, 'destroy']);
        Route::post('updateevent/{id}', [EventController::class, 'update']);


        //Route for the booking of the event
        Route::post('book-event', [BookEventController::class, 'store']);
        Route::get('getbookevent/{id}', [BookEventController::class, 'index']);

    });

   
});