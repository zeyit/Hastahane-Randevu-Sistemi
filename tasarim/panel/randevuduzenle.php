<?php
	include_once("functions.php");
	sayfa_erisim_engeli();
	
	$liste=hasta_listesi();
	$sonuc="";
	
	$h_id=-1;
	$saat_listesi="";
	$tarih=Date("Y-m-d");
	$note="";
	
	if($id=@$_GET["id"]){
		Global $baglanti;
		$query="Select * from randevu where id=".$id;
		$islem =mysql_query($query,$baglanti);
		if($islem && mysql_num_rows($islem)==1)
		{
			$satir =mysql_fetch_assoc($islem);
			$h_id=$satir["hasta_id"];
			$tarih=$satir["tarih"];
			$note=$satir["note"];
			$saat_listesi="<option selected=\"selected\" value=\"".$satir["saat"]."\">".$satir["saat"]."</option>";
		}else
		{
			header("Location:index.php?sayfa=randevular");
		}
	}
	
	if(@$_POST)
	{
		$id=@$_POST["id"];
		
		$h_id=@$_POST["h_id"];;
		$tarih=@$_POST["tarih"];
		$saat=@$_POST["saat"];
		$note=@$_POST["note"];
		if(@$_POST["saat_sorgula"])
		{
			$saat_listesi=uygun_saatler($tarih);//saat listesini oluşturan fonksiyonu yaz
			$saat_listesi.=$saat;
		}
		else if($id !="" && $h_id !="" && $h_id!=-1 && $tarih > Date("Y-m-d") && $saat !="")
		{
			$sonuc=randevu_guncelle($id,$h_id,$saat,$tarih,$note);
		}
		else{
			$sonuc=hata_mesaji("Bu günki veya geçmişteki randevular düzenlenemez");
		}
	}
	if($id=="")
	{
		header("Location:index.php?sayfa=randevular");
	}
?>
<div class="content">
	<div id="title">
		<h4>Randevu Düzenle</h4>
	</div>
	<br/>
	<?php
		echo $sonuc;
	?>
	<form action="index.php?sayfa=randevuduzenle" method="POST">
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
			<textarea name="note"  rows="3" maxlength="200"><?php echo $note; ?></textarea>
		</div>				
	</div>
	
	<div class="content-actions">
		<label><input type="hidden" name="id" value="<?php echo $id;?>" />   </label>
			<input type="submit" value="Güncelle" id="kaydet" name="kaydet"  class="btn"/> 
			<input type="reset" id="reserle" class="btn" value="Vazgeç"/>
	</div>
	</form>
	
</div>