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
        return view('livros.edit', compact('livro'));
    }

    public function update(UpdateLivroRequest $request, Livro $livro)
    {
        dd('estou no update');
    }

    public function destroy(Livro $livro)
    {
        //
    }
}
