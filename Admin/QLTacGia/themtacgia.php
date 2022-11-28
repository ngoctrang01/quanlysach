<?php
$matacgia=$_POST['txtMaTacGia'];
$tentacgia=$_POST['txtTenTacGia'];
$gioitinh=$_POST['txtGioiTinh'];
$tieusu=$_POST['txtTieuSu'];
$namsinh=$_POST['txtNamSinh'];

$linkdb=mysqli_connect("localhost","root","","quanlybansach");
$linkdb -> set_charset("utf8");

$sql="INSERT INTO tacgia values('$matacgia','$tentacgia','$gioitinh','$tieusu','$namsinh')";
mysqli_query($linkdb,$sql);
header("Location:quanlytacgia.php");
?>