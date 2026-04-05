<?php
include("connect.php");

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "DELETE FROM `khoa_hoc` WHERE id = '$id'";
    
    if (mysqli_query($conn, $sql)) {
        header('location: index.php?page_layout=khoahoc');
        exit();
    } else {
        echo "Lỗi khi xóa: " . mysqli_error($conn);
    }
} else {
    header('location: index.php?page_layout=khoahoc');
    exit();
}
?>