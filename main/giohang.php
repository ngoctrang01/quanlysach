<?php
session_start();
include '../Admin/model/connectdb.php';
?>
<head>
<link rel="stylesheet" href="../css/style.css">
</head>
<div class="wrapper">
<div class="header">
    <img src="../pages/images/logo.png" width=100% height="130px">
</div>
<div class="menu"> 
            <ul class="list_menu">
                <li><a href="../index.php">Trang chủ</a></li>
                <li><a href="sanpham.php">Sản phẩm</a></li>
                <li><a href="tintuc.php">Tin tức</a></li>
                <li><a href="lienhe.php">Liên hệ</a></li>
            </ul>
        </div>
<div id="main">
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
<h3>Giỏ hàng: 
<?php
if(isset($_SESSION['dangnhap']))
{
    echo $_SESSION['dangnhap'];
}
?>
</h3>
<table style="width: 100%;text-align:center;border-collapse:collapse;background:white;"border="1">
    <tr>
        <th>Tên sách</th>
        <th>Hình ảnh</th>
        <th>Số lượng</th>
        <th>Giá</th>
        <th>Thành tiền</th>
        <th>Quản lý</th>
    </tr>
    <?php
        if(isset($_SESSION['cart']))
        {
            $i=0;
            $tongtien=0;
            foreach($_SESSION['cart'] as $cart_item)
            {
                $thanhtien=$cart_item['soluong']*$cart_item['gia'];
                $tongtien+=$thanhtien;
                $i++;
    ?>
    <tr>
    <td><?php echo $cart_item['tensanpham'] ?></td>
    <td><img style="width:100px;" src="../Admin/QLSach/uploads/<?php echo $cart_item['hinhanh'] ?>" ></td>
    <td>
        <a style="text-decoration: none;font-size:36px;"href="themgiohang.php?tru=<?php echo $cart_item['masach'] ?>">-</a>
        <?php echo $cart_item['soluong'] ?>
        <a style=" text-decoration: none;font-size:20px; font-weight:bold"href="themgiohang.php?cong=<?php echo $cart_item['masach'] ?>">+</a>
        
    </td>
    <td><?php echo number_format($cart_item['gia'],0,',','.').' vnđ';?></td>
    <td><?php echo number_format($thanhtien,0,',','.').' vnđ'; ?></td>
    <td><a href="themgiohang.php?xoa=<?php echo $cart_item['masach'] ?>" onClick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không')" >Xóa</a>
</td>
    </tr>
    <?php
            }
            ?>
    <tr>
        <td colspan="6"><p>Tổng tiền: <?php echo number_format($tongtien,0,',','.').' vnđ'; ?></p>
        <div style="clear:both;"></div>
        <?php
            if(isset($_SESSION['dangnhap']))
            {
                ?>
                <p><a href="dathang.php" style="text-decoration: none;font-size: 24px;">Đặt hàng</a></p>
                <?php
            }
            else
            {
                ?>
                <p><a href="dangnhap.php" style="text-decoration: none;font-size:24px;">Đăng nhập đặt hàng</a></p>
                <?php
            }
        ?>
    </td>
    </tr>
    <?php
    }else
    {
        ?>
        <tr>
            <td colspan="6">Hiện tại giỏ hàng này trống</td>
        </tr>
        <?php
    }
    ?>
    
</table>
<a href="index.php" style="float:left; text-decoration: none;padding-right:5px"><h3>Trở về trang chủ</h3></a>
</div>
<?php
include '../pages/footer.php';
?>
</div>