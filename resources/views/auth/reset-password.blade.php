<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}" class="p-4 bg-white shadow-md"> 
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required
                autofocus autocomplete="username" class="block mt-1 w-full p-2 border rounded-md">
            @if ($errors->has('email'))
                <span class="text-red-600">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
            <input id="password" type="password" name="password" required autocomplete="new-password"
                class="block mt-1 w-full p-2 border rounded-md">
            @if ($errors->has('password'))
                <span class="text-red-600">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation"
                class="block text-sm font-medium text-gray-700">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                autocomplete="new-password" class="block mt-1 w-full p-2 border rounded-md">
            @if ($errors->has('password_confirmation'))
                <span class="text-red-600">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit"
                class="px-4 py-2 bg-blue-500 text-white rounded-md">{{ __('Reset Password') }}</button>
        </div>
    </form>
</x-guest-layout>
