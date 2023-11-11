<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        @include('.note')
        <div class="bg-white shadow rounded lg:w-full md:mx-auto  md:w-1/2  p-10 ">
            <div class="bg-cover bg-center w-full" style="background-image: url('{{ asset('img/login.jpg') }}');">
                <p tabindex="0" class="focus:outline-none text-2xl font-extrabold leading-6 text-gray-800">Signup to
                    your account</p>
                <p tabindex="0" class="focus:outline-none text-sm mt-4 font-medium leading-none text-gray-500">Already a
                    member? <a href="{{ route('login') }}"
                        class="hover:text-gray-500 focus:text-gray-500 focus:outline-none focus:underline hover:underline text-sm font-medium leading-none  text-gray-800 cursor-pointer">
                        Log in now</a></p>

                <div class="w-full flex items-center justify-between pt-5">
                    <hr class="w-full bg-gray-400  ">
                </div>
                <!-- Name -->
                <div class="mt-4  w-full">
                    <label for="userName" class="text-sm font-medium leading-none text-gray-800">
                        User Name
                    </label>
                    <div class="relative flex items-center justify-center">
                        <input id="userName" type="text" name="user_name"
                            class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-800 py-3 w-full pl-3 mt-2"
                            required />
                    </div>
                    @error('user_name')
                        <div class="p-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                            <span class="font-medium">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="mt-4  w-full">
                    <label id="email" class="text-sm font-medium leading-none text-gray-800">
                        Email
                    </label>
                    <div class="relative flex items-center justify-center">
                        <input aria-labelledby="email" type="email" name="user_email"
                            class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-800 py-3 w-full pl-3 mt-2"
                            required />
                    </div>
                    @error('user_email')
                        <div class="p-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                            <span class="font-medium">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mt-4  w-full">
                    <label for="pass" class="text-sm font-medium leading-none text-gray-800">
                        Password
                    </label>
                    <div class="relative flex items-center justify-center">
                        <input id="pass" type="password" name="user_password"
                            class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-800 py-3 w-full pl-3 mt-2"
                            required />
                    </div>
                    @error('user_password')
                        <div class="p-4 mb-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                            <span class="font-medium">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mt-4  w-full">
                    <label for="cpass" class="text-sm font-medium leading-none text-gray-800">
                        Create Password
                    </label>
                    <div class="relative flex items-center justify-center">
                        <input id="cpass" type="password" name="user_password_again"
                            class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-800 py-3 w-full pl-3 mt-2"required />
                    </div>
                    @error('user_password_again')
                        <div class="p-4 mt-1 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                            <span class="font-medium">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="mt-6">
                    <button type="submit" name="signup" role="button" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 text-sm font-semibold leading-none text-white focus:outline-none bg-indigo-700 border rounded hover:bg-indigo-600 py-4 w-full">
                        Register now</button>
                </div>
            </div>
        </div>
    </form>
</x-guest-layout>
