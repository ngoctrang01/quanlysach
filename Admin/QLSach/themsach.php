<?php
session_start();
include '../model/connectdb.php';
$sqltheloai="select *from theloai";
$rloai=mysqli_query($mysqli,$sqltheloai);
$sqlnxb="select * from nhaxuatban";
$rnxb=mysqli_query($mysqli,$sqlnxb);
$sqltacgia="select * from tacgia";
$rtacgia=mysqli_query($mysqli,$sqltacgia);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sách</title>
</head>
<body>
    <div>
        <h1>Thêm sách mới</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <table>
            <tr>
                <td>Mã sách</td>
                <td>
                    <input type="text" name="txtMaSach">
                </td>
            </tr>
            <tr>
                <td>Tên sách</td>
                <td>
                    <input type="text" name="txtTenSach">
                </td>
            </tr>
            <tr>
                <td>Nội dung</td>
                <td>
                    <textarea name="noidung" id="" cols="30" rows="10"></textarea>
                </td>
            </tr>
            <tr>
                <td>Hinh ảnh</td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr><br>
            <tr>
                <td>Giá</td>
                <td><input type="text" name="txtGia"></td>
            </tr>
            <tr>
                <td>Năm xuất bản</td>
                <td>
                    <input type="text" name="txtNamXB">
                </td>
            </tr>
            <tr>
                <td>Tên loại</td>
                <td>
                    <select name="maloai">
                    <option value="unselect">Lựa chọn tên loại</option>
                    <?php
                        while($rowloai=mysqli_fetch_assoc($rloai))
                        {
                            ?>
                            <option value="<?php echo $rowloai['MaLoai'];?>"><?php echo $rowloai['TenLoai'];?></option>

                            <?php
                        }
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tên nhà xuất bản</td>
                <td>
                <select name="manxb" id="">
                    <option value="unselect">Lựa chọn tên nhà xuất bản</option>
                    <?php
                        while($rownxb=mysqli_fetch_assoc($rnxb))
                        {
                            ?>
                            <option value="<?php echo $rownxb['MaNXB'];?>"><?php echo $rownxb['TenNXB'];?></option>

                            <?php
                        }
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tên tác giả</td>
                <td>
                <p><a style="color:blue;text-decoration: none;"href="chontacgia.php">Chọn tác giả</a></p>
                    <?php
                if(isset($_SESSION['chon']))
                    foreach($_SESSION['chon'] as $cart_item)
                    {
                    ?>
                    <?php echo $cart_item['tentacgia'];?>
            <?php
            }
            ?>
            </td>
            </tr>
            <tr>
                <td><p><input type="submit" name="btnThem" value="Thêm sách"></p></td>
            </tr>
        </table>
        </form>
    </div>
</body>
</html
<?php
if(isset($_POST['btnThem']))
{
$linkdb=mysqli_connect("localhost","root","","quanlybansach");
$linkdb -> set_charset("utf8");
$masach=$_POST['txtMaSach'];
$tensach=$_POST['txtTenSach'];
$noidung=$_POST['noidung'];
$gia=$_POST['txtGia'];
$namxb=$_POST['txtNamXB'];
$maloai=$_POST['maloai'];
$manxb=$_POST['manxb'];
$hinhanh=$_FILES['image']['name'];
$hinhanh_tmp=$_FILES['image']['tmp_name'];
move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
$sql = "INSERT INTO sach values ('$masach','$tensach','$noidung','$hinhanh','$gia','$namxb','$maloai','$manxb')";
$query=mysqli_query($mysqli,$sql);
if($query)
{
    foreach($_SESSION['chon'] as $key => $value)
    {
        $matg = $value['matg'];
        $chitietsach = "INSERT INTO chitietsach values ('$masach','$matg')";
        $chitiet=mysqli_query($mysqli,$chitietsach);
    }
}
header('Location:quanlysach.php');
}
?>