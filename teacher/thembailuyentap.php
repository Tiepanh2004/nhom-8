<?php
if (isset($_POST['submit'])) {
    if (
        !empty($_POST['noidung']) &&
        !empty($_POST['dapan1']) &&
        !empty($_POST['dapan2']) &&
        !empty($_POST['dapan3']) &&
        !empty($_POST['dapan4']) &&
        !empty($_POST['khoahoc']) &&
        !empty($_POST['dapandung'])
    ) {
        $noiDung = $_POST['noidung'];
        $dapAn1 = $_POST['dapan1'];
        $dapAn2 = $_POST['dapan2'];
        $dapAn3 = $_POST['dapan3'];
        $dapAn4 = $_POST['dapan4'];
        $khoaHoc = $_POST['khoahoc'];
        $dapAnDung = $_POST['dapandung'];

        $sql = "INSERT INTO `bai_tap`(`noi_dung`, `dap_an_1`, `dap_an_2`, `dap_an_3`, `dap_an_4`, `id_khoa_hoc`, `dap_an_dung`)
                 VALUES ('$noiDung',' $dapAn1','$dapAn2','$dapAn3','$dapAn4','$khoaHoc','$dapAnDung')";
        mysqli_query($conn, $sql);
        header('location: index.php?page_layout=luyentap');
    } else {
        echo "<p class='thongbao'>Vui lòng nhập đủ thông tin</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm bài luyện tập</title>
    <style>
        .form {
            margin: 40px auto;
            background: #f1f0f0ff;
            padding: 30px 20px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            border: 1px solid #29a2cfff;
        }

        .box1 {
            display: flex;
            justify-content: center;
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
            justify-content: center;
        }

        .thongbao {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="form">
        <h1 style="text-align: center;">Thêm bài luyện tập</h1>
        <form action="index.php?page_layout=thembailuyentap" method="post">
            <div class="box1">
                <div>
                    <p>Nội dung</p>
                    <input name="noidung" type="text">
                </div>
                <div>
                    <p>Đáp án 1</p>
                    <input name="dapan1" type="text">
                </div>
            </div>

            <div class="box1">
                <div>
                    <p>Đáp án 2</p>
                    <input name="dapan2" type="text">
                </div>
                <div>
                    <p>Đáp án 3</p>
                    <input name="dapan3" type="text">
                </div>
            </div>
            <div class="box1">
                <div>
                    <p>Đáp án 4</p>
                    <input name="dapan4" type="text">
                </div>
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
            <div class="box1">
                <div>
                    <p>Đáp án đúng</p>
                    <input name="dapandung" type="text">
                </div>
            </div>
            <div class="box2">
                <input type="submit" value="Them" name="submit">
            </div>
        </form>
    </div>
</body>

</html>