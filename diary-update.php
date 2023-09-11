<?php
session_start();
require_once('connect.php');

if (empty($_SESSION['user'])) {
    $response = ['error' => 0];
    echo json_encode($response);
    exit();
}

if (empty($_GET['diaryID'])) {
    $response = ['error' => 1];
    echo json_encode($response);
    exit();
}

$diaryID = $_GET['diaryID'];
$status = $_POST['status'];
$target_file = '';
$content = $_POST['content'];

if (!empty($_FILES["image"]["tmp_name"])) {
    $sql = "SELECT image FROM diary WHERE id = $diaryID";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        unlink($row['image']);
    } else {
        $response = ['error' => 2];
        echo json_encode($response);
        exit();
    }

    $image = basename($_FILES["image"]["name"]);
    $target_file = "img/" . $image;

    //Upload image
    if (file_exists($target_file)) {
        $target_file = "img/" . uniqid() . $image;
    }
    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $response = ['error' => 3];
        echo json_encode($response);
        exit();
    }
}

if (empty($target_file)) {
    $sql = "UPDATE diary SET content = '$content', status = '$status', updatedAt = now() WHERE id = $diaryID";
} else {
    $sql = "UPDATE diary SET image = '$target_file', content = '$content', status = '$status', updatedAt = now() WHERE id = $diaryID";
}
$result = mysqli_query($conn, $sql);
if ($result) {
    $response = ['success' => 1];
    echo json_encode($response);
    exit();
} else {
    $response = ['error' => 4];
    echo json_encode($response);
    exit();
}
?>