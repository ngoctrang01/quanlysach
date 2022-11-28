<?php
$linkdb=mysqli_connect("localhost","root","","quanlybansach");
$linkdb -> set_charset("utf8");
$masach=$_POST['txtMaSach'];
$tensach=$_POST['txtTenSach'];
$noidung=$_POST['noidung']
$gia=$_POST['txtGia'];
$namxb=$_POST['txtNamXB'];
$matg=$_POST['matg'];
$maloai=$_POST['maloai'];
$manxb=$_POST['manxb'];
$linkdb=mysqli_connect("localhost","root","","quanlybansach");
$linkdb -> set_charset("utf8");
$hinhanh=$_FILES['image']['name'];
$hinhanh_tmp=$_FILES['image']['tmp_name'];
move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
$sql = "INSERT INTO sach values ('$masach','$tensach','$noidung','$hinhanh','$gia','$namxb','$matg','$maloai','$manxb')";
mysqli_query($linkdb,$sql);
header("location:quanlysach.php");
?>