<div class="bg-white grid grid-rows-4 flex-col justify-start px-6 py-2">
    <div class="flex items-center ">
        <!-- link den ca nhan -->
        <a href="#" class="hidden"></a>
        <div class="">
            <img class="w-10 h-10 rounded-full mr-4 @if($diary->image== null) hidden @endif "
                src="{{$diary->image}}" alt="Rounded avatar">
        </div>
        <div class="gird grid-rows-2">
            <!-- div usename -->
            <div class="grid grid-row-2 w-full justify-start items-center">
                <!-- name -->
                <div class="text-blue-700 text-sm font-bold uppercase  flex items-center ">
                    <a href=""></a>
                    <div class="w-full ">
                        {{-- @include("Fontend.layouts.proflieSmall") --}}
                    </div>
                </div>
                <!-- time -->
                <time title="" class="text-gray-400 pl-1"> {{$diary->created_at->diffForHumans()}} </time>
            </div>
        </div>
    </div>
    <!-- div content -->
    <div class="row-span-3 pl-14 ">
        <!-- <title> -->
        <h3 class="mb-2"><a href=""
                class="text-3xl font-bold hover:text-sky-700 pb-4 max-w-[780px]"><span> {{$diary->title}} </span></a></h3>
        <!-- hagtag -->
        <div class=" gird grid-cols-5 mb-2 ">
            @foreach ( $diary->hashtags as $hashtag )               
                    <kbd class="px-2 py-1.5 text-xs font-semibold text-gray-800 bg-gray-50 border border-gray-100 rounded-lg hover:bg-gray-200"> 
                     <a href="" class="">
                        #{{ $hashtag->content }}
                     </a>
                    </kbd>                    
            @endforeach
        </div>
        <!-- interact -->
        <div class="mb-2 flex justify-between  items-center">
            <div class=" flex items-center justify-start">
                <!-- like -->
            <div class=" flex justify-start items-center hover:bg-gray-200 rounded-md h-10 cursor-pointer px-2 py-1">
                <div class="flex -space-x-3 mr-2">
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
                    class="px-2 py-2 text-md font-medium text-gray-500 hover:bg-gray-200 cursor-pointer rounded-md">5
                    comment</span>
            </div>
            </div>
            <!-- save -->
            <div class="flex justify-end right-0 items-center cursor-pointer ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 p-1 rounded-md hover:bg-blue-200 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5
                        21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                </svg>
            </div>
        </div>
        <span class="pb-6 ">{{$diary->title}}</span>
    </div>
</div>