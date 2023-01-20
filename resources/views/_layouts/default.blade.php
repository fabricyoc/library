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
        @include('_layouts.header')

        @yield('content')

        @include('_layouts.footer')
    </body>
</html>
