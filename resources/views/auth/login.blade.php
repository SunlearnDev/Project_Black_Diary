<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="h-full  flex flex-col items-center justify-center shadow-md">
        <div class="bg-white shadow rounded      mx-auto md:w-full  p-10 ">
            <p tabindex="0" class="focus:outline-none text-2xl font-extrabold leading-6 text-gray-800">Login to your
                account</p>
            <p tabindex="0" class="focus:outline-none text-sm mt-4 font-medium leading-none text-gray-500">Dont have
                account? <a href="{{ route('register') }}"
                    class="hover:text-gray-500 focus:text-gray-500 focus:outline-none focus:underline hover:underline text-sm font-medium leading-none  text-gray-800 cursor-pointer">
                    Sign up here</a>
            </p>
            <a href="/google">
                <button aria-label="Continue with google" role="button"
                    class="focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-gray-700 py-3.5 px-2 border rounded-lg border-gray-700 flex items-center w-full mt-5">
                    <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/sign_in-svg2.svg" alt="google">
                    <p class="text-base font-medium ml-4 text-gray-700">Continue with Google</p>
                </button>
            </a>
            <div class="w-full flex items-center justify-between py-4">
                <hr class="w-full bg-gray-400">
                <p class="text-base font-medium leading-4 px-2.5 text-gray-400">OR</p>
                <hr class="w-full bg-gray-400  ">
            </div>
            @error('email')
                    <div class="p-2 mx-1 text-sm text-red-800 rounded-lg bg-red-50 flex items-center" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-red-800 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                        </svg>

                        <span class="font-medium">{{ $message }}</span>
                    </div>
                @enderror
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email Address -->
                <div>
                    <label id="email" class="text-sm font-medium leading-none text-gray-800">
                        Email
                    </label>
                    <input aria-labelledby="email" type="email" name="email"
                        class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-800 py-3 w-full pl-3 mt-2"
                        required />
                </div>
                
                <!-- Password -->
                <div class="mt-4 w-full">
                    <label for="pass" class="text-sm font-medium leading-none text-gray-800">
                        Password
                    </label>
                    <div class="relative flex items-center justify-center">
                        <input id="pass" type="password" name="password"
                            class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-800 py-3 w-full pl-3 mt-2"
                            required autocomplete="current-password" />
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between  mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                    <div class=" ">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none hover:decoration  "
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>
                </div>

                <div class="mt-8">
                    <button type="submit" name="signup" role="button"
                        class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 text-sm font-semibold leading-none text-white focus:outline-none bg-indigo-700 border rounded hover:bg-indigo-600 py-4 w-full">
                        Login now</button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
