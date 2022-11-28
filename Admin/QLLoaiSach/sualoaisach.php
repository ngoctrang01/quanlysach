<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật loại sách</title>
</head>
<body>
    <?php
       $linkdb=mysqli_connect("localhost","root","","quanlybansach");
       $linkdb -> set_charset("utf8");
       $maloaisach=$_GET['maloai'];
       $sqlsua="select * from theloai where MaLoai='$maloaisach'";
       $result=mysqli_query($linkdb,$sqlsua);
    ?>
    <div>
        <h1>Thay đổi thông tin loại sách</h1>
        <form action="xulysua.php" method="post">
            <table>
            <?php
                while($r=mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td>Mã sách</td>
                <td>
                    <input type="text" name="txtMaLoaiSach" value="<?php echo $r['MaLoai'];?>"readonly="true">
                </td>
            </tr>
            <tr>
                <td>Tên sách</td>
                <td>
                    <input type="text" name="txtTenLoaiSach" value="<?php echo $r['TenLoai'];?>">
                </td>
            </tr>
            <tr>
                <td><p><input type="submit" name="btnSua" value="Lưu loại sách"></p></td>
            </tr>
            <?php
        }
        ?>
        </table>
        </form>
    </div>
</body>
</html>