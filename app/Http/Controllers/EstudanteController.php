<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\Endereco;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EstudanteController extends Controller
{
    public function index()
    {
        $estudantes = User::where('type', '=', 'common')->orderBy('name')->get();

        return view('estudantes.index', [
            'estudantes' => $estudantes
        ]);
    }

    public function create()
    {
        // Create no index através do modal
    }

    public function store(User $user, Endereco $endereco, UserStoreRequest $request)
    {
        if ($request->validated())
        {
            $cpfRegex = preg_replace('/[^0-9]/', '', $request->cpf); // apenas números

            $request['password'] = bcrypt($cpfRegex);
            $user->fill($request->except(['logradouro', 'numero', 'bairro', 'referencia']));
            $user->save();

            $request['cidade'] = "Caicó";
            $request['cep'] = "59300-000";
            $endereco->fill($request->except(['name', 'cpf', 'email', 'telephone']));
            $user->endereco()->save($endereco);


            return Redirect::route('estudantes.index');
        }
        else
        {
            return redirect()->back();
        }
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }

    private function telephoneUnique($telephone)
    {
        // $telUnique = (count(User::where('telephone', '=', $request->telephone)->get()) > 0) ? false : true ;
    }
}
