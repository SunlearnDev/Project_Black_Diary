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
            @if(count($users) > 0)
                @foreach ($users as $user )
                <a href="{{route('profile.search',[$user->id, Str::slug($user->name)])}}" class="flex flex-col items-center mb-2 bg-white border border-gray-200 rounded-f shadow md:flex-row md:max-w-xl p-2 ">
                    <img class="object-cover w-14 h-14  rounded-full border  md:h-auto md:w-14 " src="{{$user->avatar}}" alt="">
                    <div class="flex w-full item-center justify-between p-4 leading-normal">
                        <div class="flex flex-col justify-start">
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 ">{{$user->name}}</h5>
                            <p class="mb-3 font-normal text-gray-700 ">{{$user->other_name}}</p>
                        </div>
                        <div class="flex items-center">
                            <button type="button" 
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 
                            dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Follow</button>
                        </div>
                    </div>
                </a>
                @endforeach
            @else
             <p>No users found.</p>
            @endif
             <hr class="my-2 text-gray-50">
            @include('Fontend.layouts.diary-nav')
        </div>
        {{-- Post --}}
        <div class="hidden pt-5 mx-10 " id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
            @include('Fontend.layouts.diary-nav')
        </div>
        {{-- people --}}
        <div class="hidden pt-5 mx-10 " id="settings" role="tabpanel" aria-labelledby="settings-tab">
            @if(count($users) > 0)
            @foreach ($users as $user )
            <a href="{{route('profile.search',[$user->id, Str::slug($user->name)])}}" class="flex w-[570px] flex-col items-center mb-2 bg-white border border-gray-200 rounded-f shadow md:flex-row md:max-w-xl p-2 ">
                <img class="object-cover w-14 h-14  rounded-full border  md:h-auto md:w-14 " src="{{$user->avatar}}" alt="">
                <div class="flex w-full item-center justify-between p-4 leading-normal">
                    <div class="flex flex-col justify-start">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 ">{{$user->name}}</h5>
                        <p class="mb-3 font-normal text-gray-700 ">{{$user->other_name}}</p>
                    </div>
                    <div class="flex items-center">
                        <button type="button" 
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 
                        dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Follow</button>
                    </div>
                </div>
            </a>
            @endforeach
        @else
         <p>No users found.</p>
        @endif
        </div>
        {{-- tags --}}
        <div class="hidden hidden pt-5 mx-10 " id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
           
        </div>
    </div>

</div>  
@endsection