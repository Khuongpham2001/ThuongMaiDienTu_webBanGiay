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
        <h1>Danh sách đơn hàng</h1>
        <div id="search_admin">
             <input type="text" id="search-text" placeholder="Tìm kiếm">
             <button id="search-btn" onclick="Search('DH')"><i class="fa-solid fa-magnifying-glass"></i></button>
             <span id="error-view" style="color:red; display:none; margin-left:10px">Không tìm thấy</span>
        </div>
        <table id="base-view">
            <tr>
                <th>Stt</th>
                <th>ID_user</th>
                <th>Tên người mua</th>
                <th>SDT</th>
                <th>Ngày mua</th>
                <th>Chi tiết</th>
                <th>Giao hàng</th>
                <th>Tình trạng</th>
            </tr>
            <?php
                $stt = 1;
                $Query = "SELECT * FROM donhang";
                $Result = mysqli_query($con,$Query) or die(mysqli_error($con));
                while ($kq = mysqli_fetch_assoc($Result))
                {
                    $MaTK = $kq['MaTK'];
                    ?>
                    <tr>
                        <td><?php echo $stt; ?></td>
                        <td><?php echo $kq['MaTK']; ?></td>
                        <td><?php echo $kq['HoTen']; ?></td>
                        <td><?php echo $kq['SDT']; ?></td>
                        <td><?php echo $kq['NgayLap']; ?></td>
                        <td>
                            <button style="width:60px; cursor:pointer;background-color: rgb(241, 79, 79);">
                                <a href="ctdonhang.php?dhid=<?php echo $kq['MaDonHang'];?>" style="display:block">Chi tiết</a>
                            </button>
                        </td>
                        <td>
                            <?php
                                if($kq['TinhTrangGiao'] == "Chưa Giao")
                                {
                                    ?>
                                    <button style="width:80px; cursor:pointer;background-color: rgb(23, 221, 23);border:none;padding:4px;border-radius: 2px;">
                                        <a onclick="GiaoHang(<?php echo $kq['MaDonHang'];?>)" style="display:block">Giao hàng</a>
                                    </button>
                                    <button style="width:80px; cursor:pointer;background-color: rgb(241, 79, 79);margin:2px 0;border:none;padding:4px;border-radius: 2px;">
                                        <a onclick="HuyDon(<?php echo $kq['MaDonHang'];?>)"  style="display:block">Hủy đơn</a>
                                    </button>
                                    <?php
                                }
                            ?>
                        </td>
                        <td><?php echo $kq['TinhTrangGiao']; ?></td>
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
    function GiaoHang(id){
        $.post("../model/donhang_model.php", {MaDonHang: id ,Request: "Ship"} , function(returndata){
            alert("Giao Hàng thành công");
            document.location = "donhang.php";
        })
    }
    function HuyDon(id){
        $.post("../model/donhang_model.php", {MaDonHang: id ,Request: "Cancel"} , function(returndata){
            alert("Hủy thành công");
            document.location = "donhang.php";
        })
    }
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