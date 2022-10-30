<?php
    $MaKhuyenMai = mysqli_real_escape_string($con,$_POST['MaKhuyenMai']);
    $PhanTramKM = mysqli_real_escape_string($con,$_POST['PhanTramKM']);

    $Find_duplication_Query = "SELECT * FROM khuyenmai WHERE MaKhuyenMai = '$MaKhuyenMai' OR PhanTramKM = '$PhanTramKM'";
    $Find_duplication_Result = mysqli_query($con,$Find_duplication_Query) or die(mysqli_error($con));
    if(mysqli_num_rows($Find_duplication_Result) > 0)
    {
        ?>
        <script>
            alert("Khuyến mãi này đã tồn tại");
        </script>
        <?php
    }
    else
    {
        $Insert_KM_Query = "INSERT INTO `khuyenmai`(`MaKhuyenMai`, `PhanTramKM`) VALUES ('$MaKhuyenMai','$PhanTramKM')";
        $Insert_KM_Result = mysqli_query($con,$Insert_KM_Query) or die(mysqli_error($con));
        ?>
        <script>
            alert("Thêm thành công");
        </script>
        <?php
    }
?>