<?php
    $MaDanhMuc = $_GET['MaDM'];
    $MaLoaiSP = $_GET['MaLoai'];

    $ViewDM = mysqli_query($con,"SELECT * FROM danhmuc WHERE MaDanhMuc = '$MaDanhMuc'") or die(mysqli_error($con));
    $rowdm = mysqli_fetch_assoc($ViewDM);

    if($MaLoaiSP != 0)
    {
        $ViewLoaiSP = mysqli_query($con,"SELECT * FROM loaisanpham WHERE MaLoaiSP = '$MaLoaiSP'") or die(mysqli_error($con));
        $rowlsp = mysqli_fetch_assoc($ViewLoaiSP);
    }

?>
<section class="category">
    <div class="container">
        <div class="category-top row">
            <p>Trang chủ</p> <span>&#8594;</span><p><?php echo $rowdm['TenDanhMuc']; ?></p><?php if($MaLoaiSP != 0) { ?><span>&#8594;</span><p><?php echo $rowlsp['TenLoaiSP']; ?></p><?php } ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="category-left">
                <ul>
                <?php
                    $ViewDM_Query = "SELECT * FROM danhmuc";
                    $ViewDM_Result = mysqli_query($con,$ViewDM_Query) or die(mysqli_error($con));
                    while ($rowdanhmuc = mysqli_fetch_assoc($ViewDM_Result))
                    {
                        ?>
                        <li class="category-left-li"><a><?php echo $rowdanhmuc['TenDanhMuc']; ?></a> 
                        <?php
                        $MaDanhMuc02 = $rowdanhmuc['MaDanhMuc'];
                        $FindLoaiSP_TheoDM_Query = "SELECT * FROM loaisanpham WHERE MaDanhMuc = '$MaDanhMuc02'";
                        $FindLoaiSP_TheoDM_Result = mysqli_query($con,$FindLoaiSP_TheoDM_Query) or die(mysqli_error($con));
                        if (mysqli_num_rows($FindLoaiSP_TheoDM_Result) != 0)
                        {
                            ?>
                            <ul>
                            <?php
                            while ($rowloaidmsp = mysqli_fetch_assoc($FindLoaiSP_TheoDM_Result))
                            {
                                ?>
                                <li><a href="demo.php?MaDM=<?php echo $rowdanhmuc['MaDanhMuc']; ?>&&MaLoai=<?php echo $rowloaidmsp['MaLoaiSP']; ?>"><?php echo $rowloaidmsp['TenLoaiSP']; ?></a></li>
                                <?php
                            }
                            ?>
                            </ul>
                            <?php
                        }
                        ?>
                        </li>
                        <?php
                    }
                ?>                                              
                </ul>
            </div>
            <div class="category-right row">
                <div class="category-right-top-item">
                    <p><?php if($MaLoaiSP != 0) echo $rowlsp['TenLoaiSP']; else echo $rowdm["TenDanhMuc"]; ?></p>
                </div>
                <div class="category-right-top-item">
                    <button><span>Bộ lọc</span><i class="fas fa-sort-down"></i></button>
                </div>
                <div class="category-right-top-item">
                    <select name="" id="">
                        <option value="">Sắp xếp</option>
                        <option value="">Giá cao đến thấp</option>
                        <option value="">Giá thấp đến cao</option>
                    </select>
                </div>
                <div id="wrapper">
                    <ul class="index-products row">
                        <?php
                            if($MaLoaiSP == 0)
                            {
                                $FindSP_TheoDM_Query = "SELECT * FROM sanpham WHERE MaDanhMuc = '$MaDanhMuc'";
                                $FindSP_TheoDM_Result = mysqli_query($con,$FindSP_TheoDM_Query) or die(mysqli_error($con));
                                while ($rowfindsp = mysqli_fetch_assoc($FindSP_TheoDM_Result))
                                {
                                    ?>
                                    <li>
                                        <div id="index-product-item">
                                            <div class="index-product-item-top">
                                                <a href="product.php?id=<?php echo $rowfindsp['MaSanPham']; ?>" class="index-product-item-thump">
                                                    <img style="max-width: 210px; max-height:210px" src="images/giay/<?php echo $rowfindsp['AnhSanPham']; ?>" alt="">
                                                </a>
                                                <a href="product.php?id=<?php echo $rowfindsp['MaSanPham']; ?>" class="buy-now">Mua ngay</a>
                                            </div>
                                            <div class="index-product-item-info">
                                                <a href="demo.php?MaDM=<?php echo $rowfindsp['MaDanhMuc']; ?>" class="index-product-item-cat"><?php echo $rowdm['TenDanhMuc']; ?></a>
                                                <a href="product.php?id=<?php echo $rowfindsp['MaSanPham']; ?>" class="index-product-item-name"><?php echo $rowfindsp['TenSanPham']; ?></a>
                                                <div class="index-product-item-price"><?php echo $rowfindsp['Gia']; ?><sup>đ</sup></div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                }
                            }
                            else 
                            {
                                $FindSP_TheoDM_LoaiSP_Query = "SELECT * FROM sanpham WHERE MaDanhMuc = '$MaDanhMuc' AND MaLoaiSP = '$MaLoaiSP'";
                                $FindSP_TheoDM_LoaiSP_Result = mysqli_query($con,$FindSP_TheoDM_LoaiSP_Query) or die(mysqli_error($con));
                                while ($rowfindsp = mysqli_fetch_assoc($FindSP_TheoDM_LoaiSP_Result))
                                {
                                    ?>
                                    <li>
                                        <div id="index-product-item">
                                            <div class="index-product-item-top">
                                                <a href="product.php?id=<?php echo $rowfindsp['MaSanPham']; ?>" class="index-product-item-thump">
                                                    <img style="max-width: 210px; max-height:210px" src="images/giay/<?php echo $rowfindsp['AnhSanPham']; ?>" alt="">
                                                </a>
                                                <a href="product.php?id=<?php echo $rowfindsp['MaSanPham']; ?>" class="buy-now">Mua ngay</a>
                                            </div>
                                            <div class="index-product-item-info">
                                                <a href="demo.php?MaDM=<?php echo $rowfindsp['MaDanhMuc']; ?>" class="index-product-item-cat"><?php echo $rowdm['TenDanhMuc']; ?></a>
                                                <a href="product.php?id=<?php echo $rowfindsp['MaSanPham']; ?>" class="index-product-item-name"><?php echo $rowfindsp['TenSanPham']; ?></a>
                                                <div class="index-product-item-price"><?php echo $rowfindsp['Gia']; ?><sup>đ</sup></div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                }
                            }
                        ?>                        
                    </ul>
                </div>

                <!--<div class="category-right-bottom row">
                    <div class="category-right-bottom-items">
                        <p>Hiển thị 2 <span>|</span> 4 sản phẩm</p>
                    </div>
                    <div class="category-right-bottom-items">
                        <p><span>&#171;</span> 1 2 3 4 5 <span>&#187;</span>Trang cuối</p>
                    </div>
                </div>-->
            </div>
        </div>          
    </div>    
    </section>