<?php
include "header.php";
include "slider.php";
require '../connectdb/connect.php';
$con = ketnoi();
session_start();
?>

<?php
$stt = 1;
$Show_DM_Query = "SELECT * FROM `danhmuc`";
$Show_DM_Result = mysqli_query($con,$Show_DM_Query) or die(mysqli_error($con));
?>


<div class="admin-content-right">
    <div class="admin-content-right-cartegory_list">
        <h1>Danh sách danh mục</h1>
        <table>
            <tr>
                <th>Stt</th>
                <th>ID</th>
                <th>Danh mục</th>
                <th>Tùy biến</th>
            </tr>
            <?php
                while($rows = mysqli_fetch_assoc($Show_DM_Result)) 
                {
                    ?>
                    <tr>
                        <td><?php echo $stt; ?></td>
                        <td><?php echo $rows['MaDanhMuc']; ?></td>
                        <td><?php echo $rows['TenDanhMuc']; ?></td>
                        <td><a href="cartegoryedit.php?id=<?php echo $rows['MaDanhMuc']; ?>">Sửa</a></td>
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