<?php
	include_once("functions.php");
	if(strtolower($_SERVER["HTTP_CONNECTION"]) != "xmlhttprequest")
	{	Global $baglanti;
		if(@$_GET["islem"]=="doktor_sil")
		{		
			if(@$_POST["sil"] ==@$_SESSION["doktor"]["id"])
			{
				echo hata_mesaji("Kendinizi silemezsiniz..");
			}
			else if(@$_POST["y_doktor"] && @$_POST["parola"] && @$_POST["sil"])
			{
				if(@$_POST["y_doktor"] !="" && @$_POST["sil"] != "")
				{
					$parola=md5(@$_POST["parola"]);
					$query="Select doktor_id from doktorlar where doktor_id=".$_SESSION["doktor"]["id"]." and parola='".$parola."'";
					$islem=mysql_query($query,$baglanti);
					if(mysql_num_rows($islem) ==1)
					{
						$query="DELETE FROM ajanda WHERE doktor_id=".@$_POST["sil"];
						if(mysql_query($query,$baglanti))
						{
							echo bilgi_mesaji("Ajanda Silindi..");
						}else{
							echo hata_mesaji("Ajanda silinemedi..");
						}
						$query="DELETE from doktorlar where doktor_id=".@$_POST["sil"];
						if(mysql_query($query,$baglanti))
						{
							echo bilgi_mesaji("Kayıt bilgileri Silindi..");
						}else{
							echo hata_mesaji("Kayıt bilgileri silinemedi..");
						}
						$query="DELETE from doktor_bolum where doktor_id=".@$_POST["sil"];
						if(mysql_query($query,$baglanti))
						{
							echo bilgi_mesaji("Poliklinik bilgileri Silindi..");
						}else{
							echo hata_mesaji("Poliklinik bilgileri silinemedi..");
						}
						
						$query="Update randevu set doktor_id=".@$_POST["y_doktor"]." where doktor_id=".@$_POST["sil"];
						if(mysql_query($query,$baglanti))
						{
							echo bilgi_mesaji("Geçerli randevular yönlendirildi..");
						}else{
							echo hata_mesaji("Randevular yeni doktor a yönlendirildi..");
						}
						$query="DELETE from randevu where doktor_id=".@$_POST["sil"] ." and tarih < ".Date("Y-m-d");
						if(mysql_query($query,$baglanti))
						{
							echo bilgi_mesaji("Geçmiş Randevular Silindi..");
						}else{
							echo hata_mesaji("Geçmiş Randevular Silinemedi..");
						}
						/*session silem deneme kodları */
						//ini_set('session.gc_max_lifetime', 1);
						//ini_set('session.gc_probability', 1);
						//ini_set('session.gc_divisor', 1);
						/*-----------------------------------*/
						
						echo "<script> setTimeout(function(){window.location='index.php?sayfa=ayarlar';},4000);</script>";
					}else
					{
						echo hata_mesaji("Şifreyi yanlış girdiniz bu kaydı silemezsiniz..");
					}
				}
			}else if(@$_POST["sil"]){
				if(isset($_POST["y_doktor"]) && @$_POST["y_doktor"]=="")
				{
					echo hata_mesaji("Randevular için doktor seçin..");
				}
				if(isset($_POST["parola"]) &&@$_POST["parola"]=="")
				{
					echo hata_mesaji("Silmek için şifre giriniz..");
				}
				echo  "<div style='	padding:15px;'>";
				echo "<p><span>Doktora ait tüm veriler silinecektir. Geçerli durumdaki randevularını başka bir doktora yönlendirmek için doktor seçim.";
				echo "İşlemi tamamlamak için parola girin.<span></p>";
				echo "<table>";
				echo "<tr>";
				echo "<td><b>Doktor Seç:</b></td>";
				echo  "<td><select name='y_doktor' id='y_doktor' style='width:225px ; height:30px;'>";
				$query="Select adi,soyadi,doktor_id from doktorlar";
				$islem=mysql_query($query,$baglanti);
				if($islem && mysql_num_rows($islem)>0)
				{	echo "<option value=''>Doktor Seç</option>";
					while($satir=mysql_fetch_assoc($islem))
					{
						if($satir["doktor_id"]==$_POST["sil"])
						{continue;}
						echo "<option value='".$satir["doktor_id"]."'>".$satir["adi"]."  ".$satir["soyadi"]."</option>";
					}
				}else
				{
					echo "<option value=''>Doktor Seç</option>";
				}
				echo "</select><br/></td>";
				echo "</tr><tr>";
				echo "<td><b>Parola    :</td><td></b><input name='parola' id='parola' style='width:225px ; height:30px;' type='password'/><br/></td>";
				echo "</tr>";
				echo "</table>";
				echo "</div>";
			}else
			{
				echo hata_mesaji("Lütfen bir kayıt seçin..");
			}
		}
		
		
		if(@$_GET["islem"]=="poli_sil")
		{   $sunuc="";
			if(!@$_POST["sil"])
			{
					$sonuc= hata_mesaji("Poliklinik seçmediniz..");
			}else
			{
				$sil_id=@$_POST["sil"];
				if(@$_POST["parola"] && @$_POST["parola"] !="")
				{
					if(!@$_POST["sil"])
					{
						$sonuc= hata_mesaji("Poliklinik seçmediniz..");
					}else
					{
						if($sil_id !=0)
						{
							$query="Select id from doktor_bolum where bolum_id=".$sil_id;
							$islem=mysql_query($query,$baglanti);
							if($islem)
							{
								if(mysql_num_rows($islem) > 0)
								{
									$sonuc= "Bu polikliniğe bağlı doktorlar var Poliklinik i silmek için <b>Poliklinik-Doktor</b> bölümünden poliklinigi bağlı doktorları silin.";
								}
								else{
									$parola=md5(@$_POST["parola"]);
									$query="Select doktor_id  from doktorlar where doktor_id=".$_SESSION["doktor"]["id"]." and parola='".$parola."'";
									$islem=mysql_query($query,$baglanti);
									if(mysql_num_rows($islem) ==1)
									{
										if(@$_POST["y_poli"] && @$_POST["y_poli"] !="")
										{
											$query="Delete from bolumler where id=".$_POST["sil"];
											if(mysql_query($query,$baglanti))
											{
												$sonuc = bilgi_mesaji("Poliklinik silindi...");
											}else
											{
												$sonuc.=hata_mesaji("Poliklinik silinemedi..");
											}
											$query="update  randevu set bolum_id=".$_POST["y_poli"]."  where bolum_id=".$_POST["sil"];
											if(mysql_query($query,$baglanti))
											{
												$sonuc.= bilgi_mesaji("Randevular güncellendi...");
											}else
											{
												$sonuc.=hata_mesaji("Randevular güncellenemedi ..");
											}
											$query="DELETE from  randevu  where bolum_id=".$_POST["sil"]." and tarih <".Date("Y-m-d");
											if(mysql_query($query,$baglanti))
											{
												$sonuc.= bilgi_mesaji("Geçmiş randevular silindi...");
											}else
											{
												$sonuc.=hata_mesaji("Geçmiş randevular silinemedi ..");
											}
											$sonuc .="<script> setTimeout(function(){window.location='index.php?sayfa=ayarlar';},4000);</script>";
										}else
										{
											$sonuc ="Randevuları yönlendirmek için poliklinik seçmediniz..";
										}
									}else{
										$sonuc ="Parolanız hatalı"; 
									}
									
								}
							}
						}else{
							$sonuc= hata_mesaji("Poliklinik seçmediniz..");
						}
					}
				}else
				{
					$sonuc= "Silme işlemini onaylamak için parolanızı girin.<br/>";
					$sonuc .="Poliklinik e ait geçmiş randevular silinecektir .Geçerli durumdaki randevular yönlendirmek için poliklinik seçin.<br/>";
					$sonuc .= "<b> Parola  &nbsp;&nbsp; &nbsp; :</b> <input type='password' style='padding:2px;' name='parola' /><br/><br/>";
					$sonuc .= "<b> Poliklinik:</b> <select name='y_poli' style='width:175px;height:24px;'>";
					$sonuc .="<option> Poliklinik Seç</option>";
					$query="Select id,bolum_ismi from bolumler";
					$islem=mysql_query($query,$baglanti);
					if($islem && mysql_num_rows($islem) >0)
					{
						while($satir =mysql_fetch_assoc($islem))
						{
							if($satir["id"]==$sil_id)
							{continue;}
							$sonuc .="<option value='".$satir["id"]."'>".$satir["bolum_ismi"]."</option>";
						}
					}
					$sonuc .="</select>";
					
				}
			}
			echo "<div style='padding:15px'>".$sonuc."</div>";
		}
	
		
		if(@$_GET["islem"]=="doktor_poli_sil")
		{
			$sonuc="";
			if(@$_POST["sil"])
			{
				if(@$_POST["parola"])
				{
					$parola=md5($_POST["parola"]);
					$query="Select doktor_id from doktorlar where doktor_id=".$_SESSION["doktor"]["id"]." and parola ='".$parola."'";
					$islem=mysql_query($query,$baglanti);
					if(mysql_num_rows($islem)==1)
					{
						$query="Delete from doktor_bolum where id=".@$_POST["sil"];
						$islem=mysql_query($query,$baglanti);
						if($islem)
						{
							$sonuc=bilgi_mesaji("Kayıt silinmiştir");
							$sonuc .="<script> setTimeout(function(){window.location='index.php?sayfa=ayarlar';},4000);</script>";
						}else{
							$sonuc =hata_mesaji("Seçilen kayıt silinemedi..");
						}
					}else{
						$sonuc =hata_mesaji("Parola hatalı..");
					}
					
				}else
				{
					$sonuc= "Silme işlemini onaylamak için parolanızı girin.<br/>";
					$sonuc .= "<b> Parola    :</b> <input type='password' name='parola' />";
				}
			}else
			{
				$sonuc= hata_mesaji("Silmek için kayıt seçmediniz..");
			}
			echo "<div style='padding:15px'>".$sonuc."</div>";
		}
	}

?>