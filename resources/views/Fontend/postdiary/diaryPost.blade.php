@extends('welcome')

@section('content')

<div class="flex flex-wrap mx-20 gap-2 pt-[70px]">
    {{-- left --}}
     @include('Fontend.layouts.left-nav')
    {{-- main --}}
     @include('Fontend.layouts.post')
    {{-- Right --}} 
     @include('Fontend.layouts.right-nav')
</div>
@endsection