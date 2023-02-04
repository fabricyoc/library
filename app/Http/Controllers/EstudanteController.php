<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Endereco;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

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

    public function store(UserStoreRequest $request, User $user, Endereco $endereco)
    {
        if ($request->validated())
        {
            $cpfRegex = preg_replace('/[^0-9]/', '', $request->cpf); // apenas números

            $request['password'] = bcrypt($cpfRegex);
            $user->fill($request->except(['logradouro', 'numero', 'bairro', 'referencia']));
            $user->save();

            if ($request->logradouro != null && $request->numero != null)
            {
                // $request['cidade'] = "Caicó";
                // $request['cep'] = "59300-000";
                $endereco->fill($request->except(['name', 'cpf', 'email', 'telephone']));
                $user->endereco()->save($endereco);
            }

            return Redirect::route('estudantes.index');
        }
        else
        {
            return redirect()->back();
        }
    }

    public function show(User $user)
    {
        dd('chegou ao SHOW do estudante');
    }

    public function edit($id)
    {
        $user = User::find($id);

        // dd($user->load('endereco')->toArray());

        return view('estudantes.edit', [
            'user' => $user
        ]);
    }

    public function update(UserUpdateRequest $request, User $user, Endereco $endereco, $id)
    {
        // dd($request->toArray());
        if ($request->validated() && $this->senhasIguais($request->password, $request->confirmPassword))
        {
            $user = User::find($id);
            //
            // início do update no user
            //
            $inputs = [
                'name' => $request->name,
                'birthDate' => $request->birthDate,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'photo' => $this->inserirImagem($request['photo'], 'perfis', $user->photo),
                'cpf' => $request->cpf,
                'type' => $request->type,
                'password' => $request->password,
            ];
            if ($request->email == $user->email){
                unset($inputs['email']);
            }
            if ($request->password == null) {
                unset($inputs['password']);
            }
            if ($request->photo == null) {
                unset($inputs['photo']);
            }
            $user->update($inputs);
            //
            // fim do update no user
            //


            //
            // início do update do endereço do user
            //
            // se não tiver cadastrado o endereço previamente, daria erro - pois não existiria $user->endereco
            $comprovante = ($user->endereco != null) ? $user->endereco->comprovante : $request->comprovante;

            $inputsEndereco = [
                'logradouro' => $request->logradouro,
                'numero' => $request->numero,
                'bairro' => $request->bairro,
                'cidade' => $request->cidade,
                'cep' => $request->cep,
                'comprovante' => $this->inserirImagem($request['comprovante'], 'comprovantes', $comprovante),
                'referencia' => $request->referencia,
            ];
            // if ($request->comprovante == null) {
            //     unset($inputsEndereco['comprovante']);
            // }
            foreach ($inputsEndereco as $key => $value)
            {
                // Remove do array toda CHAVE com valor NULL
                if ($value == null || !isset($value))
                {
                    unset($inputsEndereco[$key]);
                }
            }

            if($user->endereco == null){
                // Se NÃO tiver ENDEREÇO cadastrado
                $endereco->fill($inputsEndereco);
                $user->endereco()->save($endereco);
            }
            else{
                // Se tiver ENDEREÇO cadastrado
                $user->endereco->fill($inputsEndereco);
                $user->endereco()->save($user->endereco);
            }


            //
            // fim do update do endereço do user
            //

            return Redirect::route('estudantes.index');
        }
        else
        {
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if($user->endereco->comprovante != null){
            Storage::disk('public')->delete($user->endereco->comprovante ?? '');
        }
        if($user->photo != null){
            Storage::disk('public')->delete($user->photo ?? '');
        }
        $user->delete();

        return Redirect::route('estudantes.index');
    }

    private function senhasIguais($password, $confirmPassword)
    {
        if ($password === $confirmPassword)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    private function inserirImagem($reqImagem, $disk, $modelImagem)
    {
        if ($reqImagem != null && $reqImagem->isValid())
        {
            if (!empty($reqImagem))
            {
                // Apaga foto adicionada anteriormente
                Storage::disk('public')->delete($modelImagem ?? '');
            }
            $path = $reqImagem->store($disk, 'public');
            return $path;
        }
        else
        {
            return null;
        }
    }
}
