@extends('welcome')

@section('content')
<div class="flex flex-wrap mx-20 gap-2 pt-[70px]">
    {{-- Left --}}
    @include('Fontend.layouts.left-search')
    {{-- Main --}}

    <div id="default-tab-content" class="w-full  max-w-[650px]  flex flex-col items-center ">
        <div class="w-full  flex justify-start items-center ">
            <h2 class="mb-4 mx-10 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-xl lg:text-2xl ">Search Results for 
            <span class="underline underline-offset-3 decoration-8 decoration-blue-400 text-gray-700 md:text-md lg:text-xl">{{$searchName}}</span></h2>
        </div>
        {{-- All --}}
        <div class=" pt-5 mx-10 " id="profile" role="tabpanel" aria-labelledby="profile-tab">
            @include('Fontend.layouts.viewPeople')
             <hr class="my-2 text-gray-50">
            @include('Fontend.layouts.diary-nav')
        </div>
        {{-- Post --}}
        <div class="hidden pt-5 mx-10 " id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
            @include('Fontend.layouts.diary-nav')
        </div>
        {{-- people --}}
        <div class="hidden pt-5 mx-10 " id="settings" role="tabpanel" aria-labelledby="settings-tab">
            @include('Fontend.layouts.viewPeople')
        </div>
        {{-- tags --}}
        <div class="hidden  pt-5 mx-10 " id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
           
        </div>
    </div>

</div>  
@endsection