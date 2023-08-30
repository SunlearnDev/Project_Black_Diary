<?php
    session_start();
    include 'connect.php'; 


?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <title>Nhật Ký Đen</title>
</head>
<body class="dark:bg-neutral-900">
<header class="fixed left-0 right-0 top-0 z-50">
<nav class="bg-white border-gray-200 dark:bg-black  ">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen w-full p-4 pr-16">
        <a href="#" class="flex items-center justify-start  ">
            <img src="/img/logo/logonote.png" class="h-10 mr-3" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Nhật Ký Đen</span>
        </a>
        <nav class="bg-gray-50 dark:bg-black w-4/5 pr-16">
            <div class="max-w-screen-xl px-4 py-3 mx-auto">
                <div class="flex items-center justify-center">
                    <ul class="flex flex-row grid grid-cols-4 font-medium mt-0 w-full mx-2 space-x-8 text-sm ">
                        <li class="">
                            <!-- Home -->
                            <!-- <a href="#" class="text-gray-900 flex justify-center dark:text-white hover:underline" aria-current="page">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                  </svg>                          
                            </a> -->
                            <!-- home 2 -->
                            <a href="#" class="  text-gray-900 flex justify-center dark:text-white hover:underline" aria-current="page">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-yellow-600 dark:text-yellow-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                  </svg>                          
                            </a>
                        </li>
                        <li class="">
                            <!-- message -->
                            <a href="#" class="text-gray-900 flex justify-center  dark:text-white hover:underline"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.068.157 2.148.279 3.238.364.466.037.893.281 1.153.671L12 21l2.652-3.978c.26-.39.687-.634 1.153-.67 1.09-.086 2.17-.208 3.238-.365 1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                              </svg>
                            </a>
                            <!-- message đến -->
                            <a href="#" class="hidden text-gray-900 flex justify-center  dark:text-white hover:underline relative">
                                <div class="absolute">
                                    <span class="relative flex h-3 w-3 -top-1 -right-2 z-50">
                                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                                       </span>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-yellow-600 dark:text-yellow-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                                  </svg>                          
                            </a>
                        </li>
                        <li class=""> 
                            <!-- bell -->
                            <a href="#" class="text-gray-900 flex justify-center dark:text-white hover:underline"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                              </svg>
                              </a>
                              <!-- bell 2 -->
                              <a href="#" class="hidden text-gray-900 flex justify-center dark:text-white hover:underline relative">
                                <div class="absolute">
                                    <span class="relative flex h-3 w-3 -top-1 -right-2 z-50">
                                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                                       </span>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-yellow-600 dark:text-yellow-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                              </svg>
                              </a>
                        </li>
                        <li class="">
                            <!-- user -->
                            <a href="#" class="text-gray-900 flex justify-center dark:text-white hover:underline"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                              </svg></a>
                            <!-- user 2-->
                              <a href="#" class="hidden text-gray-900 flex justify-center dark:text-white hover:underline"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-yellow-600 dark:text-yellow-500 ">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                              </svg></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="flex items-center ">  
            <a href="#" class="text-xl font-bold text-yellow-600 dark:text-yellow-500 hover:underline">Login</a>
        </div>
    </div>
</nav>
</header>
<nav class="mt-20" >  
    <div class="flex flex-no-wrap ">  
        <!-- left    -->      
        <div style="min-height: 716px" class=" w-64 md:w-1/5 w-1/12 sm:relative  shadow md:h-full flex-col justify-between hidden sm:flex">
        <div class="fixed top-10 bg-black left-0 h-screen bottom-0 w-64  ">
        <div class="px-8  "> 
                <ul class="mt-12">
                    <li class="flex w-full justify-between text-gray-300 cursor-pointer items-center mb-6">                 
                    <a href="">
                        <img class="w-10 h-10 p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500" src="" alt="Bordered avatar">
                     <!-- ?php 
                     $id =1;
                        $userName = "SELECT * FROM user WHERE id = $id";
                        $userResult = mysqli_query($conn, $userName);
                        if($userResult){
                           $row =  mysqli_fetch_assoc($userResult);
                           echo $row['userName'];
                        }
                     ? -->
                    </a>
                    </li>
                    <li class="flex w-full justify-between text-gray-300 cursor-pointer items-center mb-6">
                        <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                            </svg>
                            <span class="text-sm ml-2">Xem Thêm</span>
                        </a>
                        <div class="py-1 px-3 bg-gray-600 rounded text-gray-300 flex items-center justify-between text-xs">5</div>
                    </li>
                    <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                        <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                <path d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1"></path>
                            </svg>
                            <span class="text-sm ml-2">Game </span>
                        </a>
                        
                    </li>
                    
                    <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                        <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white" >
                            
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" width="20" height="20" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                              </svg>
                              
                            <span class="text-sm ml-2">Mã giảm giá</span>
                        </a>
                    </li>
                    <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                        <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="20" height="20" stroke-width="1.5" stroke="currentColor" >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                              </svg>                              
                            <span class="text-sm ml-2">Chiến dịch gây quỹ</span>
                        </a>
                        
                    </li>
                    <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                        <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"vwidth="20" height="20" stroke-width="1.5" stroke="currentColor" >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                              </svg>
                                                     
                            <span class="text-sm ml-2">Đã Lưu</span>
                        </a>
                        <div class="py-1 px-3 bg-gray-600 rounded text-gray-300 flex items-center justify-center text-xs">25</div>
                    </li>
                    <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                        <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"  width="18" height="18" stroke="currentColor" >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>                    
                            <span class="text-sm ml-2">Kỷ Niệm</span>
                        </a>
                        
                    </li>
                    <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                        <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                              </svg>   
                            <span class="text-sm ml-2">Sự Kiện</span>
                        </a>
                        
                    </li>
                    <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                        <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stack" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <polyline points="12 4 4 8 12 12 20 8 12 4" />
                                <polyline points="4 12 12 16 20 12" />
                                <polyline points="4 16 12 20 20 16" />
                            </svg>
                            <span class="text-sm ml-2">Inventory</span>
                        </a>
                    </li>
                    <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                        <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-compass" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                <polyline points="8 16 10 10 16 8 14 14 8 16"></polyline>
                                <circle cx="12" cy="12" r="9"></circle>
                            </svg>
                            <span class="text-sm ml-2">Hiệu suất</span>
                        </a>
                    </li>
                    <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center">
                        <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                            <span class="text-sm ml-2">Settings</span>
                        </a>
                    </li>
                </ul>
                <div class="flex justify-center mt-2 mb-2 w-full">
                    <div class="relative">
                        <div class="text-gray-300 absolute ml-4 inset-0 m-auto w-4 h-4">
                          <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_icons_at_bottom-svg2.svg" alt="Search">
                        </div>
                        <input class="bg-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-100 rounded w-full text-sm text-gray-300 placeholder-gray-400 bg-gray-100 pl-10 py-2" type="text" placeholder="Search" />
                    </div>
                </div>
            </div>
            <div class="p-2  border-t border-gray-700">
               <ul class="flex flex-wrap text-xs text-gray-500">
                <li class="list-disc w-auto ml-4 hover:underline hover:text-gray-300 "><a href="">Quyền riêng tư</a></li>
                <li class="list-disc w-auto ml-4 hover:underline hover:text-gray-300 "><a href="">Điều khoản</a></li>
                <li class="list-disc w-auto ml-4  hover:underline hover:text-gray-300"><a href="">Quảng Cáo</a></li>
                <li class="list-disc w-auto ml-4  hover:underline hover:text-gray-300"><a href="">Lựa chọn quảng cáo</a></li>
                <li class="list-disc w-auto ml-4 hover:underline hover:text-gray-300 "><a href="">Cookie</a></li>          
                <li class="list-disc w-auto ml-4  hover:underline hover:text-gray-300"><a href=""> B&D © 2023</a></li>
               </ul>
            </div>
        </div>   
        </div>
        <!-- mobile-nav -->
        <div class="w-64 z-40 md:w-1/5 w-1/12 absolute bg-gray-800 shadow md:h-full flex-col justify-between sm:hidden transition duration-150 ease-in-out" id="mobile-nav">
            <button aria-label="toggle sidebar" id="openSideBar" class="h-10 w-10 bg-gray-800 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 rounded focus:ring-gray-800" onclick="sidebarHandler(true)">
               <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_icons_at_bottom-svg7.svg" alt="toggler">
            </button>
            <button aria-label="Close sidebar" id="closeSideBar" class="hidden h-10 w-10 bg-gray-800 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer text-white" onclick="sidebarHandler(false)">
              <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_icons_at_bottom-svg8.svg" alt="cross">
            </button>
            <div class="px-8">
            <ul class="mt-12">
            
                <li class="flex w-full justify-between text-gray-300 cursor-pointer items-center mb-6">
                    <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"></path>
                            <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                            <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                            <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                            <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                        </svg>
                        <span class="text-sm ml-2">Xem Thêm</span>
                    </a>
                    <div class="py-1 px-3 bg-gray-600 rounded text-gray-300 flex items-center justify-between text-xs">5</div>
                </li>
                <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                    <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"></path>
                            <path d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1"></path>
                        </svg>
                        <span class="text-sm ml-2">Game </span>
                    </a>
                    
                </li> 
                <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                    <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white" >
                        
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" width="20" height="20" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                          </svg>
                          
                        <span class="text-sm ml-2">Mã giảm giá</span>
                    </a>
                </li>
                <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                    <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="20" height="20" stroke-width="1.5" stroke="currentColor" >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                          </svg>                              
                        <span class="text-sm ml-2">Chiến dịch gây quỹ</span>
                    </a>
                    
                </li>
                <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                    <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"vwidth="20" height="20" stroke-width="1.5" stroke="currentColor" >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                          </svg>
                                                 
                        <span class="text-sm ml-2">Đã Lưu</span>
                    </a>
                    <div class="py-1 px-3 bg-gray-600 rounded text-gray-300 flex items-center justify-center text-xs">25</div>
                </li>
                <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                    <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"  width="18" height="18" stroke="currentColor" >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>                    
                        <span class="text-sm ml-2">Kỷ Niệm</span>
                    </a>
                    
                </li>
                <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                    <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                          </svg>   
                        <span class="text-sm ml-2">Sự Kiện</span>
                    </a>
                    
                </li>
                <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                    <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stack" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <polyline points="12 4 4 8 12 12 20 8 12 4" />
                            <polyline points="4 12 12 16 20 12" />
                            <polyline points="4 16 12 20 20 16" />
                        </svg>
                        <span class="text-sm ml-2">Inventory</span>
                    </a>
                </li>
                <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                    <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-compass" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"></path>
                            <polyline points="8 16 10 10 16 8 14 14 8 16"></polyline>
                            <circle cx="12" cy="12" r="9"></circle>
                        </svg>
                        <span class="text-sm ml-2">Hiệu suất</span>
                    </a>
                </li>
                <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center">
                    <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <circle cx="12" cy="12" r="3" />
                        </svg>
                        <span class="text-sm ml-2">Settings</span>
                    </a>
                </li>
                </ul>
                <div class="flex justify-center mt-48 mb-4 w-full">
                    <div class="relative">
                        <div class="text-gray-300 absolute ml-4 inset-0 m-auto w-4 h-4">
                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_icons_at_bottom-svg2.svg" alt="Search">
                        </div>
                        <input class="bg-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-100  rounded w-full text-sm text-gray-300 placeholder-gray-400 bg-gray-100 pl-10 py-2" type="text" placeholder="Search" />
                    </div>
                </div>
            </div>
            <div class="px-8 border-t border-gray-700">  
            </div>
         </div>
          <!--  --------------------------------------------------------------------------------------------------------- -->
         <!--  -----------------------------------------------------Diary---------------------------------------------------- -->
          <!--  --------------------------------------------------------------------------------------------------------- -->
        <div class="container mx-auto py-10 h-64 md:w-3/5 w-10/12 px-6">        
            <?php  
                        $userName = "SELECT * FROM diary WHERE id ";
                        $userResult = mysqli_query($conn, $userName);
                        if($userResult){
                           while($row =  mysqli_fetch_assoc($userResult)){?>
                    <!-- --------------------hiện tên và ảnh avatar và thời gian---------------------   -->
                    <div class="w-full h-auto rounded border-solid border-2 border-gray-300 bg-black p-4 mb-4">
                    <div class="flex justify-between mb-2">
                    <?php 
                $checkid = "SELECT * FROM user WHERE id = " . $row['userID'];
                $userResultid = mysqli_query($conn, $checkid);
                while ($rowid =  mysqli_fetch_assoc($userResultid)) { ?>
                    <div class="mb-4 gird grid-cols-2 flex gap-2">
                        <div class="w-10 h-10">
                        <img class="w-full mr-4 h-10 w-full p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500" src="<?php echo $rowid['avatar']; ?>" alt="Bordered avatar">
                        </div>
                       <div class="w-auto ml-2 text-white grid grid-rows-2">
                        <a href=""><?php echo $rowid['userName']; ?> </a>
                        <span class="time" data-timeago="<?php echo $row['createdAt']; ?>"  > </span>
                       </div>
                    </div>
                <?php } ?>
                       
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="18" height="18" class="text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                            </svg>
                        </a>          
                    </div>         
                    <!-- --------------------hiện nội dung và hình ảnh bài viết---------------------    -->
                    <div class="w-full p-2 mb-2 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                            <p class="text-white">
                            <?php echo $row['content']; ?>
                           </p>
                            <div class=" w-full  mt-2 flex justify-center">
                                <img src="<?php echo $row['image']; ?>" class=" rounded-md  " style="height: 716px; width:680px;"  alt="">
                            </div>
                           
                    </div>
                
                     <form>
                          <label for="chat" class="sr-only">Your comment...</label>
                          <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
        <button type="button" class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                <path fill="currentColor" d="M13 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM7.565 7.423 4.5 14h11.518l-2.516-3.71L11 13 7.565 7.423Z"/>
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 1H2a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z"/>
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM7.565 7.423 4.5 14h11.518l-2.516-3.71L11 13 7.565 7.423Z"/>
            </svg>
            <span class="sr-only">Upload image</span>
        </button>
        <button type="button" class="p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.408 7.5h.01m-6.876 0h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM4.6 11a5.5 5.5 0 0 0 10.81 0H4.6Z"/>
            </svg>
            <span class="sr-only">Add emoji</span>
        </button>
        <textarea id="chat" rows="1" class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..."></textarea>
            <button type="submit" class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
            <svg class="w-5 h-5 rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                <path d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z"/>
            </svg>
            <span class="sr-only">Send message</span>
        </button>
                          </div>
                     </form>        
                         
            </div>       
            <?php } }
             mysqli_close($conn);
            ?>                    
        </div>
         <!--  --------------------------------------------------------------------------------------------------------- -->
         <!--  -----------------------------------------------------End Diary---------------------------------------------------- -->
          <!--  --------------------------------------------------------------------------------------------------------- -->
        <!-- right -->
        <div style="min-height: 716px" class="w-64 md:w-1/5 w-1/12 sm:relative gshadow md:h-full flex-col justify-between hidden sm:flex">
        <div class="fixed top-10 bg-black right-0 h-screen bottom-0 w-64  "> 
        <div class="px-8">
                
                
                
            </div>
            </div>
        </div>
    </div>
</nav>

<script>
var sideBar = document.getElementById("mobile-nav");
var openSidebar = document.getElementById("openSideBar");
var closeSidebar = document.getElementById("closeSideBar");
sideBar.style.transform = "translateX(-260px)";

function sidebarHandler(flag) {
    if (flag) {
        sideBar.style.transform = "translateX(0px)";
        openSidebar.classList.add("hidden");
        closeSidebar.classList.remove("hidden");
    } else {
        sideBar.style.transform = "translateX(-260px)";
        closeSidebar.classList.add("hidden");
        openSidebar.classList.remove("hidden");
    }
}

// tính thời gian 
function timeAgo(time){
    const now= new Date();
    const postTime = new Date(time);
    const countTime = now - postTime;

    const minutes = Math.floor(countTime / (1000 * 60));
    const hours =Math.floor(countTime / (1000 * 60 *60));

    if(minutes <60 ){
        return `${minutes} minutes ago`; 
    }else{
        return `${hours} hours ago`;
    }
}
const timeElemet =document.querySelectorAll('.time');
timeElemet.forEach(element => {
    const time =element.getAttribute('data-timeago');
    const timeTxt =timeAgo(time);
    element.textContent = timeTxt;
})


</script>
</body>
</html>