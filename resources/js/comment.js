import moment from 'moment';

function sendMessage(data, event) {
    axios.post(data.url, {
        message: data.message
    })
        .then(function (response) {
            let comment = response.data;
            let url = response.request.responseURL;
            let user = comment.user;
            let html = `<article x-data="reply('${url}', ${comment.id})" class="p-6 text-base bg-white rounded-lg border-b border-gray-200">
                            <footer class="flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 font-semibold"><img
                                            class="mr-2 w-6 h-6 rounded-full"
                                            src="${user.avatar}">${comment.user.other_name}</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate
                                                datetime="${moment(comment.created_at).fromNow()}">${moment(comment.created_at).fromNow()}</time></p>
                                </div>
                                <button data-dropdown-toggle="dropdownComment"
                                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50"
                                    type="button">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 16 3">
                                        <path
                                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                    </svg>
                                    <span class="sr-only">Comment settings</span>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdownComment"
                                    class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow">
                                    <ul class="py-1 text-sm text-gray-700"
                                        aria-labelledby="dropdownMenuIconHorizontalButton">
                                        <li>
                                            <a href="#" class="block py-2 px-4 hover:bg-gray-100">Edit</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block py-2 px-4 hover:bg-gray-100">Remove</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block py-2 px-4 hover:bg-gray-100">Report</a>
                                        </li>
                                    </ul>
                                </div>
                            </footer>
                            <p class="text-gray-500">${comment.content}</p>
                            <div class="flex items-center mt-4 space-x-4">
                                <button type="button" @click="toggle"
                                    class="flex items-center text-sm text-gray-500 hover:underline font-medium">
                                    <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                                    </svg>
                                    Reply
                                </button>
                            </div>
                            <div x-html="form"></div>
                        </article>`;

            let cmtlist = document.getElementById('comment-list'),
                firstChild = cmtlist.firstElementChild;
            if (firstChild) {
                firstChild.insertAdjacentHTML('beforebegin', html);
            } else {
                cmtlist.innerHTML = html;
            }
        })
        .catch(function (error) {
            console.log(error);
        });
        event.target.reset();
}

function sendReply(data, event) {
    axios.post(data.url, {
        message: data.message,
        parentId: data.parentId
    })
        .then(function (response) {
            let comment = response.data;
            let url = response.request.responseURL;
            let user = comment.user;
            let html = `<article x-data="reply('${url}', ${comment.id})"
                            class="p-6 pr-0 text-base bg-white">
                            <footer class="flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 font-semibold">
                                        <img class="mr-2 w-6 h-6 rounded-full"
                                            src="${user.avatar}">${comment.user.other_name}</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate
                                            datetime="${moment(comment.created_at).fromNow()}">${moment(comment.created_at).fromNow()}</time></p>
                                </div>
                                <button data-dropdown-toggle="dropdownComment"
                                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50"
                                    type="button">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 16 3">
                                        <path
                                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                    </svg>
                                    <span class="sr-only">Comment settings</span>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdownComment"
                                    class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow">
                                    <ul class="py-1 text-sm text-gray-700"
                                        aria-labelledby="dropdownMenuIconHorizontalButton">
                                        <li>
                                            <a href="#" class="block py-2 px-4 hover:bg-gray-100">Edit</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block py-2 px-4 hover:bg-gray-100">Remove</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block py-2 px-4 hover:bg-gray-100">Report</a>
                                        </li>
                                    </ul>
                                </div>
                            </footer>
                            <p class="text-gray-500">${comment.content}</p>
                            <div class="flex items-center mt-4 space-x-4">
                                <button type="button" @click="toggle"
                                    class="flex items-center text-sm text-gray-500 hover:underline font-medium">
                                    <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                        <path stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2"
                                            d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                                    </svg>
                                    Reply
                                </button>
                            </div>
                            <div x-html="form"></div>
                        </article>`;
            
            let formReply = event.target;
            formReply.parentElement.insertAdjacentHTML('afterend', html);
            formReply.remove();
        })
        .catch(function (error) {
            console.log(error);
        })
}

document.addEventListener('alpine:init', () => {
    Alpine.data('reply', (url, parentId) => ({
        data: {
            url: url,
            parentId: parentId,
            message: '',
        },
        form: '',
        html: `<form class="mt-6" @submit.prevent="sendReply(data, event)">
                    <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea id="comment" rows="6" x-model="data.message"
                            class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none" placeholder="Write a comment..."
                            required></textarea>
                    </div>
                    <button type="submit"
                        class="h-12 w-[150px] bg-blue-400 text-sm text-white rounded-lg transition-all hover:bg-blue-600">
                        Send
                    </button>
                    <button type="reset"
                        class="inline-flex items-center h-12 px-4 text-xs rounded-lg font-medium text-center">
                        Cancel
                    </button>
                </form>`,
        toggle() {
            if (this.form == '')
                this.form = this.html;
            else
                this.form = '';
        },
    }))
})

window.sendMessage = sendMessage;
window.sendReply = sendReply;