-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 11, 2023 lúc 04:42 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `online_diary`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `userID` int(11) NOT NULL,
  `diaryID` int(11) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diary`
--

CREATE TABLE `diary` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `userID` int(11) NOT NULL
) ;

--
-- Đang đổ dữ liệu cho bảng `diary`
--

INSERT INTO `diary` (`id`, `image`, `content`, `status`, `createdAt`, `updatedAt`, `userID`) VALUES
(2, './img/64fd733187c9aavata2.jpg', 'Cảm giác này, khi bạn muốn ngồi yên một chỗ và chỉ ngắm mây trôi qua... Ngày nào cũng thế à!', 0, '2023-08-29 09:10:27', '2023-09-10 14:41:37', 1),
(4, './img/d3ec99e2-933d-4979-b934-9bb92e3446f3.jpg', 'Thời tiết se lạnh thích hợp để diện áo khoác vest, vừa ấm áp vừa lịch lãm.', 2, '2023-08-29 09:10:27', '2023-08-29 09:10:27', 5),
(5, './img/e9a91a16-348c-4e72-aa0e-27d3c071e61c.jpg', 'Mình đã hoàn thành mục tiêu của mình hôm nay. Cảm giác thực sự thú vị! Mọi người đang làm gì?', 1, '2023-08-29 09:10:27', '2023-08-29 09:10:27', 1),
(6, './img/elinchrom.jpg', 'Những ngày này thấy mình đang quá bận rộn, cảm thấy cần một chút thời gian riêng để thư giãn thật sự.', 3, '2023-08-29 09:10:27', '2023-08-29 09:10:27', 2),
(7, './img/Life.jpg', 'Chắc chắn mình không phải là người duy nhất cảm thấy đói vào giữa đêm, đúng không? 😅', 2, '2023-08-29 09:10:27', '2023-08-29 09:10:27', 3),
(8, './img/pexels-henry-&-co-1793525.jpg', 'Có ai đó đã từng bước chân vào quán cà phê vào buổi chiều chỉ để cảm nhận hương thơm của cà phê mà không cần uống không?', 1, '2023-08-29 09:10:27', '2023-08-29 09:10:27', 5),
(9, './img/pexels-keenan-constance-2865901.jpg', 'Cảm xúc của ngày hôm nay: 70% là ngạc nhiên vì mọi thứ diễn ra tốt đẹp, 30% là thức dậy quá muộn. 😄', 3, '2023-08-29 09:10:27', '2023-08-29 09:10:27', 4),
(11, './img/64fd30487a2c4avata2.jpg', 'Lâm rất mê mấy anh có múi', 0, '2023-09-06 08:57:50', '2023-09-10 09:56:08', 1);
INSERT INTO `diary` (`id`, `image`, `content`, `status`, `createdAt`, `updatedAt`, `userID`) VALUES
(12, './img/64fd733187c9aavata2.jpg', 'Hãy cầu nguyện để sự cô đơn có thể thúc đẩy bạn tìm thấy đam mê, một thứ gì đó để sống, đủ vĩ đại để bạn hi sinh vì nó.', 0, '2023-09-10 14:45:00', '2023-09-10 14:45:00', 7),
(13, './img/d3ec99e2-933d-4979-b934-9bb92e3446f3.jpg', 'Cô gái thời đại 4.0, chẳng ngại cô đơn chỉ sợ cô (không) tiền.', 2, '2023-09-10 14:45:00', '2023-09-10 14:45:00', 8),
(14, './img/e9a91a16-348c-4e72-aa0e-27d3c071e61c.jpg', 'Cô đơn không phải vì tôi không tốt, chỉ là bạn chưa đủ tốt để làm bạn với tôi thôi.', 1, '2023-09-10 14:45:00', '2023-09-10 14:45:00', 8),
(15, './img/elinchrom.jpg', 'Cô đơn à… Về với chú đơn đi cô, đừng theo cháu nữa!', 3, '2023-09-10 14:45:00', '2023-09-10 14:45:00', 3),
(16, './img/Life.jpg', 'Cô đơn thúc đẩy bạn phát triển. Khi lớn lên, bạn sẽ hiểu rằng đôi khi cô đơn cũng là sự bình yên.', 2, '2023-09-10 14:45:00', '2023-09-10 14:45:00', 2),
(17, './img/pexels-henry-&-co-1793525.jpg', 'Cô đơn không có nghĩa là cô độc mà là bạn đang chờ người phù hợp để yêu.', 1, '2023-09-10 14:45:00', '2023-09-10 14:45:00', 7),
(18, './img/pexels-keenan-constance-2865901.jpg', 'Bạn sẽ hơi cô đơn một chút khi chẳng có ai để thích, nhưng vì thế cuộc sống bạn sẽ nhẹ nhàng, thoải mái hơn.', 3, '2023-09-10 14:45:00', '2023-09-10 14:45:00', 9),
(19, './img/64fd30487a2c4avata2.jpg', 'Một mình thì đã sao? Vừa thích làm gì thì làm, chơi gì thì chơi. Vừa chẳng ai quản, chẳng cần sợ mất lòng ai.', 0, '2023-09-10 14:45:00', '2023-09-10 14:45:00', 10 ),
(20, './img/64fd733187c9aavata2.jpg', 'Không có bạn không đáng sợ, đáng sợ là thiếu tiền, đồ ăn và chiếc điện thoại đầy mạng.', 1, '2023-09-10 14:45:00', '2023-09-10 14:45:00',6),
(21, './img/d3ec99e2-933d-4979-b934-9bb92e3446f3.jpg', 'Cô đơn là khi bạn chẳng may té ngã nhưng rồi chợt nhận ra chẳng sợ đứa bạn nào chụp lại, đợi dịp sinh nhật bạn mà đăng lên.', 2, '2023-09-10 14:45:00', '2023-09-10 14:45:00', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `userName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `aboutme` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `avatar`, `email`, `userName`, `password`, `createdAt`, `updatedAt`, `aboutme`) VALUES
(1, './img/avata1.jpg', 'user1@example.com', 'Lâm Siêu Tốc', '123', '2023-08-29 14:01:38', '2023-08-29 14:01:38', 'Vì luôn di chuyển nhanh như siêu nhân.'),
(2, './img/avata2.jpg', 'user2@example.com', 'Hoàng Phát', '123', '2023-08-29 14:01:38', '2023-08-29 14:01:38', 'Sẵn sàng đốt cháy mọi thứ xung quanh với đam mê và nhiệt huyết.'),
(3, './img/elinchrom.jpg', 'user3@example.com', 'Anh Huy', '123', '2023-08-29 14:01:38', '2023-08-29 14:01:38', 'Luôn leo lên một bậc thang cao mới trong mọi tình huống.'),
(4, './img/Vintage lockscreen Aesthetic wallpaper iphone Iphone lockscreen 4k wallpaper iphone Lock screen wall.jpg', 'user4@example.com', 'Nguyễn Quyết', '123', '2023-08-29 14:01:38', '2023-08-29 14:01:38', 'Không ngần ngại tham gia mọi cuộc đua và thách thức.'),
(5, './img/8ac080b4-e7a6-4e97-a4d3-5593f12a7d97.jpg', 'user5@example.com', 'Vân Hà', '123', '2023-08-29 14:01:38', '2023-08-29 14:01:38', 'Luôn đam mê khám phá và tìm hiểu những nơi mới.'),
(6, 'avatar1.jpg', 'user1@example.com', 'Hải Đặng', '123', '2023-08-29 14:10:27', '2023-08-29 14:10:27', 'Cường điệu trong việc chinh phục mọi level game.'),
(7, './img/elinchrom.jpg', 'user2@example.com', 'Trương Nguyên', '123', '2023-08-29 14:10:27', '2023-08-29 14:10:27', 'Luôn bắt gặp những khoảnh khắc đẹp và độc đáo.'),
(8, './img/@s0phiaclar3.jpg', 'user3@example.com', 'Thành Thanh', '123', '2023-08-29 14:10:27', '2023-08-29 14:10:27', 'Mang trong mình tinh thần tự do và tốc độ.'),
(9, './img/ART.jpg', 'user4@example.com', 'Phạm Gia', '123', '2023-08-29 14:10:27', '2023-08-29 14:10:27', 'Ghét bỏ lỡ bất kỳ món ăn ngon nào trên thế giới.'),
(10, './img/35+ Taylor Swift Wallpaper Choices_ Folklore & Evermore Edition.jpg', 'user5@example.com', 'Vũ Mỹ', '123', '2023-08-29 14:10:27', '2023-08-29 14:10:27', 'Luôn tạo dáng và điệu đà trong mọi tình huống.');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment_user` (`userID`),
  ADD KEY `fk_comment_diary` (`diaryID`);

--
-- Chỉ mục cho bảng `diary`
--
ALTER TABLE `diary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_diary_user` (`userID`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `diary`
--
ALTER TABLE `diary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_diary` FOREIGN KEY (`diaryID`) REFERENCES `diary` (`id`),
  ADD CONSTRAINT `fk_comment_user` FOREIGN KEY (`userID`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `diary`
--
ALTER TABLE `diary`
  ADD CONSTRAINT `fk_diary_user` FOREIGN KEY (`userID`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
