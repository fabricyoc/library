@extends('_layouts.default')

@section('content')
@foreach ($users as $user)
        Nome: {{ $user->name }} <br>
        @if (!empty($user->endereco->logradouro))
            Logradouro: {{ $user->endereco->logradouro }}
        @else
            <label style="color: red;">
                Logradouro: Sem logradouro
            </label>
        @endif
        <br><hr><br>
    @endforeach
@endsection
