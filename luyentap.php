<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách luyện tập</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            padding: 8px;
            text-align: center;
        }

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
            display: inline-block; /* Giúp 2 nút Sửa và Xóa nằm ngay ngắn */
            margin: 2px 0;
        }

        .link-them {
            display: inline-block;
            margin-bottom: 10px;
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body>

    <h1>Danh sách luyện tập</h1>
    
    <a class="link-them" href="index.php?page_layout=Themcauhoi">Thêm câu hỏi</a>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Câu hỏi</th>
            <th>Đáp án A</th>
            <th>Đáp án B</th>
            <th>Đáp án C</th>
            <th>Đáp án D</th>
            <th>Đáp án đúng</th>
            <th>Khóa học</th>
            <th>Chức năng</th>
        </tr>
        <?php
        // Nhúng file kết nối Database
        include 'connect.php';

        // Viết câu lệnh SQL lấy dữ liệu
        $sql = "SELECT bt.*, kh.ten_khoa_hoc FROM `bai_tap` bt JOIN `khoa_hoc` kh ON bt.id_khoa_hoc = kh.id";
        $result = mysqli_query($conn, $sql);

        // Vòng lặp in dữ liệu ra bảng
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['noi_dung']) ?></td>
                <td><?= htmlspecialchars($row['dap_an_1']) ?></td>
                <td><?= htmlspecialchars($row['dap_an_2']) ?></td>
                <td><?= htmlspecialchars($row['dap_an_3']) ?></td>
                <td><?= htmlspecialchars($row['dap_an_4']) ?></td>
                <td><?= $row['dap_an_dung'] ?></td>
                <td><?= htmlspecialchars($row['ten_khoa_hoc']) ?></td>
                <td>
                    <a class="btn" href="index.php?page_layout=Suabaitap&id=<?= $row['id'] ?>">Sửa</a><br>
                    <a class="btn" href="index.php?page_layout=Xoabaitap&id=<?= $row['id'] ?>"
                        onclick="return confirm('Bạn có chắc muốn xóa câu hỏi này không?')">Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>

</html>