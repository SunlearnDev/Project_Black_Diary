import moment from 'moment';

document.addEventListener('alpine:init', () => {
    Alpine.store('chat', {
        data: {
            receiverId: null,
            message: '',
        },
        echo: null,
        reply: false,
        chatBox: null,
        html: `<div>
                    <div id="chat-container" class="fixed bottom-2 right-2 w-96">
                        <div class="bg-white shadow-md rounded-lg max-w-lg w-full">
                            <div class="p-4 border-b bg-blue-500 text-white rounded-t-lg flex justify-between items-center">
                                <p class="text-lg font-semibold">Username</p>
                                <button id="close-chat" @click="$store.chat.close()"
                                    class="text-gray-300 hover:text-gray-400 focus:outline-none focus:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12">
                                        </path>
                                    </svg>
                                </button>
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
                    <div class="fixed bottom-0 right-0 mb-4 mr-4">
                        <button id="open-chat"
                            class="bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600 transition duration-300 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>`,

        start(receiverId) {
            if (this.chatBox == null) {
                axios.get(`${window.location.origin}/chat/${receiverId}`)
                .then(response => {
                    this.data.receiverId = receiverId;
                    this.chatBox = this.html;
                });
            }
        },
        close() {
            if (this.chatBox != null)
                this.chatBox = null;
        },
        sendMessage(event) {
            axios.post(`${window.location.origin}/chat`, {
                message: this.data.message,
                receiverId: this.data.receiverId
            })
                .then(response => {
                    console.dir(response.data);
                    // let comment = response.data;
                    // let user = comment.user;
                    // let html = ``;

                    let formReply = event.target;
                    // formReply.parentElement.insertAdjacentHTML('afterend', html);
                    formReply.reset();
                    // this.form = null;
                })
                .catch(error => {
                    console.log(error);
                })
        },
        response() {
            // console.dir(echo);
            let chatbox = document.getElementById('chatbox');
            if (chatbox != null)
                chatbox.innerHTML += `<li class="flex w-full mt-2 space-x-3 max-w-[80%]">
                                        <div class="flex-shrink-0 h-8 w-8 rounded-full overflow-hidden bg-gray-300">
                                            <img class="h-full w-full object-cover"
                                                src="" alt="avatar">
                                        </div>
                                        <div>
                                            <div class="bg-gray-300 p-3 rounded-r-lg rounded-bl-lg">
                                                <p class="text-sm">${this.echo.message.content}</p>
                                            </div>
                                            <span class="text-xs text-gray-500 leading-none">${moment(this.echo.message.created_at).fromNow()}</span>
                                        </div>
                                    </li>`;
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
                });
    })
    .catch(error => {
        console.log(error);
    })

// const chatbox = document.getElementById("chatbox");
// const chatContainer = document.getElementById("chat-container");
// const userInput = document.getElementById("user-input");
// const sendButton = document.getElementById("send-button");
// const openChatButton = document.getElementById("open-chat");
// const closeChatButton = document.getElementById("close-chat");

// let isChatboxOpen = true; // Set the initial state to open

// // Function to toggle the chatbox visibility
// function toggleChatbox() {
//     chatContainer.classList.toggle("hidden");
//     isChatboxOpen = !isChatboxOpen; // Toggle the state
// }

// // Add an event listener to the open chat button
// openChatButton.addEventListener("click", toggleChatbox);

// // Add an event listener to the close chat button
// closeChatButton.addEventListener("click", toggleChatbox);

// // Add an event listener to the send button
// sendButton.addEventListener("click", function () {
//     const userMessage = userInput.value;
//     if (userMessage.trim() !== "") {
//         addUserMessage(userMessage);
//         respondToUser(userMessage);
//         userInput.value = "";
//     }
// });

// userInput.addEventListener("keyup", function (event) {
//     if (event.key === "Enter") {
//         const userMessage = userInput.value;
//         addUserMessage(userMessage);
//         respondToUser(userMessage);
//         userInput.value = "";
//     }
// });

// function addUserMessage(message) {
//     const messageElement = document.createElement("div");
//     messageElement.classList.add("mb-2", "text-right");
//     messageElement.innerHTML = `<p class="bg-blue-500 text-white rounded-lg py-2 px-4 inline-block">${message}</p>`;
//     chatbox.appendChild(messageElement);
//     chatbox.scrollTop = chatbox.scrollHeight;
// }

// function addBotMessage(message) {
//     const messageElement = document.createElement("div");
//     messageElement.classList.add("mb-2");
//     messageElement.innerHTML =
//         `<p class="bg-gray-200 text-gray-700 rounded-lg py-2 px-4 inline-block">${message}</p>`;
//     chatbox.appendChild(messageElement);
//     chatbox.scrollTop = chatbox.scrollHeight;
// }

// function respondToUser(userMessage) {
//     // Replace this with your chatbot logic
//     setTimeout(() => {
//         addBotMessage("This is a response from the chatbot.");
//     }, 500);
// }

// // Automatically open the chatbox on page load
// toggleChatbox();