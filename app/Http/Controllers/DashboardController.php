<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totEstudantes = User::where('type', '=', 'common')->count();
        $totFuncionarios = User::where('type', '=', 'admin')->count();
        $totLivros = Livro::all()->count();

        return view('dashboard.index', compact('totEstudantes', 'totFuncionarios', 'totLivros'));
    }
}
