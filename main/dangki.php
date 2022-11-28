
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Trang đăng kí</title>
</head>
<body>
    <div class="wrapper">
<div class="header">
    <img src="../pages/images/logo.png" width=100% height="130px">
</div>
<div class="menu"> 
            <ul class="list_menu">
                <li><a href="../index.php">Trang chủ</a></li>
                <li><a href="sanpham.php">Sản phẩm</a></li>
                <li><a href="tintuc.php">Tin tức</a></li>
                <li><a href="lienhe.php">Liên hệ</a></li>
                <li><a href="dangnhap.php">Đăng nhập</a></li>
            </ul>
        </div>
<div id="main">
<div class="right_main">
<?php
  include '../Admin/model/connectdb.php';
if(isset($_POST['dangki']))
{
    session_start();
    $tenkh=$_POST['hotenkh'];
    $email=$_POST['email'];
    $sdt=$_POST['sodienthoai'];
    $diachi=$_POST['diachi'];
    $tentk=$_POST['tentaikhoan'];
    $matkhau= $_POST['matkhau'];
    $matkhaunl= $_POST['matkhaunhaplai'];
    $err=[];
    if(empty($tenkh))
    {
        $err['hotenkh']="Bạn chưa nhập tên";
    }
    if(empty($email))
    {
        $err['email']="Bạn chưa nhập email";
    }
    if(empty($sdt))
    {
        $err['sodienthoai']="Bạn chưa nhập số điện thoại";
    }
    if(empty($diachi))
    {
        $err['diachi']="Bạn chưa nhập số địa chỉ";
    }
    if(empty($tentk))
    {
        $err['tentaikhoan']="Bạn chưa nhập tên tài khoản";
    }
    if(empty($matkhau))
    {
        $err['matkhau']="Bạn chưa nhập mật khẩu";
    }
    if($matkhau!=$matkhaunl)
    {
        $err['matkhaunhaplai']="mật khẩu nhập lại không đúng";
    }
    if(empty($err))
    {
        $sql_dangki="INSERT INTO khachhang(HoTenKH,EmailKH,SoDienThoai,DiaChiKH,TenTaiKhoan,MatKhauKH) values('$tenkh','$email','$sdt','$diachi','$tentk',md5('$matkhau'))";
        $sql=mysqli_query($mysqli,$sql_dangki);
        echo '<p style="color:green";><h3>Bạn đã đăng kí thành công</h3></p>';
    }
}
?>
    <p><h2>Đăng kí tài khoản</h2></p>
    <form action="" method="post">
    <table>
        <tr>
            <td>Họ tên khách hàng</td>
            <td>
                <input type="text" name="hotenkh">
                </td>
                <td>
                <span style="color: red"><?php echo (isset($err['hotenkh']))? $err['hotenkh']:'' ?></span>
                </td>
        </tr>
        <tr>
            <td>Email khách hàng</td>
            <td><input type="email" name="email"></td>
            <td>
                <span style="color: red"><?php echo (isset($err['email']))? $err['email']:'' ?></span>
            </td>
        </tr>
        <tr>
            <td>Số điện thoại</td>
            <td><input type="text" name="sodienthoai"></td>
            <td>
                <span style="color: red"><?php echo (isset($err['sodienthoai']))? $err['sodienthoai']:'' ?></span>
                </td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><input type="text" name="diachi"></td>
            <td>
                <span style="color: red"><?php echo (isset($err['diachi']))? $err['diachi']:'' ?></span>
                </td>
        </tr>
        <tr>
            <td>Tên tài khoản</td>
            <td><input type="text" name="tentaikhoan"></td>
            <td>
                <span style="color: red"><?php echo (isset($err['tentaikhoan']))? $err['tentaikhoan']:'' ?></span>
                </td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="password" name="matkhau"></td>
            <td>
                <span style="color: red"><?php echo (isset($err['matkhau']))? $err['matkhau']:'' ?></span>
                </td>
        </tr>
        <tr>
            <td>Nhập lại mật khẩu</td>
            <td><input type="password" name="matkhaunhaplai"></td>
            <td>
                <span style="color: red"><?php echo (isset($err['matkhaunhaplai']))? $err['matkhaunhaplai']:'' ?></span>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="dangki" value="Đăng kí"></td>
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