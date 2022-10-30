<?php
    $Email = mysqli_real_escape_string($con,$_POST['Email']);
    $Username = mysqli_real_escape_string($con,$_POST['Username']);
    $Password = mysqli_real_escape_string($con,$_POST['Password']);
    $Role = mysqli_real_escape_string($con,$_POST['Role']);
    $MaTK = $_GET['id'];

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
        $Check_duplication_query = "SELECT * FROM taikhoan WHERE Email = '$Email' AND MaTK != '$MaTK'";
        $Check_duplication_result = mysqli_query($con,$Check_duplication_query) or die(mysqli_error($con));
        if(mysqli_num_rows($Check_duplication_result) == 0)
        {
            $Update_Account_Query = "UPDATE `taikhoan` SET `Username`='$Username',`Email`='$Email',`Password`='$Password',`Role`='$Role' WHERE MaTK = '$MaTK'";
            $Update_Account_Result = mysqli_query($con,$Update_Account_Query) or die(mysqli_error($con));
            ?>
            <script>
                alert("Sửa thành công");
                document.location = './tklist.php'
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