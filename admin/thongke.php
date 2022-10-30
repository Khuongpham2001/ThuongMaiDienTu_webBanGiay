<?php
include "header.php";
include "slider.php";
require '../connectdb/connect.php';
$con = ketnoi();
session_start();
?>

<div class="admin-content-right">
    <div class="admin-content-right-cartegory_list">
        <h1>Thống kê doanh thu theo tháng</h1>
        <table>
            <tr>
                <th>Stt</th>
                <th>ID_sanpham</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
            <?php
                $TongTien = 0;
                $stt = 1;
                $Query = "SELECT MaSanPham,SUM(SoLuong),SUM(Gia) FROM chitiethoadon GROUP BY MaSanPham";
                $Result = mysqli_query($con,$Query) or die(mysqli_error($con));
                while ($kq = mysqli_fetch_assoc($Result))
                {
                    $Query01 = "SELECT * FROM sanpham WHERE MaSanPham = '$kq[MaSanPham]'";
                    $Result01 = mysqli_query($con,$Query01) or die(mysqli_error($con));
                    $kq01 = mysqli_fetch_assoc($Result01);
                    ?>
                    <tr>
                        <td><?php echo $stt; ?></td>
                        <td><?php echo $kq['MaSanPham']; ?></td>
                        <td><?php echo $kq01['TenSanPham']; ?></td>                       
                        <td><?php echo $kq['SUM(SoLuong)']; ?></td>
                        <td><?php echo $kq['SUM(Gia)']; ?></td>
                    </tr>
                    <?php
                    $stt++;
                    $TongTien += $kq['SUM(Gia)'];
                }
            ?>
            
        </table>
        <h1 style="margin-top:20px;font-weight:normal">Tổng doanh thu: 
                <label style="color:red; font-weight:bold; font-size:30px"><?php echo $TongTien; ?> 
                    <span style="font-weight:normal;font-size:20px">VNĐ</span>
                </label>
        </h1>
    </div>
</div>
</section>

</body>
</html>