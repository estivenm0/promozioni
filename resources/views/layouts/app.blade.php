<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Promozioni') }}</title>
    
        <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
        @isset($head)
            {{ $head }}
        @endisset
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <style>
        [x-cloak] { display: none !important; }
    </style>
    <body class="font-sans antialiased bg-green-700 backdrop-filter min-h-screen">
        
            @include('layouts.navigation')

            <!-- Page Content -->
            <main class="pt-20">
                {{ $slot }}
            </main>

            <x-common.toast/>
    </body>
</html>
