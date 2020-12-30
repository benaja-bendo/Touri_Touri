<?php

use App\Http\Controllers\API\DepartementController;
use App\Http\Controllers\API\DeplacementController;
use App\Http\Controllers\API\GalerieController;
use App\Http\Controllers\API\RestaurantController;
use App\Http\Controllers\API\ShopController;
use App\Http\Controllers\API\SiteController;
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

Route::resource('departement',DepartementController::class);
Route::resource('site',SiteController::class);
Route::resource('galerie',GalerieController::class);
Route::resource('deplacement',DeplacementController::class);
Route::resource('shop',ShopController::class);
Route::resource('restaurant',RestaurantController::class);
