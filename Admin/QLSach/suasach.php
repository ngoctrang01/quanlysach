<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật sách</title>
</head>
<body>
    <?php
       $linkdb=mysqli_connect("localhost","root","","quanlybansach");
       $linkdb -> set_charset("utf8");
       $masach=$_GET['ma'];
       $sqlsua="select * from sach where MaSach='$masach";
       $result=mysqli_query($linkdb,$sqlsua);
    ?>
    <div>
        <h1>Cập nhật sách</h1>
        <form action="suasach.php" method="post">
            <table>
            <?php
                 while($r=mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td>Mã sách</td>
                <td>
                    <input type="text" name="txtMaSach" value="<?php echo $r['MaSach'];?>">
                </td>
            </tr>
            <tr>
                <td>Tên sách</td>
                <td>
                    <input type="text" name="txtTenSach" value="<?php echo $r['TenSach'];?>">
                </td>
            </tr>
            <tr>
                <td>Nội dung</td>
                <td>
                    <input type="text" name="txtNoiDung" value="<?php echo $r['NoiDung'];?>">
                </td>
            </tr>
            <tr>
                <td>Hinh ảnh</td>
                <td>
                    <input type="file" name="image" value="<?php echo $r['HinhAnh'];?>">
                </td>
            </tr><br>
            <tr>
                <td>Giá</td>
                <td><input type="text" name="txtGia" value="<?php echo $r['Gia'];?>"></td>
            </tr>
            <tr>
                <td>Năm xuất bản</td>
                <td>
                    <input type="text" name="txtNamXB" value="<?php echo $r['NamXB'];?>">
                </td>
            </tr>
            <tr>
                <td>Tên loại</td>
                <td>
                    <input type="text" name="txtTenLoai" value="<?php echo $r['TenLoai'];?>">
                </td>
            </tr>
            <tr>
                <td>Tên tác giả</td>
                <td>
                    <input type="text" name="txtTenTG" value="<?php echo $r['TenTG'];?>">
                </td>
            </tr>
            <tr>
                <td>Tên nhà xuất bản</td>
                <td>
                    <input type="text" name="txtTenNXB" value="<?php echo $r['TenNXB'];?>">
                </td>
            </tr>
            <tr>
                <td><p><input type="submit" name="btnSua" value="Sửa sách"></p></td>
            </tr>
            <?php
        }
        ?>
        </table>
        </form>
    </div>
</body>
</html>