-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 27, 2021 lúc 01:12 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webbanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Category`
--

CREATE TABLE `Category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `Category`
--

INSERT INTO `Category` (`id`, `name`) VALUES
(1, 'Phụ Nữ'),
(2, 'Nam'),
(13, 'Trẻ Em');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `FeedBack`
--

CREATE TABLE `FeedBack` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `FeedBack`
--

INSERT INTO `FeedBack` (`id`, `firstname`, `lastname`, `email`, `phone_number`, `subject_name`, `note`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Diep', 'Tran Van', 'tranvandiep.it@gmail.com', '21312312321', 'chu de 1', 'Noi dung 1', '2021-10-22 16:22:55', '2021-10-22 11:29:52', 1),
(2, 'OKOK', 'ABC Van', 'abc.it@gmail.com', '21312312321', 'chu de 2', 'Noi dung 2', '2021-10-22 16:22:55', '2021-10-27 13:11:32', 1),
(3, 'Diep', 'Tran Van', 'asashdsajdg@gmail.com', '0123456789', 'abc', 'accc', '2021-10-22 16:31:18', '2021-10-22 11:32:52', 1),
(4, 'TRAN', 'VAN DIEP', 'tranvandiep.it@gmail.com', '', '123123123', '123123123', '2021-10-27 13:10:48', '2021-10-27 13:11:33', 1),
(5, 'TRAN', 'VAN DIEP', 'tranvandiep.it@gmail.com', '+84967025996', 'eqweqweqwe', 'qweqweqweqe', '2021-10-27 13:11:16', '2021-10-27 13:11:16', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Galery`
--

CREATE TABLE `Galery` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `thumbnail` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Orders`
--

CREATE TABLE `Orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `Orders`
--

INSERT INTO `Orders` (`id`, `user_id`, `fullname`, `email`, `phone_number`, `address`, `note`, `order_date`, `status`, `total_money`) VALUES
(1, 3, 'TRAN VAN DIEP', 'tranvandiep.it@gmail.com', '0123456789', 'Ha Noi', 'ABC', '2021-10-22 16:43:54', 1, 3),
(2, 2, 'TRAN VAN A', 'abc@gmail.com', '123123123', 'Ha Noi', 'ABC', '2021-10-21 16:43:54', 2, 2),
(3, 1, 'TRAN VAN DIEP', 'tranvandiep.it@gmail.com', '', 'XOM GIAO, YEN TRI', '', '2021-10-27 12:42:16', 1, 4800000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Order_Details`
--

CREATE TABLE `Order_Details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `Order_Details`
--

INSERT INTO `Order_Details` (`id`, `order_id`, `product_id`, `price`, `num`, `total_money`) VALUES
(1, 2, 2, 1, 1, 1),
(2, 2, 3, 1, 1, 1),
(3, 1, 2, 1, 2, 2),
(4, 1, 3, 1, 1, 1),
(5, 3, 1, 600000, 5, 3000000),
(6, 3, 5, 600000, 3, 1800000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Product`
--

CREATE TABLE `Product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(350) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `thumbnail` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `Product`
--

INSERT INTO `Product` (`id`, `category_id`, `title`, `price`, `discount`, `thumbnail`, `description`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 2, 'ÁO POLO NAM', 650000, 600000, 'https://t004.gokisoft.com/uploads/2021/07/p-7537-ao-polo-nam.jpg', '<p>Áo PoPo Nam mang phong cách trẻ trung , phù hợp với nhiều lứa tuổi . Chất liệt mát mẻ .</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(37, 37, 43); font-family: Roboto, Helvetica, Arial, sans-serif;\"><strong style=\"font-weight: bold;\">Chất liệu:</strong></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(37, 37, 43); font-family: Roboto, Helvetica, Arial, sans-serif;\">Thành phần Coton là sợi vải tự nhiên lấy từ nguyên liệu chính là sợi bông, có độ mềm mịn, mang đến cảm giác dễ chịu, thoải mái cho người mác. Thấm hút mỏ hàn tốt do và làm mát cơ thể&nbsp;</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(37, 37, 43); font-family: Roboto, Helvetica, Arial, sans-serif;\">Thành phần Polyester giúp bề mặt&nbsp;vải trơn trượt không bị phai màu dễ&nbsp;làm sạch. Hạn chế nhăn&nbsp;tiết kiệm thời gian là ủi mỗi khi sử dụng&nbsp;</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(37, 37, 43); font-family: Roboto, Helvetica, Arial, sans-serif;\">Thành phần Spandex mang đến sự&nbsp;đàn hồi tuyệt vời giúp người mặc&nbsp;cảm thấy thoải mái và vừa vặn trong mọi hoạt động hàng ngày</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(37, 37, 43); font-family: Roboto, Helvetica, Arial, sans-serif;\"><strong style=\"font-weight: bold;\">Thiết kế:</strong><br>Sản phẩm có đường chỉ may tỉ mỉ, tinh tế.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(37, 37, 43); font-family: Roboto, Helvetica, Arial, sans-serif;\">Phom Slimfit ôm vừa, tôn dáng người mặc&nbsp;</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(37, 37, 43); font-family: Roboto, Helvetica, Arial, sans-serif;\">Thiết kế bo viền cách điều đơn giản, tinh tế</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(37, 37, 43); font-family: Roboto, Helvetica, Arial, sans-serif;\">Thêu chữ&nbsp;The Bluxury khẳng định thương hiệu</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(37, 37, 43); font-family: Roboto, Helvetica, Arial, sans-serif;\"><strong style=\"font-weight: bold;\">Mục đích sử dụng:</strong><br>Bạn có thể sử dụng polo cho ngày đi làm, đi học, rèn luyện thể thao, đi dạo, xuống phố và kết hợp cùng quần âu, kaki, jean, giày tây, giày thể thao,...</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(37, 37, 43); font-family: Roboto, Helvetica, Arial, sans-serif;\"><strong style=\"font-weight: bold;\">Hướng dẫn bảo quản:&nbsp;</strong><br>- Giặt máy với chu kỳ trung bình và vòng quay ngắn<br>- Giặt với nhiệt độ tối đa 30 độ C<br>- Sấy ở nhiệt độ thường&nbsp;<br>- Là ủi ở nhiệt độ thấp</p><p> </p>', '2021-10-22 14:03:21', '2021-10-27 08:26:11', 0),
(2, 1, 'san pham 1234234', 650000, 550000, 'https://res.cloudinary.com/ziczacgroup/image/upload/v1583834689/vf4gyxt7gmthx4eykvlp.jpg', 'okok', '2021-10-22 09:53:21', '2021-10-22 09:27:06', 0),
(3, 1, 'San pham 23234234234', 55000, 50000, 'assets/photos/bai-tap-c-program.jpeg', '<p style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; font-size: 1.08rem; margin: auto; outline: 0px; padding: 5px 0px; vertical-align: baseline; line-height: 1.9rem; text-rendering: geometricprecision; color: rgb(32, 32, 32); max-width: 760px; font-family: sans-serif, Arial;\">Sáng nay (22/10), các đại biểu Quốc hội thảo luận tại tổ về dự thảo Nghị quyết về một số cơ chế, chính sách đặc thù phát triển của các tỉnh, TP Hải Phòng, Nghệ An, Thanh Hóa và Thừa Thiên Huế.</p><table class=\"FmsArticleBoxStyle ImageBox ImageCenterBox Border-1 image\" style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-size: 1.08rem; margin: auto; outline: 0px; padding: 0px; vertical-align: baseline; border-spacing: 0px; overflow: auto; width: auto; max-width: 760px; line-height: 1.9rem; color: rgb(32, 32, 32); font-family: sans-serif, Arial; border: 0px !important;\"><tbody style=\"background: none; border: 0px; font-size: 17.28px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\"><tr style=\"background: none; border: 0px; font-size: 17.28px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\"><td class=\"FmsArticleBoxStyle-Images image \" style=\"background: none; font-size: 17.28px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; border: 0px !important; line-height: 24px !important;\"><a class=\"slidevnn cboxElement\" href=\"https://vnn-imgs-f.vgcloud.vn/2021/10/22/13/xay-dung-co-che-dac-thu-phat-trien-4-tinh-thanh-1.jpg\" title=\"Chủ tịch Quốc hội Vương Đình Huệ. Ảnh: Minh Đạt\" style=\"padding: 0px; color: rgb(151, 25, 40); margin: 0px; font-size: 17.28px; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; outline: 0px; line-height: 24px !important;\"><img src=\"https://vnn-imgs-f.vgcloud.vn/2021/10/22/13/xay-dung-co-che-dac-thu-phat-trien-4-tinh-thanh-1.jpg\" alt=\"Quốc hội bàn cơ chế đặc thù phát triển mạnh mẽ 4 tỉnh, thành\" style=\"background: none; border-width: 0px; border-color: initial; border-image: initial; font-size: 17.28px; margin: 0px auto; outline: 0px; padding: 0px; max-width: 100%; display: block;\"></a></td></tr><tr style=\"background: none; border: 0px; font-size: 17.28px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\"><td class=\"FmsArticleBoxStyle-Content image_desc\" style=\"background: none; font-size: 14px; margin: 5px 0px 0px; outline: 0px; padding: 2px 0px; vertical-align: baseline; color: rgb(34, 34, 34); line-height: 26px; font-style: italic; border: 0px !important;\">Chủ tịch Quốc hội Vương Đình Huệ. Ảnh: Minh Đạt</td></tr></tbody></table><p style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; font-size: 1.08rem; margin: auto; outline: 0px; padding: 5px 0px; vertical-align: baseline; line-height: 1.9rem; text-rendering: geometricprecision; color: rgb(32, 32, 32); max-width: 760px; font-family: sans-serif, Arial;\">Chủ tịch Quốc hội Vương Đình Huệ cho biết, đây là những tỉnh, thành có Nghị quyết riêng của Bộ Chính trị về phát triển các địa phương này. </p><p style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; font-size: 1.08rem; margin: auto; outline: 0px; padding: 5px 0px; vertical-align: baseline; line-height: 1.9rem; text-rendering: geometricprecision; color: rgb(32, 32, 32); max-width: 760px; font-family: sans-serif, Arial;\">Giải thích vì sao 4 tỉnh này lại thí điểm cơ chế đặc thù, Chủ tịch Quốc hội cho rằng, Hải Phòng là một trong tam giác phát triển phía bắc gồm Hà Nội – Hải Phòng – Quảng Ninh, một trong những cực tăng trưởng phía Bắc.</p><p style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; font-size: 1.08rem; margin: auto; outline: 0px; padding: 5px 0px; vertical-align: baseline; line-height: 1.9rem; text-rendering: geometricprecision; color: rgb(32, 32, 32); max-width: 760px; font-family: sans-serif, Arial;\">Thời gian gần đây, Hải Phòng phát triển bứt phá mạnh mẽ cả về tăng trưởng GDP, thu ngân sách, kết cấu hạ tầng, nông thôn mới. Hải Phòng xây dựng nông thôn mới đều theo tiêu chuẩn nâng cao, đầu tư cho 1 xã khoảng 135-180 tỷ đồng. Những huyện có khả năng lên quận còn đầu tư mạnh hơn…</p><p style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; font-size: 1.08rem; margin: auto; outline: 0px; padding: 5px 0px; vertical-align: baseline; line-height: 1.9rem; text-rendering: geometricprecision; color: rgb(32, 32, 32); max-width: 760px; font-family: sans-serif, Arial;\">Chủ tịch Quốc hội thông tin thêm, 9 tháng đầu năm nay mặc dù cả nước tăng trưởng thấp nhưng Hải Phòng vẫn tăng trưởng 12,23%. Cả nước phấn đấu thu nhập bình quân đầu người năm 2030 đạt 5.000 – 7.000 USD thì Hải Phòng đặt mục tiêu đến 2030 vượt mức 16.000 USD. Do đó nhu cầu phát triển của Hải Phòng rất lớn.</p><p style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; font-size: 1.08rem; margin: auto; outline: 0px; padding: 5px 0px; vertical-align: baseline; line-height: 1.9rem; text-rendering: geometricprecision; max-width: 760px; font-family: sans-serif, Arial;\"><font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">“Tầm nhìn của Hải Phòng xác định không còn là cực tăng trưởng nữa mà là động lực tăng trưởng của khu vực và động lực tăng trưởng của cả nước. </font></p><p style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; font-size: 1.08rem; margin: auto; outline: 0px; padding: 5px 0px; vertical-align: baseline; line-height: 1.9rem; text-rendering: geometricprecision; color: rgb(32, 32, 32); max-width: 760px; font-family: sans-serif, Arial;\">Hải Phòng phấn đấu là một trong những thành phố hoàn thành sớm nhất mục tiêu công nghiệp hóa, hiện đại hóa, trở thành đô thị có tầm cỡ, vị trí trong khu vực”, Chủ tịch Quốc hội nhấn mạnh.</p>', '2021-10-22 09:14:29', '2021-10-22 11:55:44', 0),
(4, 1, 'san pham 2', 250000, 200000, 'assets/photos/p-7536-ao-so-mi-nam-dai-tay-ke-caro.jpeg', 'noi dung 2', '2021-10-22 09:19:49', '2021-10-22 11:06:45', 0),
(5, 2, 'ÁO POLO NAM', 650000, 600000, 'https://t004.gokisoft.com/uploads/2021/07/p-7537-ao-polo-nam.jpg', 'Áo PoPo Nam mang phong cách trẻ trung , phù hợp với nhiều lứa tuổi . Chất liệt mát mẻ . ', '2021-10-22 14:03:21', '2021-10-22 14:03:21', 0),
(6, 1, 'san pham 1234234', 650000, 550000, 'https://res.cloudinary.com/ziczacgroup/image/upload/v1583834689/vf4gyxt7gmthx4eykvlp.jpg', 'okok', '2021-10-22 09:53:21', '2021-10-22 09:27:06', 0),
(7, 1, 'San pham 23234234234', 55000, 50000, 'assets/photos/bai-tap-c-program.jpeg', '<p style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; font-size: 1.08rem; margin: auto; outline: 0px; padding: 5px 0px; vertical-align: baseline; line-height: 1.9rem; text-rendering: geometricprecision; color: rgb(32, 32, 32); max-width: 760px; font-family: sans-serif, Arial;\">Sáng nay (22/10), các đại biểu Quốc hội thảo luận tại tổ về dự thảo Nghị quyết về một số cơ chế, chính sách đặc thù phát triển của các tỉnh, TP Hải Phòng, Nghệ An, Thanh Hóa và Thừa Thiên Huế.</p><table class=\"FmsArticleBoxStyle ImageBox ImageCenterBox Border-1 image\" style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-size: 1.08rem; margin: auto; outline: 0px; padding: 0px; vertical-align: baseline; border-spacing: 0px; overflow: auto; width: auto; max-width: 760px; line-height: 1.9rem; color: rgb(32, 32, 32); font-family: sans-serif, Arial; border: 0px !important;\"><tbody style=\"background: none; border: 0px; font-size: 17.28px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\"><tr style=\"background: none; border: 0px; font-size: 17.28px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\"><td class=\"FmsArticleBoxStyle-Images image \" style=\"background: none; font-size: 17.28px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; border: 0px !important; line-height: 24px !important;\"><a class=\"slidevnn cboxElement\" href=\"https://vnn-imgs-f.vgcloud.vn/2021/10/22/13/xay-dung-co-che-dac-thu-phat-trien-4-tinh-thanh-1.jpg\" title=\"Chủ tịch Quốc hội Vương Đình Huệ. Ảnh: Minh Đạt\" style=\"padding: 0px; color: rgb(151, 25, 40); margin: 0px; font-size: 17.28px; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; outline: 0px; line-height: 24px !important;\"><img src=\"https://vnn-imgs-f.vgcloud.vn/2021/10/22/13/xay-dung-co-che-dac-thu-phat-trien-4-tinh-thanh-1.jpg\" alt=\"Quốc hội bàn cơ chế đặc thù phát triển mạnh mẽ 4 tỉnh, thành\" style=\"background: none; border-width: 0px; border-color: initial; border-image: initial; font-size: 17.28px; margin: 0px auto; outline: 0px; padding: 0px; max-width: 100%; display: block;\"></a></td></tr><tr style=\"background: none; border: 0px; font-size: 17.28px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\"><td class=\"FmsArticleBoxStyle-Content image_desc\" style=\"background: none; font-size: 14px; margin: 5px 0px 0px; outline: 0px; padding: 2px 0px; vertical-align: baseline; color: rgb(34, 34, 34); line-height: 26px; font-style: italic; border: 0px !important;\">Chủ tịch Quốc hội Vương Đình Huệ. Ảnh: Minh Đạt</td></tr></tbody></table><p style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; font-size: 1.08rem; margin: auto; outline: 0px; padding: 5px 0px; vertical-align: baseline; line-height: 1.9rem; text-rendering: geometricprecision; color: rgb(32, 32, 32); max-width: 760px; font-family: sans-serif, Arial;\">Chủ tịch Quốc hội Vương Đình Huệ cho biết, đây là những tỉnh, thành có Nghị quyết riêng của Bộ Chính trị về phát triển các địa phương này. </p><p style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; font-size: 1.08rem; margin: auto; outline: 0px; padding: 5px 0px; vertical-align: baseline; line-height: 1.9rem; text-rendering: geometricprecision; color: rgb(32, 32, 32); max-width: 760px; font-family: sans-serif, Arial;\">Giải thích vì sao 4 tỉnh này lại thí điểm cơ chế đặc thù, Chủ tịch Quốc hội cho rằng, Hải Phòng là một trong tam giác phát triển phía bắc gồm Hà Nội – Hải Phòng – Quảng Ninh, một trong những cực tăng trưởng phía Bắc.</p><p style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; font-size: 1.08rem; margin: auto; outline: 0px; padding: 5px 0px; vertical-align: baseline; line-height: 1.9rem; text-rendering: geometricprecision; color: rgb(32, 32, 32); max-width: 760px; font-family: sans-serif, Arial;\">Thời gian gần đây, Hải Phòng phát triển bứt phá mạnh mẽ cả về tăng trưởng GDP, thu ngân sách, kết cấu hạ tầng, nông thôn mới. Hải Phòng xây dựng nông thôn mới đều theo tiêu chuẩn nâng cao, đầu tư cho 1 xã khoảng 135-180 tỷ đồng. Những huyện có khả năng lên quận còn đầu tư mạnh hơn…</p><p style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; font-size: 1.08rem; margin: auto; outline: 0px; padding: 5px 0px; vertical-align: baseline; line-height: 1.9rem; text-rendering: geometricprecision; color: rgb(32, 32, 32); max-width: 760px; font-family: sans-serif, Arial;\">Chủ tịch Quốc hội thông tin thêm, 9 tháng đầu năm nay mặc dù cả nước tăng trưởng thấp nhưng Hải Phòng vẫn tăng trưởng 12,23%. Cả nước phấn đấu thu nhập bình quân đầu người năm 2030 đạt 5.000 – 7.000 USD thì Hải Phòng đặt mục tiêu đến 2030 vượt mức 16.000 USD. Do đó nhu cầu phát triển của Hải Phòng rất lớn.</p><p style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; font-size: 1.08rem; margin: auto; outline: 0px; padding: 5px 0px; vertical-align: baseline; line-height: 1.9rem; text-rendering: geometricprecision; max-width: 760px; font-family: sans-serif, Arial;\"><font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">“Tầm nhìn của Hải Phòng xác định không còn là cực tăng trưởng nữa mà là động lực tăng trưởng của khu vực và động lực tăng trưởng của cả nước. </font></p><p style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; font-size: 1.08rem; margin: auto; outline: 0px; padding: 5px 0px; vertical-align: baseline; line-height: 1.9rem; text-rendering: geometricprecision; color: rgb(32, 32, 32); max-width: 760px; font-family: sans-serif, Arial;\">Hải Phòng phấn đấu là một trong những thành phố hoàn thành sớm nhất mục tiêu công nghiệp hóa, hiện đại hóa, trở thành đô thị có tầm cỡ, vị trí trong khu vực”, Chủ tịch Quốc hội nhấn mạnh.</p>', '2021-10-22 09:14:29', '2021-10-22 11:55:44', 0),
(8, 1, 'san pham 2', 250000, 200000, 'assets/photos/p-7536-ao-so-mi-nam-dai-tay-ke-caro.jpeg', 'noi dung 2', '2021-10-22 09:19:49', '2021-10-22 11:06:45', 0),
(9, 2, 'ÁO POLO NAM', 650000, 600000, 'https://t004.gokisoft.com/uploads/2021/07/p-7537-ao-polo-nam.jpg', 'Áo PoPo Nam mang phong cách trẻ trung , phù hợp với nhiều lứa tuổi . Chất liệt mát mẻ . ', '2021-10-22 14:03:21', '2021-10-22 14:03:21', 0),
(10, 1, 'san pham 1234234', 650000, 550000, 'https://res.cloudinary.com/ziczacgroup/image/upload/v1583834689/vf4gyxt7gmthx4eykvlp.jpg', 'okok', '2021-10-22 09:53:21', '2021-10-22 09:27:06', 0),
(11, 1, 'San pham 23234234234', 55000, 50000, 'assets/photos/bai-tap-c-program.jpeg', '<p style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; font-size: 1.08rem; margin: auto; outline: 0px; padding: 5px 0px; vertical-align: baseline; line-height: 1.9rem; text-rendering: geometricprecision; color: rgb(32, 32, 32); max-width: 760px; font-family: sans-serif, Arial;\">Sáng nay (22/10), các đại biểu Quốc hội thảo luận tại tổ về dự thảo Nghị quyết về một số cơ chế, chính sách đặc thù phát triển của các tỉnh, TP Hải Phòng, Nghệ An, Thanh Hóa và Thừa Thiên Huế.</p><table class=\"FmsArticleBoxStyle ImageBox ImageCenterBox Border-1 image\" style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-size: 1.08rem; margin: auto; outline: 0px; padding: 0px; vertical-align: baseline; border-spacing: 0px; overflow: auto; width: auto; max-width: 760px; line-height: 1.9rem; color: rgb(32, 32, 32); font-family: sans-serif, Arial; border: 0px !important;\"><tbody style=\"background: none; border: 0px; font-size: 17.28px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\"><tr style=\"background: none; border: 0px; font-size: 17.28px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\"><td class=\"FmsArticleBoxStyle-Images image \" style=\"background: none; font-size: 17.28px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; border: 0px !important; line-height: 24px !important;\"><a class=\"slidevnn cboxElement\" href=\"https://vnn-imgs-f.vgcloud.vn/2021/10/22/13/xay-dung-co-che-dac-thu-phat-trien-4-tinh-thanh-1.jpg\" title=\"Chủ tịch Quốc hội Vương Đình Huệ. Ảnh: Minh Đạt\" style=\"padding: 0px; color: rgb(151, 25, 40); margin: 0px; font-size: 17.28px; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; outline: 0px; line-height: 24px !important;\"><img src=\"https://vnn-imgs-f.vgcloud.vn/2021/10/22/13/xay-dung-co-che-dac-thu-phat-trien-4-tinh-thanh-1.jpg\" alt=\"Quốc hội bàn cơ chế đặc thù phát triển mạnh mẽ 4 tỉnh, thành\" style=\"background: none; border-width: 0px; border-color: initial; border-image: initial; font-size: 17.28px; margin: 0px auto; outline: 0px; padding: 0px; max-width: 100%; display: block;\"></a></td></tr><tr style=\"background: none; border: 0px; font-size: 17.28px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\"><td class=\"FmsArticleBoxStyle-Content image_desc\" style=\"background: none; font-size: 14px; margin: 5px 0px 0px; outline: 0px; padding: 2px 0px; vertical-align: baseline; color: rgb(34, 34, 34); line-height: 26px; font-style: italic; border: 0px !important;\">Chủ tịch Quốc hội Vương Đình Huệ. Ảnh: Minh Đạt</td></tr></tbody></table><p style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; font-size: 1.08rem; margin: auto; outline: 0px; padding: 5px 0px; vertical-align: baseline; line-height: 1.9rem; text-rendering: geometricprecision; color: rgb(32, 32, 32); max-width: 760px; font-family: sans-serif, Arial;\">Chủ tịch Quốc hội Vương Đình Huệ cho biết, đây là những tỉnh, thành có Nghị quyết riêng của Bộ Chính trị về phát triển các địa phương này. </p><p style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; font-size: 1.08rem; margin: auto; outline: 0px; padding: 5px 0px; vertical-align: baseline; line-height: 1.9rem; text-rendering: geometricprecision; color: rgb(32, 32, 32); max-width: 760px; font-family: sans-serif, Arial;\">Giải thích vì sao 4 tỉnh này lại thí điểm cơ chế đặc thù, Chủ tịch Quốc hội cho rằng, Hải Phòng là một trong tam giác phát triển phía bắc gồm Hà Nội – Hải Phòng – Quảng Ninh, một trong những cực tăng trưởng phía Bắc.</p><p style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; font-size: 1.08rem; margin: auto; outline: 0px; padding: 5px 0px; vertical-align: baseline; line-height: 1.9rem; text-rendering: geometricprecision; color: rgb(32, 32, 32); max-width: 760px; font-family: sans-serif, Arial;\">Thời gian gần đây, Hải Phòng phát triển bứt phá mạnh mẽ cả về tăng trưởng GDP, thu ngân sách, kết cấu hạ tầng, nông thôn mới. Hải Phòng xây dựng nông thôn mới đều theo tiêu chuẩn nâng cao, đầu tư cho 1 xã khoảng 135-180 tỷ đồng. Những huyện có khả năng lên quận còn đầu tư mạnh hơn…</p><p style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; font-size: 1.08rem; margin: auto; outline: 0px; padding: 5px 0px; vertical-align: baseline; line-height: 1.9rem; text-rendering: geometricprecision; color: rgb(32, 32, 32); max-width: 760px; font-family: sans-serif, Arial;\">Chủ tịch Quốc hội thông tin thêm, 9 tháng đầu năm nay mặc dù cả nước tăng trưởng thấp nhưng Hải Phòng vẫn tăng trưởng 12,23%. Cả nước phấn đấu thu nhập bình quân đầu người năm 2030 đạt 5.000 – 7.000 USD thì Hải Phòng đặt mục tiêu đến 2030 vượt mức 16.000 USD. Do đó nhu cầu phát triển của Hải Phòng rất lớn.</p><p style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; font-size: 1.08rem; margin: auto; outline: 0px; padding: 5px 0px; vertical-align: baseline; line-height: 1.9rem; text-rendering: geometricprecision; max-width: 760px; font-family: sans-serif, Arial;\"><font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">“Tầm nhìn của Hải Phòng xác định không còn là cực tăng trưởng nữa mà là động lực tăng trưởng của khu vực và động lực tăng trưởng của cả nước. </font></p><p style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; font-size: 1.08rem; margin: auto; outline: 0px; padding: 5px 0px; vertical-align: baseline; line-height: 1.9rem; text-rendering: geometricprecision; color: rgb(32, 32, 32); max-width: 760px; font-family: sans-serif, Arial;\">Hải Phòng phấn đấu là một trong những thành phố hoàn thành sớm nhất mục tiêu công nghiệp hóa, hiện đại hóa, trở thành đô thị có tầm cỡ, vị trí trong khu vực”, Chủ tịch Quốc hội nhấn mạnh.</p>', '2021-10-22 09:14:29', '2021-10-22 11:55:44', 0),
(12, 1, 'san pham 2', 250000, 200000, 'assets/photos/p-7536-ao-so-mi-nam-dai-tay-ke-caro.jpeg', 'noi dung 2', '2021-10-22 09:19:49', '2021-10-22 11:06:45', 0),
(13, 2, 'ÁO POLO NAM', 650000, 600000, 'https://t004.gokisoft.com/uploads/2021/07/p-7537-ao-polo-nam.jpg', 'Áo PoPo Nam mang phong cách trẻ trung , phù hợp với nhiều lứa tuổi . Chất liệt mát mẻ . ', '2021-10-22 14:03:21', '2021-10-22 14:03:21', 0),
(14, 1, 'san pham 1234234', 650000, 550000, 'https://res.cloudinary.com/ziczacgroup/image/upload/v1583834689/vf4gyxt7gmthx4eykvlp.jpg', 'okok', '2021-10-22 09:53:21', '2021-10-22 09:27:06', 0),
(15, 1, 'San pham 23234234234', 55000, 50000, 'assets/photos/bai-tap-c-program.jpeg', '<p style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; font-size: 1.08rem; margin: auto; outline: 0px; padding: 5px 0px; vertical-align: baseline; line-height: 1.9rem; text-rendering: geometricprecision; color: rgb(32, 32, 32); max-width: 760px; font-family: sans-serif, Arial;\">Sáng nay (22/10), các đại biểu Quốc hội thảo luận tại tổ về dự thảo Nghị quyết về một số cơ chế, chính sách đặc thù phát triển của các tỉnh, TP Hải Phòng, Nghệ An, Thanh Hóa và Thừa Thiên Huế.</p><table class=\"FmsArticleBoxStyle ImageBox ImageCenterBox Border-1 image\" style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-size: 1.08rem; margin: auto; outline: 0px; padding: 0px; vertical-align: baseline; border-spacing: 0px; overflow: auto; width: auto; max-width: 760px; line-height: 1.9rem; color: rgb(32, 32, 32); font-family: sans-serif, Arial; border: 0px !important;\"><tbody style=\"background: none; border: 0px; font-size: 17.28px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\"><tr style=\"background: none; border: 0px; font-size: 17.28px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\"><td class=\"FmsArticleBoxStyle-Images image \" style=\"background: none; font-size: 17.28px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; border: 0px !important; line-height: 24px !important;\"><a class=\"slidevnn cboxElement\" href=\"https://vnn-imgs-f.vgcloud.vn/2021/10/22/13/xay-dung-co-che-dac-thu-phat-trien-4-tinh-thanh-1.jpg\" title=\"Chủ tịch Quốc hội Vương Đình Huệ. Ảnh: Minh Đạt\" style=\"padding: 0px; color: rgb(151, 25, 40); margin: 0px; font-size: 17.28px; vertical-align: baseline; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; outline: 0px; line-height: 24px !important;\"><img src=\"https://vnn-imgs-f.vgcloud.vn/2021/10/22/13/xay-dung-co-che-dac-thu-phat-trien-4-tinh-thanh-1.jpg\" alt=\"Quốc hội bàn cơ chế đặc thù phát triển mạnh mẽ 4 tỉnh, thành\" style=\"background: none; border-width: 0px; border-color: initial; border-image: initial; font-size: 17.28px; margin: 0px auto; outline: 0px; padding: 0px; max-width: 100%; display: block;\"></a></td></tr><tr style=\"background: none; border: 0px; font-size: 17.28px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\"><td class=\"FmsArticleBoxStyle-Content image_desc\" style=\"background: none; font-size: 14px; margin: 5px 0px 0px; outline: 0px; padding: 2px 0px; vertical-align: baseline; color: rgb(34, 34, 34); line-height: 26px; font-style: italic; border: 0px !important;\">Chủ tịch Quốc hội Vương Đình Huệ. Ảnh: Minh Đạt</td></tr></tbody></table><p style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; font-size: 1.08rem; margin: auto; outline: 0px; padding: 5px 0px; vertical-align: baseline; line-height: 1.9rem; text-rendering: geometricprecision; color: rgb(32, 32, 32); max-width: 760px; font-family: sans-serif, Arial;\">Chủ tịch Quốc hội Vương Đình Huệ cho biết, đây là những tỉnh, thành có Nghị quyết riêng của Bộ Chính trị về phát triển các địa phương này. </p><p style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; font-size: 1.08rem; margin: auto; outline: 0px; padding: 5px 0px; vertical-align: baseline; line-height: 1.9rem; text-rendering: geometricprecision; color: rgb(32, 32, 32); max-width: 760px; font-family: sans-serif, Arial;\">Giải thích vì sao 4 tỉnh này lại thí điểm cơ chế đặc thù, Chủ tịch Quốc hội cho rằng, Hải Phòng là một trong tam giác phát triển phía bắc gồm Hà Nội – Hải Phòng – Quảng Ninh, một trong những cực tăng trưởng phía Bắc.</p><p style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; font-size: 1.08rem; margin: auto; outline: 0px; padding: 5px 0px; vertical-align: baseline; line-height: 1.9rem; text-rendering: geometricprecision; color: rgb(32, 32, 32); max-width: 760px; font-family: sans-serif, Arial;\">Thời gian gần đây, Hải Phòng phát triển bứt phá mạnh mẽ cả về tăng trưởng GDP, thu ngân sách, kết cấu hạ tầng, nông thôn mới. Hải Phòng xây dựng nông thôn mới đều theo tiêu chuẩn nâng cao, đầu tư cho 1 xã khoảng 135-180 tỷ đồng. Những huyện có khả năng lên quận còn đầu tư mạnh hơn…</p><p style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; font-size: 1.08rem; margin: auto; outline: 0px; padding: 5px 0px; vertical-align: baseline; line-height: 1.9rem; text-rendering: geometricprecision; color: rgb(32, 32, 32); max-width: 760px; font-family: sans-serif, Arial;\">Chủ tịch Quốc hội thông tin thêm, 9 tháng đầu năm nay mặc dù cả nước tăng trưởng thấp nhưng Hải Phòng vẫn tăng trưởng 12,23%. Cả nước phấn đấu thu nhập bình quân đầu người năm 2030 đạt 5.000 – 7.000 USD thì Hải Phòng đặt mục tiêu đến 2030 vượt mức 16.000 USD. Do đó nhu cầu phát triển của Hải Phòng rất lớn.</p><p style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; font-size: 1.08rem; margin: auto; outline: 0px; padding: 5px 0px; vertical-align: baseline; line-height: 1.9rem; text-rendering: geometricprecision; max-width: 760px; font-family: sans-serif, Arial;\"><font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">“Tầm nhìn của Hải Phòng xác định không còn là cực tăng trưởng nữa mà là động lực tăng trưởng của khu vực và động lực tăng trưởng của cả nước. </font></p><p style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; font-size: 1.08rem; margin: auto; outline: 0px; padding: 5px 0px; vertical-align: baseline; line-height: 1.9rem; text-rendering: geometricprecision; color: rgb(32, 32, 32); max-width: 760px; font-family: sans-serif, Arial;\">Hải Phòng phấn đấu là một trong những thành phố hoàn thành sớm nhất mục tiêu công nghiệp hóa, hiện đại hóa, trở thành đô thị có tầm cỡ, vị trí trong khu vực”, Chủ tịch Quốc hội nhấn mạnh.</p>', '2021-10-22 09:14:29', '2021-10-22 11:55:44', 0),
(16, 1, 'san pham 2', 250000, 200000, 'assets/photos/p-7536-ao-so-mi-nam-dai-tay-ke-caro.jpeg', 'noi dung 2', '2021-10-22 09:19:49', '2021-10-22 11:06:45', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Role`
--

CREATE TABLE `Role` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `Role`
--

INSERT INTO `Role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Tokens`
--

CREATE TABLE `Tokens` (
  `user_id` int(11) NOT NULL,
  `token` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `Tokens`
--

INSERT INTO `Tokens` (`user_id`, `token`, `created_at`) VALUES
(1, '7b887b1e751b6839105033c9f7bdf48c', '2021-10-19 17:03:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `User`
--

INSERT INTO `User` (`id`, `fullname`, `email`, `phone_number`, `address`, `password`, `role_id`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'TRAN VAN DIEP', 'tranvandiep.it@gmail.com', '31232313123', 'Ha Noi, Việt Nam', 'b4cbd48886a5331c5eb2fedadabe311c', 1, '2021-10-19 10:39:39', '2021-10-20 17:40:06', 0),
(2, 'Diep Tran Van', 'ziczacgroup@gmail.com', '+84943552213', 'YEN TRI, Nam Định', 'b4cbd48886a5331c5eb2fedadabe311c', 1, '2021-10-19 10:42:39', '2021-10-20 17:43:19', 0),
(3, 'ABC', 'gokisoft.com@gmail.com', '8153565814', '810 University Drive', 'b4cbd48886a5331c5eb2fedadabe311c', 2, '2021-10-20 17:16:11', '2021-10-20 17:53:15', 1),
(4, 'TRAN VAN DIEP', 'ziczacgroup01@gmail.com', '+84943552213', 'So 8 Ton That Thuyet, Cau Giay, Ha Noi', 'b4cbd48886a5331c5eb2fedadabe311c', 2, '2021-10-20 17:17:27', '2021-10-20 17:17:27', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `FeedBack`
--
ALTER TABLE `FeedBack`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `Galery`
--
ALTER TABLE `Galery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `Order_Details`
--
ALTER TABLE `Order_Details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `Tokens`
--
ALTER TABLE `Tokens`
  ADD PRIMARY KEY (`user_id`,`token`);

--
-- Chỉ mục cho bảng `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `Category`
--
ALTER TABLE `Category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `FeedBack`
--
ALTER TABLE `FeedBack`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `Galery`
--
ALTER TABLE `Galery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `Orders`
--
ALTER TABLE `Orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `Order_Details`
--
ALTER TABLE `Order_Details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `Product`
--
ALTER TABLE `Product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `Role`
--
ALTER TABLE `Role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `Galery`
--
ALTER TABLE `Galery`
  ADD CONSTRAINT `galery_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `Product` (`id`);

--
-- Các ràng buộc cho bảng `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

--
-- Các ràng buộc cho bảng `Order_Details`
--
ALTER TABLE `Order_Details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `Product` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `Orders` (`id`);

--
-- Các ràng buộc cho bảng `Product`
--
ALTER TABLE `Product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `Category` (`id`);

--
-- Các ràng buộc cho bảng `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `Role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
