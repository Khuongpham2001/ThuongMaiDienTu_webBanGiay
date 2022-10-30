<?php
include "header.php";
include "slider.php";
require '../connectdb/connect.php';
$con = ketnoi();
session_start();
?>

<div class="admin-content-right">
    <div class="admin-content-right-cartegory_list">
        <h1>Chi tiết đơn hàng</h1>
        <table>
            <tr>
                <th>Stt</th>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tên người mua</th>
                <th>SDT người mua</th>
                <th>Địa chỉ giao hàng</th>
            </tr>
            <?php
                $TongTien = 0;
                $MaDonHang = $_GET['dhid'];
                $stt = 1; 
                $Query = "SELECT * FROM donhang, chitietdonhang WHERE donhang.MaDonHang = '$MaDonHang' AND chitietdonhang.MaDonHang = '$MaDonHang'";
                $Result = mysqli_query($con,$Query) or die(mysqli_error($con));
                while ($kq = mysqli_fetch_assoc($Result))
                {
                    $Query01 = "SELECT * FROM sanpham WHERE MaSanPham = '$kq[MaSanPham]'";
                    $Result01 = mysqli_query($con,$Query01) or die(mysqli_error($con));
                    $kq01 = mysqli_fetch_assoc($Result01);
                    if ($kq01['MaKhuyenMai'] == NULL)
                    {
                        $Gia = $kq01['Gia'] * $kq['SoLuongMua'];;
                        $TongTien += $Gia;
                    }
                    else 
                    {
                        $Query02 = "SELECT * FROM khuyenmai WHERE MaKhuyenMai='$kq01[MaKhuyenMai]'";
                        $Result02 = mysqli_query($con,$Query02) or die(mysqli_error($con));
                        $kq02 = mysqli_fetch_assoc($Result02);
                        $Gia = ($kq01['Gia'] - ($kq01['Gia'] * ($kq02['PhanTramKM']/100))) * $kq['SoLuongMua'];
                        $TongTien += $Gia;
                    }
                    ?>
                    <tr>
                        <td><?php echo $stt; ?></td>
                        <td><?php echo $kq['MaSanPham']; ?></td>
                        <td><?php echo $kq01['TenSanPham']; ?></td>
                        <td><?php echo $Gia; ?></td>
                        <td><?php echo $kq['SoLuongMua']; ?></td>
                        <td><?php echo $kq['HoTen']; ?></td>
                        <td><?php echo $kq['SDT']; ?></td>
                        <td><?php echo $kq['DiaChi']; ?></td>
                    </tr>
                    <?php
                    $stt++;
                }
            ?>            
        </table>

        <h1 style="margin-top:20px;font-weight:normal">Tổng tiền: 
                <label style="color:red; font-weight:bold; font-size:30px"><?php echo $TongTien; ?> 
                    <span style="font-weight:normal;font-size:20px">VNĐ</span>
                </label>
        </h1>
    </div>
</div>
</section>

</body>
</html>