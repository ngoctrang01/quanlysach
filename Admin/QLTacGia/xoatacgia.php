<?php
$linkdb=mysqli_connect("localhost","root","","quanlybansach");
$linkdb -> set_charset("utf8");
$matacgia=$_GET['matg'];
$sqlxoachitiet="DELETE from tacgia where MaTG='$matacgia'";
$querychitiet=mysqli_query($linkdb,$sqlxoachitiet);
if($querychitiet)
{
$sqlxoa="DELETE from tacgia where MaTG='$matacgia'";
$query=mysqli_query($linkdb,$sqlxoa);
if($query)
{
header("Location:quanlytacgia.php");
}
else
{
    echo "<h3>Không thể xóa</h3>";
}
}
else echo "<h3>Lỗi</h3";
?>