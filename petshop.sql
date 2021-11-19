-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 15, 2021 lúc 04:48 PM
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
-- Cơ sở dữ liệu: `petshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_image`, `created_at`, `updated_at`) VALUES
(11, 'Chó', 'pug2-edit.png', '2020-12-26 13:44:42', '2020-12-26 13:44:42'),
(12, 'Mèo', 'Cat2-edit.png', '2020-12-26 14:05:56', '2020-12-26 14:05:56'),
(13, 'Quần áo cho chó', 'dog5-edit.png', '2020-12-26 14:06:09', '2020-12-26 14:06:09'),
(14, 'Quần áo cho mèo', 'ACat2-edit.png', '2020-12-26 14:06:16', '2020-12-26 14:06:16'),
(15, 'Phụ kiện cho chó', 'Adog4-edit.jpg', '2020-12-26 14:06:38', '2020-12-26 14:06:38'),
(17, 'Phụ kiện Cho Mèo', 'Bcat4-edit.png', '2020-12-26 14:07:10', '2020-12-26 14:07:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `comment_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `product_id`, `comment_content`, `created_at`, `updated_at`) VALUES
(3, 4, 44, 'vdsFSDF', '2021-04-14 14:32:03', '2021-04-14 14:32:03'),
(4, 4, 44, 'ỴYTEUETYTYIEIY', '2021-04-14 14:32:11', '2021-04-14 14:32:11'),
(5, 4, 42, 'Vòng này chất lượng nè :>>', '2021-04-15 13:13:19', '2021-04-15 13:13:19'),
(6, 10, 42, 'Nhìn đẹp nè!', '2021-04-15 13:17:56', '2021-04-15 13:17:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_10_03_083451_create_role_accesses_table', 1),
(18, '2020_10_08_135203_create_orders_table', 5),
(19, '2020_10_08_135326_create_order_details_table', 6),
(21, '2020_10_08_135427_create_shopping_carts_table', 7),
(22, '2020_10_08_135723_create_rating_stars_table', 8),
(24, '2020_10_08_132834_create_users_table', 10),
(31, '2020_10_06_235001_create_categories_table', 12),
(33, '2020_10_08_134752_create_products_table', 12),
(34, '2020_10_08_134948_create_product_suppliers_table', 12),
(35, '2020_10_06_235741_create_suppliers_table', 13),
(36, '2020_12_04_224408_create_sliders_table', 14),
(37, '2021_03_30_204029_create_comments_table', 15),
(38, '2021_04_14_094926_create_reply_comments_table', 16);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_status` int(11) DEFAULT NULL,
  `order_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_status`, `order_amount`, `created_at`, `updated_at`) VALUES
(17, 4, 1, 'Thanh toán tiền mặt', '2021-03-09 12:34:09', '2021-03-09 12:37:57'),
(19, 4, 1, 'Thanh toán tiền mặt', '2021-03-09 13:12:57', '2021-03-23 13:47:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `total_quality` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `delivery_price` int(252) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quality` int(11) DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_decribe` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_discount` int(11) DEFAULT NULL,
  `product_unitprice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tax` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_quality`, `product_price`, `product_img`, `product_decribe`, `product_discount`, `product_unitprice`, `product_tax`, `created_at`, `updated_at`) VALUES
(10, 11, 'Chó pug', 14, 2500000, 'pug2-edit.png', 'Thường được gọi là chó mặt xệ, là giống chó thuộc nhóm chó cảnh có nguồn gốc từ Trung Quốc, chúng có một khuôn mặt nhăn, mõm ngắn, và đuôi xoăn.', NULL, 'Con', 1, '2020-12-26 13:45:44', '2020-12-26 13:45:44'),
(12, 13, 'Bộ nàng tiên cá', 19, 100000, 'dog2-edit.png', 'Nàng tiên cá siêu sẹc xy', NULL, 'Bộ', 2, '2020-12-27 09:13:38', '2020-12-27 09:13:38'),
(13, 14, 'Áo suppreme', 12, 500000, 'ACat3-edit.png', 'Áo thời trang phong cách', NULL, 'Cái', 3, '2020-12-27 09:14:34', '2020-12-27 09:14:34'),
(16, 12, 'Mèo Mun', 9, 900000, 'Cat2-edit.png', 'Mèo đen hay còn gọi là mèo mun, mèo ma, hắc miêu hay linh miêu là những con mèo có bộ lông màu đen hay đen tuyền. Nguyên nhân là do sắc tố đen ảnh hưởng trong quá trình di truyền.', NULL, 'Con', 2, '2020-12-27 09:27:43', '2020-12-27 09:27:43'),
(17, 15, 'Kính râm thời trang', 14, 200000, 'Adog4-edit.jpg', 'Kính râm thời trang phong cách', NULL, 'Cái', 2, '2020-12-27 13:26:28', '2020-12-27 13:26:28'),
(18, 11, 'Nguyễn Văn Dúi', 13, 3000000, 'dui1-edit.jpg', 'Dúi là chú cún thuộc giống chó H\'mông cộc đuôi, được chủ nhân mang về từ một vùng cao thuộc huyện Mèo Vạc, tỉnh Hà Giang.', NULL, 'Con', 1, '2020-12-28 08:05:30', '2020-12-28 08:05:30'),
(21, 11, 'Gâu đần', 12, 2000000, 'golden2-edit.png', 'Gâu đần là một giống chó hoàng gia, xuất thân từ Anh quốc, có kích thước trung bình. Thuộc họ nhà chó ưa hoạt động, chơi đùa, chúng vô cùng trung thành với chủ nhân và rất thông minh.', NULL, 'Con', 2, '2021-01-05 12:21:06', '2021-01-05 12:21:06'),
(24, 11, 'Samoyed', 9, 5000000, 'samoyed12.png', 'Samoyed là một giống chó săn có nguồn gốc từ vùng Siberia, đây là giống chó có bộ lông trắng tinh như tuyết cùng tính cách mang nhiều đặc điểm của chó sói là những đặc trưng nổi bật của giống chó này. Samoyed có nghĩa là giống chó có khả năng tự tìm ra thức ăn. Samoyed từng là chó kéo xe trượt tuyết trước khi trở thành bạn dành cho giới thượng lưu và hợp thời trang như ngày nay, nó cũng từng được những người thợ săn và đánh cá nuôi.', NULL, 'Con', 2, '2021-01-05 12:27:18', '2021-01-05 12:27:18'),
(25, 12, 'Mèo Xiêm', 10, 1500000, 'Cat1-edit.png', 'Đây là giống mèo cảnh thuần chủng có nguồn gốc từ Thái Lan và còn có tên gọi khác là Siamese Cat. Giống mèo này được đem về từ châu Âu trong khoảng giữa thế kỉ 18 và 19.', NULL, 'Con', 2, '2021-01-05 12:29:17', '2021-01-05 12:29:17'),
(26, 12, 'Mèo Ba Tư', 10, 3000000, 'Cat3-edit.png', 'Mèo Ba Tư có nguồn gốc từ đất nước Ba Tư cổ đại (Iran ngày nay, được người dân phát hiện và nuôi từ khá sớm. Sau đó được đưa sang các nước châu Âu và dần trở nên phổ biến như ngày nay', NULL, 'Con', 2, '2021-01-05 12:30:34', '2021-01-05 12:30:34'),
(27, 12, 'Mèo Tai Cụt', 8, 3000000, 'Cat4-edit.png', 'Màu lông của mèo tai cụp khá phong phú, có những màu như tabby, trắng, socola,… Những chú mèo Scottish có thể có bộ lông dài hoặc ngắn.', NULL, 'Con', 3, '2021-01-05 12:31:40', '2021-01-05 12:31:40'),
(28, 13, 'Bộ Múa Lân', 20, 200000, 'dog1-edit.png', 'Bộ múa luân dễ thương dành cho chú cún nhà của bạn', NULL, 'Bộ', 3, '2021-01-05 12:33:24', '2021-01-05 12:33:24'),
(29, 13, 'Áo Khoác Xanh', 20, 150000, 'dog3-edit.png', 'Áo khoác dễ thương mặc ấm cho cún', NULL, 'Cái', 3, '2021-01-05 12:34:24', '2021-01-05 12:34:24'),
(30, 13, 'Áo Len Mùa Đông', 10, 90000, 'dog4-edit.png', 'Áo len mặc giữ ấm cho thú cưng của bạn !!', NULL, 'Cái', 3, '2021-01-05 12:35:29', '2021-01-05 12:35:29'),
(31, 13, 'Áo Len Giữ Ấm', 10, 100000, 'dog5-edit.png', 'Áo len giữ ấm cho thú cưng nhà bạn !!!', NULL, 'Cái', 3, '2021-01-05 12:36:26', '2021-01-05 12:36:26'),
(32, 14, 'Bộ Y Tá', 10, 200000, 'ACat1-edit.png', 'Bộ Y Tá siêu dễ thương cho mèo nhà bạn!!', NULL, 'Bộ', 2, '2021-01-05 12:37:37', '2021-01-05 12:37:37'),
(33, 14, 'Áo Long Bào Và Nón', 9, 400000, 'ACat2-edit.png', 'Áo long bào quá hợp thời trang cho hoàng thượng nhà của bạn !!!', NULL, 'Bộ', 2, '2021-01-05 12:39:01', '2021-01-05 12:39:01'),
(34, 14, 'Bộ Supperman', 13, 350000, 'ACat4-edit.png', 'Supperman siêu dễ thương giải cứu thế giới đây !!!', NULL, 'Bộ', 2, '2021-01-05 12:39:53', '2021-01-05 12:39:53'),
(35, 14, 'Áo Khoác Adiadas', 29, 90000, 'ACat5-edit.png', 'Áo khoác thời trang phong cách cho chú cún nhà bạn!!!', NULL, 'Cái', 2, '2021-01-05 12:40:58', '2021-01-05 12:40:58'),
(36, 15, 'Giường ngủ cho chó', 9, 400000, 'Adog1-edit.png', 'Giường ngủ cho chú cún nhà bạn được yên giấc mỗi ngày!!!', NULL, 'Cái', 2, '2021-01-05 12:42:21', '2021-01-05 12:42:21'),
(37, 15, 'Balo Mang Theo Chó', 10, 350000, 'Adog2-edit.jpg', 'Balo dễ dàng mang theo chú cún nhà bạn bất cứ nơi đâu!!!', NULL, 'Cái', 4, '2021-01-05 12:43:34', '2021-01-05 12:43:34'),
(38, 15, 'Dây chuyên vàng', 9, 200000, 'Adog3-edit.png', 'Dây chuyền thể hiện độ quý tộc cho chú cún nhà bạn!!!', NULL, 'Cái', 3, '2021-01-05 12:44:37', '2021-01-05 12:44:37'),
(39, 15, 'Tả Lót Cho Chó', 10, 50000, 'Adog5-edit.png', 'Tả lót giúp chó nhà bạn không đi ngoài bừa bãi!!!', NULL, 'Bịch', 3, '2021-01-05 12:46:01', '2021-01-05 12:46:01'),
(40, 17, 'Giường Ngủ Cho Mèo', 10, 350000, 'Bcat1-edit.png', 'Giường ngủ cho hoàng thượng nhà bạn được yên giấc mỗi ngày!!!', NULL, 'Cái', 2, '2021-01-05 12:47:08', '2021-01-05 12:47:08'),
(42, 17, 'Vòng Cổ Cho Mèo', 10, 100000, 'Bcat3-edit.png', 'Vòng cổ trang trí và giúp nhận ra hoàng thượng của bạn dễ hơn !!!', NULL, 'Cái', 3, '2021-01-05 12:50:02', '2021-01-05 12:50:02'),
(43, 17, 'Bộ Combo Đi Biển', 7, 800000, 'Bcat4-edit.png', 'Set đi biển không thể ngầu hơn cho hoàng thượng nhà bạn!!!', NULL, 'Bộ', 1, '2021-01-05 12:51:05', '2021-01-05 12:51:05'),
(44, 17, 'Tả Lót Cho Mèo', 10, 50000, 'Bcat5-edit.png', 'Tả lót giúp hoàng thượng nhà bạn không đi ngoài bừa bãi!!!', NULL, 'Bịch', 1, '2021-01-05 12:52:02', '2021-01-05 12:52:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_suppliers`
--

CREATE TABLE `product_suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_suppliers`
--

INSERT INTO `product_suppliers` (`id`, `product_id`, `supplier_id`, `created_at`, `updated_at`) VALUES
(6, 10, 1, '2020-12-26 13:45:44', '2020-12-26 13:45:44'),
(8, 12, 2, '2020-12-27 09:13:38', '2020-12-27 09:13:38'),
(9, 13, 3, '2020-12-27 09:14:34', '2020-12-27 09:14:34'),
(12, 16, 2, '2020-12-27 09:27:43', '2020-12-27 09:27:43'),
(13, 17, 2, '2020-12-27 13:26:28', '2020-12-27 13:26:28'),
(14, 18, 1, '2020-12-28 08:05:30', '2020-12-28 08:05:30'),
(17, 21, 2, '2021-01-05 12:21:06', '2021-01-05 12:21:06'),
(20, 24, 2, '2021-01-05 12:27:18', '2021-01-05 12:27:18'),
(21, 25, 2, '2021-01-05 12:29:17', '2021-01-05 12:29:17'),
(22, 26, 2, '2021-01-05 12:30:34', '2021-01-05 12:30:34'),
(23, 27, 3, '2021-01-05 12:31:40', '2021-01-05 12:31:40'),
(24, 28, 3, '2021-01-05 12:33:24', '2021-01-05 12:33:24'),
(25, 29, 3, '2021-01-05 12:34:24', '2021-01-05 12:34:24'),
(26, 30, 3, '2021-01-05 12:35:29', '2021-01-05 12:35:29'),
(27, 31, 3, '2021-01-05 12:36:26', '2021-01-05 12:36:26'),
(28, 32, 2, '2021-01-05 12:37:37', '2021-01-05 12:37:37'),
(29, 33, 2, '2021-01-05 12:39:01', '2021-01-05 12:39:01'),
(30, 34, 2, '2021-01-05 12:39:53', '2021-01-05 12:39:53'),
(31, 35, 2, '2021-01-05 12:40:58', '2021-01-05 12:40:58'),
(32, 36, 2, '2021-01-05 12:42:21', '2021-01-05 12:42:21'),
(33, 37, 4, '2021-01-05 12:43:34', '2021-01-05 12:43:34'),
(34, 38, 3, '2021-01-05 12:44:37', '2021-01-05 12:44:37'),
(35, 39, 3, '2021-01-05 12:46:01', '2021-01-05 12:46:01'),
(36, 40, 2, '2021-01-05 12:47:08', '2021-01-05 12:47:08'),
(38, 42, 3, '2021-01-05 12:50:02', '2021-01-05 12:50:02'),
(39, 43, 1, '2021-01-05 12:51:05', '2021-01-05 12:51:05'),
(40, 44, 1, '2021-01-05 12:52:02', '2021-01-05 12:52:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratting_stars`
--

CREATE TABLE `ratting_stars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `avg_number_star` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reply_comments`
--

CREATE TABLE `reply_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `reply_comment_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reply_comments`
--

INSERT INTO `reply_comments` (`id`, `user_id`, `comment_id`, `reply_comment_content`, `created_at`, `updated_at`) VALUES
(2, 4, 4, 'JKHDSKFJHDFHJKF', '2021-04-14 14:34:07', '2021-04-14 14:34:07'),
(3, 10, 5, 'Ừa! Tui cũn thấy dị :>>', '2021-04-15 13:17:45', '2021-04-15 13:17:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_accesses`
--

CREATE TABLE `role_accesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_discribe` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_accesses`
--

INSERT INTO `role_accesses` (`id`, `role_name`, `role_discribe`, `created_at`, `updated_at`) VALUES
(1, 'Quản trị', 'Người quản lý trang web', '2020-11-29 15:54:38', '2020-11-29 15:54:38'),
(2, 'Nhân viên', 'Nhân viên là ai', '2020-11-29 15:52:32', '2020-11-29 15:52:32'),
(3, 'Khách hàng', 'Khách hàng đăng ký sẻ ở quyền truy cập này', '2020-12-08 12:55:23', '2020-12-08 12:55:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shopping_carts`
--

CREATE TABLE `shopping_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `cart_quality` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shopping_carts`
--

INSERT INTO `shopping_carts` (`id`, `user_id`, `product_id`, `cart_quality`, `created_at`, `updated_at`) VALUES
(47, 4, 10, 1, '2021-04-15 14:36:57', '2021-04-15 14:36:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `slider_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `product_id`, `slider_title`, `slider_content`, `slider_image`, `created_at`, `updated_at`) VALUES
(4, 10, 'Tôn chỉ và mục tiêu', 'Với tôn chỉ phục vụ và chăm sóc khách hàng như người thân của mình, tạo cho khách hàng một không gian như tại nhà .Đưa các sản phẩm chất lượng và đảm bảo nhất đến người tiêu dùng. Tạo cho người tiêu dùng 1 không gian thoải mái nhất khi đến với Pet Shop', 'pug1-edit.png', '2020-12-26 13:46:38', '2020-12-26 13:46:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_decribe` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `supplier_address`, `supplier_decribe`, `supplier_image`, `created_at`, `updated_at`) VALUES
(1, 'Petmaster', 'Hậu Giang', 'Trang này chuyên bán các sản phẩm chó mèo nè mọi người ơi!!!', 'services_logo__1.jpg', '2020-12-18 14:21:13', '2020-12-18 14:21:13'),
(2, 'SupperPet', 'Sài Gòn', 'Chuyên cung cấp các phụ kiện dành cho chó mèo', 'brand5.jpg', '2020-12-25 09:04:40', '2020-12-25 09:04:40'),
(3, 'PetHome', 'Quận Cam', 'Shop này cung cấp đầy đủ các sản phẩm, phụ kiện cho chó mèo', 'brand4.jpg', '2020-12-26 07:50:15', '2020-12-26 07:50:15'),
(4, 'PetPro', 'Bình Dương', 'Chuyên cung cấp đa dạng các giống chó mèo khắp cả nước', 'petpro.jpg', '2020-12-28 08:07:28', '2020-12-28 08:07:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `sex` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `avatar` varchar(252) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `role_id`, `full_name`, `username`, `email`, `password`, `adress`, `phone`, `sex`, `birthday`, `avatar`, `created_at`, `updated_at`) VALUES
(4, 1, 'Trịnh Bảo Minh', 'baominh', 'baominh@gmail.com', '$2y$10$3XTpGNysv5FqOwayujPH4.tmBV4.f7RccSmrNmAwgV71fgP3kwGf6', 'Hậu Giang', 1886631528, 'Nam', '2020-12-01', 'profile-user.jpg', '2020-12-01 07:42:30', '2021-03-09 12:33:41'),
(10, 3, 'Võ Văn Minh', 'vvminh', 'vanminh@gmail.com', '$2y$10$FrkAQ7EgGffYHQO2mfPgIO/7nxKvExGuuYNGCgGSLAlJtEqZMVXpC', 'Cần Thơ', 325689369, NULL, NULL, 'user2.jpg', '2020-12-08 12:56:21', '2021-04-15 13:49:16'),
(11, 3, 'Bảo MInh', 'Congchuachungtinh8a2', 'minh@gmail.com', '$2y$10$whAPrskhmDP/pBFyphgz7.mTcl/QenpAj6Ufb2fHBie.4/91f2rT6', 'Cần Thơ', 12367545, 'Nam', NULL, NULL, '2020-12-08 14:54:14', '2020-12-08 14:54:14'),
(12, 2, 'Văn A', 'vana', 'vana@gmail.com', '$2y$10$atvXLnzmOZ0XlePKr9AFjuwzYXobCnXWUz8yO9EboMTc8PI07i6RK', 'Hậu Giang', 123456789, 'Khác', '2020-12-07', 'Bcat3.jpg', '2020-12-13 13:46:11', '2020-12-13 13:46:11'),
(14, 3, 'bao minh', 'tbminh', 'minh123@gmail.com', '$2y$10$ETcFOCzXMlWR/Rh/X6lM0OE7Kt8Xy206nxAkXnprIHMLNxaFiMcY2', NULL, 1234678, 'Nam', NULL, NULL, '2021-02-24 13:42:13', '2021-02-24 13:42:13');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `product_suppliers`
--
ALTER TABLE `product_suppliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_suppliers_product_id_foreign` (`product_id`),
  ADD KEY `product_suppliers_supplier_id_foreign` (`supplier_id`);

--
-- Chỉ mục cho bảng `ratting_stars`
--
ALTER TABLE `ratting_stars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratting_stars_user_id_foreign` (`user_id`),
  ADD KEY `ratting_stars_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `reply_comments`
--
ALTER TABLE `reply_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reply_comments_user_id_foreign` (`user_id`),
  ADD KEY `reply_comments_comment_id_foreign` (`comment_id`);

--
-- Chỉ mục cho bảng `role_accesses`
--
ALTER TABLE `role_accesses`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shopping_carts`
--
ALTER TABLE `shopping_carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shopping_carts_user_id_foreign` (`user_id`),
  ADD KEY `shopping_carts_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sliders_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `product_suppliers`
--
ALTER TABLE `product_suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `ratting_stars`
--
ALTER TABLE `ratting_stars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `reply_comments`
--
ALTER TABLE `reply_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `role_accesses`
--
ALTER TABLE `role_accesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `shopping_carts`
--
ALTER TABLE `shopping_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_suppliers`
--
ALTER TABLE `product_suppliers`
  ADD CONSTRAINT `product_suppliers_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_suppliers_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `ratting_stars`
--
ALTER TABLE `ratting_stars`
  ADD CONSTRAINT `ratting_stars_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratting_stars_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `reply_comments`
--
ALTER TABLE `reply_comments`
  ADD CONSTRAINT `reply_comments_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reply_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `shopping_carts`
--
ALTER TABLE `shopping_carts`
  ADD CONSTRAINT `shopping_carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shopping_carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD CONSTRAINT `sliders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role_accesses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
