<nav class="fixed z-50  w-[calc(100%-2rem)]  -translate-x-1/2    lg:max-w-7xl left-1/2 top-2  border-gray-200 rounded-lg shadow-md bg-teal-900  shadow-indigo-300"
    id="marketing-banner" tabindex="-1">

    <div class="flex flex-wrap items-center justify-between w-full px-4 py-2 mx-auto">
        {{-- ---- Logo and Name ----- --}}
        <a href="{{route('home')}}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <x-application-logo class="block w-auto text-gray-800 fill-current h-9" />
        </a>


        {{-- -------- Items ------- --}}
        <div class="my-auto md:block md:w-auto">
            <ul
                class="flex flex-col mt-4 font-medium rounded-lg  md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent ">




                <div class="dropdown relative inline-flex rtl:[--placement:bottom-end]">
                    <button id="dropdown-default" type="button"
                        class="dropdown-toggle btn bg-emerald-700 text-gray-100 hover:bg-gray-800" aria-haspopup="menu"
                        aria-expanded="false" aria-label="Dropdown">
                        @auth
                        {{ Auth::user()->name }}
                        @else
                        Ingresar
                        @endauth
                        <span class="icon-[tabler--chevron-down] dropdown-open:rotate-180 size-4"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-open:opacity-100 hidden min-w-60 " role="menu"
                        aria-orientation="vertical" aria-labelledby="dropdown-default">
                        @auth
                        <li>
                            <a class="btn btn-soft btn-accent w-full" href="{{route('profile.edit')}}">
                                {{ __('Profile') }}
                            </a>
                        </li>
                        <li>
                            <a class=" btn btn-soft btn-primary w-full" href="{{route('businesses.index')}}"
                                target="_blank">
                                {{ __('Panel') }}
                            </a>
                        </li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a class="btn btn-soft btn-error w-full" href="{{route('logout')}}" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>

                        @else
                        <li>
                            <a href="{{ route('login') }}" class="btn btn-soft btn-accent">
                                Iniciar Sesión
                            </a>

                            <a href="{{ route('register') }}" class="btn btn-soft btn-success">
                                Registrarme
                            </a>
                        </li>

                        @endauth
                    </ul>
                </div>

            </ul>
        </div>
    </div>

    <span class="badge rounded-full text-white absolute  translate-y-1/2 translate-x-1/2 bottom-0 right-1/2">
        {{ Route::is('branches*')? 'Surcursal' : null }}
        {{ Route::is('home') ? 'Promociones' : null }}
        {{ Route::is('promotions*') ? 'Promoción': null }}
    </span>
</nav>