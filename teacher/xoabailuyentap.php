<h1>Xoa</h1>
<?php
include('../connect.php');

$id = $_GET['id'];
$sql = "DELETE FROM `bai_tap` WHERE id = '$id'";
mysqli_query($conn, $sql);
header('location: index.php?page_layout=luyentap');
?>