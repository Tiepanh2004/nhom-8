<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật bài học</title>
    <style>
    .form {
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
    <div class="form">
        <h1 style="text-align: center;">Cập nhật bài học</h1>
        <p style="text-align: center; font-style: italic">
            Bạn đang cập nhật bài học số <?php echo $id; ?>
        </p>
        <form action="index.php?page_layout=capnhatbaihoc&id=<?php echo $id ?>" method="post">
            <div class="box1">
                <div>
                    <p>Tên bài học</p>
                    <input name="tenbaihoc" type="text">
                </div>
                <div>
                    <p>Video bài giảng</p>
                    <input name="videobaigiang" type="text">
                </div>
            </div>

            <div class="box1">
                <div>
                    <p>Khóa học</p>
                    <select name="khoahoc">
                        <option value="">-- Chọn khóa học --</option>
                        <?php
                        include('../connect.php');
                        $sqlKH = "SELECT * FROM khoa_hoc";
                        $resultKH = mysqli_query($conn, $sqlKH);
                        while ($rowKH = mysqli_fetch_array($resultKH)) {
                            echo "<option value='{$rowKH['id']}'>{$rowKH['ten_khoa_hoc']}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="box2">
                <input type="submit" value="Cap nhat">
            </div>
            <?php
            include('../connect.php');

            if (
                !empty($_POST['tenbaihoc']) &&
                !empty($_POST['videobaigiang']) &&
                !empty($_POST['khoahoc'])
            ) {
                $tenBaiHoc = $_POST['tenbaihoc'];
                $videoBaiGiang = $_POST['videobaigiang'];
                $khoaHoc = $_POST['khoahoc'];

                $sql = "UPDATE `bai_hoc` 
            SET `ten_bai_hoc`='$tenBaiHoc',`video_baigiang`='$videoBaiGiang',`khoahoc_id`='$khoaHoc' WHERE `id` = $id";
                // echo $sql;
                mysqli_query($conn, $sql);
                header('location: index.php?page_layout=baihoc');
            } else {
                // echo "Vui long nhap day du thong tin";
            }
            ?>

        </form>
</body>

</html>