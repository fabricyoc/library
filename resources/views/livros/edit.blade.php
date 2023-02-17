@extends('_layouts2.default')

@section('content')
<!-- Stats Row Starts Here -->
<div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
    <div class="shadow-lg bg-warning border-l-8 hover:bg-warning-dark border-warning-dark mb-2 p-2 md:w-full mx-2">
        <div class="p-4 flex justify-between">
            <div class="no-underline text-white text-2xl font-bold">
                Livros
            </div>
            <div class="no-underline text-white text-2xl font-bold">
                ~
            </div>
            <div class="no-underline text-white text-2xl font-bold" title="Editar dados do estudante">
                Editar
            </div>
        </div>
    </div>
</div>
<!-- Stats Row Starts Here -->


<form action="{{route('livros.update', $livro->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <!--Grid form edit livro-->
    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-4">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">

            {{-- Cabeçalho --}}
            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b flex-wrap">
                <img src="@if (isset($livro->imagem))
                            @if (str_contains($livro->imagem, 'http'))
                                {{$livro->imagem}}
                            @else
                                {{Storage::url($livro->imagem)}}
                            @endif
                        @else
                            {{Storage::url('imgs/sem-livro.png')}}
                        @endif"
                    alt="Sem foto" class="w-32 h-32 mx-auto rounded border-solid border-2 border-gray-300 hover:border-gray-400"
                >
                <div class="tracking-wide font-bold text-lg text-center">
                    {{ucwords($livro->titulo)}}
                </div>
            </div>
            {{-- Cabeçalho --}}

            <div class="p-3">
                    {{-- Título e autor --}}
                    <div class="flex flex-wrap -mx-3 mb-2">
                        {{-- Título --}}
                        <div class="w-full md:w-1/2 px-3 mb-2 md:mb-1">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="titulo">
                                Título
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                                    @if ($errors->has('titulo'))
                                        border-red-500
                                    @else
                                        border-gray-200
                                    @endif"
                                id="titulo" name="titulo" type="text" placeholder="Digite o título" value="{{old('titulo', ucwords($livro->titulo))}}">

                                @error('titulo')
                                    <p class="text-red-500 text-xs italic">
                                        {{$message}}
                                    </p>
                                @enderror

                        </div>
                        {{-- autor --}}
                        <div class="w-full md:w-1/2 px-3 mb-2 md:mb-1">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="autor">
                                Autor
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                                @if ($errors->has('autor'))
                                    border-red-500
                                @else
                                    border-gray-200
                                @endif"
                                id="autor" name="autor" type="text" placeholder="Digite o nome do autor" value="{{old('autor', $livro->autor)}}">
                            @error('autor')
                                <p class="text-red-500 text-xs italic">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                    </div>

                    {{-- Assunto, gênero e nacionalidade --}}
                    <div class="flex flex-wrap -mx-3 mb-2">
                        {{-- Assunto --}}
                        <div class="w-full md:w-1/3 px-3 mb-2 md:mb-1">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="assunto">
                                Assunto
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                                    @if ($errors->has('assunto'))
                                        border-red-500
                                    @else
                                        border-gray-200
                                    @endif"
                                id="assunto" name="assunto" type="text" placeholder="Digite o assunto" value="{{old('assunto', ucwords($livro->assunto))}}">

                                @error('assunto')
                                    <p class="text-red-500 text-xs italic">
                                        {{$message}}
                                    </p>
                                @enderror

                        </div>
                        {{-- gênero --}}
                        <div class="w-full md:w-1/3 px-3 mb-2 md:mb-1">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="genero">
                                Gênero
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                                @if ($errors->has('genero'))
                                    border-red-500
                                @else
                                    border-gray-200
                                @endif"
                                id="genero" name="genero" type="text" placeholder="Digite o gênero" value="{{old('genero', ucwords($livro->genero))}}">
                            @error('genero')
                                <p class="text-red-500 text-xs italic">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                        {{-- nacionalidade --}}
                        <div class="w-full md:w-1/3 px-3 mb-2 md:mb-1">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="nacionalidade">
                                Nacionalidade
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                                @if ($errors->has('nacionalidade'))
                                    border-red-500
                                @else
                                    border-gray-200
                                @endif"
                                id="nacionalidade" name="nacionalidade" type="text" placeholder="Digite o nome do autor" value="{{old('nacionalidade', ucwords($livro->nacionalidade))}}">
                            @error('nacionalidade')
                                <p class="text-red-500 text-xs italic">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                    </div>

                    {{-- totLivros, emprestimo, numPropria e dataAquisicao --}}
                    <div class="flex flex-wrap -mx-3 mb-2">
                        {{-- totLivros --}}
                        <div class="w-full md:w-1/3 px-3 mb-2 md:mb-1">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="totLivro">
                                Total de Livros
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                                    @if ($errors->has('totLivro'))
                                        border-red-500
                                    @else
                                        border-gray-200
                                    @endif"
                                id="totLivro" name="totLivro" type="number" min="0" placeholder="Digite o total de livros" value="{{old('totLivro', $livro->totLivro)}}">

                                @error('totLivro')
                                    <p class="text-red-500 text-xs italic">
                                        {{$message}}
                                    </p>
                                @enderror

                        </div>

                        {{-- emprestimo --}}
                        {{-- <div class="w-full md:w-1/4 px-3 mb-2 md:mb-1">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="emprestimo">
                                Empréstimos
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                                @if ($errors->has('emprestimo'))
                                    border-red-500
                                @else
                                    border-gray-200
                                @endif"
                                id="emprestimo" name="emprestimo" type="number" min="0" placeholder="Digite o total de empréstimos" value="{{old('emprestimo', $livro->emprestimo)}}">
                            @error('emprestimo')
                                <p class="text-red-500 text-xs italic">
                                    {{$message}}
                                </p>
                            @enderror
                        </div> --}}

                        {{-- numPropria --}}
                        <div class="w-full md:w-1/3 px-3 mb-2 md:mb-1">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="numPropria">
                                Numeração Própria
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                                @if ($errors->has('numPropria'))
                                    border-red-500
                                @else
                                    border-gray-200
                                @endif"
                                id="numPropria" name="numPropria" type="text" placeholder="Digite a numeração" value="{{old('numPropria', $livro->numPropria)}}">
                            @error('numPropria')
                                <p class="text-red-500 text-xs italic">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                        {{-- dataAquisicao --}}
                        <div class="w-full md:w-1/3 px-3 mb-2 md:mb-1">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="dataAquisicao">
                                Data de Aquisição
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                                @if ($errors->has('dataAquisicao'))
                                    border-red-500
                                @else
                                    border-gray-200
                                @endif"
                                id="dataAquisicao" name="dataAquisicao" type="date" placeholder="Digite o nome do autor" value="{{old('dataAquisicao', $livro->dataAquisicao)}}">
                            @error('dataAquisicao')
                                <p class="text-red-500 text-xs italic">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                    </div>

                    {{-- imagem --}}
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full md:w-1/2 px-3 mb-2 md:mb-1">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="imagem">
                                Imagem do livro
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-grey-darker border-gray-200 border rounded py-2.5 px-2 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                                id="imagem" name="imagem" type="file">
                            @error('imagem')
                                <p class="text-red-500 text-xs italic">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                    </div>

                    {{-- Botões --}}
                    <div class="mt-3 flex justify-between">
                        <div>
                            <button type="submit" class='bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded'>
                                Editar
                            </button>
                            <a href="{{route('livros.index')}}">
                                <input type="button" value="Voltar" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer">
                            </a>
                        </div>
                        <div>
                            <a href="{{route('livros.destroy', $livro->id)}}">
                                <input type="button" value="Excluir" class='bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded cursor-pointer' title="Essa ação excluirá o registro do livro">
                            </a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <!--/Grid form edit livro-->

</form>

@endsection
