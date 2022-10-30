<?php
include "header.php";
include "slider.php";
require '../connectdb/connect.php';
$con = ketnoi();
session_start();
?>

<div class="admin-content-right">
    <div class="admin-content-right-cartegory_list">
        <h1>Danh sách khuyến mãi</h1>
        <table>
            <tr>
                <th>Stt</th>
                <th>Mã khuyến mãi</th>
                <th>Phần trăm khuyến mãi</th>
                <th>Tùy biến</th>
            </tr>
            <?php
                $stt = 1;
                $Query = "SELECT * FROM khuyenmai";
                $Result = mysqli_query($con,$Query) or die(mysqli_error($con));
                while($rows = mysqli_fetch_assoc($Result))
                {
                    ?>
                    <tr>
                        <td><?php echo $stt; ?></td>
                        <td><?php echo $rows['MaKhuyenMai']; ?></td>
                        <td><?php echo $rows['PhanTramKM']; ?></td>
                        <td><a href="saleedit.php?id=<?php echo $rows['MaKhuyenMai']; ?>">Sửa</a></td>
                    </tr>
                    <?php
                    $stt++;
                }
            ?>
        </table>
    </div>
</div>
</section>
</body>
</html>