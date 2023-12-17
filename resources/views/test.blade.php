@extends('welcome')

@push('style')
    <style>
        .rotate-45 {
            --transform-rotate: 45deg;
            transform: rotate(45deg);
        }

        .group:hover .group-hover\:flex {
            display: flex;
        }
    </style>
@endpush

@section('content')
    {{-- <div class="mt-8 flex flex-col items-center justify-center w-screen min-h-screen bg-gray-100 text-gray-800 p-10">
        <div class="flex flex-col flex-grow w-full max-w-xl bg-white shadow-xl rounded-lg overflow-hidden">
            <ul class="flex flex-col flex-grow h-0 p-4 overflow-auto">
                <li class="flex w-full mt-2 space-x-3 max-w-xs">
                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
                    <div>
                        <div class="bg-gray-300 p-3 rounded-r-lg rounded-bl-lg">
                            <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                    </div>
                </li>
                <li class="flex w-full mt-2 space-x-3 max-w-xs ml-auto justify-end">
                    <div>
                        <div class="bg-blue-600 text-white p-3 rounded-l-lg rounded-br-lg">
                            <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.
                            </p>
                        </div>
                        <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                    </div>
                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
                </li>
                <li class="flex w-full mt-2 space-x-3 max-w-xs ml-auto justify-end">
                    <div>
                        <div class="bg-blue-600 text-white p-3 rounded-l-lg rounded-br-lg">
                            <p class="text-sm">Lorem ipsum dolor sit amet.</p>
                        </div>
                        <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                    </div>
                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
                </li>
                <li class="flex w-full mt-2 space-x-3 max-w-xs">
                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
                    <div>
                        <div class="bg-gray-300 p-3 rounded-r-lg rounded-bl-lg">
                            <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. </p>
                        </div>
                        <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                    </div>
                </li>
                <li class="flex w-full mt-2 space-x-3 max-w-xs ml-auto justify-end">
                    <div>
                        <div class="bg-blue-600 text-white p-3 rounded-l-lg rounded-br-lg">
                            <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. </p>
                        </div>
                        <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                    </div>
                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
                </li>
                <li class="flex w-full mt-2 space-x-3 max-w-xs ml-auto justify-end">
                    <div>
                        <div class="bg-blue-600 text-white p-3 rounded-l-lg rounded-br-lg">
                            <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor incididunt.</p>
                        </div>
                        <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                    </div>
                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
                </li>
                <li class="flex w-full mt-2 space-x-3 max-w-xs ml-auto justify-end">
                    <div>
                        <div class="bg-blue-600 text-white p-3 rounded-l-lg rounded-br-lg">
                            <p class="text-sm">Lorem ipsum dolor sit amet.</p>
                        </div>
                        <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                    </div>
                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
                </li>
                <li class="flex w-full mt-2 space-x-3 max-w-xs">
                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
                    <div>
                        <div class="bg-gray-300 p-3 rounded-r-lg rounded-bl-lg">
                            <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. </p>
                        </div>
                        <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                    </div>
                </li>
                <li class="flex w-full mt-2 space-x-3 max-w-xs ml-auto justify-end">
                    <div>
                        <div class="bg-blue-600 text-white p-3 rounded-l-lg rounded-br-lg">
                            <p class="text-sm">Lorem ipsum dolor sit.</p>
                        </div>
                        <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                    </div>
                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
                </li>
            </ul>

            <div class="bg-gray-300 p-4">
                <input class="flex items-center h-10 w-full rounded px-3 text-sm" type="text"
                    placeholder="Type your message">
            </div>
        </div>
    </div> --}}

    <!-- component -->
    <div x-data="chat(1)">
        {{-- Minimize button --}}
        <div class="fixed bottom-0 right-0 mb-4 mr-4">
            <button id="open-chat"
                class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                Chat with Admin Bot
            </button>
        </div>
        {{-- Chat field --}}
        <div id="chat-container" class="fixed bottom-16 right-4 w-96">
            <div class="bg-white shadow-md rounded-lg max-w-lg w-full">
                <div class="p-4 border-b bg-blue-500 text-white rounded-t-lg flex justify-between items-center">
                    <p class="text-lg font-semibold">Username</p>
                    <button id="close-chat"
                        class="text-gray-300 hover:text-gray-400 focus:outline-none focus:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                </div>
                {{-- Here is chatbox --}}
                <ul id="chatbox" class="flex flex-col flex-grow h-80 p-4 overflow-auto">
                    <li class="flex w-full mt-2 space-x-3 max-w-[80%]">
                        <div class="flex-shrink-0 h-8 w-8 rounded-full bg-gray-300"></div>
                        <div>
                            <div class="bg-gray-300 p-3 rounded-r-lg rounded-bl-lg">
                                <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                        </div>
                    </li>
                    <li class="flex w-full mt-2 space-x-3 max-w-[80%] ml-auto justify-end">
                        <div>
                            <div class="bg-blue-600 text-white p-3 rounded-l-lg rounded-br-lg">
                                <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.
                                </p>
                            </div>
                            <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                        </div>
                    </li>
                </ul>
                {{-- Input message --}}
                <form class="p-4 border-t flex" @submit.prevent="sendMessage(event)">
                    <input id="user-input" name="message" type="text" placeholder="Type a message" x-model="data.message"
                        class="w-full px-3 py-2 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button id="send-button" type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded-r-md hover:bg-blue-600 transition duration-300">Send</button>
                </form>
            </div>
        </div>
    </div>
@endsection
