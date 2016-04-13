<?php
	include_once("functions.php");
	include_once("Ayarlar.php");

	function iletisim_bilgileri()
	{
		Global $baglanti;
		$query="Select * from iletisim_bilgileri";
		$islem=mysql_query($query,$baglanti);
		$iletisim=array("tel1"=>"","tel2"=>"","mail"=>"","fb"=>"","tw"=>"");
		if($islem)
		{
			$satir=mysql_fetch_assoc($islem);
			$iletisim['tel1']=$satir["tel1"];
			$iletisim['tel2']=$satir["tel2"];
			$iletisim['mail']=$satir["mail"];
			$iletisim['fb']=$satir["fb_adres"];
			$iletisim['tw']=$satir["tw_adres"];
		}
		return $iletisim;
	}
	function duyurular($s="")
	{
		$query="";$sonuc="";
		Global $baglanti;
		if($s=="")
		{
			$query ="Select id,baslik,url from duyurular";
		}else{
			$s=temizle($s);
			$query ="Select id,baslik,url from duyurular where baslik like '%".$s."%'";
		}
		$islem = mysql_query($query,$baglanti);
		if(mysql_num_rows($islem) > 0 )
			{
			$sonuc= "<table border='1' id=\"hastalar\">  
					<thead>
					<tr>
						<td class=\"checkbox\"><div class\"dv\"></div></td>
						<td><div class=\"dv\">Başlık</div></td>
						
						<td><div class=\"dv\">URL</div></td>
						<td><div class=\"dv\">İşlemler</div></td>
					</tr>
					</thead>";
				while($satir = mysql_fetch_assoc($islem)){
					$sonuc .= "<tr>
					<td class=\"checkbox\"><div class=\"dv\"><input type=\"checkbox\" name=\"sil[]\" value=\"".$satir["id"]."\"></div></td>
					<td>".$satir["baslik"]."</td>
					<td>".$satir["url"]."</td>
					<td><div class=\"dv\">
						<a href=\"index.php?sayfa=ayarlar&duyuru_id=".$satir["id"]."\" title=\"Düzenle\">
						<i id=\"icon-duzenle\" class=\"icon-islem\"></i>
						</a>
					</div></td>
                  </td>
					</tr>";
				}
				$sonuc .= "</table><br/>";
				$sonuc .="<input id='sil' type='submit' name='btn_duyuru_sil' value='Seçilenleri Sil' 
				onclick=\"return confirm('Seçilenleri Silinsin mi?')\"/>";
			}
			else{
				$sonuc =hata_mesaji("Sonuc bulunamadı..");
			}
			return $sonuc;
	}
	

	function duyuru($id)
	{
		Global $baglanti;
		$query="Select * from duyurular where id=".$id;
		$islem=@mysql_query($query,$baglanti);
		if($islem)
		{	
			return mysql_fetch_assoc($islem);
		}
		
	}
	
	function poliklinikler($s="")
	{
		$query="";$sonuc="";
		Global $baglanti;
		if($s=="")
		{
			$query ="Select id,bolum_ismi,url from bolumler";
		}else{
			$s=temizle($s);
			$query ="Select id,bolum_ismi,url from bolumler where bolum_ismi like '%".$s."%'";
		}
		$islem = mysql_query($query,$baglanti);
		if(mysql_num_rows($islem) > 0)
			{
			$sonuc= "<table border='1' id=\"hastalar\">  
					<thead>
					<tr>
						<td class=\"checkbox\"><div class\"dv\"></div></td>
						<td><div class=\"dv\">Poliklinil </div></td>
						<td><div class=\"dv\">URL</div></td>
						<td><div class=\"dv\">İşlemler</div></td>
					</tr>
					</thead>";
				while($satir = mysql_fetch_assoc($islem)){
					$sonuc .= "<tr>
					<td class=\"checkbox\"><div class=\"dv\"><input type=\"radio\" name=\"sil\" value=\"".$satir["id"]."\"></div></td>
					<td>".$satir["bolum_ismi"]."</td>
					<td>".$satir["url"]."</td>
					<td><div class=\"dv\">
						<a href=\"index.php?sayfa=ayarlar&pol_id=".$satir["id"]."\" title=\"Düzenle\">
						<i id=\"icon-duzenle\" class=\"icon-islem\"></i>
						</a>
						<a href=\"index.php?sayfa=ayarlar&doktor_ekle=".$satir["id"]."\" title=\"Poliklinik e doktor ekle\">
						<i id=\"icon-ekle\" class=\"icon-islem\"></i>
						</a>
					</div></td>
                  </td>
					</tr>";
				}
				$sonuc .= "</table><br/>";
			}
			else{
				$sonuc =hata_mesaji("Sonuc bulunamadı..");
			}
			return $sonuc;
	}

	function polikinik($id)
	{
		Global $baglanti;
		$query="Select * from bolumler where id=".$id;
		$islem=@mysql_query($query,$baglanti);
		if($islem)
		{	
			$satir=mysql_fetch_assoc($islem);
			return $satir;
		}
	}
	
	function doktorlar($s="")
	{
		$query="";$sonuc="";
		Global $baglanti;
		if($s=="")
		{
			$query ="Select doktor_id,adi,soyadi,email,son_giris_tarihi,Y.yetki from doktorlar LEFT  JOIN yetkiler as Y on doktorlar.yetki=Y.id";
		}else{
			$s=temizle($s);
			$query ="Select doktor_id,adi,soyadi,email,son_giris_tarihi ,Y.yetki from doktorlar".
			" LEFT  JOIN yetkiler as Y on doktorlar.yetki=Y.id  Where  adi like '%".$s."%' or soyadi like '%".$s."%' or email like '%".$s."%'";
		}
		$islem = mysql_query($query,$baglanti);
		if(mysql_num_rows($islem) > 0)
			{
			$sonuc= "<table border='1' id=\"hastalar\">  
					<thead>
					<tr>
						<td class=\"checkbox\"><div class\"dv\"></div></td>
						<td><div class=\"dv\">Doktor </div></td>
						<td><div class=\"dv\">E mail</div></td>
						<td><div class=\"dv\">Son Giriş Tarihi</div></td>
						<td><div class=\"dv\">Yetki</div></td>
						<td><div class=\"dv\">İşlemler</div></td>
					</tr>
					</thead>";
				while($satir = mysql_fetch_assoc($islem)){
					$sonuc .= "<tr>
					<td class=\"checkbox\"><div class=\"dv\"><input type=\"radio\" name=\"sil\" value=\"".$satir["doktor_id"]."\"></div></td>
					<td>".$satir["adi"]." ".$satir["soyadi"]."</td>
					<td>".$satir["email"]."</td>
					<td>".$satir["son_giris_tarihi"]."</td>
					<td>".$satir["yetki"]."</td>
					<td><div class=\"dv\">
						<a href=\"index.php?sayfa=ayarlar&doktor_id=".$satir["doktor_id"]."\" title=\"Düzenle\">
						<i id=\"icon-duzenle\" class=\"icon-islem\"></i>
						</a>
					</div></td>
                  </td>
					</tr>";
				}
				$sonuc .= "</table><br/>";
			}
			else{
				$sonuc =hata_mesaji("Sonuc bulunamadı..");
			}
			return $sonuc;
	}
	
	function doktor($id)
	{
		Global $baglanti;
		$query="Select * from doktorlar where doktor_id=".$id;
		$islem=@mysql_query($query,$baglanti);
		if($islem)
		{	
			return mysql_fetch_assoc($islem);
		}
	}
	
	function doktor_poliklinik($s="")
	{
		$query="";$sonuc="";
		Global $baglanti;
		if($s=="")
		{
			$query ="select DB.id ,D.adi,D.soyadi ,B.bolum_ismi from doktor_bolum as DB,doktorlar as D,bolumler AS B 
			where DB.doktor_id=D.doktor_id and DB.bolum_id=B.id";
		}else{
			$s=temizle($s);
			$query ="select DB.id ,D.adi,D.soyadi ,B.bolum_ismi from doktor_bolum as DB,doktorlar as D,bolumler AS B 
			where DB.doktor_id=D.doktor_id and DB.bolum_id=B.id and (B.bolum_ismi like '%".$s."%' or D.adi like '%".$s."%' or D.adi like '%".$s."%')";
		}
		$islem = mysql_query($query,$baglanti);
		if(mysql_num_rows($islem) > 0 )
			{
			$sonuc= "<table border='1' id=\"hastalar\">  
					<thead>
					<tr>
						<td class=\"checkbox\"><div class\"dv\"></div></td>
						<td><div class=\"dv\">Poliklinik</div></td>
						
						<td><div class=\"dv\">Doktor</div></td>
					</tr>
					</thead>";
				while($satir = mysql_fetch_assoc($islem)){
					$sonuc .= "<tr>
					<td class=\"checkbox\"><div class=\"dv\"><input type=\"radio\" name=\"sil\" value=\"".$satir["id"]."\"></div></td>
					<td>".$satir["bolum_ismi"]."</td>
					<td>".$satir["adi"]."   ".$satir["soyadi"]."</td>
                  </td>
					</tr>";
				}
				$sonuc .= "</table><br/>";
			}
			else{
				$sonuc =hata_mesaji("Sonuc bulunamadı..");
			}
			return $sonuc;
	}

	function doktor_list()
	{
		Global $baglanti;
		$query="Select adi,soyadi,doktor_id from doktorlar ";
		$islem=@mysql_query($query,$baglanti);
		if($islem)
		{	
			return $islem;
		}
	}
	?>