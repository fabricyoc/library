@extends('_layouts2.default')

@section('content')
<!-- Stats Row Starts Here -->
<div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
    <div class="shadow-lg bg-red-vibrant border-l-8 hover:bg-red-vibrant-dark border-red-vibrant-dark mb-2 p-2 md:w-full mx-2">
        <div class="p-4 flex flex-col">
            <a href="#" class="no-underline text-white text-2xl font-bold">
                Estudantes
            </a>
        </div>
    </div>
</div>
<!-- Stats Row Starts Here -->



<!--Grid Form-->
<div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-4 mt-2">
    <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
        <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b flex justify-between">
            <div >
                Full table
            </div>
            <div title="Cadastrar estudante">
                {{-- <button data-modal="centeredFormModal" class="bg-green-400 hover:bg-green-600 hover:shadow cursor-pointer rounded text-white p-1 mx-1"> --}}
                <button data-modal="centeredFormModal" class="modal-trigger bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">
                    <i class="fas fa-plus"></i>
                    {{-- Cadastrar estudante --}}
                </button>
            </div>
        </div>
        <div class="p-3">
            <table class="table-responsive w-full rounded">
                <thead>
                  <tr>
                    <th class="border w-1/6 px-4 py-2">Foto</th>
                    <th class="border w-1/4 px-4 py-2">Nome</th>
                    <th class="border w-1/4 px-4 py-2">E-mail</th>
                    {{-- <th class="border w-1/6 px-4 py-2">E-mail</th> --}}
                    <th class="border w-1/6 px-4 py-2">Telefone</th>
                    <th class="border w-1/7 px-4 py-2" title="Cadastro Completo?">Status</th>
                    <th class="border w-1/5 px-4 py-2">Ações</th>
                  </tr>
                </thead>
                <tbody>
                    @if ($estudantes->count() > 0)
                    @foreach ($estudantes as $e)
                            <tr>
                                <td class="border px-4 py-2">
                                    <img
                                        class="w-20 h-20 mx-auto rounded-full"
                                        alt=""
                                        src="@if (isset($e->photo))
                                                @if (str_contains($e->photo, '//'))
                                                    {{-- Photo do factory --}}
                                                    {{$e->photo}}
                                                @else
                                                    {{-- Photo inserida pelo user --}}
                                                    {{Storage::url($e->photo)}}
                                                @endif
                                            @else
                                                {{-- Sem photo de nada! --}}
                                                {{Storage::url('imgs/sem-foto.png')}}
                                            @endif"
                                    >
                                </td>
                                <td class="border px-4 py-2">{{$e->name}}
                                </td>
                                <td class="border px-4 py-2">{{$e->email}}</td>
                                <td class="border px-4 py-2">{{$e->telephone}}</td>
                                <td class="border px-4 py-2 text-center">
                                    @if (isset($e->endereco))
                                        <i class="fas fa-check text-green-500 mx-2"></i>
                                    @else
                                        <a href="{{route('estudantes.edit', $e->id)}}" title="Completar cadastro...">
                                            <i class="fas fa-times text-red-500 mx-2"></i>
                                        </a>
                                    @endif
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    <a href="{{route('estudantes.show', $e->id)}}" title="Ver" class="bg-teal-300 cursor-pointer rounded-md p-1.5 mx-1 text-white">
                                            <i class="fas fa-eye sm:my-2.5"></i></a>
                                    <a href="{{route('estudantes.edit', $e->id)}}" title="Editar" class="bg-teal-300 cursor-pointer rounded-md p-1.5 mx-1 text-white">
                                            <i class="fas fa-edit sm:my-2.5"></i></a>
                                    <a title="Excluir" class="bg-teal-300 cursor-pointer rounded-md p-1.5 mx-1 text-red-500">
                                            <i class="fas fa-trash sm:my-2.5"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else

                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--/Grid Form-->

{{-- Modal create --}}
@include('estudantes.create')
{{-- /Modal create --}}

@endsection
