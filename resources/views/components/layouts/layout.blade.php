<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Práctica</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="flex flex-col min-h-screen bg-gray-100">

<x-layouts.header />

<x-layouts.nav />

<main class="flex-grow container mx-auto p-6">
    @if ($message = Session::get('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ $message }}
        </div>
    @endif

    {{ $slot }}
</main>

<x-layouts.footer />

</body>
</html>
