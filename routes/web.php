<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmprestimosController;
use App\Http\Controllers\EstudanteController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Apenas para exemplificar
// Route::get('/users', [UserController::class, 'index']);

Route::middleware(['auth'])->prefix('dashboard')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('funcionarios', FuncionarioController::class);

    Route::resource('estudantes', EstudanteController::class);
    Route::get('estudantes/{estudante}/delete', [EstudanteController::class, 'destroy'])->name('estudantes.destroy');

    Route::resource('emprestimos', EmprestimosController::class);
    Route::get('emprestimos/{emprestimo}/delete', [EmprestimosController::class, 'destroy'])->name('emprestimos.destroy');

    Route::resource('livros', LivroController::class);
    Route::get('livros/{livro}/delete', [LivroController::class, 'destroy'])->name('livros.destroy');
    Route::get('livros/{livro}/leitores', [LivroController::class, 'readers'])->name('livros.readers');
});

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
