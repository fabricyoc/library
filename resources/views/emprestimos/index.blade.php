@extends('_layouts2.default')

@section('content')
<!-- Stats Row Starts Here -->
<div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
    <div class="shadow-lg bg-success border-l-8 hover:bg-success-dark border-success-dark mb-2 p-2 md:w-full mx-2">
        <div class="p-4 flex flex-col">
            <a href="#" class="no-underline text-white text-2xl font-bold">
                Empréstimos
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

            {{-- Teste --}}
            {{-- dd(empty($estudantes[2]->livros)); --}}

            {{-- @foreach ($estudantes as $e)
                <br>
                {{$e->name}}

                @foreach ($e->livros as $livro)
                {{$livro->pivot->user_id}}
                @endforeach
            @endforeach --}}
            {{-- Fim Teste --}}

            <div class="flex space-x-3">
                {{-- Pesquisar estudante --}}
                <form action="{{route('emprestimos.index')}}" method="get">
                    <div class="w-full flex justify-end items-center relative">
                        <input
                            class="flex appearance-none block w-full bg-white text-grey-darker border rounded py-2 px-2 pr-10 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600 border-gray-200"
                            type="text"
                            placeholder="Pesquisar por estudante..."
                            name="pesquisar"
                            id="pesquisar"
                            value="{{request()->pesquisar}}"
                        >
                        @if (isset($aviso) && $aviso == true)
                            {{-- Filtro ativado --}}
                            <a href="{{route('emprestimos.index')}}" class="absolute p-2" title="Sair do filtro">
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

                <button data-modal="centeredFormModal" class="modal-trigger bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded" title="Cadastrar empréstimo">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="p-3">
            <table class="table-responsive w-full rounded">
                <thead>
                  <tr>
                    <th class="border w-1/4 px-4 py-2">Estudante</th>
                    <th class="border w-1/4 px-4 py-2">Livro</th>
                    <th class="border w-1/6 px-4 py-2">Data do empréstimo</th>
                    <th class="border w-1/6 px-4 py-2">Devolução</th>
                    <th class="border w-1/8 px-4 py-2" title="É possível renovar?">Renovação</th>
                    <th class="border w-1/6 px-6 py-2">Ações</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($estudantes as $e)
                        @if (!empty($e->livros))
                            @foreach ($e->livros as $livro)

                            {{-- Renovar por mais 15 dias --}}
                            {{-- {{date('d/m/Y', strtotime('+15 days', strtotime($livro->pivot->devolucao)))}} --}}

                                <tr>
                                    <td class="border px-4 py-2">{{ucwords($e->name)}}</td>
                                    <td class="border px-4 py-2">{{ucwords($livro->titulo)}}</td>
                                    {{-- Data de empréstimo --}}
                                    <td class="border px-4 py-2">{{date('d/m/Y', strtotime($livro->pivot->created_at))}}</td>
                                    {{-- Data de devolução --}}
                                    <td class="border px-4 py-2">{{date('d/m/Y', strtotime($livro->pivot->devolucao))}}</td>
                                    <td class="border px-4 py-2 text-center">
                                        @if ($livro->pivot->renovacao == false)
                                            <form action="{{route('emprestimos.update', $livro->pivot->id)}}" method="post">
                                                @csrf
                                                @method('put')

                                                <button>
                                                    <i class="fas fa-check text-green-500 mx-2" title="Renovar por mais 15 dias"></i>
                                                </button>
                                            </form>
                                        @else
                                            <i class="fas fa-times text-red-500 mx-2" title="Já houve renovação"></i>
                                        @endif
                                    </td>
                                    <td class="border px-4 py-2 text-center">
                                        {{-- <a href="#" title="Ver" class="bg-teal-300 cursor-pointer rounded-md p-1.5 mx-1 text-white">
                                            <i class="fas fa-eye sm:my-2.5"></i></a> --}}
                                        <a href="{{route('emprestimos.destroy', $livro->pivot->id)}}" title="Devolver livro" class="bg-teal-300 cursor-pointer rounded-md p-1.5 mx-1 text-white">
                                            <i class="fas fa-book sm:my-2.5"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--/Grid Form-->



{{-- Modal create --}}
@include('emprestimos.create')
{{-- /Modal create --}}
@endsection
