<?php
    require '../../connectdb/connect.php';
    $con = ketnoi();
    $MaSanPham = $_POST['MaSanPham'];
    $SoLuong = $_POST['Soluong'];

    $Query = "SELECT Gia FROM sanpham WHERE MaSanPham = '$MaSanPham'";
    $Result = mysqli_query($con,$Query) or die(mysqli_error($con));
    $rowgia = mysqli_fetch_assoc($Result);
    $Gia = $rowgia['Gia'];

    $ThanhTien = $SoLuong * $Gia;

    echo json_encode($ThanhTien);
?>