<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EmprestimosController extends Controller
{
    public function index(Request $request)
    {
        $estudantes = User::where('type', '=', 'common')->orderBy('name')->get();

        // exibirá apenas os livros que estão em estoque
        $livros = Livro::where('emprestimo', '>', 0)->orderBy('titulo')->get();

        // Sem aviso sobre o filtro
        $aviso = false;

        // Filtro de estudantes
        if ($request->pesquisar != null) {
            $estudantes = User::query();

            $estudantes->when($request->pesquisar, function($query, $vl) {
                $query->where('name', 'like', '%'. $vl. '%');
            });

            $estudantes = $estudantes->get();
            $aviso = true;
        }

        return view('emprestimos.index', compact('estudantes', 'livros', 'aviso'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user = User::find($request->estudante);
        $livro = Livro::find($request->livro);

        if ($livro->emprestimo > 0)
        {
            $user->livros()->attach($livro->id, [
                'created_at' => date('Y-m-d H:i:s'), // data de empréstimo
                'updated_at' => date('Y-m-d H:i:s'), // data de empréstimo
                'devolucao' => date('Y-m-d', strtotime('+15 days')), // data de devolução
            ]);

            //subtrai 1 livro do emprestimo/estoque disponível
            $livro->emprestimo--;
            $livro->save();
        }


        // dd($user->load('livros')->toArray());
        return Redirect::route('emprestimos.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        // Formulário para entrega do livro
        // return view('emprestimos.edit');
    }

    // public function update(Request $request, $id)
    public function update($id)
    {
        // Renovar livro
        $users = User::where('type', '=', 'common')->get();

        foreach ($users as $user)
        {
            foreach ($user->livros as $user_livro)
            {
                if($user_livro->pivot->id == $id)
                {
                    // $nova_data_devolucao = date('Y-m-d', strtotime('+15 days', strtotime($user_livro->pivot->devolucao)));
                    $nova_data_devolucao = date('Y-m-d', strtotime('+15 days'));

                    $user_livro->pivot->renovacao = true;
                    $user_livro->pivot->devolucao = $nova_data_devolucao;
                    $user_livro->pivot->save();

                    return Redirect::route('emprestimos.index');
                }
            }
        }
    }

    public function destroy($id)
    {
        // Entregar livro
        $users = User::where('type', '=', 'common')->get();

        foreach ($users as $user)
        {
            foreach ($user->livros as $user_livro)
            {
                if($user_livro->pivot->id == $id)
                {
                    // Aumenta 1 no estoque de empréstimos
                    $user_livro->emprestimo++;
                    $user_livro->save();

                    // Deleta o relacionamento entre usuário e o livro
                    $user_livro->pivot->delete();

                    return Redirect::route('emprestimos.index');
                }
            }
        }
    }
}
