<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <link rel="stylesheet" href="{{ asset('css/all.css') }}">
        <!-- /CSS -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
        <title>Biblioteca</title>
    </head>
    <body>
        <header class="bg-cover border-t-2 border-blue-600 h-full" style="background-image: url('https://ik.imagekit.io/q5edmtudmz/peter-lloyd-680526-unsplash_TYZn4kayG.jpg');">
            <div class="content px-8 py-2">

                {{-- Home e renovação --}}
                <nav class="flex items-center justify-between">
                    <h2 class="text-gray-200 font-bold text-2xl ">Home</h2>
                    <div class="auth flex items-center">
                        <button class="bg-transparent text-gray-200  p-2 rounded border border-gray-300 mr-4 hover:bg-gray-100 hover:text-gray-700" title="Clique para renovar o empréstimo de um livro">Renovação</button>
                    </div>
                </nav>

                {{-- Textos e formulário --}}
                <div class="body mt-20 mx-8">
                    <div class="md:flex items-center justify-between">
                        <div class="w-full md:w-1/2 mr-auto" style="text-shadow: 0 20px 50px hsla(0,0%,0%,8);">
                            <h1 class="text-4xl font-bold text-white tracking-wide">Biblioteca Cícero Úrsula</h1>
                            <h2 class=" text-2xl font-bold text-white tracking-wide">Seja bem-vindo<span class="text-gray-800 hover:text-white"> ao universo da leitura</span></h2>
                            <span class="text-white">Deseja se cadastrar?<a href="#" class="text-gray-900 text-lg ml-2 font-bold hover:underline">Clique aqui</a></span>
                        </div>

                        <div class="w-full md:max-w-md mt-6">
                            <div class="card bg-white shadow-md rounded-lg px-4 py-4 mb-6 ">
                                <form action="{{route('login.authenticate')}}" method="post">
                                    @csrf
                                    <div class="flex items-center justify-center">
                                        <h2 class="text-2xl font-bold tracking-wide mb-4">
                                            Entrar
                                        </h2>
                                    </div>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600 mb-2 text-lg
                                            @if ($errors->has('email'))
                                                border-red-500
                                            @else
                                                border-gray-200
                                            @endif"
                                        type="email"
                                        placeholder="Digite seu e-mail"
                                        name="email" id="email" value="{{old('email')}}">
                                        @error('email')
                                            <p class="text-red-500 text-xs italic mb-4">
                                                {{$message}}
                                            </p>
                                        @enderror

                                    <div>
                                        <div class="flex justify-end">
                                            <i id="verPassword" class="fas fa-eye sm:my-2.5 my-4 mr-2 cursor-pointer absolute text-gray-600 hover:text-gray-700"></i>
                                            {{-- <i class="fas fa-eye-slash sm:my-2.5"></i> --}}
                                        </div>
                                        <input
                                            class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600 mb-2 text-lg pr-8
                                                @if ($errors->has('password'))
                                                    border-red-500
                                                @else
                                                    border-gray-200
                                                @endif"
                                            type="password"
                                            placeholder="Digite sua senha"
                                            name="password" id="password">
                                            @error('password')
                                                <p class="text-red-500 text-xs italic mb-2">
                                                    {{$message}}
                                                </p>
                                            @enderror
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <a href="#" class="text-gray-600 hover:underline">Esqueceu a senha?</a>
                                        <button class="hover:bg-gray-900 bg-gray-800 text-gray-200 px-4 py-2 rounded">Entrar</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </header>

        <footer class="mt-8">
            <div class="content flex justify-between px-12 w-full mt-4 text-sm">
                {{-- Logo da Escola com Endereço --}}
                <div class="flex space-x-2 ">
                    <div>
                        <img
                            class="w-28"
                            src="{{ Storage::url('imgs/logo.jpg') }}"
                            alt="Sem logo"
                        >
                    </div>
                    <div>
                        <ul>
                            <li class="font-bold">Escola Estadual Professora Calpúrnia Caldas de Amorim</li>
                            <li>Rua Manoel Gonçalves de Melo, nº 42</li>
                            <li>CEP 59300-000</li>
                            <li>Caicó/RN - Brasil</li>
                        </ul>
                    </div>
                </div>

                {{-- Redes Sociais --}}
                <div class="sm:mx-6">
                    <ul>
                        <li class="font-bold" id="contatos">Contatos:</li>
                        <li class="flex space-x-2 mt-1">
                            <a target="_blank" title="Facebook" href="https://www.facebook.com/people/EECCAM/100063468046184/">
                                <img
                                    class="w-8"
                                    src="{{ Storage::url('imgs/facebook.png') }}"
                                    alt="Sem logo"
                                >
                            </a>
                            <a target="_blank" title="Instagram" href="https://www.instagram.com/eeccamoficial/">
                                <img
                                    class="w-8"
                                    src="{{ Storage::url('imgs/instagram.png') }}"
                                    alt="Sem logo"
                                >
                            </a>
                            <a target="_blank" title="Entre em contato" href="#">
                                <img
                                    class="w-8"
                                    src="{{ Storage::url('imgs/whatsapp.png') }}"
                                    alt="Sem logo"
                                >
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Informação do desenvolvedor --}}
                <div class="">
                    <ul>
                        <li class="font-bold">Desenvolvido por:</li>
                        <li class="flex space-x-2 mt-1">
                            <a target="_blank" title="GitHub" href="https://github.com/fabricyoc">
                                <img
                                    class="w-8"
                                    src="{{ Storage::url('imgs/github.png') }}"
                                    alt="Sem logo"
                                >
                            </a>
                            <a target="_blank" title="Instagram" href="https://www.instagram.com/fabricyoc/">
                                <img
                                    class="w-8"
                                    src="{{ Storage::url('imgs/instagram.png') }}"
                                    alt="Sem logo"
                                >
                            </a>
                            <a target="_blank" title="LinkedIn" href="https://www.linkedin.com/in/fabricyoc/">
                                <img
                                    class="w-8"
                                    src="{{ Storage::url('imgs/linkedin.png') }}"
                                    alt="Sem logo"
                                >
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>

        <script src="{{ asset('js/auth.js') }}"></script>
    </body>
</html>
