<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="container">
        <?php
        require('connect.php');
        session_start();
        // Khi biểu mẫu được gửi đi, kiểm tra và tạo phiên người dùng.
        if (isset($_POST['email'])) {
            $email = stripslashes($_REQUEST['email']);
            $email = mysqli_real_escape_string($conn, $email);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($conn, $password);
            // Kiểm tra xem người dùng có tồn tại trong cơ sở dữ liệu hay không.
            $query = "SELECT * FROM `user` WHERE email='$email'
                     AND password='" . $password . "'";

            $result = mysqli_query($conn, $query);
            if (!$result) {
                die(mysqli_error($conn));
            }

            $rows = mysqli_num_rows($result);
            if ($rows == 1) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['user'] = [];
                $_SESSION['user']['id'] = $row['id'];
                $_SESSION['user']['email'] = $row['email'];
                header("Location: index.php");
                exit();
            } else {
                echo "<div class='form'>
                  <h3>Tên người dùng hoặc mật khẩu không chính xác.</h3><br/>
                  <p class='link'>Nhấn để <a href='login.php'>Đăng Nhập</a> lại.</p>
                  </div>";
            }
        } else {
            ?>
            <form class="form" method="post" name="login">
                <h1 class="login-title">Đăng Nhập</h1>
                <input type="text" class="login-input" name="email" placeholder="Username" autofocus="true" />
                <input type="password" class="login-input" name="password" placeholder="Password" />
                <input type="submit" value="Đăng Nhập" name="submit" class="login-button" />
                <p class="link"><a href="registration.php">Đăng Ký</a></p>
            </form>
            <?php
        }
        ?>
    </div>
</body>

</html>