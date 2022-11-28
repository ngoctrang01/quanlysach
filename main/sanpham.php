<?php
$mysqli=mysqli_connect("localhost","root","","quanlybansach");
$mysqli -> set_charset("utf8");
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }
$sql_chitiet="SELECT * FROM theloai join sach on theloai.MaLoai=sach.MaLoai join
nhaxuatban on sach.MaNXB=nhaxuatban.MaNXB join chitietsach on sach.MaSach=chitietsach.MaSach
join tacgia on tacgia.MaTG=chitietsach.MaTG where sach.MaSach='$_GET[masach]'";
$query=mysqli_query($mysqli,$sql_chitiet);
?>      
<head>
    <link rel="stylesheet" href="../css/style.css">
</head>
    <div class="wrapper">
    <div class="header">
           <img src="../images/logo.png" width=100% height="130px">
       </div>
       <div class="menu"> 
            <ul class="list_menu">
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="sanpham.php">Sản phẩm</a></li>
                <li><a href="giohang.php">Giỏ hàng</a></li>
                <li><a href="tintuc.php">Tin tức</a></li>
                <li><a href="lienhe.php">Liên hệ</a></li>
                <li><a href="dangxuat.php">Đăng xuất</a></li>
            </ul>
            <p>
                <form action="index.php?quanly=timkiem" method="GET">
                <input type="text" placeholder="Tìm kiếm sản phẩm..." name="tukhoa">
                <input type="submit" name="timkiem" value="Tìm kiếm">
                </form>
            </p>
        </div>
<div class="content">
                <?php
                while($row_dm=mysqli_fetch_array($query)){
                    ?>
            <div class="hinhanh_sanpham">
                    <img style="padding-left:5px;"width="90%" height="80%"src="../Admin/QLSach/uploads/<?php echo $row_dm['HinhAnh']?>">
            </div>
            <form method="post" action="themgiohang.php?masach=<?php echo $row_dm['MaSach']?>">
            <div class="chitiet_sanpham">
              <h3>Tên sách: <?php echo $row_dm['TenSach'] ?></h3>
              <p>Tên tác giả: <?php echo $row_dm['TenTG'] ?></p>
              <p>Tên nhà xuất bản: <?php echo $row_dm['TenNXB']?></p>
              <p>Nội dung: <?php echo $row_dm['NoiDung'] ?></p>
              <p>Năm xuất bản: <?php echo $row_dm['NamXuatBan'] ?></p>
              <p>Giá: <?php echo number_format($row_dm['Gia'],0,',','.').' vnđ' ?></p>
              <p><input class="themgiohang" name="themgiohang" type="submit" value="Thêm vào giỏ hàng"></p>
            </div>
            </form>
            <?php
                }
                ?>
            </div>
        <div class="clear"></div>
        <a href="index.php" style="float:left; text-decoration: none;padding-right:5px"><h3>Trở về trang chủ</h3></a>
        <?php
            include "../pages/footer.php";
        ?>
</div>