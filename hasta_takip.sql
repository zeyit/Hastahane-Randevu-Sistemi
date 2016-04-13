-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 26 May 2015, 17:52:57
-- Sunucu sürümü: 5.6.21
-- PHP Sürümü: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `hasta_takip`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ajanda`
--

CREATE TABLE IF NOT EXISTS `ajanda` (
`id` int(11) NOT NULL,
  `baslik` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `baslama_tarihi` date NOT NULL,
  `bitis_tarihi` date NOT NULL,
  `doktor_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `ajanda`
--

INSERT INTO `ajanda` (`id`, `baslik`, `aciklama`, `baslama_tarihi`, `bitis_tarihi`, `doktor_id`) VALUES
(3, 'ToplantÄ±', 'sdasdsaliÃ¼Ã§ÅŸÄŸÄ°Ä±', '2015-04-22', '2015-04-23', 1),
(8, 'baslÄ±ksaasd', 'dasdasdas', '2015-04-22', '2015-04-24', 1),
(9, 'ToplantÄ±', 'sadlkasn', '2015-05-14', '2015-05-22', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bolumler`
--

CREATE TABLE IF NOT EXISTS `bolumler` (
`id` int(11) NOT NULL,
  `bolum_ismi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `bilgi` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `bilgi_detay` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `bolumler`
--

INSERT INTO `bolumler` (`id`, `bolum_ismi`, `bilgi`, `url`, `bilgi_detay`) VALUES
(1, 'NÃ¶rolojisi', 'BirÃ§ok sistemik hastalÄ±k sinir sistemine ait bulgulara neden olabilirken, nÃ¶rolojik hastalÄ±klarÄ±n bazÄ±larÄ± da diÄŸer organ sistemlerini etkilenebilir. Ã–rneÄŸin gebelikte deÄŸiÅŸen hormon dÃ¼zeyleri vÃ¼cudun', 'resim/5.png', 'BirÃ§ok sistemik hastalÄ±k sinir sistemine ait bulgulara neden olabilirken, nÃ¶rolojik hastalÄ±klarÄ±n bazÄ±larÄ± da diÄŸer organ sistemlerini etkilenebilir. Ã–rneÄŸin gebelikte deÄŸiÅŸen hormon dÃ¼zeyleri vÃ¼cudun sÄ±vÄ± ve tuz tutmasÄ±nÄ± kolaylaÅŸtÄ±rÄ±r, kemiklerin korunaklÄ± yÃ¼zeylerinden geÃ§en sinirler bu seviyelerde Ã¶dem etkisi nedeni ile basÄ± altÄ±nda kalarak zarar gÃ¶rÃ¼rler. SonuÃ§ta etkilenen bÃ¶lgenin altÄ±nda uyuÅŸma, karÄ±ncalanma, aÄŸrÄ±, etkilenen kaslarda kuvvetsizlik gibi belirtiler ortaya Ã§Ä±kar. Benzer ÅŸekilde ÅŸeker hastalÄ±ÄŸÄ± ve tiroid fonksiyon bozukluklarÄ± gibi hastalÄ±klarda bu duruma zemin hazÄ±rlar. Bu ve benzeri pek Ã§ok nÃ¶rolojik hastalÄ±k tek bir sisteme ait bulgu vermediÄŸinden, baÅŸvuru sÄ±rasÄ±nda hastalarÄ±n bir Ã§oÄŸu farklÄ± branÅŸ hekimlerince gÃ¶rÃ¼lÃ¼r.\r\nNÃ¶roloji polikliniklerine baÅŸvuru ÅŸikayetleri baÅŸlÄ±ca; baÅŸ aÄŸrÄ±larÄ±, baÅŸ dÃ¶nmeleri, inmeler, ÅŸuur deÄŸiÅŸikliÄŸi ile giden hastalÄ±klar (epilepsi = sara vs), el ayak uyuÅŸmalarÄ±, Ã§eÅŸitli kas gÃ¼Ã§sÃ¼zlÃ¼kleri gibi durumlardÄ±r.\r\n                '),
(2, 'Genel Cerrahi', 'Genel cerrahi, vÃ¼cutta sistemik ve yerel sorunlarÄ±n cerrahi yÃ¶ntemlerle tedavisi yanÄ±nda, genel prensipler (yara iyileÅŸmesi, yaralanmaya metabolik ve endokrin cevap gibi) konularÄ± iÃ§eren ve geliÅŸimler', '', 'Genel cerrahi, vÃ¼cutta sistemik ve yerel sorunlarÄ±n cerrahi yÃ¶ntemlerle tedavisi yanÄ±nda, genel prensipler (yara iyileÅŸmesi, yaralanmaya metabolik ve endokrin cevap gibi) konularÄ± iÃ§eren ve geliÅŸimleri aÃ§Ä±sÄ±ndan pek Ã§ok cerrahi ve temel tÄ±p dallarÄ± etkilemiÅŸ bir teknik disiplindir.Genel cerrahi, vÃ¼cutta sistemik ve yerel sorunlarÄ±n cerrahi yÃ¶ntemlerle tedavisi yanÄ±nda, genel prensipler (yara iyileÅŸmesi, yaralanmaya metabolik ve endokrin cevap gibi) konularÄ± iÃ§eren ve geliÅŸimleri aÃ§Ä±sÄ±ndan pek Ã§ok cerrahi ve temel tÄ±p dallarÄ± etkilemiÅŸ bir teknik disiplindir.'),
(3, 'GÃ¶ÄŸÃ¼s HastalÄ±klarÄ±', '', '', ''),
(6, 'DiÅŸ HekimliÄŸi', '', '', ''),
(7, 'Ortapedi', 'askjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsa', '', 'askjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsa'),
(8, 'Kardiyoloji', 'askjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsa', '', 'askjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdb jkasabkj bkbajkdbjkasbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsaaskjdjsadjksabkj bkbajkdbjkasbdabj kabsjkbasdjkbsa');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `doktorlar`
--

CREATE TABLE IF NOT EXISTS `doktorlar` (
`doktor_id` int(11) NOT NULL,
  `adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `soyadi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `parola` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `son_giris_tarihi` date NOT NULL,
  `yetki` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `doktorlar`
--

INSERT INTO `doktorlar` (`doktor_id`, `adi`, `soyadi`, `email`, `parola`, `son_giris_tarihi`, `yetki`) VALUES
(1, 'Zeyit', 'BaÅŸar', 'zeyd17@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2015-05-25', 1),
(2, 'Mehmet', 'KÃ¶ktaÅŸ', 'mehmet@metmet.com', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00', 0),
(3, 'Murat', 'asdasd', 'murat@murat.com', '5f311cc69460666eecc3e7289d14c2e8', '2015-05-15', 0),
(5, 'ms', 'ms', 'ms@ms.com', 'ee33e909372d935d190f4fcb2a92d542', '2015-05-20', 0),
(8, 'TarÄ±k', 'Ã§elik', 'tarik@tarik.com', 'fb5472d0ee866623186cf0b83ac8f8f1', '2015-05-17', 0),
(9, 'said', 'maraba', 'said@said.com', 'b7b791e873f143d5318310e59022175d', '2015-05-17', 1),
(10, 'burak', 'buyrukcu', 'burak@burak.com', '39109a5bb10ccb7aff1313d369804b74', '2015-05-17', 1),
(11, 'Mustafa', 'zorbaz', 'mustafa@mustafa.com', 'd41d8cd98f00b204e9800998ecf8427e', '0000-00-00', 0),
(12, 'Tolga', 'iskander', 'tolga@tolga.com', '2300073755f5f09bd2f0c25cdabca2f0', '0000-00-00', 0),
(13, 'Halit', 'Ak', 'halit@halit.com', 'd1e20b427255b37adfcc93cb61957d18', '0000-00-00', 0),
(14, 'Ã–zkan', 'Tabak', 'ozkan@ozkan.com', 'c49fe4ae4495ed6113c9c08c928e861e', '0000-00-00', 0),
(15, 'Mehmet Han', 'YÃ¼ksel', 'mehmethan@mehmethan.com', 'f3b91d7c030d9f3826e0c97fe639ef1f', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `doktor_bolum`
--

CREATE TABLE IF NOT EXISTS `doktor_bolum` (
`id` int(11) NOT NULL,
  `doktor_id` int(11) NOT NULL,
  `bolum_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `doktor_bolum`
--

INSERT INTO `doktor_bolum` (`id`, `doktor_id`, `bolum_id`) VALUES
(1, 1, 2),
(4, 3, 2),
(5, 3, 8),
(6, 9, 8),
(8, 8, 6),
(9, 5, 3),
(10, 8, 7),
(11, 10, 7),
(12, 13, 1),
(13, 10, 1),
(14, 14, 6),
(15, 15, 8),
(16, 12, 7);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dokumanlar`
--

CREATE TABLE IF NOT EXISTS `dokumanlar` (
`id` int(11) NOT NULL,
  `hasta_id` int(11) NOT NULL,
  `dosya` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `tarih` date NOT NULL,
  `aciklama` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `dokumanlar`
--

INSERT INTO `dokumanlar` (`id`, `hasta_id`, `dosya`, `tarih`, `aciklama`) VALUES
(15, 5, 'dosyalar/dizi.txt', '2015-04-14', 'scxz'),
(18, 25, 'dosyalar/hasta_takip.sql', '2015-04-23', 'trrt');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `duyurular`
--

CREATE TABLE IF NOT EXISTS `duyurular` (
`id` int(11) NOT NULL,
  `baslik` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `ayrinti` text COLLATE utf8_turkish_ci NOT NULL,
  `url` varchar(150) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `duyurular`
--

INSERT INTO `duyurular` (`id`, `baslik`, `ayrinti`, `url`) VALUES
(1, 'Hastahanemizde DahiliyeBÃ¶lÃ¼mÃ¼ aÃ§Ä±kmÄ±ÅŸtÄ±r', 'Hastahanemizde DahiliyeBÃ¶lÃ¼mÃ¼ aÃ§Ä±kmÄ±ÅŸtÄ±rHastahanemizde DahiliyeBÃ¶lÃ¼mÃ¼ aÃ§Ä±kmÄ±ÅŸtÄ±rHastahanemizde DahiliyeBÃ¶lÃ¼mÃ¼ aÃ§Ä±kmÄ±ÅŸtÄ±rHastahanemizde DahiliyeBÃ¶lÃ¼mÃ¼ aÃ§Ä±kmÄ±ÅŸtÄ±rHastahanemizde DahiliyeBÃ¶lÃ¼mÃ¼ aÃ§Ä±kmÄ±ÅŸtÄ±r', ''),
(3, 'Yeni duyuruuu', 'adasndaslkdnasdnsÅŸanfxmc xÅŸsldf ckx vkÅŸxcjvk kxc vkcx kvÅŸx asjdkjsakldksadnasklnd\r\nsad\r\ns\r\nadsadsakdjsakdjslkajd', ''),
(4, 'Merhaba DÃ¼nya', 'Merhaba DÃ¼nyaMerhaba DÃ¼nyaMerhaba DÃ¼nyaMerhaba DÃ¼nyaMerhaba DÃ¼nyaMerhaba DÃ¼nyaMerhaba DÃ¼nyaMerhaba DÃ¼nyaMerhaba DÃ¼nyaMerhaba DÃ¼nyaMerhaba DÃ¼nyaMerhaba DÃ¼nyaMerhaba DÃ¼nyaMerhaba DÃ¼nyaMerhaba DÃ¼nyaMerhaba DÃ¼nyaMerhaba DÃ¼nyaMerhaba DÃ¼nyaMerhaba DÃ¼nyaMerhaba DÃ¼nyaMerhaba DÃ¼nyaMerhaba DÃ¼nyaMerhaba DÃ¼nyaMerhaba DÃ¼nyaMerhaba DÃ¼nyaMerhaba DÃ¼nyaMerhaba DÃ¼nyaMerhaba DÃ¼nyaMerhaba DÃ¼nyaMerhaba DÃ¼nyaMerhaba DÃ¼nyaMerhaba DÃ¼nya', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hastalar`
--

CREATE TABLE IF NOT EXISTS `hastalar` (
`id` int(11) NOT NULL,
  `isim` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `tc` varchar(11) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `dyer` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `dtarihi` date NOT NULL,
  `cinsiyet` int(2) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `tel` varchar(11) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `il` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ilce` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `adres` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `on_tani` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `parola` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `hastalar`
--

INSERT INTO `hastalar` (`id`, `isim`, `tc`, `dyer`, `dtarihi`, `cinsiyet`, `email`, `tel`, `il`, `ilce`, `adres`, `on_tani`, `aciklama`, `parola`) VALUES
(8, 'asde', '81474836477', 'ankara', '2015-01-01', 0, '', '0', '', '', '', '', '', ''),
(14, 'ahmet', '21474853647', 'asd', '2016-04-15', 0, '', '0', '', '', '', '', '', ''),
(15, 'ahmet', '21474836471', 'asd', '2016-04-15', 0, '', '0', '', '', '', '', '', ''),
(22, 'ahmet', '10056600090', 'wefdccx', '2015-01-01', 0, '', '', '', '', '', '', '', ''),
(24, 'Ahmet asd', '45678932145', '321', '1999-10-12', 0, 'mail@sa.com', '', '', '', '', '', '', ''),
(25, 'mehmet qwerty', '32145698712', 'istanbul', '1997-12-20', 0, '', '', '', '', '', '', '', ''),
(27, 'ahmet', '12345678901', 'istanbul', '2000-07-18', 0, 'zeyd17@hotmail.com', '', '', '', '', '', '', ''),
(29, 'ali', '10000000000', 'Konya', '1998-05-19', 0, 'ali@ali.com', '', '', '', '', '', '', '86318e52f5ed4801abe1d13d509443de'),
(31, 'aaa', '10000000001', 'istanbul', '1991-01-01', 0, 'aaa@aaa.com', '', '', '', '', '', '', '47bce5c74f589f4867dbd57e9ca9f808'),
(32, 'bbb', '10000000002', 'Bolu', '1992-02-02', 1, 'bbb@bbb.com', '', '', '', '', '', '', '08f8e0260c64418510cefb2b06eee5cd'),
(33, 'ccc', '10000000003', 'istanbul', '1993-03-03', 0, 'ccc@ccc.com', '', '', '', '', '', '', '9df62e693988eb4e1e1444ece0578579');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim_bilgileri`
--

CREATE TABLE IF NOT EXISTS `iletisim_bilgileri` (
`id` int(11) NOT NULL,
  `tel1` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `tel2` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `fb_adres` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `tw_adres` varchar(100) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `iletisim_bilgileri`
--

INSERT INTO `iletisim_bilgileri` (`id`, `tel1`, `tel2`, `mail`, `fb_adres`, `tw_adres`) VALUES
(2, '1234567889', '1234567898', 'info@hastatakip.com.tr', 'http://facebook.com/hasta_takip', 'http://twitter.com/hasta_takip');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lab`
--

CREATE TABLE IF NOT EXISTS `lab` (
`id` int(25) NOT NULL,
  `hasta_id` int(25) NOT NULL,
  `aciklama` varchar(200) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Glukoz` varchar(25) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Ure` varchar(25) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Kreatinin` varchar(25) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `LDL` varchar(25) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Trigliserid` varchar(25) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Total_Lipid` varchar(25) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `GAMA` varchar(25) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Fosfor` varchar(25) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Sodyum` varchar(25) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Demir` varchar(25) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `digerleri` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `lab`
--

INSERT INTO `lab` (`id`, `hasta_id`, `aciklama`, `Glukoz`, `Ure`, `Kreatinin`, `LDL`, `Trigliserid`, `Total_Lipid`, `GAMA`, `Fosfor`, `Sodyum`, `Demir`, `digerleri`) VALUES
(4, 5, 'asdaskl', '4', '5', '61', '12', '21', '2', '15', '1', '0', '0', 'dsfil'),
(9, 22, 'fdsf', 'dsf', '', 'dsf', '', '', '', '', '', '', '', ''),
(10, 8, 'asdasklduncel', '4', '5', '61', '12', '21', '2', '15', '1', '0', '0', 'dsfsadncellendiguncellendi'),
(13, 24, 'qweknnmxzÃ¶cnmncz gÃ¼ncellemesss', '5', '5', '6', '1', '4', 'l', 'n', 'j', 'v', 'y', 'bak');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `randevu`
--

CREATE TABLE IF NOT EXISTS `randevu` (
`id` int(11) NOT NULL,
  `hasta_id` int(11) NOT NULL,
  `saat` varchar(6) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `tarih` date NOT NULL,
  `note` varchar(200) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `bolum_id` int(11) NOT NULL,
  `doktor_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `randevu`
--

INSERT INTO `randevu` (`id`, `hasta_id`, `saat`, `tarih`, `note`, `bolum_id`, `doktor_id`) VALUES
(1, 3, '15:00', '2015-04-20', 'naskd', 0, 1),
(9, 14, '9:00', '2015-04-23', 'id ye gore guncel23', 0, 1),
(10, 5, '13:00', '2015-04-23', 'aJSLjsksajdksajn', 0, 2),
(12, 23, '8:00', '2015-04-24', 'asdguncel', 0, 1),
(13, 22, '10:30', '2015-04-24', 'qwe', 3, 1),
(26, 26, '13:30', '2015-05-20', 'wqe', 2, 1),
(27, 26, '11:00', '2015-05-21', '', 2, 1),
(28, 26, '15:30', '2015-05-14', '', 2, 1),
(29, 26, '11:30', '2015-05-14', '', 2, 1),
(31, 26, '15:30', '2015-05-13', '', 2, 1),
(32, 26, '15:00', '2015-05-22', '', 2, 1),
(34, 25, '13:30', '2015-05-23', 'yeni kayit', 0, 1),
(35, 29, '13:00', '2015-05-14', '', 2, 1),
(36, 29, '9:30', '2015-05-16', '', 6, 3),
(37, 29, '14:30', '2015-05-15', '', 6, 3),
(38, 29, '16:00', '2015-05-13', '', 6, 3),
(40, 29, '10:00', '2015-05-15', '', 6, 2),
(41, 29, '10:00', '2015-05-29', 'll', 0, 1),
(42, 29, '10:00', '2015-05-29', 'll', 0, 0),
(43, 31, '11:00', '2015-05-22', '', 6, 14);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yetkiler`
--

CREATE TABLE IF NOT EXISTS `yetkiler` (
`id` int(11) NOT NULL,
  `yetki` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yetkiler`
--

INSERT INTO `yetkiler` (`id`, `yetki`) VALUES
(1, 'YÃ¶netici Doktor');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ajanda`
--
ALTER TABLE `ajanda`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Tablo için indeksler `bolumler`
--
ALTER TABLE `bolumler`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `doktorlar`
--
ALTER TABLE `doktorlar`
 ADD PRIMARY KEY (`doktor_id`);

--
-- Tablo için indeksler `doktor_bolum`
--
ALTER TABLE `doktor_bolum`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `dokumanlar`
--
ALTER TABLE `dokumanlar`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Tablo için indeksler `duyurular`
--
ALTER TABLE `duyurular`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hastalar`
--
ALTER TABLE `hastalar`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Tablo için indeksler `iletisim_bilgileri`
--
ALTER TABLE `iletisim_bilgileri`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `lab`
--
ALTER TABLE `lab`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `randevu`
--
ALTER TABLE `randevu`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Tablo için indeksler `yetkiler`
--
ALTER TABLE `yetkiler`
 ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ajanda`
--
ALTER TABLE `ajanda`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Tablo için AUTO_INCREMENT değeri `bolumler`
--
ALTER TABLE `bolumler`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Tablo için AUTO_INCREMENT değeri `doktorlar`
--
ALTER TABLE `doktorlar`
MODIFY `doktor_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- Tablo için AUTO_INCREMENT değeri `doktor_bolum`
--
ALTER TABLE `doktor_bolum`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- Tablo için AUTO_INCREMENT değeri `dokumanlar`
--
ALTER TABLE `dokumanlar`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- Tablo için AUTO_INCREMENT değeri `duyurular`
--
ALTER TABLE `duyurular`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Tablo için AUTO_INCREMENT değeri `hastalar`
--
ALTER TABLE `hastalar`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- Tablo için AUTO_INCREMENT değeri `iletisim_bilgileri`
--
ALTER TABLE `iletisim_bilgileri`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `lab`
--
ALTER TABLE `lab`
MODIFY `id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Tablo için AUTO_INCREMENT değeri `randevu`
--
ALTER TABLE `randevu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- Tablo için AUTO_INCREMENT değeri `yetkiler`
--
ALTER TABLE `yetkiler`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
