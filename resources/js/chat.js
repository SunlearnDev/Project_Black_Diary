document.addEventListener('alpine:init', () => {
    Alpine.data('chat', (receiverId) => ({
        data: {
            receiverId: receiverId,
            message: '',
        },
        replyOpen: false,
        form: null,
        html: ``,
        toggle() {
            if (this.form == null)
                this.form = this.html;
            else
                this.form = null;
        },
        sendMessage(event) {
            let url = `${window.location.origin}/chat`;
            axios.post(url, {
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
        }
    }))
})

axios.get(`${window.location.origin}/chat/user`)
    .then(response => {
        if (response.data)
            Echo.private(`chat.${response.data}`)
                .listen('.MessageCreated', (e) => {
                    console.dir(e);
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