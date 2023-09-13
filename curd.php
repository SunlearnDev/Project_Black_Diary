<?php

include 'connect.php'; 



// if(isset($_POST['id_edit'])){
//     $idEdit = $_POST['id_edit'];
//     $mysql = "UPDATE  diagry WHERE id = '$idEdit'";
//     $result = mysqli_query($conn,$mysql);
//     if($result){
//         echo  "<script>
//         alert('Không tìm thấy dữ liệu để xóa');
//         </script>
//         ";
//     }
// }
// hàm xóa
if (isset($_POST['deleter'])) {
    // Kết nối đến cơ sở dữ liệu (hãy đảm bảo bạn đã thiết lập biến $conn trước đó)
    
    // Lấy giá trị id_delet từ biểu mẫu
    $del = $_POST['id_delet'];
    
    // Sử dụng truy vấn chuẩn bị để tránh tấn công SQL Injection
    $mysql = "DELETE FROM diary WHERE id = ?";
    
    // Chuẩn bị truy vấn
    $stmt = mysqli_prepare($conn, $mysql);
    
    if ($stmt) {
        // Bắt đầu sử dụng truy vấn chuẩn bị
        
        // Gán giá trị cho tham số truy vấn
        mysqli_stmt_bind_param($stmt, "i", $del);
        
        // Thực hiện truy vấn
        $result = mysqli_stmt_execute($stmt);
        
        if ($result) {
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                echo "
                <script>
                alert('Xóa dữ liệu thành công');
                window.location.href = 'index.php';
                </script>
                ";
            } else {
                echo "
                <script>
                alert('Không tìm thấy dữ liệu để xóa');
                </script>
                ";
            }
        } else {
            echo "
            <script>
            alert('Xóa dữ liệu không thành công');
            </script>
            ";
        }
        
        // Đóng truy vấn chuẩn bị
        mysqli_stmt_close($stmt);
    } else {
        echo "
        <script>
        alert('Lỗi trong quá trình chuẩn bị truy vấn');
        </script>";
    }}


mysqli_close($conn);


?>