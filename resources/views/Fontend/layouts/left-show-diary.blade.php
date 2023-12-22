<!-- left -->
<aside id="logo-sidebar"
    class="top-0 left-0 z-40 w-44 md:w-56 lg:w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div id="reaction-icon" class="grid grid-cols gap-2 float-right">
        <button type="button" onclick="change(this.value)" id="icon1" name='status' value="1"
            class="transition ease-in-out delay-150 w-14 h-10  border border-red-200 rounded-xl text-xl text-center p-1 shadow-sm  mr-2 hover:bg-red-100 hover:-translate-y-1 hover:scale-110 duration-300 focus-visible:ring-offset-2 active:scale-95">
            ❤️
        </button>
        <button type="button" onclick="change(this.value)" id="icon2" name='status' value="2"
            class="transition ease-in-out delay-150 w-14 h-10  border border-amber-200 rounded-xl only: text-center p-1 shadow-sm  mr-2 hover:bg-amber-100 hover:-translate-y-1 hover:scale-110 duration-300 ">
            👊
        </button>
        <button type="button" onclick="change(this.value)" id="icon3" name='status' value="3"
            class="transition ease-in-out delay-150 w-14 h-10  border border-green-200 rounded-xl only: text-center p-1 shadow-sm  mr-2 hover:bg-green-100 hover:-translate-y-1 hover:scale-110 duration-300 ">
            🎄
        </button>
        <button type="button" onclick="change(this.value)" id="icon4" name='status' value="4"
            class="transition ease-in-out delay-150 w-14 h-10  border border-blue-200 rounded-xl only: text-center p-1 shadow-sm  mr-2 hover:bg-blue-100 hover:-translate-y-1 hover:scale-110 duration-300 ">
            ⛈️
        </button>
    </div>
</aside>
<script>
    function change(value) {
        // Lấy ra tất cả các button
        var buttons = document.querySelectorAll('#reaction-icon button');

        // Xóa tất cả class bg-color-100
        buttons.forEach(function (button) {
            button.classList.remove('bg-red-100', 'bg-amber-100', 'bg-green-100', 'bg-blue-100');
        });
        let iconId = parseInt(value);
        // Thêm class tương ứng vào button được click
        var clickedButton = document.getElementById('icon' + iconId);
        switch (iconId) {
            case 1:
                clickedButton.classList.add('bg-red-100');
                break;
            case 2:
                clickedButton.classList.add('bg-amber-100');
                break;
            case 3:
                clickedButton.classList.add('bg-green-100');
                break;
            case 4:
                clickedButton.classList.add('bg-blue-100');
                break;
            default:
                break;
        }
    }
</script>
