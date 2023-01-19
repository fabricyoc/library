<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // dd($users->load('livros')->load('endereco')->toArray());
        // return $users[0]->endereco->numero;

        $users = User::all();
        return view('users.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        //
    }

    public function store(UserStoreUpdateRequest $request)
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

    public function update(UserStoreUpdateRequest $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
