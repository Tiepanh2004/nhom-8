<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài học</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
        }

        .btn {
            color: black;
            border: 1px solid black;
            padding: 2px 6px;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <h1>Danh sách Bài học</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tên bài học</th>
            <th>Link video</th>
            <th>Khóa học</th>
            <th>Chức năng</th>
        </tr>
        <?php
        $sql = "SELECT bh.*, kh.ten_khoa_hoc FROM `bai_hoc` bh JOIN `khoa_hoc` kh ON bh.khoahoc_id=kh.id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['ten_bai_hoc'] ?></td>
                <td><?= $row['video_baigiang'] ?></td>
                <td><?= $row['ten_khoa_hoc'] ?></td>
                <td>
                    <a class="btn" href="index.php?page_layout=Suabaihoc&id=<?= $row['id'] ?>">Sửa</a>
                    <a class="btn" href="index.php?page_layout=Xoabaihoc&id=<?= $row['id'] ?>"
                        onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>

</html>