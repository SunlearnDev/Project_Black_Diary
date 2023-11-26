@if(count($users) > 0)
@foreach ($users as $user )
<a href="{{route('profile.search',[$user->id, Str::slug($user->name)])}}" class="flex flex-col items-center mb-2 bg-white border border-gray-200 rounded-f shadow md:flex-row md:max-w-xl p-2 ">
    <img class="object-cover w-14 h-14  rounded-full border  md:h-14 md:w-14 " src="{{$user->avatar}}" alt="">
    <div class="flex w-full item-center justify-between p-4 leading-normal">
        <div class="flex flex-col justify-start">
            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 ">{{$user->name}}</h5>
            <p class="mb-3 font-normal text-gray-700 ">{{$user->other_name}}</p>
        </div>
        <div class="flex items-center">
            <button type="button" 
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 
            dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Follow</button>
        </div>
    </div>
</a>
@endforeach
@else
<p>No users found.</p>
@endif