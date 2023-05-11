<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/contato">Contato</a></li>
                </ul>
            </nav>
        </header>
        
        <main>
            @yield('content')
        </main>
        
        <footer>
            <p>&copy; 2023 - Todos os direitos reservados</p>
        </footer>