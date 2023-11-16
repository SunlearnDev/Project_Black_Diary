@extends('Fontend.profile.profile')
@section('content')
    <main>
        <div class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen  transition-all duration-200">
            <div class="w-full px-48 mx-auto ">
                <div class="relative flex items-center p-0 mt-6 overflow-hidden bg-center bg-cover w-full h-[300px] rounded-2xl"
                    style="background-image: url('https://source.unsplash.com/collection/1346951/1000x500?sig=1'); background-position-y: 50%">

                </div>
                <div
                    class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 -mt-16 overflow-hidden break-words border-0 shadow-blur rounded-2xl backdrop-saturate-200 bg-white/30 bg-clip-border backdrop-blur-2xl ">
                    <div class="flex flex-wrap -mx-3">
                        <div class="flex-none w-auto max-w-full px-3">
                            <div
                                class="text-base ease-soft-in-out h-18.5 w-18.5 relative inline-flex items-center justify-center rounded-xl text-white transition-all duration-200">
                                <img src="{{ $data->avatar }}" alt="profile_image"
                                    class="w-20 h-20 shadow-soft-sm rounded-xl" />
                            </div>
                        </div>
                        <div class="flex-none w-auto max-w-full px-3 my-auto">
                            <div class="h-full">
                                <h5 class="mb-1">{{ $data->name }}</h5>
                                <p class="mb-0 font-semibold leading-normal text-sm">
                                    {{ $data->other_name }}
                                </p>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 mx-auto mt-4 sm:my-auto sm:mr-0 md:w-1/2 md:flex-none lg:w-4/12">
                            <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                <div class="mr-4 p-3 text-center">
                                    <span
                                        class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">22</span><span
                                        class="text-sm text-blueGray-400">Follows</span>
                                </div>
                                <div class="mr-4 p-3 text-center">
                                    <span
                                        class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">10</span><span
                                        class="text-sm text-blueGray-400">Follower</span>
                                </div>
                                <div class="lg:mr-4 p-3 text-center">
                                    <span
                                        class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">89</span><span
                                        class="text-sm text-blueGray-400">Posts</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap mt-4 px-48">
                <div class="w-full max-w-full px-3 xl:w-4/12 mt-[15px] h-full">
                    <div
                        class="relative flex flex-col h-full min-w-0 break-words bg-gray border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                            <div class="flex flex-wrap -mx-3">
                                <div class="flex items-center w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-none">
                                    <h3 class="mb-0 font-semibold text-base">Profile Information</h3>
                                </div>
                                <div class="w-full max-w-full px-3 text-right shrink-0 md:w-4/12 md:flex-none">
                                    <a href="javascript:;" data-target="tooltip_trigger" data-placement="top">
                                        <i class="leading-normal fas fa-user-edit text-sm text-slate-400"></i>
                                    </a>
                                    <div data-target="tooltip"
                                        class="hidden px-2 py-1 text-center text-white bg-black rounded-lg text-sm"
                                        role="tooltip">
                                        Edit Profile
                                        <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']"
                                            data-popper-arrow></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex-auto p-4 bg-white rounded-b-2xl">
                            <p class="leading-normal text-sm">{{ $data->about }}</p>
                            <hr
                                class="h-px my-6 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent" />
                            <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                                <li
                                    class="relative block px-4 py-2 pt-0 pl-0 leading-normal bg-white border-0 rounded-t-lg text-sm text-inherit">
                                    <strong class="text-slate-700">Birthdate:</strong> {{ $data->birthdate }}</li>
                                <li
                                    class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                    <strong class="text-slate-700">Phone:</strong>  {{ $data->phone }}</li>
                                <li
                                    class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                    <strong class="text-slate-700">Email:</strong>  <a href=""
                                        class="__cf_email__"
                                        data-cfemail="4425282127302c2b2934372b2a0429252d286a272b29">{{ $data->email }}</a>
                                </li>
                                <li
                                    class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                    @foreach ($dataCity as $item ) @if($data->city_id == $item->city_id ) 
                                    <strong class="text-slate-700">Location:</strong>  {{ $item->city_name }} @endif
                                    @endforeach </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="float-right w-[65%]">
                    @include('Fontend.layouts.diary-nav')
                </div>
            </div>
        </div>
    </main>
@endsection
