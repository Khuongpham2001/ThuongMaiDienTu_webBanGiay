<?php
    require '../connectdb/connect.php';

    $Request = $_POST['Request'];
    if($Request == "Ship")
    {
        Ship();
    }
    else
    {
        Cancel();
    }

    function Ship()
    {
        $con = ketnoi();
        $MaDonHang = $_POST['MaDonHang'];
        $Query = "UPDATE `donhang` SET `TinhTrangGiao`='Đã Giao' WHERE MaDonHang = '$MaDonHang'";
        $Result = mysqli_query($con,$Query) or die(mysqli_error($con));
        echo 1;
    }

    function Cancel()
    {
        $con = ketnoi();
        $MaDonHang = $_POST['MaDonHang'];
        $Query = "UPDATE `donhang` SET `TinhTrangGiao`='Đã Hủy' WHERE MaDonHang = '$MaDonHang'";
        $Result = mysqli_query($con,$Query) or die(mysqli_error($con));
        echo 1;
    }


?>