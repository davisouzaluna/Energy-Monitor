<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    </head>
    <body>

        @include('layouts._partials.header')

        <main>
            @yield('conteudo')
        </main>

        @include('layouts._partials.footer')



</body>
</html>


