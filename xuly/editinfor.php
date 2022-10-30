<?php
    require '../connectdb/connect.php';
    $con = ketnoi();

    $MaTK = mysqli_real_escape_string($con,$_POST['MaTK']);
    $TenKhachHang = mysqli_real_escape_string($con,$_POST['TenKhachHang']);
    $SDT = mysqli_real_escape_string($con,$_POST['SDT']);
    $DiaChi = mysqli_real_escape_string($con,$_POST['DiaChi']);

    $Query = "SELECT * FROM khachhang WHERE MaTK = '$MaTK'";
    $Result = mysqli_query($con,$Query) or die(mysqli_error($con));
    if (mysqli_num_rows($Result) == 0)
    {
        $Query01 = "INSERT INTO `khachhang`(`TenKhachHang`, `SDT`, `DiaChi`, `MaTK`) VALUES ('$TenKhachHang','$SDT','$DiaChi','$MaTK')";
        $Result01 = mysqli_query($con,$Query01) or die(mysqli_error($con));
    }
    else
    {
        $Query01 = "UPDATE `khachhang` SET `TenKhachHang`='$TenKhachHang',`SDT`='$SDT',`DiaChi`='$DiaChi' WHERE MaTK = '$MaTK'";
        $Result01 = mysqli_query($con,$Query01) or die(mysqli_error($con));
    }
?>
<script>
    alert("Sửa thành công");
    document.location = '../info.php';
</script>