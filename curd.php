<?php

include 'connect.php'; 




foreach ($funnyUsernames as $userId => $userInfo) {
    $userName = $userInfo['userName'];
    $aboutMe = $userInfo['aboutMe'];
    
    $mysqlUpdate = "UPDATE user SET userName = '$userName' WHERE id = '$userId' ";
    
    if (!mysqli_query($conn, $mysqlUpdate)) {
        echo "$mysqlUpdate";
        die('error');
    }
}
mysqli_close($conn);