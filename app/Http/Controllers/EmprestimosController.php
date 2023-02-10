<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\LivroUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use function PHPSTORM_META\map;

class EmprestimosController extends Controller
{
    public function index(Request $request)
    {
        $estudantes = User::where('type', '=', 'common')->orderBy('name')->get();

        // exibirá apenas os livros que estão em estoque
        $livros = Livro::where('emprestimo', '>', 0)->orderBy('titulo')->get();

        // Sem aviso sobre o filtro
        $aviso = false; // lupa vermelha

        // Inicializar variável
        $estudantes_com_livros = [];

        // Filtro de estudantes
        if ($request->pesquisar != null)
        {
            $livros_users = LivroUser::orderBy('devolucao')->get();

            foreach ($livros_users as $lu)
            {
                $estudante = User::find($lu->user_id);

                if (str_contains(strtolower($estudante->name), strtolower($request->pesquisar)))
                {
                    $livro = Livro::find($lu->livro_id);
                    array_push($estudantes_com_livros, [
                        'estudante' => $estudante,
                        'livro' => $livro,
                        'emprestimo' => $lu
                    ]);
                }
            }

            $aviso = true;
        }
        // Sem filtro :: index padrão
        else
        {
            $livros_users = LivroUser::orderBy('devolucao')->get();
            // $livros_users = LivroUser::all();

            $estudantes_com_livros = [];

            foreach ($livros_users as $lu)
            {
                $estudante = User::find($lu->user_id);
                $livro = Livro::find($lu->livro_id);


                // Teste
                // if(!in_array($estudante, $estudantes_com_livros))
                // {
                //     // Verificar se já há um usuário no array,pois irá retornar todos os livros de um usuário
                //     array_push($estudantes_com_livros, $estudante);
                // }
                // Teste

                // array_push($estudantes_com_livros, $estudante);
                array_push($estudantes_com_livros, [
                    'estudante' => $estudante,
                    'livro' => $livro,
                    'emprestimo' => $lu
                ]);

            }
        }


        return view('emprestimos.index', compact('estudantes', 'livros', 'aviso', 'estudantes_com_livros'));
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
        $nova_data_devolucao = date('Y-m-d', strtotime('+15 days')); // data atual + 15d

        LivroUser::find($id)->update([
            'renovacao' => true,
            'devolucao' => $nova_data_devolucao
        ]);

        return Redirect::route('emprestimos.index');

        // Renovar livro
        // $users = User::where('type', '=', 'common')->get();

        // foreach ($users as $user)
        // {
        //     foreach ($user->livros as $user_livro)
        //     {
        //         if($user_livro->pivot->id == $id)
        //         {
        //             // $nova_data_devolucao = date('Y-m-d', strtotime('+15 days', strtotime($user_livro->pivot->devolucao)));
        //             $nova_data_devolucao = date('Y-m-d', strtotime('+15 days'));

        //             $user_livro->pivot->renovacao = true;
        //             $user_livro->pivot->devolucao = $nova_data_devolucao;
        //             $user_livro->pivot->save();

        //             return Redirect::route('emprestimos.index');
        //         }
        //     }
        // }
    }

    // Entregar livro
    public function destroy($id)
    {
        // Busca o relacionamento entre usuário e livro
        $emprestimo = LivroUser::find($id);

        // Busca o livro para atribuir +1 ao empréstimo (estoque)
        $livro = Livro::find($emprestimo->livro_id);

        // Aumenta 1 no estoque de Livro devolvido
        $livro->emprestimo += 1;
        $livro->save();

        // Deleta o relacionamento entre usuário e o livro
        $emprestimo->delete();

        return Redirect::route('emprestimos.index');


        // $users = User::where('type', '=', 'common')->get();

        // foreach ($users as $user)
        // {
        //     foreach ($user->livros as $user_livro)
        //     {
        //         if($user_livro->pivot->id == $id)
        //         {
        //             // Aumenta 1 no estoque de empréstimos
        //             $user_livro->emprestimo++;
        //             $user_livro->save();

        //             // Deleta o relacionamento entre usuário e o livro
        //             $user_livro->pivot->delete();

        //             return Redirect::route('emprestimos.index');
        //         }
        //     }
        // }
    }
}
