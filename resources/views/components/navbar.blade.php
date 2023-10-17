<nav class="bg-white dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        {{--Logo--}}
        <div class="flex items-center md:order-1">
            <a href="{{ route('inicio') }}" class="flex items-center">
                <img src="{{asset('/images/logo.png')}}" class="h-14" alt="filmXtra logo"/>
            </a>
        </div>

        <!-- Bloque de búsqueda  -->
        <div class="flex justify-end md:order-3">
            <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search"
                    aria-expanded="false"
                    class="lg:hidden text-gray-500  hover:bg-gray-100  focus:outline-none focus:ring-4 focus:ring-gray-200  rounded-lg text-sm p-2.5 mr-1">
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                          clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Buscar</span>
            </button>
            <div id="navbar-search" class="relative hidden lg:block">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                              clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Icono buscar</span>
                </div>
                <form>
                    <input type="text" id="search-navbar"
                           class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:border-flamingo focus:border-[3px] focus:ring-0"
                           placeholder="Buscar...">
                </form>
            </div>
        </div>

        {{--Botón cuenta usuario--}}
        <div class="flex items-center md:order-3 font-bold ">
            <button type="button"
                    class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-flamingo focus:ring-4 hover:ring-4 hover:ring-flamingo focus:flamingo"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="{{asset('/favicon.png')}}" alt="user avatar">
            </button>
            <!-- Dropdown menu -->
            <div
                class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-300 rounded-lg shadow-2xl"
                id="user-dropdown">
                <div class="px-4 py-3">
                    @if (! auth()->check())
                        <span class="block text-sm text-gray-900">filmXtra</span>
                        <span class="block text-sm  text-gray-500 truncate">sin loguear</span>
                    @else
                        <span class="block text-sm text-gray-900">{{ Auth::user()->username }}</span>
                        <span class="block text-sm  text-gray-500 truncate">{{ Auth::user()->email }}</span>
                    @endif
                </div>

                <ul class="py-2" aria-labelledby="user-menu-button">
                    @if (! auth()->check())
                        <li>
                            <a href="{{ route('login') }}"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-flamingo hover:text-white">Loguearse</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-flamingo hover:text-white">Registrarse</a>
                        </li>

                    @else
                        <li>
                            <a href="{{ route('inicio') }}"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-flamingo hover:text-white">Mis
                                valoraciones</a>
                        </li>
                        <li>
                            <a href="{{ route('inicio') }}"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-flamingo hover:text-white">Mis
                                favoritas</a>
                        </li>
                        <li>
                            <a href="{{ route('inicio') }}"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-flamingo hover:text-white">Ver
                                perfil</a>
                        </li>

                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-flamingo hover:text-white">Desloguearse
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
            <button data-collapse-toggle="navbar-user" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>

        {{--Lista opciones de menú--}}
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-2" id="navbar-user">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 rounded-lg md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="{{ route('inicio') }}"
                       class="{{ Route::current()->getName() === 'inicio' ? 'text-flamingo' : 'text-gray-900' }} block py-2 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-flamingo md:p-0 dark:text-white md:dark:hover:text-flamingo dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                       aria-current="page">Inicio</a>
                </li>
                <li>
                    <a href="{{ route('top-filmxtra') }}"
                       class="{{ Route::current()->getName() === 'top-filmxtra' ? 'text-flamingo' : 'text-gray-900' }} block py-2 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-flamingo md:p-0 dark:text-white md:dark:hover:text-flamingo dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Top
                        filmXtra</a>
                </li>
                <li>
                    <a href="{{ route('top-valoraciones') }}"
                       class="{{ Route::current()->getName() === 'top-valoraciones' ? 'text-flamingo' : 'text-gray-900' }} block py-2 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-flamingo md:p-0 dark:text-white md:dark:hover:text-flamingo dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Top
                        Valoraciones</a>
                </li>
                <li>
                    <a href="{{ route('inicio') }}"
                       class="{{ Route::current()->getName() === 'perfil' ? 'text-flamingo' : 'text-gray-900' }} block py-2 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-flamingo md:p-0 dark:text-white md:dark:hover:text-flamingo dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Cuenta</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
