<?php
	include_once("functions_ayarlar.php");
	include_once("functions.php");
	Global $baglanti;
	sayfa_erisim_engeli();
	$duyuru =array("id"=>"","baslik"=>"","ayrinti"=>"","url"=>"");
	$poli =array("id"=>"","bolum_ismi"=>"","bilgi"=>"","url"=>"","bilgi_detay"=>"");
	$doktor=array("doktor_id"=>"","adi"=>"","soyadi"=>"","email"=>"","parola"=>"","yetki"=>"");
	
	if(@$_GET["duyuru_id"])
	{
		$duyuru=duyuru(@$_GET["duyuru_id"]);
	}
	if(@$_GET["pol_id"])
	{
		$poli=polikinik(@$_GET["pol_id"]);
	}
	if(@$_GET["doktor_id"])
	{
		$doktor=doktor(@$_GET["doktor_id"]);
	}
	if(@$_GET["doktor_ekle"])
	{
	$secilen_poliklinik=array("id"=>"","bolum_ismi"=>"","bilgi"=>"","url"=>"","bilgi_detay"=>"");
	$doktor_list =doktor_list();
	$secilen_poliklinik=polikinik($_GET["doktor_ekle"]);
		
	}
?>
<div class="ayarlar2">

	<div class="content">
			<div class="title">
				<h4>
				<?php
					if($duyuru['id'] !="")
					{echo "Duyuru Güncelle";}
					else{echo "Duyurular";}
				?>
				</h4>
			</div>
		<?php 
		if($duyuru['id'] =="")
		{
		?>
		<div class="hidden">
			<div class="content-input">
			<div>
				<form action="index.php?sayfa=ayarlar" method="post" style="text-align:center; margin-right:auto;">
					<input name="duyuru_s" id="s" placeholder="Duyuru ara" type="text" value="<?php echo @$_POST["duyuru_s"]; ?>"/> 
					<input name="ara"  type="submit"  id="ara" value="Ara"/> 
				</form>
				<br/>
				
				<form action="index.php?sayfa=ayarlar" method="post">
					<?php
						echo duyurular(@$_POST["duyuru_s"]);
					?>
				</form>
			</div>
			</div>
		</div>
		<?php 
		}
		if($duyuru['id'] !="")
		{
		?>
			<form action="index.php?sayfa=ayarlar" enctype="multipart/form-data" method="post">
				
				<div class="content-input">
					<label>  Başlık </label>
					<div>
						<input name="baslik" type="text"   value="<?php echo $duyuru['baslik'];?>" required=""/>	
					</div>
				</div>
				
				<div class="content-input">
					<label>  içerik </label>
					<div>
						<textarea name="ayrinti" rows="5" ><?php echo $duyuru['ayrinti'];?></textarea>
					</div>
				</div>
				
				<div class="content-input">
					<label>  Dosya Yolu </label>
					<div>
						<input name="d_yol" type="text" value="<?php echo $duyuru['url'];?>"/>	
					</div>
				</div>
				
				<div class="content-input">
					<label>  Resim </label>
					<div>
						<input name="resim" type="file"/>	
					</div>
				</div>
				
				<div class="content-actions">
					<label><input type="hidden" name="id" value="<?php echo $duyuru['id'];?>" /> </label>
						<input type="submit" name="duyuru_guncelle" id="kaydet" value="Güncelle" class="btn"/> 
						<input type="reset" id="reserle" class="btn" value="Vazgeç"/>
				</div>
			</form>	
		<?php } ?>
	</div>

</div>

<div class="ayarlar2">

	<div class="content">
			<div class="title">
				<h4>
				<?php
					if($poli['id'] !="")
					{echo "Poliklinik Güncelle";}
					else{echo "Poliklinikler";}
				?>
				</h4>
			</div>
		<?php 
		if($poli['id'] =="" && !@$_GET["doktor_ekle"])
		{
		?>
		<div class="hidden">
			<div class="content-input">
			<div>
				<form action="index.php?sayfa=ayarlar" method="post" style="text-align:center; margin-right:auto;">
					<input name="poli_s" id="s" placeholder="Poliklinik ara" type="text" value="<?php echo @$_POST["poli_s"]; ?>"/> 
					<input name="ara"  type="submit"  id="ara" value="Ara"/> 
				</form>
				<br/>
				
				<form action="index.php?sayfa=ayarlar" class="poliklinik" method="post">
					<?php
						echo poliklinikler(@$_POST["poli_s"]);
					?>
				<div id="poliklinik_islem_sonuc" class="islem_sonuc"></div>
				<div id="poliklinik_sil" class="ajax_btn">Seçileni Sil</div>
				</form>
				
			</div>
			</div>
		</div>
		<?php 
		}
		if(@$_GET["doktor_ekle"])
		{?>
			<form action="index.php?sayfa=ayarlar" method="post">
				<div class="content-input">
					<label>  Poliklinik </label>
					<div>
						<select name="polikinik_id" style="width:175px ; height:25px;">
							<?php
								echo "<option value='".$secilen_poliklinik["id"]."' selected>".$secilen_poliklinik["bolum_ismi"]."</option>";
							?>
						</select>
					</div>
				</div>
				<div class="content-input">
					<label>  Doktor Seç </label>
					<div>
						<select name="doktor_id" style="width:175px ; height:25px;">
							<?php
								while($satir =mysql_fetch_assoc($doktor_list))
								{
									echo "<option value='".$satir["doktor_id"]."'>".$satir['adi']." ".$satir['soyadi']."</option>";
								}
							?>
						</select>
					</div>
				</div>
				<div class="content-actions">
					<label> </label>
						<input type="submit" name="poli_doktor_ekle" id="kaydet" value="Kaydet" class="btn"/> 
						<input type="reset" id="reserle" class="btn" value="Vazgeç"/>
				</div>
			</form>
			
		<?php
		}
		if($poli['id'] !="" && !@$_GET["doktor_ekle"])
		{
		?>
			<form action="index.php?sayfa=ayarlar" enctype="multipart/form-data" method="post">
				<div class="content-input">
					<label>  Poliklinik İsmi </label>
					<div>
						<input name="bolum_ismi" type="text" maxlength="100"  value="<?php echo $poli['bolum_ismi'];?>" required=""/>	
					</div>
				</div>
				
				<div class="content-input">
					<label>  Açıklama </label>
					<div>
						<textarea name="bilgi" rows="5" maxlength="200" ><?php echo $poli['bilgi'];?></textarea>
					</div>
				</div>
				
				<div class="content-input">
					<label>  içerik </label>
					<div>
						<textarea name="bilgi_detay" rows="5" ><?php echo $poli['bilgi_detay'];?></textarea>
					</div>
				</div>
				
				<div class="content-input">
					<label>  Dosya Yolu </label>
					<div>
						<input name="d_yol" type="text" maxlength="100" value="<?php echo $poli['url'];?>"/>	
					</div>
				</div>
				
				<div class="content-input">
					<label>  Resim </label>
					<div>
						<input name="resim" type="file"/>	
					</div>
				</div>
				
				<div class="content-actions">
					<label><input type="hidden" name="id" value="<?php echo $poli['id'];?>" /> </label>
						<input type="submit" name="poli_guncelle" id="kaydet" value="Güncelle" class="btn"/> 
						<input type="reset" id="reserle" class="btn" value="Vazgeç"/>
				</div>
			</form>	
		<?php } ?>
	</div>

</div>

<div class="ayarlar2">

	<div class="content">
			<div class="title">
				<h4>
				<?php
					if($doktor['doktor_id'] !="")
					{echo "Doktor Güncelle";}
					else{echo "Doktorlar";}
				?>
				</h4>
			</div>
		<?php 
		if($doktor['doktor_id'] =="")
		{
		?>
		<div class="hidden">
			<div class="content-input">
			<div>
				<form action="index.php?sayfa=ayarlar" method="post" style="text-align:center; margin-right:auto;">
					<input name="doktor_s" id="s" placeholder="Doktor ara" type="text" value="<?php echo @$_POST["doktor_s"]; ?>"/> 
					<input name="ara"  type="submit"  id="ara" value="Ara"/> 
				</form>
				<br/>
				
				<form action="index.php?sayfa=ayarlar" class="doktor" method="post">
					<?php
						echo doktorlar(@$_POST["doktor_s"]);
					?>
					<div id="doktor_islem_sonuc" class="islem_sonuc"></div>
				</form>
				
				<div id="doktor_sil" class="ajax_btn">Seçileni Sil</div>
			</div>
			</div>
		</div>
		<?php 
		}
		if($doktor['doktor_id'] !="")
		{
		?>
			<form action="index.php?sayfa=ayarlar" enctype="multipart/form-data" method="post">
				<div class="content-input">
					<label>  Adı </label>
					<div>
						<input name="adi" type="text" maxlength="50"  value="<?php echo $doktor['adi'];?>" required=""/>	
					</div>
				</div>
				
				<div class="content-input">
					<label>  Soyadı </label>
					<div>
						<input name="soyadi" type="text" maxlength="50"  value="<?php echo $doktor['soyadi'];?>" required=""/>	
					</div>
				</div>
				
				<div class="content-input">
					<label>  E mail </label>
					<div>
						<input name="email" type="email" maxlength="50"  value="<?php echo $doktor['email'];?>" required=""/>	
					</div>
				</div>
				
				<div class="content-input">
					<label>  Parola </label>
					<div>
						<input name="parola" type="password" />	
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
					<label><input type="hidden" name="id" value="<?php echo $doktor['doktor_id'];?>" /> </label>
						<input type="submit" name="doktor_guncelle" id="kaydet" value="Güncelle" class="btn"/> 
						<input type="reset" id="reserle" class="btn" value="Vazgeç"/>
				</div>
			</form>	
		<?php } ?>
	</div>

</div>

<div class="clear"></div>