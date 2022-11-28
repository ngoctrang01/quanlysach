<?php
$linkdb=mysqli_connect("localhost","root","","quanlybansach");
$linkdb -> set_charset("utf8");
$manxb=$_POST['txtMaNXB'];
$tennxb=$_POST['txtTenNXB'];
$diachi=$_POST['txtDiaChi'];
$sdt=$_POST['txtSDT'];
$email=$_POST['txtEmail'];
$sql_edit="UPDATE nhaxuatban SET TenNXB='$tennxb',DiaChiNXB='$diachi',SDT='$sdt',Email='$email' WHERE MaNXB='$manxb'";
mysqli_query($linkdb,$sql_edit);
header("Location:quanlynxb.php");
?>