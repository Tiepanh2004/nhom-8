<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
</head>
<style>
main {
    overflow: auto;
}

.danhsach-khoahoc {
    display: flex;
    justify-content: space-evenly;
    flex-wrap: wrap;
    gap: 25px;
    margin-top: 20px;
}

.khoahoc-item {
    width: 370px;
    height: 220px;
    border-radius: 10px;
    padding: 30px 20px;
    box-sizing: border-box;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.khoahoc-item h4 {
    font-size: 28px;
    margin: 0 0 25px 0;
}

.khoahoc-item p {
    font-size: 18px;
    margin: 0 0 25px 0;
}

.khoahoc-item button {
    border: none;
    padding: 10px 16px;
    border-radius: 20px;
    background: linear-gradient(to right, #6a5cff, #4cc9f0);
    color: white;
    cursor: pointer;
    font-size: 16px;
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

            <div class="danhsach-khoahoc">
                <?php
                $sql = "SELECT * FROM `khoa_hoc` ORDER BY id DESC";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_array($result)) {
                    $khoahocId = $row['id'];

                    $sql2 = "SELECT * FROM `bai_hoc` WHERE khoahoc_id = $khoahocId";
                    $result2 = mysqli_query($conn, $sql2);
                    $tongBaiHoc = mysqli_num_rows($result2);
                ?>
                <div class="khoahoc-item" style="background-image: url('<?php echo $row['img_url']; ?>');">
                    <h4><?php echo $row['ten_khoa_hoc']; ?></h4>
                    <p><?php echo $tongBaiHoc; ?> bài học</p>
                    <button onclick="xemthongtin(<?php echo $row['id']; ?>)">Xem chi tiết khóa học</button>
                </div>
                <?php
                }
                ?>
            </div>
        </section>

        <div id="thong-tin" style="display:none">
            <div id="thongtin-content">
                <div id="noidung-khoahoc"></div>
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