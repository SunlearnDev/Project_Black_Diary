<?php
session_start();
include 'connect.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="main.css">
    <title>Black Diary</title>
</head>

<body class="dark:bg-neutral-900">
    <?php
    $useArr = array();
    if (isset($_SESSION['user'])) {
        $userEmail = $_SESSION['user']['email'];
        $userName = "SELECT * FROM user WHERE email = '$userEmail'";
        $userResult = mysqli_query($conn, $userName);
        if ($userResult)
            $rows = mysqli_fetch_assoc($userResult);
        $useArr[] = $rows;
    } ?>
     <!-- <Header> -->
     <?php include ("header.php")?>
    <!-- </Header> -->
    <nav class="mt-20 ">
        <div class="flex flex-no-wrap ">
            <!-- left    -->
            <?php include ("nav-left.php")?>
            <!-- mobile-nav -->
            <?php include ("nav-mobile.php")?>
            <!--  -----------------------------------------------------Diary---------------------------------------------------- -->
            <?php include ("diary.php")?>
            <!--  End Diary -->
            <!-- right -->
            <div style="min-height: 716px"
                class="w-64 md:w-1/5 w-1/12 sm:relative shadow md:h-full flex-col justify-between hidden xl:block fixed top-0 right-0 h-screen bottom-0">
                <div class="fixed top-10 bg-black right-0 h-screen bottom-0 w-64  ">
                    <div class="px-8">
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- ----------- Form Edit-------------------------------- -->
    <?php include ("form-Edit.php")?>
    
    <script src="kebabCase.js"></script>
</body>
<?php mysqli_close($conn) ?>

</html>
