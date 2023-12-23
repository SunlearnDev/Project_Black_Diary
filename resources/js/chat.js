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
        unreadTotal: 0,

        start(receiverId) {
            if (this.chatBox == null || receiverId != this.data.receiver.id) {
                axios.get(`${window.location.origin}/chat/${receiverId}`)
                    .then(response => {
                        let receiver = response.data.receiver;
                        let messages = response.data.messages;
                        this.data.receiver = receiver;
                        let previousTime = null;
                        let html = `<div x-init="$nextTick(() => {$store.chat.scroll();})">
                                        <div id="chat-container" class="fixed bottom-2 right-2 w-96 shadow-md" x-show="!$store.chat.collapse">
                                            <div class="bg-white shadow-md rounded-lg max-w-lg w-full">
                                                <div class="p-4 border-b text-black rounded-t-lg flex justify-between items-center shadow-md">
                                                    <div class="flex gap-2 items-center">
                                                        <div class="flex-shrink-0 h-10 w-10 rounded-full overflow-hidden bg-gray-300">
                                                            <img class="h-full w-full object-cover"
                                                                src="${this.data.receiver.avatar}" alt="avatar">
                                                        </div>    
                                                        <p class="text-lg font-semibold">${receiver.other_name ?? receiver.name}</p>
                                                    </div> 
                                                    <div class="flex gap-1 justify-center">
                                                        <button id="minimize-chat" @click="$store.chat.minimize()" 
                                                        class="hover:animate-pulse focus:outline-none subpixel-antialiased">
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
                                                <ul id="messagebox" class="gap-2 flex flex-col flex-grow h-80 p-4 overflow-y-auto">`;
                        messages.forEach(message => {
                            if (previousTime == null)
                                html += `<time class="text-xs self-center text-gray-500 mb-0.5 mt-2">${formatTime(message.created_at)}</time>`;
                            else if (!moment(message.created_at).isSame(previousTime, 'day'))
                                html += `<time class="text-xs self-center text-gray-500 mb-0.5 mt-2">${formatTime(message.created_at)}</time>`;
                            previousTime = moment(message.created_at);
                            if (message.sender_id == receiver.id)
                                html += `<li class="flex w-full space-x-3">
                                            <div class="flex-shrink-0 h-8 w-8 rounded-full overflow-hidden bg-gray-300">
                                                <img class="h-full w-full object-cover"
                                                    src="${receiver.avatar}" alt="avatar">
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <div class="max-w-[80%] bg-gray-300 p-3 rounded-r-lg rounded-bl-lg">
                                                    <p class="text-sm" style="word-break: break-word;">${message.content}</p>
                                                </div>
                                                <time class="text-xs text-gray-500">${moment(message.created_at).format('H:mm')}</time>
                                            </div>
                                        </li>`;
                            else
                                html += `<li class="flex w-full justify-end items-center space-x-2">
                                            <time class="text-xs text-gray-500">${moment(message.created_at).format('H:mm')}</time>
                                            <div class="max-w-[80%] justify-end bg-blue-600 text-white p-3 rounded-l-lg rounded-br-lg">
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
                                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 18" fill="currentColor">
                                    <path d="M18 4H16V9C16 10.0609 15.5786 11.0783 14.8284 11.8284C14.0783 12.5786 13.0609 13 12 13H9L6.846 14.615C7.17993 14.8628 7.58418 14.9977 8 15H11.667L15.4 17.8C15.5731 17.9298 15.7836 18 16 18C16.2652 18 16.5196 17.8946 16.7071 17.7071C16.8946 17.5196 17 17.2652 17 17V15H18C18.5304 15 19.0391 14.7893 19.4142 14.4142C19.7893 14.0391 20 13.5304 20 13V6C20 5.46957 19.7893 4.96086 19.4142 4.58579C19.0391 4.21071 18.5304 4 18 4Z" fill="currentColor"/>
                                    <path d="M12 0H2C1.46957 0 0.960859 0.210714 0.585786 0.585786C0.210714 0.960859 0 1.46957 0 2V9C0 9.53043 0.210714 10.0391 0.585786 10.4142C0.960859 10.7893 1.46957 11 2 11H3V13C3 13.1857 3.05171 13.3678 3.14935 13.5257C3.24698 13.6837 3.38668 13.8114 3.55279 13.8944C3.71889 13.9775 3.90484 14.0126 4.08981 13.996C4.27477 13.9793 4.45143 13.9114 4.6 13.8L8.333 11H12C12.5304 11 13.0391 10.7893 13.4142 10.4142C13.7893 10.0391 14 9.53043 14 9V2C14 1.46957 13.7893 0.960859 13.4142 0.585786C13.0391 0.210714 12.5304 0 12 0Z" fill="currentColor"/>
                                </svg>
                            </button>
                        </div>
                    </div>`;
                        this.chatBox = html;
                        this.collapse = false;
                    })
                    .catch(error => {
                        console.log(error);
                    })
            }
            else this.minimize();

            let contact = document.getElementById(`contact-${receiverId}`);
            let unread = contact.querySelector('.unread');
            if (unread != null) unread.remove();
        },
        close() {
            this.chatBox = null;
        },
        minimize() {
            this.collapse = !this.collapse;
            Alpine.nextTick(() => { this.scroll(); })
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
                    messagebox.innerHTML += `<li class="flex w-full justify-end items-center space-x-2">
                                                <time class="text-xs text-gray-500">${moment(message.created_at).format('H:mm')}</time>
                                                <div class="max-w-[80%] justify-end bg-blue-600 text-white p-3 rounded-l-lg rounded-br-lg">
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
                messagebox.innerHTML += `<li class="flex w-full space-x-3">
                                            <div class="flex-shrink-0 h-8 w-8 rounded-full overflow-hidden bg-gray-300">
                                                <img class="h-full w-full object-cover"
                                                    src="${this.data.receiver.avatar}" alt="avatar">
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <div class="max-w-[80%] bg-gray-300 p-3 rounded-r-lg rounded-bl-lg">
                                                    <p class="text-sm" style="word-break: break-word;">${this.echo.message.content}</p>
                                                </div>
                                                <time class="text-xs text-gray-500">${moment(this.echo.message.created_at).format('H:mm')}</time>
                                            </div>
                                        </li>`;
                this.scroll();
            }
            else {
                let contact = document.getElementById(`contact-${this.echo.message.sender_id}`);
                let unread = contact.querySelector('.unread');
                if (unread == null)
                    contact.innerHTML += `<span class="unread justify-end font-medium text-red-500 rounded-full bg-red-100 w-6 h-6 right-0 text-center">1</span>`;
                else
                    unread.innerHTML = parseInt(unread.innerHTML) + 1;
                this.count();
            }
        },
        count() {
            this.unreadTotal = 0;
            let list = document.getElementById('contact-list');
            let unreads = list.querySelectorAll('.unread');
            unreads.forEach(unread => {
                this.unreadTotal += parseInt(unread.innerHTML);
            })
        }
    })
})

// ─── Listen Chat Messages ────────────────────────────────────────────────────

axios.get(`${window.location.origin}/chat`)
    .then(response => {
        if (!isNaN(response.data))
            Echo.private(`chat.${response.data}`)
                .listen('.MessageCreated', (data) => {
                    Alpine.store('chat').echo = data;
                    Alpine.store('chat').response();
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
        return `Today`;
    else if (now.diff(inputMoment, 'days') == 1 && now.isSame(inputMoment, 'week'))
        return inputMoment.format('dddd');
    else if (now.isSame(inputMoment, 'year'))
        return inputMoment.format('MMMM Do');
    else
        return inputMoment.format('MMMM Do YYYY');
}