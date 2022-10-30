<?php
    //get data
    $TenDanhMuc = mysqli_real_escape_string($con,$_POST['TenDanhMuc']);
    //Check trùng
    $Find_duplicationDM_Query = "SELECT * FROM `danhmuc` WHERE TenDanhMuc = '$TenDanhMuc'";
    $Find_duplicationDM_Result = mysqli_query($con,$Find_duplicationDM_Query) or die(mysqli_error($con));
    $rowfetch = mysqli_num_rows($Find_duplicationDM_Result);
    if($rowfetch == 0)
    {
        //Insert danh mục mới
        $Insert_NewDM_Query = "INSERT INTO `danhmuc`(`TenDanhMuc`) VALUES ('$TenDanhMuc')";
        $Insert_NewDM_Result = mysqli_query($con,$Insert_NewDM_Query) or die(mysqli_error($con));
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
            alert("Danh mục đã tồn tại");
        </script>
        <?php
    }
?>