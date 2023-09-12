<?php
// Bắt đầu phiên làm việc với session
session_start();

// Kết nối đến cơ sở dữ liệu, bạn cần đảm bảo rằng file connect.php đã được tạo và chứa thông tin kết nối
include 'connect.php';

if (isset($_POST['submit'])) {
  // Lấy giá trị từ biểu mẫu
  $email = $_POST['email'];
  $pass = $_POST['pass'];

  // Sử dụng prepared statement để tránh SQL Injection
  $sql = "SELECT * FROM user WHERE email = '$email'";
  $stmt = mysqli_query($conn, $sql);

  // Kiểm tra xem truy vấn có thành công hay không
  if ($stmt) {
    $row = mysqli_fetch_assoc($stmt);

    if ($row) {
      // Kiểm tra mật khẩu
      if ($pass === $row['password']) {
         // Gán thông tin người dùng vào biến session
         $_SESSION['user'] = [
                    'id' => $row['id'],
                    'email' => $row['email'],
                ];  
        header("Location: index.php");
        exit();
      } else {
        // Mật khẩu sai
        echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu');</script>";
      }
    } else {
      // Không tìm thấy tài khoản
      echo "<script>alert('Tài khoản không tồn tại');</script>";
    }

    // Đóng truy vấn
    mysqli_free_result($stmt);
    mysqli_close($conn);
  } else {
    // Lỗi trong quá trình thực hiện truy vấn
    echo "<script>alert('Lỗi trong quá trình đăng nhập');</script>";
  }
}
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="form-css.css">
</head>

<body>
  <div class="wrapper">
    <form method="POST">
      <h2>Login</h2>
      <div class="input-field">
        <input type="text" name="email" id="email" required>
        <label>Email</label>
      </div>
      <div class="input-field">
        <input type="password" name="pass" id="pass" required>
        <label>Password</label>
      </div>
      <div class="forget">
        <label for="remember">
          <input type="checkbox" id="remember">
          <p>Remember me</p>
        </label>
        <a href="#">Forgot password?</a>
      </div>
      <button type="submit" name='submit'>Log In</button>
      <div class="register">
        <p>Don't have an account? <a href="signlog.php">Register</a></p>
      </div>
    </form>
  </div>
</body>
