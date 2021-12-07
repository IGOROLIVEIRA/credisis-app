<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\TransferController;
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
Route::put('/country/{id}', [CountryController::class, 'update']);
Route::delete('/country/{id}', [CountryController::class, 'destroy']);

Route::post('/state', [StateController::class, 'create']);
Route::get('/state', [StateController::class, 'list']);
Route::put('/state/{id}', [StateController::class, 'update']);
Route::delete('/state/{id}', [StateController::class, 'destroy']);

Route::post('/city', [CityController::class, 'create']);
Route::get('/city', [CityController::class, 'list']);
Route::put('/city/{id}', [CityController::class, 'update']);
Route::delete('/city/{id}', [CityController::class, 'destroy']);

Route::post('/transfer/{user_id}', [TransferController::class, 'transfer']);
Route::post('/deposit/{user_id}', [DepositController::class, 'deposit']);
