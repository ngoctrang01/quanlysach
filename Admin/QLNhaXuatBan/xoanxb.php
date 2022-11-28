<?php
$linkdb=mysqli_connect("localhost","root","","quanlybansach");
$linkdb -> set_charset("utf8");
$manhaxuatban=$_GET['manxb'];
$sqlxoa="delete from nhaxuatban where MaNXB='$manhaxuatban'";
mysqli_query($linkdb,$sqlxoa);
header("location:quanlynxb.php");
?>