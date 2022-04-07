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
Route::get('event/{event}', [EventController::class, 'show']);
Route::put('event/{event}', [EventController::class, 'update']);
Route::post('event/update/{event}', [EventController::class, 'updateEvent']);
Route::delete('event/{event}', [EventController::class, 'destroy']);


Route::get('event_types', [EventTypeController::class, 'index']);
Route::post('event_type', [EventTypeController::class, 'store']);
Route::get('event_type/{eventType}', [EventTypeController::class, 'show']);
Route::put('event_type/{eventType}', [EventTypeController::class, 'update']);
Route::delete('event_type/{eventType}', [EventTypeController::class, 'destroy']);