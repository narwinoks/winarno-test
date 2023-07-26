<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckFactorController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return  to_route('auth.login');
});

// check number route
Route::prefix('/check-number')->name('checkNumber.')->group(function () {
    Route::controller(CheckFactorController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'check')->name('post');
    });
});

// auth route
Route::prefix('/auth')->name('auth.')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'index')->name('login')->middleware('guest');
        Route::post('/login', 'login')->name('login');
        Route::delete('/logout', 'logout')->name('logout')->middleware('auth');
    });
});

// dashboard route
Route::middleware('auth')->prefix('/dashboard')->name('dashboard.')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });
});
