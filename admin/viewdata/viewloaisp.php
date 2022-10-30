<?php
    require '../../connectdb/connect.php';
    $con = ketnoi();
    $MaDanhMuc = mysqli_real_escape_string($con,$_POST['MaDanhMuc']);
    $query = "SELECT * FROM loaisanpham WHERE MaDanhMuc = '$MaDanhMuc'";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
    $rowfetch = mysqli_num_rows($result);
    if($rowfetch > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            ?>
            <option value="<?php echo $row['MaLoaiSP'] ?>"><?php echo $row['TenLoaiSP'] ?></option>
            <?php
        }
    }  
    else
    {
        ?>
        <option value="">--Không có loại nào--</option>
        <?php
    }  
?>