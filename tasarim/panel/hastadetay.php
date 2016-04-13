<?php
	include_once("functions.php");
	sayfa_erisim_engeli();
	
	$satir =Veri_Cekme($_GET["id"]);
	
?>
<div class="content">
	<div id="title">
		<h4>Hasta  Bilgileri</h4>
	</div>
	<br/>

	<div class="content-input">
		<label>  Adı Soyadı </label>
		<div>
			<?php echo ":".$satir["isim"]; ?>
		</div>
	</div>
					
	<div class="content-input">
		<label>  TC Kimlik No </label>
		<div>
			<?php echo ":".$satir["tc"]; ?>
		</div>
	</div>
					
	<div class="content-input">
		<label>  Doğum Yeri </label>
		<div>
			<?php echo ":".$satir["dyer"]; ?>
		</div>
	</div>
					
	<div class="content-input">											
		<label>Doğum Tarihi</label>
		<div>
			<?php echo ":".$satir["dtarihi"]; ?>
		</div>			
	</div>
	
	<div class="content-input">
		<label>  Cinsiyet </label>
		<div>
			<?php if($satir["isim"]==0)echo ":Bay";else if($satir["isim"]==1) echo ":Bayan";?>
		</div>
	</div>
	
	<div class="content-input">
		<label>  Email Addresi </label>
		<div>
			<?php echo ":".$satir["email"]; ?>
		</div>
	</div>

	<div class="content-input">
		<label>  Telfon Numarası </label>
		<div>
		<?php echo ":".$satir["tel"]; ?>
		</div>
	</div>

	<div class="content-input">											
		<label > Yaşadığı il</label>
		<div>
			<?php echo ":".$satir["il"]; ?>
		</div>  				
	</div>  

	<div class="content-input">											
		<label> Yaşadığı ilçe</label>
		<div >
			<?php echo ":".$satir["ilce"]; ?>
		</div> 			
	</div>  

	<div class="content-input">											
		<label>Adres </label>
		<div>
			<?php echo ":".$satir["adres"]; ?>
		</div> 				
	</div>  
	
	<div class="content-input">											
		<label>Ön Tanı </label>
		<div>
			<?php echo ":".$satir["on_tani"]; ?>
		</div>				
	</div>

	<div class="content-input">											
		<label>Açıklama </label>
		<div>
			<?php echo ":".$satir["aciklama"]; ?>
		</div>				
	</div>
	
	<div class="content-input">											
		<label>Dosyaları </label>
		<div>
			<?php echo "<br/>".dokumanlar(@$_GET["id"]); ?>
		</div>			
	</div>
	<br/> 
	
	<form action="index.php?sayfa=randevular" method="post">
	<div class="content-input">											
		<label>Randevuları </label>
		
		<div>
			<?php echo randevular(@$_GET["id"]); ?>
		</div>	
		
	</div>
	</form>
	<br/> 

</div>