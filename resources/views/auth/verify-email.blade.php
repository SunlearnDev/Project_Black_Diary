<x-guest-layout>
    <div class="mb-4 text-sm  text-gray-600">
        {{ __('Chào mừng bạn đến với cộng đồng của chúng tôi!
                Bạn đã sẵn sàng để khám phá những điều thú vị chưa?
                Nhưng trước tiên, hãy cho chúng tôi biết rằng bạn không
                phải là một robot bằng cách xác nhận email của bạn.
                Bạn chỉ cần bấm vào đường link mà chúng tôi đã gửi cho bạn trong hộp thư điện tử.
                Nếu bạn không thấy nó, có thể nó đã lạc vào thư rác hoặc bị 
                ăn mất bởi một con quái vật đói bụng. Đừng lo lắng, chúng tôi 
                có thể gửi lại cho bạn một cái mới nếu bạn muốn..') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium  text-sm text-green-600">
            {{ __('Một liên kết xác minh mới đã được gửi đến địa chỉ email bạn đã cung cấp khi đăng ký') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Gửi lại email xác minh') }}
                </x-primary-button>
            </div>
        </form>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Logout
            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
            </button>
        </form>
    </div>
</x-guest-layout>
