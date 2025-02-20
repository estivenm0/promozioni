<nav class="md:px-10 md:pt-6">
    <section class="navbar rounded-box shadow ">
        <div class="w-full flex items-center justify-between md:gap-2">
            <div class="flex items-center justify-between">
                <div class="navbar-start items-center justify-between max-md:w-full">
                    <a class="link text-base-content link-neutral text-xl font-semibold no-underline" href="{{route('dashboard')}}">
                        <x-application-logo class="text-xl" />
                    </a>
                </div>
            </div>

            <div class="dropdown relative inline-flex rtl:[--placement:bottom-end]">
                <button id="dropdown-default" type="button" class="dropdown-toggle btn btn-primary" aria-haspopup="menu"
                    aria-expanded="false" aria-label="Dropdown">
                    @auth
                        {{ Auth::user()->name }}
                    @else
                        Ingresar
                    @endauth
                    <span class="icon-[tabler--chevron-down] dropdown-open:rotate-180 size-4"></span>
                </button>
                <ul class="dropdown-menu dropdown-open:opacity-100 hidden min-w-60" role="menu"
                    aria-orientation="vertical" aria-labelledby="dropdown-default">
                    @auth
                        <li>
                            <a class="btn btn-soft btn-warning w-full" href="{{ route('dashboard') }}">
                                Promociones
                            </a>
                        </li>
                        <li>
                            <a class="btn btn-soft btn-accent w-full" href="{{ route('profile.edit') }}">
                                {{ __('Profile') }}
                            </a>
                        </li>
                        <li>
                            <a class=" btn btn-soft btn-primary w-full" href="{{ route('panel') }}"
                                target="_blank">
                                {{ __('Panel') }}
                            </a>
                        </li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a class="btn btn-soft btn-error w-full" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
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
        </div>
    </section>
</nav>
