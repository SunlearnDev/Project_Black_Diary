@extends('welcome')

@section('content')

<div class="flex  justify-start gap-6  sm:mx-2 lg:mx-20  pt-[70px]">
    {{-- left --}}
     @include('Fontend.layouts.left-nav')
    {{-- main --}}
     @include('Fontend.layouts.editpost')
    {{-- Right --}} 
   
</div>
@endsection
