@extends('_layouts2.default')

@section('content')
    <!-- Stats Row Starts Here -->
    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
        <a
            href="{{route('estudantes.index')}}"
            class="shadow-lg bg-red-vibrant hover:bg-red-vibrant-dark
                    border-l-8 border-red-vibrant-dark
                    mb-2 p-2 md:w-1/4 mx-2"
        >
                <div class="p-4 flex flex-col no-underline text-white text-2xl">
                    Estudantes
                </div>
        </a>

        <div class="shadow bg-info border-l-8 hover:bg-info-dark border-info-dark mb-2 p-2 md:w-1/4 mx-2">
            <div class="p-4 flex flex-col">
                <a href="#" class="no-underline text-white text-2xl">
                    Funcionários
                </a>
                {{-- <a href="#" class="no-underline text-white text-lg"></a> --}}
            </div>
        </div>

        <div class="shadow bg-warning border-l-8 hover:bg-warning-dark border-warning-dark mb-2 p-2 md:w-1/4 mx-2">
            <div class="p-4 flex flex-col">
                <a href="#" class="no-underline text-white text-2xl">
                    Livros
                </a>
                {{-- <a href="#" class="no-underline text-white text-lg"></a> --}}
            </div>
        </div>

        <div class="shadow bg-success border-l-8 hover:bg-success-dark border-success-dark mb-2 p-2 md:w-1/4 mx-2">
            <div class="p-4 flex flex-col">
                <a href="{{route('emprestimos.index')}}" class="no-underline text-white text-2xl">
                    Empréstimos
                </a>
                {{-- <a href="#" class="no-underline text-white text-lg"></a> --}}
            </div>
        </div>
    </div>
    <!-- /Stats Row Ends Here -->



    <!-- Card Sextion Starts Here -->
    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

        <!-- card -->

        <div class="rounded overflow-hidden shadow bg-white mx-2 w-full">
            <div class="px-6 py-2 border-b border-light-grey">
                <div class="font-bold text-xl">Estatísticas</div>
            </div>
            <div class="table-responsive">
                <table class="table text-grey-darkest">
                    <thead class="bg-grey-dark text-white text-normal">
                    <tr>
                        {{-- <th scope="col">#</th> --}}
                        <th scope="col">Grupo</th>
                        <th scope="col">Total de Cadastros</th>
                        {{-- <th scope="col">Current</th> --}}
                        {{-- <th scope="col">Change</th> --}}
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        {{-- <th scope="row">1</th> --}}
                        <td>
                            <button class="bg-red-vibrant hover:bg-red-vibrant-dark text-white font-light py-1 px-2 rounded-full">
                                Estudantes
                            </button>
                        </td>
                        <td>{{number_format($totEstudantes, null, ",", ".")}}</td>
                        {{-- <td>4600</td> --}}
                        {{-- <td>
                            <span class="text-green-500"><i class="fas fa-arrow-up"></i>5%</span>
                        </td> --}}
                    </tr>
                    <tr>
                        {{-- <th scope="row">2</th> --}}
                        <td>
                            <button class="bg-info hover:bg-info-dark text-white font-light py-1 px-2 rounded-full">
                                Funcionários
                            </button>
                        </td>
                        <td>{{number_format($totFuncionarios, null, ",", ".")}}</td>
                        {{-- <td>3000</td> --}}
                        {{-- <td>
                            <span class="text-red-500"><i class="fas fa-arrow-down"></i>65%</span>
                        </td> --}}
                    </tr>

                    <tr>
                        {{-- <th scope="row">3</th> --}}
                        <td>
                            <button class="bg-warning hover:bg-warning-dark text-white font-light py-1 px-2 rounded-full">
                                Livros
                            </button>
                        </td>
                        <td>{{number_format($totLivros, null, ",", ".")}}</td>
                        {{-- <td>3000</td> --}}
                        {{-- <td>
                            <span class="text-red-500"><i class="fas fa-arrow-down"></i>65%</span>
                        </td> --}}
                    </tr>

                    <tr>
                        {{-- <th scope="row">4</th> --}}
                        <td>
                            <button class="bg-success hover:bg-success-dark text-white font-light py-1 px-2 rounded-full">
                                Empréstimos
                            </button>
                        </td>
                        <td>#####</td>
                        {{-- <td>3000</td> --}}
                        {{-- <td>
                            <span class="text-green-500"><i class="fas fa-arrow-up"></i>65%</span>
                        </td> --}}
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- /card -->

    </div>
    <!-- /Cards Section Ends Here -->
@endsection

