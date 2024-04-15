<?php 
require_once 'connect.php';

// Kiểm tra xem dữ liệu được gửi từ form chưa
if(isset($_POST['teacher_name']) && isset($_POST['date_of_birth'])) {
    // Lấy dữ liệu từ form
    $teacher_name = $_POST['teacher_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $address = isset($_POST['address']) ? $_POST['address'] : "";
    $phone = isset($_POST['phone']) ? $_POST['phone'] : "";

    // Thêm giáo viên vào cơ sở dữ liệu
    $sql = "INSERT INTO Teachers (teacher_name, date_of_birth, address, phone) VALUES ('$teacher_name', '$date_of_birth', '$address', '$phone')";
    if ($conn->query($sql) === TRUE) {
        header('Location: admin_add_teacher.php?success=true'); // Chuyển hướng người dùng trở lại trang add_teacher.php với thông báo thành công
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>
