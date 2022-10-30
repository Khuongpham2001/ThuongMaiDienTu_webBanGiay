<?php
include "header.php";
include "slider.php";
require '../connectdb/connect.php';
$con = ketnoi();
session_start();
?>

<?php
    $MaSanPham = $_GET['id'];
    $query = "SELECT * FROM sanpham WHERE MaSanPham = '$MaSanPham'";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($result);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="admin-content-right">
    <div class="admin-content-right-product_add">
        <h1>Sửa Sản phẩm</h1>
        <form action="" method="POST">
            <label for="">Nhập tên sản phẩm <span style="color:red;">*</span></label>
            <input name="TenSanPham" required type="text" value="<?php echo $row['TenSanPham']; ?>" >
            <label for="">Chọn danh mục <span style="color:red;">*</span></label>
            <select class="danhmuc" name="MaDanhMuc" id="">
                <option value="">--Chọn--</option>
                <?php
                    $Find_DMName_Query = "SELECT * FROM danhmuc";
                    $Find_DMName_Result = mysqli_query($con,$Find_DMName_Query) or die(mysqli_error($con));
                    while ($row01 = mysqli_fetch_assoc($Find_DMName_Result))
                    {
                        ?>
                        <option <?php if($row['MaDanhMuc'] == $row01['MaDanhMuc']) echo "SELECTED"; ?> value="<?php echo $row01['MaDanhMuc']; ?>"><?php echo $row01['TenDanhMuc']; ?></option>
                        <?php
                    }
                ?>
            </select>
            <label for="">Chọn loại sản phẩm <span style="color:red;">*</span></label>
            <select class="loaisp" name="MaLoaiSP" id="">
                <?php
                    $MaDanhMuc = $row['MaDanhMuc'];
                    $Find_LoaiSP_FromDM_Query = "SELECT * FROM loaisanpham WHERE MaDanhMuc = '$MaDanhMuc'";
                    $Find_LoaiSP_FromDM_Result = mysqli_query($con,$Find_LoaiSP_FromDM_Query) or die(mysqli_error($con));
                    while ($row02 = mysqli_fetch_assoc($Find_LoaiSP_FromDM_Result))
                    {
                        ?>
                        <option <?php if($row['MaLoaiSP'] == $row02['MaLoaiSP']) echo "SELECTED" ?> value="<?php echo $row02['MaLoaiSP']; ?>"><?php echo $row02['TenLoaiSP']; ?></option>
                        <?php
                    }
                ?>
            </select>
            <label for="">Size <span style="color:red;">*</span></label>
            <input name="Size" required type="number" min="0" value="<?php echo $row['Size']; ?>">
            <label for="">Giá sản phẩm <span style="color:red;">*</span></label>
            <input name="Gia" required type="text" value="<?php echo $row['Gia']; ?>">
            <label for="">Chọn khuyến mãi <span style="color:red;">*</span></label>
            <select class="khuyenmai" name="MaKhuyenMai" id="">
                <option value="">--Chọn--</option>
                <?php
                    $Find_KMPer_Query = "SELECT * FROM khuyenmai";
                    $Find_KMPer_Result = mysqli_query($con,$Find_KMPer_Query) or die(mysqli_error($con));
                    while ($row03 = mysqli_fetch_assoc($Find_KMPer_Result))
                    {
                        ?>
                        <option <?php if($row['MaKhuyenMai'] == $row03['MaKhuyenMai']) echo "SELECTED"; ?> value="<?php echo $row03['MaKhuyenMai']; ?>"><?php echo $row03['PhanTramKM']."%"; ?></option>
                        <?php
                    }
                ?>
            </select>
            <label for="">Mô tả sản phẩm </label>
            <textarea required name="MoTaSanPham" id="editor1" cols="30" row="10"><?php echo $row['MoTaSanPham']; ?></textarea>
            <label for="">Ảnh sản phẩm <span style="color:red;">*</span></label>
            <input name="AnhSanPham" type="file" value="">
            <label for="">Ảnh mô tả 1:</label>
            <input name="AnhMoTa1" type="file">
            <label for="">Ảnh mô tả 2:</label>
            <input name="AnhMoTa2" type="file">
            <label for="">Ảnh mô tả 3:</label>
            <input name="AnhMoTa3" type="file">
            <button type="submit" name="submit">Sửa</button>
            <?php
                if(isset($_POST['submit']))
                    require '../xuly/xulysuasp.php';
            ?>
        </form>
    </div>
</div>
</section>
</body>
 <!-- ckeditor -->
<script>
    // Replace the <textarea id="editor1"> with a CKEditor 4
    // instance, using default configuration.
    CKEDITOR.replace( 'editor1' , {
    filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
    filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'

    });

</script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".danhmuc").change(function(){
            var id = $(".danhmuc").val();
            $.post("./viewdata/viewloaisp.php" , {MaDanhMuc: id},function(returndata){
                $(".loaisp").html(returndata);
            });
        });
    })
</script>
</html>