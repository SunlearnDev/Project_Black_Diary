// Đóng mở sideBar bên trái
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
function timeAgo(time) {
    const now = new Date();
    const postTime = new Date(time);
    const countTime = now - postTime;

    const minutes = Math.floor(countTime / (1000 * 60));
    const hours = Math.floor(countTime / (1000 * 60 * 60));
    const days = Math.floor(countTime / (1000 * 60 * 60 * 24));

    if (days > 0) {
        // nếu thời gian trôi qua =1 ngày thì dùng day hơn 1 ngày dùng days
        return `${days} ${days === 1 ? 'day' : 'days'} ago`;
    } else if (hours > 0) {
        return `${hours} ${hours === 1 ? 'hour' : 'hours'} ago`;
    } else if (minutes > 0) {
        return `${minutes} ${minutes === 1 ? 'minute' : 'minutes'} ago`;
    } else {
        return 'Just now';
    }
}

const timeElemet = document.querySelectorAll('.time');
timeElemet.forEach(element => {
    const time = element.getAttribute('data-timeago');
    const timeTxt = timeAgo(time);
    element.textContent = timeTxt;
})

// bật tắt thẻ nhỏ tác vụ trong  bài viết
$(document).ready(function () {
    $('.open-setting').click(function () {
        $(this).siblings('.papillae').toggleClass('hidden scale-100 opacity-100 right-[35px]');
        $(this).toggleClass('rotate-90');
    });

    // Xem trước ảnh trong form update
    const updateImge = document.getElementById('file-input-update'),
        vewImg2 = document.getElementById('previewImage-update');
    updateImge.addEventListener('change', function () {
        const img = new Image();
        img.onload = () => {
            vewImg2.classList.remove('hidden');
            vewImg2.innerHTML = `<img src="` + img.src + `" class="w-full" alt="Flowbite Logo" />`
        }
        img.onerror = (e) => {
            e.target.value = '';
            vewImg2.classList.add('hidden');
        }
        img.src = URL.createObjectURL(updateImge.files[0]);
    })

    // Mở form update
    const updateForm = document.getElementById("updateForm");

    $('.js-setting').click(function () {
        $('.js-edit-cmt').toggleClass('hidden');
        $('body').addClass('overflow-hidden');

        let parentContent = this.closest(".parent-content"),
            diaryID = parentContent.getAttribute("diary-id"),
            content = parentContent.querySelector(".diaryContent"),
            image = parentContent.querySelector(".diaryImage").getAttribute("src");

        let input = updateForm.querySelector('.inputField');
        input.value = content.innerText;

        if (image != '') {
            vewImg2.classList.remove('hidden');
            vewImg2.innerHTML = `<img class="w-full" src="` + image + `" alt="Image">`;
        }

        updateForm.action = `diary-update.php?diaryID=${diaryID}`;
    });

    // Đóng form update
    $('.js-close-set').click(function () {
        $(this).closest('.js-edit-cmt').addClass('hidden');
        $('body').removeClass('overflow-hidden');
        $('vewImg2').addClass('hidden');
    });
});

// Kiểm tra form trước khi gửi
function checkForm(form) {
    let check = false;
    inputs = form.querySelectorAll('.inputField');
    inputs.forEach(input => {
        if (input.value.trim() != '') {
            check = true;
        }
    })
    return check;
}