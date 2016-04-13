<?php
	$sonuc="";
	if(@$_POST["giris"])
	{	include_once("functions.php");
		if(giris_yap(@$_POST["email"],@$_POST["parola"]))
		{
			header("Location:index.php");
		}else{
			$sonuc=hata_mesaji("Kullanıcı adı veya parola hatalı.");
		}
		
	}

?>
<!doctype html>
<html>
	<head>
		<title> Hasta Takip Sistemi</title>
		<link href="css/style.css" type="text/css" rel="stylesheet" />
		<script type="text/javascript" src="js/javascript.js"></script>
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
		<style>
		 #footer{
			position:absolute;
			bottom:0px;
			margin-left:0px;
			margin-right:0px;
			width:97%;
		 }
		</style>
	</head>
	<body>
		<div id="header">
			<div id="menubar">
				<div class="content">
					<a href="index.php">Hasta Takip Sistemi</a>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	<div id="main">
		<div id="content-login">
			<div><h2>Login</h2></div>
			<div><?php echo $sonuc;?></div>
		<form method="post">
			<div><input type="text" class="giris" name="email" placeholder="E-mail" required/></div>
			<div><input type="password" class="giris" name="parola" placeholder="parola" required/></div>
			<div><input type="checkbox" name="beni_hatirla" id="hatirla"/>Beni hatırla.
			<input type="submit" name="giris" value="Giriş" id="btngiris"/></div>
		</form>
		</div>
	</div>
<?php
	include_once("footer.php");
?>