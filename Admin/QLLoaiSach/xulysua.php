<?php
$linkdb=mysqli_connect("localhost","root","","quanlybansach");
$linkdb -> set_charset("utf8");
$maloai=$_POST['txtMaLoaiSach'];
$tenloai=$_POST['txtTenLoaiSach'];
$sql_edit="UPDATE theloai SET TenLoai='$tenloai' WHERE MaLoai='$maloai'";
mysqli_query($linkdb,$sql_edit);
header("Location:quanlyloaisach.php");
?>