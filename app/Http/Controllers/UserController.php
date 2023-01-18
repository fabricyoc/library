<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        dd($users->load('endereco')->toArray());
        // return $users[0]->endereco->numero;
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
