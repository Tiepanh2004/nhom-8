<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm giảng viên</title>
    <style>
    main {
        /* width: 50%; */
        margin: auto;
        background: #f1f0f0ff;
        padding: 40px 30px;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
        margin-top: 50px;
        border: 2px solid #29a2cfff;
    }

    .box1 {
        display: flex;
        justify-content: space-between;
    }

    .box1 input {
        border-radius: 5px;
        border: 1px solid black;
    }

    .box1 select {
        width: 175px;
        border-radius: 5px;
    }

    .box2 input {
        margin-top: 25px;
        width: 100%;
        background-color: white;
        border-radius: 5px;
        border: 1px solid black;
    }

    .thongbao {
        text-align: center;
    }
    </style>
</head>

<body>
    <main>
        <h1 style="text-align: center;">Thêm giảng viên</h1>
        <form action="index.php?page_layout=themgiangvien" method="post">
            <div class="box1">
                <div>
                    <p>Ho ten</p>
                    <input name="hoten" type="text">
                </div>
                <div>
                    <p>Ngay thang nam sinh</p>
                    <input style="width: 175px" name="namsinh" type="date">
                </div>
            </div>
            <div class="box1">
                <div>
                    <p>So dien thoai</p>
                    <input name="sdt" type="text">
                </div>
                <div>
                    <p>Email</p>
                    <input name="email" type="text">
                </div>
            </div>
            <div class="box1">
                <div>
                    <p>Mat khau</p>
                    <input name="matkhau" type="password">
                </div>
                <div>
                    <p>Ten dang nhap</p>
                    <input name="tendangnhap" type="text">
                </div>
            </div>
            <div class="box2">
                <input type="submit" value="Them">
            </div>
        </form>
        <?php
        include('../connect.php');
        if (
            !empty($_POST['hoten']) &&
            !empty($_POST['namsinh']) &&
            !empty($_POST['sdt']) &&
            !empty($_POST['email']) &&
            !empty($_POST['matkhau']) &&
            !empty($_POST['tendangnhap'])
        ) {
            $hoTen = $_POST['hoten'];
            $namSinh = $_POST['namsinh'];
            $sdt = $_POST['sdt'];
            $email = $_POST['email'];
            $matKhau = $_POST['matkhau'];
            $tenDangNhap = $_POST['tendangnhap'];

            $sql = "INSERT INTO `nguoi_dung` (`ho_ten`, `nam_sinh`, `sdt`, `email`, `mat_khau`, `vaitro_id`, `ten_dang_nhap`) 
                    VALUES ('$hoTen','$namSinh','$sdt','$email','$matKhau', 2, '$tenDangNhap')";
            // echo $sql;
            mysqli_query($conn, $sql);
            header('location: index.php?page_layout=giangvien');
        } else {
            echo " <p class='thongbao'>Vui lòng nhập đủ thông tin</p> ";
        }
        ?>
    </main>
</body>

</html>