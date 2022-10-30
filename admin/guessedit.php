<?php
include "header.php";
include "slider.php";
require '../connectdb/connect.php';
$con = ketnoi();
session_start();
?>

<?php
    $MaKhachHang = $_GET['id'];
    $query = "SELECT * FROM khachhang WHERE MaKhachHang = '$MaKhachHang'";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
    $rows = mysqli_fetch_assoc($result);
    $query01 = "SELECT * FROM taikhoan WHERE MaTK = '$rows[MaTK]'"; 
    $result01 = mysqli_query($con,$query01) or die(mysqli_error($con));
    $rows01 = mysqli_fetch_assoc($result01);
?>

<div class="admin-content-right">
    <div class="admin-content-right-product_add">
        <h1>Sửa thông tin Khách hàng</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="">Nhập tên khách hàng <span style="color:red;">*</span></label>
            <input name="TenKhachHang" required type="text" value="<?php echo $rows['TenKhachHang']; ?>"  style="width:500px;"> 

            <label for="">Nhập số điện thoại<span style="color:red;">*</span></label>
            <input name="SDT" required type="text" value="<?php echo $rows['SDT']; ?>" style="width:500px;">

            <label for="">Nhập email<span style="color:red;">*</span></label>
            <input name="Email" type="text" value="<?php echo $rows01['Email']; ?>" style="width:500px;">

            <label for="">Nhập địa chỉ <span style="color:red;">*</span></label>
            <input name="DiaChi" type="text" value="<?php echo $rows['DiaChi']; ?>" style="width:500px;">
            <button type="submit" name="submit">Sửa</button>
            <?php
                if(isset($_POST['submit']))
                    require '../xuly/xulysuakh.php';
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
</html>