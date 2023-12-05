<section class="container mx-auto">
    <header>
        <h2 class="text-lg font-medium text-gray-900">Update Password</h2>

        <p class="mt-1 text-sm text-gray-600">
            Ensure your account is using a long, random password to stay secure.
        </p>
    </header>
    @include('note')
    <form method="post" action="{{ route('profile.password') }}" class="mt-6 space-y-6">
        @method('PATCH')
        @csrf
        <div class="mb-4">
            <label for="password_old" class="block text-gray-700 font-bold mb-2">
                Current Password
            </label>
            <input type="password" id="password_old" name="password_old" required autofocus
                class="w-full p-3 border border-gray-300 rounded" />
            @error('password_old')
                <span class="mt-2 text-xs text-red-600 dark:text-red-400 font-medium">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700 font-bold mb-2">New Password</label>
            <input type="password" id="password" name="password" required autofocus autocomplete="new-password"
                class="w-full p-3 border border-gray-300 rounded" />
            @error('password')
                
                <span class="mt-2 text-xs text-red-600 dark:text-red-400 font-medium">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700 font-bold mb-2">
                Confirm Password
            </label>
            <input type="password" id="password_again" name="password_again" required autofocus
                autocomplete="password_confirmation" class="w-full p-3 border border-gray-300 rounded" />
            @error('password_again')
                <span class="mt-2 text-xs text-red-600 dark:text-red-400 font-medium">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Save
            </button>

            @if (session('status') === 'password-updated')
                <p class="text-sm text-gray-600">Saved.</p>
            @endif
        </div>
    </form>
</section>
