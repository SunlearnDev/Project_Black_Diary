@if ($post->user_id)
    <button data-popover-target="popover-user-profile{{$post->user_id}}" type="button"
        class="text-black px-1 backdrop-blur-md bg-opacity-30 font-bold hover:bg-gray-200  hover:text-blue-700  flex rounded-lg  w-auto  items-center">
        <a href="{{ route('profile.search', [$post->user->id]) }}">
        @empty($post->user->other_name)
            {{ $post->user->name }}
        @else
            {{ $post->user->other_name }}
        @endempty
        </a>
    </button>
    <!-- Dropdown profiel -->
    <div data-popover id="popover-user-profile{{$post->user_id}}" role="tooltip"
        class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity  duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 backdrop-blur-xl bg-opacity-70">
        <div class="p-3">
            <div class="flex items-center justify-between mb-2">
                <a href="#">
                    <img class="w-10 h-10 rounded-full" src="{{ $post->user->avatar }}" alt="{{ $post->user->name }}.{{ $post->user->id }}">
                </a>
                <div>
                    {{-- @if($post->id != null)
                    
                     @include('Fontend.layouts.follower'); 
                    @endif --}}
                </div>
            </div>
            <p class="text-base font-semibold leading-none text-gray-900 ">
                <a href="#">{{ $post->user->name }}</a>
            </p>
            <p class="mb-3 text-sm font-normal">
                <a href="#" class="hover:underline">{{ $post->user->other_name }}</a>
            </p>
            <p class="mb-4 text-sm"> <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline"></a></p>
            <ul class="flex text-sm">
                <li class="mr-2">
                    <a href="#" class="hover:underline">
                        <span class="font-semibold text-gray-900 ">{{ $post->user->followersCount() }}</span>
                        <span>Following</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="hover:underline">
                        <span class="font-semibold text-gray-900 ">{{ $post->user->followingCount() }}</span>
                        <span>Followers</span>
                    </a>
                </li>
            </ul>
        </div>
        <div data-popper-arrow></div>
    </div>
@endif
