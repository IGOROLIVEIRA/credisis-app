<?php

use App\Http\Controllers\CountryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/country', [CountryController::class, 'create']);
Route::get('/country', [CountryController::class, 'list']);
Route::put('/country', [CountryController::class, 'list']);
Route::put('/country/{id}', [CountryController::class, 'update']);
Route::delete('/country/{id}', [CountryController::class, 'destroy']);
