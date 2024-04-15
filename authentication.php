<?php
session_start();

// Kết nối đến cơ sở dữ liệu
include 'connect.php';

// Lấy thông tin đăng nhập từ biểu mẫu
$username = $_POST['username'];
$password = $_POST['password'];

// Truy vấn để kiểm tra thông tin đăng nhập
$sql = "SELECT * FROM Users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Người dùng đã đăng nhập thành công
    $row = $result->fetch_assoc();
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['role'] = $row['role'];
    
    // Điều hướng người dùng đến trang chính phù hợp với vai trò của họ
    if ($row['role'] == 'admin') {
        header("Location: manager_admin.html");
    } elseif ($row['role'] == 'teacher') {
        header("Location: manager_teacher.html");
    } elseif ($row['role'] == 'student') {
        header("Location: manager_student.html");
    } else {
        echo "Invalid role";
    }
} else {
    // Đăng nhập không thành công
    echo "Invalid username or password";
}

// Đóng kết nối đến cơ sở dữ liệu
$conn->close();
?>
