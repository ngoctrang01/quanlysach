<?php
session_start();
include '../Admin/model/connectdb.php';
if(isset($_GET['cong']))
{
    $id=$_GET['cong'];
    foreach($_SESSION['cart'] as $cart_item)
    {
        if($cart_item['masach']!=$id)
        {
        $product[] = array('tensanpham'=>$cart_item['tensanpham'],'masach'=>$cart_item['masach'],'hinhanh'
        =>$cart_item['hinhanh'],'gia'=>$cart_item['gia'],'soluong'=>$cart_item['soluong']);
        }
        else
        {
            $tangsl=$cart_item['soluong']+1;
            $product[] = array('tensanpham'=>$cart_item['tensanpham'],'masach'=>$cart_item['masach'],'hinhanh'
            =>$cart_item['hinhanh'],'gia'=>$cart_item['gia'],'soluong'=>$tangsl);
            }
            $_SESSION['cart']=$product;
        }
        header('Location:giohang.php');
    }
    if(isset($_GET['tru']))
    {
    $id=$_GET['tru'];
    foreach($_SESSION['cart'] as $cart_item)
    {
        if($cart_item['masach']!=$id)
        {
        $product[] = array('tensanpham'=>$cart_item['tensanpham'],'masach'=>$cart_item['masach'],'hinhanh'
        =>$cart_item['hinhanh'],'gia'=>$cart_item['gia'],'soluong'=>$cart_item['soluong']);
        }
        else
        {
            $giamsl=$cart_item['soluong']-1;
            $product[] = array('tensanpham'=>$cart_item['tensanpham'],'masach'=>$cart_item['masach'],'hinhanh'
            =>$cart_item['hinhanh'],'gia'=>$cart_item['gia'],'soluong'=>$giamsl);
            }
            $_SESSION['cart']=$product;
        }
        header('Location:giohang.php');
    }
if(isset($_GET['xoa']))
{
    $id=$_GET['xoa'];
    foreach($_SESSION['cart'] as $cart_item)
    {
        if($cart_item['masach']!=$id)
        {
        $product[] = array('tensanpham'=>$cart_item['tensanpham'],'masach'=>$cart_item['masach'],'hinhanh'
        =>$cart_item['hinhanh'],'gia'=>$cart_item['gia'],'soluong'=>$cart_item['soluong']);
        }
        $_SESSION['cart']=$product;
        header('Location:giohang.php');
    }
}
if(isset($_POST['themgiohang']))
{
    $ma=$_GET['masach'];
    $soluong=1;
    $sql="SELECT * FROM sach where MaSach='$ma'LIMIT 1";
    $query=mysqli_query($mysqli,$sql);
    $row=mysqli_fetch_array($query);
    if($row){
        $new_product=array(array('tensanpham'=>$row['TenSach'],'masach'=>$ma,'hinhanh'
        =>$row['HinhAnh'],'gia'=>$row['Gia'],'soluong'=>$soluong));
        if(isset($_SESSION['cart']))
        {
            $found=false;
            foreach($_SESSION['cart'] as $cart_item)
            {
                if($cart_item['masach'] ==$ma)
                {
                $product[] = array('tensanpham'=>$cart_item['tensanpham'],'masach'=>$cart_item['masach'],'hinhanh'
                =>$cart_item['hinhanh'],'gia'=>$cart_item['gia'],'soluong'=>$soluong+1);
                $found=true;
                }
                else{
                $product[]= array('tensanpham'=>$cart_item['tensanpham'],'masach'=>$cart_item['masach'],'hinhanh'
                =>$cart_item['hinhanh'],'gia'=>$cart_item['gia'],'soluong'=>$cart_item['soluong']);
                }
            }
            if($found == false)
            {
                $_SESSION['cart']=array_merge($product,$new_product);
            }
            else
            {
                $_SESSION['cart']=$product;
            }
        }
        else{
            $_SESSION['cart']=$new_product;
        }
       
    }
   header('Location:giohang.php');
}
?>