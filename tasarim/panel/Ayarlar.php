<?php
	define("host","localhost");
	define("user","root");
	define("pass","");
	define("db_sec","Hasta_Takip");
	define("dizin","dosyalar");

	$baglanti = @mysql_connect(host,user,pass) or die("Veri tabanı bağlanti hatası");
	$db =@mysql_select_db(db_sec,$baglanti);
?>