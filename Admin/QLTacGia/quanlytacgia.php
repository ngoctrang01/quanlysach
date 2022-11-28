<?php
$linkdb=mysqli_connect("localhost","root","","quanlybansach");
$linkdb -> set_charset("utf8");
$listsql="select * from tacgia";
$result=mysqli_query($linkdb,$listsql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_style.css">
    <title>Quản lý tác giả</title>
</head>
<body>
    <h1 style="text-align:center;">Quản lý danh mục tác giả</h1>
    <a href="themtacgia.html" style=" text-decoration: none; font-size:20px;color:red;">Thêm tác giả</a>
    <table border=1px >
        <tr>
            <th>Mã tác giả</th>
            <th>Tên tác giả</th>
            <th>Giới tính</th>
            <th>Tiểu sử</th>
            <th>Năm sinh</th>
            <th>Thao tác</th>
        </tr>
        <?php
            while($r=mysqli_fetch_array($result)){
        ?>
                <tr>
                <form method="post" action="chonTG.php?matg=<?php echo $r['MaTG']?>">
                    <td><?php echo $r['MaTG'];?></td>
                    <td><?php echo $r['TenTG'];?></td>
                    <td><?php echo $r['GioiTinh'];?></td>
                    <td><?php echo $r['TieuSu'];?></td>
                    <td><?php echo $r['NamSinh'];?></td>
                    <td>
                    <a href="suatacgia.php?matg=<?php echo $r['MaTG'];?>" style=" text-decoration: none;font-size;20px;color:red;">Sửa</a><br> 
                    <a href="xoatacgia.php?matg=<?php echo $r['MaTG'];?>" onClick="return confirm('Bạn có chắc chắn muốn xóa tác giả này không')" style="text-decoration: none; font-size;20px;color:red;">Xóa</a><br>
                    <p><input name="chontg" type="submit" value="Chọn tác giả"></p>
                    </td>
            </form>
            </tr>
                <?php
            }
        ?>
    </table>
    <a style="color:Blue;" href="quanly.php"><h2>Trở về trang quản lý</h2></a>
</body>
</html>