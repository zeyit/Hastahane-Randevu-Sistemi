<?php
	include_once("functions.php");
	sayfa_erisim_engeli();
	Global $baglanti;
if(@$_GET["pol"])
{
	$query="Select * from bolumler where id=".$_GET["pol"];
	$islem=mysql_query($query,$baglanti);
	if($islem && mysql_num_rows($islem)==1)
	{
		$satir=mysql_fetch_assoc($islem);
		echo "<div id='hizmetler'>";
		echo "<div class=\"pol\">
				  <div class=\"himg\">";
			echo		"<img class=\"himg\" src=\"".$satir['url']."\"/></div>";
			echo "<h3>".$satir['bolum_ismi']."</h3>";
			echo "<p>".$satir['bilgi_detay']."</p>";
			echo "<div class='clear'></div>";
			echo "</div>";
		echo "</div>";
		
	}else
	{
		header("Location:index.php");
	}	
}else
{// aşağıdaki çalışacak	
?>
<div id="hizmetler">
	<h2>Poliklinikler</h2>
	<?php 
		$query="Select * from bolumler";
		$islem=mysql_query($query,$baglanti);
		if($islem && @mysql_num_rows($islem)>0)
		{
			while($satir=mysql_fetch_assoc($islem))
			{
				echo "<a href=\"index.php?pol=".$satir['id']."\">";
				echo "<div class=\"hcontent\">
				  <div class=\"himg\">";
				echo		"<img class=\"himg\" src=\"".$satir['url']."\"/></div>";
				echo "<h3>".$satir['bolum_ismi']."</h3>";
				echo "<p>".$satir['bilgi']."</p>";
				echo "</div>
					 </a>";
			}
		}
	?>
<div class="clear"></div>
</div>
<?php
}
?>