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
        <h1>Danh sách sản phẩm</h1>
        <div id="search_admin">
             <input type="text" id="search-text" placeholder="Tìm kiếm">
             <button id="search-btn" onclick="Search('SP')"><i class="fa-solid fa-magnifying-glass"></i></button>
             <span id="error-view" style="color:red; display:none; margin-left:10px">Không tìm thấy</span>
        </div>
        <table id="base-view">
            <tr>
                <th>Stt</th>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Danh mục</th>
                <th>Loại sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Mô tả sản phẩm</th>
                <th>Ảnh sản phẩm</th>
                <th>Ảnh mô tả</th>
                <th>Tùy biến</th>
            </tr>
            <?php
                $stt = 1;
                $query = "SELECT * FROM sanpham";
                $result = mysqli_query($con,$query) or die(mysqli_error($con));
                while($rows = mysqli_fetch_assoc($result))
                {
                    $query01 = "SELECT * FROM danhmuc WHERE MaDanhMuc = '$rows[MaDanhMuc]'";
                    $result01 = mysqli_query($con,$query01) or die(mysqli_error($con));
                    $rows01 = mysqli_fetch_assoc($result01);
                    $query02 = "SELECT * FROM loaisanpham WHERE MaLoaiSP = '$rows[MaLoaiSP]'";
                    $result02 = mysqli_query($con,$query02) or die(mysqli_error($con));
                    $rows02 = mysqli_fetch_assoc($result02);
                    ?>
                    <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $rows['MaSanPham']; ?></td>
                        <td><?php echo $rows['TenSanPham']; ?></td>
                        <td><?php echo $rows01['TenDanhMuc']; ?></td>
                        <td><?php echo $rows02['TenLoaiSP']; ?></td>
                        <td><?php echo $rows['Gia']; ?></td>
                        <td><?php echo $rows['MoTaSanPham']; ?></td>
                        <td><img src="../images/giay/<?php echo $rows['AnhSanPham']; ?>" style="width:100px"></td> 
                        <td>
                            <?php if($rows['AnhMoTa1'] != "")
                            {
                                ?>
                                    <img src="../images/giay/<?php echo $rows['AnhMoTa1']; ?>" style="width:70px">
                                <?php
                            }                                
                            ?>
                            <?php if($rows['AnhMoTa2'] != "")
                            {
                                ?>
                                    <img src="../images/giay/<?php  echo $rows['AnhMoTa2']; ?>" style="width:70px">
                                <?php
                            }
                            ?>
                            <?php if($rows['AnhMoTa3'] != "")
                            {
                                ?>
                                <img src="../images/giay/<?php  echo $rows['AnhMoTa3']; ?>" style="width:70px">
                                <?php
                            }
                            ?>
                        </td>
                        <td><a href="productedit.php?id=<?php echo $rows['MaSanPham']; ?>">Sửa</a>|<a href="../model/delete_model.php?place=SP&&id=<?php echo $rows['MaSanPham']; ?>">Xóa</a></td>
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