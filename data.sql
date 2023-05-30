-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th2 08, 2020 lúc 09:54 PM
-- Phiên bản máy phục vụ: 5.7.28-log
-- Phiên bản PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mhrwlddc_1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TMQ_baiviet`
--

CREATE TABLE `TMQ_baiviet` (
  `id` bigint(20) NOT NULL,
  `uid` text,
  `taikhoan` text CHARACTER SET utf8,
  `matkhau` text CHARACTER SET utf8,
  `thongtin` text CHARACTER SET utf8,
  `img` text CHARACTER SET utf8,
  `loainick` text CHARACTER SET utf8,
  `giatien` int(11) DEFAULT NULL,
  `trangthai` int(11) DEFAULT NULL,
  `thongtin_1` text CHARACTER SET utf8,
  `thongtin_2` text CHARACTER SET utf8,
  `thongtin_3` text CHARACTER SET utf8,
  `thongtin_4` text CHARACTER SET utf8,
  `time` text CHARACTER SET utf8,
  `rank` int(11) DEFAULT NULL,
  `tuong` int(11) DEFAULT NULL,
  `skin` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TMQ_bank`
--

CREATE TABLE `TMQ_bank` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` text CHARACTER SET utf8,
  `bank` text CHARACTER SET utf8,
  `ctk` text CHARACTER SET utf8,
  `stk` text CHARACTER SET utf8,
  `chinhanh` text CHARACTER SET utf8,
  `bank_type` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TMQ_banner`
--

CREATE TABLE `TMQ_banner` (
  `id` bigint(20) NOT NULL,
  `image` text CHARACTER SET utf8,
  `url` text CHARACTER SET utf8,
  `title` text CHARACTER SET utf8
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TMQ_biendoi`
--

CREATE TABLE `TMQ_biendoi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` text CHARACTER SET utf8 NOT NULL,
  `noidung` text CHARACTER SET utf32 NOT NULL,
  `truocgd` int(11) NOT NULL,
  `saugd` int(11) NOT NULL,
  `date` text CHARACTER SET utf8 NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TMQ_chuyenmuc`
--

CREATE TABLE `TMQ_chuyenmuc` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` text CHARACTER SET utf8 NOT NULL,
  `trangthai` varchar(100) NOT NULL,
  `loaicm` int(11) DEFAULT NULL,
  `img` varchar(100) NOT NULL,
  `thongbao` text CHARACTER SET utf8,
  `thongtin_1` text CHARACTER SET utf8,
  `thongtin_2` text CHARACTER SET utf8,
  `thongtin_3` text CHARACTER SET utf8,
  `thongtin_4` text CHARACTER SET utf8,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TMQ_chuyentien`
--

CREATE TABLE `TMQ_chuyentien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid_chuyen` text NOT NULL,
  `uid_nhan` text NOT NULL,
  `sotien` int(11) NOT NULL,
  `noidung` text CHARACTER SET utf8,
  `time` text CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TMQ_giftcode`
--

CREATE TABLE `TMQ_giftcode` (
  `id` int(10) UNSIGNED NOT NULL,
  `uid` text CHARACTER SET utf8 NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `gift` text CHARACTER SET utf8 NOT NULL,
  `sotien` int(11) NOT NULL,
  `date` text CHARACTER SET utf8 NOT NULL,
  `sd` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TMQ_inbox`
--

CREATE TABLE `TMQ_inbox` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid_gui` text CHARACTER SET utf8 NOT NULL,
  `uid` text CHARACTER SET utf8 NOT NULL,
  `noidung` text CHARACTER SET utf8 NOT NULL,
  `time` text CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TMQ_key`
--

CREATE TABLE `TMQ_key` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `time` text CHARACTER SET utf8 NOT NULL,
  `loai` text CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TMQ_lichsu`
--

CREATE TABLE `TMQ_lichsu` (
  `id` bigint(20) NOT NULL,
  `uid_mua` text CHARACTER SET utf8,
  `uid_ban` text CHARACTER SET utf8,
  `taikhoan` text CHARACTER SET utf8,
  `matkhau` text CHARACTER SET utf8,
  `giatien` int(11) DEFAULT NULL,
  `loainick` int(11) DEFAULT NULL,
  `id_acc` int(11) DEFAULT NULL,
  `date` text CHARACTER SET utf8,
  `time` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TMQ_napthe`
--

CREATE TABLE `TMQ_napthe` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(100) DEFAULT NULL,
  `serial` varchar(100) DEFAULT NULL,
  `mathe` varchar(100) DEFAULT NULL,
  `loaithe` text CHARACTER SET utf8,
  `menhgia` int(11) DEFAULT NULL,
  `trangthai` text CHARACTER SET utf8,
  `date` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TMQ_ruttien`
--

CREATE TABLE `TMQ_ruttien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` text CHARACTER SET utf8 NOT NULL,
  `bank` int(11) NOT NULL,
  `ctk` text CHARACTER SET utf8 NOT NULL,
  `stk` text CHARACTER SET utf8 NOT NULL,
  `chinhanh` text CHARACTER SET utf8 NOT NULL,
  `amount` int(11) NOT NULL,
  `noidung` text CHARACTER SET utf8,
  `trangthai` text CHARACTER SET utf8 NOT NULL,
  `time` text CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TMQ_setting`
--

CREATE TABLE `TMQ_setting` (
  `key` text CHARACTER SET utf8 NOT NULL,
  `text` text CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `TMQ_setting`
--

INSERT INTO `TMQ_setting` (`key`, `text`) VALUES
('title', 'Xây dựng và phát triển bởi TMQ'),
('baotri', '0'),
('facebook', 'https://www.facebook.com/zTMQz'),
('phone', '0585589918'),
('name', 'Trần Minh Quang'),
('thongbao', '&lt;a href=&quot;/&quot;&gt;TMQ&lt;/a&gt;'),
('logo', 'https://demo2.tmquang.monster/admin/images/logo.png'),
('ck_ctv', '0.5'),
('odp_muanick', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TMQ_tintuc`
--

CREATE TABLE `TMQ_tintuc` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text CHARACTER SET utf8 NOT NULL,
  `noidung` text CHARACTER SET utf8 NOT NULL,
  `img` text CHARACTER SET utf8 NOT NULL,
  `date` text CHARACTER SET utf8 NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TMQ_user`
--

CREATE TABLE `TMQ_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` text CHARACTER SET utf8,
  `matkhau` text CHARACTER SET utf8,
  `pass` text CHARACTER SET utf8,
  `name` text CHARACTER SET utf8,
  `email` text CHARACTER SET utf8,
  `phone` text CHARACTER SET utf8,
  `facebook` text CHARACTER SET utf8,
  `cash` int(11) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  `ban` int(11) DEFAULT NULL,
  `date` text CHARACTER SET utf8,
  `avatar` text CHARACTER SET utf8,
  `vang` int(11) DEFAULT NULL,
  `hinhthuc_ad` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `TMQ_baiviet`
--
ALTER TABLE `TMQ_baiviet`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `TMQ_bank`
--
ALTER TABLE `TMQ_bank`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `TMQ_banner`
--
ALTER TABLE `TMQ_banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `TMQ_biendoi`
--
ALTER TABLE `TMQ_biendoi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `TMQ_chuyenmuc`
--
ALTER TABLE `TMQ_chuyenmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `TMQ_chuyentien`
--
ALTER TABLE `TMQ_chuyentien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `TMQ_giftcode`
--
ALTER TABLE `TMQ_giftcode`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `TMQ_inbox`
--
ALTER TABLE `TMQ_inbox`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `TMQ_lichsu`
--
ALTER TABLE `TMQ_lichsu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `TMQ_napthe`
--
ALTER TABLE `TMQ_napthe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `TMQ_ruttien`
--
ALTER TABLE `TMQ_ruttien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `TMQ_tintuc`
--
ALTER TABLE `TMQ_tintuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `TMQ_user`
--
ALTER TABLE `TMQ_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `TMQ_baiviet`
--
ALTER TABLE `TMQ_baiviet`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `TMQ_bank`
--
ALTER TABLE `TMQ_bank`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `TMQ_banner`
--
ALTER TABLE `TMQ_banner`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `TMQ_biendoi`
--
ALTER TABLE `TMQ_biendoi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `TMQ_chuyenmuc`
--
ALTER TABLE `TMQ_chuyenmuc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `TMQ_chuyentien`
--
ALTER TABLE `TMQ_chuyentien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `TMQ_giftcode`
--
ALTER TABLE `TMQ_giftcode`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `TMQ_inbox`
--
ALTER TABLE `TMQ_inbox`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `TMQ_lichsu`
--
ALTER TABLE `TMQ_lichsu`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `TMQ_napthe`
--
ALTER TABLE `TMQ_napthe`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `TMQ_ruttien`
--
ALTER TABLE `TMQ_ruttien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `TMQ_tintuc`
--
ALTER TABLE `TMQ_tintuc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `TMQ_user`
--
ALTER TABLE `TMQ_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
