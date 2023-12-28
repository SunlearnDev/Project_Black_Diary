@extends('welcome')

@section('content')
    <div class="flex max-w-[1024px] ease-in-out lg:w-full md:w-2/3 mx-auto  mt-10">
           @include('Fontend.profile.partials.showProfile')
    </div>
@endsection
