<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EstudanteController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserController::class, 'index']);

Route::prefix('dashboard')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('funcionarios', FuncionarioController::class);
    Route::resource('estudantes', EstudanteController::class);
});

Route::resource('livros', LivroController::class);
