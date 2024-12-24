-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 09, 2024 lúc 05:31 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_ban_sua`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bang_tam`
--

CREATE TABLE `bang_tam` (
  `Ma_sua` varchar(6) NOT NULL,
  `Ten_sua` varchar(50) NOT NULL,
  `Ma_hang_sua` varchar(20) NOT NULL,
  `Ma_loai_sua` varchar(3) NOT NULL,
  `Trong_luong` int(11) DEFAULT NULL,
  `Don_gia` int(11) DEFAULT NULL,
  `TP_dinh_duong` text DEFAULT NULL,
  `Loi_ich` text DEFAULT NULL,
  `Hinh` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bang_tam`
--

INSERT INTO `bang_tam` (`Ma_sua`, `Ten_sua`, `Ma_hang_sua`, `Ma_loai_sua`, `Trong_luong`, `Don_gia`, `TP_dinh_duong`, `Loi_ich`, `Hinh`) VALUES
('S001', 'Sữa Vinamilk', 'HS001', 'L01', 400, 51500, 'Chất đạm, vitamin', 'Tăng trưởng chiều cao', 'vinamilk.jpg'),
('S003', 'Sữa TH True Milk', 'HS003', 'L02', 200, 32960, 'Protein, DHA', 'Phát triển trí não', 'thtruemilk.jpg'),
('S005', 'Sữa đặc Ngôi Sao Phương Nam', 'HS001', 'L04', 380, 27810, 'Vitamin A, D3', 'Tăng sức đề kháng', 'suadac.jpg'),
('S006', 'Sữa hạnh nhân Meiji', 'HS008', 'L05', 350, 77250, 'Omega 3, Canxi', 'Tốt cho tim mạch', 'meiji.jpg'),
('S007', 'Sữa tiệt trùng Nestle', 'HS005', 'L07', 220, 35020, 'Vitamin D, Canxi', 'Tốt cho sức khỏe xương', 'nestle.jpg'),
('S008', 'Sữa Friso Gold', 'HS009', 'L01', 900, 123600, 'Chất đạm, DHA', 'Phát triển trí não và chiều cao', 'friso.jpg'),
('S010', 'Sữa Calpis', 'HS010', 'L02', 250, 41200, 'Vitamin C, Canxi', 'Tăng cường hệ miễn dịch', 'calpis.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bang_vinamilk`
--

CREATE TABLE `bang_vinamilk` (
  `Ma_sua` varchar(6) NOT NULL,
  `Ten_sua` varchar(50) NOT NULL,
  `Ma_hang_sua` varchar(20) NOT NULL,
  `Ma_loai_sua` varchar(3) NOT NULL,
  `Trong_luong` int(11) DEFAULT NULL,
  `Don_gia` int(11) DEFAULT NULL,
  `TP_dinh_duong` text DEFAULT NULL,
  `Loi_ich` text DEFAULT NULL,
  `Hinh` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct_hoadon`
--

CREATE TABLE `ct_hoadon` (
  `So_hoa_don` varchar(5) NOT NULL,
  `Ma_sua` varchar(6) NOT NULL,
  `So_luong` int(11) DEFAULT NULL,
  `Don_gia` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ct_hoadon`
--

INSERT INTO `ct_hoadon` (`So_hoa_don`, `Ma_sua`, `So_luong`, `Don_gia`) VALUES
('HD001', 'S001', 2, 50000),
('HD002', 'S002', 1, 30000),
('HD003', 'S003', 3, 32000),
('HD004', 'S004', 5, 12000),
('HD005', 'S005', 1, 27000),
('HD006', 'S006', 2, 75000),
('HD007', 'S007', 4, 34000),
('HD008', 'S008', 1, 120000),
('HD009', 'S009', 3, 29000),
('HD010', 'S010', 2, 40000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang_sua`
--

CREATE TABLE `hang_sua` (
  `Ma_hang_sua` varchar(20) NOT NULL,
  `Ten_hang_sua` varchar(100) NOT NULL,
  `Dia_chi` varchar(200) DEFAULT NULL,
  `Dien_thoai` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hang_sua`
--

INSERT INTO `hang_sua` (`Ma_hang_sua`, `Ten_hang_sua`, `Dia_chi`, `Dien_thoai`, `Email`) VALUES
('HS001', 'Vinamilk', 'TP.HCM', '028123456', 'vinamilk@vinamilk.com'),
('HS002', 'Dutch Lady', 'Hà Nội', '024654321', 'info@dutchlady.com'),
('HS003', 'TH True Milk', 'Nghệ An', '038765432', 'contact@thmilk.vn'),
('HS005', 'Nestle', 'Thụy Sĩ', '0041211111', 'nestle@nestle.com'),
('HS006', 'Nutifood', 'TP.HCM', '028998877', 'support@nutifood.vn'),
('HS008', 'Meiji', 'Nhật Bản', '008132165', 'info@meiji.jp'),
('HS009', 'FrieslandCampina', 'Hà Lan', '003165478', 'friesland@campina.nl'),
('HS010', 'Calpis', 'Nhật Bản', '008154321', 'contact@calpis.jp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `So_hoa_don` varchar(5) NOT NULL,
  `Ngay_HD` date NOT NULL,
  `Ma_khach_hang` varchar(5) NOT NULL,
  `Tri_gia` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoa_don`
--

INSERT INTO `hoa_don` (`So_hoa_don`, `Ngay_HD`, `Ma_khach_hang`, `Tri_gia`) VALUES
('HD001', '2024-01-01', 'KH001', 100000),
('HD002', '2024-02-01', 'KH002', 30000),
('HD003', '2024-03-01', 'KH003', 96000),
('HD004', '2024-04-01', 'KH004', 60000),
('HD005', '2024-05-01', 'KH005', 27000),
('HD006', '2024-06-01', 'KH006', 150000),
('HD007', '2024-07-01', 'KH007', 136000),
('HD008', '2024-08-01', 'KH008', 120000),
('HD009', '2024-09-01', 'KH009', 87000),
('HD010', '2024-10-01', 'KH010', 80000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `Ma_khach_hang` varchar(5) NOT NULL,
  `Ten_khach_hang` varchar(100) NOT NULL,
  `Phai` tinyint(1) DEFAULT NULL,
  `Dia_chi` varchar(200) DEFAULT NULL,
  `Dien_thoai` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`Ma_khach_hang`, `Ten_khach_hang`, `Phai`, `Dia_chi`, `Dien_thoai`, `Email`) VALUES
('kh009', 'Phan Anh', 0, '112 Trường Chinh – TP. Nam Định', '0350646234', 'phan_anh@yahoo.com'),
('kh008', 'Nguyễn Minh', 1, '56 Lý Thường Kiệt – TP.Hà Nội', '0247654321', 'minhnguyen@gmail.com'),
('kh007', 'Trần Hùng', 0, '32 Đinh Tiên Hoàng – TP.Đà Nẵng', '0236645543', 'hungtran@yahoo.com'),
('kh006', 'Hoàng Lan', 1, '89 Nguyễn Huệ – TP.HCM', '0287654321', 'lanhoang@zmail.com'),
('kh005', 'Lê Hòa', 0, '23 Cầu Giấy – TP.Hà Nội', '0248765432', 'hoale@gmail.com'),
('kh004', 'Phạm Trang', 1, '65 Hai Bà Trưng – TP.HCM', '0289876543', 'trangpham@ymail.com'),
('kh003', 'Vũ Hồng', 0, '45 Hoàng Diệu – TP.Đà Nẵng', '0236655443', 'hongvu@yahoo.com'),
('kh002', 'Ngô Nam', 0, '123 Trần Phú – TP.Hà Nội', '0241234567', 'namngo@gmail.com'),
('kh001', 'Đặng Quỳnh', 1, '89 Pasteur – TP.HCM', '0288765432', 'quynh@zmail.com'),
('kh010', 'Mai Anh', 1, '76 Láng Hạ – TP.Hà Nội', '0242233445', 'maianh@ymail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_sua`
--

CREATE TABLE `loai_sua` (
  `Ma_loai_sua` varchar(3) NOT NULL,
  `Ten_loai` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_sua`
--

INSERT INTO `loai_sua` (`Ma_loai_sua`, `Ten_loai`) VALUES
('L01', 'Sữa bột'),
('L02', 'Sữa tươi'),
('L03', 'Sữa chua'),
('L04', 'Sữa đặc'),
('L05', 'Sữa hạt'),
('L06', 'Sữa không đường'),
('L07', 'Sữa tiệt trùng'),
('L08', 'Sữa hương dâu'),
('L09', 'Sữa hương socola'),
('L10', 'Sữa hạnh nhân');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sua`
--

CREATE TABLE `sua` (
  `Ma_sua` varchar(6) NOT NULL,
  `Ten_sua` varchar(50) NOT NULL,
  `Ma_hang_sua` varchar(20) NOT NULL,
  `Ma_loai_sua` varchar(3) NOT NULL,
  `Trong_luong` int(11) DEFAULT NULL,
  `Don_gia` int(11) DEFAULT NULL,
  `TP_dinh_duong` text DEFAULT NULL,
  `Loi_ich` text DEFAULT NULL,
  `Hinh` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sua`
--

INSERT INTO `sua` (`Ma_sua`, `Ten_sua`, `Ma_hang_sua`, `Ma_loai_sua`, `Trong_luong`, `Don_gia`, `TP_dinh_duong`, `Loi_ich`, `Hinh`) VALUES
('S001', 'Sữa Vinamilk', 'HS001', 'L01', 400, 50000, 'Chất đạm, vitamin', 'Tăng trưởng chiều cao', 'vinamilk.jpg'),
('S002', 'Sữa Dutch Lady', 'HS002', 'L02', 180, 30000, 'Canxi, vitamin D', 'Tốt cho xương', 'dutchlady.jpg'),
('S003', 'Sữa TH True Milk', 'HS003', 'L02', 200, 32000, 'Protein, DHA', 'Phát triển trí não', 'thtruemilk.jpg'),
('S004', 'Sữa chua Vinamilk', 'HS001', 'L03', 100, 12000, 'Probiotic', 'Tốt cho tiêu hóa', 'suachua.jpg'),
('S005', 'Sữa đặc Ngôi Sao Phương Nam', 'HS001', 'L04', 380, 27000, 'Vitamin A, D3', 'Tăng sức đề kháng', 'suadac.jpg'),
('S006', 'Sữa hạnh nhân Meiji', 'HS008', 'L05', 350, 75000, 'Omega 3, Canxi', 'Tốt cho tim mạch', 'meiji.jpg'),
('S007', 'Sữa tiệt trùng Nestle', 'HS005', 'L07', 220, 34000, 'Vitamin D, Canxi', 'Tốt cho sức khỏe xương', 'nestle.jpg'),
('S008', 'Sữa Friso Gold', 'HS009', 'L01', 900, 120000, 'Chất đạm, DHA', 'Phát triển trí não và chiều cao', 'friso.jpg'),
('S009', 'Sữa Nutifood', 'HS006', 'L02', 180, 29000, 'Chất xơ, Canxi', 'Tốt cho tiêu hóa', 'nutifood.jpg'),
('S010', 'Sữa Calpis', 'HS010', 'L02', 250, 40000, 'Vitamin C, Canxi', 'Tăng cường hệ miễn dịch', 'calpis.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bang_tam`
--
ALTER TABLE `bang_tam`
  ADD PRIMARY KEY (`Ma_sua`),
  ADD KEY `FK_HangSua` (`Ma_hang_sua`),
  ADD KEY `FK_LoaiSua` (`Ma_loai_sua`);

--
-- Chỉ mục cho bảng `bang_vinamilk`
--
ALTER TABLE `bang_vinamilk`
  ADD PRIMARY KEY (`Ma_sua`),
  ADD KEY `FK_HangSua` (`Ma_hang_sua`),
  ADD KEY `FK_LoaiSua` (`Ma_loai_sua`);

--
-- Chỉ mục cho bảng `ct_hoadon`
--
ALTER TABLE `ct_hoadon`
  ADD PRIMARY KEY (`So_hoa_don`,`Ma_sua`),
  ADD KEY `FK_Sua` (`Ma_sua`);

--
-- Chỉ mục cho bảng `hang_sua`
--
ALTER TABLE `hang_sua`
  ADD PRIMARY KEY (`Ma_hang_sua`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`So_hoa_don`),
  ADD KEY `FK_KhachHang` (`Ma_khach_hang`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`Ma_khach_hang`);

--
-- Chỉ mục cho bảng `loai_sua`
--
ALTER TABLE `loai_sua`
  ADD PRIMARY KEY (`Ma_loai_sua`);

--
-- Chỉ mục cho bảng `sua`
--
ALTER TABLE `sua`
  ADD PRIMARY KEY (`Ma_sua`),
  ADD KEY `FK_HangSua` (`Ma_hang_sua`),
  ADD KEY `FK_LoaiSua` (`Ma_loai_sua`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
