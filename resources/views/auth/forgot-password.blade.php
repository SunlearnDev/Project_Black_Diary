<x-guest-layout>
    <div class="bg-white p-6">
        <div class="mb-4 text-sm text-gray-600 p-2">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>
    
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
    
        <form method="POST" action="{{ route('password.email') }}" class="p-2">
            @csrf
            @include('note')
            <!-- Email Address -->
          
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                    <input type="email" name="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:shadow-sm-light" autofocus  required>
                    @error('email')
                    <div class="p-2 mb-1 text-sm text-red-800 rounded-lg bg-red-50 flex items-center" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-800 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                          </svg>
                        <span class="font-medium">{{ $message }}</span>
                    </div>
                    @enderror
                </div>
            <div class="flex items-center justify-end mt-4">
    
                <x-primary-button>
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
