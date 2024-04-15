<?php
require_once 'connect.php';

if(isset($_GET['id'])) {
    $teacher_id = $_GET['id'];

    // Truy vấn để lấy thông tin của giáo viên dựa trên id
    $sql = "SELECT * FROM Teachers WHERE teacher_id = $teacher_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Lấy dữ liệu của giáo viên từ kết quả truy vấn
        $row = $result->fetch_assoc();
        $teacher_name = $row['teacher_name'];
        $date_of_birth = $row['date_of_birth'];
        $address = $row['address'];
        $phone = $row['phone'];
    } else {
        echo "Not found teacher!";
    }
} else {
    echo "Không có ID của giáo viên được cung cấp.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Teacher</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
      
    .contact{
        width: 1107px;
        margin-right: 213px;
        height: 225px;
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
        <div class="pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Welcome Admin</h1>
            <p class="ngonngu"><i class="fa-solid fa-earth-americas"></i>  Vietnamese(vi)
            </p>
        </div>
        <h2>Edit Teacher</h2>
        <form id="editForm" action="process_edit_teacher.php" method="POST">
            <input type="hidden" name="teacher_id" value="<?php echo $teacher_id; ?>">
            <div class="form-group">
                <label for="teacher_name">Name Teacher:</label>
                <input type="text" class="form-control" id="teacher_name" name="teacher_name" value="<?php echo $teacher_name; ?>" required>
            </div>
            <div class="form-group">
                <label for="date_of_birth">Birth of date:</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?php echo $date_of_birth; ?>" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>">
            </div>
            <div class="form-group">
                <label for="phone">Phone number:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="admin_form_teacher.php" class="btn btn-secondary">Back</a>
        </form>
    </div>

    <footer>
            <div class="contact">
                <div class="info">
                    <h4>Hà Nội</h4>
                    <p>Tầng 2, Tòa nhà Detech II, 107 Nguyễn Phong Sắc, Cầu Giấy, Hà Nội</p>
                    <p>Điện thoại: 0981 090 513</p>
                    <p>Email: btec.hn@fpt.edu.vn</p>
                    <p>Hotline: 0981 090 513</p>
                </div>
                <div class="info">
                    <h4>Đà Nẵng</h4>
                    <p>66B Võ Văn Tần, Quận Thanh Khê, TP.Đà Nẵng (Tòa nhà Savico Building)</p>
                    <p>Điện thoại: 0236 730 9268</p>
                    <p>Email: btec.dn@fpt.edu.vn</p>
                    <p>Hotline: 0905 888 535</p>
                </div>
                <div class="info">
                    <h4>TP. Hồ Chí Minh</h4>
                    <p>275 Nguyễn Văn Đậu - Quận Bình Thạnh - TP.Hồ Chí Minh</p>
                    <p>Điện thoại: 028 7300 9268</p>
                    <p>Email:btec.hcm@fpt.edu.vn</p>
                    <p>Hotline: 0942 25 68 25</p>
                </div>
                <div class="info">
                    <h4>Cần Thơ</h4>
                    <p>41 Cách Mạng Tháng 8, Quận Ninh Kiều, TP. Cần Thơ.</p>
                    <p>Điện thoại: 0354 583 916</p>
                    <p>Email: btec.hn@fpt.edu.vn</p>
                    <p>Hotline: 091 888 54 35</p>
                </div>
            </div>
        </div>
    </footer>
    <script>
        <?php
        // Kiểm tra xem có thông báo từ session không
        if(isset($_SESSION['edit_success'])) {
            echo 'alert("'.$_SESSION['edit_success'].'");';
            unset($_SESSION['edit_success']); // Xóa thông báo từ session
        }
        ?>
    </script>
    
</body>
</html>
