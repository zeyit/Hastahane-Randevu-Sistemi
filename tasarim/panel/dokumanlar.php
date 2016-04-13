<?php
	include_once("functions.php");
	sayfa_erisim_engeli();
	$liste=hasta_listesi();
	$sonuc="";	$silme_sonuc="";
	$islem="";
	
	$id=-1; $h_id=-1; $aciklama=""; $dosya=""; $tarih=date("Y-m-d");
	if(@$_GET["islem"]=="Guncelle" && @$_GET["id"])
	{
		$islem="Güncelle";
		$id=@$_GET["id"];
		list($id,$h_id,$dosya,$tarih,$aciklama) =dokuman_veri_sec($id);
	}else{
		$islem="Ekle";
	}
	
	if(@$_POST["kaydet"] || @$_POST["guncelle"])
	{	$id=$_POST["id"];	$h_id=$_POST["h_id"];	
		$aciklama=temizle($_POST["aciklama"]);
		$dosya ="";
		$tarih=$_POST["tarih"];
		if(@$_POST["guncelle"])
		{	$dosya =temizle($_POST["dosya"]);
			$query="Update dokumanlar Set hasta_id=\"$h_id\",dosya=\"$dosya\",
			tarih=\"$tarih\",aciklama=\"$aciklama\" where id=".$id;
		}else
		{	
			$yuklenecek_dosya =basename($_FILES['dosya']['name']);

			if (move_uploaded_file($_FILES['dosya']['tmp_name'], dizin."/$yuklenecek_dosya"))
			{
				
			} else {
				$sonuc.=hata_mesaji("Dosya yükleme başarısız oldu!");
			}
			$query="INSERT INTO dokumanlar(hasta_id,dosya,tarih,aciklama)".
				" VALUES (\"$h_id\",\"". dizin."/".$_FILES['dosya']['name']."\",\"$tarih\",\"$aciklama\")";
		
		}
		$sonuc.=kaydet($query);
	}
	if(@$_POST["btn_sil"])
	{	
		if(@$_POST["sil"])
		{	$sil=$_POST["sil"];
			$silme_sonuc .=sil($sil,"dokumanlar");
		}
	}
	
?>

<div class="content">
	<div id="title">
		<h4>Döküman <?php echo $islem; ?></h4>
	</div>
	<br/>

<?php
 echo $sonuc;
?>
<form enctype="multipart/form-data" action="index.php?sayfa=dokumanlar" method="post">
	<div class="content-input">
		<label>  Hasta Seç </label>
		<div>
			<select name="h_id"  style="width:225px ; height:30px;">
			 <?php
				while($satir=@mysql_fetch_assoc($liste)){
					if($satir["id"] == $h_id)
					{echo "<option selected=\"selected\" value='".$satir["id"]."'>".$satir["isim"]."</option>";}
				else{
					echo "<option value='".$satir["id"]."'>".$satir["isim"]."</option>";
					}
				}
			 ?>
			</select>
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
		<?php
		if(@$_GET["islem"]=="Guncelle")
		{echo "<label>Dosya ismi </label>";
		echo "<div>
			<input type=\"text\" name=\"dosya\" value='".$dosya."' />
		</div>";
		}else
		{
			echo "<label>Dosya Seç </label>";
			echo "<div>
				<input type=\"file\" name=\"dosya\" />
				</div>";
		}
		?>
	</div>
	<br/> 
	<div class="content-input">											
		<label>Ekleme Tarihi </label>
		<div>
			<input type="date" name="tarih" value="<?php echo $tarih;?>"/>
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

	<form action="index.php?sayfa=dokumanlar" method="post">	
	<div class="content-input">											
		<label><h3>Dökümanlar </h3> </label>
		<div>
		<br>
			<?php
			 echo dokumanlar(); 
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