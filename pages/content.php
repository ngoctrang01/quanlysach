
<?php
$mysqli = new mysqli("localhost","root","","quanlybansach");
$mysqli-> set_charset("utf8");
$sql="SELECT * FROM sach ";
$query=mysqli_query($mysqli,$sql);
?>
<head>
    <link rel="stylesheet" href="../css/style.css">
</head>
        <div class="content">
        <h3 style="padding-top:10px;">Tất cả sản phẩm</h3>
                <?php
                while($row=mysqli_fetch_array($query)){
                    ?>
            <ul class="product_list">
                <li>
                    <img src="Admin/QLSach/uploads/<?php echo $row['HinhAnh']?>">
                    <p class="title_product">Tên sách:<?php echo $row['TenSach'] ?></p>
                    <p class="price_product">Giá:<?php echo number_format($row['Gia'],0,',','.').' vnđ' ?></p>
                    </a>
                </li>
            </ul>
            <?php
            }
            ?>
            
        </div>