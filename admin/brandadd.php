<?php
include "header.php";
include "slider.php";
require '../connectdb/connect.php';
$con = ketnoi();
session_start();
?>

<style>
    select{  
        height:30px;
        width:200px;
    }
    /* input{
        font-size:14px;
    } */
</style>

<div class="admin-content-right">
    <div class="admin-content-right-cartegory_add">
        <h1>Thêm Loại Sản Phẩm</h1> <br>
        <form action="" method="POST">
            <select name="MaDanhMuc" id="">
            <option value="0">--Chọn Danh mục</option>
            <?php
                $Find_DMName_Query = "SELECT * FROM danhmuc";
                $Find_DMName_Result = mysqli_query($con,$Find_DMName_Query) or die(mysqli_error($con));
                while ($row = mysqli_fetch_assoc($Find_DMName_Result))
                {
                    ?>
                        <option value="<?php echo $row['MaDanhMuc']; ?>"><?php echo $row['TenDanhMuc'] ?></option>
                    <?php
                }
            ?>
            </select> 
            <input required name="TenLoaiSP" type="text" placeholder="Nhập tên loại sản phẩm" >
            <button type="submit" name="submit">Thêm</button>
            <?php
                if(isset($_POST['submit']))
                    require '../xuly/xulythemloaisp.php';
            ?>
        </form>
    </div>
</div>
</body>
</html>