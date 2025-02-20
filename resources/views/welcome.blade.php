<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Promozioni</title>

    <link rel="shortcut icon" href="{{asset('icon.svg')}}" type="image/x-icon">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class=" min-h-screen">
    @include('layouts.navigation')

    <section class="flex items-center justify-center p-5 ">
        <div class="grid items-center grid-cols-1 gap-10 md:grid-cols-2 md:px-10">
            <div class="space-y-4 ">
                <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span
                        class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">PROMOZIONI</span>
                </h1>
                <p class="font-semibold text-lg">
                    Explora negocios cercanos con las mejores ofertas y promociones. Descubre descuentos en productos, menús especiales en restaurantes y rebajas en tiendas minoristas, todo desde una sola plataforma diseñada para ti.
                </p>
                <div class="flex justify-center space-x-5">
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center justify-center w-full gap-1 p-5 py-3 font-semibold text-white rounded-2xl bg-emerald-600 hover:bg-teal-700">
                        <span class="icon-[tabler--discount-check-filled] size-8" ></span>
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
