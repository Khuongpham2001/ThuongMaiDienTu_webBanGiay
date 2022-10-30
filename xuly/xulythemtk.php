<?php
    $Email = mysqli_real_escape_string($con,$_POST['Email']);
    $Username = mysqli_real_escape_string($con,$_POST['Username']);
    $Password = mysqli_real_escape_string($con,$_POST['Password']);
    $Role = mysqli_real_escape_string($con,$_POST['Role']);

    if($Role == "")
    {
        ?>
        <script>
            alert("Chưa chọn role");
        </script>
        <?php
    }
    else
    {
        $Check_duplication_query = "SELECT * FROM taikhoan WHERE Email = '$Email'";
        $Check_duplication_result = mysqli_query($con,$Check_duplication_query) or die(mysqli_error($con));
        if(mysqli_num_rows($Check_duplication_result) == 0)
        {
            $Insert_NewAccount_Query = "INSERT INTO `taikhoan`(`Username`, `Email`, `Password`, `Role`) VALUES ('$Username','$Email','$Password','$Role')";
            $Insert_NewAccount_Result = mysqli_query($con,$Insert_NewAccount_Query) or die(mysqli_error($con));
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
                alert("Tài khoản đã tồn tại");
            </script>
            <?php
        }
    }
?>