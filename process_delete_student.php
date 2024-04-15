<?php
require_once 'connect.php';

// Kiểm tra xem có tham số id được truyền từ URL không
if(isset($_GET['id'])) {
    // Lấy id của sinh viên cần xóa
    $student_id = $_GET['id'];

    // Thực hiện xóa sinh viên từ cơ sở dữ liệu
    $sql = "DELETE FROM Students WHERE student_id = $student_id";

    if ($conn->query($sql) === TRUE) {
        // Nếu xóa thành công, chuyển hướng lại đến trang danh sách sinh viên với thông báo xóa thành công
        header("Location: admin_form_student.php?delete_success=true");
        exit();
    } else {
        // Nếu không thể xóa do ràng buộc khóa ngoại, hiển thị thông báo tương ứng
        if ($conn->errno == 1451) {
            echo "<script>alert('Không thể xóa sinh viên do có dữ liệu liên quan trong hệ thống');</script>";
            echo "<script>window.location.href='admin_form_student.php.php';</script>";
            exit();
        } else {
            // Hiển thị thông báo lỗi của cơ sở dữ liệu
            echo "Error deleting record: " . $conn->error;
        }
    }

    // Đóng kết nối
    $conn->close();
} else {
    // Nếu không có tham số id được truyền, hiển thị thông báo lỗi
    echo "Invalid request";
}
?>
