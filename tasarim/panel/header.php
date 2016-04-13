<?php 
include_once("functions.php");
sayfa_erisim_engeli();
Global $sayfa;
?>
<!doctype html>
<html>
	<head>
		<title> Hasta Takip Sistemi</title>
		<link href="css/style.css" type="text/css" rel="stylesheet" />
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
	</head>
	<body>
		<div id="header">
			<div id="menubar">
				<div class="content">
					<a href="index.php">Hasta Takip Sistemi</a>
					<div id="isim"><?php echo $_SESSION["doktor"]["isim"]; ?> </div>
				</div>
			</div>
			<div id="menu">
				<div class="content">
					<ul>
						<li <?php if($sayfa == "hastaekle"){echo "class=\"active\"";} ?>>
							<a href="index.php?sayfa=hastaekle">
							<i id="icon-kayit" class="icon"></i>
							<span class="sp">Hasta Kayıt</span> </a> 
						</li>
						<li <?php if($sayfa == "hastalar"){echo "class=\"active\"";} ?>>
							<a href="index.php?sayfa=hastalar">
							<i id="icon-hastalar" class="icon"></i>
							<span class="sp">Hastalar</span> </a> 
						</li>
						<li <?php if($sayfa == "randevular"){echo "class=\"active\"";} ?>>
							<a href="index.php?sayfa=randevular">
							<i id="icon-randevular" class="icon"></i>
							<span class="sp">Randevular</span> </a>
						</li>
						<li <?php if($sayfa == "laboratuvar"){echo "class=\"active\"";} ?>>
							<a href="index.php?sayfa=laboratuvar">
							<i id="icon-lab" class="icon"></i>
							<span class="sp">Laboratuvar</span> </a> 
						</li>
						<li <?php if($sayfa == "dokumanlar"){echo "class=\"active\"";} ?>>
							<a href="index.php?sayfa=dokumanlar">
							<i id="icon-dokuman" class="icon"></i>
							<span class="sp">Dökümanlar</span> </a> 
						</li>
						<li <?php if($sayfa == "ajanda"){echo "class=\"active\"";} ?>>
							<a href="index.php?sayfa=ajanda">
							<i id="icon-ajanda" class="icon"></i>
							<span class="sp">Ajanda</span> </a> 
						</li>
						<li <?php if($sayfa == "ayarlar"){echo "class=\"active\"";} ?>>
							<a href="index.php?sayfa=ayarlar">
							<i id="icon-ayarlar" class="icon"></i>
							<span class="sp">Ayarlar</span> </a> 
						</li>
						
						<li ><a href="cikis.php">
							<i id="icon-logout" class="icon"></i>
							<span class="sp">Çıkış</span> </a> 
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="clear"></div>