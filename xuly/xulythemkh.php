<?php
    $TenKhachHang = mysqli_real_escape_string($con,$_POST['TenKhachHang']);
    $Email = mysqli_real_escape_string($con,$_POST['Email']);
    $SDT = mysqli_real_escape_string($con,$_POST['SDT']);
    $DiaChi = mysqli_real_escape_string($con,$_POST['DiaChi']);

    $Find_ACC = mysqli_query($con,"SELECT * FROM taikhoan WHERE Email = '$Email'") or die(mysqli_error($con));
    if(mysqli_num_rows($Find_ACC) == 0)
    {
        ?>
        <script>
            alert("Ko có tài khoản này");
        </script>
        <?php
    }
    else
    {
        $rowacc = mysqli_fetch_assoc($Find_ACC);
        $MaTK = $rowacc['MaTK'];
        $Check_duplicateACC_Query = "SELECT * FROM khachhang WHERE MaTK = '$MaTK'";
        $Check_duplicateACC_Result = mysqli_query($con,$Check_duplicateACC_Query) or die(mysqli_error($con));
        if(mysqli_num_rows($Check_duplicateACC_Result) == 0)
        {
            $Insert_NewKH_Query = "INSERT INTO `khachhang`(`TenKhachHang`, `SDT`, `DiaChi`, `MaTK`) VALUES ('$TenKhachHang','$SDT','$DiaChi','$MaTK')";
            $Insert_NewKH_result = mysqli_query($con,$Insert_NewKH_Query) or die(mysqli_error($con));
            ?>
            <script>
                alert("Thêm thành công");
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert("Tài khoản này đã có khách hàng sử dụng");
            </script>
            <?php
        }
    }
?>