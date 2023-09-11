<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Đăng ký</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="container">
        <?php
        require('connect.php');
        // Khi biểu mẫu được gửi đi, hãy chèn các giá trị vào cơ sở dữ liệu.
        if (isset($_REQUEST['userName'])) {
            // Loại bỏ dấu gạch chéo
            $username = stripslashes($_REQUEST['userName']);
            //Loại bỏ các ký tự chuỗi đặc biệt
            $username = mysqli_real_escape_string($conn, $username);
            $email    = stripslashes($_REQUEST['email']);
            $email    = mysqli_real_escape_string($conn, $email);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($conn, $password);
            $create_datetime = date("Y-m-d H:i:s");
            $query    = "INSERT into `user` (userName, password, email, createdAt, updatedAt)
                     VALUES ('$username', '" . $password . "', '$email', '$create_datetime', '$create_datetime')";
            $result   = mysqli_query($conn, $query);
            if ($result) {
                echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
            } else {
                echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
            }
        } else {
        ?>
        <form class="form" action="" method="post">
            <h1 class="login-title">Đăng Ký</h1>
            <input type="text" class="login-input" name="username" placeholder="Username" required />
            <input type="text" class="login-input" name="email" placeholder="Email Adress">
            <input type="password" class="login-input" name="password" placeholder="Password">
            <input type="submit" name="submit" value="Đăng Ký" class="login-button">
            <p class="link"><a href="login.php">Nhấn để Đăng Nhập</a></p>
        </form>
        <?php
        }
        ?>
    </div>
</body>

</html>