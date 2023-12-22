@extends('welcome')

@section('content')
    <div class="flex gap-2 justify-between sm:mx-2 lg:mx-20 pt-[70px]">
        {{-- left --}}
        @include('Fontend.layouts.left-nav')
        {{-- main --}}
        @include('Fontend.layouts.diary-nav')
        {{-- Right --}}
        @include('Fontend.layouts.right-nav')
    </div>
@endsection
