<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật nhà sản xuất</title>
</head>
<body>
    <?php
       $linkdb=mysqli_connect("localhost","root","","quanlybansach");
       $linkdb -> set_charset("utf8");
       $manhaxuatban=$_GET['manxb'];
       $sqlsua="select * from nhaxuatban where MaNXB='$manhaxuatban'";
       $result=mysqli_query($linkdb,$sqlsua);
    ?>
    <div>
        <h1>cập nhật thông tin nhà xuất bản</h1>
        <form action="xulysua.php" method="post">
            <table>
            <?php
                 while($r=mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td>Mã nhà xuất bản</td>
                <td>
                    <input type="text" name="txtMaNXB" value="<?php echo $r['MaNXB'];?>"readonly="true">
                </td>
            </tr>
            <tr>
                <td>Tên nhà xuất bản</td>
                <td>
                    <input type="text" name="txtTenNXB" value="<?php echo $r['TenNXB'];?>">
                </td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td>
                    <input type="text" name="txtDiaChi" value="<?php echo $r['DiaChiNXB'];?>">
                </td>
            </tr>
            <tr>
                <td>Số điện thoại</td>
                <td>
                    <input type="text" name="txtSDT" value="<?php echo $r['SDT'];?>">
                </td>
            </tr><br>
            <tr>
                <td>Email</td>
                <td><input type="text" name="txtEmail" value="<?php echo $r['Email'];?>"></td>
            </tr>
            <tr>
            <tr>
                <td><p><input type="submit" name="btnSua" value="Lưu nhà xuất bản"></p></td>
            </tr>
            <?php
        }
        ?>
        </table>
        </form>
    </div>
</body>
</html>