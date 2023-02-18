@extends('_layouts2.default')

@section('content')
<!-- Stats Row Starts Here -->
<div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
    <div class="shadow-lg bg-info border-l-8 hover:bg-info-dark border-info-dark mb-2 p-2 md:w-full mx-2">
        <div class="p-4 flex flex-col">
            <a href="#" class="no-underline text-white text-2xl font-bold">
                Funcionários
            </a>
        </div>
    </div>
</div>
<!-- Stats Row Starts Here -->


<!--Grid form funcionários-->
<div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-4 mt-2">
    <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
        <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b flex justify-between">
            <div class="text-gray-600">
                Todos os funcionários
            </div>
            <div class="flex space-x-3">
                {{-- Pesquisar funcionário --}}
                <form action="{{route('funcionarios.index')}}" method="get">
                    <div class="w-full flex justify-end items-center relative">
                        <input
                            class="flex appearance-none block w-full bg-white text-grey-darker border rounded py-2 px-2 pr-10 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600 border-gray-200"
                            type="text"
                            placeholder="Pesquisar funcionário..."
                            name="pesquisar"
                            id="pesquisar"
                            value="{{request()->pesquisar}}"
                        >
                        @if (isset($aviso) && $aviso == true)
                            {{-- Filtro ativado --}}
                            <a href="{{route('funcionarios.index')}}" class="absolute p-2" title="Sair do filtro">
                                <i class="fas fa-search text-red-500"></i>
                            </a>
                        @else
                            {{-- Filtro não ativado --}}
                            <button class="absolute p-2">
                                <i class="fas fa-search"></i>
                            </button>
                        @endif

                    </div>
                </form>
                {{-- Pesquisar funcionário --}}

                {{-- Cadastrar funcionário --}}
                <button data-modal="createFuncionarioModal" class="modal-trigger bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded" title="Cadastrar funcionário">
                    <i class="fas fa-plus"></i>
                </button>
                {{-- Cadastrar funcionário --}}
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
                    @if ($funcionarios->count() > 0)
                    @foreach ($funcionarios as $f)
                            <tr>
                                <td class="border px-4 py-2">
                                    <img
                                        class="w-20 h-20 mx-auto rounded-full"
                                        alt=""
                                        src="@if (isset($f->photo))
                                                @if (str_contains($f->photo, '//'))
                                                    {{-- Photo do factory --}}
                                                    {{$f->photo}}
                                                @else
                                                    {{-- Photo inserida pelo user --}}
                                                    {{Storage::url($f->photo)}}
                                                @endif
                                            @else
                                                {{-- Sem photo de nada! --}}
                                                {{Storage::url('imgs/sem-foto.png')}}
                                            @endif"
                                    >
                                </td>
                                <td class="border px-4 py-2">{{$f->name}}
                                </td>
                                <td class="border px-4 py-2">{{$f->email}}</td>
                                <td class="border px-4 py-2">{{$f->telephone}}</td>
                                <td class="border px-4 py-2 text-center">
                                    @if (isset($f->endereco))
                                        <i class="fas fa-check text-green-500 mx-2"></i>
                                    @else
                                        <a href="{{route('funcionarios.edit', $f->id)}}" title="Completar cadastro...">
                                            <i class="fas fa-times text-red-500 mx-2"></i>
                                        </a>
                                    @endif
                                </td>
                                <td class="border px-4 py-4 sm:space-y-1 sm:space-x-1 text-center">
                                    <a href="{{route('funcionarios.show', $f->id)}}" title="Ver" class="bg-teal-300 cursor-pointer rounded-md p-1.5 text-white">
                                            <i class="fas fa-eye sm:my-2.5"></i>
                                    </a>
                                    <a href="{{route('funcionarios.edit', $f->id)}}" title="Editar" class="bg-teal-300 cursor-pointer rounded-md p-1.5 text-white">
                                            <i class="fas fa-edit sm:my-2.5"></i>
                                    </a>
                                    {{-- <a title="Excluir" class="bg-teal-300 cursor-pointer rounded-md p-1.5 text-red-500">
                                            <i class="fas fa-trash sm:my-2.5"></i>
                                    </a> --}}
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
<!--/Grid form funcionários-->


{{-- Modal create --}}
@include('funcionarios.create')
{{-- /Modal create--}}

@endsection
