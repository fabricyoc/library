@extends('_layouts.default')

@section('content')

@foreach ($users as $user)
        <label @if ($loop->even)
            class="bg-gray-300"
        @endif>
            Id: {{ $user->id }}
        </label> <br>
        Nome: {{ $user->name }} <br>
        @if (!empty($user->endereco))
            Logradouro: {{ $user->endereco->logradouro }}
        @else
            <label style="color: red;">
                Logradouro: Sem logradouro
            </label>
        @endif
        <br><hr><br>
    @endforeach
@endsection
