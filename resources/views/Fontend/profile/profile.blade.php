<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Black Diary</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- jQuery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Styles -->
    @include('Fontend.layouts.style')
</head>

<body class="bg-gray-100">
    {{-- header --}}
    @include('Fontend.layouts.header')
    <div class="flex flex-wrap mx-10 mt-10">
        <main>
            <div class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen  transition-all duration-200">
                <div class="w-full px-48 mx-auto ">
                    <div class="relative flex items-center p-0 mt-6 overflow-hidden bg-center bg-cover w-full h-[300px] rounded-2xl" style="background-image: url('https://source.unsplash.com/collection/1346951/1000x500?sig=1'); background-position-y: 50%">
                      
                    </div>
                    <div
                        class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 -mt-16 overflow-hidden break-words border-0 shadow-blur rounded-2xl backdrop-saturate-200 bg-white/30 bg-clip-border backdrop-blur-2xl ">
                        <div class="flex flex-wrap -mx-3">
                            <div class="flex-none w-auto max-w-full px-3">
                                <div
                                    class="text-base ease-soft-in-out h-18.5 w-18.5 relative inline-flex items-center justify-center rounded-xl text-white transition-all duration-200">
                                    <img
                                        src="{{ $data->avatar }}"
                                        alt="profile_image"
                                        class="w-20 h-20 shadow-soft-sm rounded-xl"/>
                                </div>
                            </div>
                            <div class="flex-none w-auto max-w-full px-3 my-auto">
                                <div class="h-full">
                                    <h5 class="mb-1">{{ $data->name}}</h5>
                                    <p
                                        class="mb-0 font-semibold leading-normal text-sm">
                                        CEO / Co-Founder
                                    </p>
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 mx-auto mt-4 sm:my-auto sm:mr-0 md:w-1/2 md:flex-none lg:w-4/12">
                                <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                  <div class="mr-4 p-3 text-center">
                                    <span
                                      class="text-xl font-bold block uppercase tracking-wide text-blueGray-600"
                                      >22</span
                                    ><span class="text-sm text-blueGray-400">Follows</span>
                                  </div>
                                  <div class="mr-4 p-3 text-center">
                                    <span
                                      class="text-xl font-bold block uppercase tracking-wide text-blueGray-600"
                                      >10</span
                                    ><span class="text-sm text-blueGray-400">Follower</span>
                                  </div>
                                  <div class="lg:mr-4 p-3 text-center">
                                    <span
                                      class="text-xl font-bold block uppercase tracking-wide text-blueGray-600"
                                      >89</span
                                    ><span class="text-sm text-blueGray-400">Posts</span>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap mt-4 px-48">
                    <div class="w-full max-w-full px-3 xl:w-4/12 mt-[15px]">
                        <div class="relative flex flex-col h-full min-w-0 break-words bg-gray border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                        <div class="flex flex-wrap -mx-3">
                        <div class="flex items-center w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-none">
                        <h6 class="mb-0">Profile Information</h6>
                        </div>
                        <div class="w-full max-w-full px-3 text-right shrink-0 md:w-4/12 md:flex-none">
                        <a href="javascript:;" data-target="tooltip_trigger" data-placement="top">
                        <i class="leading-normal fas fa-user-edit text-sm text-slate-400"></i>
                        </a>
                        <div data-target="tooltip" class="hidden px-2 py-1 text-center text-white bg-black rounded-lg text-sm" role="tooltip">
                        Edit Profile
                        <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
                        </div>
                        </div>
                        </div>
                        </div>
                        <div class="flex-auto p-4 bg-white rounded-b-2xl">
                        <p class="leading-normal text-sm">Hi, I’m Alec Thompson, Decisions: If you can’t decide, the answer is no. If two equally difficult paths, choose the one more painful in the short term (pain avoidance is creating an illusion of equality).</p>
                        <hr class="h-px my-6 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent" />
                        <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                        <li class="relative block px-4 py-2 pt-0 pl-0 leading-normal bg-white border-0 rounded-t-lg text-sm text-inherit"><strong class="text-slate-700">Full Name:</strong> &nbsp; Alec M. Thompson</li>
                        <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit"><strong class="text-slate-700">Mobile:</strong> &nbsp; (44) 123 1234 123</li>
                        <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit"><strong class="text-slate-700">Email:</strong> &nbsp; <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="4425282127302c2b2934372b2a0429252d286a272b29">[email&#160;protected]</a></li>
                        <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit"><strong class="text-slate-700">Location:</strong> &nbsp; USA</li>
                        <li class="relative block px-4 py-2 pb-0 pl-0 bg-white border-0 border-t-0 rounded-b-lg text-inherit">
                        <strong class="leading-normal text-sm text-slate-700">Social:</strong> &nbsp;
                        <a class="inline-block py-0 pl-1 pr-2 mb-0 font-bold text-center text-blue-800 align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-none" href="javascript:;">
                        <i class="fab fa-facebook fa-lg"></i>
                        </a>
                        <a class="inline-block py-0 pl-1 pr-2 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-none text-sky-600" href="javascript:;">
                        <i class="fab fa-twitter fa-lg"></i>
                        </a>
                        <a class="inline-block py-0 pl-1 pr-2 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-none text-sky-900" href="javascript:;">
                        <i class="fab fa-instagram fa-lg"></i>
                        </a>
                        </li>
                        </ul>
                        </div>
                        </div>
                        <div class="w-full max-w-full px-3 lg-max:mt-6 xl:w-4/12">
        
                        </div>
                    </div>
                   @include('Fontend.layouts.diary-nav')
                </div>
            </div>
        </main>
    </div>
    @include('sweetalert::alert')
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script src="{{ asset('js/districts.js') }}"></script>
</body>
</html>
