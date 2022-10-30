<?php
include "header.php";
include "slider.php";
require '../connectdb/connect.php';
$con = ketnoi();
session_start();
?>
<?php
    $MaKhuyenMai = $_GET['id'];
    $query = "SELECT * FROM khuyenmai WHERE MaKhuyenMai = '$MaKhuyenMai'";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
    $row00 = mysqli_fetch_assoc($result);
?>
<div class="admin-content-right">
            <div class="admin-content-right-cartegory_add">
                <h1>Sửa Khuyến mãi</h1>
                <form action="" method="POST">
                    <label>Phần trăm khuyến mãi:</label>
                    <input required name="PhanTramKM" type="text" value="<?php echo $row00['PhanTramKM']; ?>" placeholder="Nhập phần trăm khuyến mãi">
                    <button type="submit" name="submit">Sửa</button>
                    <?php
                        if(isset($_POST['submit']))
                            require '../xuly/xulysuakhuyenmai.php';
                    ?>
                </form>
            </div>
        </div>
</body>
</html>