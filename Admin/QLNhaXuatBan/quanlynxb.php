<?php
$linkdb=mysqli_connect("localhost","root","","quanlybansach");
$linkdb -> set_charset("utf8");
$listsql="select * from nhaxuatban";
$result=mysqli_query($linkdb,$listsql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_style.css">
    <title>Quản lý nhà xuất bản</title>
</head>
<body>
    <h1 style="text-align:center;">Quản lý danh mục nhà xuất bản</h1>
    <a href="themnxb.html" style=" text-decoration: none; font-size:20px;color:red;">Thêm nhà xuất bản</a>
    <table border=1px >
        <tr>
            <th>Mã nhà xuất bản</th>
            <th>Tên nhà xuất bản</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Thao tác</th>
        </tr>
        <?php
            while($r=mysqli_fetch_assoc($result)){
        ?>
                <tr>
                    <td><?php echo $r['MaNXB'];?></td>
                    <td><?php echo $r['TenNXB'];?></td>
                    <td><?php echo $r['DiaChiNXB'];?></td>
                    <td><?php echo $r['SDT'];?></td>
                    <td><?php echo $r['Email'];?></td>
                    <td><a href="suanxb.php?manxb=<?php echo $r['MaNXB'];?>" style=" text-decoration: none;font-size;20px;color:red;">Sửa</a> 
                    <a href="xoanxb.php?manxb=<?php echo $r['MaNXB'];?>" style="text-decoration: none; font-size;20px;color:red;">Xóa</a></td>
                </tr>
                <?php
            }
        ?>
    </table>
    <a style="color:Blue;" href="../quanly.php"><h2>Trở về trang quản lý</h2> </a>
</body>
</html>