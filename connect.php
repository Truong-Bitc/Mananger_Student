<?php
// Thông tin kết nối
$server = "127.0.0.1:3307";
$username = "root";
$password = "";
$database = "qlsv2";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
//echo "Kết nối thành công";
?>
