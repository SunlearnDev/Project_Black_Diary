import moment from 'moment';

function sendComment(data, event) {
    let url = `${window.location.origin}/diary/${data.id}/comment`;
    axios.post(url, {
        message: data.message
    })
        .then(function (response) {
            let comment = response.data;
            // let url = response.request.responseURL;
            let user = comment.user;
            let html = `<article x-data="reply(${comment.id})" class="p-6 rounded-lg text-base bg-white border-b border-gray-200" style="animation: comment 2s">
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
                                    type="button" style="animation: comment 2s">
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

function showReplies(event, parentId) {
    let url = `${window.location.origin}/diary/comment/${parentId}`;
    axios.get(url)
        .then(function (response) {
            let replies = response.data.replies;
            replies.forEach(reply => {
                let user = reply.user;
                let showReplies = ``;
                if (reply.replies_count > 1) {
                    showReplies = `<button @click.once.prevent="showReplies(event, ${reply.id})" @click="replyOpen = !replyOpen"
                                        class="flex cursor-pointer items-center italic text-sm text-gray-500 hover:underline font-bold">
                                        ${reply.replies_count} replies
                                    </button>`;
                }
                else if (reply.replies_count) {
                    showReplies = `<button @click.once.prevent="showReplies(event, ${reply.id})" @click="replyOpen = !replyOpen"
                                        class="flex cursor-pointer items-center italic text-sm text-gray-500 hover:underline font-bold">
                                        ${reply.replies_count} reply
                                    </button>`;
                }
                let html = `<div x-show="replyOpen">
                                <article x-data="reply(${reply.id})"
                                    class="p-4 mt-2 -mb-4 -mr-4 text-base bg-white rounded-lg">
                                    <footer class="flex justify-between items-center mb-2">
                                        <div class="flex items-center">
                                            <p class="inline-flex items-center mr-3 text-sm text-gray-900 font-semibold">
                                                <img class="mr-2 w-6 h-6 rounded-full"
                                                    src="${user.avatar}">${user.other_name}</p>
                                            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate
                                                    datetime="${moment(reply.created_at).fromNow()}">${moment(reply.created_at).fromNow()}</time></p>
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
                                    <p class="text-gray-500">${reply.content}</p>
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
                                        ${showReplies}
                                    </div>
                                    <div x-html="form"></div>
                                </article >
                            </div>`;

                let buttonReply = event.target;
                buttonReply.parentElement.insertAdjacentHTML('afterend', html);
            });
        })
        .catch(function (error) {
            console.log(error);
        });
}

document.addEventListener('alpine:init', () => {
    Alpine.data('reply', (diaryId, parentId) => ({
        data: {
            diaryId: diaryId,
            parentId: parentId,
            message: '',
        },
        replyOpen: false,
        form: null,
        html: `<form class= "mt-6" @submit.prevent = "sendReply(data, event)" >
                    <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-50 shadow-md min-h-[40px]">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea id="comment" rows="6" x-model="data.message"
                            class="p-4 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none h-14 "
                            placeholder="Write a comment..." required></textarea>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-gray-900  border border-primary-900 hover:bg-blue-600 hover:text-white rounded-lg shadow-md">
                        Post comment
                    </button>
                    <button type="reset"
                        class="inline-flex items-center h-12 px-4 text-xs rounded-lg font-medium text-center">
                        Cancel
                    </button>
                </form > `,
        toggle() {
            if (this.form == null)
                this.form = this.html;
            else
                this.form = null;
        },
        sendReply(data, event) {
            let url = `${window.location.origin}/diary/${data.diaryId}/comment`;
            axios.post(url, {
                message: data.message,
                parentId: data.parentId
            })
                .then(response => {
                    let comment = response.data;
                    let user = comment.user;
                    let html = `<article x-data="reply(${comment.diary_id},${comment.id})"
                                    class="p-4 mt-2 -mb-4 -mr-4 text-base bg-white rounded-lg" style="animation: comment 2s">
                                    <footer class="flex justify-between items-center mb-2">
                                        <div class="flex items-center">
                                            <p class="inline-flex items-center mr-3 text-sm text-gray-900 font-semibold">
                                                <img class="mr-2 w-6 h-6 rounded-full"
                                                    src="${user.avatar}">${user.other_name}</p>
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
                    formReply.reset();
                    this.form = null;
                })
                .catch(error => {
                    console.log(error);
                })
        }
    }))
})

window.sendComment = sendComment;
window.showReplies = showReplies;