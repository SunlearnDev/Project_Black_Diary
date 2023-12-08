{{-- Comments --}}
<div class="px-6 py-2 mt-2">
    <div class="w-full mb-2 flex justify-start">
        <div class="">
            <a href="">
                <img class="w-10 h-10 rounded-full mr-4 "
                    src="{{'storage/' . $post->image }}" alt="Rounded avatar">
            </a>
        </div>
        <div class="w-full bg-gray-200 p-4 rounded-lg ">
            <!-- name -->
            <div class="mb-4 ">
                @include("Fontend.layouts.proflieSmall")
            </div>
            <!-- cmt -->
            <div class="">
                {{-- nếu ở trên có rồi thì ở dưới hiển thị số lượng cmt với ý nghĩa là gì  --}}
                <div class="w-full p-2 @empty($post->comments) hidden @endempty">
                    <div class="flex w-full items-center justify-end dark:text-white py-2 border-b border-gray-300">
                        <div class="flex items-center gap-1 hover:underline cursor-pointer"
                            onclick="toggleCmtHidden(this)">
                            <span class="cmtTotal text-sm">
                                Comment {{ $post->comments_count }}
                            </span>
                        </div>
                    </div>
                    <div class="w-full dark:text-white mt-4">
                        <ul
                            class="max-h-72 p-1 overscroll-none overflow-y-scroll flex flex-col gap-2 comment-list hidden">
                            @foreach ($post->comments as $comment)
                                <li comment-id="{{ $comment->id }}" user-id="{{ $comment->user->id }}">
                                    <div class="flex gap-2">
                                        <div class="w-8 h-8 shrink-0">
                                            <img class="bg-white w-full h-full p-1 rounded-full ring-2 ring-gray-400 dark:ring-gray-500 dark:bg-transparent"
                                                src="{{ $comment->user->avatar }}" alt="">
                                        </div>
                                        <div>
                                            <div
                                                class="inline-block px-2 py-1 rounded-lg border border-gray-300 bg-white dark:bg-gray-800 dark:border-none break-words">
                                                <div class="font-bold text-sm dark:text-white">
                                                    {{ $comment->user->name }}
                                                </div>
                                                <div style="word-break: break-word;">
                                                    {{ $comment->content }}
                                                </div>
                                            </div>
                                            <div class="flex">
                                                <div class="time text-xs text-gray-500 dark:text-white"
                                                    data-timeago="{{ $comment->created_at }}"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-comment></x-comment>
</div>
