<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật thông tin</title>
</head>
<body>
    <?php
       $linkdb=mysqli_connect("localhost","root","","quanlybansach");
       $linkdb -> set_charset("utf8");
       $makh=$_GET['ma'];
       $sqlsua="select * from khachhang where MaKH='$makh'";
       $result=mysqli_query($linkdb,$sqlsua);
    ?>
    <div>
        <h1>Cập nhật thông tin</h1>
        <form action="xulycapnhat.php" method="post">
            <table>
            <?php
                 while($r=mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td>Mã khách hàng</td>
                <td>
                    <input type="text" name="txtMa" value="<?php echo $r['MaKH'];?>" readonly>
                </td>
            </tr>
            <tr>
                <td>Tên khách hàng</td>
                <td>
                    <input type="text" name="txtTenKH" value="<?php echo $r['HoTenKH'];?>">
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    <input type="text" name="txtEmail" value="<?php echo $r['EmailKH'];?>">
                </td>
            </tr>
            <tr>
                <td>Số điện thoại</td>
                <td>
                    <input type="text" name="txtSDT" value="<?php echo $r['SoDienThoai'];?>">
                </td>
            </tr><br>
            <tr>
                <td>Địa chỉ</td>
                <td><input type="text" name="txtDiaChi" value="<?php echo $r['DiaChiKH'];?>"></td>
            </tr>
            <tr>
                <td>Tên tài khoản</td>
                <td>
                    <input type="text" name="txtTaiKhoan" value="<?php echo $r['TenTaiKhoan'];?>">
                </td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td>
                    <input type="text" name="txtMatKhau" value="<?php echo $r['MatkhauKH'];?>">
                </td>
            </tr>
            <tr>
                <td><p><input type="submit" name="capnhat" value="Cập nhật thông tin"></p></td>
            </tr>
            <?php
        }
        ?>
        </table>
        </form>
    </div>
</body>
</html>