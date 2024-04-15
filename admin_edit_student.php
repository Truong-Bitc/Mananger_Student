<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
   
    .contact{
        width: 1107px;
        margin-right: 213px;
        height: 225px;
        margin-top: 50px;
        background-color: #f6702e;
        display: flex;
        float: right;
    }
    .info{
    margin-right: 10px;
    ;
    }
    .info p{
        color: aliceblue;
        font-size: 15px;
        font-family: 'Times New Roman', Times, serif;
    }
    .info h4{
        color: aliceblue;
        font-family: 'Times New Roman', Times, serif;
    }
    .contact > .info{
        padding-left: 40px;
        padding-top: 20px;
    }

    .pt-3 {
        background-color: #f6702e;
        position: relative;
    }
    .h2{
        margin-left: 20px;
        color: #FFF;
        font-family: 'Times New Roman', Times, serif;
    }
    .ngonngu{
        float: right;
        position: absolute;
        top: 27px;
        right: 150px;
        font-size: 15px;
        color: #FFF;
        font-weight: 400;
    }
    .ngonngu:hover+.boxhover{
    display: block;
    }
    .boxhover{
        width: 150px;
        height: 150px;
        background-color: aqua;
        position: absolute;
        top: 50px;
        right: 120px;
        display: none;
    }
    .pt-3{
        position: relative;
    }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Student</h2>
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
            $sql = "UPDATE Students SET student_name='$student_name', date_of_birth='$date_of_birth', class_id='$class_id' WHERE student_id='$student_id'";

            // Thực thi truy vấn và kiểm tra kết quả
            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success'>Thông tin sinh viên đã được cập nhật thành công.</div>";
            } else {
                echo "<div class='alert alert-danger'>Lỗi: " . $sql . "<br>" . $conn->error . "</div>";
            }
        }

        // Lấy thông tin sinh viên từ cơ sở dữ liệu
        if(isset($_GET['id'])) {
            $student_id = $_GET['id'];
            $sql = "SELECT * FROM Students WHERE student_id = $student_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $student_name = $row['student_name'];
                $date_of_birth = $row['date_of_birth'];
                $class_id = $row['class_id'];
            } else {
                echo "<div class='alert alert-danger'>Không tìm thấy sinh viên.</div>";
            }
        }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
            <div class="form-group">
                <label for="student_name">Name student:</label>
                <input type="text" class="form-control" id="student_name" name="student_name" value="<?php echo $student_name; ?>" required>
            </div>
            <div class="form-group">
                <label for="date_of_birth">Birth of date:</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?php echo $date_of_birth; ?>" required>
            </div>
            <div class="form-group">
                <label for="class_id">Class:</label>
                <select class="form-control" id="class_id" name="class_id" required>
                    <?php
                    // Truy vấn danh sách các lớp học
                    $sql = "SELECT * FROM Classes";
                    $result = $conn->query($sql);

                    // Hiển thị các lớp học trong dropdown list
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            if ($row['class_id'] == $class_id) {
                                echo "<option value='".$row['class_id']."' selected>".$row['class_name']."</option>";
                            } else {
                                echo "<option value='".$row['class_id']."'>".$row['class_name']."</option>";
                            }
                        }
                    } else {
                        echo "<option value=''>Không có lớp học</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="admin_form_student.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>
