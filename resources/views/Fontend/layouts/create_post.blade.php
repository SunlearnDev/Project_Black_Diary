<main class="w-full  max-w-[850px]  flex flex-col items-center  pb-2">
    <form method="POST" action="/user/create" enctype="multipart/form-data" class=" w-full " id=" text-fore">
        @csrf
        {{-- Logo, Edit, Preview --}}
        <div class="  h-[72px] w-full p-2  ">
            <div class="w-full  h-full flex justify-start items-center">
                <div class="flex items-center h-4 font-bold text-2xl col-span-2">Create Post</div>
            </div>
        </div>
        {{-- Post diary --}}
        <div class="col-span-3 px-4 py-6 bg-white rounded border border-gray-100 shadow-sm" >
            <div class="gird grid-rows-2 w-full ">
                <div class="w-full">
                    <!-- image -->
                    <div class="flex items-center justify-between w-full px-4 py-1">
                        <div class="grid grid-cols justify-center items-center gap-2" data-tooltip-target="tooltip-right" data-tooltip-placement="right">
                            <label for="dropzone-file"
                                class=" cursor-pointer bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                <p class=" text-sm text-white">Add cover image</p>
                                <input id="dropzone-file" type="file" class="hidden" name = "image" id = "image"
                                    accept="image/*" id="avatarUpload" onchange="loadFile(this)" />
                            </label>
                            <button type="button" id="removeImage"
                                class="text-red-700 bg-white border border-red-300 hover:text-white hover:bg-red-700  font-medium rounded-lg text-sm px-5 py-2.5 hidden"
                                onclick="removePreview()">Remove</button>
                        </div>
                        <img src="" alt="Avatar" id="image" name="image"
                            class="w-[350px] h-[230px] object-cover hidden" />
                    </div>
                    <!-- title, hastag -->
                    <div class="px-4 py-2 mb-6">
                        <textarea required placeholder="New post title here..." name="title"
                            class="outline-none w-full min-h-28 leading-normal text-gray-900 text-4xl font-bold my-1 resize-none overflow-hidden"></textarea>
                         <input type="text" placeholder="Add another..." name="hashtag" multiple="multiple"
                            class="w-full outline-none my-6 h-8 text-gray-400">
                    </div>
                </div>
            </div>
            <!-- content -->
            <div class="w-full mb-4 border0 rounded-lg bg-white dark:border-gray-600 px-2">

                {{-- Write content --}}
                <div class=" py-2 bg-white rounded-b-lg ">
                    <label for="editor" class="sr-only">Publish post</label>
                    <textarea id="content" name="content" rows="8"
                        class="block w-full min-h-[260px] px-0 text-sm text-black bg-white border-0 focus:ring-0 outline-none overflow-hidden dark:placeholder-gray-400"
                        placeholder="Write an article..."></textarea>
                </div>

            </div>
            <div class="px-4 flex items-center">
                {{-- Submit --}}
                <button type="submit"
                    class="text-blue-700 w-32 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Post</button>
                {{-- Public or Private --}}
                <section class="mb-2">
                    <div class="relative inline-block w-32">
                        <select name="status" id="status"
                            class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 focus:text-gray-900">
                            <option value="1">Public</option>
                            <option value="2">Private</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M7 10l5 5 5-5z" />
                            </svg>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        {{-- <div id="tooltip-right" role="tooltip" class="absolute z-10 invisible inline-block px-3 ml-10 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Tooltip on right
            <div class="tooltip-arrow ml-20" data-popper-arrow></div>
        </div> --}}
        <!-- end post -->
    </form>
</main>
