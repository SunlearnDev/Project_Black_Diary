<!--  Diary -->
<section class="w-full max-w-[650px] flex flex-col items-center ">
    @foreach ($posts as $post)
        <article class="flex flex-col shadow my-4 rounded-lg">
            <!-- Article Image -->
            <!-- link bai viet -->
            <a href=""></a>
            <!-- hình ảnh -->
            <div class="hover:opacity-75  ">
                <img src="{{ asset('storage/' . $post->image) }}" class="rounded-t-lg">
            </div>
            <!-- story -->
            @include('Fontend.layouts.viewStory')
            <!-- cmt -->
            @include('Fontend.layouts.viewCmt')
        </article>
    @endforeach
</section>
