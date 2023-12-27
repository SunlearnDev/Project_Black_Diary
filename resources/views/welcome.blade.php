<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <base href="{{ asset('') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Black Diary</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo/1.png') }}">

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
    {{-- Axios --}}
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @include('Fontend.layouts.style')
</head>

<body class="bg-gray-50"  x-data>
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
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        /* *******************  CKE5 trình soạn thảo ****************** */
        const contentElement = document.querySelector('#content');
        if (contentElement) {
            ClassicEditor
                .create(document.querySelector('#content'), {
                    ckfinder: {
                        uploadUrl: "{{ route('cheditor.upload', ['_token' => csrf_token()]) }}",
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        }
        const delConfirms = document.querySelectorAll('.js-comfirm-delete');
        const openConfirm = document.querySelector('.comfirm');
        const deleteOk = document.querySelector('.delete-confirm');
        const isFollowingBtn = document.querySelector('.follow-btn');
        const reactionsContainer = document.querySelector('.reactions-icon');
        const token = document.head.querySelector('meta[name="csrf-token"]')?.content;

        // Function read time
        function readingTime() {
            const texts = document.querySelectorAll('.contents');

            texts.forEach((text) => {
                const postId = text.getAttribute('data-post-id');
                const wpm = 200; // Words per minute
                const words = text.textContent.trim().split(/\s+/).length;
                const time = Math.ceil(words / wpm);

                // Find the reading time container for the specific post
                const readingTimeElement = document.getElementById(`readingTime_${postId}`);

                if (readingTimeElement) {
                    // Update the content of the reading time container
                    readingTimeElement.innerText = `${time} minute${time !== 1 ? 's' : ''} read`;
                }
            });
        }
        // Call the readingTime function when the web page is loaded
        document.addEventListener('DOMContentLoaded', readingTime);

    </script>
    <script src="{{ asset('js/follow.js') }}"></script>
    <script src="{{ asset('js/delete.js') }}"></script>
    <script src="{{ asset('js/like.js') }}"></script>
</body>

</html>
