<?php
	include_once("functions.php");
	sayfa_erisim_engeli();
	$liste=hasta_listesi();
	$saat_listesi="";
	$sonuc="";
	$hasta_id=-1;
	$tarih=Date("Y-m-d");
	$silme_sonuc="";
	
	if(@$_GET["id"]){
		$hasta_id=$_GET["id"];
	}
	if(@$_POST["btn_sil"])
	{	
		if(@$_POST["sil"])
		{	$sil=$_POST["sil"];
			$silme_sonuc .="<br/>";
			$silme_sonuc .=sil($sil,"randevu");
			$silme_sonuc .="<br/>";
		}
	}
	
	if(@$_POST["kaydet"] || @$_POST["saat_sorgula"])
	{
		$hasta_id=@$_POST["id"];
		$tarih=@$_POST["tarih"];
		$saat=@$_POST["saat"];
		$not=@$_POST["not"];
		if($hasta_id !=-1 && $hasta_id !="" && $tarih > Date("Y-m-d") && $saat !="")
		{
			$sonuc=randevu_kaydet($hasta_id,$saat,$tarih,$not);
		}
		else if(@$_POST["saat_sorgula"])
		{
			if($tarih > Date("Y-m-d"))
				{
					$saat_listesi=uygun_saatler($tarih);//saat listesini oluşturan fonksiyonu yaz
				}else{
					
					$sonuc=hata_mesaji("Bu gün için veya geçmiş için randevu oluşturulamaz.");
					
				}
		}else{
			$sonuc=hata_mesaji("Hasta seçmediniz");
		}
		
	}
?>
<div class="content">
	<div id="title">
		<h4>Randevu Ekle</h4>
	</div>
	<br/>
	<?php
		echo $sonuc;
	?>
	<form action="index.php?sayfa=randevular" method="POST">
	<div class="content-input">
		<label>  Hasta Seç </label>
		<div>
			<select name="id"  style="width:225px ; height:30px;">
			 <?php
				while($satir=@mysql_fetch_assoc($liste)){
					if($satir["id"] == $hasta_id)
					{echo "<option selected=\"selected\" value='".$satir["id"]."'>".$satir["isim"]."</option>";}
				else{
					echo "<option value='".$satir["id"]."'>".$satir["isim"]."</option>";
					}
				}
			 ?>
			</select>
		</div>
	</div>
	<br/>
	
	<div class="content-input">
		<label>  Randevu Tarihi </label>
		<div>
			<input type="date" name="tarih" value="<?php echo $tarih;?>" style="width:130px ; height:30px;"/>
			<input type="submit" value="sorgula" style="width:60px ; height:30px;" name="saat_sorgula" />
		</div>
	</div>
	<br/>
	
	<div class="content-input">
		<label>  Randevu Saati </label>
		<div>
			<select name="saat"  style="width:75px ; height:30px;">
			<?php
				echo $saat_listesi;
			?>
			</select>
		</div>
	</div>
	
	<div class="content-input">											
		<label>Not </label>
		<div>
			<textarea name="not"  rows="3" maxlength="200"></textarea>
		</div>				
	</div>
	
	<div class="content-actions">
		<label>  </label>
			<input type="submit" value="Kaydet" id="kaydet" name="kaydet"  class="btn"/> 
			<input type="reset" id="reserle" class="btn" value="Vazgeç"/>
	</div>
	</form>
	
	<form action="index.php?sayfa=randevular" method="post">
	<div class="content-input">											
			<?php echo $silme_sonuc;?>
			<label> </label>
			<div>
			<input type="radio" <?php if(@$_POST["sart"]==0) echo "checked='checked'"; ?> value="0" name="sart" />Hepsini Sırala
			<input type="radio" <?php if(@$_POST["sart"]==1) echo "checked='checked'"; ?> value="1" name="sart" />Eski randevuları sırala
			<input type="radio" <?php if(@$_POST["sart"]==2) echo "checked='checked'"; ?> value="2" name="sart" />Bu günki randevuları Sırala
			<input type="radio" <?php if(@$_POST["sart"]==3) echo "checked='checked'"; ?> value="3" name="sart" />Yeni randevuları sırala
			</div>
	</div>
	
	<div class="content-input">											
		<label><h3>Randevular </h3> </label>
		<div>
		<br/>
			<?php
			 echo randevular("",@$_POST["sart"]); 
			?>
		</div>				
	</div>
	
	<div class="content-actions">
		<label>  </label>
			<input id="sil" type="submit" name="btn_sil"" value="Seçilenleri Sil" 
			onclick="return confirm('Seçilenleri Silinsin mi?')"/>
			<input type="submit" value="Yenile" id="kaydet" class="btn"/> 
	</div>
	
	</form>
</div>