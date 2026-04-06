<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khóa học</title>
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
    <h1>Danh sách khóa học</h1>
    <a class="btn" href="index.php?page_layout=themkhoahoc">Them khoa hoc</a>
    <table border=1>
        <tr>
            <th>Ma khoa hoc</th>
            <th>Ten khoa hoc</th>
            <th>Noi dung</th>
            <th>Mo ta</th>
            <th>Giang vien</th>
            <th>Chuc nang</th>
        </tr>
        <?php
        include('../connect.php');
        $sql = "SELECT kh.* , nd.ho_ten 
        FROM khoa_hoc kh 
        join nguoi_dung nd on kh. giangvien_id = nd.id
";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['ten_khoa_hoc'] ?></td>
            <td><?php echo $row['noi_dung'] ?></td>
            <td><?php echo $row['mo_ta'] ?></td>
            <td><?php echo $row['ho_ten'] ?></td>
            <td>
                <a class="btn" href="index.php?page_layout=capnhatkhoahoc&id=<?php echo $row['id'] ?>">Cap
                    nhat</a>
                <a class="btn" href="index.php?page_layout=xoakhoahoc&id=<?php echo $row['id'] ?>">Xoa</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>