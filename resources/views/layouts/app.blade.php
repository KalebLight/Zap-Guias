<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Zap Guias') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-white min-h-screen flex flex-col">
    <!-- Navigation -->
    <livewire:layout.navigation />

    <!-- Page Content -->
    <main class="flex-grow lg:mt-40 mt-20 mb-2">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <livewire:layout.footer />
    <x-toaster-hub />
</body>


</html>