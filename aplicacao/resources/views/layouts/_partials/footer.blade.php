<footer class="bg-white dark:bg-white">
  <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-3">
    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-2" />
    <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
      <div class="mb-6 md:mb-0">
        <a href="dashboard" class="flex items-center">
          <div>
            <img src="{{asset('img/Logotipo.png')}}" class="h-16 w-16" alt="Logo">
          </div>
          <span class="self-center text-lg font-semibold whitespace-nowrap dark:text-blue-700">Energy Monitor</span>
        </a>
      </div>
      
      <div class="flex space-x-1 ml-auto">
        <div class="hover:underline">
          <x-nav-link :href="route('sobre')" :active="request()->routeIs('sobre')">
            {{ __('Sobre') }}
          </x-nav-link>
        </div>
        <div class="hover:underline">
          <x-nav-link :href="route('time')" :active="request()->routeIs('time')">
            {{ __('Team') }}
          </x-nav-link>
        </div>
      </div>
      
        <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
          <li>
            <a href="https://github.com/davifurao/Energy-Monitor" rel="noreferrer" target="_blank"
              class="text-gray-700 transition hover:opacity-75">
              <span class="sr-only">GitHub</span>
              <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0,0,256,256"
                style="fill:#000000;">
                <g fill="#1d4ed8" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                  stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                  font-family="none" font-weight="none" font-size="none" text-anchor="none"
                  style="mix-blend-mode: normal">
                  <g transform="scale(10.66667,10.66667)">
                    <path
                      d="M10.9,2.1c-4.6,0.5 -8.3,4.2 -8.8,8.7c-0.5,4.7 2.2,8.9 6.3,10.5c0.3,0.1 0.6,-0.1 0.6,-0.5v-1.6c0,0 -0.4,0.1 -0.9,0.1c-1.4,0 -2,-1.2 -2.1,-1.9c-0.1,-0.4 -0.3,-0.7 -0.6,-1c-0.3,-0.1 -0.4,-0.1 -0.4,-0.2c0,-0.2 0.3,-0.2 0.4,-0.2c0.6,0 1.1,0.7 1.3,1c0.5,0.8 1.1,1 1.4,1c0.4,0 0.7,-0.1 0.9,-0.2c0.1,-0.7 0.4,-1.4 1,-1.8c-2.3,-0.5 -4,-1.8 -4,-4c0,-1.1 0.5,-2.2 1.2,-3c-0.1,-0.2 -0.2,-0.7 -0.2,-1.4c0,-0.4 0,-1 0.3,-1.6c0,0 1.4,0 2.8,1.3c0.5,-0.2 1.2,-0.3 1.9,-0.3c0.7,0 1.4,0.1 2,0.3c1.3,-1.3 2.8,-1.3 2.8,-1.3c0.2,0.6 0.2,1.2 0.2,1.6c0,0.8 -0.1,1.2 -0.2,1.4c0.7,0.8 1.2,1.8 1.2,3c0,2.2 -1.7,3.5 -4,4c0.6,0.5 1,1.4 1,2.3v2.6c0,0.3 0.3,0.6 0.7,0.5c3.7,-1.5 6.3,-5.1 6.3,-9.3c0,-6 -5.1,-10.7 -11.1,-10z">
                    </path>
                  </g>
                </g>
              </svg>
            </a>
          </li>
        </ul>
    </div>
  </div>
</footer>
