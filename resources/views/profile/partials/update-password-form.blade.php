<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="current_password" class="block text-gray-700 font-bold mb-2">Current Password</label>
            <input type="password" id="current_password" name="current_password"  equired autofocus class="w-full p-3 border border-gray-300 rounded">
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <label for="password" class="block text-gray-700 font-bold mb-2">New Password</label>
            <input type="password" id="password" name="password"  equired autofocus autocomplete="new-password" class="w-full p-3 border border-gray-300 rounded">
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <label for="password_confirmation" class="block text-gray-700 font-bold mb-2">Confirm Password'</label>
            <input type="password" id="password_confirmation" name="password_confirmation"  equired autofocus autocomplete="password_confirmation" class="w-full p-3 border border-gray-300 rounded">
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
