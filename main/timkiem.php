<?php
include '../Admin/model/connectdb.php';
if(isset($_POST['timkiem']))
{
    $tukhoa=$_POST['tukhoa'];
}
$sql_pro="SELECT * FROM sach Where TenSach like '%".$tukhoa."%'";
$query=mysqli_query($mysqli,$sql_pro);
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
                while($row=mysqli_fetch_array($query)){
                    ?>
            <h3>Từ khóa tìm kiếm: <?php echo $_POST['tukhoa'] ?></h3>
            <ul class="product_list">
                <li>
                <a href="sanpham.php?masach=<?php echo $row['MaSach']?>">
                    <img src="../Admin/QLSach/uploads/<?php echo $row['HinhAnh']?>">
                    <p class="title_product">Tên sách:<?php echo $row['TenSach'] ?></p>
                    <p class="price_product">Giá:<?php echo number_format($row['Gia'],0,',','.').' vnđ' ?></p>
                    </a>
                </li>
            </ul>
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
