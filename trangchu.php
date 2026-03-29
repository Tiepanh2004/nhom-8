<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
main {
    overflow: auto;
}
</style>

<body>
    <main>
        <section class="tieude">
            <div class="tieude-card1">
                <i class="fa-solid fa-book"></i>
                <div class="soluong">
                    <?php
                    $sql = "SELECT * FROM `khoa_hoc`";
                    $result = mysqli_query($conn, $sql);
                    $tong = 0;
                    while ($b = mysqli_fetch_array($result)) {
                        $tong = $tong + 1;
                    }
                    ?>
                    <h2><?php echo $tong ?></h2>
                    <p>Khóa học</p>
                </div>
            </div>
            <div class="tieude-card2" style="background-color: #3498db;">
                <i class="fa-solid fa-graduation-cap"></i>
                <div class="soluong">
                    <?php
                    $sql = "SELECT * FROM `bai_hoc`";
                    $result = mysqli_query($conn, $sql);
                    $tong = 0;
                    while ($b = mysqli_fetch_array($result)) {
                        $tong = $tong + 1;
                    }
                    ?>
                    <h2><?php echo $tong ?></h2>
                    <p>Bài học</p>
                </div>
            </div>
            <div class="tieude-card3" style="background-color: orange;">
                <i class="fa-solid fa-chart-line"></i>
                <div class="soluong">
                    <?php
                    $sql = "SELECT * FROM `bai_tap`";
                    $result = mysqli_query($conn, $sql);
                    $tong = 0;
                    while ($b = mysqli_fetch_array($result)) {
                        $tong = $tong + 1;
                    }
                    ?>
                    <h2><?php echo $tong ?></h2>
                    <p>Bài tập</p>
                </div>
            </div>
        </section>
        <section id="khoahoc">
            <h3>Khóa học</h3>
            <div id="khoahoc-list1">
                <div class="khoahoc-card1">
                    <?php
                    $sql = "SELECT * FROM `khoa_hoc` WHERE id = 1";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <h4><?= $row['ten_khoa_hoc'] ?></h4>
                    <?php
                    $sql = "SELECT * FROM `bai_hoc` WHERE khoahoc_id = 1";
                    $result = mysqli_query($conn, $sql);
                    $tong = 0;
                    while ($b = mysqli_fetch_array($result)) {
                        $tong = $tong + 1;
                    }
                    ?>
                    <p><?php echo $tong ?> bài học</p>
                    <button onclick="xemthongtin(<?= $row['id'] ?>)">Xem chi tiết khóa học</a></button>
                </div>
                <div class="khoahoc-card2">
                    <?php
                    $sql = "SELECT * FROM `khoa_hoc` WHERE id = 2";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <h4><?= $row['ten_khoa_hoc'] ?></h4>
                    <?php
                    $sql = "SELECT * FROM `bai_hoc` WHERE khoahoc_id = 2";
                    $result = mysqli_query($conn, $sql);
                    $tong = 0;
                    while ($b = mysqli_fetch_array($result)) {
                        $tong = $tong + 1;
                    }
                    ?>
                    <p><?php echo $tong ?> bài học</p>
                    <button onclick="xemthongtin(<?= $row['id'] ?>)">Xem chi tiết khóa học</a></button>
                </div>

                <div class="khoahoc-card3">
                    <?php
                    $sql = "SELECT * FROM `khoa_hoc` WHERE id = 3";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <h4><?= $row['ten_khoa_hoc'] ?></h4>
                    <?php
                    $sql = "SELECT * FROM `bai_hoc` WHERE khoahoc_id = 3";
                    $result = mysqli_query($conn, $sql);
                    $tong = 0;
                    while ($b = mysqli_fetch_array($result)) {
                        $tong = $tong + 1;
                    }
                    ?>
                    <p><?php echo $tong ?> bài học</p>
                    <button onclick="xemthongtin(<?= $row['id'] ?>)">Xem chi tiết khóa học</a></button>
                </div>
            </div>
            <div id="khoahoc-list2">
                <div class="khoahoc-card4">
                    <?php
                    $sql = "SELECT * FROM `khoa_hoc` WHERE id = 4";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <h4><?= $row['ten_khoa_hoc'] ?></h4>
                    <?php
                    $sql = "SELECT * FROM `bai_hoc` WHERE khoahoc_id = 4";
                    $result = mysqli_query($conn, $sql);
                    $tong = 0;
                    while ($b = mysqli_fetch_array($result)) {
                        $tong = $tong + 1;
                    }
                    ?>
                    <p><?php echo $tong ?> bài học</p>
                    <button onclick="xemthongtin(<?= $row['id'] ?>)">Xemm chi tiết khóa học</a></button>
                </div>
                <div class="khoahoc-card5">
                    <?php
                    $sql = "SELECT * FROM `khoa_hoc` WHERE id = 5";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <h4><?= $row['ten_khoa_hoc'] ?></h4>
                    <?php
                    $sql = "SELECT * FROM `bai_hoc` WHERE khoahoc_id = 5";
                    $result = mysqli_query($conn, $sql);
                    $tong = 0;
                    while ($b = mysqli_fetch_array($result)) {
                        $tong = $tong + 1;
                    }
                    ?>
                    <p><?php echo $tong ?> bài học</p>
                    <button onclick="xemthongtin(<?= $row['id'] ?>)">Xemm chi tiết khóa học</a></button>
                </div>
            </div>
        </section>
        <div id="thong-tin" style="display:none">
            <div id="thongtin-content">
                <div id="noidung-khoahoc">

                </div>
            </div>

        </div>
        <script>
        function xemthongtin(idkhoa) {
            document.getElementById("khoahoc").style.display = "none";
            document.getElementById("thong-tin").style.display = "block";

            fetch("xemthongtin.php?id=" + idkhoa)
                .then(res => res.text())
                .then(html => {
                    document.getElementById("noidung-khoahoc").innerHTML = html;
                });
        }

        function dong() {
            document.getElementById("thong-tin").style.display = "none";
            document.getElementById("khoahoc").style.display = "block";
        }
        </script>

    </main>
</body>

</html>