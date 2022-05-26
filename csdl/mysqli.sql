-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2022 at 04:22 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysqli`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `user_name`, `password`, `name`) VALUES
(5, 'admin', '$2y$10$EjSK3mhaP/4Goemx/zq/NuzU.TpssBWUbZuZotNRt4DYE/L.VHUka', 'admin'),
(8, 'admin1', '$2y$10$/MOr3htJKu6v9gc3q2gJyeIlSMQRXmjxQ2qTuUge1GJX6SVLoeivC', 'admin1'),
(11, 'admin2', '$2y$10$ctcFV1rfDcfd1FrTFBFWNe6sWZ.8vTKe7sg49disTOqfmU.2AwDSC', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id_banner` int(11) NOT NULL,
  `ten_banner` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `trang_thai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`id_banner`, `ten_banner`, `images`, `trang_thai`) VALUES
(1, 'Banner 1', 'banner1.png', 'Hoạt động'),
(2, 'Banner 2', 'Banner2.png', 'Hoạt động'),
(3, 'Banner 3', 'Banner3.jpg', 'Hoạt động');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chitiethoadon`
--

CREATE TABLE `tbl_chitiethoadon` (
  `id_hoadon` int(11) NOT NULL,
  `id_sanpham` int(50) NOT NULL,
  `soluongsp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_chitiethoadon`
--

INSERT INTO `tbl_chitiethoadon` (`id_hoadon`, `id_sanpham`, `soluongsp`) VALUES
(39, 57, 1),
(39, 58, 1),
(40, 46, 1),
(40, 52, 1),
(41, 29, 1),
(42, 43, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chitietphieunhap`
--

CREATE TABLE `tbl_chitietphieunhap` (
  `id_phieunhap` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `id_ncc` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_chitietphieunhap`
--

INSERT INTO `tbl_chitietphieunhap` (`id_phieunhap`, `id_sanpham`, `id_ncc`, `soluong`, `dongia`) VALUES
(1, 16, 1, 100, 29690000),
(10, 19, 1, 12, 16590000),
(10, 44, 2, 3, 5000000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hoadon`
--

CREATE TABLE `tbl_hoadon` (
  `id_hoadon` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `tong_tien` varchar(100) NOT NULL,
  `sdt` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `pptt` varchar(100) NOT NULL,
  `trangthai` varchar(50) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_hoadon`
--

INSERT INTO `tbl_hoadon` (`id_hoadon`, `id_user`, `diachi`, `tong_tien`, `sdt`, `date`, `pptt`, `trangthai`, `time`) VALUES
(39, 1, 'TP.HCM', '10000000', '0123456781', '2022-05-13', 'Thanh toán khi nhận hàng', 'Chưa xử lí', '22-05-13 11:27:56 AM'),
(40, 12, 'hello', '10000000', '0123456789', '2022-05-25', 'Ví điện tử', 'Đã hủy', '22-05-25 11:17:20 AM'),
(41, 12, 'TP.HCM', '24000000', '0123456789', '2022-05-25', 'Ví điện tử', 'Đã hủy', '22-05-25 11:17:42 AM'),
(42, 12, 'TP.HCM', '5000000', '0123456789', '2022-05-25', 'Ví điện tử', 'Đã hủy', '22-05-25 11:24:54 AM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nhacungcap`
--

CREATE TABLE `tbl_nhacungcap` (
  `id_nhacungcap` int(11) NOT NULL,
  `tenncc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_nhacungcap`
--

INSERT INTO `tbl_nhacungcap` (`id_nhacungcap`, `tenncc`) VALUES
(1, 'FPT Group'),
(2, 'Điện Máy Xanh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permission`
--

CREATE TABLE `tbl_permission` (
  `id_permis` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `qladmin` varchar(255) NOT NULL,
  `qluser` varchar(255) NOT NULL,
  `qlhd` varchar(255) NOT NULL,
  `qlsp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_permission`
--

INSERT INTO `tbl_permission` (`id_permis`, `name`, `qladmin`, `qluser`, `qlhd`, `qlsp`) VALUES
(1, 'admin', 'xem,them,repass,xoa,setquyen,', 'xem,them,repass,sua,', 'xem,xuli,', 'xem,them,xoa,sua,'),
(5, 'admin1', '', '', '', ''),
(8, 'admin2', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_phanloaisp`
--

CREATE TABLE `tbl_phanloaisp` (
  `id_loaisp` int(11) NOT NULL,
  `ten_loaisp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_phanloaisp`
--

INSERT INTO `tbl_phanloaisp` (`id_loaisp`, `ten_loaisp`) VALUES
(1, 'APPLE'),
(2, 'Xiaomi'),
(3, 'OPPO'),
(4, 'SamSung');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_phieunhap`
--

CREATE TABLE `tbl_phieunhap` (
  `id_phieunhap` int(11) NOT NULL,
  `ngaynhap` varchar(255) NOT NULL,
  `soluong` int(11) NOT NULL,
  `tongtien` varchar(100) NOT NULL,
  `trangthai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_phieunhap`
--

INSERT INTO `tbl_phieunhap` (`id_phieunhap`, `ngaynhap`, `soluong`, `tongtien`, `trangthai`) VALUES
(1, '2021-03-01', 100, '2969000000', 'Đã nhận hàng. Đã thanh toán'),
(9, '2022-05-26', 1, '29690000', 'Đã nhận hàng. Đã thanh toán'),
(10, '2022-05-26', 15, '214080000', 'Đã nhận hàng. Đã thanh toán');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `ten_sanpham` varchar(255) NOT NULL,
  `loaisp` int(10) NOT NULL,
  `mota` longtext NOT NULL,
  `gia` varchar(255) NOT NULL,
  `trangthai` varchar(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  `soluong` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sanpham`, `ten_sanpham`, `loaisp`, `mota`, `gia`, `trangthai`, `images`, `soluong`) VALUES
(16, 'iPhone 13 Pro Max 128GB', 1, 'Hiệu năng vượt trội - Chip Apple A15 Bionic mạnh mẽ, hỗ trợ mạng 5G tốc độ cao\r\nKhông gian hiển thị sống động - Màn hình 6.7\" Super Retina XDR độ sáng cao, sắc nét\r\nTrải nghiệm điện ảnh đỉnh cao - Cụm 3 camera kép 12MP, hỗ trợ ổn định hình ảnh quang học\r\nTối ưu điện năng - Sạc nhanh 20 W, đầy 50% pin trong khoảng 30 phút\r\nTrải nghiệm điện ảnh đỉnh cao - Cụm 3 camera kép 12MP, hỗ trợ ổn định hình  ', '29690000', '1', 'iphone_13-_pro-5_1_1.jpg', 100),
(17, 'iPhone 11 64GB', 1, 'Màu sắc phù hợp cá tính - 6 màu sắc bắt mắt để lựa chọn\r\nHiệu năng mượt mà, ổn định - Chip A13, RAM 4GB\r\nBắt trọn khung hình - Camera kép hỗ trợ góc rộng, chế độ Night Mode', '11790000', '1', 'iphone_11_white_4_.png', 100),
(18, 'iPhone 12 Pro Max 128GB', 1, 'Mạnh mẽ, siêu nhanh với chip A14, RAM 6GB, mạng 5G tốc độ cao\r\nRực rỡ, sắc nét, độ sáng cao - Màn hình OLED cao cấp, Super Retina XDR hỗ trợ HDR10, Dolby Vision\r\nChụp ảnh siêu đỉnh - Night Mode , thuật toán Deep Fusion, Smart HDR 3, camera LiDar', '27000000', '1', 'iphone_12_pro_max_white_1.png', 100),
(19, 'iPhone 12 64GB', 1, 'Mạnh mẽ, siêu nhanh với chip A14, RAM 4GB, mạng 5G tốc độ cao\r\nRực rỡ, sắc nét, độ sáng cao - Màn hình OLED cao cấp, Super Retina XDR hỗ trợ HDR10, Dolby Vision\r\nChụp đêm ấn tượng - Night Mode cho 2 camera, thuật toán Deep Fusion, Smart HDR 3', '16590000', '1', 'iphone-12_2__3.jpg', 100),
(20, 'iPhone 13 128GB ', 1, 'Hiệu năng vượt trội - Chip Apple A15 Bionic mạnh mẽ, hỗ trợ mạng 5G tốc độ cao\r\nKhông gian hiển thị sống động - Màn hình 6.1\" Super Retina XDR độ sáng cao, sắc nét\r\nTrải nghiệm điện ảnh đỉnh cao - Camera kép 12MP, hỗ trợ ổn định hình ảnh quang học', '22200000', '1', 'iphone-13-02_4.jpg', 100),
(21, 'iPhone 11 128GB', 1, 'Màu sắc phù hợp cá tính - 6 màu sắc bắt mắt để lựa chọn\r\nHiệu năng mượt mà, ổn định - Chip A13, RAM 4GB\r\nBắt trọn khung hình - Camera kép hỗ trợ góc rộng, chế độ Night Mode', '13350000', '1', 'iphone_11_white_4_.png', 100),
(22, 'iPhone 13 Pro Max 128GB', 1, 'Kích thước màn hình	6.7 inches\r\nCông nghệ màn hình	OLED\r\nCamera sau	Camera góc rộng: 12MP, ƒ/1.5\r\nCamera góc siêu rộng: 12MP, ƒ/1.8\r\nCamera tele : 12MP, /2.8\r\nCamera trước	12MP, ƒ/2.2\r\nChipset	Apple A15\r\nBộ nhớ trong	128 GB\r\nPin	4,325mAh\r\nHệ điều hành	iOS15\r\nĐộ phân giải màn hình	2778 x 1284 pixel\r\nTính năng màn hình	120Hz, Super Retina XDR với ProMotion 6.1‑inch, OLED, 458 pp, HDR display, True Tone, Wide color (P3), Haptic Touch\r\nTrọng lượng	240g\r\nBluetooth	v5.0\r\nTần số quét	120Hz', '50000000', '1', 'iphone_13_pro_max_alpine_green_pure_back_iphone_13_pro_max_alpine_green_pure_front_2-up_screen__usen.png', 100),
(23, 'iPhone 12 Pro Max 128GB', 1, 'Mạnh mẽ, siêu nhanh với chip A14, RAM 6GB, mạng 5G tốc độ cao\r\nRực rỡ, sắc nét, độ sáng cao - Màn hình OLED cao cấp, Super Retina XDR hỗ trợ HDR10, Dolby Vision\r\nChụp ảnh siêu đỉnh - Night Mode , thuật toán Deep Fusion, Smart HDR 3, camera LiDar', '24000000', '1', 'iphone_12_pro_max_white_1 (1).png', 100),
(24, 'iPhone SE 2022', 1, 'Hiệu năng vượt trội với vi xử lý mới nhất - Chip Apple A15 tiên tiến nhất, cân mọi tác vụ\r\nTận hưởng không gian hiển thị sắc nét - Màn hình Liquid Retina nhỏ gọn 4.7 inch tỷ lệ 16:9\r\nGiải trí trọn vẹn ngày dài - Viên pin có nhiều cải tiến giúp bạn không còn lo lắng khi sử dụng', '10000000', '1', 'iphone-se-red-select-20220322.jpg', 100),
(25, 'iPhone 13 128GB - Xanh lá', 1, 'Kích thước màn hình	6.1 inches\r\nCông nghệ màn hình	OLED\r\nCamera sau	Camera góc rộng: 12MP, f/1.6\r\nCamera góc siêu rộng: 12MP, ƒ/2.4\r\nCamera trước	12MP, f/2.2\r\nChipset	Apple A15\r\nBộ nhớ trong	128 GB\r\nPin	3,095mAh', '24000000', '1', 'iphone_13_green_pure_back_iphone_13_green_pure_front_2-up_screen__usen_1.png', 100),
(26, 'iPhone 12 mini 64GB', 1, 'Mạnh mẽ, siêu nhanh với chip A14, RAM 4GB, mạng 5G tốc độ cao\r\nRực rỡ, sắc nét, độ sáng cao - Màn hình OLED cao cấp, Super Retina XDR hỗ trợ HDR10, Dolby Vision\r\nChụp đêm ấn tượng - Night Mode cho 2 camera, thuật toán Deep Fusion, Smart HDR 3', '15000000', '1', 'iphone_12_mini_blue (1).png', 100),
(27, 'iPhone 12 Pro 128GB', 1, 'Mạnh mẽ, siêu nhanh với chip A14, RAM 6GB, mạng 5G tốc độ cao\r\nRực rỡ, sắc nét, độ sáng cao - Màn hình OLED cao cấp, Super Retina XDR hỗ trợ HDR10, Dolby Vision\r\nChụp ảnh siêu đỉnh - Night Mode , thuật toán Deep Fusion, Smart HDR 3, camera LiDar', '24000000', '1', 'iphone_12_pro_black (1).png', 100),
(28, 'iPhone 12 Pro Max 512GB', 1, 'Mạnh mẽ, siêu nhanh với chip A14, RAM 6GB, mạng 5G tốc độ cao\r\nRực rỡ, sắc nét, độ sáng cao - Màn hình OLED cao cấp, Super Retina XDR hỗ trợ HDR10, Dolby Vision\r\nChụp ảnh siêu đỉnh - Night Mode , thuật toán Deep Fusion, Smart HDR 3, camera LiDar', '50000000', '1', 'iphone_12_pro_max_blue.png', 100),
(29, 'iPhone 12 mini 128GB ', 1, 'Mạnh mẽ, siêu nhanh với chip A14, RAM 4GB, mạng 5G tốc độ cao\r\nRực rỡ, sắc nét, độ sáng cao - Màn hình OLED cao cấp, Super Retina XDR hỗ trợ HDR10, Dolby Vision\r\nChụp đêm ấn tượng - Night Mode cho 2 camera, thuật toán Deep Fusion, Smart HDR 3', '24000000', '1', 'iphone_12_mini_purple (1).png', 99),
(30, 'Xiaomi Redmi Note 11 Pro Plus 5G', 2, 'Đón đầu thử thách, bứt phá mọi tựa game - Chip MediaTek Dimensity 920 5G 8 nhân siêu mạnh mẽ\r\nKhông gian giải trí đỉnh cao - Màn hình AMOLED 6.67 inch sắc nét, tần số quét 120Hz mượt mà\r\nSạc nhanh thần tốc, tràn đầy năng lượng - Dung lượng pin lớn 4500mAh, sạc nhanh đến 120W', '10000000', '1', '11-pro-plus-blue (1).jpg', 100),
(31, 'Xiaomi Redmi Note 11', 2, 'Nâng cao trải nghiệm thị giác - Màn hình AMOLED 6.43\"\" Full HD+, công nghệ DotDisplay\r\nHiệu năng ấn tượng - Snapdragon 680 8 nhân cùng RAM 4GB, bộ nhớ 64GB\r\nChinh phục mọi khoảnh khắc - Cụm 4 camera 50MP, nhiều chế độ chụp tiện ích ', '10000000', '1', '800x800-1-640x640-5_2 (1).png', 100),
(32, 'Xiaomi Mi 11 Lite 5G', 2, 'Không gian hiển thị thoải mái, chuyển động mượt - Màn hình tràn viền 6,55 inch, tần số quét 90Hz, HDR10+\r\nHiệu năng mạnh mẽ, ổn định - Chip Snapdragon 780G trên 5nm, 128GB bộ nhớ và 8GB RAM\r\nCamera chụp ảnh ấn tượng - Cụm 3 camera sau 64MP, chụp đêm rõ nét ', '10000000', '1', '800x800-1-640x640-5_2 (1).png', 100),
(33, 'Xiaomi 11T', 2, 'Màn hình giải trí cực đỉnh - Màn hình AMOLED 6.67 inch Full HD+, 120Hz\r\nCấu hình vượt trội, chuyện động mượt mà - Chip MediaTek Dimensity 1200-Ultra cùng RAM 8GB\r\nĐẳng cấp camera chuyện nghiệp - Cụm camera sau 108 MP, hỗ trợ lấy nét, chống rung', '10000000', '1', 'xiaomi-mi-11t-1_1 (1).jpg', 100),
(34, 'Xiaomi POCO X3 Pro', 2, 'Hiệu năng chuẩn Flagship - Snapdragon 860 8 nhân mạnh mẽ, RAM 6G, bộ nhớ UFS 3 1 truy xuất nhanh\r\nVuốt chạm mượt mà, hiển thị chất lượng - Màn hình 6 67 inch FullHD+ tần số quét 120Hz, hỗ trợ HDR10\r\nSử dụng liên tục, không cần chờ đợi - Sạc nhanh siêu tốc 33W, dung lượng pin lớn 5160mAh ', '10000000', '1', 'xiaomi-poco-x3-pro-2 (2).jpg', 100),
(35, 'Xiaomi 12', 2, 'Cân mọi tác vụ với CPU thế hệ mới - Vi xử lí Snapdragon 8 Gen 1 cùng RAM 8 GB\r\nTrải ngiệm giải trí hoàn hảo với màn hình tràn viền sắc nét - Kích thước 6.28 inches, AMOLED\r\nCụm camera đa chức năng, lưu giữ mọi khoảnh khắc - Camera chính 50 MP đa dạng chế độ chụp', '10000000', '1', 't_i_xu_ng_1__3_10 (1).png', 100),
(36, 'Xiaomi Redmi Note 11 128GB', 2, 'Nâng cao trải nghiệm thị giác - Màn hình AMOLED 6.43\" Full HD+, công nghệ DotDisplay\r\nHiệu năng ấn tượng - Snapdragon 680 8 nhân cùng RAM 4GB, bộ nhớ 128GB\r\nChinh phục mọi khoảnh khắc - Cụm 4 camera 50MP, nhiều chế độ chụp tiện ích ', '10000000', '1', '800x800-640x640-5.png', 100),
(37, 'Xiaomi 12 Pro (5G)', 2, 'Cân mọi tác vụ với CPU thế hệ mới - Vi xử lí Snapdragon 8 Gen 1 cùng RAM 12GB\r\nTrải ngiệm giải trí hoàn hảo với màn hình tràn viền sắc nét - Kích thước 6.73 inches, AMOLED\r\nCụm camera đa chức năng, lưu giữ mọi khoảnh khắc - Camera chính 50 MP đa dạng chế độ chụp', '10000000', '1', 'xiaomi-12-pro_arenamobiles (1).jpg', 100),
(38, 'Xiaomi 11T Pro', 2, 'Màn hình giải trí cực đỉnh - Màn hình AMOLED 6.67 inch Full HD+, 120Hz\r\nCấu hình vượt trội, cân mọi tựa game - Chip Snapdragon 888 5G, GPU Adreno 660 mạnh mẽ\r\nTrải nghiệm điện ảnh đỉnh cao - Cụm camera sau lên đến 108 MP siêu nét, quay phim 8K ', '10000000', '1', 'xiaomi-mi-11t-pro-price-in-usa-500x500 (1).jpg', 100),
(39, 'Xiaomi Redmi 10 (4GB - 128GB)', 2, 'Trải nghiệm chất lượng hiển thị sắc nét, mượt mà - Màn hình 6.5\" FullHD+, tần số quét 90 Hz\r\nCấu hình ổn định,, sử dụng mượt mà - Chip Helio G88 mới, RAM 4 GB\r\nCamera cải tiến tối đa - Cụm 4 camera lên đến 50MP, chụp ảnh sắc nét', '10000000', '1', '001_2.jpg', 100),
(40, 'Xiaomi Redmi Note 10', 2, 'Trải nghiệm điện ảnh vượt trội - Màn hình AMOLED kích thước 6.43 inch sắc nét, cảm biến ánh sáng 360 độ, chứng nhận bảo vệ mắt\r\nHiệu suất vượt tầm giá - Snapdragon 678 8 nhân mạnh mẽ, bộ nhớ UFS 2.2\r\nSạc đầy pin chỉ mất hơn 60 phút - Bộ sạc nhanh công suất 33W ấn tượng', '10000000', '1', 'xiaomi-redmi-note-10_1.jpg', 100),
(41, 'Xiaomi Redmi 9A', 2, 'Thiết kế thời thượng - thân hình unibody mỏng, gọn và có thiết kế 3D độc đáo\r\nMàn hình sắc nét - 6.53 inch HD+, IPS LCD cho hình ảnh sống động\r\nVi xử lí tối ưu hoá trải nghiệm gaming - Chip MediaTek Helio G25, RAM 2GB, 32GB', '10000000', '1', 'redmi_9a_0005_background (1).jpg', 100),
(42, 'Xiaomi Redmi Note 11S', 2, 'Thiết kế tinh tế, cuốn hút - Mỏng nhẹ thời trang, nhỏ gọn trong tay\r\nTrọn vẹn từng khung hình - Màn hình 6.43\" FHD+ AMOLED DotDisplay, 90Hz\r\nChụp ảnh chuyên nghiệp - Cụm 4 camera sau 108MP, hỗ trợ đa dạng chế độ chụp ', '10000000', '1', 'frame37917-640x640_1_.png', 100),
(43, 'Xiaomi Redmi 10C 4GB 128GB', 2, 'Hiệu năng ổn định trên từng tác vụ, đa nhiệm mượt mà - Vi xử lí Snapdragon 680, RAM 4 GB\r\nCamera độ phân giải cao, hỗ trợ nhiều chế độ chụp - Cảm biến chính 50 MP, độ phân giải cao\r\nMàn hình giải trí sắc nét ấn tượng - Kích thước 6.71\", tấm nền IPS LCD độ phân giải HD+', '5000000', '1', 'xiaomi-redmi-10c-1-002.jpg', 99),
(44, 'Xiaomi Redmi Note 10S', 2, 'Trải nghiệm hình ảnh chân thực - Màn hình AMOLED 6.43\", Full HD+\r\nCamera sau ấn tượng - 4 camera 64MP, đa dạng chức năng\r\nHiệu năng dẫn đầu xu thế - Chip MediaTek Helio G95, RAM 8GB', '5000000', '1', 'xiaomi-redmi-note-10s-xanh-1 (1).jpg', 100),
(45, 'Xiaomi 11 Lite 5G NE', 2, 'Thiết kế mỏng nhẹ, thời thượng - Trọng lượng chỉ 158 g và mỏng 6.8 mm, cầm nắm thoải mái\r\nNâng tầm trải nghiệm giải trí - Màn hình AMOLED 6.55\", Full HD+ sắc nét, tần số quét 90Hz mượt mà\r\nLưu giữ mọi khoảnh khắc - Cụm 3 camera sau lên đến 64MP, quay video 4K sắc nét, chân thực', '5000000', '1', 'xiaomi-11-lite-5g-014_1.jpg', 100),
(46, 'Xiaomi Mi 10T Pro 5G', 2, 'Màn hình siêu mượt, chi tiết và rõ ràng - Màn hình DotDisplay FullHD+ 6 67 inch, tần số quét 144Hz, gam màu rộng DCI- P3, TrueColor\r\nVận hành trơn tru, kết nối nhanh chóng - Snapdragon 865 5G hàng đầu, RAM 8GB, bộ nhớ UFS 3.1 tốc độ cao\r\nCamera sáng tạo vô hạn - Bộ ba camera 108MP tích hợp AI thông minh, quay phim 8K, chụp ảnh độ phân giải 33MP', '5000000', '1', 'xiaomi-mi-10t-pro_2_.jpg', 99),
(47, 'OPPO Reno6 Z 5G', 3, 'Thiết kế ấn tượng, màu sắc cá tính - Thiết kế tràn viền, mỏng nhẹ chỉ 173g\r\nTăng tốc kết nối, dẫn đầu xu hướng - Dimensity 800U 5G 8 nhân mạnh mẽ, kết nối 5G siêu nhanh\r\nChuyên gia nhiếp ảnh chân dung - Bộ 3 camera lên tới 64 MP, sắc nét, ấn tượng\r\nMàn hình lớn, sắc nét với tốc độ làm mới cao - Màn hình AMOLED 6.43 inch Full HD, 60 Hz', '5000000', '1', 'oppo_reno6 (1).jpg', 100),
(49, 'OPPO A95', 3, 'Thiết kế mỏng nhẹ hiện đại - Mỏng chỉ 7.95mm, nhẹ chỉ 175g, màu sắc sành điệu\r\nHiển thị sắc nét mọi khung hình - Màn hình Super AMOLED FullHD+ 6.43\"\r\nVi xử lý mạnh mẽ - Chip Snapdragon 662, RAM 8GB ', '5000000', '1', 'reno6-1_1.jpg', 100),
(50, 'OPPO A95', 3, 'Thiết kế mỏng nhẹ hiện đại - Mỏng chỉ 7.95mm, nhẹ chỉ 175g, màu sắc sành điệu\r\nHiển thị sắc nét mọi khung hình - Màn hình Super AMOLED FullHD+ 6.43\"\r\nVi xử lý mạnh mẽ - Chip Snapdragon 662, RAM 8GB', '5000000', '1', 'combo_a95_-_en_-_cmyk (1).jpg', 100),
(52, 'OPPO Reno7 4G (8GB - 128GB)', 3, 'Kích thước màn hình	6.43 inches\r\nCông nghệ màn hình	AMOLED\r\nCamera trước	32MP, f/2.4; FOV 85°\r\nChipset	Snapdragon™ 680\r\nDung lượng RAM	8 GB ', '5000000', '1', '_0001_combo_-_reno4_pro_-_white (1).jpg', 99),
(53, 'OPPO Reno7 (5G)', 3, 'Trải nghiệm mọi tác vụ mượt mà - Chip MediaTek Dimensity 900 5G mạnh mẽ, RAM khủng 8 GB\r\nGhi lại những câu chuyện sống động màu sắc - Camera chính 64MP, camera selfie độ phân giải cao\r\nNăng lượng bền bỉ cho cả ngày dài - Viên pin lớn 4500 mAh cùng sạc nhanh 65 W ', '5000000', '1', 'oppo-reno-5_3_ (1).jpg', 100),
(54, 'Samsung Galaxy S22 Ultra (8GB - 128GB)', 4, 'Vi xử lý mạnh mẽ nhất Galaxy - Snapdragon 8 Gen 1 (4 nm)\r\nCamera mắt thần bóng đêm Nightography - Chụp đêm cực đỉnh\r\nS Pen đầu tiên trên Galaxy S - Độ trễ thấp, dễ thao tác', '10000000', '1', 'sm-s908_galaxys22ultra_front_green_211119 (1).jpg', 100),
(55, 'Samsung Galaxy Note 20 Ultra 5G', 4, 'Sang trọng, cao cấp - Màu sắc độc đáo và cuốn hút\r\nChụp ảnh chuyên nghiệp - Bộ 3 camera hỗ trợ Zoom xa đến 30X\r\nGhi chú nhanh chóng, chính xác với bút S- Pen thế hệ mới ', '10000000', '1', 'yellow_final_2.jpg', 100),
(56, 'Samsung Galaxy A73', 4, 'Camera chất lượng, bắt trọn từng khoảng khắc - Cụm 4 camera với cảm biến chính lên đến 108 MP\r\nThưởng thức không gian giải trí cực đỉnh - Màn hình lớn 6.7 inch, độ phân giải Full HD+, 120Hz mượt mà\r\nCấu hình Galaxy A73 5G được nâng cấp mạnh với chip Snapdragon 778G, RAM lên đến 8 GB', '10000000', '1', 'samsung-galaxy-a73-1-600x600.jpg', 100),
(58, 'Samsung Galaxy A32', 4, 'Màn hình siêu mượt, hình ảnh sắc nét - Màn hình Super AMOLED FullHD, tần số quét 90Hz\r\nThiết kế tối giản, thể hiện phong cách - Màu sắc trẻ trung, mặt lưng bóng bẩy, cụm camera thiết kế mới.\r\nGhi lại mọi khoảnh khắc - Cụm camera 64MP tuyệt đỉnh, camera selfie 20MP chất lượng.', '5000000', '1', 'samsung-galaxy-a32-20.jpg', 99);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `sdt` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `hoten`, `sdt`, `email`, `user_name`, `password`) VALUES
(1, 'Ai-chan', '0123456781', 'aotich@gmail.com', 'aotich', '$2y$10$khO8G2d3hS0EAj1SrBtHq.79XoFQTu2WtCSI.maDPVindAReYY9Uu'),
(12, 'admin', '0123456789', 'aotich3@gmail.com', 'admin', '$2y$10$cx3e1uUo/bakx.9tSxyjh.CKHiREAdZ.Kj5zDAURJIoX9RZNLAiyy'),
(13, 'admin', '0123456789', 'aotich1000@gmail.com', 'aotich1000', '$2y$10$5o.DSZuJVOMkZ0TvTsxcMu3J1vkn65jSyG40C0oQU0dLTM5JZMrWm'),
(14, 'abc', '0123456789', 'asd@d.com', 'admin2', '$2y$10$o6Cy3cSitXVtJR6mFJ35zOuWm8NEvPgKIiS7FhhrMkUq/6uBrIsC2'),
(15, 'Ai-chan', '0123456789', 'aotich2000@gmail.com', 'aotich1234', '$2y$10$rYz.W7R4xHH0dwv8fQTSS.gb3TD75tTW2S5JiskIqlE79SVPRPZta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `tbl_chitiethoadon`
--
ALTER TABLE `tbl_chitiethoadon`
  ADD KEY `abc` (`id_hoadon`);

--
-- Indexes for table `tbl_chitietphieunhap`
--
ALTER TABLE `tbl_chitietphieunhap`
  ADD PRIMARY KEY (`id_phieunhap`,`id_sanpham`),
  ADD KEY `nhaphang` (`id_phieunhap`),
  ADD KEY `sanphamnhap` (`id_sanpham`),
  ADD KEY `id_ncc` (`id_ncc`);

--
-- Indexes for table `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  ADD PRIMARY KEY (`id_hoadon`),
  ADD KEY `hoadon_user` (`id_user`);

--
-- Indexes for table `tbl_nhacungcap`
--
ALTER TABLE `tbl_nhacungcap`
  ADD PRIMARY KEY (`id_nhacungcap`);

--
-- Indexes for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  ADD PRIMARY KEY (`id_permis`);

--
-- Indexes for table `tbl_phanloaisp`
--
ALTER TABLE `tbl_phanloaisp`
  ADD PRIMARY KEY (`id_loaisp`);

--
-- Indexes for table `tbl_phieunhap`
--
ALTER TABLE `tbl_phieunhap`
  ADD PRIMARY KEY (`id_phieunhap`);

--
-- Indexes for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sanpham`),
  ADD KEY `sdq` (`loaisp`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  MODIFY `id_hoadon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_nhacungcap`
--
ALTER TABLE `tbl_nhacungcap`
  MODIFY `id_nhacungcap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  MODIFY `id_permis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_phanloaisp`
--
ALTER TABLE `tbl_phanloaisp`
  MODIFY `id_loaisp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_phieunhap`
--
ALTER TABLE `tbl_phieunhap`
  MODIFY `id_phieunhap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_chitiethoadon`
--
ALTER TABLE `tbl_chitiethoadon`
  ADD CONSTRAINT `abc` FOREIGN KEY (`id_hoadon`) REFERENCES `tbl_hoadon` (`id_hoadon`);

--
-- Constraints for table `tbl_chitietphieunhap`
--
ALTER TABLE `tbl_chitietphieunhap`
  ADD CONSTRAINT `id_ncc` FOREIGN KEY (`id_ncc`) REFERENCES `tbl_nhacungcap` (`id_nhacungcap`),
  ADD CONSTRAINT `nhaphang` FOREIGN KEY (`id_phieunhap`) REFERENCES `tbl_phieunhap` (`id_phieunhap`),
  ADD CONSTRAINT `sanphamnhap` FOREIGN KEY (`id_sanpham`) REFERENCES `tbl_sanpham` (`id_sanpham`);

--
-- Constraints for table `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  ADD CONSTRAINT `hoadon_user` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`);

--
-- Constraints for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD CONSTRAINT `sdq` FOREIGN KEY (`loaisp`) REFERENCES `tbl_phanloaisp` (`id_loaisp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
