<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\EventTypeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('events', [EventController::class, 'index']);
Route::post('event', [EventController::class, 'store']);
Route::get('event/{id}', [EventController::class, 'show']);
Route::put('event/{id}', [EventController::class, 'update']);
Route::delete('event/{id}', [EventController::class, 'destroy']);


Route::get('event_types', [EventTypeController::class, 'index']);
Route::post('event_type', [EventTypeController::class, 'store']);
Route::get('event_type/{id}', [EventTypeController::class, 'show']);
Route::put('event_type/{id}', [EventTypeController::class, 'update']);
Route::delete('event_type/{id}', [EventTypeController::class, 'destroy']);