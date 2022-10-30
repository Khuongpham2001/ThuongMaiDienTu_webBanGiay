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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Giỏ hàng</title>
</head>
<body>
    <?php require './giaodien/header.php'; ?>


<!-- ----------------------------------------------cart------------------------------------------------>
<section class="cart">
<div class="container">
    <div class="cart-top-wrap">
    <div class="cart-top">
        <div class="cart-top-cart cart-top-item">
            <i class="fas fa-shopping-cart "></i>
        </div>
        <div class="cart-top-address cart-top-item">
            <i class="fas fa-map-marker-alt "></i>
        </div>
        <div class="cart-top-payment cart-top-item">
            <i class="fas fa-money-check-alt "></i>
        </div>
    </div>
    </div>
</div>
<div class="container">
    <div class="cart-content row">
        <div class="cart-content-left">
            <table>
            <tr>
                <th>Sản phẩm </th>
                <th>Tên sản phẩm </th>
                <th>Size</th>
                <th>Số lượng</th>
                <th>Thành tiền </th>
                <th>Xóa</th>
            </tr>
            <form name="CartSP" action="./xuly/xulycartchange.php" method="post">
                <?php require './giaodien/spgiohang.php'; ?>
            </form>
            </table>
        </div>
        <div class="cart-content-right">
            <table>
                <tr>
                    <th colspan="2">TỔNG TIỀN GIỎ HÀNG</th>
                </tr>
                <tr>
                    <td>TỔNG SẢN PHẨM</td>
                    <td><?php if(mysqli_num_rows($Show_Result) != 0) echo mysqli_num_rows($Show_Result); else echo "0"; ?></td>
                </tr>
                <tr>
                    <td>TỔNG TIỀN HÀNG</td>
                    <td><p><?php echo $FullMoney; ?><sup>đ</sup></p></td>
                </tr>
                <tr>
                    <td>TẠM TÍNH</td>
                    <td><p style="color: black; font-weight:bold"><?php echo $FullMoney; ?><sup>đ</sup></p></td>
                </tr>
            </table>
            <div class="cart-content-right-text">
                <p>Bạn sẽ được miễn phí ship khi đơn hàng của bạn có tổng giá trị trên 2.000.000đ</p>
                <p style="color:red; font-weight: bold; ">Mua thêm <span style:="font-size:18px">131.000đ</span> để được miễn phí ship</p>
            </div>
            <div class="cart-content-right-button">
                <button><a href="index.php"> TIẾP TỤC MUA SẮM </a></button>
                <button type="submit" name="submit" onclick="savechange()"><a> LƯU THAY ĐỔI </a></button>
            </div>
            </br>
            <div class="cart-content-right-button">
                <button><a href="delivery.php"> THANH TOÁN </a></button>
            </div>
            <div class="cart-content-right-dangnhap">
                <p>TÀI KHOẢN HShoes</p> <br>
                <p>Hãy <a href="">đăng nhập </a>tài khoản của bạn để tích điểm thành viên</p>
            </div>
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
<script type="text/javascript">
    function thaydoisoluong(input_id,output_id,product_id)
    {
        var x = document.getElementById(input_id).value;
        $.post("./admin/viewdata/price_from_quantity.php", {MaSanPham: product_id, Soluong: x} , function(returndata){
            document.getElementById(output_id).innerText = returndata; 
        })
    }
    function savechange()
    {
        document.forms['CartSP'].submit();
        //document.CartSP.submit();
    }
</script>
</html>