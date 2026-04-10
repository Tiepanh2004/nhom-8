<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật khóa học</title>
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
        <h1 style="text-align: center;">Cập nhật khóa học</h1>
        <p style="text-align: center; font-style: italic">
            Bạn đang cập nhật khóa học số <?php echo $id; ?>
        </p>
        <form action="index.php?page_layout=capnhatkhoahoc&id=<?php echo $id ?>" method="post">
            <div class="box1">
                <div>
                    <p>Tên khóa học</p>
                    <input name="tenkhoahoc" type="text">
                </div>
                <div>
                    <p>Nội dung</p>
                    <input name="noidung" type="text">
                </div>
            </div>
            <div class="box1">
                <div>
                    <p>Mô tả</p>
                    <textarea name="mota"> Viết mô tả vào đây </textarea>
                </div>
                <div>
                    <p>Giảng viên</p>
                    <select name="giangvien">
                        <option value="">-- Chọn giảng viên --</option>
                        <?php
                        $sqlGV = "SELECT * FROM nguoi_dung WHERE vaitro_id = 2";
                        $resultGV = mysqli_query($conn, $sqlGV);
                        while ($rowGV = mysqli_fetch_array($resultGV)) {
                            echo "<option value='{$rowGV['id']}'>{$rowGV['ho_ten']}</option>";
                        }
                        ?>
                    </select>
                </div>

            </div>
            <div class="box2">
                <input type="submit" value="Cap nhat">
            </div>
        </form>
        <?php
        include('../connect.php');

        if (
            !empty($_POST['tenkhoahoc']) &&
            !empty($_POST['noidung']) &&
            !empty($_POST['mota']) &&
            !empty($_POST['giangvien'])
        ) {
            $tenKhoaHoc = $_POST['tenkhoahoc'];
            $noiDung = $_POST['noidung'];
            $moTa = $_POST['mota'];
            $giangVien = $_POST['giangvien'];


            $sql = "UPDATE `khoa_hoc` SET `ten_khoa_hoc`='$tenKhoaHoc',`noi_dung`='$noiDung',`mo_ta`='$moTa',`giangvien_id`='$giangVien' WHERE `id` = $id";
            // echo $sql;
            mysqli_query($conn, $sql);
            header('location: index.php?page_layout=khoahoc');
        } else {
            // echo "Vui long nhap day du thong tin";
        }
        ?>

    </main>
</body>

</html>