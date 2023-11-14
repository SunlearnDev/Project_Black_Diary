<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Black Diary</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- jQuery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Styles -->
    @include('Fontend.layouts.style')
</head>

<body class="">
    {{-- header --}}
    @include('Fontend.layouts.header')
    <div class="flex flex-wrap mx-10 pt-[70px]">
        {{-- left --}}
         @include('Fontend.layouts.left-nav')
        {{-- main --}}
         @include('Fontend.layouts.diary-nav')
        {{-- Right --}} 
         @include('Fontend.layouts.right-nav')
    </div>
    @include('sweetalert::alert')
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script src="{{ asset('js/districts.js') }}"></script>
</body>
</html>
