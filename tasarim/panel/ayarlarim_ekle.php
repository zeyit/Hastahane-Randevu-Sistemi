<?php
	include_once("functions.php");
	include_once("functions_ayarlar.php");
	sayfa_erisim_engeli();
	Global $baglanti;
	$iletisim_bil=iletisim_bilgileri();
?>
<div class="ayarlar">
	<div class="content">
		<div class="title">
			<h4>Doktor Ekle</h4>
		</div>
		<form action="index.php?sayfa=ayarlar" method="post" class="hidden">
			<div class="content-input">
				<label>  Adı </label>
				<div>
					<input name="adi" maxlength="50" type="text"/>
				</div>
			</div>
			
			<div class="content-input">
				<label>  Soyadı </label>
				<div>
					<input name="soyadi" maxlength="50" type="text"/>
				</div>
			</div>
			
			<div class="content-input">
				<label>  E mail </label>
				<div>
					<input name="email" maxlength="50" type="email"/>
				</div>
			</div>
			
			<div class="content-input">
				<label> Parola </label>
				<div>
					<input name="parola" type="password"/>
				</div>
			</div>
			
			<div class="content-input">
				<label> Yetki Ver</label>
				<div>
				<select name="yetki"> 
						 <option>Yetki Seç</option>
					<?php
						$query="Select id,yetki from yetkiler";
						$islem=@mysql_query($query,$baglanti);
						if($islem && mysql_num_rows($islem) >0)
						{
							while($satir=mysql_fetch_assoc($islem))
							{
								echo "<option value='".$satir['id']."'>".$satir['yetki']."<option>";
							}
						}
					?>
				</select>
				</div>
			</div>
			
			<div class="content-actions">
				<label> </label>
					<input type="submit" name="doktor_kaydet" id="kaydet" value="Kaydet" class="btn"/> 
					<input type="reset" id="reserle" class="btn" value="Vazgeç"/>
			</div>
			
		</form>	
	</div>

	<div class="content">
		<div class="title">
			<h4>iletişim Bilgilerini Düzenle</h4>
		</div>
		<form action="index.php?sayfa=ayarlar" method="post" class="hidden">
			
			<div class="content-input">
				<label>  Telfon 1 </label>
				<div>
					<input name="tel1" type="text" maxlength="20" value="<?php echo $iletisim_bil["tel1"];?>" >	
				</div>
			</div>
			<div class="content-input">
				<label>  Telfon 2 </label>
				<div>
					<input name="tel2" type="text" maxlength="20"  value="<?php echo $iletisim_bil["tel2"];?>" >	
				</div>
			</div>
			<div class="content-input">
				<label>  E mail </label>
				<div>
					<input name="mail" type="email" maxlength="50" value="<?php echo $iletisim_bil["mail"];?>"  >	
				</div>
			</div>
			<div class="content-input">
				<label>  Facebook Adresi </label>
				<div>
					<input name="fb_adres" type="text" maxlength="50"  value="<?php echo $iletisim_bil["fb"];?>"  >	
				</div>
			</div>
			<div class="content-input">
				<label>  Twitter Adresi </label>
				<div>
					<input name="tw_adres" type="text" maxlength="50" value="<?php echo $iletisim_bil["tw"];?>"  >	
				</div>
			</div>
			
			<div class="content-actions">
				<label> <input type="hidden" name="id"/> </label>
					<input type="submit" name="iletisim_kaydet" id="kaydet" value="Güncelle" class="btn"/> 
					<input type="reset" id="reserle" class="btn" value="Vazgeç"/>
			</div>
			
		</form>	
	</div>

</div>


<div class="ayarlar">
	<div class="content">
		<div class="title">
			<h4>Duyuru Ekle</h4>
		</div>
	<form action="index.php?sayfa=ayarlar" method="post" class="hidden" >
		
		<div class="content-input">
			<label>  Başlık </label>
			<div>
				<input name="baslik" type="text" maxlength="150"  value="" required="">	
			</div>
		</div>
		
		<div class="content-input">
			<label>  içerik </label>
			<div>
				<textarea name="ayrinti" rows="5" ></textarea>
			</div>
		</div>
		
		<div class="content-input">
			<label>  Resim </label>
			<div>
				<input name="resim" type="file"   value="">	
			</div>
		</div>
		
		<div class="content-actions">
			<label> </label>
				<input type="submit" name="duyuru_kaydet" id="kaydet" value="Kaydet" class="btn"/> 
				<input type="reset" id="reserle" class="btn" value="Vazgeç"/>
		</div>
		
	</form>	
	</div>

	<div class="content">
		<div class="title">
			<h4>Poliklinik Ekle</h4>
		</div>
	<form action="index.php?sayfa=ayarlar" method="post" class="hidden">
		
		<div class="content-input">
			<label>  Poliklinik İsmi </label>
			<div>
				<input name="baslik" type="text" maxlength="100"  value="" required="">	
			</div>
		</div>
		
		<div class="content-input">
			<label>  Açıklama </label>
			<div>
				<textarea name="aciklama" rows="3" maxlength="200"></textarea>
			</div>
		</div>
		
		<div class="content-input">
			<label>  içerik </label>
			<div>
				<textarea name="icerik" rows="6" ></textarea>
			</div>
		</div>
		
		<div class="content-input">
			<label>  Resim </label>
			<div>
				<input name="resim" type="file"   value="">	
			</div>
		</div>
		
		<div class="content-actions">
			<label></label>
				<input type="submit" name="pol_kaydet" id="kaydet" value="Kaydet" class="btn"/> 
				<input type="reset" id="reserle" class="btn" value="Vazgeç"/>
		</div>
	</form>	
	</div>

</div>
<div class="clear"></div>
<div class="ayarlar2">

	<div class="content">
			<div class="title">
				<h4>
				Poliklinik-Doktor
				</h4>
			</div>
		<div class="hidden">
			<div class="content-input">
			<div>
				<form action="index.php?sayfa=ayarlar" method="post" style="text-align:center; margin-right:auto;">
					<input name="doktor_poliklinik_s" id="s" placeholder="Poliklinik veya Doktor ara" type="text" value="<?php echo @$_POST["doktor_poliklinik_s"]; ?>"/> 
					<input name="ara"  type="submit"  id="ara" value="Ara"/> 
				</form>
				<br/>
				
				<form action="index.php?sayfa=ayarlar" method="post" class="doktor_poli">
					<?php
						echo doktor_poliklinik(@$_POST["doktor_poliklinik_s"]);
					?>
					<div id="doktor_poliklinik_islem_sonuc" class="islem_sonuc"></div>
					<div id="doktor_poliklinik_sil" class="ajax_btn">Seçileni Sil</div>
				</form>
			</div>
			</div>
		</div>
	</div>

</div>
