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
    <title>Document</title>
    <link rel="stylesheet" href="luyentap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<style>
h2 {
    white-space: nowrap;
}
</style>

<body>
    <h2>Luyện tập</h2>
    <div style="display: grid; grid-template-columns: repeat(5,1fr); gap: 10px;">
        <?php
        $sql = "SELECT * FROM `khoa_hoc`";
        $result = mysqli_query($conn, $sql);
        while ($khoa = mysqli_fetch_array($result)) {
            $idkhoa = $khoa['id'];
        ?>
        <div onclick="xembaitap(<?php echo $idkhoa ?>)" style=" border: solid 3px;">
            <p>Tên khóa học: <?php echo $khoa['ten_khoa_hoc'] ?></p>
            <?php
                $sqlbt = "SELECT * FROM `bai_tap` where id_khoa_hoc=$idkhoa";
                $rebt = mysqli_query($conn, $sqlbt);
                $tong = mysqli_num_rows($rebt);
                ?>
            <p>Số câu luyên tập: <?php echo $tong ?> câu</p>
            <p>Mô tả: <?php echo $khoa['mo_ta'] ?></p>
        </div>
        <?php
        }
        ?>
    </div>
</body>

</html>