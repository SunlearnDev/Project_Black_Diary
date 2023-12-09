<!--  Diary -->

<section class="w-full  max-w-[650px]   flex flex-col items-center">
    @foreach ($posts as $post)
        <article class="flex flex-col shadow my-4 rounded-lg lg:w-[650px] md:w-[530px]">
                <!-- Article Image -->
                <div class="hover:opacity-75  w-full flex justify-center ">
                    <a href="">
                        <img src="{{ '/storage/' . $post->image }}"
                        class="rounded-t-lg @if ($post->image == null) hidden @endif">
                    </a>  
                </div>
                <!-- story -->
                @include('Fontend.layouts.viewStory')
                
        </article>
    @endforeach
</section>
