<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users', [App\Http\Controllers\UserController::class, 'index']);
Route::get('/meetings', [App\Http\Controllers\MeetingController::class, 'index'])->name('meetings');
Route::get('/meeting/{id}', [App\Http\Controllers\MeetingController::class, 'show']);
Route::post('/meeting', [App\Http\Controllers\MeetingController::class, 'store'])->name('meeting');
Route::put('/meeting/{id}', [App\Http\Controllers\MeetingController::class, 'update']);
