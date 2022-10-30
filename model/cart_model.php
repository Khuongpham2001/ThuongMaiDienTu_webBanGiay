<?php
    require '../connectdb/connect.php';

    $con = ketnoi();
    $MaTK = $_POST['MaTK'];
    $MaSanPham = $_POST['MaSP'];
    $Soluongmua = $_POST['Soluongmua'];
    $Query = "INSERT INTO `giohang`(`MaTK`, `MaSanPham`, `Soluongmua`,`TrangThai`) VALUES ('$MaTK','$MaSanPham','$Soluongmua','Thêm')";
    $Result = mysqli_query($con,$Query) or die(mysqli_error($con));

    echo json_encode(1);

    /*function getspdaco(){
        $con = ketnoi();
        $MaTK = $_POST['MaTK'];
        $MaSanPham = $_POST['MaSP'];
        $Soluongmua = $_POST['quantity'];
        $Query = "";
        $Result = mysqli_query($con, $Query);
        $num_row = mysqli_num_rows($Result);
        
        if($num_row!= 0){
            while($row = mysqli_fetch_assoc($Result)){
                $qty = $row["Soluongmua"];
                break;
            }
            return $qty;
        }
        
        return 0;
    }*/


?>