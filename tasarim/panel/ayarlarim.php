<?php
	include_once("functions.php");
	include_once("functions_ayarlar.php");
	sayfa_erisim_engeli();
	
	if(yetki_kontrol())
	{
		echo "<script> alert('Bu sayfaya erişme yetkiniz yok'); </script>";
		header("refresh:1;url=index.php");
		die();
	}
	$sonuc="";
	
	if(@$_POST["iletisim_kaydet"])
	{
		$tel1=$_POST['tel1']; $tel2=$_POST['tel2']; $email=$_POST['mail'];
		$fb=$_POST['fb_adres'];$tw=$_POST['tw_adres'];
		$query="update iletisim_bilgileri set ".
			"tel1= \"$tel1\",tel2=\"$tel2\",mail=\"$email\",fb_adres=\"$fb\",tw_adres=\"$tw\"";
		$sonuc =kaydet($query);
	}
	else if(@$_POST["doktor_kaydet"])
	{
		$adi=temizle($_POST["adi"]);
		$soyadi=temizle($_POST["soyadi"]);
		$email=temizle($_POST["email"]);
		$parola=md5($_POST["parola"]);
		$yetki =$_POST["yetki"];
		$query="insert into doktorlar(adi,soyadi,email,parola,yetki) value(\"$adi\",\"$soyadi\",\"$email\",\"$parola\",\"$yetki\")";
		$sonuc=kaydet($query);
	}
	else if(@$_POST["duyuru_kaydet"])
	{
			$baslik=temizle(@$_POST["baslik"]);
			$ayrinti=temizle(@$_POST["ayrinti"]);
			$url=temizle(@$_POST["resim"]);
			if(@$_FILES["resim"]["name"] =="")
			{
				$url="";
			}else{
				$yuklenecek_dosya =basename($_FILES['resim']['name']);

				if (!move_uploaded_file($_FILES['resim']['tmp_name'], "/$yuklenecek_dosya"))
				{
					$sonuc=hata_mesaji("Dosya yükleme başarısız oldu!");
				}
				$url=$yuklenecek_dosya;
			}
				$query="insert into duyurular(baslik,ayrinti,url) value(\"$baslik\",\"$ayrinti\",\"$url\")";
				$sonuc.=kaydet($query);
	}
	else if(@$_POST["pol_kaydet"])
	{
			$baslik=temizle(@$_POST["baslik"]);
			$aciklama=temizle(@$_POST["aciklama"]);
			$icerik=temizle(@$_POST["icerik"]);
			$url="";
			if(@$_FILES["resim"]["name"] =="")
			{
				$url="";
			}else
			{
				$yuklenecek_dosya =basename($_FILES['resim']['name']);
				if ((move_uploaded_file($_FILES['resim']['tmp_name'], "../resim/$yuklenecek_dosya")));
				else
				{	$sonuc=hata_mesaji("Dosya yükleme başarısız oldu!");}
				$url="../resim/$yuklenecek_dosya";
			}
				$query="insert into bolumler(bolum_ismi,bilgi,url,bilgi_detay) value(\"$baslik\",\"$aciklama\",\"$url\",\"$icerik\")";
				$sonuc.=kaydet($query);
	}
	else if(@$_POST["poli_guncelle"])
	{
		$baslik=temizle(@$_POST["bolum_ismi"]);
		
		$aciklama=temizle(@$_POST["bilgi"]);
		$icerik=temizle(@$_POST["bilgi_detay"]);
		$url="";
		if(@$_FILES["resim"]["name"] =="")
		{
			$url=temizle($_POST["d_yol"]);
		}else
		{
			$yuklenecek_dosya =basename($_FILES['resim']['name']);
			if ((move_uploaded_file($_FILES['resim']['tmp_name'], "../resim/$yuklenecek_dosya")));
			else
			{	$sonuc=hata_mesaji("Dosya yükleme başarısız oldu!");}
			$url="../resim/$yuklenecek_dosya";
		}
			$query="update bolumler set bolum_ismi=\"$baslik\",bilgi=\"$aciklama\",url=\"$url\",bilgi_detay=\"$icerik\" where id=".$_POST["id"];
			$sonuc.=kaydet($query);
	}
	else if(@$_POST["doktor_guncelle"])
	{
		$id=$_POST["id"];
		$adi=temizle($_POST["adi"]);
		$soyadi=temizle($_POST["soyadi"]);
		$email=temizle($_POST["email"]);
		$parola=md5($_POST["parola"]);
		$yetki =$_POST["yetki"];
		$query="update doktorlar set adi=\"$adi\",soyadi=\"$soyadi\",email=\"$email\",parola=\"$parola\",yetki=\"$yetki\" where doktor_id=".$id;
		$sonuc=kaydet($query);
	}
	else if(@$_POST["duyuru_guncelle"])
	{
		$baslik=temizle(@$_POST["baslik"]);
		$ayrinti=temizle(@$_POST["ayrinti"]);
		$url="";
		if($_FILES["resim"]["name"] =="")
		{
			$url="";
		}else{
			$yuklenecek_dosya =basename($_FILES['resim']['name']);

			if ((move_uploaded_file($_FILES['resim']['tmp_name'], "../resim/$yuklenecek_dosya")));
			else{$sonuc=hata_mesaji("Dosya yükleme başarısız oldu!");}
			$url="../resim/$yuklenecek_dosya";
		}
		$query="update duyurular set baslik=\"$baslik\",ayrinti=\"$ayrinti\",url=\"$url\" where id=".$_POST["id"];
			$sonuc.=kaydet($query);
	}
	else if(@$_POST["btn_duyuru_sil"])
	{
		$sonuc=sil(@$_POST["sil"],"duyurular");
	}else if(@$_POST["poli_doktor_ekle"])
	{
		if(@$_POST["doktor_id"] != "" && @$_POST["polikinik_id"] != "")
		{
			$d_id=$_POST["doktor_id"];
			$b_id=$_POST["polikinik_id"];
			$query ="insert into doktor_bolum(doktor_id,bolum_id) value($d_id,$b_id)";
			$sonuc=kaydet($query);
		}else
		{
			$sonuc=hata_mesaji("Verilerde tutarsızlık var");
		}
	}

	
?>
<div class="content">
<div id="title">
		<h4>Ayarlar</h4>
	</div>
	<br/>
<?php
 echo $sonuc;

 include_once("ayarlarim_ekle.php");
 include_once("ayarlarim_guncelle.php");
 
?>

</div>