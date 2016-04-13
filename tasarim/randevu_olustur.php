<?php 
	include_once("functions.php");
	if(strtolower($_SERVER["HTTP_CONNECTION"]) != "xmlhttprequest")
	{
		Global $baglanti;
		if(@$_GET["islem"]=="doktor_listesi")
		{	$sonuc="";
			$query="Select D.adi,D.soyadi,D.doktor_id from doktorlar AS D,doktor_bolum AS DB 
			where bolum_id=".@$_POST["pol_id"]." and DB.doktor_id=D.doktor_id";
			$islem=mysql_query($query,$baglanti);
			if($islem && mysql_num_rows($islem)>0)
			{	$sonuc .="<option value=''>Doktor Seç</option>";
				while($satir=mysql_fetch_assoc($islem))
				{
					$sonuc .="<option value='".$satir["doktor_id"]."'>".$satir["adi"]."  ".$satir["soyadi"]."</option>";
				}
				echo $sonuc;
			}else
			{
				echo "<option value=''>Doktor Seç</option>";
			}
		}
		if(@$_GET["islem"]=="tarih")
		{
			$sonuc="";
			if(@$_POST["tarih"] > Date("Y-m-d"))
			{
				$query="Select saat from randevu where tarih like '".@$_POST["tarih"].
				"' && doktor_id=".@$_POST["doktor_id"];
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
					echo $sonuc;
				}
			}else
			{
				echo "<option value=''>Seç</option>";
			}
		}
		
		if(@$_GET["islem"]=="kaydet")
		{
			$pol_id=@$_POST["pol_id"];
			$doktor_id=@$_POST["doktor_id"];
			$tarih=@$_POST["tarih"];
			$saat=@$_POST["saat"];
			$sonuc=hata_mesaji("işlem tamamlanamadı...");
			if( $tarih > Date("Y-m-d") && $saat !="")
			{
				$sonuc=randevu_kaydet($pol_id,$doktor_id,$tarih,$saat);
			}else
			{	
				if($tarih > Date("Y-m-d"))
				{
					$sonuc=hata_mesaji("Bu gün için veya geçmiş için randevu oluşturulamaz.");	
				}else if($saat !="")
				{
					$sonuc=hata_mesaji("Saat seçmediniz");
				}
			}
			echo $sonuc;
		}
	}

?>