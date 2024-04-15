<?php
// Kết nối đến cơ sở dữ liệu
require_once 'connect.php';

// Kiểm tra xem class_id có được gửi từ phía client không
if (isset($_GET['class_id'])) {
    $class_id = $_GET['class_id'];

    // Truy vấn để lấy danh sách sinh viên trong lớp học đã chọn
    $sql = "SELECT s.student_id, s.student_name, c.class_name 
            FROM Students s
            INNER JOIN Classes c ON s.class_id = c.class_id
            WHERE s.class_id = $class_id";
    $result = $conn->query($sql);

    // Xây dựng HTML cho bảng danh sách sinh viên
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['student_id']."</td>";
            echo "<td>".$row['student_name']."</td>";
            echo "<td>".$row['class_name']."</td>";
            echo "<td>
                    <input type='radio' name='attendance[".$row['student_id']."]' value='present' required> Có
                    <input type='radio' name='attendance[".$row['student_id']."]' value='absent'> Vắng
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Không có sinh viên trong lớp này</td></tr>";
    }
}
?>
