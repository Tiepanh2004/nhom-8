<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật học viên</title>
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
    </style>
</head>

<body>
    <?php
    $id = $_GET['id'];
    ?>
    <main>
        <h1 style="text-align: center;">Cập nhật học viên</h1>
        <p style="text-align: center; font-style: italic">
            Bạn đang cập nhật học viên số <?php echo $id; ?>
        </p>
        <form action="index.php?page_layout=capnhathocvien&id=<?php echo $id ?>" method="post">
            <div class="box1">
                <div>
                    <p>Tên học viên</p>
                    <input name="tenhocvien" type="text">
                </div>
                <div>
                    <p>Năm sinh</p>
                    <input style="width: 175px" name="namsinh" type="date">
                </div>
            </div>
            <div class="box1">
                <div>
                    <p>Số điện thoại</p>
                    <input name="sodienthoai" type="text">
                </div>
                <div>
                    <p>Email</p>
                    <input name="email" type="text">
                </div>
            </div>
            <div class="box1">
                <div>
                    <p>Mật khẩu</p>
                    <input name="matkhau" type="password">
                </div>
                <div>
                    <p>Tên đăng nhập</p>
                    <input name="tendangnhap" type="text">
                </div>
            </div>
            <div class="box2">
                <input type="submit" value="Cap nhat">
            </div>
        </form>
        <?php
        include('../connect.php');

        if (
            !empty($_POST['tenhocvien']) &&
            !empty($_POST['namsinh']) &&
            !empty($_POST['sodienthoai']) &&
            !empty($_POST['email']) &&
            !empty($_POST['matkhau']) &&
            !empty($_POST['tendangnhap'])
        ) {
            $tenHocVien = $_POST['tenhocvien'];
            $namSinh = $_POST['namsinh'];
            $soDienThoai = $_POST['sodienthoai'];
            $email = $_POST['email'];
            $matKhau = $_POST['matkhau'];
            $tenDangNhap = $_POST['tendangnhap'];


            $sql = "UPDATE `nguoi_dung` 
            SET `ho_ten`='$tenHocVien',`nam_sinh`='$namSinh',`sdt`='$soDienThoai',`email`='$email',`mat_khau`='$matKhau',`vaitro_id`= 3,`ten_dang_nhap`='$tenDangNhap' WHERE `id` = $id";
            // echo $sql;
            mysqli_query($conn, $sql);
            header('location: index.php?page_layout=hocvien');
        } else {
            // echo "Vui long nhap day du thong tin";
        }
        ?>

    </main>
</body>

</html>