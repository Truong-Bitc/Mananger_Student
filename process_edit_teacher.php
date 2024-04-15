<?php
require_once 'connect.php';

if(isset($_POST['teacher_id']) && isset($_POST['teacher_name']) && isset($_POST['date_of_birth'])) {
    $teacher_id = $_POST['teacher_id'];
    $teacher_name = $_POST['teacher_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $address = isset($_POST['address']) ? $_POST['address'] : "";
    $phone = isset($_POST['phone']) ? $_POST['phone'] : "";

    // Cập nhật thông tin của giáo viên trong cơ sở dữ liệu
    $sql = "UPDATE Teachers SET teacher_name='$teacher_name', date_of_birth='$date_of_birth', address='$address', phone='$phone' WHERE teacher_id=$teacher_id";

    if ($conn->query($sql) === TRUE) {
        echo "Cập nhật thông tin giáo viên thành công!";
    } else {
        echo "Lỗi khi cập nhật thông tin giáo viên: " . $conn->error;
    }
} else {
    echo "Dữ liệu không hợp lệ!";
}

$conn->close();
?>
