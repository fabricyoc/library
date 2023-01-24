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
                    <th class="border w-1/6 px-4 py-2">E-mail</th>
                    <th class="border w-1/6 px-4 py-2">Telefone</th>
                    <th class="border w-1/7 px-4 py-2">Status</th>
                    <th class="border w-1/5 px-4 py-2">Ações</th>
                  </tr>
                </thead>
                <tbody>
                    @if ($estudantes->count() > 0)
                    @foreach ($estudantes as $e)
                            <tr>
                                <td class="border px-4 py-2">
                                    <img
                                        src="
                                            @if (str_contains($e->photo, 'perfil/'))
                                                {{Storage::url($e->photo)}}
                                                @else
                                                {{-- Abaixo pega as imagens do fake (server quebrado) --}}
                                                {{-- {{$e->photo}} --}}

                                                {{-- Abaixo pega a imagem sem-foto.png --}}
                                                {{Storage::url('imgs/sem-foto.png')}}
                                            @endif"
                                        alt="Sem foto"
                                    >

                                </td>
                                <td class="border px-4 py-2">{{$e->name}}</td>
                                <td class="border px-4 py-2">{{$e->email}}</td>
                                <td class="border px-4 py-2">{{$e->telephone}}</td>
                                <td class="border px-4 py-2">
                                    <i class="fas fa-check text-green-500 mx-2"></i>
                                    {{-- <i class="fas fa-times text-red-500 mx-2"></i> --}}
                                </td>
                                <td class="border px-4 py-2">
                                    <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                            <i class="fas fa-eye"></i></a>
                                    <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                            <i class="fas fa-edit"></i></a>
                                    <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500">
                                            <i class="fas fa-trash"></i>
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
