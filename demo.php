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
    
    <title>Danh sách sản phẩm</title>
</head>
<body>
    <?php require './giaodien/header.php'; ?>
    <?php require './giaodien/categoryspview.php'; ?>

        <!-- ----------------------------------------------category-------------------------------------------------->
    <!--<section class="category">
        <div class="container">
            <div class="category-top row">
                <p>Trang chủ</p> <span>&#8594;</span><p>Nữ</p><span>&#8594;</span><p>Hàng nữ mới về</p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="category-left">
                    <ul>
                        <li class="category-left-li"><a href="#">Nữ</a> 
                            <ul>
                                <li><a href="">Hàng nữ mới về</a></li>
                                <li><a href="">Giày sneaker</a></li>
                                <li><a href="">Giày sandal</a></li>
                                <li><a href="">Giày cao gót</a></li>
                            </ul>
                        </li>
                        <li class="category-left-li"><a href="#">Nam</a> 
                            <ul>
                                <li><a href="">Hàng nữ mới về</a></li>
                                <li><a href="">Giày sneaker</a></li>
                                <li><a href="">Giày sandal</a></li>
                                <li><a href="">Giày cao gót</a></li>
                            </ul>
                        </li>
                        <li class="category-left-li "><a href="#">Trẻ em</a> 
                            <ul>
                                <li><a href="">Hàng nữ mới về</a></li>
                                <li><a href="">Giày sneaker</a></li>
                                <li><a href="">Giày sandal</a></li>
                                <li><a href="">Giày cao gót</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="category-right row">
                    <div class="category-right-top-item">
                        <p>HÀNG NỮ MỚI VỀ</p>
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
                            <li>
                                <div id="index-product-item">
                                    <div class="index-product-item-top">
                                        <a href="product.php" class="index-product-item-thump">
                                            <img src="images/giay/Nu3_1.jpg" alt="">
                                        </a>
                                        <a href="" class="buy-now">Mua ngay</a>
                                    </div>
                                    <div class="index-product-item-info">
                                        <a href="demo.php" class="index-product-item-cat">Trẻ em</a>
                                        <a href="product.php" class="index-product-item-name">SP1aaaaaaaaaaaaaaaaaa</a>
                                        <div class="index-product-item-price">100.000<sup>đ</sup></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div id="index-product-item">
                                    <div class="index-product-item-top">
                                        <a href="" class="index-product-item-thump">
                                            <img src="images/giay/Nu4_1.jpg" alt="">
                                        </a>
                                        <a href="" class="buy-now">Mua ngay</a>
                                    </div>
                                    <div class="index-product-item-info">
                                        <a href="" class="index-product-item-cat">Trẻ em</a>
                                        <a href="" class="index-product-item-name">SP1</a>
                                        <div class="index-product-item-price">100.000<sup>đ</sup></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div id="index-product-item">
                                    <div class="index-product-item-top">
                                        <a href="" class="index-product-item-thump">
                                            <img src="images/giay/Nu5_1.jpg" alt="">
                                        </a>
                                        <a href="" class="buy-now">Mua ngay</a>
                                    </div>
                                    <div class="index-product-item-info">
                                        <a href="" class="index-product-item-cat">Trẻ em</a>
                                        <a href="" class="index-product-item-name">SP1</a>
                                        <div class="index-product-item-price">100.000<sup>đ</sup></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div id="index-product-item">
                                    <div class="index-product-item-top">
                                        <a href="" class="index-product-item-thump">
                                            <img src="images/giay/Nu6_1.jpg" alt="">
                                        </a>
                                        <a href="" class="buy-now">Mua ngay</a>
                                    </div>
                                    <div class="index-product-item-info">
                                        <a href="" class="index-product-item-cat">Trẻ em</a>
                                        <a href="" class="index-product-item-name">SP1</a>
                                        <div class="index-product-item-price">100.000<sup>đ</sup></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div id="index-product-item">
                                    <div class="index-product-item-top">
                                        <a href="" class="index-product-item-thump">
                                            <img src="images/giay/Nu7_1.jpg" alt="">
                                        </a>
                                        <a href="" class="buy-now">Mua ngay</a>
                                    </div>
                                    <div class="index-product-item-info">
                                        <a href="" class="index-product-item-cat">Trẻ em</a>
                                        <a href="" class="index-product-item-name">SP1</a>
                                        <div class="index-product-item-price">100.000<sup>đ</sup></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div id="index-product-item">
                                    <div class="index-product-item-top">
                                        <a href="" class="index-product-item-thump">
                                            <img src="images/giay/Nam2_1.webp" alt="">
                                        </a>
                                        <a href="" class="buy-now">Mua ngay</a>
                                    </div>
                                    <div class="index-product-item-info">
                                        <a href="" class="index-product-item-cat">Trẻ em</a>
                                        <a href="" class="index-product-item-name">SP1</a>
                                        <div class="index-product-item-price">100.000<sup>đ</sup></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div id="index-product-item">
                                    <div class="index-product-item-top">
                                        <a href="" class="index-product-item-thump">
                                            <img src="images/giay/Nam6_1.jpg" alt="">
                                        </a>
                                        <a href="" class="buy-now">Mua ngay</a>
                                    </div>
                                    <div class="index-product-item-info">
                                        <a href="" class="index-product-item-cat">Trẻ em</a>
                                        <a href="" class="index-product-item-name">SP1</a>
                                        <div class="index-product-item-price">100.000<sup>đ</sup></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div id="index-product-item">
                                    <div class="index-product-item-top">
                                        <a href="" class="index-product-item-thump">
                                            <img src="images/giay/Nam12_1.jpg" alt="">
                                        </a>
                                        <a href="" class="buy-now">Mua ngay</a>
                                    </div>
                                    <div class="index-product-item-info">
                                        <a href="" class="index-product-item-cat">Trẻ em</a>
                                        <a href="" class="index-product-item-name">SP1</a>
                                        <div class="index-product-item-price">100.000<sup>đ</sup></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                      <div class="category-right-bottom row">
                        <div class="category-right-bottom-items">
                            <p>Hiển thị 2 <span>|</span> 4 sản phẩm</p>
                        </div>
                        <div class="category-right-bottom-items">
                            <p><span>&#171;</span> 1 2 3 4 5 <span>&#187;</span>Trang cuối</p>
                        </div>
                         </div>
                </div>
                </div>
          
        </div>    
    </section>-->

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