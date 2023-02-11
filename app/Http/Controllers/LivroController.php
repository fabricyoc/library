<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLivroRequest;
use App\Http\Requests\UpdateLivroRequest;
use App\Models\Livro;

class LivroController extends Controller
{
    public function index(Livro $livros)
    {
        $livros = Livro::orderBy('titulo')->get();

        return view('livros.index', [
            'livros' => $livros
        ]);
    }

    public function create()
    {
        //
    }

    public function store(StoreLivroRequest $request)
    {
        //
    }

    public function show(Livro $livro)
    {
        //
    }

    public function edit(Livro $livro)
    {
        dd($livro);
    }

    public function update(UpdateLivroRequest $request, Livro $livro)
    {
        //
    }

    public function destroy(Livro $livro)
    {
        //
    }
}
