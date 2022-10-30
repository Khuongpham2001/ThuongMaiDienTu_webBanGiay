<?php
    require './connectdb/connect.php';
    $con = ketnoi();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale-1.0">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Trang chủ</title>
</head>
<body>
    <?php require './giaodien/header.php'; ?>
    <section id="Slider">
        <div class="aspect-ratio-169">               
            <img src="images/img1.jpg" alt="" >
            <img src="images/img2.jpg" alt="" >
            <img src="images/img3.png" alt="" >
            <!-- <img src="images/img1.jpg" alt="" > -->
            <!-- <img src="images/img1.jpg" alt="" >  -->
        </div>
        <div class="dot-container">
            <div class="dot active"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </section>
        <!--------------------------Sp mới  --------------------------------------->
<div id="wrapper2">
    <div class="headline2">
        <h3>Sản phẩm mới</h3>
    </div>
    <ul class="index-products row">
        <?php
            $NewSp_Query = "SELECT * FROM sanpham ORDER BY MaSanPham DESC LIMIT 8";
            $NewSp_Result = mysqli_query($con,$NewSp_Query) or die(mysqli_error($con));
            while ($rownewsp = mysqli_fetch_assoc($NewSp_Result))
            {
                $FindDMSP_Query = "SELECT * FROM danhmuc WHERE MaDanhMuc = '$rownewsp[MaDanhMuc]'";
                $FindDMSP_Result = mysqli_query($con,$FindDMSP_Query) or die(mysqli_error($con));
                $rowdmsp = mysqli_fetch_assoc($FindDMSP_Result);
                ?>
                <li>
                    <div id="index-product-item">
                        <div class="index-product-item-top">
                            <a href="product.php?id=<?php echo $rownewsp['MaSanPham']; ?>" class="index-product-item-thump">
                                <img style="max-width: 262.5px; max-height:262.5px" src="images/giay/<?php echo $rownewsp['AnhSanPham']; ?>" alt="">
                            </a>
                            <a href="product.php?id=<?php echo $rownewsp['MaSanPham']; ?>" class="buy-now">Mua ngay</a>
                        </div>
                        <div class="index-product-item-info">
                            <a href="demo.php?MaDM=<?php echo $rownewsp['MaDanhMuc']; ?>" class="index-product-item-cat"><?php echo $rowdmsp['TenDanhMuc']; ?></a>
                            <a href="product.php?id=<?php echo $rownewsp['MaSanPham']; ?>" class="index-product-item-name"><?php echo $rownewsp['TenSanPham']; ?></a>
                            <div class="index-product-item-price"><?php echo $rownewsp['Gia']; ?><sup>đ</sup></div>
                        </div>
                    </div>
                </li>
            <?php
            }
        ?>       
    </ul>
</div>
     <!---------------------------------------------- SP bán chạy ------------------------------------------------>
        <div id="wrapper">
            <div class="headline">
                <h3>Sản phẩm bán chạy</h3>
            </div>
            <ul class="index-products row">
                <?php
                    $NewSp_Query = "SELECT * FROM sanpham ORDER BY MaSanPham DESC LIMIT 8";
                    $NewSp_Result = mysqli_query($con,$NewSp_Query) or die(mysqli_error($con));
                    while ($rownewsp = mysqli_fetch_assoc($NewSp_Result))
                    {
                        $FindDMSP_Query = "SELECT * FROM danhmuc WHERE MaDanhMuc = '$rownewsp[MaDanhMuc]'";
                        $FindDMSP_Result = mysqli_query($con,$FindDMSP_Query) or die(mysqli_error($con));
                        $rowdmsp = mysqli_fetch_assoc($FindDMSP_Result);
                        ?>
                        <li>
                            <div id="index-product-item">
                                <div class="index-product-item-top">
                                    <a href="product.php?id=<?php echo $rownewsp['MaSanPham']; ?>" class="index-product-item-thump">
                                        <img style="max-width: 262.5px; max-height:262.5px" src="images/giay/<?php echo $rownewsp['AnhSanPham']; ?>" alt="">
                                    </a>
                                    <a href="product.php?id=<?php echo $rownewsp['MaSanPham']; ?>" class="buy-now">Mua ngay</a>
                                </div>
                                <div class="index-product-item-info">
                                    <a href="demo.php?MaDM=<?php echo $rownewsp['MaDanhMuc']; ?>" class="index-product-item-cat"><?php echo $rowdmsp['TenDanhMuc']; ?></a>
                                    <a href="product.php?id=<?php echo $rownewsp['MaSanPham']; ?>" class="index-product-item-name"><?php echo $rownewsp['TenSanPham']; ?></a>
                                    <div class="index-product-item-price"><?php echo $rownewsp['Gia']; ?><sup>đ</sup></div>
                                </div>
                            </div>
                        </li>
                    <?php
                    }
            ?>
    </ul>
        </div>


    


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