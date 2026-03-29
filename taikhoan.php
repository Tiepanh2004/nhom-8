<style>
.taikhoan-container {
    text-align: center;
}
</style>
<div class="taikhoan-container">
    <h2>Thông tin tài khoản</h2>

    <div class="avatar">
        <img style="height: 400px; width: 300px" src="uploads/avatar.jpg" alt="">
    </div>

    <div class="info">
        <p>Tên: <?php echo $_SESSION['username']; ?></p>

        <p>Vai trò:
            <?php
            echo ($_SESSION['vaitro'] == 2) ? "Giảng viên" : "Học viên";
            ?>
        </p>
    </div>

    <div class="actions">
        <a href="index.php">Quay về trang chủ</a>
    </div>
</div>