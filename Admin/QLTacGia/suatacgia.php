<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật tácc giả</title>
</head>
<body>
    <?php
       $linkdb=mysqli_connect("localhost","root","","quanlybansach");
       $linkdb -> set_charset("utf8");
       $matacgia=$_GET['matg'];
       $sqlsua="select * from tacgia where MaTG='$matacgia'";
       $result=mysqli_query($linkdb,$sqlsua);
    ?>
    <div>
        <h1>Thay đổi thông tin tác giả</h1>
        <form action="xulysua.php" method="post">
            <table>
            <?php
                while($r=mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td>Mã tác giả</td>
                <td>
                    <input type="text" name="txtMaTacGia" value="<?php echo $r['MaTG'];?>"readonly="true">
                </td>
            </tr>
            <tr>
                <td>Tên tác giả</td>
                <td>
                    <input type="text" name="txtTenTacGia" value="<?php echo $r['TenTG'];?>">
                </td>
            </tr>
            <tr>
                <td>Giới tính</td>
                <td>
                    <input type="text" name="txtGioiTinh" value="<?php echo $r['GioiTinh'];?>">
                </td>
            </tr>
            <tr>
                <td>Tiểu sử</td>
                <td>
                    <input type="text" name="txtTieuSu" value="<?php echo $r['TieuSu'];?>">
                </td>
            </tr>
            <tr>
                <td>Năm sinh</td>
                <td>
                    <input type="text" name="txtNamSinh" value="<?php echo $r['NamSinh'];?>">
                </td>
            </tr>
            <tr>
                <td><p><input type="submit" name="btnSua" value="Lưu tác giả"></p></td>
            </tr>
            <?php
        }
        ?>
        </table>
        </form>
    </div>
</body>
</html>