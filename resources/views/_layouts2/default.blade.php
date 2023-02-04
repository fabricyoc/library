<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="keywords" content="tailwind,tailwindcss,tailwind css,css,starter template,free template,admin templates, admin template, admin dashboard, free tailwind templates, tailwind example">
        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <link rel="stylesheet" href="{{ asset('css/all.css') }}">
        <!-- /CSS -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
        <title>Biblioteca</title>
    </head>
    <body>
            <!--Container -->
            <div class="mx-auto bg-grey-400">
                <!--Screen-->
                <div class="min-h-screen flex flex-col">
                    @include('_layouts2.header')

                    <div class="flex flex-1">
                        @include('_layouts2.sidebar')

                        <!--Main - Miolo da página -->
                        <main class="bg-white-300 flex-1 p-3 overflow-hidden">
                            <div class="flex flex-col">
                                @yield('content')
                                {{-- @include('_layouts2.content') --}}
                            </div>
                        </main>
                        <!--/Main - Miolo da página-->

                    </div>
                    @include('_layouts2.footer')

                </div>

            </div>
            <script src="{{ asset('js/app.js') }}"></script>
            @stack('scripts')
    </body>
</html>
