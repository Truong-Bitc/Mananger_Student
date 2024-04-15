<?php
// Kết nối đến cơ sở dữ liệu
require_once 'connect.php';

// Kiểm tra xem có tham số id được truyền từ URL không
if(isset($_GET['id'])) {
    // Lấy id của lớp học từ URL
    $class_id = $_GET['id'];

    // Câu truy vấn SQL để xóa lớp học với id tương ứng
    $sql = "DELETE FROM Classes WHERE class_id = $class_id";

    // Thực thi truy vấn xóa
    if ($conn->query($sql) === TRUE) {
        // Nếu xóa thành công, chuyển hướng người dùng về trang danh sách lớp học
        header("Location: form_class.php?delete_success=true");
        exit();
    } else {
        // Nếu xóa thất bại, thông báo lỗi
        echo "Lỗi: " . $conn->error;
    }
} else {
    // Nếu không có id được truyền, thông báo lỗi
    echo "Không có ID lớp học được cung cấp.";
}

// Đóng kết nối đến cơ sở dữ liệu
$conn->close();
?>
