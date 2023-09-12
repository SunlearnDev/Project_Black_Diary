<div class=" bg-black hidden top-0 left-0 right-0 bottom-0 fixed bg-opacity-30 js-edit-cmt ">
    <div class="max-w-xl mt-24 mx-auto bg-neutral-900   shadow-md  relative">
        <div class="bg-black w-full h-[600px] p-4  rounded-md">
            <div class="flex justify-between items-center mb-4">
                <div class="flex items-center">
                    <img src="<?php echo $useArr[0]['avatar'] ?>" alt="Avatar" class="w-10 h-10 rounded-full mr-2">
                    <h2 class="text-xl text-white font-semibold">
                        <?php echo $useArr[0]['userName'] ?>
                    </h2>
                </div>
                <button class="text-gray-500 hover:text-gray-700 js-close-set">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <!-- Form chỉnh sửa -->
            <form id="updateForm" class="flex flex-col h-5/6 px-4 gap-2" enctype="multipart/form-data" onsubmit="return checkForm(this)">
                <!-- Chế độ hiển thị -->
                <select
                    class="rounded px-2 w-32 bg-gray-100 border border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white"
                    name="status">
                    <option value="0" selected>
                        Riêng tư
                    </option>
                    <option value="1">
                        Mọi người
                    </option>
                </select>
                <!-- Nội dung -->
                <div class="h-3/5 overflow-y-auto grow flex flex-col gap-2">
                    <textarea name="content"
                        class="inputField h-full min-h-[50%] w-full text-md px-3 py-2 bg-gray-100 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Ghi lại trải nghiệm của bạn ..."></textarea>
                    <div id="previewImage-update"
                        class="hidden w-full flex justify-center bg-gray-100 rounded-lg border-4 border-dashed border-gray-300 dark:bg-gray-800 dark:border-gray-600">
                        <!-- Image here -->
                    </div>
                </div>
                <!-- Chọn hình ảnh -->
                <div class="flex justify-end items-center">
                    <label for="file-input-update"
                        class="justify-self-end w-10 h-10 p-2 inline-block rounded-lg cursor-pointer text-gray-700 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg class="w-full h-full" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 18">
                            <path fill="currentColor"
                                d="M13 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM7.565 7.423 4.5 14h11.518l-2.516-3.71L11 13 7.565 7.423Z" />
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18 1H2a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM7.565 7.423 4.5 14h11.518l-2.516-3.71L11 13 7.565 7.423Z" />
                        </svg>
                    </label>
                    <input class="inputField hidden" id="file-input-update" type="file" name="image">
                </div>
                <!-- Submit -->
                <button type="submit" name="submit"
                    class="h-8 bg-slate-900 hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2 focus:ring-offset-slate-50 text-white font-semibold rounded-lg w-full dark:bg-sky-500 dark:highlight-white/20 dark:hover:bg-sky-400">
                    Lưu
                </button>
            </form>
        </div>
    </div>
</div>