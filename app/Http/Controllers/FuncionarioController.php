<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function index(Request $request)
    {
        $funcionarios = User::where('type', '=', 'admin')->orderBy('name')->get();

        // Filtro
        $aviso = '';
        if ($request->pesquisar != null)
        {
            $funcionarios = User::query();

            $funcionarios->when($request->pesquisar, function($query, $vl) {
                $query->where('name', 'like', '%'. $vl. '%')
                    ->where('type', '=', 'admin')->orderBy('name');
            });

            $funcionarios = $funcionarios->get();

            $aviso = true;
        }
        // Filtro

        return view('funcionarios.index', compact('funcionarios', 'aviso'));
    }

    public function create()
    {
        // no modal do index
    }

    public function store(UserStoreRequest $request)
    {
        dd('estou no STORE');
    }

    public function show(User $user, $id)
    {
        $user = User::find($id);

        return view('funcionarios.show', compact('user'));
    }

    public function edit(User $user, $id)
    {
        $user = User::find($id);

        // dd($user->load('endereco')->toArray());

        return view('funcionarios.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }
}
