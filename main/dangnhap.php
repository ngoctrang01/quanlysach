
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Trang đăng nhập</title>
</head>
<body>
<?php
 include '../Admin/model/connectdb.php';
?>
<div class="wrapper">
<div class="header">
    <img src="../pages/images/logo.png" width=100% height="130px">
</div>
<div class="menu"> 
            <ul class="list_menu">
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="sanpham.php">Sản phẩm</a></li>
                <li><a href="giohang.php">Giỏ hàng</a></li>
                <li><a href="tintuc.php">Tin tức</a></li>
                <li><a href="lienhe.php">Liên hệ</a></li>
            </ul>
            
        </div>
<div id="main">
    <?php
        include '../pages/sidebar.php';
    ?>
<div class="right_main">
<?php
if(isset($_POST['dangnhap']))
{
    session_start();
    $tentk=$_POST['tentaikhoan'];
    $matkhau=md5($_POST['matkhau']);
    $sql_dangnhap="SELECT* FROM khachhang where TenTaiKhoan='$tentk' and MatkhauKH='$matkhau'";
    $query=mysqli_query($mysqli,$sql_dangnhap);
    $row_dm=mysqli_fetch_array($query);
    if (mysqli_num_rows($query) > 0)
    {
    echo "<h1>Dang nhap thanh cong</h1>";
    $_SESSION['dangnhap']=$row_dm['HoTenKH'];
    $_SESSION['makh']=$row_dm['MaKH'];
    header('Location:index.php');
    }
else
{
    echo "<h1>Dang nhap that bai</h1>";
        require_once('dangnhap.php');
}
}
?>
    <p><h3>Đăng nhập tài khoản</h3></p>
    <form action="" method="post">
    <table>
            <td>Tên tài khoản</td>
            <td><input type="text" name="tentaikhoan"></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="password" name="matkhau"></td>
        </tr>
        <tr >
            <td><a href="dangki.php">Chưa có tài khoản</a></td>
            <td colspan="2"><input style="float:right;"type="submit" name="dangnhap" value="Đăng nhập"></td>
        </tr>
    </table>
    </form>
    <a href="../index.php" style="float:left; text-decoration: none;padding-right:5px"><h3>Trở về trang chủ</h3></a>
</div>
</div>
<?php
include "../pages/footer.php";
?>
</div>
</body>
</html>