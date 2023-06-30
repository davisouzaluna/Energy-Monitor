<header>
    
    
    <nav class="navbar flex items-center justify-between">
        <div>
            <img src="{{asset('img/Logotipo.png')}}" class="h-40 w-40" alt="Logo">
        </div>
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


