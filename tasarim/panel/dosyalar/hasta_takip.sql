-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 20 Nis 2015, 17:00:12
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
  `bitis_tarihi` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `ajanda`
--

INSERT INTO `ajanda` (`id`, `baslik`, `aciklama`, `baslama_tarihi`, `bitis_tarihi`) VALUES
(3, 'ToplantÄ±', 'sdasdsaliÃ¼Ã§ÅŸÄŸÄ°Ä±', '2015-04-22', '2015-04-23');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `dokumanlar`
--

INSERT INTO `dokumanlar` (`id`, `hasta_id`, `dosya`, `tarih`, `aciklama`) VALUES
(8, 14, '', '2015-04-22', 'qw'),
(15, 5, 'dosyalar/dizi.txt', '2015-04-14', 'scxz');

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
  `h_onay` int(2) NOT NULL,
  `parola` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `hastalar`
--

INSERT INTO `hastalar` (`id`, `isim`, `tc`, `dyer`, `dtarihi`, `cinsiyet`, `email`, `tel`, `il`, `ilce`, `adres`, `on_tani`, `aciklama`, `h_onay`, `parola`) VALUES
(8, 'asd', '81474836477', 'ankara', '0000-00-00', 0, '', '0', '', '', '', '', '', 1, ''),
(14, 'ahmet', '21474853647', 'asd', '2016-04-15', 0, '', '0', '', '', '', '', '', 0, ''),
(15, 'ahmet', '21474836471', 'asd', '2016-04-15', 0, '', '0', '', '', '', '', '', 0, ''),
(22, 'ahmet', '10056600090', 'wefdccx', '2015-01-01', 0, '', '', '', '', '', '', '', 0, ''),
(23, 'xzcxz', '10000000055', 'avcxf', '2013-04-05', 0, '', '', '', '', '', '', '', 1, ''),
(24, 'Ahmet asd', '45678932145', '321', '1999-10-12', 0, 'mail@sa.com', '', '', '', '', '', '', 0, ''),
(25, 'mehmet qwerty', '32145698712', 'istanbul', '1997-12-20', 0, '', '', '', '', '', '', '', 0, '');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `lab`
--

INSERT INTO `lab` (`id`, `hasta_id`, `aciklama`, `Glukoz`, `Ure`, `Kreatinin`, `LDL`, `Trigliserid`, `Total_Lipid`, `GAMA`, `Fosfor`, `Sodyum`, `Demir`, `digerleri`) VALUES
(4, 5, 'asdaskl', '4', '5', '61', '12', '21', '2', '15', '1', '0', '0', 'dsfil'),
(8, 5, 'asdaskl', '4', '5', '61', '12', '21', '2', '15', '1', '0', '0', 'dsfsadncellendi'),
(9, 22, 'fdsf', 'dsf', '', 'dsf', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `randevu`
--

CREATE TABLE IF NOT EXISTS `randevu` (
`id` int(11) NOT NULL,
  `hasta_id` int(11) NOT NULL,
  `saat` varchar(6) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `tarih` date NOT NULL,
  `note` varchar(200) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `randevu`
--

INSERT INTO `randevu` (`id`, `hasta_id`, `saat`, `tarih`, `note`) VALUES
(1, 3, '15:00', '2015-04-20', 'naskd'),
(9, 14, '9:00', '2015-04-23', 'id ye gore guncel23'),
(10, 5, '13:00', '2015-04-23', 'aJSLjsksajdksajn'),
(11, 5, '11:30', '2015-04-21', 'wq');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uye`
--

CREATE TABLE IF NOT EXISTS `uye` (
`id` int(11) NOT NULL,
  `adi` varchar(20) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `soyadi` varchar(20) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `parola` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `son_giris_tarihi` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `uye`
--

INSERT INTO `uye` (`id`, `adi`, `soyadi`, `email`, `parola`, `son_giris_tarihi`) VALUES
(1, 'Zeyit', 'BAŞAR', 'zeyd17@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ajanda`
--
ALTER TABLE `ajanda`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Tablo için indeksler `dokumanlar`
--
ALTER TABLE `dokumanlar`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Tablo için indeksler `hastalar`
--
ALTER TABLE `hastalar`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

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
-- Tablo için indeksler `uye`
--
ALTER TABLE `uye`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ajanda`
--
ALTER TABLE `ajanda`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Tablo için AUTO_INCREMENT değeri `dokumanlar`
--
ALTER TABLE `dokumanlar`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- Tablo için AUTO_INCREMENT değeri `hastalar`
--
ALTER TABLE `hastalar`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- Tablo için AUTO_INCREMENT değeri `lab`
--
ALTER TABLE `lab`
MODIFY `id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Tablo için AUTO_INCREMENT değeri `randevu`
--
ALTER TABLE `randevu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- Tablo için AUTO_INCREMENT değeri `uye`
--
ALTER TABLE `uye`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
