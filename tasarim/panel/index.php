<?php 
	define('index',true);
	Global $sayfa;
	include_once("functions.php");
	session_kontrol();
	sayfa_bul();
	include_once("header.php");
?>
	<div id="main">
		<?php
			sayfa_getir($sayfa);
		?>
	</div>
	
<?php
	include_once("footer.php");
?>