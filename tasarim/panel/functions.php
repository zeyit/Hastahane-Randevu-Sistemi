<?php
	session_start();
	include_once("Ayarlar.php");

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
	Global $sayfa;
		if(!isset($_GET["sayfa"]))
		{
			$sayfa="hastaekle";
		}else
		{
			$sayfa=$_GET["sayfa"];
		}
	}
	
	function sayfa_getir($sayfa)
	{
		if($sayfa=="hastalar")
		{
			include_once("hastalar.php");
		}
		else if($sayfa=="hastadetay")
		{
			include_once("hastadetay.php");
		}
		else if($sayfa=="hastaduzenle")
		{
			include_once("hastaduzenle.php");
		}
		else if($sayfa=="randevular")
		{
			include_once("randevular.php");
		}
		else if($sayfa=="randevuduzenle")
		{
			include_once("randevuduzenle.php");
		}
		else if($sayfa=="laboratuvar")
		{
			include_once("lab.php");
		}
		else if($sayfa=="dokumanlar")
		{
			include_once("dokumanlar.php");
		}
		else if($sayfa=="ajanda")
		{
			include_once("ajanda.php");
		}
		else if($sayfa=="ayarlar")
		{
			include_once("ayarlarim.php");
		}
		else
		{
			include_once("hastaekle.php");
		}
	}
	
	function yetki_kontrol(){
		Global $baglanti;
		$sorgu="Select id from yetkiler where id=".$_SESSION["doktor"]["yetki"];
		$islem=@mysql_query($sorgu,$baglanti);
		if($islem && mysql_num_rows($islem)>0)
		{return false;}
		else{return true;}
	}
	
	function session_kontrol()
	{
		// session atanmamş sa login.php ye yönlendir
		if(!isset($_SESSION["doktor"])){
			header("Location:login.php");
		}
	}
	function temizle($metin)
	{
		$elist=array("'");
		$ylist=array("\"");
		$metin=str_replace($elist,$ylist,$metin);
		return htmlspecialchars($metin);
	}
	function giris_yap($username,$password){
		global $baglanti ;
		$password = md5($password);
		$username=temizle($username);
		$query ="Select * from doktorlar where email =\"".$username."\" and parola =\"".$password."\"";
		
		$sorgu =mysql_query($query, $baglanti);
		$rows = @mysql_num_rows($sorgu);
		
		if( $rows >  0){
		$satir= mysql_fetch_array($sorgu);
		$_SESSION["doktor"]=array("isim"=>$satir["adi"]." ".$satir["soyadi"],"id"=>$satir["doktor_id"],"yetki"=>$satir["yetki"]);
		$query ="Update doktorlar set son_giris_tarihi=\"".date('Y-m-d') ."\" where doktor_id=".$satir["doktor_id"] ;
		
		mysql_query($query, $baglanti);
		return true;
		}else{
		return false;
		}
	}

	/*---------------kaydet---------*/
	function kaydet($sorgu)
	{
		global $baglanti;//    
		$islem = mysql_query($sorgu,$baglanti);
		if($islem){
			$sonuc =bilgi_mesaji("kaydedildi..");
		}else{
			$sonuc =hata_mesaji("kaydedilemedi..");
		}
		return $sonuc;
	}
	
	function ara($s="")
	{
		$query="";$sonuc="";
		Global $baglanti;
		if($s=="")
		{
			$query ="Select id,isim,tc,tel,on_tani from hastalar";
		}else{
			$s=temizle($s);
			$query ="Select id,isim,tc,tel,on_tani from hastalar where isim like '%".$s."%'";
		}
		$islem = mysql_query($query,$baglanti);
		if(mysql_num_rows($islem) >0 )
			{
			$sonuc= "<table border='1' id=\"hastalar\">  
					<thead>
					<tr>
						<td class=\"checkbox\"><div class\"dv\"></div></td>
						<td><div class=\"dv\">Hasta Adı</div></td>
						<td><div class=\"dv\">Tc</div></td>
						<td><div class=\"dv\">Telefon</div></td>
						<td><div class=\"dv\">Hastalık bilgisi</div></td>
						<td><div class=\"dv\">İşlemler</div></td>
					</tr>
					</thead>";
				while($satir = mysql_fetch_assoc($islem)){
					$sonuc .= "<tr>
					<td class=\"checkbox\"><div class=\"dv\"><input type=\"checkbox\" name=\"sil[]\" value=\"".$satir["id"]."\"></div></td>
					<td>".$satir["isim"]."</td>
					<td>".$satir["tc"]."</td>
					<td>".$satir["tel"]."</td>
					<td>".$satir["on_tani"]."</td>
					<td><div class=\"dv\">
						<a href=\"index.php?sayfa=hastaduzenle&id=".$satir["id"]."\" title=\"Düzenle\">
						<i id=\"icon-duzenle\" class=\"icon-islem\"></i>
						</a>
						<a href=\"index.php?sayfa=hastadetay&id=".$satir["id"]."\"  title=\"Detay\">
						<i id=\"icon-detay\" class=\"icon-islem\"></i>
						</a>
						<a href=\"index.php?sayfa=randevular&id=".$satir["id"]."\"  title=\"Randevu Ekle\">
						<i id=\"icon-ekle\" class=\"icon-islem\"></i>
						</a>
					</div></td>
                  </td>
					</tr>";
				}
				$sonuc .= "</table><br/>";
				$sonuc .="<input id='sil' type='submit' name='btn_sil' value='Seçilenleri Sil' 
				onclick=\"return confirm('Seçilenleri Silinsin mi?')\"/>";
			}
			else{
				$sonuc =hata_mesaji("Sonuc bulunamadı..");
			}
			return $sonuc;
	}
	
	function sil($dizi,$tablo){
		global $baglanti;
		$sorgu ="Delete from " .$tablo. " where " ;
		for($i=0;$i<count($dizi)-1;$i++){
			$sorgu .="id=".$dizi[$i]." or ";
		}
		$sorgu .="id=".$dizi[$i];
		
		$islem = mysql_query($sorgu,$baglanti);
		if(@$islem){
			$sonuc =bilgi_mesaji("Seçilen veriler silindi..");
		}else{
			$sonuc =hata_mesaji("Veriler Silinemedi..");
		}
		return $sonuc;
	}
	
	function Veri_Cekme($id)
	{
		Global $baglanti;
		$query="Select * from hastalar where id=".$id;
		$islem =@mysql_query($query,$baglanti);
		if($islem && mysql_num_rows($islem)==1){
			return ($satir=mysql_fetch_assoc($islem));
		}
		else{
			header("Location:index.php");
		}
		
	}
	
	function hasta_listesi()
	{
		Global $baglanti;
		$query="Select id,isim from hastalar";
		$islem =mysql_query($query,$baglanti);
		if($islem && mysql_num_rows($islem) >0)
		{
			return $islem;
		}
	}
	
	function uygun_saatler($tarih){
		Global $baglanti;
		$sonuc="";
		$query="Select saat from randevu where tarih like '".$tarih."' && doktor_id=".$_SESSION["doktor"]["id"];
		$islem =mysql_query($query,$baglanti);
		if($islem)
		{
			$saatler=array();
			$dolu_saatler=array();
			for($i=8;$i<17;$i++){
				$saatler[]=(String)$i.":00";
				if($i==12)
				{continue;}
				$saatler[]=(String)$i.":30";
			}
			
			while($satir=mysql_fetch_assoc($islem))
			{
				$dolu_saatler[]=$satir["saat"];
			}
			$saatler=array_diff($saatler,$dolu_saatler);
			//print_r($saatler);
			for($i=0;$i<count($saatler);$i++)
			{
				if(@$saatler[$i])
				$sonuc .="<option value=\"".$saatler[$i]."\">".$saatler[$i]."</option>";
			}
			return $sonuc;
		}
		
	}
	
	function randevu_kaydet($h_id,$saat,$tarih,$not="")
	{
		Global $baglanti;
		$d_id=$_SESSION["doktor"]["id"];
		$query="Select id from randevu where tarih like '".$tarih."' && saat like '".$saat."' doktor_id=".$d_id;
		if(@mysql_num_rows(@mysql_query($query,$baglanti))==0)
		{
			$query="insert into randevu(hasta_id,saat,tarih,note,doktor_id) values(\"$h_id\",\"$saat\",\"$tarih\",\"$not\",\"$d_id\")";
			if(@mysql_query($query,$baglanti))
			{$sonuc=bilgi_mesaji("kaydedildi.");}
			else{$sonuc=hata_mesaji("kaydedildilmedi.");}
			
		}else{
			$sonuc=hata_mesaji("Seçtiğiniz saat dolu.");
		}
		return $sonuc;
	}
	
	function randevu_guncelle($id,$h_id,$saat,$tarih,$note="")
	{
		Global $baglanti;
		
			$query="Update  randevu set hasta_id=\"$h_id\",saat=\"$saat\",tarih=\"$tarih\",
			note=\"$note\" where id=".$id;
			if(mysql_query($query,$baglanti))
			{$sonuc=bilgi_mesaji("Güncellendi.");}
			else{$sonuc=hata_mesaji("kaydedildilmedi.");}
		return $sonuc;
	}
	
	function randevular($h_id="",$sart=0)
	{
		Global $baglanti;
		$sonuc="";
		$query="Select hastalar.isim,randevu.id,randevu.tarih,randevu.saat,randevu.note 
		from randevu LEFT JOIN hastalar ON randevu.hasta_id=hastalar.id where randevu.doktor_id=".$_SESSION["doktor"]["id"];
		if($h_id !="")
		{
			$query.=" && hasta_id=".$h_id;
		
		}else{
			if($sart==1)
			{
				$query.=" && randevu.tarih  < '".date("Y-m-d")."' ";
			}
			else if($sart==2)
			{
			$query.=" && randevu.tarih  like '".date("Y-m-d")."' ";
			}else if($sart==3)
			{
			$query.=" && randevu.tarih  > '".date("Y-m-d")."' ";
			}
		}
		$query.=" order by randevu.tarih desc";
		$islem = @mysql_query($query,$baglanti);
		if(@mysql_num_rows($islem) >0 )
			{
			$sonuc= "<table border='1' id=\"lab\">  
					<thead>
					<tr>
						<td class=\"checkbox\"><div class\"dv\"></div></td>
						<td><div class=\"dv\">Hasta Adı</div></td>
						<td><div class=\"dv\">Tarih</div></td>
						<td><div class=\"dv\">Saat</div></td>
						<td><div class=\"dv\">Not</div></td>
						<td><div class=\"dv\">İşlem</div></td>
					</tr>
					</thead>";
				while($satir = mysql_fetch_assoc($islem)){
					$sonuc .= "<tr>
					<td class=\"checkbox\"><div class=\"dv\"><input type=\"checkbox\" name=\"sil[]\" value=\"".$satir["id"]."\"></div></td>
					<td>".$satir["isim"]."</td>
					<td>".$satir["tarih"]."</td>
					<td>".$satir["saat"]."</td>
					<td>".$satir["note"]."</td>
					<td><div class=\"dv\">
						<a href=\"index.php?sayfa=randevuduzenle&id=".$satir["id"]."\" title=\"Düzenle\">
						<i id=\"icon-duzenle\" class=\"icon-islem\"></i>
						</a>
					</div></td>
                  </td>
					</tr>";
				}
				$sonuc .= "</table><br/>";
			}else
			{
				$sonuc =bilgi_mesaji("Randevu bulunamadı");
			}
			echo $sonuc;
	}
	
	function lab_veri_sec($id)
	{
		Global $baglanti;
		$sonuc=array();
		$query="Select * from lab where id=".$id;
		$islem =@mysql_query($query,$baglanti);
		if($islem)
		{
			$satir =mysql_fetch_assoc($islem);
			$sonuc[]=$satir["id"];
			$sonuc[]=$satir["hasta_id"];
			$sonuc[]=$satir["aciklama"];
			$sonuc[]=$satir["Glukoz"];
			$sonuc[]=$satir["Ure"];
			$sonuc[]=$satir["Kreatinin"];
			$sonuc[]=$satir["LDL"];
			$sonuc[]=$satir["Trigliserid"];
			$sonuc[]=$satir["Total_Lipid"];
			$sonuc[]=$satir["GAMA"];
			$sonuc[]=$satir["Fosfor"];
			$sonuc[]=$satir["Sodyum"];
			$sonuc[]=$satir["Demir"];
			$sonuc[]=$satir["digerleri"];
		}else{
			header("Location:index.php?sayfa=laboratuvar");
			die();
		}
		return $sonuc;
	}
	
	function lab()
	{
		Global $baglanti;
		$sonuc="<table border='1' id=\"lab\">  
					<thead>
					<tr>
						<td class=\"checkbox\"><div class\"dv\"></div></td>
						<td><div class=\"dv\">Hasta Adı</div></td>
						<td><div class=\"dv\">Açıklama</div></td>
						<td><div class=\"dv\">İşlem</div></td>
					</tr>
					</thead>";
		$query="Select lab.id,hastalar.isim,lab.aciklama from lab LEFT JOIN hastalar ON lab.hasta_id=hastalar.id";
		$islem =mysql_query($query,$baglanti);
		if($islem){
			while($satir = mysql_fetch_assoc($islem))
			{
				$sonuc .="<tr><td class=\"checkbox\"><div class=\"dv\"><input type=\"checkbox\" name=\"sil[]\" value=\"".$satir["id"]."\"></div></td>
					<td>".$satir["isim"]."</td>
					<td>".$satir["aciklama"]."</td>
					<td><div class=\"dv\">
						<a href=\"index.php?sayfa=laboratuvar&islem=Guncelle&id=".$satir["id"]."\" title=\"Düzenle\">
						<i id=\"icon-duzenle\" class=\"icon-islem\"></i>
						</a>
					</td><tr>";
			}
		}
		$sonuc .= "</table><br/>";
		return $sonuc;
	}
	
	function dokumanlar($h_id=""){
		Global $baglanti;
		$query="Select dokumanlar.id,hastalar.isim,dokumanlar.aciklama,dokumanlar.tarih,dokumanlar.dosya from dokumanlar LEFT JOIN hastalar ON dokumanlar.hasta_id=hastalar.id";
		if(@$h_id !="")
		{$query .=" where dokumanlar.hasta_id=".$h_id;}
		$islem =@mysql_query($query,$baglanti);
		if(@mysql_num_rows($islem) >0  && $islem)
		{	$sonuc="<table border='1' id=\"lab\">  
					<thead>
					<tr>
						<td class=\"checkbox\"><div class\"dv\"></div></td>
						<td><div class=\"dv\">Hasta Adı</div></td>
						<td><div class=\"dv\">Açıklama</div></td>
						<td><div class=\"dv\">Dosya</div></td>
						<td><div class=\"dv\">Tarih</div></td>
						<td><div class=\"dv\">İşlem</div></td>
					</tr>
					</thead>";
			while($satir = mysql_fetch_assoc($islem))
			{
				$sonuc .="<tr><td class=\"checkbox\"><div class=\"dv\"><input type=\"checkbox\" name=\"sil[]\" value=\"".$satir["id"]."\"></div></td>
					<td>".$satir["isim"]."</td>
					<td>".$satir["aciklama"]."</td>
					<td><a href='".$satir["dosya"]."'>".$satir["dosya"]."</a></td>
					<td>".$satir["tarih"]."</td>
					<td><div class=\"dv\">
						<a href=\"index.php?sayfa=dokumanlar&islem=Guncelle&id=".$satir["id"]."\" title=\"Düzenle\">
						<i id=\"icon-duzenle\" class=\"icon-islem\"></i>
						</a>
					</td><tr>";
			}
			$sonuc .= "</table><br/>";
		}else{
			$sonuc =bilgi_mesaji("Düküman bulunamadı");
		}
		return $sonuc;
	}
	
	function dokuman_veri_sec($id)
	{
		Global $baglanti;
		$sonuc=array();
		$query="Select * from dokumanlar where id=".$id;
		$islem =mysql_query($query,$baglanti);
		if($islem && mysql_num_rows($islem)==1)
		{	$satir=mysql_fetch_assoc($islem);
			$sonuc[]=$satir["id"];
			$sonuc[]=$satir["hasta_id"];
			$sonuc[]=$satir["dosya"];
			$sonuc[]=$satir["tarih"];
			$sonuc[]=$satir["aciklama"];
		}else{
			header("Location:index.php?sayfa=dokumanlar");
			die();
		}
		return $sonuc;
	}
	function ajanda_veri_sec($id){
		Global $baglanti;
		$sonuc=array();
		$query="Select * from ajanda where id=".$id." && doktor_id=".$_SESSION["doktor"]["id"];
		$islem =mysql_query($query,$baglanti);
		if($islem && mysql_num_rows($islem)==1)
		{	$satir=mysql_fetch_assoc($islem);
			$sonuc[]=$satir["id"];
			$sonuc[]=$satir["baslik"];
			$sonuc[]=$satir["aciklama"];
			$sonuc[]=$satir["baslama_tarihi"];
			$sonuc[]=$satir["bitis_tarihi"];
		}else{
			header("Location:index.php?sayfa=ajanda");
			die();
		}
		return $sonuc;
	}

	function ajanda()
	{
		Global $baglanti;
		$sonuc="<table border='1' id=\"lab\">  
					<thead>
					<tr>
						<td class=\"checkbox\"><div class\"dv\"></div></td>
						<td><div class=\"dv\">Başlık</div></td>
						<td><div class=\"dv\">Açıklama</div></td>
						<td><div class=\"dv\">Başlama Tarihi</div></td>
						<td><div class=\"dv\">Bİtiş Tarihi</div></td>
						<td><div class=\"dv\">İşlem</div></td>
					</tr>
					</thead>";
		$query="Select * from ajanda where doktor_id=".$_SESSION["doktor"]["id"];
		$islem =mysql_query($query,$baglanti);
		if($islem){
			while($satir = mysql_fetch_assoc($islem))
			{
				$sonuc .="<tr><td class=\"checkbox\"><div class=\"dv\"><input type=\"checkbox\" name=\"sil[]\" value=\"".$satir["id"]."\"></div></td>
					<td>".$satir["baslik"]."</td>
					<td>".$satir["aciklama"]."</td>
					<td>".$satir["baslama_tarihi"]."</a></td>
					<td>".$satir["bitis_tarihi"]."</td>
					<td><div class=\"dv\">
						<a href=\"index.php?sayfa=ajanda&islem=Guncelle&id=".$satir["id"]."\" title=\"Düzenle\">
						<i id=\"icon-duzenle\" class=\"icon-islem\"></i>
						</a>
					</td><tr>";
			}
		}
		$sonuc .= "</table><br/>";
		return $sonuc;
	}
?>