<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm bài học</title>
    <style>
    .form {
        margin: 40px auto;
        background: #f1f0f0ff;
        padding: 40px 30px;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        width: 100%;
        border: 1px solid #29a2cfff;
    }

    .box1 {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 20px;
    }

    .box1 input {
        border-radius: 5px;
        border: 1px solid black;
        width: 200px;
        height: 28px;
    }

    .box1 select {
        width: 220px;
        border-radius: 5px;
        height: 32px;
    }

    .box1 p {
        text-align: center;
    }

    .box2 input {
        margin-top: 25px;
        width: 100%;
        background-color: white;
        border-radius: 5px;
        border: 1px solid black;
        height: 32px;
    }

    .thongbao {
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="form">
        <h1 style="text-align: center;">Thêm bài học</h1>
        <form action="index.php?page_layout=thembaihoc" method="post">
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
                <input type="submit" value="Them" name="submit">
            </div>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            if (
                !empty($_POST['tenbaihoc']) &&
                !empty($_POST['videobaigiang']) &&
                !empty($_POST['khoahoc'])
            ) {
                $tenBaiHoc = $_POST['tenbaihoc'];
                $videoBaiGiang = $_POST['videobaigiang'];
                $khoaHoc = $_POST['khoahoc'];

                $sql = "INSERT INTO `bai_hoc`(`ten_bai_hoc`, `video_baigiang`, `khoahoc_id`) 
                        VALUES ('$tenBaiHoc','$videoBaiGiang','$khoaHoc')";
                mysqli_query($conn, $sql);
                header('location: index.php?page_layout=baihoc');
            } else {
                echo "<p class='thongbao'>Vui lòng nhập đủ thông tin</p>";
            }
        }
        ?>
    </div>
</body>

</html>