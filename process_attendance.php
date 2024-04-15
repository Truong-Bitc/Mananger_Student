<?php
// Kết nối đến cơ sở dữ liệu
require_once 'connect.php';

// Khởi tạo biến điểm danh thành công
$attendance_success = false;

// Kiểm tra xem dữ liệu đã được gửi từ form chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy class_id và attendance_date từ form
    $class_id = $_POST['class_id'];
    $attendance_date = $_POST['attendance_date'];
    
    // Lấy danh sách sinh viên từ form và cập nhật vào bảng Attendance
    if(isset($_POST['attendance']) && is_array($_POST['attendance'])) {
        // Sử dụng prepared statement để thêm dữ liệu vào cơ sở dữ liệu
        $stmt = $conn->prepare("INSERT INTO Attendance (student_id, class_id, attendance_date, status) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiss", $student_id, $class_id, $attendance_date, $status);

        foreach ($_POST['attendance'] as $student_id => $status) {
            // Thực hiện truy vấn để chèn dữ liệu vào bảng Attendance
            if ($stmt->execute()) {
                // Đánh dấu điểm danh thành công
                $attendance_success = true;
            } else {
                echo "Lỗi khi điểm danh cho sinh viên có ID: $student_id";
            }
        }

        $stmt->close();
    } else {
        echo "Không có dữ liệu điểm danh được gửi từ form.";
    }
} else {
    echo "Dữ liệu không được gửi bằng phương thức POST.";
}

// Nếu điểm danh thành công, chuyển hướng về trang điểm danh và gửi thông báo
if ($attendance_success) {
    header("Location: teacher_form_attendance.php?success=1");
    exit();
}
?>
