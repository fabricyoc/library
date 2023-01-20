<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('dashboard')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
});


Route::resource('users', UserController::class);
Route::resource('livros', LivroController::class);
