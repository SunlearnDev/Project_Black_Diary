<?php
    session_start();
    // Phiên huỷ
    if(session_destroy()) {
        // Đang chuyển hướng đến trang chủ
        header("Location: index.php");
    }
?>