<?php
    //Get data
    $MaDanhMuc = $_GET['id'];
    $TenDanhMucMoi = mysqli_real_escape_string($con,$_POST['NewName']);
    $Find_duplicationDM_Query = "SELECT * FROM `danhmuc` WHERE TenDanhMuc = '$TenDanhMucMoi'";
    $Find_duplicationDM_Result = mysqli_query($con,$Find_duplicationDM_Query) or die(mysqli_error($con));
    $rowfetch = mysqli_num_rows($Find_duplicationDM_Result);
    if($rowfetch == 0)
    {
        //Update data value
        $Update_DMName_Query = "UPDATE `danhmuc` SET `TenDanhMuc`='$TenDanhMucMoi' WHERE MaDanhMuc = '$MaDanhMuc'";
        $Update_DMName_Result = mysqli_query($con,$Update_DMName_Query) or die(mysqli_error($con));
        ?>
        <script>
            alert("Sửa thành công");
            document.location = './cartegorylist.php';
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