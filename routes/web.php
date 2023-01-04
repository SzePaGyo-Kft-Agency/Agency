<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ParticipateController;
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
Route::get('/api/events', [EventController::class, 'index']);
Route::get('/api/event/{id}', [EventController::class, 'show']);
Route::post('/api/event/new', [EventController::class, 'store']);
Route::delete('/api/event/{id}', [EventController::class, 'destroy']);
Route::put('/api/event/{id}', [EventController::class, 'update']);

Route::get('/api/participates', [ParticipateController::class, 'index']);
Route::get('/api/participate/{user_id}/{event_id}', [ParticipateController::class, 'show']);
Route::post('/api/participate/new', [ParticipateController::class, 'store']);
Route::delete('/api/participate/{user_id}/{event_id}', [ParticipateController::class, 'destroy']);
Route::put('/api/participate/{user_id}/{event_id}', [ParticipateController::class, 'update']);
