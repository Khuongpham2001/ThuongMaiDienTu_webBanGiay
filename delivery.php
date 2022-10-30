<?php
    require './connectdb/connect.php';
    $con = ketnoi();
    session_start();
    if(isset($_SESSION['id']) == false) {
        ?>
        <script>
            alert("Bạn chưa đăng nhập");
            document.location = './login.php';
        </script>
        <?php
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale-1.0">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Giao hàng</title>
</head>
<body>
    <?php require './giaodien/header.php'; ?>
  
      <!-- ---------------------------------------------Delivery------------------------------------------------>
      <section class="delivery">
          <div class="container">
            <div class="delivery-top-wrap">
                <div class="delivery-top">
                    <div class="delivery-top-delivery delivery-top-item">
                        <i class="fas fa-shopping-cart "></i>
                    </div>
                    <div class="delivery-top-address delivery-top-item">
                        <i class="fas fa-map-marker-alt "></i>
                    </div>
                    <div class="delivery-top-payment delivery-top-item">
                        <i class="fas fa-money-check-alt "></i>
                    </div>
                </div>
              </div>
          </div>
          <div class="container">
              <div class="delivery-content row">
                  <div class="delivery-content-left">
                    <p>Vui lòng chọn địa chỉ giao hàng</p>
                    <div class="delivery-content-left-dangnhap row">
                        <i class="fas fa-sign-in-alt"></i>
                        <p>Đăng nhập (Nếu bạn đã có tài khoản của HShoes)</p>
                    </div>
                    <div class="delivery-content-left-khachle row">
                        <input checked name="loaikhach" type="radio" >
                        <p><span style="font-weight: bold">Khách lẻ </span>(Nếu bạn không muốn lưu lại thông tin)</p>
                    </div>
                    <div class="delivery-content-left-dangky row">
                        <input name="loaikhach" type="radio" >
                        <p><span style="font-weight: bold">Đăng ký </span>(Tạo mới tài khoản với thông tin bên dưới)</p>
                    </div>
                    <form name="GiaoHang" action="./xuly/xulygiaohang.php" method="post">
                        <div class="delivery-content-left-input-top row">
                            <div class="delivery-content-left-input-top-item">
                                <label for="">Họ tên <span style="color:red">*</span></label>
                                <input name="HoTen" type="text" required>
                            </div>
                            <div class="delivery-content-left-input-top-item">
                                <label for="">Điện thoại <span style="color:red">*</span></label>
                                <input name="DienThoai" type="text" required>
                            </div>
                            <div class="delivery-content-left-input-top-item">
                                <label for="">Tỉnh/Tp <span style="color:red">*</span></label>
                                <input name="ThanhPho" type="text" required>
                            </div>
                            <div class="delivery-content-left-input-top-item">
                                <label for="">Quận/Huyện <span style="color:red">*</span></label>
                                <input name="Quan" type="text" required>
                            </div>
                        </div>
                        <div class="delivery-content-left-input-bottom">
                            <label for="">Địa chỉ <span style="color:red">*</span></label>
                            <input name="DiaChi" type="text">
                        </div>
                        <div class="delivery-content-left-button row">
                            <a href="cart.php"><span>&#171;</span><p>Quay lại giỏ hàng</p></a>
                            <button name="submit" type="submit"><a onclick="document.forms['GiaoHang'].submit();">THANH TOÁN VÀ GIAO HÀNG</a></button>
                        </div>
                    </div>
                    </form>
                    <div class="delivery-content-right">
                        <table>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Giảm giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                            <?php 
                                $_SESSION['TotalNum'] = 0;
                                $User_id = $_SESSION['id'];                                
                                $Find_ProductGG_Query = "SELECT MaSanPham , Soluongmua FROM giohang WHERE MaTK = '$User_id' AND TrangThai = 'Thêm'";
                                $Find_ProductGG_Result = mysqli_query($con,$Find_ProductGG_Query) or die(mysqli_error($con));
                                while ($rowspgiohang = mysqli_fetch_assoc($Find_ProductGG_Result))
                                {
                                    $MaSP = $rowspgiohang['MaSanPham'];
                                    $Find_SP_infor_Query = "SELECT * FROM sanpham WHERE MaSanPham = '$MaSP'";
                                    $Find_SP_infor_Result = mysqli_query($con,$Find_SP_infor_Query) or die(mysqli_error($con));
                                    $rowspkho = mysqli_fetch_assoc($Find_SP_infor_Result);
                                    $KhuyenMai = $rowspkho['MaKhuyenMai'];
                                    if ($KhuyenMai != NULL)
                                    {
                                        $Find_KMSP_Query = "SELECT * FROM khuyenmai WHERE MaKhuyenMai = '$KhuyenMai'";
                                        $Find_KMSP_Result = mysqli_query($con,$Find_KMSP_Query) or die(mysqli_error($con));
                                        $rowkm = mysqli_fetch_assoc($Find_KMSP_Result);
                                        $GiaKM = $rowkm['PhanTramKM'];
                                        $ThanhTien = ($rowspkho['Gia'] - ($rowspkho['Gia'] * ($GiaKM/100)))*$rowspgiohang['Soluongmua'];
                                        ?>
                                        <tr>
                                            <td><?php echo $rowspkho['TenSanPham']; ?></td>
                                            <td><?php echo "-".$GiaKM."%"; ?></td>
                                            <td><?php echo $rowspgiohang['Soluongmua']; ?></td>
                                            <td><p><?php echo $ThanhTien; ?> <sup>đ</sup></p></td>
                                        </tr>
                                        <?php
                                        $_SESSION['TotalNum'] += $ThanhTien;
                                    }
                                    else 
                                    {
                                        $GiaKM = 0;
                                        $ThanhTien = $rowspkho['Gia'] * $rowspgiohang['Soluongmua'];
                                        ?>
                                        <tr>
                                            <td><?php echo $rowspkho['TenSanPham']; ?></td>
                                            <td><?php echo "-".$GiaKM."%"; ?></td>
                                            <td><?php echo $rowspgiohang['Soluongmua']; ?></td>
                                            <td><p><?php echo $ThanhTien; ?> <sup>đ</sup></p></td>
                                        </tr>
                                        <?php
                                        $_SESSION['TotalNum'] += $ThanhTien;
                                    }
                                }
                                $VAT = $_SESSION['TotalNum'] * 10/100;
                                $Final_Price = $_SESSION['TotalNum'] - $VAT;
                            ?>
                            <tr>
                                <td style="font-weight:bold;" colspan="3">Tổng</td>
                                <td style="font-weight:bold;" ><p><?php echo $_SESSION['TotalNum']; ?><sup>đ</sup></p></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;" colspan="3">Thuế VAT</td>
                                <td style="font-weight:bold;" ><p><?php echo $VAT; ?><sup>đ</sup></p></td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;" colspan="3">Tổng tiền hàng</td>
                                <td style="font-weight:bold;" ><p><?php echo $Final_Price; ?><sup>đ</sup></p></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </section>




     <!-- ----------------------------------------------app-container------------------------------------------------>
        <section class="app-container">
            <p>Tải ứng dụng HShoes</p>
            <div class="app-google">
                <img src="images/appstore.jpg">
                <img src="images/googleplay.jpg">
            </div>
            <p>Nhận bản tin HShoes</p>
            <input type="text" placeholder="Nhập email của bạn...">
        </section>


       <!-- -----------------------------------------------footer--------------------------------------------------- -->
       <footer>
       <div class="footer-top">
            <li><a href=""> <img src ="images/dathongbao.png"></a></li>
            <li><a href="">Liên hệ</a></li>
            <li><a href="">Tuyển dụng</a></li>
            <li><a href="">Giới thiệu</a></li>
            <li>
                <a href="" class="fab fa-facebook-f"></i></a>
                <a href="" class="fab fa-twitter"></a>
                <a href="" class="fab fa-youtube"></a>
            </li>
        </div>
     <div class="footer-center"> <p>  Công ty Cổ phần Dự Kim với số đăng ký kinh doanh: 0105777650 <br>
        Địa chỉ đăng ký: Tổ dân phố Tháp, P.Đại Mỗ, Q.Nam Từ Liêm, TP.Hà Nội, Việt Nam - 0243 205 2222 <br>
        Đặt hàng online : <b>0246 662 3434</b> 
        </p></div>
<div class ="footer-bottom">
    ©Ivymoda All rights reserved
</div>
</footer>
    </body>
    <script>

        const header=document.querySelector("header")
        window.addEventListener("scroll",function(){
            // x=window.pageYOffset;   //(const x= this.pageYOffset;)
            const x= this.pageYOffset;    
            if(x>1){
                header.classList.add("sticky")
            }
            else{
                header.classList.remove("sticky")
            }
        })

        const imgPosition =document.querySelectorAll(".aspect-ratio-169 img")
        const imgContainer=document.querySelector('.aspect-ratio-169')
        const dotItem=document.querySelectorAll(".dot")
   
        let imgNuber=imgPosition.length
        let index=0
      //  console.log(imgPosition)
    
      imgPosition.forEach(function(image,index){
       image.style.left=index*100 + "%"         //gắn hình
        dotItem[index].addEventListener("click",function(){         //click vô chấm đen qua slide
            slider (index)
        })

      })
      function imgSlide(){
          index++;
          console.log(index)                    
          if(index >=imgNuber){index=0}            // bth thì 5s slide tự qua
          slider (index)                           // lùi slide code ở dưới 
      }
      function slider(index){
        imgContainer.style.left="-" +index*100+"%"  
        const dotActive=document.querySelector('.active')  
        dotActive.classList.remove("active")
        dotItem[index].classList.add("active")     // chạy dot đều 
      }
      setInterval(imgSlide,5000)


    </script>
        <script>
            // --------------------------------------------Category--------------------------------------------
            const itemslidebar= document.querySelectorAll(".category-left-li")
            itemslidebar.forEach(function(menu,index){
                menu.addEventListener("click",function(){
                    menu.classList.toggle("block")
                })
            })
                </script>
</html>