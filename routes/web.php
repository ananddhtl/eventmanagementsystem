<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\NormalUsersController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\FAQController;

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
    return view('admindashboard.login');
});

Route::get('login', [AdminUserController::class, 'index'])->name('login');
Route::post('admin-login', [AdminUserController::class, 'adminlogin'])->name('admin.login');
Route::get('register', [AdminUserController::class, 'registration'])->name('register');
Route::post('admin-registration', [AdminUserController::class, 'adminregisteration'])->name('admin.register');
Route::get('signout', [AdminUserController::class, 'signOut'])->name('signout');

Route::middleware(['auth'])->group(function () {

Route::get('dashboard', [AdminUserController::class, 'dashboard'])->name('dashboard');

Route::get('getall-events', [EventController::class, 'allevents'])->name('getallevents');

Route::get('getall-acceptedevents', [EventController::class, 'allacceptedevents'])->name('getallacceptedevents');
Route::get('getall-venue', [VenueController::class, 'index'])->name('venue');

Route::get('add-venue', [VenueController::class, 'addvenue'])->name('addvenue');

Route::post('storevenue', [VenueController::class, 'store'])->name('storevenue');

Route::get('/editvenue/{id}', [VenueController::class, 'edit'])->name('venue.edit');

Route::get('/deletevenue/{id}', [VenueController::class, 'destroy'])->name('venue.delete');

Route::get('/deleteevent/{id}', [EventController::class, 'destroy'])->name('event.delete');

Route::post('/updatevenue/{id}', [VenueController::class, 'update'])->name('venue.update');

Route::get('/acceptevent/{id}', [EventController::class, 'acceptevent'])->name('event.accept');

Route::get('/totaleventuserparticipants', [EventController::class, 'eventsusers'])->name('event.users');

Route::get('/totaleventuserparticipants/{id}', [EventController::class, 'totaleventusers'])->name('total.eventusers');

Route::get('getall-category', [CategoryController::class, 'index'])->name('category');

Route::get('add-category', [CategoryController::class, 'addcategory'])->name('addcategory');

Route::post('storecategory', [CategoryController::class, 'store'])->name('storecategory');

Route::get('/editcategory/{id}', [CategoryController::class, 'edit'])->name('category.edit');


Route::get('add-faq', [FAQController::class, 'addfaq'])->name('addfaq');


Route::get('faqlist', [FAQController::class, 'index'])->name('faq.index');


Route::post('storefaq', [FAQController::class, 'store'])->name('storefaq');

Route::post('/updatefaq/{id}', [FAQController::class, 'update'])->name('updatefaq');

Route::get('/deletefaq/{id}', [FAQController::class, 'destroy'])->name('faq.delete'); 

Route::get('/editfaq/{id}', [FAQController::class, 'edit'])->name('faq.edit');

Route::post('/updatefaq/{id}', [FAQController::class, 'update'])->name('faq.update');

Route::get('/deletecategory/{id}', [CategoryController::class, 'destroy'])->name('category.delete');

Route::post('/updatecategory/{id}', [CategoryController::class, 'update'])->name('category.update');

Route::get('getall-organizer', [NormalUsersController::class, 'allorganizers'])->name('getallorganizer');

Route::get('getall-normaluser', [NormalUsersController::class, 'allnormaluser'])->name('normalusers');

Route::get('/deleteorganier/{id}', [NormalUsersController::class, 'destroy'])->name('delete.organizer');

Route::get('/demoteorganizer/{id}', [NormalUsersController::class, 'demoteorganizer'])->name('demote.organizer');

});