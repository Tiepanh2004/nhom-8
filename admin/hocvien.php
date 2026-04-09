<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Học viên</title>
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
    <h1>Danh sách học viên</h1>
    <a class="btn" href="index.php?page_layout=themhocvien">Thêm học viên</a>
    <table border=1>
        <tr>
            <th>Ma hoc vien</th>
            <th>Ten hoc vien</th>
            <th>Nam sinh</th>
            <th>So dien thoai</th>
            <th>Email</th>
            <th>Mat khau</th>
            <th>Ten dang nhap</th>
            <th>Chuc nang</th>
        </tr>
        <?php
        include('../connect.php');
        $sql = "SELECT * FROM nguoi_dung WHERE vaitro_id = 3
";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['ho_ten'] ?></td>
            <td><?php echo $row['nam_sinh'] ?></td>
            <td><?php echo $row['sdt'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['mat_khau'] ?></td>
            <td><?php echo $row['ten_dang_nhap'] ?></td>
            <td>
                <a class="btn" href="index.php?page_layout=capnhathocvien&id=<?php echo $row['id'] ?>">Cap
                    nhat</a>
                <a class="btn" href="index.php?page_layout=xoahocvien&id=<?php echo $row['id'] ?>">Xoa</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>