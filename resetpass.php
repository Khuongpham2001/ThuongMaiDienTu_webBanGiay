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
    <title>Đổi mật khẩu</title>
</head>
<body>
    <?php require './giaodien/header.php'; ?>

<section class="info-content">
    <div class="info-content-left">
        <ul>
            <li><a>TRANG TÀI KHOẢN</a>
                <ul>
                    <li><a href="info.php"  >Thông tin tài khoản</a></li>
                    <li><a href="donhang.php" >Đơn hàng của bạn</a></li>
                    <li><a href="resetpass.php" style="color:#0DB7EA; font-weight: bold;" >Đổi mật khẩu</a></li>
                </ul>
            </li>
      
        </ul>
    </div>
    <div class="info-content-right">
        <div class="info-content-right-product_add">
                    <h1 style="color:#2e2c2c">Đổi mật khẩu</h1>
                    <?php
                        $MaTK = $_SESSION['id'];
                        $Query = "SELECT * FROM taikhoan WHERE MaTK='$MaTK'";
                        $Result = mysqli_query($con,$Query) or die(mysqli_error($con));
                        $kq = mysqli_fetch_assoc($Result);
                    ?>
                    <form action="./xuly/resetpass.php" method="POST" enctype="multipart/form-data">
                        <label for="">Email</label>
                        <p id="info-resetpass-email"><?php echo $kq['Email']; ?></p>
                        <input name="MaTK" type="text" style="display:none;" value="<?php echo $_SESSION['id']; ?>">

                        <label for="">Mật khẩu cũ <span style="color:red;">*</span></label>
                        <input name="OldMK" required type="text" style="width:500px;" value="<?php echo $kq['Password']; ?>">
    
                        <label for="">Mật khẩu mới <span style="color:red;">*</span></label>
                        <input name="NewMK" required type="text"  style="width:500px;">
    
                        <label for="">Nhập lại mật khẩu mới <span style="color:red;">*</span></label>
                        <input name="CheckMK" required type="text"  style="width:500px;">

    
                        <button type="submit" name="submit">Thay đổi</button>
                        
                    </form>
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