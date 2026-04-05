<?php
include("connect.php");

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "DELETE FROM `nguoi_dung` WHERE id = '$id' AND vaitro_id = 2";
    
    if (mysqli_query($conn, $sql)) {
        header('location: index.php?page_layout=giangvien');
        exit();
    } else {
        echo "Lỗi khi xóa: " . mysqli_error($conn);
    }
} else {
    header('location: index.php?page_layout=giangvien');
    exit();
}
?>