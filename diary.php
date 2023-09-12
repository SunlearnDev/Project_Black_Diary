<div class="container mx-auto py-10 h-64 md:w-3/5 w-10/12 px-6">
    <?php
    $userName = "SELECT * FROM diary";
    $userResult = mysqli_query($conn, $userName);
    if ($userResult) {
        while ($row = mysqli_fetch_assoc($userResult)) { ?>
            <!-- --------------------hiện tên và ảnh avatar và thời gian---------------------   -->
            <div diary-id="<?php echo $row['id']; ?>"
                class="parent-content w-full h-auto rounded border-solid border-2 border-gray-300 bg-black p-4 mb-4">
                <div class="flex justify-between mb-2">
                    <?php
                    $checkid = "SELECT * FROM user WHERE id = " . $row['userID'];
                    $userResultid = mysqli_query($conn, $checkid);
                    while ($rowid = mysqli_fetch_assoc($userResultid)) { ?>
                        <div class="mb-4 gird grid-cols-2 flex gap-2">
                            <div class="w-10 h-10">
                                <img class="w-full mr-4 h-10 w-full p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500"
                                    src="<?php echo $rowid['avatar']; ?>" alt="Bordered avatar">
                            </div>
                            <div class="w-auto ml-2 text-white grid grid-rows-2">
                                <a href="">
                                    <?php echo $rowid['userName']; ?>
                                </a>
                                <span class="time" data-timeago="<?php echo $row['createdAt']; ?>"> </span>
                            </div>
                        </div>
                    <?php } ?>

                    <!-- Thanh tab chỉnh sửa -->
                    <?php
                    if (!empty($useArr) && isset($useArr[0]['email'])) {
                        ?>
                        <div class="relative">
                            <button
                                class="open-setting h-10 w-10   duration-500 flex items-center shadow  justify-center cursor-pointer text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" width="18" height="18" class="text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>
                            </button>
                            <div
                                class="absolute papillae scale-0 opacity-0  hidden duration-700 transition-all right-0 top-0 transform  ">
                                <ul class=" p-2 backdrop-blur bg-gray-700  rounded-md">
                                    <li>
                                        <button
                                            class="text-white flex justify-start items-center p-2 w-32 hover:bg-gray-800 rounded-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class=" mr-2 w-4 -h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                                            </svg> Lưu
                                        </button>
                                    </li>
                                    <li>
                                        <?php if ($rows['id'] === $row['userID']) { ?>
                                            <button
                                                class="text-white flex justify-start items-center p-2  w-32 hover:bg-gray-800 rounded-md js-setting "
                                                data-id="<?php echo $row['id']; ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class=" mr-2 w-4 -h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg> Chỉnh sửa
                                            </button>
                                        <?php } ?>
                                    </li>
                                    <li>
                                        <button
                                            class="text-white flex justify-start items-center p-2  w-32 hover:bg-gray-800 rounded-md ">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class=" mr-2 w-4 -h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                                            </svg> Copy link
                                        </button>
                                    </li>
                                    <li>
                                        <form action="curd.php" method="POST" enctype="multipart/form-data" class="mb-0">
                                            <?php

                                            if ($rows['id'] == $row['userID']) { ?>
                                                <div class="">
                                                    <input type="hidden" class="hidden" name="id_delet"
                                                        value="<?php echo $row['id']; ?>">
                                                    <button
                                                        class="text-white flex justify-start items-center p-2  w-32 hover:bg-gray-800 rounded-md "
                                                        name="deleter">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor" class=" mr-2 w-4 -h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                        </svg> Xóa
                                                    </button>
                                                </div>
                                            <?php } else { ?>
                                                <div div class="">
                                                    <input type="hidden" class="hidden" name="" value="<?php echo $row['id']; ?>">
                                                    <button
                                                        class="text-white flex justify-start items-center p-2  w-32 hover:bg-gray-800 rounded-md "
                                                        name="deleter">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor" class=" mr-2 w-4 -h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                        </svg> Ẩn
                                                    </button>
                                                </div>
                                            <?php } ?>
                                        </form>
                                    </li>
                                    <li>
                                        <button
                                            class="text-white flex justify-start items-center p-2  w-32 hover:bg-gray-800 rounded-md ">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class=" mr-2 w-4 -h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                            </svg> Báo cáo
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- --------------------hiện nội dung và hình ảnh bài viết---------------------    -->
                <div class="w-full p-2 mb-2 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                    <p class="diaryContent text-white">
                        <?php echo $row['content']; ?>
                    </p>
                    <div class=" mt-2 flex justify-center" style="max-height: 788px; max-width: 940px;">
                        <img src="<?php echo $row['image']; ?>" class="diaryImage rounded-md w-full" alt="">
                    </div>

                    <!-- Hiển thị Comment -->
                    <?php
                    $cmtquery = "SELECT comment.id, image, content, comment.createdAt, userID, avatar, userName 
                                FROM comment JOIN user ON comment.userID = user.id WHERE diaryID = " . $row['id'] . " ORDER BY comment.id DESC";
                    $cmtresult = mysqli_query($conn, $cmtquery);
                    if ($cmtresult) {
                        ?>
                        <div class="w-full p-2" <?php if (!mysqli_num_rows($cmtresult))
                            echo 'hidden'; ?>>
                            <div class="flex w-full items-center justify-end dark:text-white py-2 border-b border-gray-300">
                                <div class="flex items-center gap-1 hover:underline cursor-pointer" onclick="toggleCmtHidden(this)">
                                    <span class="cmtTotal">
                                        <?php echo mysqli_num_rows($cmtresult); ?>
                                    </span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 011.037-.443 48.282 48.282 0 005.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="w-full dark:text-white mt-4">
                                <ul class="max-h-72 p-1 overscroll-none overflow-y-scroll flex flex-col gap-2 comment-list hidden">
                                    <?php
                                    while ($cmt = mysqli_fetch_assoc($cmtresult)) {
                                        ?>
                                        <li comment-id="<?php echo $cmt['id']; ?>" user-id="<?php echo $cmt['userID']; ?>">
                                            <div class="flex gap-2">
                                                <div class="w-8 h-8 shrink-0">
                                                    <img class="bg-white w-full h-full p-1 rounded-full ring-2 ring-gray-400 dark:ring-gray-500 dark:bg-transparent"
                                                        src="<?php echo $cmt['avatar']; ?>" alt="">
                                                </div>
                                                <div>
                                                    <div
                                                        class="inline-block px-2 py-1 rounded-lg border border-gray-300 bg-white dark:bg-gray-800 dark:border-none break-words">
                                                        <div class="font-bold text-sm dark:text-white">
                                                            <?php echo $cmt['userName'] ?>
                                                        </div>
                                                        <div style="word-break: break-word;">
                                                            <?php echo $cmt['content']; ?>
                                                        </div>
                                                    </div>
                                                    <div class="flex">
                                                        <div class="time text-xs text-gray-500 dark:text-white"
                                                            data-timeago="<?php echo $cmt['createdAt']; ?>"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>

                <!-- Comment form -->
                <form class="comment">
                    <div
                        class="flex items-center border border-gray-300 px-3 py-2 rounded-lg bg-gray-100 dark:border-gray-600 dark:bg-gray-700">
                        <button type="button"
                            class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 18">
                                <path fill="currentColor"
                                    d="M13 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM7.565 7.423 4.5 14h11.518l-2.516-3.71L11 13 7.565 7.423Z" />
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18 1H2a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM7.565 7.423 4.5 14h11.518l-2.516-3.71L11 13 7.565 7.423Z" />
                            </svg>
                            <span class="sr-only">Upload image</span>
                        </button>
                        <button type="button"
                            class="p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.408 7.5h.01m-6.876 0h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM4.6 11a5.5 5.5 0 0 0 10.81 0H4.6Z" />
                            </svg>
                            <span class="sr-only">Add emoji</span>
                        </button>
                        <textarea name="content" rows="1"
                            class="inputField block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Your comment..."></textarea>
                        <button type="submit"
                            class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                            <svg class="w-5 h-5 rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 18 20">
                                <path
                                    d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        <?php }
    }
    ?>
</div>