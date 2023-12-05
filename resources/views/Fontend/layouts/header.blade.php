{{-- header  --}}
<nav class="fixed dark:backdrop-blur-2xl  dark:bg-opacity-30 top-0 z-50 w-full h-[56px] dark:bg-gray-200 bg-white">
    <div class="px-4 sm:mx-2  lg:px-5 lg:pl-4 h-full lg:mx-20">
        <div class="flex items-center justify-between ">
            <!-- logo -->
            <div class="flex justify-center items-center">
                <div class="flex items-center md:w-[180px] mr-2">
                    <a href="{{route('index')}}" class="flex ml-2 md:mr-24">
                        <img src="{{ asset('img/logo/2.png') }}" class="w-8 scale-250 mr-3" alt="Black Diary logo" />
                        <div class="">
                            <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap ">
                                Black Diary</span>
                        </div>
                    </a>
                </div>
                <!-- search -->
                    @include('Fontend.layouts.search')
            </div>
            <!-- user -->
           <div class="flex justify-end items-center gap-2">
            @if (!Auth::Check())
            <div
                class=" flex items-center justify-center outline-blue-500 outline-offset-0  p-2 text-gray-900 rounded-lg">
                <a href="{{ route('login') }}" class="">
                    <button
                        class="relative  inline-flex items-center justify-center p-0.5 shadow-lg hover:shadow-cyan-500/50 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 ">
                        <span
                            class="relative p-2  transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                            Create Post
                        </span>
                    </button>
                </a>
            </div>
            <div
                class="relative w-8 h-8 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600 ring-2 ring-gray-400  ">
                <a href="{{ route('login') }}">
                    <svg class="absolute w-10 h-10 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        @else
            <div
                class=" flex items-center justify-center outline-blue-500 outline-offset-0  p-2 text-gray-900 rounded-lg">
                <a href="{{ route('create') }}" class="">
                    <button
                        class="relative  inline-flex items-center justify-center  p-0.5 shadow-lg hover:shadow-cyan-500/50 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 ">
                        <span
                            class="relative p-2  transition-all ease-in  duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                            Create Post
                        </span>
                    </button>
                </a>
            </div>
           
            {{-- Profile --}}
            <div class="flex items-center md:order-3">
                <div class="flex items-center ml-3">
                    <div>
                        <button type="button"
                            class="flex  rounded-full focus:ring-4 focus:ring-gray-300"aria-expanded="false"
                            data-dropdown-toggle="dropdown-user">
                            <img class="w-8 h-8  rounded-full ring-2 ring-green-300"
                                src="{{ Auth::user()->avatar }}"alt="user photo" />
                        </button>
                    </div>
                    <div class="z-50 hidden mt-2my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow"
                        id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <span class="text-sm text-gray-900 block" role="none">
                                {{ Auth::user()->name }}
                            </span>
                            <span class="text-sm font-medium text-gray-900 truncate block" role="none">
                                {{ Auth::user()->email }}
                            </span>
                        </div>
                        <ul class="py-1 mt-2" role="none">
                            <li>
                                <a href="{{route('profile',['id'=>Auth::id()])}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">
                                    Profile</a>
                            </li>
                            <li>
                                <a href="{{route('profile.edit', ['id'=>Auth::id()],)}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">
                                    Settings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">
                                    Earnings</a>
                            </li>
                            <li>
                                <form action="{{ route('logout')}}" method="post">
                                    @csrf
                                    <button type="submit" class="block w-full text-start px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">
                                    Log out</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
             {{-- messages --}}
             <div id="mega-menu-icons" class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
                <div>
                    <button id="mega-menu-icons-dropdown-button" data-dropdown-toggle="mega-menu-icons-dropdown" class="flex relative items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-200 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-gray-400 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                            <path fill-rule="evenodd"
                                d="M4.804 21.644A6.707 6.707 0 006 21.75a6.721 6.721 0 003.583-1.029c.774.182 1.584.279 2.417.279 5.322 0 9.75-3.97 9.75-9 0-5.03-4.428-9-9.75-9s-9.75 3.97-9.75 9c0 2.409 1.025 4.587 2.674 6.192.232.226.277.428.254.543a3.73 3.73 0 01-.814 1.686.75.75 0 00.44 1.223zM8.25 10.875a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25zM10.875 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875-1.125a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25z"
                                clip-rule="evenodd" />
                        </svg>
                        {{-- thông báo có có tin nhắn chờ đó mới --}}
                        <span class="bottom-0 animate-ping left-6 absolute  w-3.5 h-3.5 bg-red-400 border-2 border-white dark:border-gray-200 rounded-full"></span>
                        <span class="bottom-0 left-6 absolute  w-3.5 h-3.5 bg-red-400 border-2 border-white dark:border-gray-200 rounded-full"></span>
                    </button>
                    <div id="mega-menu-icons-dropdown" class="absolute z-10 grid hidden w-[300px]  text-sm bg-white border border-gray-100 rounded-lg shadow-md ">
                        <div class="p-4 pb-0 text-gray-700 md:pb-4 ">
                            <ul class="space-y-4" aria-labelledby="mega-menu-icons-dropdown-button">
                                <li>
                                    <button  class="grid items-center w-full justify-between grid-cols-4 text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group px-2">
                                        <div class="relative">
                                            <img class="w-10 h-10 p-1 rounded-full ring-2 ring-green-300 mr-2" src="{{ Auth::user()->avatar }}"alt="user photo" />
                                            <span class="top-0 left-7 absolute  w-3.5 h-3.5 bg-green-400 border-2 border-white  rounded-full"></span>
                                        </div>
                                        <span class="text-black col-span-2 flex justify-start mr-5">{{ Auth::user()->name }}</span>
                                        <span class="font-medium text-red-500 rounded-full bg-red-100 w-6 h-6 right-0 text-center ">5</span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                </div>      
            </div>
             {{-- Notify --}}
             <div id="mega-menu-icons" class="items-center justify-between hidden w-full md:flex md:w-auto md:order-2">
                <div>
                    <button id="mega-menu-icons-dropdown-button" data-dropdown-toggle="mega-menu-icons-dropdown" class="flex relative items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-200 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-gray-400 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 ">
                            <path fill-rule="evenodd"
                                d="M6.912 3a3 3 0 00-2.868 2.118l-2.411 7.838a3 3 0 00-.133.882V18a3 3 0 003 3h15a3 3 0 003-3v-4.162c0-.299-.045-.596-.133-.882l-2.412-7.838A3 3 0 0017.088 3H6.912zm13.823 9.75l-2.213-7.191A1.5 1.5 0 0017.088 4.5H6.912a1.5 1.5 0 00-1.434 1.059L3.265 12.75H6.11a3 3 0 012.684 1.658l.256.513a1.5 1.5 0 001.342.829h3.218a1.5 1.5 0 001.342-.83l.256-.512a3 3 0 012.684-1.658h2.844z"
                                clip-rule="evenodd" />
                        </svg>
                        {{-- thông báo có gì đó mới --}}
                        <span class="bottom-0 animate-ping left-6 absolute  w-3.5 h-3.5 bg-red-400 border-2 border-white dark:border-gray-200 rounded-full"></span>
                        <span class="bottom-0 left-6 absolute  w-3.5 h-3.5 bg-red-400 border-2 border-white dark:border-gray-200 rounded-full"></span>
                    </button>
                    <div id="mega-menu-icons-dropdown" class="absolute z-10 grid hidden w-[300px]  text-sm bg-white border border-gray-100 rounded-lg shadow-md ">
                        <div class="p-4 pb-0 text-gray-900 md:pb-4 ">
                            <ul class="space-y-4" aria-labelledby="mega-menu-icons-dropdown-button">
                                <li>
                                    <button  class="grid items-center w-full justify-between grid-cols-4 text-gray-500 dark:text-black hover:text-blue-600 dark:hover:bg-blue-200 group px-2">
                                        <div class="relative">
                                            <img class="w-10 h-10 p-1 rounded-full ring-2 ring-green-300 mr-2" src="{{ Auth::user()->avatar }}"alt="user photo" />
                                            <span class="top-0 left-7 absolute  w-3.5 h-3.5 bg-green-400 border-2 border-white  rounded-full"></span>
                                        </div>
                                        <span class="text-black col-span-2 flex justify-start mr-5">{{ Auth::user()->name }}</span>
                                        <span class="font-medium text-red-500 rounded-full bg-red-100 w-6 h-6 right-0 text-center ">5</span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>      
            </div>
        @endif
           </div>
        </div>
    </div>
</nav>
