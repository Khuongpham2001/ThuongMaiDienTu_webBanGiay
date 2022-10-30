<?php
include "header.php";
include "slider.php";
require '../connectdb/connect.php';
$con = ketnoi();
session_start();
?>

<?php
$stt = 1;
$Show_LoaiSP_Query = "SELECT * FROM `loaisanpham`";
$Show_LoaiSP_Result = mysqli_query($con,$Show_LoaiSP_Query)
?>


<div class="admin-content-right">
    <div class="admin-content-right-cartegory_list">
        <h1>Danh sách loại sản phẩm</h1>
        <table>
            <tr>
                <th>Stt</th>
                <th>ID</th>
                <th>Danh mục</th>
                <th>Loại sản phẩm</th>
                <th>Tùy biến</th>
            </tr>
            <?php
                while($rows = mysqli_fetch_assoc($Show_LoaiSP_Result)) 
                {
                    $MaDanhMuc = $rows['MaDanhMuc'];
                    $Find_DM_Query = "SELECT * FROM `danhmuc` WHERE MaDanhMuc = '$MaDanhMuc'";
                    $Find_DM_Result = mysqli_query($con,$Find_DM_Query) or die(mysqli_error($con));
                    $rowDM = mysqli_fetch_assoc($Find_DM_Result);
                    ?>
                    <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $rows['MaLoaiSP']; ?></td>
                        <td><?php echo $rowDM['TenDanhMuc']; ?></td>
                        <td><?php echo $rows['TenLoaiSP']; ?></td>
                        <td><a href="brandedit.php?brand_id=<?php echo $rows['MaLoaiSP']; ?>">Sửa</a></td>
                    </tr>
                    <?php
                    $stt++;
                }
            ?>
        </table>
    </div>
</div>
</body>
</html>