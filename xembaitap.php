<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    main {
        overflow: auto;
    }

    .baitap {
        padding-left: 20px;
    }
    </style>
</head>

<body>
    <main>
        <h1>Xem bài tập</h1>
        <p><button onclick="location.reload()">Tải lại trang</button></p>
        <div class="baitap">
            <?php
            $khoaid = $_GET['id_kh'];
            $sql = "SELECT * FROM `bai_tap` WHERE id_khoa_hoc=$khoaid";
            $result = mysqli_query($conn, $sql);
            ?>
            <form action="index.php?page_layout=xembaitap&id_kh=<?php echo $khoaid ?>" method="post">
                <?php
                $cau = 0;
                while ($q = mysqli_fetch_array($result)) {
                    $cau = $cau + 1;
                    $abc = 1;
                ?>
                <div>
                    <p><strong>Câu <?php echo $cau ?>:</strong> <?php echo $q['noi_dung'] ?></p>
                    <?php
                        foreach (['A', 'B', 'C', 'D'] as $opt):
                        ?>
                    <input type="radio" name="q<?php echo $cau ?>" value="<?php echo $abc ?>" required>
                    <?php echo $opt . ". " . htmlspecialchars($q["dap_an_$abc"]); ?><br>
                    <?php
                            $abc = $abc + 1;
                        endforeach;
                        ?>
                </div>
                <?php
                }
                ?>
                <button type="submit">Nộp bài</button>
            </form>
            <?php
            $diem = 0;
            $soCau = $cau;
            $cau = 0;
            $Kq = "";
            // echo $soCau;
            $sql = "SELECT dap_an_dung FROM bai_tap";
            $result = mysqli_query($conn, $sql);
            while ($dad = mysqli_fetch_array($result)) {
                $cau = $cau + 1;
                if (isset($_POST["q$cau"])) {
                    if ($_POST["q$cau"] == $dad['dap_an_dung']) {
                        $diem = $diem + 1;
                    }
                    $Kq = "Bạn trả lời đúng: $diem/$soCau câu!!";
                }
            }
            // echo $_POST["q$cau"];
            // $Kq="Bạn trả lời đúng: $diem/$soCau câu!!";
            if (isset($Kq)) {
                echo $Kq;
            }
            ?>
        </div>
    </main>
</body>

</html>