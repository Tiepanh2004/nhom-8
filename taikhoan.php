<style>
.taikhoan-container {
    text-align: center;
}
</style>
<div class="taikhoan-container">
    <h2>Thông tin tài khoản</h2>

    <div class="avatar">
        <img style="height: 300px; width: 250px" src="uploads/avatar.jpg" alt="">
    </div>

    <div class="info">
        <p>Tên: <?php echo $_SESSION['username']; ?></p>

        <p>Vai trò:
            <?php
            switch ($_SESSION['vaitro']) {
                case 1:
                    echo "Admin";
                    break;
                case 2:
                    echo "Giảng viên";
                    break;
                case 3:
                    echo "Học viên";
                    break;
                default:
                    echo "Không xác định";
                    break;
            }
            ?>
        </p>
    </div>

    <div class="actions">
        <a href="index.php">Quay về trang chủ</a>
    </div>
</div>