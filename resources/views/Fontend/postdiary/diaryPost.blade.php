@extends('welcome')

@section('content')

<div class="flex gap-2 justify-center  sm:mx-2 lg:mx-20 pt-[70px]">
    
    {{-- left
     @include('Fontend.layouts.left-show-diary') --}}
    {{-- main --}}
     @include('Fontend.layouts.show-diary')

</div>
@endsection