import moment from 'moment';

document.addEventListener('alpine:init', () => {
    Alpine.store('chat', {
        data: {
            receiver: null,
            message: '',
        },
        echo: null,
        collapse: false,
        chatBox: null,

        start(receiverId) {
            if (this.chatBox == null || receiverId != this.data.receiver.id) {
                axios.get(`${window.location.origin}/chat/${receiverId}`)
                    .then(response => {
                        let receiver = response.data.receiver;
                        let messages = response.data.messages;
                        this.data.receiver = receiver;
                        let html = `<div x-init="$store.chat.scroll()">
                                        <div id="chat-container" class="fixed bottom-2 right-2 w-96" x-show="!$store.chat.collapse">
                                            <div class="bg-white shadow-md rounded-lg max-w-lg w-full">
                                                <div class="p-4 border-b bg-blue-500 text-white rounded-t-lg flex justify-between items-center">
                                                    <p class="text-lg font-semibold">${receiver.other_name ?? receiver.name}</p>
                                                    <div class="flex gap-1 justify-center">
                                                        <button id="minimize-chat" @click="$store.chat.minimize()" 
                                                        class="hover:animate-pulse focus:outline-none">
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
                                                <ul id="messagebox" class="flex flex-col flex-grow h-80 p-4 overflow-y-auto">`;
                        messages.forEach(message => {
                            if (message.sender_id == receiver.id)
                                html += `<time class="text-xs text-gray-500 self-center mb-0.5 mt-2">${formatTime(message.created_at)}</time>
                                        <li class="flex w-full space-x-3 max-w-[80%]">
                                            <div class="flex-shrink-0 h-8 w-8 rounded-full overflow-hidden bg-gray-300">
                                                <img class="h-full w-full object-cover"
                                                    src="${receiver.avatar}" alt="avatar">
                                            </div>
                                            <div>
                                                <div class="bg-gray-300 p-3 rounded-r-lg rounded-bl-lg inline-block">
                                                    <p class="text-sm" style="word-break: break-word;">${message.content}</p>
                                                </div>
                                            </div>
                                        </li>`;
                            else
                                html += `<time class="text-xs text-gray-500 self-center mb-0.5 mt-2">${formatTime(message.created_at)}</time>
                                        <li class="flex w-full space-x-3 justify-end">
                                            <div class="max-w-[80%] justify-end bg-blue-600 text-white p-3 rounded-l-lg rounded-br-lg inline-block">
                                                <p class="text-sm" style="word-break: break-word;">${message.content}</p>
                                            </div>
                                        </li>`;

                        })
                        html += `</ul>
                                <form class="p-4 border-t flex" @submit.prevent="$store.chat.sendMessage(event)">
                                    <input id="user-input" name="message" type="text" placeholder="Type a message"
                                        x-model="$store.chat.data.message"
                                        class="w-full px-3 py-2 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <button id="send-button" type="submit"
                                        class="bg-blue-500 text-white px-4 py-2 rounded-r-md hover:bg-blue-600 transition duration-300">Send</button>
                                </form>
                            </div>
                        </div>
                        <div class="fixed bottom-0 right-0 mb-4 mr-4" x-show="$store.chat.collapse">
                            <button id="open-chat" @click="$store.chat.minimize()"
                                class="bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600 transition duration-300 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>`;
                        this.chatBox = html;
                    })
                    .catch(error => {
                        console.log(error);
                    })
            }
            else this.minimize();
        },
        close() {
            this.chatBox = null;
        },
        minimize() {
            this.collapse = !this.collapse;
            this.scroll();
        },
        scroll() {
            let messagebox = document.querySelector('ul#messagebox');
            messagebox.scrollTop = messagebox.scrollHeight;
        },
        sendMessage(event) {
            axios.post(`${window.location.origin}/chat`, {
                message: this.data.message,
                receiverId: this.data.receiver.id,
            })
                .then(response => {
                    let message = response.data;
                    let formReply = event.target;
                    let messagebox = formReply.parentElement.querySelector('ul#messagebox');
                    messagebox.innerHTML += `<time class="text-xs text-gray-500 self-center mb-0.5 mt-2">${moment(message.created_at).format('LT')}</time>
                                            <li class="flex w-full space-x-3 justify-end">
                                                <div class="max-w-[80%] bg-blue-600 text-white p-3 rounded-l-lg rounded-br-lg inline-block">
                                                    <p class="text-sm" style="word-break: break-word;">${message.content}</p>
                                                </div>
                                            </li>`;
                    messagebox.scrollTop = messagebox.scrollHeight;
                    formReply.reset();
                })
                .catch(error => {
                    console.log(error);
                })
        },
        response() {
            let messagebox = document.querySelector('ul#messagebox');
            if (messagebox != null && this.data.receiver.id == this.echo.message.sender_id) {
                messagebox.innerHTML += `<time class="text-xs text-gray-500 self-center mb-0.5 mt-2">${moment(message.created_at).format('LT')}</time>
                                        <li class="flex w-full space-x-3 max-w-[80%]">
                                            <div class="flex-shrink-0 h-8 w-8 rounded-full overflow-hidden bg-gray-300">
                                                <img class="h-full w-full object-cover"
                                                    src="${this.data.receiver.avatar}" alt="avatar">
                                            </div>
                                            <div>
                                                <div class="bg-gray-300 p-3 rounded-r-lg rounded-bl-lg inline-block">
                                                    <p class="text-sm" style="word-break: break-word;">${this.echo.message.content}</p>
                                                </div>
                                            </div>
                                        </li>`;
            }
        }
    })
})

// ─── Listen Chat Messages ────────────────────────────────────────────────────

axios.get(`${window.location.origin}/chat`)
    .then(response => {
        if (response.data)
            Echo.private(`chat.${response.data}`)
                .listen('.MessageCreated', (data) => {
                    Alpine.store('chat').echo = data;
                    Alpine.store('chat').response();
                    Alpine.store('chat').scroll();
                });
    })
    .catch(error => {
        console.log(error);
    })

// ─── Time Formater ───────────────────────────────────────────────────────────

function formatTime(inputTime) {
    const now = moment();
    const inputMoment = moment(inputTime);

    if (now.isSame(inputMoment, 'day'))
        return inputMoment.format('h:mm A');
    else if (now.diff(inputMoment, 'days') == 1 && now.isSame(inputMoment, 'week'))
        return `${inputMoment.format('ddd').toUpperCase()} AT ${inputMoment.format('h:mm A')}`;
    else
        return inputMoment.format('MM DD [AT] h:mm A');

}