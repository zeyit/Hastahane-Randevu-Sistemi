<?php
	include_once("functions.php");
	sayfa_erisim_engeli();
	$liste=hasta_listesi();
	$sonuc="";	$silme_sonuc="";
	$islem="";
	
	$id=-1; $h_id=-1; $aciklama=""; $glikoz=""; $ure=""; $kreatin=""; $ldl="";
	$trigliserin=""; $total_Lipid=""; $gama=""; $fosfor="";
	$sodyum=""; $demir=""; $digerleri="";
	if(@$_GET["islem"]=="Guncelle" && @$_GET["id"])
	{
		$islem="Güncelle";
		$id=@$_GET["id"];
		// verilerideğişkenlere çek
		list($id,$h_id,$aciklama,$glikoz,$ure,$kreatin,$ldl,$trigliserin,$total_Lipid,
		$gama,$fosfor,$sodyum,$demir,$digerleri) =lab_veri_sec($id);
	}else{
		$islem="Ekle";
	}
	
	if(@$_POST["kaydet"])
	{	$id=@$_POST["id"];	$h_id=$_POST["h_id"];	$aciklama=$_POST["aciklama"];
		$glikoz=temizle($_POST["glikoz"]);	$ure=temizle($_POST["ure"]);
		$kreatin=temizle($_POST["kreatin"]);	$ldl=temizle($_POST["ldl"]);
		$trigliserin=temizle($_POST["trigliserin"]);
		$total_Lipid=temizle($_POST["total_Lipid"]);
		$gama=temizle($_POST["gama"]);	$fosfor=temizle($_POST["fosfor"]);
		$sodyum=temizle($_POST["sodyum"]);	$demir=temizle($_POST["demir"]);
		$digerleri=temizle($_POST["digerleri"]);
		$query="";
		if(@$_POST && $id !=0 && $id !="")
		{
			$query="Update lab Set ".
			"hasta_id=\"$h_id\",aciklama=\"$aciklama\",Glukoz=\"$glikoz\",Ure=\"$ure\",Kreatinin=\"$kreatin\",LDL=\"$ldl\",Trigliserid=\"$trigliserin\",
				Total_Lipid=\"$total_Lipid\",GAMA=\"$gama\",Fosfor=\"$fosfor\",Sodyum=\"$sodyum\",Demir=\"$demir\",digerleri=\"$digerleri\" where id=".$id;
		
		}else
		{
			$query="INSERT INTO lab(hasta_id,aciklama,Glukoz,Ure,Kreatinin,LDL,
					Trigliserid,Total_Lipid,GAMA,Fosfor,Sodyum,Demir,digerleri)".
			" VALUES (\"$h_id\",\"$aciklama\",\"$glikoz\",\"$ure\",\"$kreatin\",\"$ldl\",\"$trigliserin\",
				\"$total_Lipid\",\"$gama\",\"$fosfor\",\"$sodyum\",\"$demir\",\"$digerleri\")";
		
		}
		$sonuc=kaydet($query);
	}
	if(@$_POST["btn_sil"])
	{	
		if(@$_POST["sil"])
		{	$sil=$_POST["sil"];
			$silme_sonuc .=sil($sil,"lab");
		}
	}
	
?>

<div class="content">
	<div id="title">
		<h4>Tetkik <?php echo $islem; ?></h4>
	</div>
	<br/>

<?php
 echo $sonuc;
?>
<form action="index.php?sayfa=laboratuvar" method="post">
	<div class="content-input">
		<label>  Hasta Seç </label>
		<div>
			<select name="h_id"  style="width:225px ; height:30px;">
			 <?php
				while($satir=@mysql_fetch_assoc($liste)){
					if($satir["id"] == $h_id)
					{echo "<option selected=\"selected\" value='".$satir["id"]."'>".$satir["isim"]."</option>";}
				else{
					echo "<option value='".$satir["id"]."'>".$satir["isim"]."</option>";
					}
				}
			 ?>
			</select>
		</div>
	</div>
	
	<div class="content-input">											
		<label>Açıklama </label>
		<div>
			<textarea name="aciklama" rows="3" maxlength="200"><?php echo $aciklama; ?></textarea>
		</div>				
	</div>
	<br/> 
	
	<div class="content-input">											
		<label>Tetkikler </label>
		<table border="1" cellpadding="8" id="lab">
		<tr>
			<td>Glikoz</td>
			<td>
				<input type="text" name="glikoz" value="<?php echo $glikoz; ?>"  maxlength="50" />
			</td>
			
			<td>Üre</td>
			<td>
				<input type="text" name="ure" value="<?php echo $ure; ?>" maxlength="50" />
			</td>
		</tr>
		
		<tr>
			<td>Kreatin</td>
			<td>
				<input type="text" name="kreatin" value="<?php echo $kreatin; ?>" maxlength="50" />
			</td>
			
			<td>LDL</td>
			<td>
				<input type="text" name="ldl" value="<?php echo $ldl; ?>"  maxlength="50" />
			</td>
		</tr>
		
		<tr>
			<td>Trigliserin</td>
			<td>
				<input type="text" name="trigliserin" value="<?php echo $trigliserin; ?>" maxlength="50" />
			</td>
			
			<td>Total-Lipid</td>
			<td>
				<input type="text" name="total_Lipid" value="<?php echo $total_Lipid; ?>" maxlength="50" />
			</td>
		</tr>
		
		<tr>
			<td>GAMA</td>
			<td>
				<input type="text" name="gama" value="<?php echo $gama; ?>"  maxlength="50" />
			</td>
			
			<td>Fosfor</td>
			<td>
				<input type="text" name="fosfor" value="<?php echo $fosfor; ?>" maxlength="50" />
			</td>
		</tr>
		
		<tr>
			<td>Sodyum</td>
			<td>
				<input type="text" name="sodyum" value="<?php echo $sodyum; ?>" maxlength="50" />
			</td>
			
			<td>Demir</td>
			<td>
				<input type="text" name="demir" value="<?php echo $demir; ?>" maxlength="50" />
			</td>
		</tr>
		
		<tr>
			<td>Diğerleri</td>
			
			<td colspan="3">
				<textarea  name="digerleri" rows="3" cols="70"><?php echo $digerleri; ?></textarea>
			</td>
		</tr>
		</table>
	</div>
	<br/> 
	<div class="content-actions">
		<label> <input type="hidden" name="id" value="<?php echo $id; ?>"/>  </label>
			<input type="submit" name="kaydet" value="<?php echo $islem; ?>" id="kaydet"  class="btn"/> 
			<input type="reset" id="reserle" class="btn" value="Vazgeç"/>
	</div>
	
</form>

	<div class="content-input">											
			<?php echo $silme_sonuc;?>			
	</div>

	<form action="index.php?sayfa=laboratuvar" method="post">	
	<div class="content-input">											
		<label><h3>Tetkikler </h3> </label>
		<div>
		<br/>
			<?php
			 echo lab(); 
			?>
		</div>				
	</div>
	<div class="content-actions">
		<label>  </label>
			<input id="sil" type="submit" name="btn_sil"" value="Seçilenleri Sil" 
			onclick="return confirm('Seçilenleri Silinsin mi?')"/>
	</div>
	</form>
</div>