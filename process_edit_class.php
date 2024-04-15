<?php
require_once 'connect.php';

// Kiểm tra xem có dữ liệu được gửi từ form sửa không
if(isset($_POST['class_id'], $_POST['class_name'], $_POST['teacher_id'])) {
    $class_id = $_POST['class_id'];
    $class_name = $_POST['class_name'];
    $teacher_id = $_POST['teacher_id'];

    // Tiến hành cập nhật thông tin lớp học trong cơ sở dữ liệu
    $sql = "UPDATE Classes SET class_name = '$class_name', teacher_id = $teacher_id WHERE class_id = $class_id";
    if ($conn->query($sql) === TRUE) {
        // Nếu cập nhật thành công, chuyển hướng người dùng đến trang danh sách lớp học và truyền thông báo thành công qua URL
        header("Location: form_class.php?edit_success=true");
        exit();
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Dữ liệu không hợp lệ";
}
$conn->close();
?>
