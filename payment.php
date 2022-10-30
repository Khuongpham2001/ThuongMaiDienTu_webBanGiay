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
    <title>Thanh toán</title>
</head>
<body>
    <?php require './giaodien/header.php'; ?>



        <!-- ---------------------------------------------Payment------------------------------------------------>
        <section class="payment">
            <div class="container">
               <div class="payment-top-wrap">
                   <div class="payment-top">
                       <div class="payment-top-delivery payment-top-item">
                           <i class="fas fa-shopping-cart "></i>
                       </div>
                       <div class="payment-top-address payment-top-item">
                           <i class="fas fa-map-marker-alt "></i>
                       </div>
                       <div class="payment-top-payment payment-top-item">
                           <i class="fas fa-money-check-alt "></i>
                       </div>
                   </div>
                 </div>
            </div>
            <div class="container">
                <div class="payment-content row">
                   <div class="payment-content-left">
                       <div class="payment-content-left-medthod-delivery">
                           <p style="font-weight:bold;">Phương thức giao hàng</p>
                           <div class="payment-content-left-medthod-delivery-item">
                               <input type="radio">
                               <label for="">Giao hàng chuyển phát nhanh</label>
                           </div>
                       </div>
                       <div class= "payment-content-left-method-payment">
                           <p style="font-weight:bold;">Phương thức thanh toán</p>
                           <p>Mọi giao dịch đều được bảo mật và mã hóa. Thông tin thẻ tín dụng sẽ không bao giờ được lưu lại.</p>
                       <div class="payment-content-left-method-payment-item">
                           <input checked name="method-payment" type="radio">
                           <label for="">Thanh toán bằng thẻ tín dụng(OnePay)</label>
                       </div>
                       <!-- <div class="payment-content-left-method-payment-item-img">
                           <img src="images/visa.png" alt="" style="width:105px; height:30px">
                       </div> -->
                       <div class="payment-content-left-method-payment-item">
                           <input name="method-payment" type="radio">
                           <label for="">Thanh toán bằng thẻ ATM(OnePay)</label>
                       </div>
                       <!-- <div class="payment-content-left-method-payment-item-img">
                           <img src="images/atm.jpg" alt="" style="width:300px; height:100px">
                       </div> -->
                       <div class="payment-content-left-method-payment-item">
                           <input name="method-payment" type="radio">
                           <label for="">Thanh toán Momo</label>
                       </div>
                       <!-- <div class="payment-content-left-method-payment-item-img">
                           <img src="images/momo.png" alt="" >
                       </div> -->
                       <div class="payment-content-left-method-payment-item">
                           <input name="method-payment" type="radio">
                           <label for="">Thu tiền tận nơi</label>
                       </div>
                       </div>
                   </div>
                  
                   <div class="payment-content-right">
                       <div class="payment-content-right-button">
                           <input type="text" placeholder="Mã giảm giá/Quà tặng">
                           <button><i class="fas fa-check"></i></button>
                       </div>
                       <div class="payment-content-right-button">
                           <input type="text" placeholder="Mã cộng tác viên">
                           <button><i class="fas fa-check"></i></button>
                       </div>
                       <div class="payment-content-right-mnv">
                           <select name="" id="">
                               <option value="">Chọn mã nhân viên thân thiết</option>
                               <option value="">Khách vãng lai</option>
                               <option value="">Khách hàng thân thiết</option>
                           </select>
                       </div>
                   </div>
                </div>
                <div class="payment-content-right-payment">
                    <button><a href="delidone.php">TIẾP TỤC THANH TOÁN</a> </button>
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