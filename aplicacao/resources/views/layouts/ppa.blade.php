<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
    </head>
    <body>
        <header>
        <nav class="navbar">
        <img src="/img/Logotipo.png" alt="Logotipo" class="h-16 w-auto bg-gray-100 dark:bg-gray-900">

        <ul class="nav-menu">
            <li><a href="/dashboard">Home</a></li>
            <li><a href="/contato">Contato</a></li>
        </ul>
    </nav>   
        </header>
        <style>
    header {
        margin-bottom: 20px; /* adiciona margem inferior para dar mais espaço para a navbar */
    }

    .navbar {
        background-color: #B9C6EC;
        color: white;
        font-family: Arial, sans-serif;
        height: 90px; /* define a altura da navbar */
        padding: 10px;
        display: flex;
        justify-content: center;
    }

    .nav-menu {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        margin-left: auto;
    }

    .nav-menu li {
        margin-right: 20px;
    }

    .nav-menu li a {
        color: white;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    .nav-menu li a:hover {
        color: #d4d4d4;
    }
</style>


  
        <main>
            @yield('content')
        </main>
        
        <footer>
            <p>&copy; 2023 - Todos os direitos reservados</p>
        </footer>