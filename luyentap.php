<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luyện tập</title>
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
    <h1>Danh sách bài tập</h1>
    <a class="btn" href="index.php?page_layout=thembailuyentap">Thêm bài luyện tập</a>
    <table border=1>
        <tr>
            <th>Ma bai tap</th>
            <th>Noi dung</th>
            <th>Dap an 1</th>
            <th>Dap an 2</th>
            <th>Dap an 3</th>
            <th>Dap an 4</th>
            <th>Khoa hoc</th>
            <th>Dap an dung</th>
            <th>Chuc nang</th>
        </tr>
        <?php
        include('../connect.php');
        $sql = "SELECT bt.* , kh.ten_khoa_hoc 
                FROM bai_tap bt 
                join khoa_hoc kh on bt. id_khoa_hoc = kh.id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
        ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo htmlspecialchars($row['noi_dung']) ?></td>
                <td><?php echo htmlspecialchars($row['dap_an_1']) ?></td>
                <td><?php echo htmlspecialchars($row['dap_an_2']) ?></td>
                <td><?php echo htmlspecialchars($row['dap_an_3']) ?></td>
                <td><?php echo htmlspecialchars($row['dap_an_4']) ?></td>
                <td><?php echo $row['ten_khoa_hoc'] ?></td>
                <td><?php echo $row['dap_an_dung'] ?></td>
                <td>
                    <a class="btn" href="index.php?page_layout=capnhatbailuyentap&id=<?php echo $row['id'] ?>">Cap
                        nhat</a>
                    <a class="btn" href="index.php?page_layout=xoabailuyentap&id=<?php echo $row['id'] ?>">Xoa</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>