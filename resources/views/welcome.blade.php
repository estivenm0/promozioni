<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Promozioni</title>

    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="pt-20 font-sans antialiased dark:bg-black dark:text-white/50 ">

    @include('layouts.navigation')

    <section class="flex items-center justify-center p-5 ">
        <div class="grid items-center grid-cols-1 gap-10 md:grid-cols-2 md:px-10">
            <div class="space-y-4 ">
                <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span
                        class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">PROMOZIONI</span>
                </h1>
                <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">
                    Aplicación web diseñada para ayudar a una variedad de negocios, incluyendo tiendas minoristas,
                    restaurantes, agricultores y otros comerciantes locales, a publicar sus ubicaciones y promociones de
                    productos. Los usuarios pueden acceder a la plataforma para buscar negocios cercanos que ofrezcan
                    ofertas especiales, ya sean descuentos en productos agrícolas, promociones en menús de restaurantes,
                    o rebajas en tiendas minoristas.</p>
                <div class="flex justify-center space-x-5">
                    <a href="{{route('home')}}"
                        class="flex items-center justify-center w-full gap-1 p-5 py-3 font-semibold text-white rounded-2xl bg-rose-500 hover:bg-rose-700">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z">
                            </path>
                            <line x1="7" y1="7" x2="7.01" y2="7"></line>
                        </svg>
                        </svg>
                        Promociones

                    </a>
                </div>
            </div>
            <div>
                <img src="https://www.dubizzle.com.eg/assets/mapPlaceholder_noinline.af3a4b7300a65b66f974eed7023840ac.svg"
                    alt="img map promozioni" class="m-auto rounded-full md:size-96 size-72" draggable="false" />
            </div>
        </div>
    </section>





</body>

</html>