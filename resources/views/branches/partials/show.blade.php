<x-app-layout>
    <section class="mb-6 text-gray-600 xl:px-36 body-font">
        <div class="container p-3 m-auto mx-auto rounded-md bg-gray-100/70 ">
            <div class="flex flex-wrap justify-center">

                <div class="flex flex-col leading-normal sm:w-10/12 md:px-5">
                    <h2>Sucursal</h2>
                    <h1 class="text-2xl font-bold ">
                        {{$branch->name}}
                    </h1>
                    <p>
                        {{$branch->address}}
                    </p>
                    <hr>
                    <div class="p-2 rounded-md bg-gray-300/40">
                        <h2>
                            Empresa
                        </h2>
                        <p class="my-2 text-base leading-2">
                            <span class="italic font-semibold text-indigo-600 text-md">
                                {{$branch->business->name}}:
                            </span>
                            {{$branch->business->description}}
                        </p>
                        <p>Phone: {{$branch->business->phone}}</p>
                        <p>Correo: {{$branch->business->email}}</p>
                    </div>

                </div>
                <div class="sm:w-1/6">
                    <img src="{{$branch->business->getImageURL()}}" alt="" class="w-32 m-auto">
                </div>
            </div>


            {{-- _____ Navigation ____ --}}
            <div class="border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                    <li class="me-2">
                        <a href="{{route('branches.promotions', $branch->name)}}"
                            class="inline-flex items-center justify-center p-4 
                            {{Route::is('branches.promotions') ? 'text-blue-600   border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group' : 'border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group'}}"
                            aria-current="page">
                            <svg class="w-4 h-4 {{Route::is('branches.promotions') ? 'text-blue-600 me-2 dark:text-blue-500' : 'text-gray-400 me-2 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300'  }}"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 18 18">
                                <path
                                    d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                            </svg>
                            Promociones
                        </a>
                    </li>
                    <li class="me-2">
                        <a href="{{route('branches.ratings', $branch->name)}}"
                            class="inline-flex items-center justify-center p-4 {{Route::is('branches.ratings') ? 'text-blue-600   border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group' : 'border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group'}}">
                            <svg class="w-4 h-4 {{Route::is('branches.ratings') ? 'text-blue-600 me-2 dark:text-blue-500' : 'text-gray-400 me-2 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300'}}"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                            </svg>
                            Valoraciones
                        </a>
                    </li>

                </ul>
            </div>

            @yield('content')

        </div>

    </section>
</x-app-layout>