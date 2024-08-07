<x-app-layout>
    <section class="text-gray-600 xl:px-36 body-font">
        <div class="container flex flex-col p-3 m-auto mx-auto rounded-md bg-gray-100/70 md:flex-row">
            <div
                class="flex flex-col mb-16 text-center lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 md:items-start md:text-left md:mb-0">
                <span
                    class="bg-blue-100 mb-2 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">
                    {{ $promotion->category->name }}
                </span>
                <h1 class="mb-2 text-2xl font-medium text-gray-900 title-font ">
                    {{ $promotion->title }}
                </h1>
                <p class="mb-4 leading-relaxed text-md">
                    {{ $promotion->description }}
                </p>
                <div class="">
                    <a class="block px-6 py-2 mb-1 text-gray-700 border-0 rounded bg-gray-100/90 text-md ">
                        Termina el: {{ $promotion->end_date }}
                    </a>
                    <div
                        class="block px-6 py-2 space-y-2 text-white bg-indigo-500 border-0 rounded text-md focus:outline-none ">
                        
                        <a href="{{route('branches.show', $promotion->branch->name)}}" class="flex items-start p-1 text-white border-b border-white rounded cursor-pointer text-md focus:outline-none hover:bg-indigo-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M20 9v11a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9" />
                                <path d="M9 22V12h6v10M2 10.6L12 2l10 8.6" />
                            </svg>
                            {{ $promotion->branch->name }}
                        </a>
                        
                        <p class="p-1">
                            Dirección: {{ $promotion->branch->address }}
                        </p>
                        
                        <a class="flex items-center px-6 py-2 text-gray-700 bg-gray-100 border-0 rounded hover:bg-gray-300 text-md"
                        href="https://www.google.com/maps?q={{$promotion->latitude}},{{$promotion->longitude}}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="#6e6e6e" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="11.5" cy="8.5" r="5.5" />
                                <path d="M11.5 14v7" />
                            </svg>
                            Abrir en Google Maps
                        </a>
                    </div>


                </div>
            </div>
            <div class="w-5/6 m-auto lg:max-w-lg md:w-1/3 ">
                <img class="object-cover object-center rounded" alt="hero"
                    src="{{'/storage/promotions/'. $promotion->image}}">
            </div>
        </div>

    </section>
</x-app-layout>