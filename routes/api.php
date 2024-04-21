<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\NormalUsersController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BookEventController;
use App\Http\Controllers\FavouriteEventController;
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
    Route::get('geteventdetails/{id}', [EventController::class, 'index']);
    Route::get('getallevent', [EventController::class, 'forhomepageapi']);
    Route::get('getallfaq', [AuthController::class, 'forfaq']);
    Route::get('searchevent', [EventController::class, 'searchevent']);
    Route::get('getallvenue', [AuthController::class, 'getallvenue']);
    Route::get('getallcategory', [AuthController::class, 'getallcategory']);
    Route::get('categorywiseevent/{id}', [EventController::class, 'categorywiseevent']);

    Route::middleware('api')->group(function () {

        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('change-password', [AuthController::class, 'changePassword']);
        Route::post('updateprofile', [AuthController::class, 'updateprofile']);
        Route::post('verify-otp', [AuthController::class, 'forgotOTPVerify']);
        Route::post('reset-password', [AuthController::class, 'resetPassword']);
        Route::post('become-organizer', [NormalUsersController::class, 'becomeorganizer']);
        Route::post('store-event', [EventController::class, 'store']);
        Route::post('deletevent/{id}', [EventController::class, 'destroy']);
        Route::post('updateevent/{id}', [EventController::class, 'update']);
        Route::post('book-event', [BookEventController::class, 'store']);
        Route::get('getbookevent', [BookEventController::class, 'index']);
        Route::get('getorganizerevent', [EventController::class, 'getorganizerevent']);
        Route::post('addtofavourites', [FavouriteEventController::class, 'store']);
        Route::get('getorganizerfavouriteevent', [EventController::class, 'getorganizerfavouriteevent']);
        Route::post('deletefavouriteevent', [FavouriteEventController::class, 'destroy']);


    });
});