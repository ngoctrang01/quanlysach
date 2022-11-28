<?php
$linkdb=mysqli_connect("localhost","root","","quanlybansach");
$linkdb -> set_charset("utf8");
$listsql="SELECT * from sach join theloai on sach.MaLoai=theloai.MaLoai join nhaxuatban 
on sach.MaNXB=nhaxuatban.MaNXB";
$result=mysqli_query($linkdb,$listsql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_style.css">
    <title>Quản lý sách</title>
</head>
<body>
    <h1>Quản lý danh mục sách</h1>
    <a href="themsach.php" style=" text-decoration: none; font-size:20px;color:red;">Thêm sách</a>
    <table border=1px >
        <tr>
            <th>Mã sách</th>
            <th>Tên sách</th>
            <th>Nội dung</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th>Năm sản xuất</th>
            <th>Tên loại</th>
            <th>Tên nhà xuất bản</th>
            <th>Tên tác giả</th>
            <th>Thao tác</th>
        </tr>
        <?php
            while($r=mysqli_fetch_array($result)){
        ?>
                <tr>
                    <td><?php echo $r['MaSach'];?></td>
                    <td><?php echo $r['TenSach'];?></td>
                    <td><?php echo $r['NoiDung'] ?></td>
                    <td><img style="width:100px;" src="./uploads/<?php echo $r['HinhAnh'];?>"></td>     
                    <td><?php echo $r['Gia'];?></td>
                    <td><?php echo $r['NamXuatBan'];?></td>
                    <td><?php echo $r['TenLoai'];?></td>
                    <td><?php echo $r['TenNXB'];?></td>
                    <td><?php echo $_SESSION['chon'] ?></td>
                    <td><a href="suasach.php?ma=<?php echo $r['MaSach'];?>" style=" text-decoration: none;font-size;20px;color:red;">Sửa</a> 
                    <a href="xoasach.php?ma=<?php echo $r['MaSach'];?>" onClick="return confirm('Bạn có chắc chắn muốn xóa sách này không')" style="text-decoration: none; font-size;20px;color:red;">Xóa</a></td>
                </tr>

                <?php
            }
        ?>
    </table>
    <a style="color:Blue;" href="../quanly.php"><h2>Trở về trang quản lý</h2> </a>
</body>
</html>