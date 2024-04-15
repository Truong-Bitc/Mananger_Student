<?php require_once 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Teacher</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
  
.contact{
    width: 1300px;
    height: 220px;
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
/* .pt-3 > button { 
    float: right;
    margin-top: -46px;
    background-image: none;
    background-color: #ef5350;
    border: none;
    border-radius: 5px;
    box-shadow: 0 -2px 0 0 rgba(0,0,0,.5) inset;
    color: #FFF;.pt-3 
    text-shadow: none;
    transition: background 0.2s ease-out 0s;
    height: 30px;
    width: 80px;
    margin-right: 20px;
}*/
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
        <h2>List teacher</h2>
        <a href="admin_add_teacher.php" class="btn btn-success mb-3">Add teacher</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name teacher</th>
                    <th>Date of birth</th>
                    <th>Address</th>
                    <th>Phone number</th>
                    <th>Status</th>
                </tr>
            </thead>
            
            <tbody>
                <?php
                $sql = "SELECT * FROM Teachers";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['teacher_id']."</td>";
                        echo "<td>".$row['teacher_name']."</td>";
                        echo "<td>".$row['date_of_birth']."</td>";
                        echo "<td>".$row['address']."</td>";
                        echo "<td>".$row['phone']."</td>";
                        echo "<td>
                                <a href='admin_edit_teacher.php?id=".$row['teacher_id']."' class='btn btn-primary'>Edit</a>
                                <button class='btn btn-danger' onclick='confirmDelete(".$row['teacher_id'].")'>Delete</button>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Dont have data</td></tr>";
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
    <script>
        function confirmDelete(teacherId) {
            if (confirm("Are you want delete this teacher?")) {
                window.location.href = "admin_delete_teacher.php?id=" + teacherId;
            }
        }
    </script>

      
  
</body>
</html>
