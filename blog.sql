-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 01 Şub 2022, 18:37:51
-- Sunucu sürümü: 10.4.22-MariaDB
-- PHP Sürümü: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `blog`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `abonelik`
--

CREATE TABLE `abonelik` (
  `abonelik_id` int(11) NOT NULL,
  `abonelik_mail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `about`
--

CREATE TABLE `about` (
  `about_id` int(11) NOT NULL DEFAULT 0,
  `about_ad` varchar(500) NOT NULL,
  `about_unvan` varchar(800) NOT NULL,
  `about_text` varchar(5000) NOT NULL,
  `about_img` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `about`
--

INSERT INTO `about` (`about_id`, `about_ad`, `about_unvan`, `about_text`, `about_img`) VALUES
(0, 'Özgür Ege Nazlıoğlu', 'Web Geliştiricisi', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem quos labore vitae ipsam dolorum repellat atque aliquid nobis sapiente ratione nam incidunt voluptatem commodi eligendi veniam inventore, temporibus suscipit! Nulla. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem ullam amet ut accusantium atque, at sit velit ipsa deleniti. Veritatis consequatur magni id labore, ipsum quis ipsam nemo placeat enim!', 'img/244372354222120301892518028312profile.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `account`
--

CREATE TABLE `account` (
  `account_id` int(11) NOT NULL,
  `account_icon` varchar(500) NOT NULL,
  `account_link` varchar(800) NOT NULL,
  `account_platform` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `ayarlar_id` int(11) NOT NULL DEFAULT 0,
  `ayarlar_logo` varchar(850) NOT NULL,
  `ayarlar_favicon` varchar(850) NOT NULL,
  `ayarlar_url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`ayarlar_id`, `ayarlar_logo`, `ayarlar_favicon`, `ayarlar_url`) VALUES
(0, 'img/uploads/2091530226logo.png', 'img/uploads/2847429116favicon.png', 'http://localhost/blog/');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `blog_title` varchar(900) NOT NULL,
  `blog_description` varchar(2500) NOT NULL,
  `blog_img` varchar(800) NOT NULL,
  `blog_icerik` longtext NOT NULL,
  `blog_status` int(5) NOT NULL DEFAULT 1,
  `blog_seodescription` varchar(2000) NOT NULL,
  `blog_seokeywords` varchar(2000) NOT NULL,
  `blog_seoauthor` varchar(500) NOT NULL,
  `blog_tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `kategoriler_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `info`
--

CREATE TABLE `info` (
  `info_id` int(11) NOT NULL DEFAULT 0,
  `info_tel` varchar(30) NOT NULL,
  `info_mail` varchar(450) NOT NULL,
  `info_adres` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `info`
--

INSERT INTO `info` (`info_id`, `info_tel`, `info_mail`, `info_adres`) VALUES
(0, '+905449435919', 'info@panteryazilim.net', 'İzmir/Konak/...');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `kategoriler_id` int(11) NOT NULL,
  `kategoriler_ad` varchar(600) NOT NULL,
  `kategoriler_description` varchar(2500) NOT NULL,
  `kategoriler_img` varchar(1500) NOT NULL,
  `kategoriler_status` int(5) NOT NULL DEFAULT 1,
  `kategoriler_tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `kategoriler_shortdesc` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesajlar`
--

CREATE TABLE `mesajlar` (
  `mesajlar_id` int(11) NOT NULL,
  `mesajlar_ad` varchar(500) NOT NULL,
  `mesajlar_soyad` varchar(500) NOT NULL,
  `mesajlar_mail` varchar(400) NOT NULL,
  `mesajlar_tel` varchar(30) NOT NULL,
  `mesajlar_konu` varchar(1200) NOT NULL,
  `mesajlar_mesaj` varchar(10000) NOT NULL,
  `mesajlar_tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `seoayar`
--

CREATE TABLE `seoayar` (
  `seoayar_id` int(11) NOT NULL,
  `seoayar_title` varchar(800) NOT NULL,
  `seoayar_description` varchar(1200) NOT NULL,
  `seoayar_keywords` varchar(1000) NOT NULL,
  `seoayar_author` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `seoayar`
--

INSERT INTO `seoayar` (`seoayar_id`, `seoayar_title`, `seoayar_description`, `seoayar_keywords`, `seoayar_author`) VALUES
(0, 'Özgür Medya Ücretsiz Blog Sitesi!', 'Merhabalar, bu blog scriptini herkesin kullanabilmesi adına paylaşıyorum. Umarım işinize yarar, sağlıklı günler dilerim.', 'html,css,js,php', 'Özgür Ege Nazlıoğlu');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `admin_id` int(11) NOT NULL DEFAULT 0,
  `admin_kullanici` varchar(500) NOT NULL,
  `admin_parola` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`admin_id`, `admin_kullanici`, `admin_parola`) VALUES
(0, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `yorumlar_id` int(11) NOT NULL,
  `yorumlar_ad` varchar(250) NOT NULL,
  `yorumlar_icerik` varchar(2500) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `yorumlar_status` int(5) NOT NULL DEFAULT 0,
  `yorumlar_tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `abonelik`
--
ALTER TABLE `abonelik`
  ADD PRIMARY KEY (`abonelik_id`);

--
-- Tablo için indeksler `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Tablo için indeksler `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`kategoriler_id`);

--
-- Tablo için indeksler `mesajlar`
--
ALTER TABLE `mesajlar`
  ADD PRIMARY KEY (`mesajlar_id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`yorumlar_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `abonelik`
--
ALTER TABLE `abonelik`
  MODIFY `abonelik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `kategoriler_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `mesajlar`
--
ALTER TABLE `mesajlar`
  MODIFY `mesajlar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `yorumlar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
