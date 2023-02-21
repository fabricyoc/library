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
            <div class="no-underline text-white text-2xl font-bold" title="Leitor(es) que está(ão) com livro">
                Leitor(es)
            </div>
        </div>
    </div>
</div>
<!-- Stats Row Starts Here -->

<!--Grid de leitores com o livro XYZ-->
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
            <div class="text-sm text-center text-gray-600">
                Abaixo estão todos os leitores que possuem a posse desse livro
            </div>
        </div>

        {{-- Corpo --}}
        <div class="p-3">

            {{-- Leitores --}}
            <div class="flex flex-wrap w-full space-x-0.5">
                @foreach ($leitores as $leitor)
                    <!--Leitores do livro XYZ-->
                        <div class="w-36 my-3 overflow-hidden shadow rounded rounded-t-lg">
                            {{-- <img src="https://i.imgur.com/w1Bdydo.jpg" alt="" class="w-full"> --}}
                            <div class="w-full bg-gray-400 h-28"></div>

                            <div class="flex justify-center -mt-8">
                                <img alt="" class="w-20 h-20 rounded-full border-solid border-white border-2 -mt-3 bg-white"
                                src="@if (isset($leitor->photo))
                                        @if (str_contains($leitor->photo, 'http'))
                                            {{$leitor->photo}}
                                        @else
                                            {{Storage::url($leitor->photo)}}
                                        @endif
                                    @else
                                        {{Storage::url('imgs/sem-foto.png')}}
                                    @endif"
                                >
                            </div>

                            <div class="text-center px-3 pb-6 pt-2">
                                <h3 class="text-black text-md bold font-sans">
                                    @if ($leitor->type == 'admin')
                                        <a class="hover:underline hover:underline-offset-4 hover:text-blue-400"
                                            href="{{ route('funcionarios.show', $leitor->id) }}"
                                        >
                                            {{ucwords($leitor->name)}}
                                        </a>
                                        <label class="text-red-500 font-bold" title="Funcionário">*</label>
                                    @else
                                        <a class="hover:underline hover:underline-offset-4 hover:text-blue-400"
                                            href="{{ route('estudantes.show', $leitor->id) }}"
                                        >
                                            {{ucwords($leitor->name)}}
                                        </a>
                                    @endif
                                </h3>
                            </div>

                        </div>
                    <!--Leitores do livro XYZ-->
                @endforeach
            </div>
            {{-- Leitores --}}

        </div>

    </div>
</div>

@endsection
