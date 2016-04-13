<?php 
	include_once("functions.php");
	define("index",true);
	$sayfa =sayfa_bul();
	include_once("header.php");
	Global $baglanti;
	$query="Select * from iletisim_bilgileri Orders LIMIT 1";
	$islem=mysql_query($query,$baglanti);
	$iletisim_bilgileri;
	if($islem)
	{
		$iletisim_bilgileri=mysql_fetch_assoc($islem);
	}
?>
<div id="main">
	<div class="content">
		
		<?php
			 sayfa_getir($sayfa);
		?>
		
	</div>
</div>
<?php include_once("footer.php"); ?>