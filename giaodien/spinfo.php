<?php
    $MaSanPham = $_GET['id'];
    $CheckSP_Info_Query = "SELECT * FROM sanpham WHERE MaSanPham = '$MaSanPham'";
    $CheckSP_Info_Result = mysqli_query($con,$CheckSP_Info_Query) or die(mysqli_error($con));
    $rowsanphaminfo = mysqli_fetch_assoc($CheckSP_Info_Result);

    $MaDanhMuc = $rowsanphaminfo['MaDanhMuc'];
    $MaLoaiSP = $rowsanphaminfo['MaLoaiSP'];

    $CheckSP_DM_Query = "SELECT * FROM danhmuc WHERE MaDanhMuc = '$MaDanhMuc'";
    $CheckSP_DM_Result = mysqli_query($con,$CheckSP_DM_Query) or die(mysqli_error($con));
    $rowdanhmuc = mysqli_fetch_assoc($CheckSP_DM_Result);

    $CheckSP_LoaiSP_Query = "SELECT * FROM loaisanpham WHERE MaLoaiSP = '$MaLoaiSP'";
    $CheckSP_LoaiSP_Result = mysqli_query($con,$CheckSP_LoaiSP_Query) or die(mysqli_error($con));
    $rowloaisanpham = mysqli_fetch_assoc($CheckSP_LoaiSP_Result);

    require './model/VN-EN_format_model.php';
?>
<section class="product">
        <div class="container">
            <div class="product-top row">
                <p>Trang chủ</p> <span>&#8594;</span><p><?php echo $rowdanhmuc['TenDanhMuc']; ?></p><span>&#8594;</span><p><?php echo $rowloaisanpham['TenLoaiSP']; ?></p> <span>&#8594;</span><p><?php echo $rowsanphaminfo['TenSanPham']; ?></p>
            </div>
            <div class="product-content row">
                <div class="product-content-left row">
                    <div class="product-content-left-big-img">
                        <img src="images/giay/<?php echo $rowsanphaminfo['AnhSanPham']; ?>">
                    </div>
                    <div class="product-content-left-small-img">
                        <?php if($rowsanphaminfo['AnhMoTa1'] != "") 
                        { 
                            ?>
                            <img src="images/giay/<?php echo $rowsanphaminfo['AnhMoTa1']; ?>">
                            <?php
                        }
                        ?>
                        <?php if($rowsanphaminfo['AnhMoTa2'] != "") 
                        {
                            ?>
                            <img src="images/giay/<?php echo $rowsanphaminfo['AnhMoTa2']; ?>">
                            <?php
                        }
                        ?>
                        <?php if($rowsanphaminfo['AnhMoTa3'] != "") 
                        {
                            ?>
                            <img src="images/giay/<?php echo $rowsanphaminfo['AnhMoTa3']; ?>">
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="product-content-right">
                    <div class="product-content-right-name">
                        <h1><?php echo $rowsanphaminfo['TenSanPham']; ?></h1>
                        <p>MSP: <?php echo vn_to_str($rowdanhmuc['TenDanhMuc']).$rowsanphaminfo['MaSanPham']; ?></p>
                    </div>
                    <div class="product-content-right-price">
                        <p><?php echo $rowsanphaminfo['Gia']; ?><sup>đ</sup></p>
                    </div>
                    <div class="product-content-right-size">
                        <p style="font-weight:bold">Size: <?php echo $rowsanphaminfo['Size']; ?></p>
                    </div>
                    <div class="quantity">
                        <p style="font-weight:bold">Số lượng: </p>
                        <input id="quantity" type="number" min="1" value="1">
                    </div>
                    <div class="product-content-right-button">
                        <button id="addcart"><i class="fas fa-shopping-cart"></i><p>MUA HÀNG</p> </button>
                        <button><p>TÌM TẠI CỬA HÀNG</p></button>
                    </div>
                    <p style="color: red; display: none;" id="addsuccess">Thêm vào giỏ hàng thành công!</p>
                    <div class="product-content-right-icon">
                        <div class="product-content-right-icon-item">
                            <i class="fas fa-phone-alt"></i><p>Hotline</p>
                        </div>
                        <div class="product-content-right-icon-item">
                            <i class="fas fa-comments"></i><p>Chat</p>
                        </div>
                        <div class="product-content-right-icon-item">
                            <i class="fas fa-envelope"></i><p>Mail</p>
                        </div>
                    </div>
                    <div class="product-content-right-QR">
                        <img src="images/qrcode.png" alt="" style="width:60px">
                    </div>
                    <div class="product-content-right-bottom">
                        <div class="product-content-right-bottom-top">
                            &#8744;
                        </div>
                        <div class="product-content-right-bottom-content-big">
                            <div class="product-content-right-bottom-content-title row">
                                <div class="product-content-right-bottom-content-title-item chitiet">
                                    <p>Chi tiết</p>
                                </div>
                                <div class="product-content-right-bottom-content-title-item baoquan">
                                    <p>Bảo quản</p>
                                </div>
                                <div class="product-content-right-bottom-content-title-item">
                                    <p>Tham khảo size</p>
                                </div>
                            </div>
                            <div class="product-content-right-bottom-content">
                                <div class="product-content-right-bottom-content-chitiet">
                                    <?php echo $rowsanphaminfo['MoTaSanPham']; ?> <br></br>
                                </div>
                                <div class="product-content-right-bottom-content-baoquan">
                                    Nên giặt bằng tay<br></br>
                                    Để giày nơi thoáng <br></br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>