-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 17, 2020 lúc 12:09 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlytiendien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã hóa đơn',
  `MaKH` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã khách hàng',
  `NgayThanhToan` date NOT NULL COMMENT 'Ngày thanh toán',
  `ChiSoCu` int(11) NOT NULL COMMENT 'Chỉ số cũ',
  `ChiSoMoi` int(11) NOT NULL COMMENT 'Chỉ số mới',
  `SoKwh` int(11) NOT NULL COMMENT 'Số kwh',
  `TongTien` int(11) NOT NULL COMMENT 'Tổng tiền cần thanh toán',
  `TrangThai` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Trạng thái đã thanh toán hay chưa thanh toán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã khách hàng',
  `TenKH` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên khách hàng',
  `NgaySinh` date NOT NULL COMMENT 'Ngày sinh',
  `Email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Địa chỉ',
  `SDT` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Số điện thoại',
  `MaThe` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã thẻ ngân hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bẫy `khachhang`
--
DELIMITER $$
CREATE TRIGGER `delete_kh_user` AFTER DELETE ON `khachhang` FOR EACH ROW DELETE FROM user WHERE userID = OLD.MaKH
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_kh_user` AFTER INSERT ON `khachhang` FOR EACH ROW INSERT INTO user VALUES(NEW.MaKH,NEW.MaKH,NEW.TenKH,'KH')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_kh_user` AFTER UPDATE ON `khachhang` FOR EACH ROW UPDATE user SET userID = NEW.MaKH, PASSWORD = NEW.MaKH , name = NEW.TenKH WHERE userID = OLD.MaKH
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanly`
--

CREATE TABLE `quanly` (
  `MaQL` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã quản lý',
  `TenQL` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên quản lý',
  `NgaySinh` date NOT NULL COMMENT 'Ngày sinh',
  `DiaChi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Địa chỉ',
  `SDT` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Số điện thoại'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quanly`
--

INSERT INTO `quanly` (`MaQL`, `TenQL`, `NgaySinh`, `DiaChi`, `SDT`) VALUES
('ADMIN', 'Phạm Thế Sơn', '1999-01-15', 'Nam Định', '1312313');

--
-- Bẫy `quanly`
--
DELIMITER $$
CREATE TRIGGER `delete_ql_user` AFTER DELETE ON `quanly` FOR EACH ROW DELETE FROM user WHERE userID=OLD.MaQL
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_ql_user` AFTER INSERT ON `quanly` FOR EACH ROW INSERT INTO user VALUES(NEW.MaQL,NEW.MaQL,NEW.TenQL,'QL')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_ql_user` AFTER UPDATE ON `quanly` FOR EACH ROW UPDATE user set userID = NEW.MaQL, PASSWORD = NEW.MaQL WHERE userID = OLD.MaQL
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoannganhang`
--

CREATE TABLE `taikhoannganhang` (
  `MaThe` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã thẻ',
  `MatKhau` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mật khẩu',
  `TongTien` int(11) NOT NULL COMMENT 'Tổng số tiền trong thẻ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoannganhang`
--

INSERT INTO `taikhoannganhang` (`MaThe`, `MatKhau`, `TongTien`) VALUES
('12235656756756756', '1223', 0);

--
-- Bẫy `taikhoannganhang`
--
DELIMITER $$
CREATE TRIGGER `update_taikhoan` BEFORE UPDATE ON `taikhoannganhang` FOR EACH ROW UPDATE taikhoannganhang set taikhoannganhang.MatKhau = NEW.MaThe WHERE taikhoannganhang.MaThe = NEW.MaThe
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtinthe`
--

CREATE TABLE `thongtinthe` (
  `MaThe` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã thẻ ngân hàng',
  `TenChuThe` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên chủ thẻ',
  `NgaySinh` date NOT NULL COMMENT 'Ngày sinh',
  `DiaChi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Địa chỉ',
  `SDT` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Số điện thoại'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongtinthe`
--

INSERT INTO `thongtinthe` (`MaThe`, `TenChuThe`, `NgaySinh`, `DiaChi`, `SDT`) VALUES
('12235656756756756', 'ádaada', '2020-04-09', 'ádasdasd', 'ádasdas');

--
-- Bẫy `thongtinthe`
--
DELIMITER $$
CREATE TRIGGER `insert_taiKhoannganhang` AFTER INSERT ON `thongtinthe` FOR EACH ROW INSERT INTO taikhoannganhang VALUES(NEW.MaThe,NEW.MaThe,0)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `userID` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên tài khoản',
  `passWord` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mật khẩu',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Phân quyền'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`userID`, `passWord`, `name`, `role`) VALUES
('123', '14', 'Phạm Thế Sơn', 'KH'),
('ADMIN', 'ADMIN', 'Phạm Thế Sơn', 'QL'),
('SonPT', '134324', 'con cho', 'KH');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `MaKH` (`MaKH`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`),
  ADD KEY `MaThe` (`MaThe`);

--
-- Chỉ mục cho bảng `quanly`
--
ALTER TABLE `quanly`
  ADD PRIMARY KEY (`MaQL`);

--
-- Chỉ mục cho bảng `taikhoannganhang`
--
ALTER TABLE `taikhoannganhang`
  ADD PRIMARY KEY (`MaThe`);

--
-- Chỉ mục cho bảng `thongtinthe`
--
ALTER TABLE `thongtinthe`
  ADD PRIMARY KEY (`MaThe`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_ibfk_1` FOREIGN KEY (`MaThe`) REFERENCES `thongtinthe` (`MaThe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `taikhoannganhang`
--
ALTER TABLE `taikhoannganhang`
  ADD CONSTRAINT `taikhoannganhang_ibfk_1` FOREIGN KEY (`MaThe`) REFERENCES `thongtinthe` (`MaThe`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
