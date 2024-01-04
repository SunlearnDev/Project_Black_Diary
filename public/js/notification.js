$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
/* *******************  CKE5 trình soạn thảo ****************** */
const contentElement = document.querySelector('#content');
if (contentElement) {
    ClassicEditor
        .create(document.querySelector('#content'), {
            ckfinder: {
                uploadUrl: "{{ route('cheditor.upload', ['_token' => csrf_token()]) }}",
            }
        })
        .catch(error => {
            console.error(error);
        });
}
const delConfirms = document.querySelectorAll('.js-comfirm-delete');
const openConfirm = document.querySelector('.comfirm');
const deleteOk = document.querySelector('.delete-confirm');
const isFollowingBtn = document.querySelector('.follow-btn');
const reactionsContainer = document.querySelector('.reactions-icon');
const token = document.head.querySelector('meta[name="csrf-token"]')?.content;

// Function read time
function readingTime() {
    const texts = document.querySelectorAll('.contents');

    texts.forEach((text) => {
        const postId = text.getAttribute('data-post-id');
        const wpm = 200; // Words per minute
        const words = text.textContent.trim().split(/\s+/).length;
        const time = Math.ceil(words / wpm);

        // Find the reading time container for the specific post
        const readingTimeElement = document.getElementById(`readingTime_${postId}`);

        if (readingTimeElement) {
            // Update the content of the reading time container
            readingTimeElement.innerText = `${time} minute${time !== 1 ? 's' : ''} read`;
        }
    });
}
// Call the readingTime function when the web page is loaded
document.addEventListener('DOMContentLoaded', readingTime);
// hien thi thong bao
$(document).ready(function () {
    // Lấy thông báo ban đầu khi trang web được tải
    getNotifications();

    // Lắng nghe sự kiện click để lấy thông báo mới
    $('#notifications').on('click', function () {
        getNotifications();
    });

    // Hàm để lấy thông báo sử dụng Ajax
    function getNotifications() {
        $.ajax({
            url: '/user/notifications',
            type: 'GET',
            success: function (response) {
                // Hiển thị thông báo

                showNotifications(response);
                // console.log("Response Data:", response);
            },
            error: function (error) {
                console.error('Error fetching notifications:', error);
            }
        });
        // console.log("🚀 ~ file: welcome.blade.php:115 ~ getNotifications ~ response:", response)
    }

    // Hàm để hiển thị thông báo
    function showNotifications(notifications) {
        // Cập nhật số lượng thông báo
        $('#notification-count').text(notifications.length);

        // Lấy phần tử ul để thêm thông báo
        var notificationList = $('#notifications');

        // Xóa tất cả các phần tử li trong danh sách trước khi thêm mới
        notificationList.empty();

        // Kiểm tra nếu có thông báo
        if (notifications.length > 0) {
            // Duyệt qua danh sách thông báo và thêm vào danh sách
            notifications.forEach(function (notification) {
                var listItem = $('<li>').attr('id', 'notification-li');
                var button = $('<button>').addClass(
                    'flex items-center w-full justify-between grid-row py-4 rounded text-gray-500 dark:text-black hover:text-blue-600 dark:hover:bg-blue-200 group px-2'
                );
                // Thêm hình ảnh avatar
                var avatar = $('<img>').addClass(
                    'w-10 h-10 p-1 rounded-full ring-2 ring-green-300 mr-2').attr('src',
                        notification.data.follower_avatar);
                button.append(avatar);

                // Thêm thông báo với tên người theo dõi và dòng chữ "started following you"
                var notificationText = $('<span>').html(
                    `<strong>${notification.data.follower_name}</strong> started following you`);
                button.append(notificationText);

                listItem.append(button);
                notificationList.append(listItem);
            });
        } else {
            // Nếu không có thông báo, thêm một phần tử span để hiển thị thông báo "No notifications"
            notificationList.append(
                '<li id="notification-li"><button class="flex items-center w-full justify-between  text-gray-500 dark:text-black hover:text-blue-600 dark:hover:bg-blue-200 group px-2"><span class="w-full py-2 ">No notifications</span></button></li>'
            );
        }
    }
});