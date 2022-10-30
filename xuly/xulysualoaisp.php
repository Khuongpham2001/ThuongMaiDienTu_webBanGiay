<?php
    $MaLoaiSP = $_GET['brand_id'];
    $MaDanhMuc = mysqli_real_escape_string($con,$_POST['MaDanhMuc']);
    $TenLoaiSP =  mysqli_real_escape_string($con,$_POST['TenLoaiSP']);
    //Check data
    $Find_Duplication_DM_Query = "SELECT * FROM loaisanpham WHERE TenLoaiSP = '$TenLoaiSP' && MaDanhMuc = '$MaDanhMuc'";
    $Find_Duplication_DM_Result = mysqli_query($con,$Find_Duplication_DM_Query) or die(mysqli_error($con));
    $rowfetch = mysqli_num_rows($Find_Duplication_DM_Result);
    if($rowfetch == 0)
    {
        //Insert data
        $Update_LoaiSP_InDM_Query = "UPDATE `loaisanpham` SET `TenLoaiSP`='$TenLoaiSP',`MaDanhMuc`='$MaDanhMuc' WHERE MaLoaiSP = '$MaLoaiSP'";
        $Update_LoaiSP_InDM_Result = mysqli_query($con,$Update_LoaiSP_InDM_Query) or die(mysqli_error($con));
        ?>
        <script>
            alert("Sửa thành công");
            document.location = './brandlist.php';
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
            alert("Đã tồn tại");
        </script>
        <?php
    }
?>