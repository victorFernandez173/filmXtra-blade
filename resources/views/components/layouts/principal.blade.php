<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="author" content="FilmXtra">
    <meta name="description" content="Trabajo Final de Grado DAW2 adaptado a vistas Blade">
    <meta name="keywords" content="HTML, CSS, JavaScript, Blade, Laravel">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Título --}}
    <title>
        {{ $titulo ?? config('APP_NAME') }}
    </title>

    {{-- Icon title --}}
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}">


    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">

    {{-- Scripts --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

{{-- Navbar --}}
<x-navbar></x-navbar>

{{-- Contenido --}}
{{ $slot }}

{{-- Footer --}}
<x-footer></x-footer>

</body>
</html>
