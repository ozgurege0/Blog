-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 24 Ağu 2021, 15:31:10
-- Sunucu sürümü: 10.4.19-MariaDB
-- PHP Sürümü: 8.0.7

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

--
-- Tablo döküm verisi `abonelik`
--

INSERT INTO `abonelik` (`abonelik_id`, `abonelik_mail`) VALUES
(1, 'asdas@gmail.com'),
(2, 'hfgjhfg@gmail.com'),
(3, 'asd@gmail.com'),
(4, 'asdaas@gmail.com'),
(8, 'asd'),
(9, 'asd'),
(10, 'sdf'),
(11, 'asd'),
(12, 'asd'),
(13, 'asdas@gmail.com');

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

--
-- Tablo döküm verisi `account`
--

INSERT INTO `account` (`account_id`, `account_icon`, `account_link`, `account_platform`) VALUES
(1, 'fab fa-instagram', '#', 'İnstagram'),
(2, 'fab fa-facebook', '#', 'Facebook'),
(4, 'fab fa-linkedin', '#', 'Linkedin');

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

--
-- Tablo döküm verisi `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_title`, `blog_description`, `blog_img`, `blog_icerik`, `blog_status`, `blog_seodescription`, `blog_seokeywords`, `blog_seoauthor`, `blog_tarih`, `kategoriler_id`) VALUES
(3, 'Grafik Tasarıma Nasıl Başlanır', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'img/uploads/2832421282blog3.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> </p>', 1, 'Web programlamaya nasıl başlanır merak ediyorsan bu bloga göz atmalısın!', 'html,css,js,php,jquery', 'Özgür Ege Nazlıoğlu', '2021-06-20 21:43:30', 3),
(21, 'Web Tasarıma Nasıl Başlanır', '<p><b>Lorem Ipsum</b> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br></p>', 'img/uploads/3094928977blog1.jpg', '<b>Lorem Ipsum</b> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br>', 1, 'Web tasarıma nasıl başlanır merak ediyorsan bu bloga göz atmalısın!', 'html,css,js,php,jquery', 'Özgür Ege Nazlıoğlu', '2021-06-23 20:42:01', 1),
(22, 'Web Programlamaya Nasıl Başlanır?', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br></p>', 'img/uploads/3131725192blog2.png', '<b>Lorem Ipsum</b> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br>', 1, 'Web programlamaya nasıl başlanır merak ediyorsan bu bloga göz atmalısın!', 'html,css,js,php,jquery', 'Özgür Ege Nazlıoğlu', '2021-06-23 20:43:14', 2),
(23, 'Dijital Pazarlamaya Nasıl Başlanır?', '<p><b>Lorem Ipsum</b> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br></p>', 'img/uploads/3147122541blog4.png', '<b>Lorem Ipsum</b> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br>', 1, 'Grafik tasarıma nasıl başlanır merak ediyorsan bu bloga göz atmalısın!', 'html, css, js, php, jquery', 'Özgür Ege Nazlıoğlu', '2021-06-23 20:44:34', 4),
(24, 'Laravel Nedir?', '&lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;br&gt;&lt;/p&gt;', 'img/uploads/2685630001indir.png', '&lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;span style=&quot;font-size: 1rem;&quot;&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/span&gt;&lt;span style=&quot;font-size: 1rem;&quot;&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/span&gt;&lt;span style=&quot;font-size: 1rem;&quot;&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/span&gt;&lt;/p&gt;', 1, 'Laravel nedir merak ediyorsan bu bloga göz atmalısın!', 'html, css, js, php, jquery', 'Özgür Ege Nazlıoğlu', '2021-08-18 15:34:18', 2),
(25, 'Angular JS Nedir?', '&lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;br&gt;&lt;/p&gt;', 'img/uploads/2751926769angularjs.jpg', '&lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;', 1, 'Angular JS nedir merak ediyorsan bu bloga göz atmalısın!', 'html, css, js, php, jquery', 'Özgür Ege Nazlıoğlu', '2021-08-18 17:13:39', 1),
(26, 'Adobe Photoshop Nedir', '&lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;br&gt;&lt;/p&gt;', 'img/uploads/2911831835Photoshop-CC-2020.jpg', '&lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;br&gt;&lt;/p&gt;', 1, 'Adobe Photoshop nedir merak ediyorsan bu bloga göz atmalısın!', 'html, css, js, php, jquery', 'Özgür Ege Nazlıoğlu', '2021-08-18 17:16:09', 3),
(27, 'Google Ads Nedir?', '&lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;br&gt;&lt;/p&gt;', 'img/uploads/2253723496images.jpg', '&lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;br&gt;&lt;/p&gt;', 1, 'Laravel nedir merak ediyorsan bu bloga göz atmalısın!', 'html, css, js, php, jquery', 'Özgür Ege Nazlıoğlu', '2021-08-18 17:20:12', 4);

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

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`kategoriler_id`, `kategoriler_ad`, `kategoriler_description`, `kategoriler_img`, `kategoriler_status`, `kategoriler_tarih`, `kategoriler_shortdesc`) VALUES
(1, 'Web Tasarım', 'Some quick example text to build on theSome quick example text to build on the card title and make up the bulk of the card&#039;s content.Some quick example text to build on the card title and make up the bulk of the card&#039;s content.Some quick example text to build on the card title and make up the bulk of the card&#039;s content.Some quick example text to build on the card title and make up the bulk of the card&#039;s content. card title and make up the bulk of the card&#039;s content.', 'img/uploads/205402074621015269773094928977blog1.jpg', 1, '2021-06-22 20:22:54', 'Some quick example text to build on the card title and make up the bulk of the card&#039;s content.'),
(2, 'Web Programlama', 'Some quick example text to build Some quick example text to build on the card title and make up the bulk of the card&#039;s content.Some quick example text to build on the card title and make up the bulk of the card&#039;s content.Some quick example text to build on the card title and make up the bulk of the card&#039;s content.Some quick example text to build on the card title and make up the bulk of the card&#039;s content.Some quick example text to build on the card title and make up the bulk of the card&#039;s content.on the card title and make up the bulk of the card&#039;s content.\r\n\r\n', 'img/uploads/229013081429445244892360126150blog2.png', 1, '2021-06-22 20:24:01', 'Some quick example text to build on the card title and make up the bulk of the card&#039;s content.'),
(3, 'Grafik Tasarım', 'Some quick example text to build oSome quick example text to build on the card title and make up the bulk of the card&#039;s content.Some quick example text to build on the card title and make up the bulk of the card&#039;s content.Some quick example text to build on the card title and make up the bulk of the card&#039;s content.Some quick example text to build on the card title and make up the bulk of the card&#039;s content.Some quick example text to build on the card title and make up the bulk of the card&#039;s content.n the card title and make up the bulk of the card&#039;s content.', 'img/uploads/249953102726812294142677020109blog3.jpg', 1, '2021-06-22 20:24:59', 'Some quick example text to build on the card title and make up the bulk of the card&#039;s content.'),
(4, 'Dijital Pazarlama', 'Some quick example text to build on the card title and make up the bulk of the card&#039;s content.Some quick example text to build on the card title and make up the bulk of the card&#039;s content.Some quick example text to build on the card title and make up the bulk of the card&#039;s content.Some quick example text to build on the card title and make up the bulk of the card&#039;s content.Some quick example text to build on the card title and make up the bulk of the card&#039;s content.Some quick example text to build on the card title and make up the bulk of the card&#039;s content.Some quick example text to build on the card title and make up the bulk of the card&#039;s content.', 'img/uploads/243582341529526258092072425271blog4.png', 1, '2021-06-22 20:25:22', 'Some quick example text to build on the card title and make up the bulk of the card&#039;s content.');

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

--
-- Tablo döküm verisi `mesajlar`
--

INSERT INTO `mesajlar` (`mesajlar_id`, `mesajlar_ad`, `mesajlar_soyad`, `mesajlar_mail`, `mesajlar_tel`, `mesajlar_konu`, `mesajlar_mesaj`, `mesajlar_tarih`) VALUES
(2, 'Özgür Ege', 'Nazlıoğlu', 'dogussamet08@gmail.com', '+905449435919', 'Merhaba', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '2021-06-24 11:06:47'),
(3, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '2021-06-24 11:07:06'),
(4, 'asd', 'asd', 'asd@gmail.com', '05449435919', 'Selaö', 'adasas', '2021-06-25 10:52:45');

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
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`yorumlar_id`, `yorumlar_ad`, `yorumlar_icerik`, `blog_id`, `yorumlar_status`, `yorumlar_tarih`) VALUES
(2, 'Admin Deneme', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 2, 1, '2021-06-21 23:49:02'),
(3, 'Deneme', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 3, 1, '2021-06-21 23:49:02'),
(4, 'Özgür Egee', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 1, 1, '2021-06-21 23:49:02'),
(5, 'Ege Tugay', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 2, 1, '2021-06-22 10:23:32');

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
  MODIFY `abonelik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `kategoriler_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `mesajlar`
--
ALTER TABLE `mesajlar`
  MODIFY `mesajlar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `yorumlar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
