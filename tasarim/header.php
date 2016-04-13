<?php
	include_once("functions.php");
	sayfa_erisim_engeli();
	global $sayfa;
?>
<!DOCTYPE html>
<html>
<head>
<title> .... Hasta Takip </title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/javascript.js"></script>
<script type="text/javascript" src="js/jquery1.10.1nin.js"></script>
</head>
<body>
<div id="header">
	<div class="content">
		<div class="logo">
			<h2>
				<a href="#">Hasta Takip</a>
			</h2>
		</div>
	</div>
	<div id="nav">
		<div class="content">
			<ul>
				<li <?php if($sayfa=="anasayfa"){echo "class='aktif'";} ?>><a href="index.php"> Ana Sayfa </a></li>
				<li  <?php if($sayfa=="randevu"){echo "class='aktif'";} ?>><a href="index.php?sayfa=randevu"> E-Randevu </a></li>
				<li <?php if($sayfa=="kayit_ol"){echo "class='aktif'";} ?>><a href="index.php?sayfa=kayit_ol"> E-Kayıt </a></li>
				<li <?php if($sayfa=="duyurular"){echo "class='aktif'";} ?>><a href="index.php?sayfa=duyurular"> Duyurular </a></li>
			</ul>
		</div>
	</div>
	<div class="clear"></div>
</div>