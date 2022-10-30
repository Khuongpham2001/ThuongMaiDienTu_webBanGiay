<?php
include "header.php";
include "slider.php";
require '../connectdb/connect.php';
$con = ketnoi();
session_start();
?>
<div class="admin-content-right">
    <div class="admin-content-right-cartegory_add">
        <h1>Thêm Danh mục</h1>
        <form action="" method="POST">
            <input required name="TenDanhMuc" type="text" placeholder="Nhập tên danh mục">
            <button type="submit" name="submit">Thêm</button>
            <?php
                if(isset($_POST['submit']))
                    require '../xuly/xulythemdanhmuc.php';
            ?>
        </form>
    </div>
</div>
</body>
</html>