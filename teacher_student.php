<?php
require_once 'connect.php';

// Truy vấn dữ liệu từ bảng Sinh viên
$sql = "SELECT * FROM Students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Student</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
.contact{
    width: 1107px;
    height: 220px;
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body>
    <div class="container">
        <div class="pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Welcome Admin</h1>
            <p class="ngonngu"><i class="fa-solid fa-earth-americas"></i>  Vietnamese(vi)
            </p>
        </div>
        <h2>List Student</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name Student</th>
                    <th>Date of birth</th>
                    <th>Class</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['student_id']."</td>";
                        echo "<td>".$row['student_name']."</td>";
                        echo "<td>".$row['date_of_birth']."</td>";
                        echo "<td>".$row['class_id']."</td>";
                       
                    }
                } else {
                    echo "<tr><td colspan='5'>Không có dữ liệu</td></tr>";
                }
                ?>
            </tbody>
        </table>
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
    </div>

    
</body>
</html>