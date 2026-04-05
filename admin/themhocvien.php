<?php
include("connect.php");
$showForm = true;
$errorMessage = '';
$successMessage = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['tendangnhap']) && !empty($_POST['hoten']) && !empty($_POST['namsinh']) && !empty($_POST['sdt']) && !empty($_POST['email'])) {
        $tendangnhap = mysqli_real_escape_string($conn, $_POST['tendangnhap']);
        $hoten = mysqli_real_escape_string($conn, $_POST['hoten']);
        $namsinh = mysqli_real_escape_string($conn, $_POST['namsinh']);
        $sdt = mysqli_real_escape_string($conn, $_POST['sdt']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $sql = "INSERT INTO `nguoi_dung`(`ten_dang_nhap`, `ho_ten`, `nam_sinh`, `sdt`, `email`, `vaitro_id`) VALUES ('$tendangnhap','$hoten','$namsinh','$sdt','$email', 3)";
        if (mysqli_query($conn, $sql)) {
            $successMessage = 'Thêm học viên thành công! Đang chuyển hướng...';
            $showForm = false;
            echo '<script>setTimeout(function(){ window.location.href = "index.php?page_layout=hocvien"; }, 1500);</script>';
        } else {
            $errorMessage = 'Lỗi: ' . mysqli_error($conn);
        }
    } else {
        $errorMessage = 'Vui lòng nhập đầy đủ thông tin!';
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm học viên</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; padding: 0; }
        main { max-width: 700px; margin: 2rem auto; background: white; border-radius: 16px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); overflow: hidden; }
        .form-header { background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); padding: 2rem; text-align: center; color: white; }
        .form-header h1 { margin: 0; font-size: 1.75rem; font-weight: 700; display: flex; align-items: center; justify-content: center; gap: 0.75rem; }
        .form-header h1::before { content: '\f067'; font-family: 'Font Awesome 6 Free'; font-weight: 900; }
        .form-header p { margin: 0.5rem 0 0 0; opacity: 0.9; font-size: 0.95rem; }
        .form-body { padding: 2.5rem; }
        .box { margin-bottom: 1.75rem; }
        .box label { display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151; font-size: 0.95rem; }
        .box label i { margin-right: 0.5rem; color: #f59e0b; width: 20px; }
        .box input[type="text"], .box input[type="date"], .box input[type="email"] { width: 100%; padding: 0.875rem 1rem; border: 2px solid #e5e7eb; border-radius: 10px; font-size: 0.95rem; transition: all 0.3s ease; font-family: inherit; background: #f9fafb; }
        .box input:focus { outline: none; border-color: #f59e0b; background: white; box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.1); }
        .box input[type="submit"] { width: 100% !important; padding: 1rem !important; background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important; color: white !important; border: none !important; border-radius: 10px !important; font-size: 1rem !important; font-weight: 600 !important; cursor: pointer !important; transition: all 0.3s ease !important; box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3) !important; margin-top: 1rem !important; }
        .box input[type="submit"]:hover, .box input[type="submit"]:focus, .box input[type="submit"]:active { color: white !important; background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important; transform: translateY(-2px) !important; box-shadow: 0 6px 20px rgba(245, 158, 11, 0.4) !important; }
        .error-message { background: #fef2f2; border: 2px solid #fecaca; border-radius: 10px; padding: 1rem; margin-top: 1.5rem; display: flex; align-items: center; gap: 0.75rem; color: #dc2626; font-weight: 500; }
        .error-message::before { content: '\f06a'; font-family: 'Font Awesome 6 Free'; font-weight: 900; font-size: 1.25rem; }
        .success-message { background: #f0fdf4; border: 2px solid #bbf7d0; border-radius: 10px; padding: 1rem; margin-top: 1.5rem; display: flex; align-items: center; gap: 0.75rem; color: #16a34a; font-weight: 500; }
        .success-message::before { content: '\f058'; font-family: 'Font Awesome 6 Free'; font-weight: 900; font-size: 1.25rem; }
        .back-btn { display: inline-flex !important; align-items: center !important; gap: 0.5rem !important; padding: 0.75rem 1.5rem !important; background: #f3f4f6 !important; color: #374151 !important; border-radius: 10px !important; text-decoration: none !important; font-weight: 600 !important; transition: all 0.3s ease !important; margin-bottom: 1rem !important; }
        .back-btn:hover, .back-btn:focus, .back-btn:active, .back-btn:visited { color: #374151 !important; background: #e5e7eb !important; transform: translateX(-3px) !important; text-decoration: none !important; }
        .back-btn::before { content: '\f060'; font-family: 'Font Awesome 6 Free'; font-weight: 900; }
    </style>
</head>
<body>
    <main>
        <div class="form-header">
            <h1>Thêm học viên mới</h1>
            <p>Điền thông tin chi tiết để thêm học viên vào hệ thống</p>
        </div>
        <div class="form-body">
            <a href="index.php?page_layout=hocvien" class="back-btn">Quay lại danh sách</a>
<?php if ($showForm): ?>
            <form action="index.php?page_layout=themhocvien" method="post">
                <div class="box">
                    <label for="tendangnhap"><i class="fas fa-user"></i>Tên đăng nhập</label>
                    <input id="tendangnhap" name="tendangnhap" type="text" placeholder="VD: nguyenvanb" required>
                </div>
                <div class="box">
                    <label for="hoten"><i class="fas fa-id-card"></i>Họ tên</label>
                    <input id="hoten" name="hoten" type="text" placeholder="VD: Nguyễn Văn B" required>
                </div>
                <div class="box">
                    <label for="namsinh"><i class="fas fa-calendar"></i>Năm sinh</label>
                    <input id="namsinh" name="namsinh" type="date" required>
                </div>
                <div class="box">
                    <label for="sdt"><i class="fas fa-phone"></i>Số điện thoại</label>
                    <input id="sdt" name="sdt" type="text" placeholder="VD: 0987654321" required>
                </div>
                <div class="box">
                    <label for="email"><i class="fas fa-envelope"></i>Email</label>
                    <input id="email" name="email" type="email" placeholder="VD: nguyenvanb@example.com" required>
                </div>
                <div class="box">
                    <input type="submit" value="Thêm học viên">
                </div>
            </form>
<?php endif; ?>
<?php if ($errorMessage): ?>
            <div class="error-message"><?php echo $errorMessage; ?></div>
<?php endif; ?>
<?php if ($successMessage): ?>
            <div class="success-message"><?php echo $successMessage; ?></div>
<?php endif; ?>
        </div>
    </main>
</body>
</html>