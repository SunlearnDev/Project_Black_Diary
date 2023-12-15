{{-- <section class="bg-white py-8 lg:py-16 antialiased">
    <div class="max-w-2xl mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg lg:text-2xl font-bold text-gray-900">Discussion (20)</h2>
        </div>
        <form class="mb-6 ">
            <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-50 shadow-md min-h-[40px]">
                <label for="comment" class="sr-only">Your comment</label>
                <textarea id="comment" rows="6"
                    class="p-4 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none h-14 "
                    placeholder="Write a comment..." required></textarea>
            </div>
            <button type="submit"
                class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-gray-900  border border-primary-900 hover:bg-blue-600 hover:text-white rounded-lg shadow-md">
                Post comment
            </button>
            <button type="submit"
                class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-primary-800">
                Cancel
            </button>
        </form>
        <article class="p-6 text-base bg-white rounded-lg border border-gray-50 shadow-md mb-2">
            <footer class="flex justify-between items-center mb-2">
                <div class="flex items-center">
                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 font-semibold"><img
                            class="mr-2 w-6 h-6 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                            alt="Michael Gough">Michael Gough</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                            title="February 8th, 2022">Feb. 8, 2022</time></p>
                </div>
                <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500  bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none "
                    type="button">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 16 3">
                        <path
                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                    </svg>
                    <span class="sr-only">Comment settings</span>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownComment1" class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow ">
                    <ul class="py-1 text-sm text-gray-700 " aria-labelledby="dropdownMenuIconHorizontalButton">
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 ">Edit</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 ">Remove</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 ">Report</a>
                        </li>
                    </ul>
                </div>
            </footer>
            <p class="text-gray-500">Very straight-to-point article. Really worth time reading. Thank
                you! But tools are just the
                instruments for the UX designers. The knowledge of the design tools are as important as the
                creation of the design strategy.</p>
            <div class="flex items-center mt-4 space-x-4">
                <button type="button" class="flex items-center text-sm text-gray-500 hover:underline font-medium">
                    <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                    </svg>
                    Reply
                </button>
            </div>
        </article>
        <article class="p-6 mb-3 ml-6 lg:ml-12 text-base bg-white rounded-lg border border-gray-50 shadow-md ">
            <footer class="flex justify-between items-center mb-2">
                <div class="flex items-center">
                    <p class="inline-flex items-center mr-3 text-sm text-gray-900  font-semibold"><img
                            class="mr-2 w-6 h-6 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="Jese Leos">Jese
                        Leos</p>
                    <p class="text-sm text-gray-600"><time pubdate datetime="2022-02-12"
                            title="February 12th, 2022">Feb. 12, 2022</time></p>
                </div>
                <button id="dropdownComment2Button" data-dropdown-toggle="dropdownComment2"
                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-40 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none "
                    type="button">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 16 3">
                        <path
                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                    </svg>
                    <span class="sr-only">Comment settings</span>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownComment2"
                    class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-50"
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
            <p class="text-gray-500">Much appreciated! Glad you liked it ☺️</p>
            <div class="flex items-center mt-4 space-x-4">
                <button type="button" class="flex items-center text-sm text-gray-500 hover:underline font-medium">
                    <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                    </svg>
                    Reply
                </button>
            </div>
        </article>
    </div>
</section> --}}

<style>
    @keyframes comment {
        from {
            background-color: rgb(203, 213, 225);
        }

        to {
            background-color: white;
        }
    }
</style>

@push('scripts')
    @vite(['resources/js/app.js'])
@endpush

<section class="w-full flex flex-col items-center bg-white mt-8 lg:mt-16 antialiased">
    <!------------- Comments ---------------->
    <div class="w-full max-w-2xl px-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg lg:text-2xl font-bold text-gray-900">Discussion</h2>
        </div>
        {{-- Comment Form --}}
        @auth
            <form id="comment-form" class="mb-6" x-data="{ data: { id: {{ $post->id }}, message: '' } }" @submit.prevent="sendMessage(data, event)">
                <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-50 shadow-md min-h-[40px]">
                    <label for="comment" class="sr-only">Your comment</label>
                    <textarea id="comment" rows="6" x-model="data.message"
                        class="p-4 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none h-14 "
                        placeholder="Write a comment..." required></textarea>
                </div>
                {{-- <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200">
                    <label for="comment" class="sr-only">Your comment</label>
                    <textarea id="comment" rows="6" x-model="data.message"
                        class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none" placeholder="Write a comment..."
                        required></textarea>
                </div> --}}
                <button type="submit"
                    class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-gray-900  border border-primary-900 hover:bg-blue-600 hover:text-white rounded-lg shadow-md">
                    Post comment
                </button>
                <button type="reset"
                    class="inline-flex items-center h-12 px-4 text-xs rounded-lg font-medium text-center">
                    Cancel
                </button>
            </form>
        @else
            <a href="{{ route('login') }}">
                <form id="comment-form" class="mb-6">
                    <div
                        class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-50 shadow-md min-h-[40px]">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea id="comment" rows="6"
                            class="p-4 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none h-14 "
                            placeholder="Write a comment..." required></textarea>
                    </div>
                    {{-- <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200">
                            <label for="comment" class="sr-only">Your comment</label>
                            <textarea id="comment" rows="6" x-model="data.message"
                                class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none" placeholder="Write a comment..."
                                required></textarea>
                        </div> --}}
                </form>
            </a>
        @endauth
        {{-- Comments list --}}
        <div id="comment-list">
            @foreach ($post->comments->reverse() as $comment)
                <article x-data="reply({{ $post->id }}, {{ $comment->id }})" class="p-6 rounded-lg text-base bg-white border-b border-gray-200">
                    <footer class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                            <p class="inline-flex items-center mr-3 text-sm text-gray-900 font-semibold"><img
                                    class="mr-2 w-6 h-6 rounded-full"
                                    src="{{ $comment->user->avatar }}">{{ $comment->user->other_name }}
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate
                                    datetime="{{ $comment->created_at }}">{{ $comment->created_at->fromNow() }}</time>
                            </p>
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
                            <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownMenuIconHorizontalButton">
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
                    <p class="text-gray-500">{{ $comment->content }}</p>
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
                        @if ($comment->replies_count)
                            <button @click.once.prevent="showReplies(event, {{ $comment->id }});"
                                @click="replyOpen = !replyOpen"
                                class="flex cursor-pointer items-center italic text-sm text-gray-500 hover:underline font-bold">
                                {{ $comment->replies_count }} @if ($comment->replies_count > 1)
                                    replies
                                @else
                                    reply
                                @endif
                            </button>
                        @endif
                    </div>
                    {{-- Reply Form --}}
                    <div x-html="form"></div>
                </article>
            @endforeach
        </div>
    </div>
</section>
