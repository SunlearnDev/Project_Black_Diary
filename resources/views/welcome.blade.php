<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <base href="{{ asset('') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Black Diary</title>

    @vite(['resources/js/app.js'])
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- jQuery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    {{-- Axios --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> --}}
    <!-- Styles -->
    @stack('style')
</head>

<body class="bg-gray-50" x-data>
    {{-- header --}}
    @include('Fontend.layouts.header')
    {{-- main --}}
    @yield('content')
    {{-- Chat --}}
    @include('components.chat')
    
    {{-- @include('sweetalert::alert') --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script src="{{ asset('js/districts.js') }}"></script>
    <script src="{{ asset('js/showimage.js') }}"></script>
    <script src="{{ asset('js/randomcolorhashtag.js') }}"></script>
</body>

</html>
