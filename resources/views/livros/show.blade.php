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
                Exibir
            </div>
        </div>
    </div>
</div>
<!-- Stats Row Starts Here -->


<!--Grid form show livro-->
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
                            class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600 border-gray-200"
                            id="titulo" name="titulo" type="text" placeholder="Digite o título" value="{{old('titulo', ucwords($livro->titulo))}}" disabled>

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
                            id="autor" name="autor" type="text" placeholder="Digite o nome do autor" value="{{old('autor', $livro->autor)}}" disabled>
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
                            id="assunto" name="assunto" type="text" placeholder="Digite o assunto" value="{{old('assunto', ucwords($livro->assunto))}}" disabled>

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
                            id="genero" name="genero" type="text" placeholder="Digite o gênero" value="{{old('genero', ucwords($livro->genero))}}" disabled>
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
                            id="nacionalidade" name="nacionalidade" type="text" placeholder="Digite o nome do autor" value="{{old('nacionalidade', ucwords($livro->nacionalidade))}}" disabled>
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
                            id="totLivro" name="totLivro" type="number" min="0" placeholder="Digite o total de livros" value="{{old('totLivro', $livro->totLivro)}}" disabled>

                            @error('totLivro')
                                <p class="text-red-500 text-xs italic">
                                    {{$message}}
                                </p>
                            @enderror

                    </div>
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
                            id="numPropria" name="numPropria" type="text" placeholder="Digite a numeração" value="{{old('numPropria', $livro->numPropria)}}" disabled>
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
                            id="dataAquisicao" name="dataAquisicao" type="date" placeholder="Digite o nome do autor" value="{{old('dataAquisicao', $livro->dataAquisicao)}}" disabled>
                        @error('dataAquisicao')
                            <p class="text-red-500 text-xs italic">
                                {{$message}}
                            </p>
                        @enderror
                    </div>
                </div>

                {{-- Botões --}}
                <div class="mt-3 flex justify-between">
                    <div>
                        <a href="{{route('livros.index')}}">
                            <input type="button" value="Voltar" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer">
                        </a>
                    </div>
                    <div>
                        <a href="{{route('livros.edit', $livro->id)}}">
                            <input type="button" value="Editar" class='bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded' title="Ir editar livro">
                        </a>
                    </div>
                </div>
        </div>
    </div>
</div>
<!--/Grid form show livro-->


@endsection
