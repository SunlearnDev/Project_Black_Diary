<?php
session_start();
include 'connect.php';

function registerUser($email, $password, $name)
{
    global $conn;

    // Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu chưa
    $checkEmailQuery = "SELECT * FROM user WHERE email = '$email'";
    $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

    if (!$checkEmailResult) {
        // Xử lý lỗi truy vấn
        return "Lỗi trong quá trình kiểm tra email.";
    }

    if (mysqli_num_rows($checkEmailResult) > 0) {
        // Email đã tồn tại
        return "Email đã được sử dụng.";
    }

    // Thêm người dùng mới vào cơ sở dữ liệu (Không bảo mật mật khẩu)
    $insertUserQuery = "INSERT INTO user (email, password,userName,createdAt) VALUES ('$email', '$password','$name',now())";
    $insertUserResult = mysqli_query($conn, $insertUserQuery);

    if (!$insertUserResult) {
        // Xử lý lỗi truy vấn
        return "Lỗi trong quá trình đăng ký.";
    }

    // Đăng ký thành công
    return "Đăng ký thành công.";
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $cpassword = $_POST['cpass'];
    $name = $_POST['name'];
    if ($cpassword === $password) {
        // Gọi hàm đăng ký
        $registrationResult = registerUser($email, $password,$name);
    } else {
        echo "mật khẩu không đúng" . $cpassword;
    }

    // Xử lý kết quả đăng ký
    if ($registrationResult === "Đăng ký thành công.") {
        // Đăng ký thành công, chuyển hướng hoặc thực hiện các hành động khác ở đây
        header("Location: form-login.php");
        exit();
    } else {
        // Đăng ký không thành công, hiển thị thông báo lỗi
        echo "<script>alert('$registrationResult');</script>";
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
                <input type="email" name="email" id="email" required>
                <label>Email</label>
            </div>
            <div class="input-field">
                <input type="text" name="name" id="name" required>
                <label>User Name</label>
            </div>
            <div class="input-field">
                <input type="password" name="pass" id="pass" required>
                <label>Password</label>
            </div>
            <div class="input-field">
                <input type="password" name="cpass" id="cpass" required>
                <label>Create Password</label>
            </div>
            <div class="forget">
                <label for="remember">
                    <input type="checkbox" id="remember">
                    <p>I'm not a robot</p>
                </label>
            </div>
            <button type="submit" name='submit'>Log In</button>
            <div class="register">
                <p>I already have an account <a href="form-login.php">Login Now</a></p>
            </div>
        </form>
    </div>
</body>