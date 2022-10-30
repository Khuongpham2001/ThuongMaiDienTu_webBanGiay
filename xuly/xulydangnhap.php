<?php
    //get data
    $Email = mysqli_real_escape_string($con,$_POST['Email']);
    $Password = mysqli_real_escape_string($con,$_POST['Password']);
    //check account
    $user_authentication_query = "SELECT * FROM taikhoan WHERE Email = '$Email' AND Password = '$Password'";
    $user_authentication_result = mysqli_query($con, $user_authentication_query) or die(mysqli_error($con));
    $rows_fetched = mysqli_num_rows($user_authentication_result);
    if($rows_fetched == 0)
    {
        ?>
        <script>
            alert("Tài khoản hoặc mật khẩu chưa đúng");
        </script>
        <?php
    }
    else
    {
        $row = mysqli_fetch_assoc($user_authentication_result);
        if($row['Role'] == 'Admin'){
            $_SESSION['username'] = $row['Username'];
            $_SESSION['password'] = $Password;
            $_SESSION['email'] = $Email;
            $_SESSION['id'] = $row['MaTK'];
            $_SESSION['role'] = $row['Role'];
            $_SESSION['active'] = 'yes';
            header('location:./admin/cartegoryadd.php');
        }
        else{
            $_SESSION['username'] = $row['Username'];
            $_SESSION['password'] = $Password;
            $_SESSION['email'] = $Email;
            $_SESSION['id'] = $row['MaTK'];
            $_SESSION['role'] = $row['Role'];
            $_SESSION['active'] = 'yes';
            header('location:./index.php');
        }
    }
?>