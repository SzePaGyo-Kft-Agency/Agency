<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ParticipateController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware( ['admin'])->group(function () {
    Route::apiResource('/users', UserController::class);
});

Route::get('/agency', [AgencyController::class, 'index']);
Route::get('/agency/{id}', [AgencyController::class, 'show']);
Route::delete('/agency/{id}', [AgencyController::class, 'destroy']);
Route::post('/agency/new', [AgencyController::class, 'store']);
Route::put('/agency/{id}', [AgencyController::class, 'update']);

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

//user
Route::get('api/users',[UserController::class,'index']);
Route::get('api/users/{id}',[UserController::class,'show']);
Route::post('api/users',[UserController::class,'store']);
Route::put('api/users/{id}',[UserController::class,'update']);
Route::delete('api/users/{id}',[UserController::class,'destroy']);


require __DIR__ . '/auth.php';
