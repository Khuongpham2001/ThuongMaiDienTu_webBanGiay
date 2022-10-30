<div id="wrapper">
    <div class="headline">
        <h3>Sản phẩm liên quan</h3>
    </div>
    <ul class="index-products row">
        <?php
            $Relative_SP_Query = "SELECT * FROM sanpham WHERE MaDanhMuc = '$MaDanhMuc' LIMIT 4";
            $Relative_SP_Result = mysqli_query($con,$Relative_SP_Query) or die(mysqli_error($con));
            if (mysqli_num_rows($Relative_SP_Result) == 4)
            {
                while ($rowsplienquan = mysqli_fetch_assoc($Relative_SP_Result))
                {
                    ?>
                    <li>
                        <div id="index-product-item">
                            <div class="index-product-item-top">
                                <a href="product.php?id=<?php echo $rowsplienquan['MaSanPham']; ?>" class="index-product-item-thump">
                                    <img style="max-width: 262.5px; max-height:262.5px" src="images/giay/<?php echo $rowsplienquan['AnhSanPham'] ?>" alt="">
                                </a>
                                <a href="product.php?id=<?php echo $rowsplienquan['MaSanPham']; ?>" class="buy-now">Mua ngay</a>
                            </div>
                            <div class="index-product-item-info">
                                <a href="demo.php?MaDM=<?php echo $MaDanhMuc; ?>" class="index-product-item-cat"><?php echo $rowdanhmuc['TenDanhMuc']; ?></a>
                                <a href="product.php?id=<?php echo $rowsplienquan['MaSanPham']; ?>" class="index-product-item-name"><?php echo $rowsplienquan['TenSanPham']; ?></a>
                                <div class="index-product-item-price"><?php echo $rowsplienquan['Gia']; ?><sup>đ</sup></div>
                            </div>
                        </div>
                    </li>
                    <?php
                }
            }
            else 
            {
                $Find_AllSP_Query = "SELECT * FROM sanpham ORDER BY RAND() LIMIT 4";
                $Find_AllSP_Result = mysqli_query($con,$Find_AllSP_Query) or die(mysqli_error($con));
                while ($rowsplienquan = mysqli_fetch_assoc($Find_AllSP_Result))
                {
                    ?>
                    <li>
                        <div id="index-product-item">
                            <div class="index-product-item-top">
                                <a href="product.php?id=<?php echo $rowsplienquan['MaSanPham']; ?>" class="index-product-item-thump">
                                    <img style="max-width: 262.5px; max-height:262.5px" src="images/giay/<?php echo $rowsplienquan['AnhSanPham'] ?>" alt="">
                                </a>
                                <a href="product.php?id=<?php echo $rowsplienquan['MaSanPham']; ?>" class="buy-now">Mua ngay</a>
                            </div>
                            <div class="index-product-item-info">
                                <a href="demo.php?MaDM=<?php echo $MaDanhMuc; ?>" class="index-product-item-cat"><?php echo $rowdanhmuc['TenDanhMuc']; ?></a>
                                <a href="product.php?id=<?php echo $rowsplienquan['MaSanPham']; ?>" class="index-product-item-name"><?php echo $rowsplienquan['TenSanPham']; ?></a>
                                <div class="index-product-item-price"><?php echo $rowsplienquan['Gia']; ?><sup>đ</sup></div>
                            </div>
                        </div>
                    </li>
                    <?php
                }
            }
        ?>     
    </ul>
</div>