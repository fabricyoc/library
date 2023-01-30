<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\User;
use Illuminate\Http\Request;

class EmprestimosController extends Controller
{
    public function index()
    {
        $estudantes = User::where('type', '=', 'common')->orderBy('name')->get();
        // exibirá apenas os livros que estão em estoque
        $livros = Livro::where('emprestimo', '>', 0)->orderBy('titulo')->get();

        return view('emprestimos.index', compact('estudantes', 'livros'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
