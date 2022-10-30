<?php
    //get data
    $MaDanhMuc = mysqli_real_escape_string($con,$_POST['MaDanhMuc']);
    $TenLoaiSP =  mysqli_real_escape_string($con,$_POST['TenLoaiSP']);
    if($MaDanhMuc == "0")
    {
        ?>
        <script>
            alert("Chưa chọn danh mục");
        </script>
        <?php
    }
    else
    {
        //Check data
        $Find_Duplication_DM_Query = "SELECT * FROM loaisanpham WHERE TenLoaiSP = '$TenLoaiSP' && MaDanhMuc = '$MaDanhMuc'";
        $Find_Duplication_DM_Result = mysqli_query($con,$Find_Duplication_DM_Query) or die(mysqli_error($con));
        $rowfetch = mysqli_num_rows($Find_Duplication_DM_Result);
        if($rowfetch == 0)
        {
            //Insert data
            $Insert_NewLoaiSP_InDM_Query = "INSERT INTO `loaisanpham`(`TenLoaiSP`, `MaDanhMuc`) VALUES ('$TenLoaiSP','$MaDanhMuc')";
            $Insert_NewLoaiSP_InDM_Result = mysqli_query($con,$Insert_NewLoaiSP_InDM_Query) or die(mysqli_error($con));
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
                alert("Đã tồn tại");
            </script>
            <?php
        }
    }
?>