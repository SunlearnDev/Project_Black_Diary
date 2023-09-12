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

        updateForm.addEventListener('submit', function (e) {
            e.preventDefault();

            if (checkForm(this)) {
                let data = new FormData(this);
                fetch(`diary-update.php?diaryID=${diaryID}`, {
                    method: 'POST',
                    body: data,
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.error) {
                            console.error(data.error);
                        } else {
                            location.reload();
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    })
            }
        })
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

// Comment
const cmtForms = document.querySelectorAll('.comment');
cmtForms.forEach(cmtForm => {
    cmtForm.addEventListener('submit', function (e) {
        e.preventDefault();
        let parentContent = this.parentElement,
            diaryID = parentContent.getAttribute("diary-id");

        if (checkForm(this)) {
            let data = new FormData(this);
            this.reset();
            fetch(`comment-add.php?diaryID=${diaryID}`, {
                method: 'POST',
                body: data,
            })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        console.error(data.error);
                    } else {
                        let time = timeAgo(data[1].createdAt);
                        html = `<li comment-id="${data[1].id}" user-id="${data[1].userID}">
                                    <div class="flex gap-2">
                                        <div class="w-8 h-8">
                                            <img class="bg-white w-full h-full p-1 rounded-full ring-2 ring-gray-400 dark:ring-gray-500 dark:bg-transparent"
                                                src="${data[1].avatar}" alt="">
                                        </div>
                                        <div class="max-w-[calc(100%-2.5rem)]">
                                            <div
                                                class="px-2 py-1 rounded-lg border border-gray-300 bg-white dark:bg-gray-800 dark:border-none break-words">
                                                <div class="font-bold text-sm dark:text-white">
                                                ${data[1].userName}
                                                </div>
                                                <div>
                                                ${data[1].content}
                                                </div>
                                            </div>
                                            <div class="flex">
                                                <div class="time text-xs text-gray-500 dark:text-white">${time}</div>
                                            </div>
                                        </div>
                                    </div>
                                </li>`
                        let cmtlist = parentContent.querySelector('.comment-list'),
                            firstChild = cmtlist.firstElementChild,
                            cmtTotal = parentContent.querySelector('.cmtTotal');

                        if (firstChild) {
                            firstChild.insertAdjacentHTML('beforebegin', html);
                        }
                        else {
                            cmtlist.innerHTML = html;
                            cmtlist.closest('[hidden]').removeAttribute('hidden');
                        }
                        cmtTotal.innerText = data[0];
                        cmtlist.classList.remove("hidden");
                        // Dịch chuyển đến comment nếu bị khuất
                        cmtlist.scrollTop = 0;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                })
        }
    })
})

// Ẩn hiện comment
function toggleCmtHidden(e) {
    e.parentElement.nextElementSibling.querySelector(".comment-list").classList.toggle("hidden");
}