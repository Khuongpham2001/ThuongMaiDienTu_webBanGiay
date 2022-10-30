<?php
include "header.php";
include "slider.php";
require '../connectdb/connect.php';
$con = ketnoi();
session_start();
?>

<div class="admin-content-right">
    <div class="admin-content-right-product_add">
        <h1>Thêm Khách hàng</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="">Nhập tên khách hàng <span style="color:red;">*</span></label>
            <input name="TenKhachHang" required type="text"  style="width:500px;"> 

            <label for="">Nhập số điện thoại<span style="color:red;">*</span></label>
            <input name="SDT" required type="text" style="width:500px;">

            <label for="">Nhập email<span style="color:red;">*</span></label>
            <input name="Email" type="text" style="width:500px;">

            <label for="">Nhập địa chỉ <span style="color:red;">*</span></label>
            <textarea required name="DiaChi"  style="height:70px; margin:8px 0 40px 0"></textarea>
            <button type="submit" name="submit">Thêm</button>
            <?php
                if(isset($_POST['submit']))
                    require '../xuly/xulythemkh.php';
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