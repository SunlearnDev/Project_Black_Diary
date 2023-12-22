@if (count($users) > 0)
    @foreach ($users as $user)
        <a href="{{ route('profile.search', [$user->id]) }}"
            class="flex flex-col items-center  mb-2 bg-white border border-gray-200 rounded-f shadow md:flex-row md:max-w-xl p-2 ">
            <img class="object-cover w-14 h-14  rounded-full border  md:h-14 md:w-14 " src="{{ $user->avatar }}"
                alt="">
            <div class="flex w-full h-full item-center justify-between p-4 leading-normal">
                <div class="flex flex-col justify-start items-center">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 ">{{ $user->name }}</h5>
                    <p class="mb-3 font-normal text-gray-700 ">{{ $user->other_name }}</p>
                </div>
                <div class="flex items-center justify-end">
                    {{-- Follow and Message --}}
                    @if($data = $user)
                    @include('Fontend.layouts.follower')
                    @endif
                </div>
            </div>
        </a>
    @endforeach
@else
    <p>No users found.</p>
@endif
