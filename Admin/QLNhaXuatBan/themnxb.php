<?php
$manxb=$_POST['txtMaNXB'];
$tennxb=$_POST['txtTenNXB'];
$diachinxb=$_POST['DiaChiNXB'];
$sodienthoai=$_POST['DienThoaiNXB'];
$email=$_POST['txtEmail'];

$linkdb=mysqli_connect("localhost","root","","quanlybansach");
$linkdb -> set_charset("utf8");

$sql="INSERT INTO nhaxuatban values('$manxb','$tennxb','$diachinxb','$sodienthoai','$email')";
mysqli_query($linkdb,$sql);
header("Location:quanlynxb.php");
?>