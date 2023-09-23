<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ApartmentController;
use App\Http\Controllers\Api\MessageController;

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

Route::get('/apartments', [ApartmentController::class, 'index']);
Route::get('/all-apartments', [ApartmentController::class, 'allIndex']);
Route::get('/apartments/{slug}', [ApartmentController::class, 'show']);
Route::get('/coordinate-apartments', [ApartmentController::class,'recuperaCoordinate']);
Route::get('/filtered-apartments', [ApartmentController::class,'recuperaIndirizzo']); //<---ROTTA ADDRESS
Route::post('/messages',[MessageController::class,'store']); //<---ROTTA MESSAGES
