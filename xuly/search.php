<?php
    require '../connectdb/connect.php';
    $con = ketnoi();
    $TenSanPham = mysqli_real_escape_string($con,$_POST['TenSanPham']);
    if($TenSanPham == "")
    {
        ?>

        <?php
    }
    else
    {
        $Query = "SELECT * FROM sanpham WHERE TenSanPham = '$TenSanPham'";
        $Result = mysqli_query($con,$Query) or die(mysqli_error($con));
        $counter = mysqli_num_rows($Result);
        if($counter == 0)
        {
            ?>
            <a style="color: blue;">No item found</a>
            <?php
        }
        else
        {
            $kq = mysqli_fetch_assoc($Result);
            ?>
            <a style="color: blue;" href="product.php?id=<?php echo $kq['MaSanPham']; ?>"><?php echo $kq['TenSanPham']; ?></a>
            <?php
        }
    }
?>
