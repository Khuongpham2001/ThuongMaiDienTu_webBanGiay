<?php
    $TenSanPham = mysqli_real_escape_string($con,$_POST['TenSanPham']);
    $MaDanhMuc = mysqli_real_escape_string($con,$_POST['MaDanhMuc']);
    $MaLoaiSP = mysqli_real_escape_string($con,$_POST['MaLoaiSP']);
    $Size = mysqli_real_escape_string($con,$_POST['Size']);
    $Gia = mysqli_real_escape_string($con,$_POST['Gia']);
    $MaKhuyenMai = mysqli_real_escape_string($con,$_POST['MaKhuyenMai']);
    $MoTa = mysqli_real_escape_string($con,$_POST['MoTaSanPham']);
    $AnhSanPham = mysqli_real_escape_string($con,$_POST['AnhSanPham']);
    $AnhMoTa1 = mysqli_real_escape_string($con,$_POST['AnhMoTa1']);
    $AnhMoTa2 = mysqli_real_escape_string($con,$_POST['AnhMoTa2']);
    $AnhMoTa3 = mysqli_real_escape_string($con,$_POST['AnhMoTa3']);

    $MaSanPham = $_GET['id'];

    if ($AnhSanPham != "")
    {
        $UpdateAnhSP = "UPDATE `sanpham` SET `AnhSanPham`='$AnhSanPham' WHERE MaSanPham = '$MaSanPham'";
        $Update_Result01 = mysqli_query($con,$UpdateAnhSP) or die(mysqli_error($con));
    }

    if ($AnhMoTa1 != "")
    {
        $UpdateAnhMT1 = "UPDATE `sanpham` SET `AnhMoTa1`='$AnhMoTa1' WHERE MaSanPham = '$MaSanPham'";
        $Update_Result02 = mysqli_query($con,$UpdateAnhMT1) or die(mysqli_error($con));
    }

    if ($AnhMoTa2 != "")
    {
        $UpdateAnhMT2 = "UPDATE `sanpham` SET `AnhMoTa2`='$AnhMoTa2' WHERE MaSanPham = '$MaSanPham'";
        $Update_Result03 = mysqli_query($con,$UpdateAnhMT2) or die(mysqli_error($con));
    }

    if ($AnhMoTa3 != "")
    {
        $UpdateAnhMT3 = "UPDATE `sanpham` SET `AnhMoTa3`='$AnhMoTa3' WHERE MaSanPham = '$MaSanPham'";
        $Update_Result04 = mysqli_query($con,$UpdateAnhMT3) or die(mysqli_error($con));
    }

    if ($MaKhuyenMai == "")
    {
        $Update_MaKM = "UPDATE `sanpham` SET `MaKhuyenMai`= NULL WHERE MaSanPham = '$MaSanPham'";
        $Update_Result05 = mysqli_query($con,$Update_MaKM) or die(mysqli_error($con));
    }
    else
    {
        $Update_MaKM = "UPDATE `sanpham` SET `MaKhuyenMai`= '$MaKhuyenMai' WHERE MaSanPham = '$MaSanPham'";
        $Update_Result05 = mysqli_query($con,$Update_MaKM) or die(mysqli_error($con));
    }

    if ($MaLoaiSP == "")
    {
        $Update_MaLoaiSP = "UPDATE `sanpham` SET `MaLoaiSP`= NULL WHERE MaSanPham = '$MaSanPham'";
        $Update_Result06 = mysqli_query($con,$Update_MaLoaiSP) or die(mysqli_error($con));
    }
    else
    {
        $Update_MaLoaiSP = "UPDATE `sanpham` SET `MaLoaiSP`= '$MaLoaiSP' WHERE MaSanPham = '$MaSanPham'";
        $Update_Result06 = mysqli_query($con,$Update_MaLoaiSP) or die(mysqli_error($con));
    }

    $Find_duplication_Query = "SELECT * FROM sanpham WHERE TenSanPham = '$TenSanPham' AND MaSanPham != '$MaSanPham'";
    $Find_duplication_Result = mysqli_query($con,$Find_duplication_Query) or die(mysqli_error($con));
    if(mysqli_num_rows($Find_duplication_Result) == 0)
    {
        $Update_NoSpecData_Query = "UPDATE `sanpham` SET `TenSanPham`='$TenSanPham',`Size`='$Size',`Gia`='$Gia',`MoTaSanPham`='$MoTa',`MaDanhMuc`='$MaDanhMuc' WHERE MaSanPham = '$MaSanPham'";
        $Update_NoSpecData_Result = mysqli_query($con,$Update_NoSpecData_Query) or die(mysqli_error($con));
        ?>
        <script>
            alert("Sửa thành công");
            document.location = './productlist.php';
        </script>
        <?php
    }
    else 
    {
        ?>
        <script>
            alert("Sản Phẩm đã tồn tại");
        </script>
        <?php
    }
?>