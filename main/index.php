<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Web bán sách</title>
</head>
<body>
    <div class="wrapper">
        <?php
            include "../admin/model/connectdb.php";
            session_start();
            $sql="SELECT * FROM khachhang";
            $sql_kh=mysqli_query($mysqli,$sql);
            $rowkh=mysqli_fetch_array($sql_kh);
            ?>
            <div class="header">
            <img src="../images/logo.png" width=100% height="130px">
            </div>
            <?php
            if(isset($_GET['dangxuat']) && $_GET['dangxuat']==1)
            {
                unset($_SESSION['dangnhap']);
                unset($_SESSION['cart']);
                header('Location:../index.php');
            }
            ?>
            <div class="menu"> 
            <ul class="list_menu">
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="sanpham.php">Sản phẩm</a></li>
                <li><a href="giohang.php">Giỏ hàng</a></li>
                <li><a href="tintuc.php">Tin tức</a></li>
                <li><a href="lienhe.php">Liên hệ</a></li>
                <li><a href="capnhat.php?ma=<?php echo $rowkh['MaKH'] ?>">Cập nhật </a></li>
                <li><a href="index.php?dangxuat=1" onClick="return confirm('Bạn có chắc chắn muốn thoát không')">Đăng xuất</a></li>
            </ul>
            <p>
                <form action="index.php?quanly=timkiem" method="GET">
                <input type="text" placeholder="Tìm kiếm sản phẩm..." name="tukhoa">
                <input type="submit" name="timkiem" value="Tìm kiếm">
                </form>
            </p>
        </div>
            <div id="main">
            <h3>Xin chào <?php if(isset($_SESSION['dangnhap'])) echo $_SESSION['dangnhap'];?></h3>
                <?php
                     $sql_danhmuc="SELECT * FROM theloai";
                     $sql_danhmuc=mysqli_query($mysqli,$sql_danhmuc);
                     ?>
                     <div class="sidebar">
                                     <ul class="list_sidebar">
                                     <?php
                                         while($row=mysqli_fetch_array($sql_danhmuc)){
                                         ?>
                                             <li><a href="danhmuc.php?maloai=<?php echo $row['MaLoai']?>"><?php echo $row['TenLoai']?></a></li>
                                             <?php
                                         }
                                     ?>
                     </div>
                <div class="right_main">
                    <img src="../images/nensach.jpg" width=100% height="450px">
                </div>
            </div>
            <?php
            include "../pages/footer.php";
        ?> 
    </div>
</body>
</html>