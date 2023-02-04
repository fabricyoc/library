<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\LivroUser;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totEstudantes = User::where('type', '=', 'common')->count();
        $totFuncionarios = User::where('type', '=', 'admin')->count();
        $totLivros = Livro::all()->count();
        $totEmprestimos = LivroUser::all()->count();

        return view('dashboard.index', compact('totEstudantes', 'totFuncionarios', 'totLivros', 'totEmprestimos'));
    }

    private function totEmprestimos($modelLivro)
    {
        // Contava o LivroUser, quando não havia modelo
        $livros = $modelLivro; //pega todos os livros
        $totEmprestimos = 0;

        foreach ($livros as $l)
        {
            foreach ($l->users as $u)
            {
                $totEmprestimos++;
            }
        }

        return $totEmprestimos;
    }
}
