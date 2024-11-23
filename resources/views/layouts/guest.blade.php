<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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

<body class="flex flex-col min-h-screen">
    <header class="w-full">
        <livewire:layout.navigation />

        <div class="hidden sm:block">
            <x-nav-icons />
        </div>
    </header>

    <main class="flex-grow px-6 py-4 bg-white sm:rounded-lg">
        {{ $slot }}
    </main>

    <footer class="w-full p-4 flex flex-col justify-between text-primary">
        <div class="w-full flex justify-between flex-wrap">

            <div class="text-primary text-left w-fit">
                <h3 class="text-xl underline ">Redes Sociais</h3>
                <p class='text-base mt-1'>Facebook | Instagram</p>
                <p class='text-base mt-1'>Site desenvolvido por B20</p>
            </div>

            <div class="text-primary md:text-left text-right w-fit">
                <h3 class="text-xl underline">Turismo</h3>
                <p class='text-base mt-1'>Sobre</p>
                <p class='text-base mt-1'>Política de Privacidade</p>
                <p class='text-base mt-1'>Termos de Uso</p>
            </div>

            <div class="text-primary text-left w-full md:w-auto">
                <h3 class="text-xl underline">Newsletter</h3>
                <p class='text-base mt-1'>Inscreva-se e receba novidades</p>
                <p class="-mt-1 text-base ">sobre turismo e o Turismo</p>
                <form class="flex justify-center items-center gap-2">
                    <input type="email" placeholder="E-mail" class="p-1 border border-gray-300 rounded-md">
                    <button class="py-1 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600">Enviar</button>
                </form>
            </div>
        </div>
        <p class="text-center sm:mt-16 mt-7">© Copyright Turismo 2024</p>
    </footer>
</body>

</html>
