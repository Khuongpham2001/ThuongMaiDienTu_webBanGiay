<?php
    require '../connectdb/connect.php';
    $con = ketnoi(); 
    session_start();
    $HoTen = mysqli_real_escape_string($con,$_POST['HoTen']);
    $DienThoai = mysqli_real_escape_string($con,$_POST['DienThoai']);
    $ThanhPho = mysqli_real_escape_string($con,$_POST['ThanhPho']);
    $Quan = mysqli_real_escape_string($con,$_POST['Quan']);
    $DiaChi = mysqli_real_escape_string($con,$_POST['DiaChi']);
    $MaTK = $_SESSION['id'];
    $NgayLap = date("d/m/Y");

    $Tien = $_SESSION['TotalNum'];
    $VAT = $_SESSION['TotalNum'] * (10/100);
    $Tong = $_SESSION['TotalNum'] - $VAT;

    //Tạo Hóa Đơn
    $Add_Bill_Query = "INSERT INTO `hoadon`(`MaTK`, `Tong`) VALUES ('$MaTK','$Tong')";
    $Add_Bill_Result = mysqli_query($con,$Add_Bill_Query) or die(mysqli_error($con));
    $Find_id_Query = "SELECT max(MaHoaDon) FROM hoadon";
    $Find_id_Result = mysqli_query($con,$Find_id_Query) or die(mysqli_error($con));
    $rowid = mysqli_fetch_assoc($Find_id_Result);
    $MaHoaDon = $rowid['max(MaHoaDon)'];

    //Chi tiết giỏ
    $Find_ThisTimeBuy_Product_Query = "SELECT * FROM giohang WHERE MaTK = '$MaTK' AND TrangThai = 'Thêm'";
    $Find_ThisTimeBuy_Product_Result = mysqli_query($con,$Find_ThisTimeBuy_Product_Query) or die(mysqli_error($con));
    $SoSanPham = mysqli_num_rows($Find_ThisTimeBuy_Product_Result);

    //Tạo Đơn Hàng
    $Add_DonHang_Query = "INSERT INTO `donhang`(`NgayLap`, `SoSanPham`, `TongTriGia`, `TinhTrangGiao`, `HoTen`, `SDT`, `DiaChi`, `MaTK`) VALUES ('$NgayLap','$SoSanPham','$Tong','Chưa Giao','$HoTen','$DienThoai','$DiaChi','$MaTK')";
    $Add_DonHang_Result = mysqli_query($con,$Add_DonHang_Query) or die(mysqli_error($con));
    $Find_DHid_Query = "SELECT max(MaDonHang) FROM donhang";
    $Find_DHid_Result = mysqli_query($con,$Find_DHid_Query) or die(mysqli_error($con));
    $rowdhid = mysqli_fetch_assoc($Find_DHid_Result);
    $MaDonHang = $rowdhid['max(MaDonHang)'];

    while ($rowpcart = mysqli_fetch_assoc($Find_ThisTimeBuy_Product_Result))
    {
        $MaSanPham = $rowpcart['MaSanPham'];
        $SoLuong = $rowpcart['Soluongmua'];
        $Find_Product_Query = "SELECT * FROM sanpham WHERE MaSanPham = '$MaSanPham'";
        $Find_Product_Result = mysqli_query($con,$Find_Product_Query) or die(mysqli_error($con));
        $rowsp = mysqli_fetch_assoc($Find_Product_Result);
        $KhuyenMai = $rowsp['MaKhuyenMai'];
        if ($KhuyenMai != NULL)
        {
            $Find_KM_Query = "SELECT * FROM khuyenmai WHERE MaKhuyenMai = '$KhuyenMai'";
            $Find_KM_Result = mysqli_query($con,$Find_KM_Query) or die(mysqli_error($con));
            $rowkm = mysqli_fetch_assoc($Find_KM_Result);
            $GiaKM = $rowsp['Gia'] - ($rowsp['Gia'] * ($rowkm['PhanTramKM']/100));
            $Gia = $GiaKM * $SoLuong;
        }
        else
        {
            $GiaKM = $rowsp['Gia'];
            $Gia = $GiaKM * $SoLuong;
        }
        //Thêm chi tiết đơn hàng
        $Insert_ChiTietDonHang_Query = "INSERT INTO `chitietdonhang`(`MaDonHang`, `MaSanPham`, `SoLuongMua`, `TriGia`) VALUES ('$MaDonHang','$MaSanPham','$SoLuong','$Gia')";
        $Insert_ChiTietDonHang_Result = mysqli_query($con,$Insert_ChiTietDonHang_Query) or die(mysqli_error($con));

        //Thêm chi tiết hóa đơn
        $Insert_ChiTietHD_Query = "INSERT INTO `chitiethoadon`(`MaHoaDon`, `MaSanPham`, `SoLuong`, `Gia`) VALUES ('$MaHoaDon','$MaSanPham','$SoLuong','$Gia')";
        $Insert_ChiTietHD_result = mysqli_query($con,$Insert_ChiTietHD_Query) or die(mysqli_error($con));

    }
    $Update_Cart_Query = "UPDATE `giohang` SET `TrangThai`='Thanh Toán' WHERE MaTK = '$MaTK'";
    $Update_Cart_Result = mysqli_query($con,$Update_Cart_Query) or die(mysqli_error($con));
?>
<script>
    alert("Thanh Toán Thành Công");
    document.location = '../payment.php';
</script>