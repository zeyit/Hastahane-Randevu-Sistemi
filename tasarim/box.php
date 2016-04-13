<?php
	include_once("functions.php");
	sayfa_erisim_engeli();
	Global $baglanti;
	Global $iletisim_bilgileri;
	if(@$_POST["giris"])
	{
		$email=$_POST["email"];
		$pass =$_POST["parola"];
		giris_yap($email,$pass);
	}
	if(@$_POST["cikis"])
	{
		session_destroy();
		header("Location:index.php");
	}
?>
<div class="box" >
	<div class="img"></div>
	<div class="dvcontent">
		<?php 
		if(@!$_SESSION["uye"]) 
		{ 
				?>
				<div><h3>Login</h3></div>
				<form method="post">
					<div><input type="email" class="giris" name="email" placeholder="E-mail" required/></div>
					<div><input type="password" class="giris" name="parola" placeholder="parola" required/></div>
					<div><input type="submit" name="giris"  value="Giriş" id="btngiris"/></div>
					<div class="clear"></div>
				</form>
				<?php 
				if(@$_POST["giris"])
				{
					echo hata_mesaji("Kullanı adı veya şifre hatalı..");
				}
		}else
			{  
				echo "<div><h3>".$_SESSION["uye"]["isim"]."</h3></div>";
				echo "<form method='POST'>";
				$query="SELECT R.id,B.bolum_ismi,R.tarih,D.adi,D.soyadi FROM 
				randevu AS R,bolumler AS B,doktorlar AS D 
				WHERE D.doktor_id=R.doktor_id && R.bolum_id =B.id && 
				R.hasta_id=".$_SESSION["uye"]["id"]." && R.tarih > ".date("Y-m-d");
				$islem=mysql_query($query,$baglanti);
				if($islem && mysql_num_rows($islem)>0)
					{$i=0;
						while($satir=mysql_fetch_assoc($islem))
						{	$i++;
							echo "<div>Tarih :".$satir["tarih"]."<br/>POliklinik :".$satir["bolum_ismi"].
							"<br/> Doktor : ".$satir["adi"]." ".$satir["soyadi"]."
							</div>";
							if($i==2)
							{break;}
							}
						}
				echo "<div><input type='submit' name='cikis' id='btngiris' value='Çıkış'/></div>";
				echo "</form>";
			}
		?>
	</div>	
</div>
<div class="box" >
	<div class="img"></div>
	<div class="dvcontent">
		<div><h3>Duyurular</h3></div>
			<?php 
				$query="Select baslik,id from duyurular Orders LIMIT 4";
				$islem =mysql_query($query,$baglanti);
				if($islem && mysql_num_rows($islem)> 0)
				{
					while($satir=mysql_fetch_assoc($islem))
						{
							$id=$satir["id"];
							echo "<p><a href=\"index.php?sayfa=duyurular&id=$id\">".$satir["baslik"]."</a></p>";
						}
				}else{
					echo "<div><p>Duyuru Bulunamadı...</p></div>";
				}
			?>
	</div>
</div>
<div class="box" >
	<div class="img"></div>
	<div class="dvcontent">
		<div><h3>iletişim Bilgilerimiz</h3></div>
		<div><p>
			<?php if(@$iletisim_bilgileri["tel1"] !=""){ echo "Tel : ".$iletisim_bilgileri["tel1"];} ?>
		</p></div>
		<div><p>
			<?php if(@$iletisim_bilgileri["tel2"] !=""){ echo "Tel2 : ".$iletisim_bilgileri["tel2"];} ?>
		</p></div>
		<div><p>
			<?php if($iletisim_bilgileri["mail"] !=""){ echo "Mail : ".$iletisim_bilgileri["mail"];} ?>
		</p></div>
	</div>		
</div>
<div class="clear"></div>