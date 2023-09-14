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
$userID = $_SESSION['user']['user_id'];
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
        $response = ['error' => 2];
        echo json_encode($response);
        exit();
    }
}

$sql = "INSERT comment(image, content, createdAt, updatedAt, userID, diaryID)
        VALUES('$target_file', '$content', now(), now(), $userID, $diaryID)";
$result = mysqli_query($conn, $sql);
if ($result) {
    $sql = "SELECT comment.id, image, content, comment.createdAt, userID, img, userName 
            FROM comment JOIN user ON comment.userID = user.user_id WHERE diaryID = $diaryID ORDER BY comment.id DESC";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $data = [];
        $data[] = mysqli_num_rows($result);
        $data[] = mysqli_fetch_assoc($result);
        $jsonString = json_encode($data);
        echo $jsonString;
    } else {
        $response = ['error' => 3];
        echo json_encode($response);
    }
} else {
    $response = ['error' => 4];
    echo json_encode($response);
}
mysqli_close($conn);
?>