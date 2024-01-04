<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <base href="{{ asset('') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Black Diary</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo/2.png') }}">

    @vite(['resources/js/app.js'])
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/thinline.css">
    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- jQuery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
    <script src="{{ asset('js/districts.js') }}"></script>
    <script src="{{ asset('js/showimage.js') }}"></script>
    <script src="{{ asset('js/randomcolorhashtag.js') }}"></script>
    <script src="{{ asset('js/notification.js') }}"></script>
    <script src="{{ asset('js/follow.js') }}"></script>
    <script src="{{ asset('js/delete.js') }}"></script>
    <script src="{{ asset('js/like.js') }}"></script>
</body>

</html>
