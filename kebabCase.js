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

const timeElemet =document.querySelectorAll('.time');
timeElemet.forEach(element => {
    const time =element.getAttribute('data-timeago');
    const timeTxt =timeAgo(time);
    element.textContent = timeTxt;
})

// bật tắt thẻ nhỏ tác vụ trong  bài viết
$(document).ready(function() {
    $('#open-setting').click(function() {
        $('.papillae').toggleClass('hidden scale-100 opacity-100 right-[35px] ');
        $('#open-setting').toggleClass('rotate-90  ');
    });
});