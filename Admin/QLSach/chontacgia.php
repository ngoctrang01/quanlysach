<?php
$linkdb=mysqli_connect("localhost","root","","quanlybansach");
$linkdb -> set_charset("utf8");
$listsql="select * from tacgia";
$result=mysqli_query($linkdb,$listsql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_style.css">
    <title>Danh sách tác giả</title>
</head>
<body>
    <h1 style="text-align:center;">Danh sách tác giả</h1>
    <table border=1px >
        <tr>
            <th>Mã tác giả</th>
            <th>Tên tác giả</th>
            <th>Giới tính</th>
            <th>Tiểu sử</th>
            <th>Năm sinh</th>
            <th>Thao tác</th>
        </tr>
        <?php
            while($r=mysqli_fetch_array($result)){
        ?>
                <tr>
                <form method="post" action="tacgia.php?matg=<?php echo $r['MaTG']?>">
                    <td><?php echo $r['MaTG'];?></td>
                    <td><?php echo $r['TenTG'];?></td>
                    <td><?php echo $r['GioiTinh'];?></td>
                    <td><?php echo $r['TieuSu'];?></td>
                    <td><?php echo $r['NamSinh'];?></td>
                    <td>
                    <p><input name="chontg" type="submit" value="Chọn tác giả"></p>
                    </td>
            </form>
            </tr>
                <?php
            }
        ?>
    </table>

</body>
</html>