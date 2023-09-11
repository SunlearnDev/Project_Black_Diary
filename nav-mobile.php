<div class="w-64 z-40 md:w-1/5 w-1/12 absolute bg-gray-800 shadow md:h-full flex-col justify-between sm:hidden transition duration-150 ease-in-out"
                id="mobile-nav">
                <button aria-label="toggle sidebar" id="openSideBar"
                    class="h-10 w-10 bg-gray-800 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 rounded focus:ring-gray-800"
                    onclick="sidebarHandler(true)">
                    <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_icons_at_bottom-svg7.svg"
                        alt="toggler">
                </button>
                <button aria-label="Close sidebar" id="closeSideBar"
                    class="hidden h-10 w-10 bg-gray-800 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer text-white"
                    onclick="sidebarHandler(false)">
                    <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_icons_at_bottom-svg8.svg"
                        alt="cross">
                </button>
                <div class="px-8">
                    <ul class="mt-12">
                        <li class="flex w-full justify-between text-gray-300 cursor-pointer items-center mb-6">
                            <a href="javascript:void(0)"
                                class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid"
                                    width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                    <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                    <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                    <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                                </svg>
                                <span class="text-sm ml-2">Xem Thêm</span>
                            </a>
                            <div
                                class="py-1 px-3 bg-gray-600 rounded text-gray-300 flex items-center justify-between text-xs">
                                5</div>
                        </li>
                        <li
                            class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                            <a href="javascript:void(0)"
                                class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle"
                                    width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <path
                                        d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1">
                                    </path>
                                </svg>
                                <span class="text-sm ml-2">Game </span>
                            </a>

                        </li>
                        <li
                            class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                            <a href="javascript:void(0)"
                                class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" width="20" height="20" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                                </svg>
                                <span class="text-sm ml-2">Mã giảm giá</span>
                            </a>
                        </li>
                        <li
                            class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                            <a href="javascript:void(0)"
                                class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="20"
                                    height="20" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg>
                                <span class="text-sm ml-2">Chiến dịch gây quỹ</span>
                            </a>
                        </li>
                        <li
                            class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                            <a href="javascript:void(0)"
                                class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" vwidth="20"
                                    height="20" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                                </svg>
                                <span class="text-sm ml-2">Đã Lưu</span>
                            </a>
                            <div
                                class="py-1 px-3 bg-gray-600 rounded text-gray-300 flex items-center justify-center text-xs">
                                25</div>
                        </li>
                        <li
                            class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                            <a href="javascript:void(0)"
                                class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" width="18" height="18" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-sm ml-2">Kỷ Niệm</span>
                            </a>
                        </li>
                        <li
                            class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                            <a href="javascript:void(0)"
                                class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="18" height="18"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                </svg>
                                <span class="text-sm ml-2">Sự Kiện</span>
                            </a>
                        </li>
                        <li
                            class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                            <a href="javascript:void(0)"
                                class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stack"
                                    width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="12 4 4 8 12 12 20 8 12 4" />
                                    <polyline points="4 12 12 16 20 12" />
                                    <polyline points="4 16 12 20 20 16" />
                                </svg>
                                <span class="text-sm ml-2">Inventory</span>
                            </a>
                        </li>
                        <li
                            class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                            <a href="javascript:void(0)"
                                class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-compass"
                                    width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <polyline points="8 16 10 10 16 8 14 14 8 16"></polyline>
                                    <circle cx="12" cy="12" r="9"></circle>
                                </svg>
                                <span class="text-sm ml-2">Hiệu suất</span>
                            </a>
                        </li>
                        <li
                            class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center">
                            <a href="javascript:void(0)"
                                class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings"
                                    width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                                <span class="text-sm ml-2">Settings</span>
                            </a>
                        </li>
                    </ul>
                    <div class="flex justify-center mt-48 mb-4 w-full">
                        <div class="relative">
                            <div class="text-gray-300 absolute ml-4 inset-0 m-auto w-4 h-4">
                                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_icons_at_bottom-svg2.svg"
                                    alt="Search">
                            </div>
                            <input
                                class="bg-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-100  rounded w-full text-sm text-gray-300 placeholder-gray-400 bg-gray-100 pl-10 py-2"
                                type="text" placeholder="Search" />
                        </div>
                    </div>
                </div>
                <div class="px-8 border-t border-gray-700">
                </div>
            </div>