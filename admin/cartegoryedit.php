<?php
include "header.php";
include "slider.php";
require '../connectdb/connect.php';
$con = ketnoi();
session_start();
?>

<?php
    $MaDanhMuc = $_GET['id'];
    $FindDM_Name_Query = "SELECT * FROM danhmuc WHERE MaDanhMuc = '$MaDanhMuc'";
    $FindDM_Name_Result = mysqli_query($con,$FindDM_Name_Query) or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($FindDM_Name_Result);
?>
<div class="admin-content-right">
            <div class="admin-content-right-cartegory_add">
                <h1>Sửa Danh mục</h1>
                <form action="" method="POST">
                    <input required name="NewName" type="text" placeholder="Nhập tên danh mục"
                     value="<?php echo $row['TenDanhMuc']; ?>">
                    <button type="submit" name="submit">Sửa</button>
                    <?php
                        if(isset($_POST['submit']))
                            require '../xuly/xulysuadanhmuc.php';
                    ?>
                </form>
            </div>
        </div>
    </section>

</body>
</html>