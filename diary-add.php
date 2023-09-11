<?php
require_once('connect.php');

if (empty($_GET['userID'])) {
    header("location:login.php");
    exit();
}

$userID = $_GET['userID'];
$status = $_POST['status'];
$target_file = '';
$content = $_POST['content'];

if (!empty($_FILES["image"]["tmp_name"])) {
    $image = basename($_FILES["image"]["name"]);
    $target_file = "img/" . $image;

    //Upload image
    if (file_exists($target_file)) {
        $target_file = "img/" . uniqid() . $image;
    }
    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        header("location:userpage.php?error=1");
        exit();
    }
}

$sql = "INSERT diary(image, content, createdAt, updatedAt, userID, status)
        VALUES('$target_file', '$content', now(), now(), '$userID', '$status')";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("location:userpage.php");
    exit();
} else {
    header("location:userpage.php?error=2");
    exit();
}
?>