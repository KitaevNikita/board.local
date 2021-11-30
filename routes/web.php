<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Board\BoardController;
use App\Http\Controllers\IndexController;

Route::get('/', [IndexController::class, 'index'])->name('start_page');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    // маршрут для контроллера BoardController
    Route::resource('boards', BoardController::class);
});