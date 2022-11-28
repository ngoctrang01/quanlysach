<?php
$mysqli = new mysqli("localhost","root","","quanlybansach");
$mysqli-> set_charset("utf8");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
$sql_danhmuc="SELECT * FROM theloai";
$sql_danhmuc=mysqli_query($mysqli,$sql_danhmuc);
?>
<div class="sidebar">
                <ul class="list_sidebar">
                <?php
                    while($row=mysqli_fetch_array($sql_danhmuc)){
                    ?>
                        <li><a href="./main/danhmuc.php?maloai=<?php echo $row['MaLoai']?>"><?php echo $row['TenLoai']?></a></li>
                        <?php
                    }
                ?>
</div>