<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài học</title>
    <style>
    table {
        width: 100%;
    }

    .btn {
        color: black;
        border: 1px solid black;
        padding: 0 5px;
        border-radius: 5px;
    }
    </style>
</head>

<body>
    <h1>Danh sách bài học</h1>
    <a class="btn" href="index.php?page_layout=thembaihoc">Thêm bài học</a>
    <table border=1>
        <tr>
            <th>Ma bai hoc</th>
            <th>Ten bai hoc</th>
            <th>Video bai giang</th>
            <th>Khoa hoc</th>
            <th>Chuc nang</th>
        </tr>
        <?php
        include('../connect.php');
        $sql = "SELECT bh.* , kh.ten_khoa_hoc 
                FROM bai_hoc bh 
                join khoa_hoc kh on bh. khoahoc_id = kh.id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['ten_bai_hoc'] ?></td>
            <td><?php echo $row['video_baigiang'] ?></td>
            <td><?php echo $row['ten_khoa_hoc'] ?></td>
            <td>
                <a class="btn" href="index.php?page_layout=capnhatbaihoc&id=<?php echo $row['id'] ?>">Cap
                    nhat</a>
                <a class="btn" href="index.php?page_layout=xoabaihoc&id=<?php echo $row['id'] ?>">Xoa</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>