<x-app-layout>
    <section class="xl:px-36 ">
        <div class="container flex flex-col p-3 m-auto mx-auto rounded-md bg-teal-800 md:flex-row">
            <div
                class="flex flex-col mb-16 lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 md:items-start  md:mb-0">
                <span class="badge  badge-info">
                    {{ $promotion->category->name }}
                </span>
                <a href="{{route('branches.promotions', $promotion->branch->name)}}"
                    class="badge badge-primary mt-2">
                    <span class="icon-[tabler--building-store]" ></span>
                    {{ $promotion->branch->name }}
                </a>

                <h1 class="mb-2 text-2xl font-medium text-gray-100 title-font ">
                    {{ $promotion->title }}
                </h1>
                <p class="mb-4 leading-relaxed text-md text-gray-200">
                    {{ $promotion->description }}
                </p>
                <div  class="block px-6 py-2 space-y-2 text-white bg-teal-700 border-0 rounded text-md focus:outline-none ">
                        <p class="flex items-center">
                            <span class="icon-[tabler--road]" ></span>
                             {{ $promotion->branch->address }}
                        </p>

                        <a class="flex items-center px-6 py-2 text-gray-700 bg-gray-100 border-0 rounded hover:bg-gray-300 text-md"
                            href="https://www.google.com/maps?q={{$promotion->latitude}},{{$promotion->longitude}}"
                            target="_blank">
                            <span class="icon-[tabler--brand-google-maps] size-6"></span>
                            Abrir en Google Maps
                        </a>
                        <a class="block px-6 py-2 mb-1 text-gray-700 border-0 rounded bg-gray-100/90 text-md ">
                            Termina: {{ $promotion->end_date }}
                        </a>
                    </div>


            </div>
            <div class="w-5/6 m-auto lg:max-w-lg md:w-1/3 ">
                <img class="object-cover object-center rounded" alt="promoción"
                    src="{{'/storage/promotions/'. $promotion->image}}">
            </div>
        </div>
    </section>
</x-app-layout>