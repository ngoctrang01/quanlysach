<?php
include '../model/connectdb.php';
$listsql="select * from theloai";
$result=mysqli_query($mysqli,$listsql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý loại sách</title>
</head>
<body>
<h1 style="text-align:center;">Quản lý danh mục loại sách</h1>
    <a href="themloaisach.php" style=" text-decoration: none; font-size:20px;color:red;">Thêm loại sách</a>
    <table border=1px >
        <tr>
            <th>Mã loại sách</th>
            <th>Tên loại sách</th>
            <th>Thao tác</th>
        </tr>
        <?php
            while($r=mysqli_fetch_assoc($result)){
        ?>
                <tr>
                    <td><?php echo $r['MaLoai'];?></td>
                    <td><?php echo $r['TenLoai'];?></td>
                    <td><a href="sualoaisach.php?maloai=<?php echo $r['MaLoai'];?>" style=" text-decoration: none;font-size;20px;color:red;">Sửa</a> 
                    <a href="xoaloaisach.php?maloai=<?php echo $r['MaLoai'];?>" onClick="return confirm('Bạn có chắc chắn muốn xóa thể loại này không')" style="text-decoration: none; font-size;20px;color:red;">Xóa</a></td>
                    
                </tr>
                <?php
            }
        ?>
    </table>
    <a style="color:blue;"href="../quanly.php"><h2>Trở về trang quản lý</h2></a>
</body>
</html>