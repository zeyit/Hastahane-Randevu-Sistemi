<?php
	include_once("functions.php");
	sayfa_erisim_engeli();
?>
<div id="footer">
		<div class="content">
				<div class="foot-nav">
				<?php 
				if(@$iletisim_bilgileri["mail"] != ""){
					echo "<h4>Bizi Ulaşın </h2>".
					"<a href=\"mailto:".$iletisim_bilgileri["mail"]."\">".$iletisim_bilgileri["mail"]."</a>";
				}
				?>
				</div>
				<div class="foot-nav">
				<?php 
				if(@$iletisim_bilgileri["fb_adres"] != "" || @$iletisim_bilgileri["tw_adres"] != ""){
					echo "<h4>Sosyal Medya </h2>".
					"<a href=\"".$iletisim_bilgileri["fb_adres"]."\">Facebook ta beğen</a>
					<a href=\"".$iletisim_bilgileri["tw_adres"]."\">Twitter'da takip et</a>";
				}
				?>
				</div>
				<div class="foot-nav">
				
				<h4>Polikliniklerimiz </h2>
				<?php 
					$query="Select bolum_ismi,id from bolumler Orders LIMIT 5";
					$islem=mysql_query($query,$baglanti);
					while($satir=mysql_fetch_assoc($islem))
					{
						echo "<a href='index.php?pol=".$satir['id']."'>".$satir["bolum_ismi"]."</a>";
					}
				?>
				</div>
			<div style="clear:both;"></div>
		</div>
		
		<div class="content1">
			<div class="content">
				&copy; Copyright <?php echo Date("Y"); ?> | <a href="index.php">Hasta Takip ve iletişim sistemi</a>
			</div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript" src="js/ajax.js"></script>