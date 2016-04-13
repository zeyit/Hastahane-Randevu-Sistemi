<?php
	include_once("functions.php");
	sayfa_erisim_engeli();
	$sonuc="";
	$silme_sonuc="";
	if(@$_POST["btn_sil"])
	{	
		if(@$_POST["sil"])
		{	$sil=$_POST["sil"];
			$silme_sonuc .=sil($sil,"hastalar");
			$silme_sonuc .="<br/>";
		}
	}
	if($s=@$_POST["s"])
		{$sonuc=ara($s);}
	else
		{$sonuc=ara();}
	
?>
<div class="content">
	<div id="title">
		<h4>Hastalar</h4>
	</div>
	<br/>
	
<div class="content-input">
	<div>
		<form method="POST" action="index.php?sayfa=hastalar" style="text-align:center; margin-right:100px;">
			<input name="s" id="s" placeholder="Hasta ara" type="text" value=""/> 
			<input name="ara"  type="submit"  id="ara" value="Ara"/> 
		</form>
		<br/>
		<?php
			echo $silme_sonuc;
		?>
		<form action="index.php?sayfa=hastalar" method="post">
		<?php
			echo $sonuc;
		?>
		</form>
	</div>
</div>
	
</div>