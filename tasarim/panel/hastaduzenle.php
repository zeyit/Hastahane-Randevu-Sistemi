<?php
	include_once("functions.php");
	sayfa_erisim_engeli();
	$sonuc="";
	if(@$_POST["guncelle"])
	{	if(@$_POST["isim"]!="" &&  @$_POST["tc"]!="" && @$_POST["dyer"]!="" && @$_POST["id"]!="")
		{
				$id = $_POST["id"];
				$isim = temizle($_POST["isim"]);
				$tc   = temizle($_POST["tc"]);
				$dyer = temizle($_POST["dyer"]);
				$dgun = temizle($_POST["dgun"]);
				$day  = temizle($_POST["day"]);
				$dyil = temizle($_POST["dyil"]);
				$cinsiyet = temizle($_POST["cinsiyet"]);
				$email = temizle($_POST["email"]);
				$tel = temizle($_POST["tel"]);
				$il = temizle($_POST["il"]);
				$ilce = temizle($_POST["ilce"]);
				$adres = temizle($_POST["adres"]);
				$on_tani = temizle($_POST["on_tani"]);
				$aciklama = temizle($_POST["aciklama"]);
				
				$dtarihi=date("Y-m-d",strtotime($dyil."-".$day."-".$dgun));
				$sorgu="UPDATE  hastalar SET isim=\"$isim\",tc=\"$tc\",dyer=\"$dyer\",
				dtarihi=\"$dtarihi\",cinsiyet=\"$cinsiyet\",email=\"$email\",
				tel=\"$tel\",il=\"$il\",ilce=\"$ilce\",adres=\"$adres\",
				on_tani=\"$on_tani\",aciklama=\"$aciklama\" where id=".$id;
	
			$sonuc=kaydet($sorgu);
		}else
		{
			$sonuc=hata_mesaji("Boş alanları doldurunuz..") ;
		}
	}
	if(isset($_GET["id"])){
		$satir =Veri_Cekme($_GET["id"]);
		$gun;$ay;$y;
		$tarih=(String)$satir["dtarihi"];
		list($y,$ay,$gun)=split("[-]",$tarih);
	}else{
		header("location:index.php?sayfa=hastalar");
	}
?>
<div class="content">
	<div id="title">
		<h4>Hasta Kayıdı Düzenle</h4>
	</div>
	<br/>

<?php
 echo $sonuc;
?>

<form action="index.php?sayfa=hastaduzenle&id=<?php echo $satir["id"];?>" method="POST">
	<div class="content-input">
		<label>  Adı Soyadı </label>
		<div>
			<input name="isim" type="text" <?php echo "value='".$satir["isim"]."'";?> required="">	
		</div>
	</div>
					
	<div class="content-input">
		<label>  TC Kimlik No </label>
		<div>
			<input name="tc" type="number" min="10000000000" max="99999999999" <?php echo "value='".$satir["tc"]."'";?> required="">	
		</div>
	</div>
					
	<div class="content-input">
		<label>  Doğum Yeri </label>
		<div>
			<input name="dyer" type="text" <?php echo "value='".$satir["dyer"]."'";?> required="">	
		</div>
	</div>
					
	<br/>
					
	<div class="content-input">											
		<label>Doğum Tarihi</label>
		<div>
			<select name="dgun"  style="width:75px ; height:35px;">
			 <?php
				for($i=1;$i<32;$i++){
					if($i== $gun)
						echo "<option selected=\"selected\" value=\"".$i."\">$i</option>";
					else
						echo "<option value=\"".$i."\">$i</option>";
				}
			 ?>
			</select>
	
			<select name="day"  style="width:100px ; height:35px ;">
				<?php
					$aylar =array(1=>"Ocak","Şubat","Mart","Nisan","Mayıs","Haziran",
					"Temmuz","Agustos","Eylül","Ekim","Kasım","Aralık");
					for($i=1;$i<=12;$i++){
						if($ay == $i)
						{echo "<option selected=\"selected\" value=\"".$i."\">$aylar[$i]</option>";}//selectid
						else
						{echo "<option value=\"".$i."\">$aylar[$i]</option>";}
					}
				?>
			</select>

			<select name="dyil"  style="width:75px ; height:35px; ">
				<?php
					$yil=date("Y");
					for($i=$yil;$i > 1930 ;$i--){
						if($i==$y)
						{echo "<option selected=\"selected\" value=\"".$i."\">$i</option>";}
						else{echo "<option value=\"".$i."\">$i</option>";}
					}
				?>
			</select>
		</div>			
	</div>
	
	<div class="content-input">
		<label>  Cinsiyet </label>
		<div>
			<input type="radio" <?php if($satir["cinsiyet"]==0) echo "checked='checked'";?> name="cinsiyet" value="0"> Bay
			<input type="radio" <?php if($satir["cinsiyet"]==1) echo "checked='checked'";?> name="cinsiyet" value="1"> Bayan
		</div>
	</div>
	<br /><br />
	
	<div class="content-input">
		<label>  Email Addresi </label>
		<div>
			<input name="email" type="email"  <?php echo "value='".$satir["email"]."'";?>/>
		</div>
	</div>

	<div class="content-input">
		<label>  Telfon Numarası </label>
		<div>
			<input name="tel" type="text"  <?php echo "value='".$satir["tel"]."'";?>/>
		</div>
	</div>

	<div class="content-input">											
		<label > Yaşadığı il</label>
		<div>
			<input name="il" type="text" <?php echo "value='".$satir["il"]."'";?>/>
		</div>  				
	</div>  

	<div class="content-input">											
		<label> Yaşadığı ilce</label>
		<div >
			<input name="ilce" type="text"   <?php echo "value='".$satir["ilce"]."'";?>"/>
		</div> 			
	</div>  

	<div class="content-input">											
		<label>Adres </label>
		<div>
			<input name="adres" type="text" <?php echo "value='".$satir["adres"]."'";?>/>
		</div> 				
	</div>  
	<br/> <br/>
	
	<div class="content-input">											
		<label>Ön Tanı </label>
		<div>
			<textarea name="on_tani" rows="3" maxlength="200"><?php echo $satir["on_tani"];?></textarea>
		</div>				
	</div>
	<br/> 

	<div class="content-input">											
		<label>Açıklama </label>
		<div>
			<textarea name="aciklama"  rows="3" maxlength="200"><?php echo $satir["aciklama"];?></textarea>
		</div>				
	</div>
	<br/> 
	

	<div class="content-actions">
		<label> <input type="hidden" name="id" <?php echo "value='".$satir["id"]."'";?> />  </label>
			<input type="submit" name="guncelle" value="Güncelle" id="kaydet"  class="btn"/> 
			<input type="reset" id="reserle" class="btn" value="Vazgeç"/>
	</div>
</form>
</div>