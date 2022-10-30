<?php
include "header.php";
include "slider.php";
require '../connectdb/connect.php';
$con = ketnoi();
session_start();
?>

<div class="admin-content-right">
    <div class="admin-content-right-product_add">
                <h1>Thêm Tài khoản</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Nhập email khách hàng <span style="color:red;">*</span></label>
                    <input name="Email" required type="text"  style="width:500px;"> 

                    <label for="">Nhập username <span style="color:red;">*</span></label>
                    <input name="Username" required type="text"  style="width:500px;">

                    <label for="">Nhập password <span style="color:red;">*</span></label>
                    <input name="Password" required type="password"  style="width:500px;">

                    <label for="">Chọn role <span style="color:red;">*</span></label>
                    <select name="Role" id="">
                        <option value="">--Chọn Role--</option>
                        <option value="User">User</option>
                        <option value="Admin">Admin</option>
                    </select>

                    <button type="submit" name="submit">Thêm</button>
                    <?php
                        if(isset($_POST['submit']))
                            require '../xuly/xulythemtk.php';
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