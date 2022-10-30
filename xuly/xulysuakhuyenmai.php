<?php
    $PhanTramKM = mysqli_real_escape_string($con,$_POST['PhanTramKM']);

    $MaKhuyenMai = $_GET['id'];

    $Check_Duplicate_Percent_Query = "SELECT * FROM khuyenmai WHERE PhanTramKM = '$PhanTramKM' AND MaKhuyenMai != '$MaKhuyenMai'";
    $Check_Duplicate_Percent_Result = mysqli_query($con,$Check_Duplicate_Percent_Query) or die(mysqli_error($con));
    if (mysqli_num_rows($Check_Duplicate_Percent_Result) == 0)
    {
        $Update_Percent_Query = "UPDATE `khuyenmai` SET `PhanTramKM`='$PhanTramKM' WHERE MaKhuyenMai = '$MaKhuyenMai'";
        $Update_Percent_Result = mysqli_query($con,$Update_Percent_Query) or die(mysqli_error($con));
        ?>
        <script>
            alert("Sửa thành công");
            document.location = './salelist.php';
        </script>
        <?php
    }
    else 
    {
        ?>
        <script>
            alert("Khuyến mãi đã tồn tại");
        </script>
        <?php
    }
    
?>