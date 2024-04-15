<?php
require_once 'connect.php';

// Kiểm tra xem có dữ liệu được gửi từ form hay không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $student_id = $_POST['student_id'];
    $student_name = $_POST['student_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $class_id = $_POST['class_id'];

    // Chuẩn bị truy vấn SQL
    $sql = "INSERT INTO Students (student_id, student_name, date_of_birth, class_id) VALUES ('$student_id', '$student_name', '$date_of_birth', '$class_id')";

    // Thực thi truy vấn và kiểm tra kết quả
    if ($conn->query($sql) === TRUE) {
        // Nếu thêm sinh viên thành công, chuyển hướng đến trang thêm sinh viên với thông báo thành công
        header("Location: admin_form_student.php?success=true");
        exit();
    } else {
        // Nếu có lỗi xảy ra, hiển thị thông báo lỗi
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
}
?>
