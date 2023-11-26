<form action="/listsearch" method="get"  class="w-[350px]">            
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only bg-white">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-4 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="text" name="search" id="default-search" class=" w-full p-2 ps-10 text-sm text-gray-900 outline-none h-10 rounded-lg bg-gray-200 " placeholder="Search ..." required>
        <button type="submit" class="text-white absolute end-[0.125rem] bottom-[2px] bg-blue-700 hover:bg-blue-800  font-medium rounded-lg text-sm px-4 h-9 ">Search</button>
    </div>
</form>