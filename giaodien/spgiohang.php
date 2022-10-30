<?php
    $MaTK = $_SESSION['id'];
    $FullMoney = 0;

    $Show_Query = "SELECT * FROM giohang WHERE MaTK = '$MaTK' AND TrangThai = 'Thêm'";
    $Show_Result = mysqli_query($con,$Show_Query) or die(mysqli_error($con));
    if (mysqli_num_rows($Show_Result) != 0)
    {
        $id_flag = 1;
        while ($rowcartitem = mysqli_fetch_assoc($Show_Result))
        {
            $MaSanPham = $rowcartitem['MaSanPham'];
            $Show_SP_Query = "SELECT * FROM sanpham WHERE MaSanPham = '$MaSanPham'";
            $Show_SP_Result = mysqli_query($con,$Show_SP_Query) or die(mysqli_error($con));
            $rowsp = mysqli_fetch_assoc($Show_SP_Result);
            $ThanhTien = $rowcartitem['Soluongmua'] * $rowsp['Gia'];
            $FullMoney += $ThanhTien;
            ?>
            <tr>
                <td><a href="product.php?id=<?php echo $rowcartitem['MaSanPham']; ?>"><img src="images/giay/<?php echo $rowsp['AnhSanPham']; ?>"></a></td>
                <td><p><input type="hidden" name="spname[]" value="<?php echo $rowcartitem['MaSanPham']; ?>"><?php echo $rowsp['TenSanPham']; ?></p></td>
                <td><p><?php echo $rowsp['Size']; ?></p></td>
                <td><input name="QT<?php echo $id_flag; ?>" id="QT<?php echo $id_flag; ?>" type="number" value="<?php echo $rowcartitem['Soluongmua']; ?>" min="1" onchange="thaydoisoluong(this.id,'GH<?php echo $id_flag; ?>','<?php echo $rowcartitem['MaSanPham']; ?>')"></td>
                <td><p id="GH<?php echo $id_flag; ?>"><?php echo $ThanhTien; ?></p></td>
                <td><a href="./model/delete_model.php?place=GH&&id=<?php echo $rowcartitem['MaGioHang'];?>">X</a></td>
            </tr>
            <?php
            $id_flag++;
        }
    }
?>