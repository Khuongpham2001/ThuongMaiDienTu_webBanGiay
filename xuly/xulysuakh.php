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
        $MaKhachHang = $_GET['id'];
        $Check_duplicateACC_Query = "SELECT * FROM khachhang WHERE MaTK = '$MaTK' AND MaKhachHang != '$MaKhachHang'";
        $Check_duplicateACC_Result = mysqli_query($con,$Check_duplicateACC_Query) or die(mysqli_error($con));
        if(mysqli_num_rows($Check_duplicateACC_Result) == 0)
        {
            $Update_KH_Query = "UPDATE `khachhang` SET `TenKhachHang`='$TenKhachHang',`SDT`='$SDT',`DiaChi`='$DiaChi',`MaTK`='$MaTK' WHERE MaKhachHang = '$MaKhachHang'";
            $Update_KH_result = mysqli_query($con,$Update_KH_Query) or die(mysqli_error($con));
            ?>
            <script>
                alert("Sửa thành công");
                document.location = './guesslist.php';
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