<?php
	include_once("functions.php");
	sayfa_erisim_engeli();
	$sonuc=session_kontrol();
	$tarih=Date("Y-m-d");
	Global $baglanti;
	
?>
<div class="randevu">
	<div id="title">
		<h4>Randevu Al</h4>
	</div>
	<br/>
	<div id="islem_sonuc"></div>
	<?php
		echo $sonuc;
	?>
	<form name="frm" action="index.php?sayfa=randevu" method="POST">
	<div class="content-input">
		<label>  Poliklinik Seç </label>
		<div>
			<select name="pol_id" id="pol_id" style="width:225px ; height:30px;">
			 <?php
			 $query="Select id,bolum_ismi from bolumler";
			 $islem=@mysql_query($query,$baglanti);
			 if($islem && $_SESSION["uye"] && mysql_num_rows($islem)>0)
			 {  echo "<option value=''>Poliklinik Seç</option>";
				while($satir=@mysql_fetch_assoc($islem)){
					echo "<option value='".$satir["id"]."'>".$satir["bolum_ismi"]."</option>";
				}
			 }
			 ?>
			</select>
		</div>
	</div>
	<br/>
	
	<div class="content-input">
		<label>  Doktor Seç </label>
		<div>
			<select name="doktor_id" id="doktor_id" style="width:225px ; height:30px;">
			 <option value=''>Doktor Seç</option>
			</select>
		</div>
	</div>
	<br/>
	
	<div class="content-input">
		<label>  Randevu Tarihi </label>
		<div>
			<input type="date" name="tarih" id="tarih" min="<?php echo $tarih;?>" value="<?php echo $tarih;?>" style="width:130px ; height:30px;"/>
		</div>
	</div>
	<br/>
	
	<div class="content-input">
		<label>  Randevu Saati </label>
		<div>
			<select name="saat" id="saat" style="width:75px ; height:30px;">
				<option value=''>Seç</option>
			</select>
		</div>
	</div>
	
	<div class="content-actions">
		<label>  </label>
			<input type="submit" value="Randevu Al" id="kaydet" name="kaydet"  class="btn"/> 
			<input type="reset" id="reserle" class="btn" value="Vazgeç"/>
	</div>
	</form>
</div>