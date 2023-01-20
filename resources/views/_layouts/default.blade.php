<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title>Biblioteca</title>
    </head>
    <body>
        <div>
            @include('_layouts.header')
        </div>

        <div class="p-2 m-4">
            @yield('content')
        </div>

        <div>
            @include('_layouts.footer')
        </div>
    </body>
</html>
