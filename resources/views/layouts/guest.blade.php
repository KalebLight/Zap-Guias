<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Alpine Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>

    <!-- Alpine Core -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-h-screen flex flex-col">
    <!-- Header fixo no topo -->
    <header class="w-full mb-40">
        <livewire:layout.navigation />
    </header>

    <!-- Conteúdo principal -->

    <div class="flex-grow  flex flex-col lg:flex-row justify-center md:justify-between lg:items-start items-center w-full md:px-[100px] lg:px-[188px] xs:px-[30px] px-[10px]">
        <!-- Imagens -->
        <div class="mr-4">
            <img id="rotating-image" src="/images/guest-image-1.png" alt="Guest Image" class="h-[520px] object-cover lg:min-w-[350px] mb-10" />
        </div>
        <!-- Slot do conteúdo -->
        <main class="lg:w-1/2 w-full h-full md:rounded-lg flex lg:justify-normal">
            {{ $slot }}
        </main>
    </div>


    <!-- Footer -->

    <livewire:layout.footer />




</body>

</html>