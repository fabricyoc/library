<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

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

    public function store(UserStoreUpdateRequest $request)
    {
        dd($request->toArray());
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
}
