<?php
include "header.php";
include "slider.php";
require '../connectdb/connect.php';
$con = ketnoi();
session_start();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="admin-content-right">
    <div class="admin-content-right-cartegory_list">
        <h1>Danh sách khách hàng</h1>
        <div id="search_admin">
             <input type="text" id="search-text" placeholder="Tìm kiếm">
             <button id="search-btn" onclick="Search('KH')"><i class="fa-solid fa-magnifying-glass"></i></button>
             <span id="error-view" style="color:red; display:none; margin-left:10px">Không tìm thấy</span>
        </div>
        <table id="base-view">
            <tr>
                <th>Stt</th>
                <th>ID</th>
                <th>Tên khách hàng</th>
                <th>Sdt</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Tùy biến</th>
            </tr>
            <?php
                $stt = 1;
                $Query = "SELECT * FROM khachhang";
                $Result = mysqli_query($con,$Query) or die(mysqli_error($con));
                while($rows = mysqli_fetch_assoc($Result))
                {
                    $MaTK = $rows['MaTK'];
                    $Query01 = "SELECT * FROM taikhoan WHERE MaTK = '$MaTK'";
                    $Result01 = mysqli_query($con,$Query01) or die(mysqli_error($con));
                    $row01 = mysqli_fetch_assoc($Result01);
                    ?>
                    <tr>
                        <td><?php echo $stt; ?></td>
                        <td><?php echo $rows['MaKhachHang']; ?></td>
                        <td><?php echo $rows['TenKhachHang']; ?></td>
                        <td><?php echo $rows['SDT']; ?></td>
                        <td><?php echo $row01['Email']; ?></td>
                        <td><?php echo $rows['DiaChi']; ?></td>
                        <td><a href="guessedit.php?id=<?php echo $rows['MaKhachHang']; ?>">Sửa</a>|<a href="../model/delete_model.php?place=KH&&id=<?php echo $rows['MaKhachHang'];?>">Xóa</a></td>
                    </tr>
                    <?php
                    $stt++;
                }
            ?>
        </table>
        <table id="search-view" style="display:none;">

        </table>
    </div>
</div>
</section>
</body>
<script type="text/javascript">
    function Search(PlaceCode)
    {
       var search_string = document.getElementById("search-text").value;
       if (search_string != "")
       {
            $.post("./viewdata/search_view.php", {TuKhoa: search_string , Place: PlaceCode} , function(returndata) {
                if(returndata == "")
                {
                    document.getElementById("error-view").style.display = "";
                    document.getElementById("base-view").style.display = "";
                    document.getElementById("search-view").style.display = "none";
                }
                else 
                {
                    document.getElementById("error-view").style.display = "none";
                    document.getElementById("base-view").style.display = 'none';
                    document.getElementById("search-view").style.display = "";
                    $("#search-view").html(returndata);
                }
            })
       }
       else
       {
            document.getElementById("error-view").style.display = "none";
            document.getElementById("base-view").style.display = "";
            document.getElementById("search-view").style.display = "none";
       }
    }
</script>
</html>