<?php
include "header.php";
include "slider.php";
require '../connectdb/connect.php';
$con = ketnoi();
session_start();
?>

<div class="admin-content-right">
    <div class="admin-content-right-product_add">
        <h1>Sửa thông tin Tài khoản</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <?php
                $MaTK = $_GET['id'];
                $Query = "SELECT * FROM taikhoan WHERE MaTK = '$MaTK'";
                $Result = mysqli_query($con,$Query) or die(mysqli_error($con));
                $rows = mysqli_fetch_assoc($Result);
            ?>
            <label for="">Nhập email khách hàng <span style="color:red;">*</span></label>
            <input name="Email" value="<?php echo $rows['Email'];?>" required type="text"  style="width:500px;"> 

            <label for="">Nhập username <span style="color:red;">*</span></label>
            <input name="Username" value="<?php echo $rows['Username'];?>" required type="text"  style="width:500px;">

            <label for="">Nhập password <span style="color:red;">*</span></label>
            <input name="Password" value="<?php echo $rows['Password'];?>" required type="password"  style="width:500px;">

            <label for="">Chọn role <span style="color:red;">*</span></label>
            <select name="Role" id="">
                <option value="">--Chọn Role--</option>
                <option value="User" <?php if($rows['Role'] == "User") echo "SELECTED";?>>User</option>
                <option value="Admin" <?php if($rows['Role'] == "Admin") echo "SELECTED";?>>Admin</option>
            </select>

            <button type="submit" name="submit">Thêm</button>
            <?php
                if(isset($_POST['submit']))
                    require '../xuly/xulysuatk.php';
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