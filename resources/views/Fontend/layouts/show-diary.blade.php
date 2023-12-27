<section class="w-full  max-w-[850px]   flex flex-col items-center border border-gray-100 ">
    <!-- Article Image -->
    <div class="hover:opacity-75  w-full flex justify-center ">
        <a href="{{ route('show.diaryAll', ['id' => $post->id, Str::slug($post->title)]) }}">
            <img src="{{ $post->image }}" class="rounded-t-lg @if ($post->image == null) hidden @endif">
        </a>
    </div>
    <div class="bg-white grid grid-row px-6 py-4 w-full">
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
                        <time title="" class="text-gray-400 pl-1">{{ $post->created_at->fromNow() }}</time>
                    </div>
                </div>
            </article>

            {{-- select --}}
           @if(Auth::check())
                <article class="p-1 text-base bg-white rounded-lg  @if (Auth::user()->id == $post->user_id) hidden @endif ">
                    <footer class="flex justify-between items-center mb-2">
                        <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment{{ $post->id }}"
                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500  rounded-lg hover:bg-gray-50 outline-none rotate-90 hover:rotate-0 ease-in-out delay-150"
                            type="button">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 16 3">
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
                                    <div class="w-full hover:bg-gray-100 cursor-pointer">
                                        <button type="button" data-post-id="{{ $post->id }}"
                                            class=" py-2 px-4 w-full  text-gray-700 js-comfirm-delete  text-left ">Delete</button>
                                    </div>
                                </li>
                                <li>
                                    <div class="w-full hover:bg-gray-100">
                                        <a href="">
                                            <button name="edit"
                                                class=" py-2 px-4 hover:bg-gray-100  text-gray-700">Edit</button>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a href="" class="block py-2 px-4 hover:bg-gray-100  text-gray-700">Pin</a>
                                </li>
                            </ul>
                        </div>
                    </footer>
                </article>
            @endif
        </div>
        <!-- div content -->
        <div class="row-span-3 pl-14 ">
            <!-- <title> -->
            <h3 class="mb-2"><a href="" class="text-3xl font-bold hover:text-sky-700 pb-4 max-w-[780px]"><span>
                        {{ $post->title }} </span></a></h3>
            <!-- hagtag -->
            <div class=" gird grid-cols-5 mb-2 ">
                @foreach ($post->hashtags as $hashtag)
                    <kbd
                        class="px-2 py-1.5 text-xs font-semibold randomcolor border border-gray-100 rounded-lg hover:bg-gray-200 mr-2">
                        <a href="" class="">
                            #{{ $hashtag->content }}
                        </a>
                    </kbd>
                @endforeach
            </div>
            <!-- interact -->
            <div class="my-4 flex justify-between items-center">
                <div class=" flex items-center justify-start">
                    <!-- like -->
                    <div class=" flex justify-start items-center rounded-md h-10 cursor-pointer px-2 py-1">
                        <div class="reactions-icon">
                            @if(Auth::check())
                            <button type="button" id="icon1" name='status' value="1" data-reaction-id="{{$post->id}}"
                                class="js-button-icon transition  ease-in-out delay-150 w-12 h-10 @if(  Auth::user()->reactions($post)) bg-red-100 likeBtn rounded-full @endif  border border-red-200 rounded-xl text-xl text-center p-1 shadow-sm  mr-2 hover:bg-red-100 hover:-translate-y-1 hover:scale-110 duration-300 focus-visible:ring-offset-2 active:scale-95">
                                ❤️
                            </button>
                            @else{
                                <a href="{{route('login')}}"><button type="button" id="icon1" name='status' value="1" data-reaction-id="{{$post->id}}"
                                    class="js-button-icon transition  ease-in-out delay-150 w-12 h-10  bg-red-100 likeBtn  text-xl text-center p-1 shadow-sm  mr-2 hover:bg-red-100 hover:-translate-y-1 hover:scale-110 duration-300 focus-visible:ring-offset-2 active:scale-95">
                                    ❤️
                                </button></a>
                            }
                        </div>
                        <div class="flex -space-x-3">
                            <label id="likeCount" class="flex items-center justify-center w-8 h-8 text-xs font-medium text-white bg-red-700 border-2 border-white rounded-full">
                            {{$post->likes()->count()}}</label>
                        </div>
                        <span class=" text-md font-medium text-green-500 px-1 py-1 ">Reactions</span>
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
                    <div id="readingTime_{{ $post->id }}" class="reading-time text-gray-300 text-sm mr-1"></div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 p-1 rounded-md hover:bg-blue-200 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5
                        21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                    </svg>
                </div>

            </div>
            <div id="contents" data-post-id="{{$post->id}}" class="contents w-full py-2">
                <span>{!! $post->content !!}</span>
            </div>
        </div>
        <!-- cmt -->
        @include('components.comment')
    </div>
</section>
