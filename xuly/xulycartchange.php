<?php
    require '../connectdb/connect.php';
    $con = ketnoi();
    session_start();

    //Get data
    $MaTK = $_SESSION['id'];
    $id_flag = 1;
    $counter = 0;
    for ($i = 0 ; $i < count($_POST['spname']); $i++)
    {
        $Soluongmua = $_POST['QT'.$id_flag]; 
        $MaSanPham = $_POST['spname'][$counter];
        $Update_Query = "UPDATE `giohang` SET `MaSanPham`='$MaSanPham',`Soluongmua`='$Soluongmua' WHERE MaTK = '$MaTK' AND MaSanPham = '$MaSanPham' AND TrangThai = 'Thêm'";
        $Update_Result = mysqli_query($con,$Update_Query) or die(mysqli_error($con));
        $id_flag++;
        $counter++;
    }
?>
<script>
    alert("Lưu thay đổi thành công");
    document.location = '../cart.php';
</script>





