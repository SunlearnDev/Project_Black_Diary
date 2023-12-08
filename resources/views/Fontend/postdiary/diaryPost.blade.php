@extends('welcome')

@section('content')

<div class="flex  mx-20 gap-2 pt-[70px]">
    
    {{-- left --}}
     @include('Fontend.layouts.left-show-diary')
    {{-- main --}}
     @include('Fontend.layouts.show-diary')

</div>
@endsection