@vite(['resources/css/app.css', 'resources/js/app.js'])

<nav x-data="{ open: false }" class="bg-[#B9C6EC] border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="navbar">
        <div class="flex h-40 pl-96"> <!-- Adicionadas as classes justify-center e items-center -->
            <!-- Logo -->
            <div>
                <a href="{{ route('dashboard') }}">
                    <img src="{{asset('img/Logotipo.png')}}" class="h-55 w-40" alt="Logo">
                </a>
            </div>
        </div>
        

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        
    </div>
</nav>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-[#B9C6EC] shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-[#B9C6EC] shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-[#B9C6EC] shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>

