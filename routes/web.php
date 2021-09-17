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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'complains'], function () {
    Route::get('/', [App\Http\Controllers\ComplainsController::class, 'index'])->name('complains.index');
    Route::get('/create', [App\Http\Controllers\ComplainsController::class, 'create'])->name('complains.create');
    Route::post('/store', [App\Http\Controllers\ComplainsController::class, 'store'])->name('complains.store');
    Route::get('/{complain}', [App\Http\Controllers\ComplainsController::class, 'edit'])->name('complains.edit');
    Route::put('/{complain}', [App\Http\Controllers\ComplainsController::class, 'update'])->name('complains.update');
    Route::delete('/{complain}', [App\Http\Controllers\ComplainsController::class, 'destroy'])->name('complains.destroy');
});
