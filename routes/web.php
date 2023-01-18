<?php

use App\Http\Controllers\LivroController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::prefix('dashboard')->group(function(){
//     Route::resource('user', UserController::class);
// });


Route::resource('users', UserController::class);
Route::resource('livros', LivroController::class);
