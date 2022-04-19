-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 at 04:11 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlydathang`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `SoDonDH` int(10) NOT NULL,
  `MSHH` int(10) NOT NULL,
  `SoLuong` int(10) NOT NULL,
  `GiaDatHang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `GiamGia` float NOT NULL,
  `MaMau` int(10) NOT NULL,
  `Size` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietdathang`
--

INSERT INTO `chitietdathang` (`SoDonDH`, `MSHH`, `SoLuong`, `GiaDatHang`, `GiamGia`, `MaMau`, `Size`) VALUES
(30, 1, 5, '199000', 0, 1, 'L'),
(30, 2, 1, '499000', 0, 2, 'L'),
(30, 3, 1, '289000', 0, 3, 'L'),
(31, 1, 3, '199000', 0, 1, 'L'),
(31, 3, 4, '289000', 0, 3, 'L'),
(32, 1, 4, '199000', 0, 1, 'L'),
(32, 7, 1, '179000', 0, 0, 'L'),
(33, 1, 4, '199000', 0, 1, 'L'),
(33, 2, 1, '499000', 0, 2, 'L'),
(34, 1, 3, '199000', 0, 1, 'L'),
(34, 3, 3, '289000', 0, 3, 'L'),
(35, 1, 4, '199000', 0, 1, 'L'),
(35, 4, 4, '399000', 0, 4, 'L'),
(36, 2, 1, '499000', 0, 2, 'L'),
(36, 3, 1, '289000', 0, 3, 'L'),
(37, 3, 1, '289000', 0, 3, 'L'),
(37, 4, 2, '399000', 0, 4, 'L'),
(38, 3, 1, '289000', 0, 3, 'L'),
(39, 3, 1, '289000', 0, 3, 'L'),
(43, 3, 1, '289000', 0, 3, 'L'),
(43, 4, 4, '399000', 0, 0, 'L'),
(44, 3, 3, '289000', 0, 3, 'L'),
(45, 1, 4, '199000', 0, 1, 'L'),
(45, 2, 1, '499000', 0, 2, 'L');

-- --------------------------------------------------------

--
-- Table structure for table `danhgia`
--

CREATE TABLE `danhgia` (
  `MaDanhGia` int(11) NOT NULL,
  `SoDonDH` int(10) NOT NULL,
  `MSKH` int(10) NOT NULL,
  `MSHH` int(10) NOT NULL,
  `DanhGia` int(10) NOT NULL,
  `NhanXet` text COLLATE utf8_unicode_ci NOT NULL,
  `TinhTrangDG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhgia`
--

INSERT INTO `danhgia` (`MaDanhGia`, `SoDonDH`, `MSKH`, `MSHH`, `DanhGia`, `NhanXet`, `TinhTrangDG`) VALUES
(1, 33, 0, 2, 0, 'Nhanh, chu đáo,đẹp.', 0),
(2, 33, 0, 2, 0, 'Nhanh, chu đáo,đẹp.', 0),
(3, 33, 0, 2, 0, 'Nhanh, chu đáo,đẹp.', 0),
(4, 33, 38, 2, 0, 'nhanh,đúng mẫu.', 0),
(5, 33, 38, 2, 0, 'nhanh,đúng mẫu.', 0),
(6, 30, 38, 3, 0, 'malsm', 0),
(7, 30, 38, 3, 5, 'malsm', 0),
(8, 30, 38, 3, 5, 'malsm', 0),
(9, 33, 38, 2, 5, 'nhanh, đúng', 1),
(10, 33, 38, 2, 5, 'nhanh, đúng', 1),
(11, 33, 38, 2, 5, 'nhanh, đúng', 1),
(12, 30, 38, 3, 5, 'đẹp.', 1),
(13, 33, 38, 2, 5, 'kaka', 1),
(14, 33, 38, 2, 5, 'kaka', 1),
(20, 36, 42, 3, 5, 'Đẹp,nhanh', 1),
(21, 43, 45, 3, 5, 'Đẹp, nhanh.', 1),
(22, 43, 45, 3, 5, 'Đẹp, nhanh.', 1),
(23, 35, 38, 4, 5, 'Đẹp,nhanh,đúng mẫu', 1),
(24, 35, 38, 4, 5, 'Đẹp,nhanh,đúng mẫu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dathang`
--

CREATE TABLE `dathang` (
  `SoDonDH` int(10) NOT NULL,
  `MSKH` int(10) NOT NULL,
  `MSNV` int(10) NOT NULL,
  `NgayDH` datetime NOT NULL,
  `NgayGH` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `TrangThaiDH` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dathang`
--

INSERT INTO `dathang` (`SoDonDH`, `MSKH`, `MSNV`, `NgayDH`, `NgayGH`, `TrangThaiDH`) VALUES
(30, 38, 0, '2021-11-27 16:08:29', '2021-11-27 09:12:12', 1),
(31, 39, 0, '2021-11-27 16:10:44', '2021-11-27 09:10:44', 0),
(32, 40, 0, '2021-11-27 17:37:02', '2021-11-27 10:39:21', 1),
(33, 38, 4, '2021-11-28 15:58:21', '2021-12-05 05:25:00', 1),
(34, 38, 0, '2021-11-29 21:30:19', '2021-11-29 14:30:46', 1),
(35, 38, 4, '2021-11-29 21:38:41', '2021-12-04 06:44:00', 1),
(36, 42, 4, '2021-12-04 15:28:57', '2021-12-05 08:29:00', 1),
(37, 42, 0, '2021-12-04 15:51:27', '2021-12-04 08:51:27', 0),
(38, 42, 0, '2021-12-04 15:52:52', '2021-12-04 08:52:52', 0),
(39, 42, 0, '2021-12-04 15:52:58', '2021-12-04 08:52:58', 0),
(43, 45, 0, '2021-12-04 16:57:40', '2021-12-04 09:57:40', 0),
(44, 45, 4, '2021-12-04 16:59:21', '2021-12-05 10:01:00', 1),
(45, 38, 4, '2021-12-04 21:58:48', '2021-12-05 14:59:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `diachi`
--

CREATE TABLE `diachi` (
  `MaDC` int(11) NOT NULL,
  `Diachi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `MSKH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `diachi`
--

INSERT INTO `diachi` (`MaDC`, `Diachi`, `MSKH`) VALUES
(32, 'An Giang', 38),
(33, 'Ninh kiều, Cần Thơ', 39),
(34, 'An Giang', 40),
(35, 'Cần Thơ', 42),
(36, 'An Giang', 43),
(37, 'Cần Thơ', 44),
(38, 'An Giang', 45);

-- --------------------------------------------------------

--
-- Table structure for table `doanhthu`
--

CREATE TABLE `doanhthu` (
  `MaDT` int(11) NOT NULL,
  `MSHH` int(10) NOT NULL,
  `NgayGH` datetime NOT NULL,
  `TongTien` int(11) NOT NULL,
  `SoLuongBan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giaodich`
--

CREATE TABLE `giaodich` (
  `MaGD` int(11) NOT NULL,
  `SoDonDH` int(10) NOT NULL,
  `MSKH` int(10) NOT NULL,
  `MSHH` int(10) NOT NULL,
  `SoLuong` int(10) NOT NULL,
  `MaMau` int(10) NOT NULL,
  `SizeHH` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NgayDat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giaodich`
--

INSERT INTO `giaodich` (`MaGD`, `SoDonDH`, `MSKH`, `MSHH`, `SoLuong`, `MaMau`, `SizeHH`, `NgayDat`) VALUES
(30, 30, 38, 1, 5, 1, 'L', '2021-11-27 09:08:29'),
(31, 30, 38, 2, 1, 2, 'L', '2021-11-27 09:08:29'),
(32, 30, 38, 3, 1, 3, 'L', '2021-11-27 09:08:29'),
(33, 31, 39, 1, 3, 1, 'L', '2021-11-27 09:10:44'),
(34, 31, 39, 3, 4, 3, 'L', '2021-11-27 09:10:44'),
(35, 32, 40, 7, 1, 0, 'L', '2021-11-27 10:37:02'),
(36, 32, 40, 1, 4, 1, 'L', '2021-11-27 10:37:02'),
(37, 33, 38, 1, 4, 1, 'L', '2021-11-28 08:58:21'),
(38, 33, 38, 2, 1, 2, 'L', '2021-11-28 08:58:21'),
(39, 34, 38, 1, 3, 1, 'L', '2021-11-29 14:30:19'),
(40, 34, 38, 3, 3, 3, 'L', '2021-11-29 14:30:19'),
(41, 35, 38, 1, 4, 1, 'L', '2021-11-29 14:38:41'),
(42, 35, 38, 4, 4, 4, 'L', '2021-11-29 14:38:41'),
(43, 36, 42, 2, 1, 2, 'L', '2021-12-04 08:28:57'),
(44, 36, 42, 3, 1, 3, 'L', '2021-12-04 08:28:57'),
(45, 37, 42, 4, 2, 4, 'L', '2021-12-04 08:51:27'),
(46, 37, 42, 3, 1, 3, 'L', '2021-12-04 08:51:27'),
(47, 38, 42, 3, 1, 3, 'L', '2021-12-04 08:52:52'),
(48, 39, 42, 3, 1, 3, 'L', '2021-12-04 08:52:58'),
(49, 40, 43, 1, 1, 1, 'L', '2021-12-04 09:14:48'),
(50, 41, 43, 2, 1, 2, 'L', '2021-12-04 09:16:16'),
(51, 42, 44, 3, 3, 3, 'L', '2021-12-04 09:26:43'),
(52, 43, 45, 4, 4, 0, 'L', '2021-12-04 09:57:40'),
(53, 43, 45, 3, 1, 3, 'L', '2021-12-04 09:57:40'),
(54, 44, 45, 3, 3, 3, 'L', '2021-12-04 09:59:21'),
(55, 45, 38, 1, 4, 1, 'L', '2021-12-04 14:58:48'),
(56, 45, 38, 2, 1, 2, 'L', '2021-12-04 14:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` int(10) NOT NULL,
  `TenHH` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `QuyCach` text COLLATE utf8_unicode_ci NOT NULL,
  `BaoQuan` longtext COLLATE utf8_unicode_ci NOT NULL,
  `Gia` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuongHang` int(10) NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MaLoaiHang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `QuyCach`, `BaoQuan`, `Gia`, `SoLuongHang`, `image`, `MaLoaiHang`) VALUES
(1, 'ÁO THUN CỔ TRÒN VIỀN CHỮ MS SP000001', 'Áo thun cổ tròn, tay ngắn. Có 1 túi vuông phía trước.Chần chỉ khác màu nổi viền tạo điểm nhấn.<br><br>\n\nMang đến vẻ ngoài hiện đại và trẻ trung cho các chàng trai sành điệu. Chất vải dày dặn, mềm mại, thoáng mát và thấm hút mồ hôi tốt. Là Item có thể dùng hằng ngày, giúp bạn thỏa thích phối trang phục theo nhiều phong cách khác nhau.<br><br>', 'Chi tiết bảo quản sản phẩm : <br> <br>\n\n                                    * Vải dệt kim : sau khi giặt sản phẩm phải được phơi ngang tránh bai giãn. <br><br>\n\n                                    * Vải voan , lụa , chiffon nên giặt bằng tay.<br><br>\n\n                                    * Vải thô , tuytsy , kaki không có phối hay trang trí đá cườm thì có thể giặt máy.<br><br>\n\n                                    * Vải thô , tuytsy, kaki có phối màu tường phản hay trang trí voan , lụa , đá cườm thì cần giặt tay.<br><br>\n\n                                    * Đồ Jeans nên hạn chế giặt bằng máy giặt vì sẽ làm phai màu jeans.Nếu giặt thì nên lộn trái sản phẩm khi giặt , đóng khuy , kéo khóa, không nên giặt chung cùng đồ sáng màu , tránh dính màu vào các sản phẩm khác.<br><br>\n\n                                    * Các sản phẩm cần được giặt ngay không ngâm tránh bị loang màu , phân biệt màu và loại vải để tránh trường hợp vải phai. Không nên giặt sản phẩm với xà phòng có chất tẩy mạnh , nên giặt cùng xà phòng pha loãng.<br><br>\n\n                                    * Các sản phẩm có thể giặt bằng máy thì chỉ nên để chế độ giặt nhẹ , vắt mức trung bình và nên phân các loại sản phẩm cùng màu và cùng loại vải khi giặt.<br><br>\n\n                                    * Nên phơi sản phẩm tại chỗ thoáng mát , tránh ánh nắng trực tiếp sẽ dễ bị phai bạc màu , nên làm khô quần áo bằng cách phơi ở những điểm gió sẽ giữ màu vải tốt hơn.<br><br>\n\n                                    * Những chất vải 100% cotton , không nên phơi sản phẩm bằng mắc áo mà nên vắt ngang sản phẩm lên dây phơi để tránh tình trạng rạn vải<br><br>\n\n                                    * Khi ủi sản phẩm bằng bàn là và sử dụng chế độ hơi nước sẽ làm cho sản phẩm dễ ủi phẳng , mát và không bị cháy , giữ màu sản phẩm được đẹp và bền lâu hơn. Nhiệt độ của bàn là tùy theo từng loại vải.', '199000', 10, 'sp00001-aothun1.jpg', 1),
(2, 'ÁO THUN TAY ÁO PHÔÍ TÚI MS SP000002', 'Áo thun cổ tròn, tay ngắn 1 bên có may túi vuông có nắp trang trí. Dáng xuông. In chữ phía trước.<br><br>\n\nMang phong cách khỏe khoắn, năng động với chất liệu thun co giãn và thấm hút mồ hôi tốt là 1 team không thể thiếu trong tủ đồ mùa hè của mọi gia đình. Áo có độ co giãn tốt, bền chắc, thoáng mát, thấm hút mồ hôi. Họa tiết in trẻ trung, nổi bật vô cùng bắt mắt, là điểm nhấn cho chiếc áo thêm phần ấn tượng hơn.<br><br>', 'Chi tiết bảo quản sản phẩm : <br> <br>\n\n                                    * Vải dệt kim : sau khi giặt sản phẩm phải được phơi ngang tránh bai dãn. <br><br>\n\n                                    * Vải voan , lụa , chiffon nên giặt bằng tay.<br><br>\n\n                                    * Vải thô , tuytsy , kaki không có phối hay trang trí đá cườm thì có thể giặt máy.<br><br>\n\n                                    * Vải thô , tuytsy, kaki có phối màu tường phản hay trang trí voan , lụa , đá cườm thì cần giặt tay.<br><br>\n\n                                    * Đồ Jeans nên hạn chế giặt bằng máy giặt vì sẽ làm phai màu jeans.Nếu giặt thì nên lộn trái sản phẩm khi giặt , đóng khuy , kéo khóa, không nên giặt chung cùng đồ sáng màu , tránh dính màu vào các sản phẩm khác.<br><br>\n\n                                    * Các sản phẩm cần được giặt ngay không ngâm tránh bị loang màu , phân biệt màu và loại vải để tránh trường hợp vải phai. Không nên giặt sản phẩm với xà phòng có chất tẩy mạnh , nên giặt cùng xà phòng pha loãng.<br><br>\n\n                                    * Các sản phẩm có thể giặt bằng máy thì chỉ nên để chế độ giặt nhẹ , vắt mức trung bình và nên phân các loại sản phẩm cùng màu và cùng loại vải khi giặt.<br><br>\n\n                                    * Nên phơi sản phẩm tại chỗ thoáng mát , tránh ánh nắng trực tiếp sẽ dễ bị phai bạc màu , nên làm khô quần áo bằng cách phơi ở những điểm gió sẽ giữ màu vải tốt hơn.<br><br>\n\n                                    * Những chất vải 100% cotton , không nên phơi sản phẩm bằng mắc áo mà nên vắt ngang sản phẩm lên dây phơi để tránh tình trạng rạn vải<br><br>\n\n                                    * Khi ủi sản phẩm bằng bàn là và sử dụng chế độ hơi nước sẽ làm cho sản phẩm dễ ủi phẳng , mát và không bị cháy , giữ màu sản phẩm được đẹp và bền lâu hơn. Nhiệt độ của bàn là tùy theo từng loại vải.', '499000', 16, 'sp00002-aothun1.jpg', 1),
(3, 'ÁO THUN HỌA TIẾT ĐỘNG VẬT MS SP000003', 'Áo thun cổ tròn, tay ngắn bo vải trơn khác màu. Vải họa tiết hình độc lạ.<br><br>\r\n\r\nMang đến vẻ ngoài hiện đại và trẻ trung cho các chàng trai sành điệu. Có thể nói thiết kế này là một món đồ phải có trong tủ quần áo của cánh mày râu. Chúng chính là sự kết hợp của sự năng động và thanh lịch trong cùng một chiếc áo.<br><br>', 'Chi tiết bảo quản sản phẩm : <br> <br>\r\n\r\n                                    * Vải dệt kim : sau khi giặt sản phẩm phải được phơi ngang tránh bai dãn. <br><br>\r\n\r\n                                    * Vải voan , lụa , chiffon nên giặt bằng tay.<br><br>\r\n\r\n                                    * Vải thô , tuytsy , kaki không có phối hay trang trí đá cườm thì có thể giặt máy.<br><br>\r\n\r\n                                    * Vải thô , tuytsy, kaki có phối màu tường phản hay trang trí voan , lụa , đá cườm thì cần giặt tay.<br><br>\r\n\r\n                                    * Đồ Jeans nên hạn chế giặt bằng máy giặt vì sẽ làm phai màu jeans.Nếu giặt thì nên lộn trái sản phẩm khi giặt , đóng khuy , kéo khóa, không nên giặt chung cùng đồ sáng màu , tránh dính màu vào các sản phẩm khác.<br><br>\r\n\r\n                                    * Các sản phẩm cần được giặt ngay không ngâm tránh bị loang màu , phân biệt màu và loại vải để tránh trường hợp vải phai. Không nên giặt sản phẩm với xà phòng có chất tẩy mạnh , nên giặt cùng xà phòng pha loãng.<br><br>\r\n\r\n                                    * Các sản phẩm có thể giặt bằng máy thì chỉ nên để chế độ giặt nhẹ , vắt mức trung bình và nên phân các loại sản phẩm cùng màu và cùng loại vải khi giặt.<br><br>\r\n\r\n                                    * Nên phơi sản phẩm tại chỗ thoáng mát , tránh ánh nắng trực tiếp sẽ dễ bị phai bạc màu , nên làm khô quần áo bằng cách phơi ở những điểm gió sẽ giữ màu vải tốt hơn.<br><br>\r\n\r\n                                    * Những chất vải 100% cotton , không nên phơi sản phẩm bằng mắc áo mà nên vắt ngang sản phẩm lên dây phơi để tránh tình trạng rạn vải<br><br>\r\n\r\n                                    * Khi ủi sản phẩm bằng bàn là và sử dụng chế độ hơi nước sẽ làm cho sản phẩm dễ ủi phẳng , mát và không bị cháy , giữ màu sản phẩm được đẹp và bền lâu hơn. Nhiệt độ của bàn là tùy theo từng loại vải.', '289000', 8, 'sp00003-aothun1.jpg', 1),
(4, 'ÁO THUN AKAI MEN MS SP000004', 'Là Item có thể dùng hàng ngày, giúp bạn thỏa thích phối trang phục theo nhiều phong cách khác nhau. Sản phẩm chất lượng hoàn hảo, mang tính ứng dụng cao, bạn có thể mặc đi làm hay đi chơi, hoạt động thể thao đều phù hợp.<br><br>', 'Chi tiết bảo quản sản phẩm : <br> <br>\n\n                                    * Vải dệt kim : sau khi giặt sản phẩm phải được phơi ngang tránh bai dãn. <br><br>\n\n                                    * Vải voan , lụa , chiffon nên giặt bằng tay.<br><br>\n\n                                    * Vải thô , tuytsy , kaki không có phối hay trang trí đá cườm thì có thể giặt máy.<br><br>\n\n                                    * Vải thô , tuytsy, kaki có phối màu tường phản hay trang trí voan , lụa , đá cườm thì cần giặt tay.<br><br>\n\n                                    * Đồ Jeans nên hạn chế giặt bằng máy giặt vì sẽ làm phai màu jeans.Nếu giặt thì nên lộn trái sản phẩm khi giặt , đóng khuy , kéo khóa, không nên giặt chung cùng đồ sáng màu , tránh dính màu vào các sản phẩm khác.<br><br>\n\n                                    * Các sản phẩm cần được giặt ngay không ngâm tránh bị loang màu , phân biệt màu và loại vải để tránh trường hợp vải phai. Không nên giặt sản phẩm với xà phòng có chất tẩy mạnh , nên giặt cùng xà phòng pha loãng.<br><br>\n\n                                    * Các sản phẩm có thể giặt bằng máy thì chỉ nên để chế độ giặt nhẹ , vắt mức trung bình và nên phân các loại sản phẩm cùng màu và cùng loại vải khi giặt.<br><br>\n\n                                    * Nên phơi sản phẩm tại chỗ thoáng mát , tránh ánh nắng trực tiếp sẽ dễ bị phai bạc màu , nên làm khô quần áo bằng cách phơi ở những điểm gió sẽ giữ màu vải tốt hơn.<br><br>\n\n                                    * Những chất vải 100% cotton , không nên phơi sản phẩm bằng mắc áo mà nên vắt ngang sản phẩm lên dây phơi để tránh tình trạng rạn vải<br><br>\n\n                                    * Khi ủi sản phẩm bằng bàn là và sử dụng chế độ hơi nước sẽ làm cho sản phẩm dễ ủi phẳng , mát và không bị cháy , giữ màu sản phẩm được đẹp và bền lâu hơn. Nhiệt độ của bàn là tùy theo từng loại vải.', '399000', 1, 'sp00004-aothun1.jpg', 1),
(5, 'ÁO THUN CITY RIDER 1987 MS SP000005', 'Áo thun nam cổ tròn, tay ngắn. Trang trí hình và chữ sinh động mặt trước. Dáng áo suông cơ bản.<br><br>\n\nChất liệu thun cao cấp cùng thiết kế bắt mắt, mang đến cho bạn nam sự trẻ trung, năng động nhưng cũng không kém phần hiện đại. Bên cạnh đó, sản phẩm với gam màu trung tính, giúp bạn nam dễ phối cùng các phụ kiện khác làm tăng thêm sự sành điệu trong phong cách thời trang của mình.<br><br>', 'Chi tiết bảo quản sản phẩm : <br> <br>\n\n                                    * Vải dệt kim : sau khi giặt sản phẩm phải được phơi ngang tránh bai dãn. <br><br>\n\n                                    * Vải voan , lụa , chiffon nên giặt bằng tay.<br><br>\n\n                                    * Vải thô , tuytsy , kaki không có phối hay trang trí đá cườm thì có thể giặt máy.<br><br>\n\n                                    * Vải thô , tuytsy, kaki có phối màu tường phản hay trang trí voan , lụa , đá cườm thì cần giặt tay.<br><br>\n\n                                    * Đồ Jeans nên hạn chế giặt bằng máy giặt vì sẽ làm phai màu jeans.Nếu giặt thì nên lộn trái sản phẩm khi giặt , đóng khuy , kéo khóa, không nên giặt chung cùng đồ sáng màu , tránh dính màu vào các sản phẩm khác.<br><br>\n\n                                    * Các sản phẩm cần được giặt ngay không ngâm tránh bị loang màu , phân biệt màu và loại vải để tránh trường hợp vải phai. Không nên giặt sản phẩm với xà phòng có chất tẩy mạnh , nên giặt cùng xà phòng pha loãng.<br><br>\n\n                                    * Các sản phẩm có thể giặt bằng máy thì chỉ nên để chế độ giặt nhẹ , vắt mức trung bình và nên phân các loại sản phẩm cùng màu và cùng loại vải khi giặt.<br><br>\n\n                                    * Nên phơi sản phẩm tại chỗ thoáng mát , tránh ánh nắng trực tiếp sẽ dễ bị phai bạc màu , nên làm khô quần áo bằng cách phơi ở những điểm gió sẽ giữ màu vải tốt hơn.<br><br>\n\n                                    * Những chất vải 100% cotton , không nên phơi sản phẩm bằng mắc áo mà nên vắt ngang sản phẩm lên dây phơi để tránh tình trạng rạn vải<br><br>\n\n                                    * Khi ủi sản phẩm bằng bàn là và sử dụng chế độ hơi nước sẽ làm cho sản phẩm dễ ủi phẳng , mát và không bị cháy , giữ màu sản phẩm được đẹp và bền lâu hơn. Nhiệt độ của bàn là tùy theo từng loại vải.', '199000', 14, 'sp00005-aothun1.jpg', 1),
(6, 'ÁO THUN BATMAN MS SP000006', 'Áo thun nam batman cổ tròn, tay ngắn. Trang trí hình và chữ sinh động mặt trước. Dáng áo suông cơ bản.<br><br>\n\nChất liệu thun cao cấp cùng thiết kế bắt mắt, mang đến cho bạn nam sự trẻ trung, năng động nhưng cũng không kém phần hiện đại. Bên cạnh đó, sản phẩm với gam màu trung tính, giúp bạn nam dễ phối cùng các phụ kiện khác làm tăng thêm sự sành điệu trong phong cách thời trang của mình.<br><br>', 'Chi tiết bảo quản sản phẩm : <br> <br>\n\n                                    * Vải dệt kim : sau khi giặt sản phẩm phải được phơi ngang tránh bai dãn. <br><br>\n\n                                    * Vải voan , lụa , chiffon nên giặt bằng tay.<br><br>\n\n                                    * Vải thô , tuytsy , kaki không có phối hay trang trí đá cườm thì có thể giặt máy.<br><br>\n\n                                    * Vải thô , tuytsy, kaki có phối màu tường phản hay trang trí voan , lụa , đá cườm thì cần giặt tay.<br><br>\n\n                                    * Đồ Jeans nên hạn chế giặt bằng máy giặt vì sẽ làm phai màu jeans.Nếu giặt thì nên lộn trái sản phẩm khi giặt , đóng khuy , kéo khóa, không nên giặt chung cùng đồ sáng màu , tránh dính màu vào các sản phẩm khác.<br><br>\n\n                                    * Các sản phẩm cần được giặt ngay không ngâm tránh bị loang màu , phân biệt màu và loại vải để tránh trường hợp vải phai. Không nên giặt sản phẩm với xà phòng có chất tẩy mạnh , nên giặt cùng xà phòng pha loãng.<br><br>\n\n                                    * Các sản phẩm có thể giặt bằng máy thì chỉ nên để chế độ giặt nhẹ , vắt mức trung bình và nên phân các loại sản phẩm cùng màu và cùng loại vải khi giặt.<br><br>\n\n                                    * Nên phơi sản phẩm tại chỗ thoáng mát , tránh ánh nắng trực tiếp sẽ dễ bị phai bạc màu , nên làm khô quần áo bằng cách phơi ở những điểm gió sẽ giữ màu vải tốt hơn.<br><br>\n\n                                    * Những chất vải 100% cotton , không nên phơi sản phẩm bằng mắc áo mà nên vắt ngang sản phẩm lên dây phơi để tránh tình trạng rạn vải<br><br>\n\n                                    * Khi ủi sản phẩm bằng bàn là và sử dụng chế độ hơi nước sẽ làm cho sản phẩm dễ ủi phẳng , mát và không bị cháy , giữ màu sản phẩm được đẹp và bền lâu hơn. Nhiệt độ của bàn là tùy theo từng loại vải.', '289000', 11, 'sp00006-aothun1.jpg', 1),
(7, 'ÁO THUN LONG RIDE MS SP000007', 'Áo thun cổ tròn, tay ngắn. Dáng xuông. In hình và chữ mặt trước.<br><br>\n\nMang phong cách khỏe khoắn, năng động với chất liệu thun co giãn và thấm hút mồ hôi tốt là 1 team không thể thiếu trong tủ đồ mùa hè của mọi gia đình. Áo có độ co giãn tốt, bền chắc, thoáng mát, thấm hút mồ hôi. Họa tiết in trẻ trung, nổi bật vô cùng bắt mắt, là điểm nhấn cho chiếc áo thêm phần ấn tượng hơn.<br><br>', 'Chi tiết bảo quản sản phẩm : <br> <br>\n\n                                    * Vải dệt kim : sau khi giặt sản phẩm phải được phơi ngang tránh bai dãn. <br><br>\n\n                                    * Vải voan , lụa , chiffon nên giặt bằng tay.<br><br>\n\n                                    * Vải thô , tuytsy , kaki không có phối hay trang trí đá cườm thì có thể giặt máy.<br><br>\n\n                                    * Vải thô , tuytsy, kaki có phối màu tường phản hay trang trí voan , lụa , đá cườm thì cần giặt tay.<br><br>\n\n                                    * Đồ Jeans nên hạn chế giặt bằng máy giặt vì sẽ làm phai màu jeans.Nếu giặt thì nên lộn trái sản phẩm khi giặt , đóng khuy , kéo khóa, không nên giặt chung cùng đồ sáng màu , tránh dính màu vào các sản phẩm khác.<br><br>\n\n                                    * Các sản phẩm cần được giặt ngay không ngâm tránh bị loang màu , phân biệt màu và loại vải để tránh trường hợp vải phai. Không nên giặt sản phẩm với xà phòng có chất tẩy mạnh , nên giặt cùng xà phòng pha loãng.<br><br>\n\n                                    * Các sản phẩm có thể giặt bằng máy thì chỉ nên để chế độ giặt nhẹ , vắt mức trung bình và nên phân các loại sản phẩm cùng màu và cùng loại vải khi giặt.<br><br>\n\n                                    * Nên phơi sản phẩm tại chỗ thoáng mát , tránh ánh nắng trực tiếp sẽ dễ bị phai bạc màu , nên làm khô quần áo bằng cách phơi ở những điểm gió sẽ giữ màu vải tốt hơn.<br><br>\n\n                                    * Những chất vải 100% cotton , không nên phơi sản phẩm bằng mắc áo mà nên vắt ngang sản phẩm lên dây phơi để tránh tình trạng rạn vải<br><br>\n\n                                    * Khi ủi sản phẩm bằng bàn là và sử dụng chế độ hơi nước sẽ làm cho sản phẩm dễ ủi phẳng , mát và không bị cháy , giữ màu sản phẩm được đẹp và bền lâu hơn. Nhiệt độ của bàn là tùy theo từng loại vải.', '179000', 29, 'sp00007-aothun1.jpg', 1),
(8, 'ÁO THUN VIỀN CHỈ NỔI MS SP000008', 'Áo thun cổ tròn, tay ngắn. Có 1 túi vuông phía trước.Chần chỉ khác màu nổi viền tạo điểm nhấn.<br><br>\n\nMang đến vẻ ngoài hiện đại và trẻ trung cho các chàng trai sành điệu. Chất vải dày dặn, mềm mại, thoáng mát và thấm hút mồ hôi tốt. Là Item có thể dùng hằng ngày, giúp bạn thỏa thích phối trang phục theo nhiều phong cách khác nhau.<br><br>', 'Chi tiết bảo quản sản phẩm : <br> <br>\n\n                                    * Vải dệt kim : sau khi giặt sản phẩm phải được phơi ngang tránh bai dãn. <br><br>\n\n                                    * Vải voan , lụa , chiffon nên giặt bằng tay.<br><br>\n\n                                    * Vải thô , tuytsy , kaki không có phối hay trang trí đá cườm thì có thể giặt máy.<br><br>\n\n                                    * Vải thô , tuytsy, kaki có phối màu tường phản hay trang trí voan , lụa , đá cườm thì cần giặt tay.<br><br>\n\n                                    * Đồ Jeans nên hạn chế giặt bằng máy giặt vì sẽ làm phai màu jeans.Nếu giặt thì nên lộn trái sản phẩm khi giặt , đóng khuy , kéo khóa, không nên giặt chung cùng đồ sáng màu , tránh dính màu vào các sản phẩm khác.<br><br>\n\n                                    * Các sản phẩm cần được giặt ngay không ngâm tránh bị loang màu , phân biệt màu và loại vải để tránh trường hợp vải phai. Không nên giặt sản phẩm với xà phòng có chất tẩy mạnh , nên giặt cùng xà phòng pha loãng.<br><br>\n\n                                    * Các sản phẩm có thể giặt bằng máy thì chỉ nên để chế độ giặt nhẹ , vắt mức trung bình và nên phân các loại sản phẩm cùng màu và cùng loại vải khi giặt.<br><br>\n\n                                    * Nên phơi sản phẩm tại chỗ thoáng mát , tránh ánh nắng trực tiếp sẽ dễ bị phai bạc màu , nên làm khô quần áo bằng cách phơi ở những điểm gió sẽ giữ màu vải tốt hơn.<br><br>\n\n                                    * Những chất vải 100% cotton , không nên phơi sản phẩm bằng mắc áo mà nên vắt ngang sản phẩm lên dây phơi để tránh tình trạng rạn vải<br><br>\n\n                                    * Khi ủi sản phẩm bằng bàn là và sử dụng chế độ hơi nước sẽ làm cho sản phẩm dễ ủi phẳng , mát và không bị cháy , giữ màu sản phẩm được đẹp và bền lâu hơn. Nhiệt độ của bàn là tùy theo từng loại vải.', '179000', 40, 'sp00008-aothun1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hinhhanghoa`
--

CREATE TABLE `hinhhanghoa` (
  `Mahinh` int(10) NOT NULL,
  `Tenhinh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MSHH` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hinhhanghoa`
--

INSERT INTO `hinhhanghoa` (`Mahinh`, `Tenhinh`, `MSHH`) VALUES
(1, 'sp00001-aothun1.jpg', 1),
(2, 'sp00001-aothun2.jpg', 1),
(3, 'sp00001-aothun3.jpg', 1),
(4, 'sp00001-aothun4.jpg', 1),
(5, 'sp00001-aothun5.jpg', 1),
(6, 'sp00002-aothun1.jpg', 2),
(7, 'sp00002-aothun2.jpg', 2),
(8, 'sp00002-aothun3.jpg', 2),
(9, 'sp00002-aothun4.jpg', 2),
(10, 'sp00002-aothun5.jpg', 2),
(11, 'sp00003-aothun1.jpg', 3),
(12, 'sp00003-aothun2.jpg', 3),
(13, 'sp00003-aothun3.jpg', 3),
(14, 'sp00003-aothun4.jpg', 3),
(15, 'sp00003-aothun5.jpg', 3),
(16, 'sp00004-aothun1.jpg', 4),
(17, 'sp00004-aothun2.jpg', 4),
(18, 'sp00004-aothun3.jpg', 4),
(19, 'sp00004-aothun4.jpg', 4),
(20, 'sp00004-aothun5.jpg', 4),
(21, 'sp00005-aothun1.jpg', 5),
(22, 'sp00005-aothun2.jpg', 5),
(23, 'sp00005-aothun3.jpg', 5),
(24, 'sp00005-aothun4.jpg', 5),
(25, 'sp00005-aothun5.jpg', 5),
(26, 'sp00006-aothun1.jpg', 6),
(27, 'sp00006-aothun2.jpg', 6),
(28, 'sp00006-aothun3.jpg', 6),
(29, 'sp00006-aothun4.jpg', 6),
(30, 'sp00006-aothun5.jpg', 6),
(31, 'sp00007-aothun1.jpg', 7),
(32, 'sp00007-aothun2.jpg', 7),
(33, 'sp00007-aothun3.jpg', 7),
(34, 'sp00007-aothun4.jpg', 7),
(35, 'sp00007-aothun5.jpg', 7),
(36, 'sp00008-aothun1.jpg', 8),
(37, 'sp00008-aothun2.jpg', 8),
(38, 'sp00008-aothun3.jpg', 8),
(39, 'sp00008-aothun4.jpg', 8),
(40, 'sp00008-aothun5.jpg', 8);

-- --------------------------------------------------------

--
-- Table structure for table `huydon`
--

CREATE TABLE `huydon` (
  `MaHuyDon` int(10) NOT NULL,
  `SoDonDH` int(10) NOT NULL,
  `TinhTrang` int(10) NOT NULL,
  `HuyDon` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `huydon`
--

INSERT INTO `huydon` (`MaHuyDon`, `SoDonDH`, `TinhTrang`, `HuyDon`) VALUES
(1, 26, 1, 2),
(3, 29, 1, 2),
(4, 30, 1, 2),
(5, 31, 0, 0),
(6, 32, 1, 1),
(7, 33, 1, 2),
(8, 34, 1, 2),
(9, 35, 1, 0),
(10, 36, 1, 0),
(11, 37, 0, 0),
(12, 38, 0, 0),
(13, 39, 0, 0),
(14, 40, 0, 0),
(15, 41, 0, 0),
(16, 42, 0, 0),
(17, 43, 0, 2),
(18, 44, 1, 0),
(19, 45, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `loaihanghoa`
--

CREATE TABLE `loaihanghoa` (
  `MaLoaiHang` int(10) NOT NULL,
  `TenLoaiHang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `HinhDaiDien` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaihanghoa`
--

INSERT INTO `loaihanghoa` (`MaLoaiHang`, `TenLoaiHang`, `HinhDaiDien`) VALUES
(1, 'Áo thun nam', 'sp00004-aothun1.jpg'),
(2, 'Áo thun nữ', 'sp000012-aothun1.jpg'),
(15, 'Áo sơ mi nam', 'sp000015-somi1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mauhh`
--

CREATE TABLE `mauhh` (
  `MaMau` int(10) NOT NULL,
  `TenMau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Hinh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MSHH` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mauhh`
--

INSERT INTO `mauhh` (`MaMau`, `TenMau`, `Hinh`, `MSHH`) VALUES
(1, 'Xanh Lá - Bạc Hà', 'color-bacha.jpg', 1),
(2, 'Gold - Xanh Lơ - Đen', 'color-xamtui.jpg', 2),
(3, 'Họa tiết Trắng', 'color-caro.jpg', 3),
(4, 'Đen - Xanh Lime', 'color-xanhden.jpg', 4),
(5, 'Trắng - Vàng hoa cúc', 'color-vang.jpg', 5),
(6, 'Xanh Lá Đậm - Đỏ Mận', 'color-doman.jpg', 6),
(7, 'Trắng', 'color-trang.jpg', 7),
(8, 'Xanh rêu', 'color-reu.jpg', 8);

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` int(10) NOT NULL,
  `HoTenNV` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ChucVu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SoDT` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDT`, `email`, `password`) VALUES
(1, 'Lương Hoàng Huy', '', 'Hẻm 19,Đường Nguyễn Văn Linh,Phường Hưng Lợi,Quận Ninh Kiều,TP Cần Thơ.', '0326794589', '', '5a8dccb220de5c6775c873ead6ff2e43'),
(2, 'Huỳnh Hoài An', '', 'Hẻm 4,Đường CMT8,Quận Ninh Kiều,TP Cần Thơ.', '0448564410', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(3, 'Nguyễn Thị Thu Ngân', 'Nhân Viên', 'Hẻm 11,Đường Nguyễn Văn Linh,Phường Hưng Lợi,Quận Ninh Kiều,TP Cần Thơ.', '0396623791', '', ''),
(4, 'Huỳnh Thanh Hùng', 'Admin', 'Hẻm 11,Đường Lý Tự Trọng,Phường Xuân Khánh,Quận Ninh Kiều,TP Cần Thơ.', '0340865911', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(7, 'Kim Hương', '', 'An Giangg', '0364498979', '', '2bd561b2144e481aaf94da6468574a23');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `thanh_vien` varchar(100) NOT NULL COMMENT 'thành viên thanh toán',
  `money` float NOT NULL COMMENT 'số tiền thanh toán',
  `note` varchar(255) DEFAULT NULL COMMENT 'ghi chú thanh toán',
  `vnp_response_code` varchar(255) NOT NULL COMMENT 'mã phản hồi',
  `code_vnpay` varchar(255) NOT NULL COMMENT 'mã giao dịch vnpay',
  `code_bank` varchar(255) NOT NULL COMMENT 'mã ngân hàng',
  `time` datetime NOT NULL COMMENT 'thời gian chuyển khoản'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `thanh_vien`, `money`, `note`, `vnp_response_code`, `code_vnpay`, `code_bank`, `time`) VALUES
(1, '742874161', 'abc', 100000, 'chinh chuyển khoản', '00', '13401455', 'NCB', '2020-10-10 01:00:00'),
(2, '608324672', 'abc', 1000000, 'test chuyển khoản', '00', '13401811', 'NCB', '2020-10-11 21:00:00'),
(3, '1134065293', 'CT2', 150000, 'học phí', '00', '13407163', 'NCB', '2020-10-22 23:00:00'),
(4, '596509313', 'CT2', 5000000, 'học phí', '00', '13407176', 'NCB', '2020-10-23 00:00:00'),
(5, '70267166', 'CT2', 5000000, 'học phí', '00', '13407178', 'NCB', '2020-10-23 00:00:00'),
(6, '1672349048', 'CT1', 150000, 'học phí', '00', '13407729', 'NCB', '2020-10-23 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `giohang_id` int(11) NOT NULL,
  `tensanpham` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `giasanpham` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `MaMau` int(10) NOT NULL,
  `Size` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `MSKH` int(11) NOT NULL,
  `HoTenKH` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `TenCongTy` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `SoDienThoai` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SoFax` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `giaohang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_khachhang`
--

INSERT INTO `tbl_khachhang` (`MSKH`, `HoTenKH`, `TenCongTy`, `SoDienThoai`, `SoFax`, `email`, `password`, `note`, `giaohang`) VALUES
(38, 'Huynh Thanh Hung', 'Akai', '0361269999', '111111119999', 'hung@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'nhanh nha.', 1),
(39, 'Huỳnh Thanh Hùng', 'Akai', '0361269999', '999911118888', 'huynhhung@gmail.com', '192c3425f0a3a4cca70e96149b5f3ff9', 'nhanh nha.', 1),
(40, 'Huỳnh văn A', 'Akai', '0361266499', '111111119999', 'ha@nklagam.com', '25d55ad283aa400af464c76d713c07ad', 'a', 1),
(41, 'Văn Chí', 'Đại Hùng', '0361266499', '999911118889', 'chi@gmail.com', '1e6086b705c7161eeb93a8b249a5ca7c', '', 0),
(42, 'Huynh hùng', 'Akai', '0361266499', '111111119999', 'huynhhung@gmail.com', '25f9e794323b453885f5181f1b624d0b', '', 0),
(43, 'Khang', 'An Thế', '0361266499', '111111119999', 'khang@gmail.com', '25d55ad283aa400af464c76d713c07ad', '', 1),
(44, 'võ ngọc khuê', 'Akai', '0361266499', '999911118888', 'khue@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', 1),
(45, 'Hùng', 'Akai', '0361266499', '111111119999', 'hung1010@gmail.com', '25f9e794323b453885f5181f1b624d0b', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD PRIMARY KEY (`SoDonDH`,`MSHH`);

--
-- Indexes for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`MaDanhGia`);

--
-- Indexes for table `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonDH`);

--
-- Indexes for table `diachi`
--
ALTER TABLE `diachi`
  ADD PRIMARY KEY (`MaDC`);

--
-- Indexes for table `doanhthu`
--
ALTER TABLE `doanhthu`
  ADD PRIMARY KEY (`MaDT`);

--
-- Indexes for table `giaodich`
--
ALTER TABLE `giaodich`
  ADD PRIMARY KEY (`MaGD`);

--
-- Indexes for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`),
  ADD KEY `MaLoaiHang` (`MaLoaiHang`);

--
-- Indexes for table `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD PRIMARY KEY (`Mahinh`),
  ADD KEY `MSHH` (`MSHH`);

--
-- Indexes for table `huydon`
--
ALTER TABLE `huydon`
  ADD PRIMARY KEY (`MaHuyDon`);

--
-- Indexes for table `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  ADD PRIMARY KEY (`MaLoaiHang`);

--
-- Indexes for table `mauhh`
--
ALTER TABLE `mauhh`
  ADD PRIMARY KEY (`MaMau`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD PRIMARY KEY (`giohang_id`);

--
-- Indexes for table `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`MSKH`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `MaDanhGia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `dathang`
--
ALTER TABLE `dathang`
  MODIFY `SoDonDH` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `diachi`
--
ALTER TABLE `diachi`
  MODIFY `MaDC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `doanhthu`
--
ALTER TABLE `doanhthu`
  MODIFY `MaDT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `giaodich`
--
ALTER TABLE `giaodich`
  MODIFY `MaGD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `MSHH` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  MODIFY `Mahinh` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `huydon`
--
ALTER TABLE `huydon`
  MODIFY `MaHuyDon` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  MODIFY `MaLoaiHang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mauhh`
--
ALTER TABLE `mauhh`
  MODIFY `MaMau` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MSNV` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `giohang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `MSKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `hanghoa_ibfk_1` FOREIGN KEY (`MaLoaiHang`) REFERENCES `loaihanghoa` (`MaLoaiHang`);

--
-- Constraints for table `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD CONSTRAINT `hinhhanghoa_ibfk_1` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
