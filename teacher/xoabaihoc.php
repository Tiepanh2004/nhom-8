<h1>Xoa bai hoc</h1>
<?php
include('../connect.php');

$id = $_GET['id'];
$sql = "DELETE FROM `bai_hoc` WHERE id = '$id'";
mysqli_query($conn, $sql);
header('location: index.php?page_layout=baihoc');
?>