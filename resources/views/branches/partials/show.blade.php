<x-app-layout>
    <section class="text-gray-100 xl:px-36 pb-8 body-font">
        <div class="container p-3 m-auto mx-auto rounded-md bg-teal-800 ">
            <div class="grid grid-cols-1 md:grid-cols-3">

                <div class="flex flex-col leading-normal col-span-2  md:px-5">
                    <h1 class="text-2xl font-bold badge badge-accent badge-soft ">
                        <span class="icon-[tabler--building-store]" ></span>
                        {{$branch->name}}
                    </h1>
                    <p class="flex items-center gap-2">                 
                        <span class=" icon-[tabler--road]"></span>
                        {{$branch->address}}
                    </p>
                    <div class="p-2 mt-2 rounded-md bg-teal-600/70">
                        <h2 class="flex items-center gap-1 text-xl badge badge-accent">
                            <span class="icon-[tabler--building]" ></span>
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

                </div>
                <div class="w-full">
                    <img src="{{$branch->business->getImageURL()}}" alt="" class="w-10/12 m-auto">
                </div>
            </div>


            {{-- _____ Navigation ____ --}}
            <div class="border-b  border-gray-200 ">
                <nav class="tabs tabs-bordered overflow-x-auto" >
                    <a href="{{route('branches.promotions', $branch->name)}}"
                         class="tab {{Route::is('branches.promotions') ? 'text-primary' : '' }}" >
                      <span class="icon-[tabler--discount] size-5 flex-shrink-0 me-2"></span>
                      Promociones
                    </a>
                    <a href="{{route('branches.ratings', $branch->name)}}" 
                        class="tab {{Route::is('branches.ratings') ? 'text-primary' : '' }}" >
                      <span class="icon-[tabler--stars] size-5 flex-shrink-0 me-2"></span>
                      Valoraciones
                    </a>
                  </nav>
            </div>
            @yield('content')
        </div>

    </section>
</x-app-layout>