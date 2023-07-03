<header>
    <nav class="navbar-light flex items-center justify-between h-16 bg-sky-100">
        <div class="mb-6 md:mb-0">
            <a href="/" class="flex items-center">
              <div>
                <img src="{{asset('img/Logotipo.png')}}" class="h-16 w-16" alt="Logo">
              </div>
              <span class="self-center text-lg font-semibold whitespace-nowrap dark:text-blue-700">Energy Monitor</span>
            </a>
          </div>
        
        <ul class="flex space-x-4 sm:-my-px font-semibold">         
            <li><a href="{{ route('login') }}" class="text-blue-700">Entrar</a></li>
            <li><a href="{{ route('register') }}" class="text-blue-700 mr-4">Cadastrar</a></li>           
            @auth
            <li><a href="/dashboard">Home</a></li>
            <li><a href="/contato">Contato</a></li>
            @endauth
        </ul>
    </nav>
</header>


