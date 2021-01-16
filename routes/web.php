<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\DepartementController;
use App\Http\Controllers\admin\DeplacementController;
use App\Http\Controllers\admin\GallerieController;
use App\Http\Controllers\admin\ReservationController;
use App\Http\Controllers\admin\RestaurantController;
use App\Http\Controllers\admin\ShopController;
use App\Http\Controllers\admin\SiteController;
use App\Http\Controllers\admin\UserController;
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

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->prefix('dashboard')->group(function () {
    Route::get('/',[DashboardController::class,'index'])->name('dashboard.index');
    Route::resource('user',UserController::class);
    Route::resource('site',SiteController::class);
    Route::resource('departement',DepartementController::class);
    Route::resource('restaurant',RestaurantController::class);
    Route::resource('shop',ShopController::class);
    Route::resource('deplacement',DeplacementController::class);
    Route::resource('gallerie',GallerieController::class);
    Route::resource('gallerie',GallerieController::class);

    Route::get('reservation_en_attente',[ReservationController::class,'attente'])->name('reservation.attente');
    Route::put('reservation/accepte/{id}/{status}',[ReservationController::class,'accepter'])->name('reservation.accepter');
    Route::get('reservation_payer',[ReservationController::class,'payer'])->name('reservation.payer');
});
