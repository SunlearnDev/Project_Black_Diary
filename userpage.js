// Preview image - post
const postImage = document.getElementById('file-input-post'),
    previewImage1 = document.getElementById('previewImage-post');

postImage.addEventListener('change', function () {
    const image = new Image();
    image.onload = () => {
        previewImage1.classList.remove('hidden');
        previewImage1.innerHTML = `<img class="w-full" src="` + image.src + `" alt="Image">`;
    }
    image.onerror = (e) => {
        e.target.value = '';
        previewImage1.classList.add('hidden');
    }
    image.src = URL.createObjectURL(postImage.files[0]);
})

// Mở đóng form đăng bài
const postBefore = document.getElementById("post-before"),
    postAfter = document.getElementById("post-after"),
    closePost = document.getElementById("close-post");

postBefore.onclick = () => {
    postAfter.classList.remove("hidden");
    document.body.classList.add("overflow-hidden");
}
closePost.onclick = () => {
    postAfter.classList.add("hidden");
    document.body.classList.remove("overflow-hidden");
}

// Preview image - update
const updateImage = document.getElementById('file-input-update'),
    previewImage2 = document.getElementById('previewImage-update');

updateImage.addEventListener('change', function () {
    const image = new Image();
    image.onload = () => {
        previewImage2.classList.remove('hidden');
        previewImage2.innerHTML = `<img class="w-full" src="` + image.src + `" alt="Image">`;
    }
    image.onerror = (e) => {
        e.target.value = '';
        previewImage2.classList.add('hidden');
    }
    image.src = URL.createObjectURL(updateImage.files[0]);
})

// Mở đóng form chỉnh sửa
const updateBefore = document.querySelectorAll(".update-button"),
    updateAfter = document.getElementById("update-after"),
    updateForm = updateAfter.querySelector('form'),
    closeUpdate = document.getElementById("close-update");

updateBefore.forEach(button => {
    button.onclick = () => {
        updateAfter.classList.remove("hidden");
        document.body.classList.add("overflow-hidden");

        let parentContent = button.closest(".parent-content"),
            diaryID = parentContent.getAttribute("diary-id"),
            content = parentContent.querySelector(".content"),
            image = parentContent.querySelector(".image").getAttribute("src");

        let inputs = updateAfter.querySelector('.inputField');
        inputs.value = content.innerText;

        if (image != '') {
            previewImage2.classList.remove('hidden');
            previewImage2.innerHTML = `<img class="w-full" src="` + image + `" alt="Image">`;
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
    }
})
closeUpdate.onclick = () => {
    updateAfter.classList.add("hidden");
    previewImage2.classList.add('hidden');
    document.body.classList.remove("overflow-hidden");
}

// Kiểm tra form
function checkForm(form) {
    let check = false,
        inputs = form.querySelectorAll('.inputField');
    inputs.forEach(input => {
        if (input.value.trim() != '') {
            check = true;
        }
    })
    return check;
}

// Hiển thị thời gian đăng bài
function timeAgo(time) {
    const now = new Date();
    const postTime = new Date(time);
    const countTime = now - postTime;

    const minutes = Math.floor(countTime / (1000 * 60));
    const hours = Math.floor(countTime / (1000 * 60 * 60));
    const days = Math.floor(countTime / (1000 * 60 * 60 * 24));

    if (days > 0) {
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

// bật tắt thẻ nhỏ tác vụ trong bài viết
$(document).ready(function () {
    $('.open-setting').click(function () {
        $(this).siblings('.papillae').toggleClass('hidden scale-100 opacity-100 right-[35px] ');
        $(this).toggleClass('rotate-90');
    })
})

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