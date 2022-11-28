<?php
session_start();
include '../Admin/model/connectdb.php';
$makh=$_SESSION['makh'];
$mahd=rand(0,999);
$d=date("d/m/Y");
$sql_cart= "INSERT INTO hoadon values ('$mahd','$d','$makh')";
$cart_query=mysqli_query($mysqli,$sql_cart);
if($cart_query)
{
    foreach($_SESSION['cart'] as $key => $value)
    {
        $masach = $value['masach'];
        $soluong = $value['soluong'];
        $chitietdonhang = "INSERT INTO chitiethoadon values ('$mahd','$masach','$soluong')";
        $chitiet=mysqli_query($mysqli,$chitietdonhang);

    }
}
unset($_SESSION['cart']);
header('Location:index.php');
?>