<?php
	include_once("functions.php");
	sayfa_erisim_engeli();
	$sonuc="";
	if(@$_POST["kaydet"])
	{	if(@$_POST["isim"]!="" &&  @$_POST["tc"]!="" && @$_POST["email"]!="" && @$_POST["parola"]!="")
		{
				$isim = temizle($_POST["isim"]);
				$tc   = temizle($_POST["tc"]);
				$dyer = temizle($_POST["dyer"]);
				$dgun = temizle($_POST["dgun"]);
				$day  = temizle($_POST["day"]);
				$dyil = temizle($_POST["dyil"]);
				$cinsiyet = temizle($_POST["cinsiyet"]);
				$email = temizle($_POST["email"]);
				$parola = temizle($_POST["parola"]);
				$parola =md5($parola);
				$tel = temizle($_POST["tel"]);
				$il = temizle($_POST["il"]);
				$ilce = temizle($_POST["ilce"]);
				$adres = temizle($_POST["adres"]);
				
				$dtarihi=date("Y-m-d",strtotime($dyil."-".$day."-".$dgun));
				$sorgu="insert into hastalar(isim,tc,dyer,dtarihi,cinsiyet,email,tel,il,ilce,adres,parola)".
				"  values(\"$isim\",\"$tc\",\"$dyer\",\"$dtarihi\",\"$cinsiyet\",\"$email\",\"$tel\",\"$il\",\"$ilce\",\"$adres\",\"$parola\")";
			$sonuc=kaydet($sorgu);
		}else
		{
			$sonuc=hata_mesaji("Boş alanları doldurunuz..");
		}
	}
?>
<div class="randevu">
	<div id="title">
		<h4>Kayıt Ol</h4>
	</div>
	<br/>
	
<?php
 echo $sonuc;
?>

<form action="index.php?sayfa=kayit_ol" method="post">
	<div class="content-input">
		<label>  Adı Soyadı </label>
		<div>
			<input name="isim" type="text" class="inputs" required=""/>	
		</div>
	</div>
					
	<div class="content-input">
		<label>  TC Kimlik No </label>
		<div>
			<input name="tc" type="number" class="inputs"  min="10000000000" max="99999999999" required=""/>	
		</div>
	</div>
					
	<div class="content-input">
		<label>  Doğum Yeri </label>
		<div>
			<input name="dyer" type="text" class="inputs" required=""/>	
		</div>
	</div>
					
	<br/>
					
	<div class="content-input">											
		<label>Doğum Tarihi</label>
		<div>
			<select name="dgun"  style="width:75px ; height:35px;">
			 <?php
				for($i=1;$i<32;$i++){
					echo "<option value=\"".$i."\">$i</option>";
				}
			 ?>
			</select>
	
			<select name="day"  style="width:100px ; height:35px ;">
				<?php
					$aylar =array(1=>"Ocak","Şubat","Mart","Nisan","Mayıs","Haziran",
					"Temmuz","Agustos","Eylül","Ekim","Kasım","Aralık");
					for($i=1;$i<=12;$i++){
						echo "<option value=\"".$i."\">$aylar[$i]</option>";
					}
				?>
			</select>

			<select name="dyil"  style="width:75px ; height:35px; ">
				<?php
					$yil=Date('Y');					
					for($i=$yil;$i > 1930 ;$i--){
						echo "<option value=\"".$i."\">$i</option>";
					}
				?>
			</select>
		</div>			
	</div>
	
	<div class="content-input">
		<label>  Cinsiyet </label>
		<div>
			<input type="radio"   checked="checked" name="cinsiyet" value="0"/> Bay
			<input type="radio"  name="cinsiyet" value="1"/> Bayan
		</div>
	</div>
	<br /><br />
	
	<div class="content-input">
		<label>  Email Addresi </label>
		<div>
			<input name="email" type="email" class="inputs"  required=""/>
		</div>
	</div>

	<div class="content-input">
		<label>  Parola </label>
		<div>
			<input name="parola" type="password" class="inputs"  required=""/>
		</div>
	</div>
	<br/>
	
	<div class="content-input">
		<label>  Telfon Numarası </label>
		<div>
			<input name="tel" type="text" class="inputs"/>
		</div>
	</div>

	<div class="content-input">											
		<label > Yaşadığı il</label>
		<div>
			<input name="il" type="text" class="inputs"/>
		</div>  				
	</div>  

	<div class="content-input">											
		<label> Yaşadığı ilce</label>
		<div >
			<input name="ilce" type="text" class="inputs"/>
		</div> 			
	</div>  

	<div class="content-input">											
		<label>Adres </label>
		<div>
			<input name="adres" type="text" class="inputs"/>
		</div> 				
	</div>  
	<br/> <br/>
	
	<div class="content-actions">
		<label>  </label>
			<input type="submit" name="kaydet" value="Kaydet" id="uye_kaydet" class="btn"/> 
			<input type="reset" id="reserle" class="btn" value="Vazgeç"/>
	</div>
</form>
</div>