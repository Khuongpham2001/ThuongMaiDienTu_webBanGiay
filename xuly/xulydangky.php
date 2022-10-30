<?php
    //get data 
    $Username = mysqli_real_escape_string($con, $_POST['Username']);
    $Email = mysqli_real_escape_string($con,$_POST['Email']);
    $Password = mysqli_real_escape_string($con,$_POST['Password']);
    $CheckPassword = mysqli_real_escape_string($con,$_POST['CheckPassword']);
    //check email
    $user_authentication_query = "SELECT * FROM taikhoan WHERE Email = '$Email'";
    $user_authentication_result = mysqli_query($con, $user_authentication_query) or die(mysqli_error($con));
    $rows_fetched = mysqli_num_rows($user_authentication_result);
    if($rows_fetched == 0)
    {
        //check password
        if($CheckPassword != $Password)
        {
            ?>
            <script>
                alert("Mật khẩu nhập lại chưa đúng");
            </script>
            <?php
        }
        else
        {
            $Role = "User";
            $Insert_NewAccount_Query = "INSERT INTO `taikhoan`(`Username`, `Email`, `Password`, `Role`) VALUES ('$Username','$Email','$Password','$Role')";
            $Insert_NewAccount_Result = mysqli_query($con,$Insert_NewAccount_Query) or die(mysqli_error($con));
            ?>
            <script>
                alert("Đăng ký thành công");
                document.location = "./login.php";
            </script>
            <?php
        }
    }
    else
    {
        ?>
        <script>
            alert("Email đã được sử dụng");
        </script>
        <?php
    }
?>