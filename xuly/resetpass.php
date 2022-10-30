<?php
    require '../connectdb/connect.php';
    $con = ketnoi();

    $MaTK = mysqli_real_escape_string($con,$_POST['MaTK']);
    $OldMK = mysqli_real_escape_string($con,$_POST['OldMK']);
    $NewMK = mysqli_real_escape_string($con,$_POST['NewMK']);
    $CheckMK = mysqli_real_escape_string($con,$_POST['CheckMK']);

    if($CheckMK != $NewMK)
    {
        ?>
        <script>
            alert("Mật khẩu nhập lại chưa đúng");
            document.location = '../resetpass.php';
        </script>
        <?php
    }
    else 
    {
        $Query = "UPDATE `taikhoan` SET `Password`='$NewMK' WHERE MaTK = '$MaTK'";
        $Result = mysqli_query($con,$Query) or die(mysqli_error($con));
        ?>
        <script>
            alert("Đổi mật khẩu thành công");
            document.location = '../info.php';
        </script>
        <?php
    }
?>