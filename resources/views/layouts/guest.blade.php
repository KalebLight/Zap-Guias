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
    <header class="w-full">
        <livewire:layout.navigation />


    </header>

    <!-- Conteúdo principal -->
    <div class="flex-grow flex flex-col lg:flex-row justify-center md:justify-between md:py-20 py-10 lg:items-start items-center ">

        <!-- Imagens -->
        <div class="lg:w-full lg:h-full w-[400px] h-[300px] flex justify-center mx-4">
            <img id="rotating-image" src="/images/guest-image-1.png" alt="Guest Image" class="h-[500px] object-cover lg:min-w-[350px] mb-10" />
        </div>

        <!-- Slot do conteúdo -->
        <main class="w-full h-full  md:rounded-lg xl:px-[60px] px-[30px] flex justify-center lg:justify-normal pt-16 ">
            {{ $slot }}
        </main>
    </div>

    <!-- Footer -->
    <livewire:layout.footer />



</body>

</html>