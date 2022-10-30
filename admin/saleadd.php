<?php
include "header.php";
include "slider.php";
require '../connectdb/connect.php';
$con = ketnoi();
session_start();
?>
<div class="admin-content-right">
            <div class="admin-content-right-cartegory_add">
                <h1>Thêm Khuyến mãi</h1>
                <form action="" method="POST">
                    <input required name="MaKhuyenMai" type="text" placeholder="Nhập mã khuyến mãi">
                    <input required name="PhanTramKM" type="text" placeholder="Nhập phần trăm khuyến mãi">
                    <button type="submit" name="submit">Thêm</button>
                    <?php
                        if(isset($_POST['submit']))
                            require '../xuly/xulythemkhuyenmai.php';
                    ?>
                </form>
            </div>
        </div>
</body>
</html>