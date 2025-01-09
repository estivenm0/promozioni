<x-app-layout>
    <section class="text-gray-100 xl:px-36 pb-8 body-font">
        <div class="container p-3 m-auto mx-auto rounded-md bg-teal-800 ">
            <div class="grid grid-cols-1 md:grid-cols-3">

                <div class="flex flex-col leading-normal col-span-2  md:px-5">
                    <h1 class="text-2xl font-bold badge badge-accent badge-soft ">
                        <span class="icon-[tabler--building-store]"></span>
                        {{$branch->name}}
                    </h1>
                    <p class="flex items-center gap-2">
                        <span class=" icon-[tabler--road]"></span>
                        {{$branch->address}}
                    </p>
                    <div class="p-2 mt-2 rounded-md bg-teal-600/70">
                        <h2 class="flex items-center gap-1 text-xl badge badge-accent">
                            <span class="icon-[tabler--building]"></span>
                            {{$branch->business->name}}
                        </h2>
                        <p class="my-2 text-base leading-2">
                            {{$branch->business->description}}
                        </p>
                        <p class="flex items-center gap-2">
                            <span class=" icon-[tabler--phone]"></span>
                            {{$branch->business->phone}}
                        </p>
                        <p class="flex items-center gap-2">
                            <span class=" icon-[tabler--mail]"></span>
                            {{$branch->business->email}}
                        </p>
                    </div>

                    <div
                        class="block px-6 py-2 space-y-2 text-white bg-teal-700 border-0 rounded text-md focus:outline-none ">
                        <a class="flex items-center px-6 py-2 text-gray-700 bg-gray-100 border-0 rounded hover:bg-gray-300 text-md"
                            href="https://www.google.com/maps?q={{$promotion->latitude}},{{$promotion->longitude}}"
                            target="_blank">
                            <span class="icon-[tabler--brand-google-maps] size-6"></span>
                            Abrir en Google Maps
                        </a>
                    </div>

                </div>
                <div class="w-40 h-40 overflow-hidden m-auto">
                    <img src="{{$branch->business->getImageURL()}}" alt="{{$branch->business->name}}" class="">
                </div>

            </div>


            {{-- _____ Navigation ____ --}}
            <div class="border-b  border-gray-200 ">
                <nav class="tabs tabs-bordered overflow-x-auto">
                    <a href="{{route('branches.promotions', $branch->name)}}"
                        class="tab {{Route::is('branches.promotions') ? 'text-primary' : '' }}">
                        <span class="icon-[tabler--discount] size-5 flex-shrink-0 me-2"></span>
                        Promociones
                    </a>
                    <a href="{{route('branches.ratings', $branch->name)}}"
                        class="tab {{Route::is('branches.ratings') ? 'text-primary' : '' }}">
                        <span class="icon-[tabler--stars] size-5 flex-shrink-0 me-2"></span>
                        Valoraciones
                    </a>
                </nav>
            </div>
            @yield('content')
        </div>

    </section>
</x-app-layout>