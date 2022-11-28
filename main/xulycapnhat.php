<?php
$linkdb=mysqli_connect("localhost","root","","quanlybansach");
$linkdb -> set_charset("utf8");
$makh=$_POST['txtMa'];
$tenkh=$_POST['txtTenKH'];
$email=$_POST['txtEmail'];
$sdt=$_POST['txtSDT'];
$diachi=$_POST['txtDiaChi'];
$tentk=$_POST['txtTaiKhoan'];
$matkhau=$_POST['txtMatKhau'];
$sql_edit="UPDATE khachhang SET HoTenKH='$tenkh',EmailKH='$email',SoDienThoai='$sdt',DiaChiKH='$diachi',TenTaiKhoan='$tentk',MatkhauKH='$matkhau' WHERE MaKH='$makh'";
mysqli_query($linkdb,$sql_edit);
header("Location:dangnhap.php");
?>