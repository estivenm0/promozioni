<nav class="fixed z-50  w-[calc(100%-2rem)]  -translate-x-1/2    lg:max-w-7xl left-1/2 top-2  border-gray-200 rounded-lg shadow-md bg-gray-50 dark:bg-gray-800 dark:border-gray-700 shadow-indigo-300"
    id="marketing-banner" tabindex="-1">

    <div class="flex flex-wrap items-center justify-between w-full px-4 py-2 mx-auto">
        {{-- ---- Logo and Name ----- --}}
        <a href="{{route('home')}}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <x-application-logo class="block w-auto text-gray-800 fill-current h-9" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Promozioni</span>
        </a>

        {{-- ------- open button ------- --}}
        <button data-collapse-toggle="navbar-solid-bg" type="button"
            class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-solid-bg" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>

        {{-- -------- Items ------- --}}
        <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
            <ul
                class="flex flex-col mt-4 font-medium rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">

                @auth
                <div class="hidden md:flex md:items-center md:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border rounded-md border-emerald-500 hover:text-gray-700 focus:outline-none">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('panel')">
                                {{ __('Panel') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
                <div class="pt-4 pb-1 border-t border-gray-200 md:hidden">
                    <div class="px-4">
                        <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <x-responsive-nav-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>

                @else
                <li>
                    <a href="{{ route('login') }}"
                        class="block px-3 py-2 text-gray-900 rounded md:p-0 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-emerald-700 dark:text-white md:dark:hover:text-emerald-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Iniciar
                        Sesión</a>
                </li>

                <li>
                    <a href="{{ route('register') }}"
                        class="block px-3 py-2 text-gray-900 rounded md:p-0 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-sky-700 dark:text-white md:dark:hover:text-sky-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Registrarme</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
    <span class="absolute bottom-0 p-2 text-xs font-medium leading-none text-center text-white translate-x-1/2 translate-y-1/2 bg-gray-800 rounded-full right-1/2">
        {{  Route::is('branches*')? 'Surcursal' : null }}
        {{  Route::is('home') ?  'Promociones' : null }}
        {{  Route::is('promotions*') ? 'Promoción': null }}
    </span>
</nav>
