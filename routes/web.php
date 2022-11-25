<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/all_events',[DashboardController::class,'getAllEvents']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/create_event',[DashboardController::class,'create']);
Route::post('/save_event',[DashboardController::class,'save_event'])
->name('save');
Route::get('/edit/{id}',[DashboardController::class,'update']);
Route::post('/save_update_event/{id}',[DashboardController::class,'save_update']);

Route::get('/all_guests',[DashboardController::class,'getAllGuests']);
Route::get('/create_guest',[DashboardController::class,'create_guest']);
Route::post('/save_guest',[DashboardController::class,'store_guest']);
Route::post('/save_update_guest/{id}',[DashboardController::class,'update_guest']);
Route::get('/edit_guest/{id}',[DashboardController::class,'edit_guest']);
