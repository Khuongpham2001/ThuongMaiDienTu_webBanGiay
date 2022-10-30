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

    $Find_duplication_Query = "SELECT * FROM sanpham WHERE TenSanPham = '$TenSanPham'";
    $Find_duplication_Result = mysqli_query($con,$Find_duplication_Query) or die(mysqli_error($con));
    if(mysqli_num_rows($Find_duplication_Result) == 0)
    {
        /*$structure = '../images/giay/Nam/'.$TenSanPham;
        mkdir($structure, 0777);*/
        if($MaLoaiSP == "" && $MaKhuyenMai == "")
        {
            $Insert_NewSP_Query = "INSERT INTO `sanpham`(`TenSanPham`, `Size`, `Gia`, `MoTaSanPham`, `AnhSanPham`, `AnhMoTa1`, `AnhMoTa2`, `AnhMoTa3`, `MaDanhMuc`, `MaKhuyenMai`, `MaLoaiSP`) VALUES ('$TenSanPham','$Size','$Gia','$MoTa','$AnhSanPham','$AnhMoTa1','$AnhMoTa2','$AnhMoTa3','$MaDanhMuc',NULL,NULL)";
            $Insert_NewSP_Result = mysqli_query($con,$Insert_NewSP_Query) or die(mysqli_error($con));
            ?>
            <script>
                alert("Thêm thành công");
            </script>
            <?php
        }
        else if ($MaLoaiSP == "")
        {
            $Insert_NewSP_Query = "INSERT INTO `sanpham`(`TenSanPham`, `Size`, `Gia`, `MoTaSanPham`, `AnhSanPham`, `AnhMoTa1`, `AnhMoTa2`, `AnhMoTa3`, `MaDanhMuc`, `MaKhuyenMai`, `MaLoaiSP`) VALUES ('$TenSanPham','$Size','$Gia','$MoTa','$AnhSanPham','$AnhMoTa1','$AnhMoTa2','$AnhMoTa3','$MaDanhMuc','$MaKhuyenMai',NULL)";
            $Insert_NewSP_Result = mysqli_query($con,$Insert_NewSP_Query) or die(mysqli_error($con));
            ?>
            <script>
                alert("Thêm thành công");
            </script>
            <?php
        }
        else if ($MaKhuyenMai == "")
        {
            $Insert_NewSP_Query = "INSERT INTO `sanpham`(`TenSanPham`, `Size`, `Gia`, `MoTaSanPham`, `AnhSanPham`, `AnhMoTa1`, `AnhMoTa2`, `AnhMoTa3`, `MaDanhMuc`, `MaKhuyenMai`, `MaLoaiSP`) VALUES ('$TenSanPham','$Size','$Gia','$MoTa','$AnhSanPham','$AnhMoTa1','$AnhMoTa2','$AnhMoTa3','$MaDanhMuc',NULL,'$MaLoaiSP')";
            $Insert_NewSP_Result = mysqli_query($con,$Insert_NewSP_Query) or die(mysqli_error($con));
            ?>
            <script>
                alert("Thêm thành công");
            </script>
            <?php
        }
        else
        {
            $Insert_NewSP_Query = "INSERT INTO `sanpham`(`TenSanPham`, `Size`, `Gia`, `MoTaSanPham`, `AnhSanPham`, `AnhMoTa1`, `AnhMoTa2`, `AnhMoTa3`, `MaDanhMuc`, `MaKhuyenMai`, `MaLoaiSP`) VALUES ('$TenSanPham','$Size','$Gia','$MoTa','$AnhSanPham','$AnhMoTa1','$AnhMoTa2','$AnhMoTa3','$MaDanhMuc','$MaKhuyenMai','$MaLoaiSP')";
            $Insert_NewSP_Result = mysqli_query($con,$Insert_NewSP_Query) or die(mysqli_error($con));
            ?>
            <script>
                alert("Thêm thành công");
            </script>
            <?php
        }
    }
    else
    {
        ?>
        <script>
            alert("Sản phẩm đã tồn tại");
        </script>
        <?php
    }
?>