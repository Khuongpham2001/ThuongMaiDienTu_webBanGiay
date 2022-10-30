<?php
    require '../../connectdb/connect.php';
    $con = ketnoi();
    $Place = mysqli_real_escape_string($con,$_POST['Place']);
    $TuKhoa = mysqli_real_escape_string($con,$_POST['TuKhoa']);
    switch($Place)
    {
        case 'SP':
        {
            $Query = "SELECT * FROM sanpham WHERE TenSanPham = '$TuKhoa'";
            $Result = mysqli_query($con,$Query) or die(mysqli_error($con));
            if (mysqli_num_rows($Result) > 0)
            {
                $stt = 1;
                ?>
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
                while ($kq = mysqli_fetch_assoc($Result))
                {
                    $query01 = "SELECT * FROM danhmuc WHERE MaDanhMuc = '$kq[MaDanhMuc]'";
                    $result01 = mysqli_query($con,$query01) or die(mysqli_error($con));
                    $kq01 = mysqli_fetch_assoc($result01);
                    $query02 = "SELECT * FROM loaisanpham WHERE MaLoaiSP = '$kq[MaLoaiSP]'";
                    $result02 = mysqli_query($con,$query02) or die(mysqli_error($con));
                    $kq02 = mysqli_fetch_assoc($result02);
                    ?>
                    <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $kq['MaSanPham']; ?></td>
                        <td><?php echo $kq['TenSanPham']; ?></td>
                        <td><?php echo $kq01['TenDanhMuc']; ?></td>
                        <td><?php echo $kq02['TenLoaiSP']; ?></td>
                        <td><?php echo $kq['Gia']; ?></td>
                        <td><?php echo $kq['MoTaSanPham']; ?></td>
                        <td><img src="../images/giay/<?php echo $kq['AnhSanPham']; ?>" style="width:100px"></td> 
                        <td>
                            <?php if($kq['AnhMoTa1'] != "")
                            {
                                ?>
                                    <img src="../images/giay/<?php echo $kq['AnhMoTa1']; ?>" style="width:70px">
                                <?php
                            }                                
                            ?>
                            <?php if($kq['AnhMoTa2'] != "")
                            {
                                ?>
                                    <img src="../images/giay/<?php  echo $kq['AnhMoTa2']; ?>" style="width:70px">
                                <?php
                            }
                            ?>
                            <?php if($kq['AnhMoTa3'] != "")
                            {
                                ?>
                                <img src="../images/giay/<?php  echo $kq['AnhMoTa3']; ?>" style="width:70px">
                                <?php
                            }
                            ?>
                        </td>
                        <td><a href="productedit.php?id=<?php echo $kq['MaSanPham']; ?>">Sửa</a>|<a href="../model/delete_model.php?place=SP&&id=<?php echo $kq['MaSanPham']; ?>">Xóa</a></td>
                    </tr>
                    <?php
                }
            }
            break;
        }
        case 'KH':
        {
            $Query = "SELECT * FROM khachhang WHERE TenKhachHang = '$TuKhoa'";
            $Result = mysqli_query($con,$Query) or die(mysqli_error($con));
            if (mysqli_num_rows($Result) > 0)
            {
                $stt = 1;
                ?>
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
                while ($kq = mysqli_fetch_assoc($Result))
                {
                    $MaTK = $kq['MaTK'];
                    $Query01 = "SELECT * FROM taikhoan WHERE MaTK = '$MaTK'";
                    $Result01 = mysqli_query($con,$Query01) or die(mysqli_error($con));
                    $kq01 = mysqli_fetch_assoc($Result01);
                    ?>
                    <tr>
                        <td><?php echo $stt; ?></td>
                        <td><?php echo $kq['MaKhachHang']; ?></td>
                        <td><?php echo $kq['TenKhachHang']; ?></td>
                        <td><?php echo $kq['SDT']; ?></td>
                        <td><?php echo $kq01['Email']; ?></td>
                        <td><?php echo $kq['DiaChi']; ?></td>
                        <td><a href="guessedit.php?id=<?php echo $kq['MaKhachHang']; ?>">Sửa</a>|<a href="../model/delete_model.php?place=KH&&id=<?php echo $kq['MaKhachHang'];?>">Xóa</a></td>
                    </tr>
                    <?php
                }
            }
            break;
        }
        case 'TK':
        {
            $Query = "SELECT * FROM taikhoan WHERE Email = '$TuKhoa'";
            $Result = mysqli_query($con,$Query) or die(mysqli_error($con));
            if (mysqli_num_rows($Result) > 0)
            {
                $stt = 1;
                ?>
                <tr>
                    <th>Stt</th>
                    <th>ID</th>
                    <th>Email khách hàng</th>
                    <th>Password</th>
                    <th>Role</th>  
                    <th>Tùy chọn</th>            
                </tr>
                <?php
                while ($kq = mysqli_fetch_assoc($Result))
                {
                    ?>
                    <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $kq['MaTK'];?></td>
                        <td><?php echo $kq['Email'];?></td>
                        <td><?php echo $kq['Password'];?></td>
                        <td><?php echo $kq['Role'];?></td>
                        <td><a href="tkedit.php?id=<?php echo $kq['MaTK'] ?>">Sửa</a>|<a href="../model/delete_model.php?place=TK&&id=<?php echo $kq['MaTK'];?>">Xóa</a></td>
                    </tr>
                    <?php
                }
            }
            else
            {
                $Query01 = "SELECT * FROM taikhoan WHERE Role = '$TuKhoa'";
                $Result01 = mysqli_query($con,$Query01) or die(mysqli_error($con));
                if (mysqli_num_rows($Result01) > 0)
                {
                    $stt = 1;
                    ?>
                    <tr>
                        <th>Stt</th>
                        <th>ID</th>
                        <th>Email khách hàng</th>
                        <th>Password</th>
                        <th>Role</th>  
                        <th>Tùy chọn</th>            
                    </tr>
                    <?php
                    while ($kq01 = mysqli_fetch_assoc($Result01))
                    {
                        ?>
                        <tr>
                            <td><?php echo $stt ?></td>
                            <td><?php echo $kq01['MaTK'];?></td>
                            <td><?php echo $kq01['Email'];?></td>
                            <td><?php echo $kq01['Password'];?></td>
                            <td><?php echo $kq01['Role'];?></td>
                            <td><a href="tkedit.php?id=<?php echo $kq01['MaTK'] ?>">Sửa</a>|<a href="../model/delete_model.php?place=TK&&id=<?php echo $kq01['MaTK'];?>">Xóa</a></td>
                        </tr>
                        <?php
                    }
                }
            }
            break;
        }
        case 'DH':
        {
            $Query = "SELECT * FROM donhang WHERE HoTen = '$TuKhoa'";
            $Result = mysqli_query($con,$Query) or die(mysqli_error($con));
            if (mysqli_num_rows($Result) > 0)
            {
                $stt = 1;
                ?>
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
            }
            break;
        }
    }
?>