<?php
$servername = "127.0.0.1";
$username = "root"; 
$password = "";
$dbname = "online_store"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}
?>

