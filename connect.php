<?php 
$host = 'localhost';
$user = 'root';
$pass = '';
$namedata = 'online_diary';
 $conn = mysqli_connect($host, $user, $pass, $namedata);
 if (!$conn){
    die("Error connecting to " . mysqli_connect_error());
 }
 mysqli_set_charset($conn, 'UTF8');
?>