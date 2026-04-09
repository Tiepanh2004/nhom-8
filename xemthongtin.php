<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/xemthongtin.css">
</head>

<body>
    <?php
    include("connect.php");
    $idkhoa = $_GET['id'];
    /* thông tin khóa học */
    $sql = "SELECT kh.*, nd.ho_ten AS giang_vien
        FROM khoa_hoc kh
        JOIN nguoi_dung nd ON kh.giangvien_id = nd.id
        WHERE kh.id = $idkhoa";
    $result = mysqli_query($conn, $sql);
    $kh = mysqli_fetch_assoc($result);

    /* số bài học */
    $sql2 = "SELECT COUNT(*) AS tong FROM bai_hoc WHERE khoahoc_id = $idkhoa";
    $result = mysqli_query($conn, $sql2);
    $bh = mysqli_fetch_assoc($result);
    ?>

    <h3>Thông tin khóa học</h3>
    <p><b>Tên khóa học:</b> <?= $kh['ten_khoa_hoc'] ?></p>
    <p><b>Số bài học:</b> <?= $bh['tong'] ?></p>
    <p><b>Mô tả:</b> <?= $kh['mo_ta'] ?></p>
    <p><b>Nội dung:</b> <?= $kh['noi_dung'] ?></p>
    <p><b>Giảng viên:</b> <?= $kh['giang_vien'] ?></p>
    <div class="nut-xem-thong-tin">
        <button class="nutdong" onclick="xembaihoc(<?php echo $idkhoa ?>)">Bài học</button>
        <button class="nutdong" onclick="dong()">Đóng</button>
    </div>
</body>

</html>