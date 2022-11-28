<?php
$linkdb=mysqli_connect("localhost","root","","quanlybansach");
$linkdb -> set_charset("utf8");
$masach=$_GET['ma'];
$sql_xoachitiet="delete from chitietsach where MaSach='$masach'";
$querychitiet=mysqli_query($linkdb,$sql_xoachitiet);
if($querychitiet)
{
    $sqlxoa="delete from sach where MaSach='$masach'";
    $query=mysqli_query($linkdb,$sqlxoa);
    if($query)
{
    header("location:quanlysach.php");
}
else
{
    echo "<h3>Không thể xóa</h3>";
}
}
else
{
echo "<h3>Lỗi</h3";
}

?>