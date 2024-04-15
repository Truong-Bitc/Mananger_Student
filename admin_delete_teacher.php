<?php
require_once 'connect.php';

if(isset($_GET['id'])) {
    $teacher_id = $_GET['id'];
    
    // Truy vấn để lấy thông tin của giáo viên
    $sql = "SELECT * FROM Teachers WHERE teacher_id = $teacher_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Xóa giáo viên từ cơ sở dữ liệu
        $delete_sql = "DELETE FROM Teachers WHERE teacher_id = $teacher_id";
        if ($conn->query($delete_sql) === TRUE) {
            echo "Delete Success!";
        } else {
            echo "Erro while delete teacher: " . $conn->error;
        }
    } else {
        echo "Not found teacher!";
    }
} else {
    echo "Không có ID của giáo viên được cung cấp.";
}

$conn->close();
?>
