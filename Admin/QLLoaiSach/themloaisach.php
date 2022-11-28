
<?php
include '../model/connectdb.php';
$sql_loai="SELECT * FROM theloai ";
$query_loai=mysqli_query($mysqli,$sql_loai);
if(isset($_POST['themloaisach']))
{
   session_start();
    $maloaisach=$_POST['maloai'];
    $tenloaisach=$_POST['txtTenLoaiSach'];
    $sql_check="SELECT * FROM theloai where MaLoai='$maloaisach'";
    $query_check=mysqli_query($mysqli,$sql_check);
    $check=mysqli_fetch_row($query_check);
    $err=[];
    if(empty($maloaisach))
    {
        $err['maloai']="Bạn chưa nhập mã loại";
    }
    if(empty($tenloaisach))
    {
        $err['txtTenLoaiSach']="Bạn chưa nhập tên loại";
    }
    if($check)
    {
        echo "mã loại đã tồn tại";
    }
    else
    {
    if(empty($err))
    {
    $sql_them = "INSERT INTO theloai values ('$maloaisach','$tenloaisach')";
    mysqli_query($mysqli,$sql_them);
    header('Loacation:quanlyloaisach.php');
    }
    }
}
?>
<h1>Thêm loại sách mới</h1>
        <form action="" method="post">
            <table>
            <tr>
                <td>Mã loại sách</td>
                <td>
                    <input type="text" name="maloai">
                </td>
            </tr>
            <tr>
                <td>Tên loại sách</td>
                <td>
                    <input type="text" name="txtTenLoaiSach">
                </td>
            </tr>
            <tr>
                <td><p><input type="submit" name="themloaisach" value="Thêm loại sách"></p></td>
            </tr>
        </table>
        <a style="color:blue;text-decoration: none;"href="quanlyloaisach.php"><h2>Trở về trang quản lý loại sách</h2></a>
    </form>

