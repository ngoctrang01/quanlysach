<?php
$u=$_POST['username'];
$p=$_POST['password'];
$db=mysqli_connect("localhost","root","","quanlybansach");
$sql="select * from admin where TaiKhoan='$u' and Matkhau='$p'";
$rs=mysqli_query($db, $sql);
if (mysqli_num_rows($rs) > 0)
{
    echo "<h1>Dang nhap thanh cong</h1>";
    header("location:quanly.php");
}
else
{
    echo "<h1>Dang nhap that bai</h1>";
        require_once('login.html');
}
?>