<?php
include "header.php";
include "slider.php";
require '../connectdb/connect.php';
$con = ketnoi();
session_start();
?>
<?php
    $MaLoaiSP = $_GET['brand_id'];
    $FindLoaiSP_Name_Query = "SELECT * FROM loaisanpham WHERE MaLoaiSP = '$MaLoaiSP'";
    $FindLoaiSP_Name_Result = mysqli_query($con,$FindLoaiSP_Name_Query) or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($FindLoaiSP_Name_Result);
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
        <h1>Sửa Loại Sản Phẩm</h1> <br>
        <form action="" method="POST">
            <select name="MaDanhMuc" id="">
            <option value="0">--Chọn Danh mục</option>
            <?php
                $Find_DMName_Query = "SELECT * FROM danhmuc";
                $Find_DMName_Result = mysqli_query($con,$Find_DMName_Query) or die(mysqli_error($con));
                while ($rowDM = mysqli_fetch_assoc($Find_DMName_Result))
                {
                    ?>
                        <option <?php if($row['MaDanhMuc'] == $rowDM['MaDanhMuc']) echo "SELECTED";?> value="<?php echo $rowDM['MaDanhMuc']; ?>"><?php echo $rowDM['TenDanhMuc']; ?></option>
                    <?php
                }
            ?>
            </select><br>
            <input required name="TenLoaiSP" type="text" placeholder="Nhập tên loại sản phẩm" 
            value="<?php echo $row['TenLoaiSP'];?>">
            <button type="submit" name="submit">Sửa</button>
            <?php
                if(isset($_POST['submit']))
                    require '../xuly/xulysualoaisp.php';
            ?>
        </form>
    </div>
</div>
</body>
</html>