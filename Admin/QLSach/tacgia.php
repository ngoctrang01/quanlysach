<?php
session_start();
include '../model/connectdb.php';
if(isset($_POST['chontg']))
{
    $ma=$_GET['matg'];
    $sql="SELECT * FROM tacgia where MaTG='$ma'LIMIT 1";
    $query=mysqli_query($mysqli,$sql);
    $row=mysqli_fetch_array($query);
    if($row){
        $new_product=array(array('tentacgia'=>$row['TenTG'],'matg'=>$row['MaTG']));
        if(isset($_SESSION['chon']))
        {
            $found=false;
            foreach($_SESSION['chon'] as $cart_item)
            {
                if($cart_item['matg'] ==$ma)
                {
                    $product[] = array('tentacgia'=>$cart_item['tentacgia'],'matg'=>$cart_item['matg']);
                    $found=true;
                }
                else
                {
                    $product[] = array('tentacgia'=>$cart_item['tentacgia'],'matg'=>$cart_item['matg']);
                }
            }
            if($found == false)
            {
                $_SESSION['chon']=array_merge($product,$new_product);
            }
            else
            {
                $_SESSION['chon']=$product;
            }
        }
        else{
            $_SESSION['chon']=$new_product;
        }
       
    }
}
//unset($_SESSION['chon']);
echo var_dump($_SESSION['chon']);
?>
<p><a href="../QLSach/themsach.php" style="text-decoration: none;font-size: 24px;">Thêm vào sách</a></p>