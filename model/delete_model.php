<?php
    require '../connectdb/connect.php';
    $con = ketnoi();
    $Place = $_GET['place'];
    $id = $_GET['id'];
    switch($Place)
    {
        case 'DM':
        {
            $Delete_DM_Query = "DELETE FROM `danhmuc` WHERE MaDanhMuc = '$id'";
            $Delete_DM_Result = mysqli_query($con,$Delete_DM_Query) or die(mysqli_error($con));
            ?>
            <script>
                alert("Xóa thành công");
                document.location = '../admin/cartegorylist.php';
            </script>
            <?php
            break;
        }
        case 'SPType':
        {
            $Delete_LoaiSP_Query = "DELETE FROM `loaisanpham` WHERE MaLoaiSP = '$id'";
            $Delete_LoaiSP_Result = mysqli_query($con,$Delete_LoaiSP_Query) or die(mysqli_error($con));
            ?>
            <script>
                alert("Xóa thành công");
                document.location = '../admin/brandlist.php';
            </script>
            <?php
            break;
        }
        case 'KM':
        {
            $Delete_KM_Query = "DELETE FROM khuyenmai WHERE MaKhuyenMai = '$id'";
            $Delete_KM_Result = mysqli_query($con,$Delete_KM_Query) or die(mysqli_error($con));
            ?>
            <script>
                alert("Xóa thành công");
                document.location = '../admin/salelist.php';
            </script>
            <?php
            break;
        }
        case 'KH':
        {   
            $Delete_KH_Query = "DELETE FROM khachhang WHERE MaKhachHang = '$id'";
            $Delete_KH_Result = mysqli_query($con,$Delete_KH_Query) or die(mysqli_error($con));
            ?>
            <script>
                alert("Xóa thành công");
                document.location = '../admin/guesslist.php';
            </script>
            <?php
            break;
        }
        case 'TK':
        {
            $Delete_TK_Query = "DELETE FROM taikhoan WHERE MaTK = '$id'";
            $Delete_TK_Result = mysqli_query($con,$Delete_TK_Query) or die(mysqli_error($con));
            ?>
            <script>
                alert("Xóa thành công");
                document.location = '../admin/tklist.php';
            </script>
            <?php
            break;
        }
        case 'SP':
        {   
            $Delete_SP_Query = "DELETE FROM sanpham WHERE MaSanPham = '$id'";
            $Delete_SP_Result = mysqli_query($con,$Delete_SP_Query) or die(mysqli_error($con));
            ?>
            <script>
                alert("Xóa thành công");
                document.location = '../admin/productlist.php';
            </script>
            <?php
            break;
        }
        case 'GH':
        {
            $Delete_GH_Query = "DELETE FROM giohang WHERE MaGioHang = '$id'";
            $Delete_GH_Result = mysqli_query($con,$Delete_GH_Query) or die(mysqli_error($con));
            ?>
            <script>
                alert("Xóa thành công");
                document.location = '../cart.php';
            </script>
            <?php
            break;
        }
    }
?>