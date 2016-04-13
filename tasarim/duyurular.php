<?php
	include_once("functions.php");
	sayfa_erisim_engeli();
?>

<div id="hizmetler">
	<h2>Duyurular</h2>
	<?php 
	$query="Select * from duyurular";
	if(@$_GET["id"])
	{
		$query.=" where id=".$_GET["id"];
	}
	Global $baglanti;
	$islem=mysql_query($query,$baglanti);
	if($islem && @mysql_num_rows($islem)>0)
	{
		while($satir=mysql_fetch_assoc($islem))
		{
			echo "<div class=\"pol\">
				  <div class=\"himg\">";
			echo"<img class=\"himg\" src=\"".$satir['url']."\"/></div>";
			echo "<h3>".$satir['baslik']."</h3>";
			echo "<p>".$satir['ayrinti']."</p>";
			echo "<div class='clear'></div>";
			echo "</div>";
		}
	}
	?>
</div>