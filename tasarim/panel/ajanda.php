<?php
	include_once("functions.php");
	sayfa_erisim_engeli();
	$sonuc="";	$silme_sonuc="";
	$islem="";
	
	$id=-1; $baslik=""; $aciklama=""; $baslama_tarihi=""; $bitis_tarihi="";
	if(@$_GET["islem"]=="Guncelle" && @$_GET["id"])
	{
		$islem="Güncelle";
		$id=@$_GET["id"];
		list($id,$baslik,$aciklama,$baslama_tarihi,$bitis_tarihi) =ajanda_veri_sec($id);
	}else{
		$islem="Ekle";
	}
	
	if(@$_POST["kaydet"] || @$_POST["guncelle"])
	{	$id=@$_POST["id"];	$baslik=temizle(@$_POST["baslik"]);	
		$aciklama=temizle($_POST["aciklama"]);
		$baslama_tarihi =$_POST["baslama_tarihi"];
		$bitis_tarihi=$_POST["bitis_tarihi"];
		if(@$_POST["guncelle"])
		{
			$query="Update ajanda Set baslik=\"$baslik\",aciklama=\"$aciklama\",
			baslama_tarihi=\"$baslama_tarihi\",bitis_tarihi=\"$bitis_tarihi\" where id=".$id;
		}else
		{	
			$query="INSERT INTO ajanda(baslik,aciklama,baslama_tarihi,bitis_tarihi,doktor_id)".
				" VALUES (\"$baslik\",\"$aciklama\",\"$baslama_tarihi\",\"$bitis_tarihi\",'".$_SESSION["doktor"]["id"]."')";
		}
		$sonuc=kaydet($query);
	}
	if(@$_POST["btn_sil"])
	{	
		if(@$_POST["sil"])
		{	$sil=$_POST["sil"];
			$silme_sonuc .=sil($sil,"ajanda");
		}
	}
?>
<div class="content">
	<div id="title">
		<h4>Not <?php echo $islem; ?></h4>
	</div>
	<br/>

<?php
 echo $sonuc;
?>
<form action="index.php?sayfa=ajanda" method="post">
	<div class="content-input">
		<label>  Başlık </label>
		<div>
			<input name="baslik" type="text" value="<?php echo $baslik; ?>" />
		</div>
	</div>
	
	<div class="content-input">											
		<label>Açıklama </label>
		<div>
			<textarea name="aciklama" rows="3" maxlength="200"><?php echo $aciklama; ?></textarea>
		</div>				
	</div>
	<br/> 
	
	<div class="content-input">											
		<label>Başlama Tarihi </label>
		<div>
			<input type="date" name="baslama_tarihi" value="<?php echo $baslama_tarihi;?>"/>
		</div>
	</div>
	<br/> 
	
	<div class="content-input">											
		<label>Bitiş Tarihi </label>
		<div>
			<input type="date" name="bitis_tarihi" value="<?php echo $bitis_tarihi;?>"/>
		</div>
	</div>
	<br/>
	
	<div class="content-actions">
		<label> <input type="hidden" name="id" value="<?php echo $id; ?>"/>  </label>
			<input type="submit" name="<?php if($islem=="Ekle") echo "kaydet"; else if($islem=="Güncelle") echo "guncelle";?>"
			value="<?php echo $islem; ?>" id="kaydet"  class="btn"/> 
			<input type="reset" id="reserle" class="btn" value="Vazgeç"/>
	</div>
	
</form>

	<div class="content-input">											
		
			<?php echo $silme_sonuc;?>
					
	</div>

	<form action="index.php?sayfa=ajanda" method="post">	
	<div class="content-input">											
		<label><h3>Notlar </h3> </label>
		<div>
		<br>
			<?php
			 echo ajanda(); 
			?>
		</div>				
	</div>
	<div class="content-actions">
		<label>  </label>
			<input id="sil" type="submit" name="btn_sil"" value="Seçilenleri Sil" 
			onclick="return confirm('Seçilenleri Silinsin mi?')"/>
	</div>
	</form>
</div>