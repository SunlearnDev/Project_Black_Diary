<!--  Diary -->
<section class="w-full  max-w-[650px]   flex flex-col items-center rounded-b-lg">
    @foreach ($posts as $post)
        <article class="flex flex-col  my-2 shadow-md rounded-lg lg:w-[650px] md:w-[530px] ">
                <!-- Article Image -->
                <div class="hover:opacity-75  w-full flex justify-center rounded-t-lg">
                    <a href="{{route('show.diaryAll',['id'=> $post->id,Str::slug($post->title)])}}">
                        <img src="{{ '/storage/' . $post->image }}"
                        class="rounded-t-lg h-[420px] w-[1000px]  @if ($post->image == null) hidden @endif">
                    </a>  
                </div>
                <!-- story -->
                @include('Fontend.layouts.viewStory')
        </article>
    @endforeach
</section>
