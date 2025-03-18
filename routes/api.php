<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\FilmController;

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

Route::get('actors', [ActorController::class, 'index']);
Route::post('actor/create', [ActorController::class, 'create']);
Route::post('actor/delete', [ActorController::class, 'delete']);
Route::post('actor/edit', [ActorController::class, 'edit']);


Route::get('films', [FilmController::class, 'index']);
Route::post('film/create', [FilmController::class, 'create']);
Route::post('film/delete', [FilmController::class, 'delete']);
Route::post('film/edit', [FilmController::class, 'edit']);

Route::get('cities', [CityController::class, 'index']);
Route::post('city/create', [CityController::class, 'create']);
Route::post('city/delete', [CityController::class, 'delete']);
Route::post('city/edit', [CityController::class, 'edit']);

Route::get('categories', [CategoryController::class, 'index']);
Route::post('category/create', [CategoryController::class, 'create']);
Route::post('category/delete', [CategoryController::class, 'delete']);
Route::post('category/edit', [CategoryController::class, 'edit']);

