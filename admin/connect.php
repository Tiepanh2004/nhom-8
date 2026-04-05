<?php
// Thông tin kết nối database
$servername = "localhost";  // Tên server (thường là localhost)
$username = "root";         // Username MySQL (mặc định là root với XAMPP/Laragon)
$password = "";             // Password MySQL (để trống nếu dùng XAMPP/Laragon)
$dbname = "quan_ly_khoa_hoc";   // Tên database của bạn

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Thiết lập charset UTF-8
$conn->set_charset("utf8mb4");
?>