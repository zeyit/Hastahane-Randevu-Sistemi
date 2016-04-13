<?php
	include_once("panel/Ayarlar.php");
	session_start();
	function sayfa_erisim_engeli()
	{
		if(!defined('index'))
		{  
		die();
		}
	}
	
	function bilgi_mesaji($mesaj)
	{
		return "<div id=\"sonuc\" style=\"background-color:#00BA8B \"><span>".$mesaj."</span>
		<input type=\"button\" id=\"kapat\" onclick=\"kapat()\" value=\"x\"/></div>";
	}
	
	function hata_mesaji($mesaj)
	{
		return "<div id=\"sonuc\" style=\"background-color:#F0C27B \"><span>".$mesaj."</span>
		<input type=\"button\" id=\"kapat\" onclick=\"kapat()\" value=\"x\"/></div>";
	}

	function sayfa_bul()
	{
	 $sayfa;
		if(!isset($_GET["sayfa"]))
		{
			$sayfa="anasayfa";
		}else
		{
			$sayfa=$_GET["sayfa"];
		}
		return $sayfa;
	}
	
	function sayfa_getir($sayfa)
	{
		if(@$_GET["sayfa"]=="randevu")
		{
			include_once("randevu.php");
		}
		else if(@$_GET["sayfa"]=="kayit_ol")
		{
			include_once("kayitol.php");
		}	
		else if(@$_GET["sayfa"]=="duyurular")
		{
			include_once("box.php");
			include_once("duyurular.php");
		}
		else
		{
			include_once("box.php");
			include_once("poliklinik.php");
		}
	}
	
	function randevu_kaydet($pol_id,$d_id,$tarih,$saat)
	{
		Global $baglanti;
		$sonuc="";
		$query="Select id from doktor_bolum where doktor_id=".$d_id." and bolum_id=".$pol_id;
		if(mysql_num_rows(mysql_query($query,$baglanti)) > 0)
		{	
			$h_id=$_SESSION["uye"]["id"];
			$query="Select id from randevu where tarih like '".$tarih."' && saat like '".$saat."' and doktor_id=".$d_id;
			if(@mysql_num_rows(@mysql_query($query,$baglanti))==0)
			{
				$query="insert into randevu(hasta_id,saat,tarih,bolum_id,doktor_id) values(\"$h_id\",\"$saat\",\"$tarih\",\"$pol_id\",\"$d_id\")";
				if(@mysql_query($query,$baglanti))
				{$sonuc=bilgi_mesaji("kaydedildi.");}
				else{$sonuc=hata_mesaji("kaydedildilmedi.");}
				
			}else{
				$sonuc=hata_mesaji("Seçtiğiniz saat dolu.");
			}
			return $sonuc;
		}else
		{
			return hata_mesaji("Verilerinizi kontrol edin...");
		}
	}
	
	
	function temizle($metin)
	{
		return htmlspecialchars($metin);
	}
	
	function giris_yap($username,$password){
		global $baglanti ;
		$password = md5($password);
		$username=temizle($username);
		$query ="Select * from hastalar where email =\"".$username."\" and parola =\"".$password."\"";
		
		$sorgu = @mysql_query($query, $baglanti);
		$rows = @mysql_num_rows($sorgu);
		
		if( $rows ==  1){
		$satir= @mysql_fetch_array($sorgu);
		$_SESSION["uye"]=array("isim"=>$satir["isim"],"id"=>$satir["id"]);
	
		return true;
		}else{
		return false;
		}
	}
	
	function kaydet($query)
	{
		global $baglanti;
		$islem=@mysql_query($query,$baglanti);
		if($islem)
		{
			return bilgi_mesaji("Kayıt tamamlandı...");
		}else{
			return hata_mesaji("işlem tamamlanmadı...");
		}
	}
	
	function session_kontrol()
	{
		if(!isset($_SESSION["uye"])){
			header("Refresh: 5; url=index.php");
			return hata_mesaji("Randvu alabilmek için giriş yapmalısınız.");
		}
		return "";
	}
?>