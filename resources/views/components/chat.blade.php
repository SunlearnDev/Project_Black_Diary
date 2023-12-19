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

<div x-html="$store.chat.chatBox">
    <div>
        <div id="chat-container" class="fixed bottom-2 right-2 w-96">
            <div class="bg-white shadow-md rounded-lg max-w-lg w-full">
                <div class="p-4 border-b bg-blue-500 text-white rounded-t-lg flex justify-between items-center">
                    <p class="text-lg font-semibold">Username</p>
                    <div class="flex gap-1 justify-center">
                        <button id="minimize-chat" class="hover:animate-pulse focus:outline-none">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                transform="rotate(270)">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M12.9999 21.9994C17.055 21.9921 19.1784 21.8926 20.5354 20.5355C21.9999 19.0711 21.9999 16.714 21.9999 12C21.9999 7.28595 21.9999 4.92893 20.5354 3.46447C19.071 2 16.714 2 11.9999 2C7.28587 2 4.92884 2 3.46438 3.46447C2.10734 4.8215 2.00779 6.94493 2.00049 11"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                                    <path d="M17 7L12 12M12 12H15.75M12 12V8.25" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path
                                        d="M2 18C2 16.1144 2 15.1716 2.58579 14.5858C3.17157 14 4.11438 14 6 14C7.88562 14 8.82843 14 9.41421 14.5858C10 15.1716 10 16.1144 10 18C10 19.8856 10 20.8284 9.41421 21.4142C8.82843 22 7.88562 22 6 22C4.11438 22 3.17157 22 2.58579 21.4142C2 20.8284 2 19.8856 2 18Z"
                                        stroke="currentColor" stroke-width="2"></path>
                                </g>
                            </svg>
                        </button>
                        <button id="close-chat" @click="$store.chat.close()"
                            class="hover:animate-pulse focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>

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
                                <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod.
                                </p>
                            </div>
                            <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                        </div>
                    </li>
                </ul>

                <form class="p-4 border-t flex" @submit.prevent="$store.chat.sendMessage(event)">
                    <input id="user-input" name="message" type="text" placeholder="Type a message"
                        x-model="$store.chat.data.message"
                        class="w-full px-3 py-2 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button id="send-button" type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded-r-md hover:bg-blue-600 transition duration-300">Send</button>
                </form>
            </div>
        </div>

        {{-- <div class="fixed bottom-0 right-0 mb-4 mr-4">
            <button id="open-chat"
                class="bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600 transition duration-300 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
            </button>
        </div> --}}
    </div>
</div>
