<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivroStoreRequest;
use App\Http\Requests\LivroUpdateRequest;
use App\Models\Livro;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

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
        return view('livros.create');
    }

    public function store(LivroStoreRequest $request)
    {
        if ($request->validated())
        {
            // Recebe a request e transforma em array
            $input = $request->validated();

            $input['slug'] = Str::slug($input['titulo']);
            $input['emprestimo'] = 0;

            if (!empty($request->imagem) && $request->imagem->isValid()) {
                $path = $request->imagem->store('livros', 'public');
                $input['imagem'] = $path;
            }

            // dd($input);

            Livro::create($input);

            return Redirect::route('livros.index');
        }
        else
        {
            return redirect()->back();
        }
    }

    public function show(Livro $livro)
    {
        //
    }

    public function edit(Livro $livro)
    {
        return view('livros.edit', compact('livro'));
    }

    public function update(LivroUpdateRequest $request, Livro $livro)
    {
        dd('estou no update');
    }

    public function destroy(Livro $livro)
    {
        //
    }
}
