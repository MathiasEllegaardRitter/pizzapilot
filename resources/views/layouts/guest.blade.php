<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full overflow-y-hidden">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-Color w-full h-full">
        <livewire:navbar />
        <section class="full-height-without-header flex items-center justify-space-around">
            <img class="fill-current" src="{{ asset('storage/icons/mascot.svg') }}" alt="Icon">
            <div>    
                <div class="login-width">
                    {{ $slot }}
                </div>
            </div>
        </section>

    </body>
</html>
