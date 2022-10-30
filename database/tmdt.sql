-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 02, 2022 lúc 11:24 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.31

CREATE DATABASE tmdt;
use tmdt;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tmdt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `MaDonHang` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `SoLuongMua` int(11) NOT NULL,
  `TriGia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`MaDonHang`, `MaSanPham`, `SoLuongMua`, `TriGia`) VALUES
(2, 10, 1, 360000),
(2, 3, 1, 360000),
(2, 7, 1, 600000),
(3, 10, 1, 360000),
(3, 4, 1, 400000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MaHoaDon` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `Gia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`MaHoaDon`, `MaSanPham`, `SoLuong`, `Gia`) VALUES
(1, 10, 1, 360000),
(1, 9, 1, 360000),
(1, 2, 1, 600000),
(2, 7, 2, 1200000),
(2, 4, 1, 400000),
(5, 10, 1, 360000),
(5, 3, 1, 360000),
(5, 7, 1, 600000),
(6, 10, 1, 360000),
(6, 4, 1, 400000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `MaDanhMuc` int(11) NOT NULL,
  `TenDanhMuc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`MaDanhMuc`, `TenDanhMuc`) VALUES
(1, 'Nữ'),
(2, 'Nam'),
(3, 'Trẻ em');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `MaDonHang` int(11) NOT NULL,
  `NgayLap` varchar(255) NOT NULL,
  `SoSanPham` int(11) NOT NULL,
  `TongTriGia` float NOT NULL,
  `TinhTrangGiao` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `HoTen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `SDT` varchar(255) NOT NULL,
  `DiaChi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `MaTK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`MaDonHang`, `NgayLap`, `SoSanPham`, `TongTriGia`, `TinhTrangGiao`, `HoTen`, `SDT`, `DiaChi`, `MaTK`) VALUES
(2, '02/06/2022', 3, 1188000, 'Đã Giao', 'ABC', '123456', '100 Văn Thân , P10 , Q8', 2),
(3, '02/06/2022', 2, 684000, 'Đã Hủy', 'ABC', '123456', '88 Văn Thân , P10 , Q8', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `MaGioHang` int(11) NOT NULL,
  `MaTK` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `Soluongmua` int(11) NOT NULL,
  `TrangThai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`MaGioHang`, `MaTK`, `MaSanPham`, `Soluongmua`, `TrangThai`) VALUES
(1, 2, 10, 1, 'Thanh Toán'),
(7, 2, 9, 1, 'Thanh Toán'),
(10, 2, 2, 1, 'Thanh Toán'),
(11, 3, 7, 2, 'Ship'),
(12, 3, 4, 1, 'Ship'),
(14, 3, 10, 1, 'Thêm'),
(15, 3, 9, 2, 'Thêm'),
(16, 2, 10, 1, 'Thanh Toán'),
(17, 2, 3, 1, 'Thanh Toán'),
(18, 2, 7, 1, 'Thanh Toán'),
(19, 2, 10, 1, 'Thanh Toán'),
(20, 2, 4, 1, 'Thanh Toán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHoaDon` int(11) NOT NULL,
  `MaTK` int(11) NOT NULL,
  `Tong` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MaHoaDon`, `MaTK`, `Tong`) VALUES
(1, 2, 1188000),
(2, 3, 1600000),
(5, 2, 1188000),
(6, 2, 684000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKhachHang` int(11) NOT NULL,
  `TenKhachHang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `SDT` varchar(255) NOT NULL,
  `DiaChi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `MaTK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKhachHang`, `TenKhachHang`, `SDT`, `DiaChi`, `MaTK`) VALUES
(1, 'Nhoxsox', '09123456799', '123 Phạm Phú Thứ , P12 , Q8', 2),
(3, 'Tân', '09123456789', '30B Cao Thắng , P10 , Q10', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `MaKhuyenMai` varchar(255) NOT NULL,
  `PhanTramKM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`MaKhuyenMai`, `PhanTramKM`) VALUES
('KM001', 10),
('KM002', 20),
('KM003', 30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `MaLoaiSP` int(11) NOT NULL,
  `TenLoaiSP` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `MaDanhMuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`MaLoaiSP`, `TenLoaiSP`, `MaDanhMuc`) VALUES
(1, 'Loại 1', 3),
(3, 'Loại 1', 2),
(4, 'Giày sneaker', 1),
(5, 'Giày sandal', 1),
(6, 'Giày cao gót', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSanPham` int(11) NOT NULL,
  `TenSanPham` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Size` float NOT NULL,
  `Gia` float NOT NULL,
  `MoTaSanPham` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `AnhSanPham` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `AnhMoTa1` varchar(255) DEFAULT NULL,
  `AnhMoTa2` varchar(255) DEFAULT NULL,
  `AnhMoTa3` varchar(255) DEFAULT NULL,
  `MaDanhMuc` int(11) DEFAULT NULL,
  `MaKhuyenMai` varchar(255) DEFAULT NULL,
  `MaLoaiSP` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSanPham`, `TenSanPham`, `Size`, `Gia`, `MoTaSanPham`, `AnhSanPham`, `AnhMoTa1`, `AnhMoTa2`, `AnhMoTa3`, `MaDanhMuc`, `MaKhuyenMai`, `MaLoaiSP`) VALUES
(1, 'GIÀY SANDAL CỔ CAO MS NU00001', 38, 500000, 'Giày chất lượng', 'Nu3_1.jpg', 'Nu3_2.jpg', 'Nu3_3.jpg', 'Nu3_4.jpg', 1, 'KM001', 5),
(2, 'GIÀY SANDAL CỔ CAO MS NU00002', 36, 600000, 'Giày đẹp', 'Nu1_6.jpg', 'Nu1_2.jpg', 'Nu1_3.jpg', '', 1, NULL, 5),
(3, 'GIÀY SANDAL CỔ CAO MS NU00003', 37, 400000, 'Giày rất đẹp', 'Nu2_1.jpg', 'Nu2_2.jpg', 'Nu2_3.jpg', '', 1, 'KM001', 5),
(4, 'GIÀY SANDAL CỔ CAO MS NU00004', 35, 400000, 'Giày đẹp', 'Nu4_1.jpg', 'Nu4_2.jpg', 'Nu4_3.jpg', '', 1, NULL, 5),
(5, 'GIÀY SANDAL CỔ CAO MS NU00005', 38, 600000, 'Giày đẹp', 'Nu7_1.jpg', 'Nu7_2.jpg', 'Nu7_3.jpg', 'Nu7_4.jpg', 1, 'KM002', 5),
(6, 'GIÀY SANDAL CỔ CAO MS NU00006', 36, 400000, 'Giày chất lượng', 'Nu6_1.jpg', 'Nu6_2.jpg', 'Nu6_3.jpg', 'Nu6_4.jpg', 1, 'KM001', 5),
(7, 'GIÀY SANDAL CỔ CAO MS NU00007', 39, 600000, 'Giày đẹp ', 'Nu5_1.jpg', 'Nu5_2.jpg', 'Nu5_3.jpg', 'Nu5_4.jpg', 1, NULL, 5),
(9, 'GIÀY ĐẸP NAM00001', 38, 400000, 'Giày hot', 'Nam6_1.jpg', 'Nam6_2.jpg', 'Nam6_3.jpg', 'Nam6_4.jpg', 2, 'KM001', 3),
(10, 'GIÀY ĐẸP NAM00002', 36, 400000, 'DADSDA', 'Nam7_1.jpg', 'Nam7_2.jpg', 'Nam7_3.jpg', '', 2, 'KM001', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTK` int(11) NOT NULL,
  `Username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`MaTK`, `Username`, `Email`, `Password`, `Role`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', 'Admin'),
(2, 'Thụy', 'test01@gmail.com', '123456', 'User'),
(3, 'ABC', 'test02@gmail.com', '123456789', 'User'),
(5, 'NewManager01', 'admin01@gmail.com', '123456789', 'Admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD KEY `MaDonHang` (`MaDonHang`),
  ADD KEY `MaSanPham` (`MaSanPham`);

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD KEY `MaHoaDon` (`MaHoaDon`),
  ADD KEY `MaSanPham` (`MaSanPham`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`MaDanhMuc`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDonHang`),
  ADD KEY `MaTK` (`MaTK`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`MaGioHang`),
  ADD KEY `MaTK` (`MaTK`),
  ADD KEY `MaSanPham` (`MaSanPham`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHoaDon`),
  ADD KEY `MaTK` (`MaTK`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKhachHang`),
  ADD KEY `MaTK` (`MaTK`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`MaKhuyenMai`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`MaLoaiSP`),
  ADD KEY `MaDanhMuc` (`MaDanhMuc`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSanPham`),
  ADD KEY `MaDanhMuc` (`MaDanhMuc`),
  ADD KEY `MaLoaiSP` (`MaLoaiSP`),
  ADD KEY `MaKhuyenMai` (`MaKhuyenMai`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTK`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `MaDanhMuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MaDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `MaGioHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKhachHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `MaLoaiSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`MaDonHang`) REFERENCES `donhang` (`MaDonHang`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`);

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`MaHoaDon`) REFERENCES `hoadon` (`MaHoaDon`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`MaTK`) REFERENCES `taikhoan` (`MaTK`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`MaTK`) REFERENCES `taikhoan` (`MaTK`),
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MaTK`) REFERENCES `taikhoan` (`MaTK`);

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_ibfk_1` FOREIGN KEY (`MaTK`) REFERENCES `taikhoan` (`MaTK`);

--
-- Các ràng buộc cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD CONSTRAINT `loaisanpham_ibfk_1` FOREIGN KEY (`MaDanhMuc`) REFERENCES `danhmuc` (`MaDanhMuc`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaDanhMuc`) REFERENCES `danhmuc` (`MaDanhMuc`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`MaLoaiSP`) REFERENCES `loaisanpham` (`MaLoaiSP`),
  ADD CONSTRAINT `sanpham_ibfk_3` FOREIGN KEY (`MaKhuyenMai`) REFERENCES `khuyenmai` (`MaKhuyenMai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
