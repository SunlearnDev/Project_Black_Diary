
@if (!Auth::check())
<div
class="w-full max-w-full flex justify-end items-center py-4 px-4  sm:my-auto sm:mr-0 md:w-1/2 md:flex-none lg:w-4/12">
<button type="button"
    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-4">Message</button>
    <form method="post" action="{{ route('user.follow', $data->id) }}">
        @csrf
        <button type="submit"
            class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-4">
            Follow
        </button>
    </form>
</div>
@elseif (Auth::id() != $data->id)
<div
class="w-full max-w-full flex justify-end items-center py-4 px-4  sm:my-auto sm:mr-0 md:w-1/2 md:flex-none lg:w-4/12">
<button type="button"
    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-4">Message</button>
@if (Auth::user()->follows($data))
    <form method="post" action="{{ route('user.unfollow', $data->id) }}">
        @csrf
        <button type="submit"
            class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-4">
            Unfollow
        </button>
    </form>
@else
    <form method="post" action="{{ route('user.follow', $data->id) }}">
        @csrf
        <button type="submit"
            class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-4">
            Follow
        </button>
    </form>
@endif
</div>
@endif