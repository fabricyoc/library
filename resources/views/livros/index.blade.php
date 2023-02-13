@extends('_layouts2.default')

@section('content')
<!-- Stats Row Starts Here -->
<div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
    <div class="shadow-lg bg-warning border-l-8 hover:bg-warning-dark border-warning-dark mb-2 p-2 md:w-full mx-2">
        <div class="p-4 flex flex-col">
            <a href="#" class="no-underline text-white text-2xl font-bold">
                Livros
            </a>
        </div>
    </div>
</div>
<!-- Stats Row Starts Here -->

<!--Grid Form-->
<div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-4 mt-2">
    <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
        <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b flex justify-between">
            <div class="text-gray-600">
                Todos os livros
            </div>
            <div class="flex space-x-3">
                {{-- Pesquisar estudante --}}
                <form action="" method="get">
                    <div class="w-full flex justify-end items-center relative">
                        <input
                            class="flex appearance-none block w-full bg-white text-grey-darker border rounded py-2 px-2 pr-10 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600 border-gray-200"
                            type="text"
                            placeholder="Pesquisar por livro..."
                            name="pesquisar"
                            id="pesquisar"
                            value="{{request()->pesquisar}}"
                        >
                        @if (isset($aviso) && $aviso == true)
                            {{-- Filtro ativado --}}
                            <a href="" class="absolute p-2" title="Sair do filtro">
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
                {{-- Pesquisar estudante --}}

                {{-- <button data-modal="centeredFormModal" class="bg-green-400 hover:bg-green-600 hover:shadow cursor-pointer rounded text-white p-1 mx-1"> --}}
                <button data-modal="centeredFormModal" class="modal-trigger bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded" title="Cadastrar estudante">
                    <i class="fas fa-plus"></i>
                    {{-- Cadastrar estudante --}}
                </button>
            </div>
        </div>
        <div class="p-3">
            <table class="table-responsive w-full rounded">
                <thead>
                  <tr>
                    <th class="border w-1/4 px-4 py-2">Título</th>
                    <th class="border w-1/4 px-4 py-2">Autor</th>
                    <th class="border w-1/4 px-4 py-2">Assunto</th>
                    <th class="border w-1/7 px-4 py-2" title="Total de livros no estoque">Acervo</th>
                    <th class="border w-1/7 px-4 py-2" title="Total de livros emprestados">Empres.</th>
                    <th class="border w-1/6 px-4 py-2">Ações</th>
                  </tr>
                  @if ($livros->count() > 0)
                    @foreach ($livros as $livro)
                        <tr>
                            <td class="border px-4 py-2">{{ucwords($livro->titulo)}}
                            <td class="border px-4 py-2">{{ucwords($livro->autor)}}
                            <td class="border px-4 py-2">{{ucwords($livro->assunto)}}
                            <td class="border px-4 py-2" title="Total de livros no estoque">{{$livro->totLivro}}
                            <td class="border px-4 py-2" title="Total de livros emprestados">{{$livro->emprestimo}}
                            <td class="border px-4 py-4 sm:space-y-1 sm:space-x-1 text-center">
                                <a href="" title="Ver" class="bg-teal-300 cursor-pointer rounded-md p-1.5 text-white">
                                    <i class="fas fa-eye sm:my-2.5"></i>
                                </a>
                                <a href="{{route('livros.edit', $livro->id)}}" title="Editar" class="bg-teal-300 cursor-pointer rounded-md p-1.5 text-white">
                                    <i class="fas fa-edit sm:my-2.5"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                  @else

                  @endif
                </thead>

                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
