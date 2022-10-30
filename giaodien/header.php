<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<header>            
    <div class="logo"> <a href="index.php"><img src ="images/low-res-logo.png"></a></div>
    <div class ="menu"> 
        <?php
            $ViewDM_Query = "SELECT * FROM danhmuc";
            $ViewDM_Result = mysqli_query($con,$ViewDM_Query) or die(mysqli_error($con));
            if (mysqli_num_rows($ViewDM_Result) != 0)
            {
                while ($rowdanhmuc = mysqli_fetch_assoc($ViewDM_Result))
                {
                    ?>
                    <li><a style="text-transform: uppercase;" href="demo.php?MaDM=<?php echo $rowdanhmuc['MaDanhMuc']; ?>&&MaLoai=0"><?php echo $rowdanhmuc['TenDanhMuc']; ?></a>
                    <?php
                    $MaDanhMuc = $rowdanhmuc['MaDanhMuc'];
                    $FindLoaiSP_TheoDM_Query = "SELECT * FROM loaisanpham WHERE MaDanhMuc = '$MaDanhMuc'";
                    $FindLoaiSP_TheoDM_Result = mysqli_query($con,$FindLoaiSP_TheoDM_Query) or die(mysqli_error($con));
                    if (mysqli_num_rows($FindLoaiSP_TheoDM_Result) != 0)
                    {
                        ?>
                        <ul class="sub-menu"> 
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
                }
            }
        ?>
        <li><a href="">THÔNG TIN</a></li>
    </div>
    <div class ="others">
        <li>
            <input placeholder="Tìm kiếm" type ="text" onkeyup="Search(this.value)"><i class ="fas fa-search"></i>
            <div id="searchzone">

            </div>
        </li>
        <li><a class ="fa fa-paw" href="favor.php"></a></li>
        <li><a class ="fa fa-user" href="<?php if(isset($_SESSION['id'])) echo 'info.php'; else echo 'moidangnhap.php'; ?>"></a></li>
        <li><a class ="fa fa-shopping-bag" href="cart.php"></a></li>
    </div>
    <div class="btn-login" >
    <?php
        if($_SESSION['active'] == "yes")
        {
    ?>
            <li><a href="logout.php">Logout</a></li>
    <?php
        }
        else
        {
            $_SESSION['active'] = 'none';
            ?>
            <li><a href="logup.php">Logup</a></li>/
            <li><a href="login.php">Login</a></li>
            <?php
        }
    ?>
    </div>
</header>
<script type="text/javascript">
    function Search(value) {
        $.post("./xuly/search.php", {TenSanPham: value}, function(returndata){
            $("#searchzone").html(returndata);
        })
    }
</script>