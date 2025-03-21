<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ViewController;


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
Route::get('actors/count', [ActorController::class, 'count']);

Route::get('films', [FilmController::class, 'index']);
Route::post('film/create', [FilmController::class, 'create']);
Route::post('film/delete', [FilmController::class, 'delete']);
Route::post('film/edit', [FilmController::class, 'edit']);
Route::get('films/count', [FilmController::class, 'count']);

Route::get('addresses', [AddressController::class, 'index']);
Route::post('address/create', [AddressController::class, 'create']);
Route::post('address/delete', [AddressController::class, 'delete']);
Route::post('address/edit', [AddressController::class, 'edit']);
Route::get('addresses/count', [AddressController::class, 'count']);


Route::get('customers', [CustomerController::class, 'index']);
Route::post('customer/create', [CustomerController::class, 'create']);
Route::post('customer/delete', [CustomerController::class, 'delete']);
Route::post('customer/edit', [CustomerController::class, 'edit']);
Route::get('customers/count', [CustomerController::class, 'count']);

Route::get('categories', [ViewController::class, 'categories']);
Route::get('countries', [ViewController::class, 'countries']);
Route::get('cities', [ViewController::class, 'cities']);
Route::get('inventories', [ViewController::class, 'inventories']);
Route::get('languages', [ViewController::class, 'languages']);
Route::get('payments', [ViewController::class, 'payments']);
Route::get('rentals', [ViewController::class, 'rentals']);
Route::get('staff', [ViewController::class, 'staff']);
Route::get('stores', [ViewController::class, 'stores']);
