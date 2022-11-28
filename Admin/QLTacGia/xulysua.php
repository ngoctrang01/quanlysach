<?php
$linkdb=mysqli_connect("localhost","root","","quanlybansach");
$linkdb -> set_charset("utf8");
$matacgia=$_POST['txtMaTacGia'];
$tentacgia=$_POST['txtTenTacGia'];
$gioitinh=$_POST['txtGioiTinh'];
$tieusu=$_POST['txtTieuSu'];
$namsinh=$_POST['txtNamSinh'];
$sql_edit="UPDATE tacgia SET TenTG='$tentacgia',GioiTinh='$gioitinh',TieuSu='$tieusu',NamSinh='$namsinh' WHERE MaTG='$matacgia'";
mysqli_query($linkdb,$sql_edit);
header("Location:quanlytacgia.php");
?>