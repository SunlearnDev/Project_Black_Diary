<?php
include 'connect.php';

if(isset($_POST['id']) && isset($_FILES['image']) && $_FILES['image']['error'] == 0){
    $id = $_POST['id'];
   
    $imageName = $_FILES["image"]["name"];
    
    // Đường dẫn lưu trữ ảnh trên máy chủ 
    $imagePath = './img/' .basename( $imageName);
    
    // Di chuyển tệp ảnh tải lên vào thư mục lưu trữ
    move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
    
    $update = "UPDATE user SET avatar = '$imagePath' WHERE id = $id";
    
    if ($conn->query($update) === TRUE) {
        echo "Image uploaded and updated successfully.";
    } else {
        echo "Error updating image: " ;
    }
} else {
    echo "Error uploading image.";
}

$conn->close();
?>

<form action="addphp.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="id">
    <input type="file" name="image">
    <input type="submit" value="Upload">
</form>
