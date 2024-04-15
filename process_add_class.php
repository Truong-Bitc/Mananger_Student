<?php
// Kiểm tra xem người dùng đã gửi dữ liệu POST từ form thêm lớp học chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Bao gồm file connect.php để kết nối đến cơ sở dữ liệu
    require_once 'connect.php';

    // Lấy dữ liệu được gửi từ form
    $class_id = $_POST['class_id'];
    $class_name = $_POST['class_name'];
    $teacher_id = $_POST['teacher_id'];

    // Chuẩn bị câu lệnh SQL để chèn dữ liệu vào bảng Classes
    $sql = "INSERT INTO Classes (class_id, class_name, teacher_id) VALUES ('$class_id', '$class_name', '$teacher_id')";

    // Thực thi câu lệnh SQL
    if ($conn->query($sql) === TRUE) {
        // Nếu chèn dữ liệu thành công, chuyển hướng người dùng đến trang danh sách lớp học
        header("Location: form_class.php?success=true");
        exit();
    } else {
        // Nếu có lỗi xảy ra trong quá trình chèn dữ liệu, hiển thị thông báo lỗi
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
}
?>
