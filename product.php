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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Chi tiết sản phẩm</title>
</head>
<body>
    <?php require './giaodien/header.php'; ?>
    <?php require './giaodien/spinfo.php'; ?>    
    <?php require './giaodien/relativesp.php'; ?>    

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
            <li><a> <img src ="images/dathongbao.png"></a></li>
            <li><a>Liên hệ</a></li>
            <li><a>Tuyển dụng</a></li>
            <li><a>Giới thiệu</a></li>
            <li>
                <a class="fab fa-facebook-f"></i></a>
                <a class="fab fa-twitter"></a>
                <a class="fab fa-youtube"></a>
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
<!--Chi tiết-->
<script>
    const baoquan = document.querySelector(".baoquan")
        const chitiet = document.querySelector (".chitiet")
        if(baoquan){
        baoquan.addEventListener("click", function(){
            document.querySelector(".product-content-right-bottom-content-chitiet").style.display = "none"
            document.querySelector(".product-content-right-bottom-content-baoquan").style.display = "block"
                })
            }
        if(chitiet){
            chitiet.addEventListener("click", function(){
            document.querySelector(".product-content-right-bottom-content-chitiet").style.display = "block"
            document.querySelector(".product-content-right-bottom-content-baoquan").style.display ="none"
            } )

    }
        const butTon= document.querySelector(".product-content-right-bottom-top")
                if(butTon){
                butTon.addEventListener("click", function (){
                document.querySelector(".product-content-right-bottom-content-big").classList.toggle("activeB")
    })
    }
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#addcart").click(function(){
            <?php if(isset($_SESSION["id"])) {
                    $user = $_SESSION["id"];
                }
                else {
                    $user = "";
                }
             ?>
            var user_id = '<?php echo $user; ?>';
            if (user_id == "") {
                alert ("Vui lòng đăng nhập để sử dụng chức năng này"); 
                document.location = './login.php';
            }
            else {
                var shoeid = '<?php echo $_GET['id'];?>';
                var quantity = document.getElementById('quantity').value;
                $.post("./model/cart_model.php", {MaTK: user_id, MaSP: shoeid, Soluongmua: quantity} , function(returndata){
                    document.getElementById('addsuccess').style.display = "block";
                })
            }
        })
    })
</script>
</html>