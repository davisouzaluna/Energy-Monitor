<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
    </head>
    <body>

        @include('layouts._partials.header')


        <main>
            @yield('content')
        </main>


        @include('layouts._partials.footer')


    </body>
</html>
