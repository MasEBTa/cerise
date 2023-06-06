<?php

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
Route::middleware(['auth'])->group(function () {
    // Route::get('/home', function () {
    //     $laravelSession = request()->cookie('laravel_session');
    //     $try = 'tyr';

    //     return view('home', compact('laravelSession', 'try'));
    // });
    // fitur
    Route::get('/home', [App\Http\Controllers\GaleryController::class, 'index'])->name('home');
    Route::get('/', [App\Http\Controllers\GaleryController::class, 'index']);
});

Auth::routes();

// Route::get('/', [App\Http\Controllers\LandingPageController::class, 'index']);
Route::get('/galery/add', [App\Http\Controllers\GaleryController::class, 'add'])->middleware('auth')->name('add_data');
Route::get('/galery/{id}', [App\Http\Controllers\GaleryController::class, 'edit'])->middleware('auth')->name('edit_data');
Route::get('/galery/del/{id}', [App\Http\Controllers\GaleryController::class, 'destroy'])->middleware('auth')->name('hapus_data');
Route::post('/galery', [App\Http\Controllers\GaleryController::class, 'store'])->middleware('auth')->name('edit_fitur');
Route::post('/galery/update', [App\Http\Controllers\GaleryController::class, 'update'])->middleware('auth')->name('update_fitur');
Route::put('/galery/naik', [App\Http\Controllers\GaleryController::class, 'up'])->middleware('auth')->name('naikkan');
Route::post('/update-image', [App\Http\Controllers\GaleryController::class, 'image']);
Route::put('/galery/turun', [App\Http\Controllers\GaleryController::class, 'down'])->middleware('auth')->name('turunkan');
