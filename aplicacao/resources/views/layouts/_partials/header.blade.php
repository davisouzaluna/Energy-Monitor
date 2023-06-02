<header>
    <nav class="navbar">
    <ul class="nav-menu">
        <li><a href="{{ route('login') }}">Entrar</a></li>
        <li><a href="{{ route('register') }}">Cadastrar</a></li>
        @auth
        <li><a href="/dashboard">Home</a></li>
        <li><a href="/contato">Contato</a></li>
        @endauth
    </ul>
</nav>
</header>


