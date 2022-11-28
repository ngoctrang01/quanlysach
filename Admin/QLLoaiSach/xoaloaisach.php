<?php
include '../model/connectdb.php';
$maloaisach=$_GET['maloai'];
$sqlxoa="DELETE from theloai where MaLoai='$maloaisach'";
$query=mysqli_query($mysqli,$sqlxoa);
if($query)
{
    header("Location:quanlyloaisach.php");
}
else
{
    echo "<h3>Không thể xóa </h3>";
}
?>