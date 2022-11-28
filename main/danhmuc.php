<?php
$mysqli=mysqli_connect("localhost","root","","quanlybansach");
$mysqli -> set_charset("utf8");
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }
$sql_muc="SELECT * FROM theloai join sach on theloai.MaLoai=sach.MaLoai where sach.MaLoai='$_GET[maloai]'";
$query=mysqli_query($mysqli,$sql_muc);

?>
<head>
    <link rel="stylesheet" href="../css/style.css">
</head>
    <div class="wrapper">
    <div class="header">
           <img src="../pages/images/logo.png" width=100% height="130px">
       </div>
        <?php  
            include "../pages/menu.php";
        ?> 
<div class="content">
                <?php
                if($row_dm=mysqli_fetch_array($query)){
                    ?>
            <h3>Sản phẩm: <?php echo $row_dm['TenLoai']?></h3>
            <ul class="product_list">
                <li>
                <a href="sanpham.php?masach=<?php echo $row_dm['MaSach']?>">
                    <img src="../Admin/QLSach/uploads/<?php echo $row_dm['HinhAnh']?>">
                    <p class="title_product">Tên sách:<?php echo $row_dm['TenSach'] ?></p>
                    <p class="price_product">Giá:<?php echo number_format($row_dm['Gia'],0,',','.').' vnđ' ?></p>
                    </a>
                </li>
            </ul>
            <?php
                }
                else
                {
                    echo '<div style="height:480px;"><h3>Hiện tại không có sản phẩm<h3></div>';
                }
                ?>
            
        </div>
        <div class="clear"></div>
        <a href="index.php" style="float:left; text-decoration: none;padding-right:5px"><h3>Trở về trang chủ</h3></a>
        <?php
            include "../pages/footer.php";
        ?>
</div>