<div class="bg-white grid grid-row px-6 py-4  rounded-lg post">
    <div class="flex items-center justify-between">
        <!-- link den ca nhan -->
        <article class="flex items-center">
            <div class="">
                <img class="w-10 h-10 rounded-full mr-4  " src="{{ $post->user->avatar }}" alt="Rounded avatar">
            </div>
            <div class="grid grid-rows">
                <!-- div usename -->
                <div class="grid grid-row-2 w-full justify-start items-center">
                    <!-- name -->
                    <div class="text-blue-700 text-sm font-bold uppercase  flex items-center ">
                        <div class="w-full ">
                            @include('Fontend.layouts.proflieSmall')
                        </div>
                    </div>
                    <!-- time -->
                    <time title="" class="text-gray-400 pl-1">{{ $post->created_at->fromNow(true) }}</time>
                </div>
            </div>
        </article>

        {{-- select --}}
        <article class="p-1 text-base bg-white rounded-lg ">
            <footer class="flex justify-between items-center mb-2">
                <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment{{ $post->id }}"
                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500  rounded-lg hover:bg-gray-50 outline-none rotate-90 hover:rotate-0 ease-in-out delay-150"
                    type="button">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 16 3">
                        <path
                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                    </svg>
                    <span class="sr-only">Comment settings</span>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownComment{{ $post->id }}"
                    class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow ">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200 "
                        aria-labelledby="dropdownMenuIconHorizontalButton">
                        <li>
                            <div class="w-full hover:bg-gray-100 ">
                                <button type="button" onclick="deleteDiary({{ $post->id }})"
                                    class=" py-2 px-4 block  text-gray-700">Delete</button>
                            </div>
                        </li>
                        <li>
                            <button name="remove"
                                class="block py-2 px-4 hover:bg-gray-100  text-gray-700">Remove</button>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100  text-gray-700">Report</a>
                        </li>
                    </ul>
                </div>
            </footer>
        </article>
    </div>
    <!-- div content -->
    <div class="row-span-3 pl-14 ">
        <!-- <title> -->
        <h3 class="mb-2"><a href="{{ route('show.diaryAll', ['id' => $post->id, Str::slug($post->title)]) }}"
                class="text-3xl font-bold hover:text-sky-700 pb-4 max-w-[780px]"><span>
                    {{ $post->title }} </span></a></h3>
        <!-- hagtag -->
        <div class=" gird grid-cols-5 mb-2 ">
            @foreach ($post->hashtags as $hashtag)
                <kbd
                    class="px-2 py-1.5 text-xs font-semibold randomcolor   border border-gray-100 rounded-lg hover:bg-gray-200 mr-2">
                    <a href="" class="">
                        #{{ $hashtag->content }}
                    </a>
                </kbd>
            @endforeach
        </div>
        <!-- interact -->
        <div class="mb-2 flex justify-between items-center">
            <div class=" flex items-center justify-start">
                <!-- like -->
                <div
                    class=" flex justify-start items-center hover:bg-gray-200 rounded-md h-10 cursor-pointer px-2 py-1">
                    <div class="flex -space-x-3 mr-2">
                        <img class="w-8 h-8 border-2 border-white rounded-full dark:border-gray-800"
                            src="https://source.unsplash.com/collection/1346951/1000x500?sig=1" alt="">
                        <img class="w-8 h-8 border-2 border-white rounded-full dark:border-gray-800"
                            src="https://source.unsplash.com/collection/1346951/1000x500?sig=1" alt="">
                        <img class="w-8 h-8 border-2 border-white rounded-full dark:border-gray-800"
                            src="https://source.unsplash.com/collection/1346951/1000x500?sig=1" alt="">
                        <img class="w-8 h-8 border-2 border-white rounded-full dark:border-gray-800"
                            src="https://source.unsplash.com/collection/1346951/1000x500?sig=1" alt="">
                        <a class="flex items-center justify-center w-8 h-8 text-xs font-medium text-white bg-gray-700 border-2 border-white rounded-full hover:bg-gray-600 dark:border-gray-800"
                            href="#">+99</a>
                    </div>
                    <span class=" text-md font-medium text-gray-500 px-2 py-1 ">5 Reactions</span>
                </div>
                <!-- sl cmt -->
                <div class="">
                    <span
                        class="px-2 py-2 text-md font-medium text-gray-500 hover:bg-gray-200 cursor-pointer rounded-md">{{ $post->comments_count }}
                        @if ($post->comments_count > 1)
                            Comments
                        @else
                            Comment
                        @endif
                    </span>
                </div>
            </div>
            <!-- save -->
            <div class="flex justify-end right-0 items-center cursor-pointer mr-2 ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 p-1 rounded-md hover:bg-blue-200 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5
                        21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                </svg>
            </div>
        </div>
        <!-- cmt -->
        @if ($post->comments_count > 1)
            <a href="{{ route('show.diaryAll', ['id' => $post->id, Str::slug($post->title)]) }}"
                class="text-gray-500 hover:text-gray-600">See all {{ $post->comments_count }}
                comments </a>
        @else
            <a href="{{ route('show.diaryAll', ['id' => $post->id, Str::slug($post->title)]) }}"
                class="flex items-center justify-start text-gray-400 hover:text-gray-500 pt-4 pb-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z" />
                </svg>
                Add comment first </a>
        @endif
    </div>
</div>
<script>
    var isDeleting = false;

    function deleteDiary(postId) {
        if (confirm('Are you sure you want to delete')) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
        // Kiểm tra xem có đang trong quá trình xóa không
        if (isDeleting) {
            console.log("Đang trong quá trình xóa. Hãy đợi...");
            return;
        }

        // Đánh dấu đang trong quá trình xóa
        isDeleting = true;

        $.ajax({
            url: "user/delete/diary/" + postId,
            type: "DELETE",
            success: function(result) {
                $("#" + result['post']).slideUp("slow");
            },
            error: function(error) {
                console.error("Error:", error);
            }
        });
    }
</script>