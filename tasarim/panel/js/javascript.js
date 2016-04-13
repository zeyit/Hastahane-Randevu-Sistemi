	var dv1="<div id=\"sonuc\" style=\"background-color:#F0C27B \"><span>";
	var dv2="</span><input type=\"button\" id=\"kapat\" onclick=\"kapat()\" value=\"x\"/></div>";
	function kapat()
	{
		document.getElementById("sonuc").style.display="none";
	}
	

	$(document).ready(function(){
	$("div.title").click(
	   function(){
			$(this).next(".hidden").slideToggle("slow");
		 });

	});
	
	$("#doktor_sil").click( //islem sonucu #doktor_islem_sonuc
	function(){
		
		if(confirm('Seçilen doktor Silinsin mi?'))
		{
			$.ajax({
			type:"POST", 
			url:"silme_islemi.php?islem=doktor_sil",
			data:$("form.doktor").serialize(),
			datatype:"html", 
			beforeSend : function(){ $("#doktor_islem_sonuc").html("Yüleniyor.."); },
			success :function(cevap){ $("#doktor_islem_sonuc").html(cevap);},
			error: function(){ alert("Hata Oluştu "); }
			});
		}
	});
	
	
	$("#poliklinik_sil").click(//islem sonucu #poliklinik_islem_sonuc
	function(){
		if(confirm('Seçilen poliklinik Silinsin mi?'))
		{
			$.ajax({
			type:"POST", 
			url:"silme_islemi.php?islem=poli_sil",
			data:$("form.poliklinik").serialize(),
			datatype:"html", 
			beforeSend : function(){ $("#poliklinik_islem_sonuc").html("Yüleniyor.."); },
			success :function(cevap){ $("#poliklinik_islem_sonuc").html(cevap);},
			error: function(){ alert("Hata Oluştu "); }
			});
		}
	});
	
	$("#doktor_poliklinik_sil").click(//islem sonucu #doktor_poliklinik_islem_sonuc
	function(){
		if(confirm('Seçilen doktoru poliklinikten silinsin mi?'))
		{
			$.ajax({
			type:"POST", 
			url:"silme_islemi.php?islem=doktor_poli_sil",
			data:$("form.doktor_poli").serialize(),
			datatype:"html", 
			beforeSend : function(){ $("#doktor_poliklinik_islem_sonuc").html("Yüleniyor.."); },
			success :function(cevap){ $("#doktor_poliklinik_islem_sonuc").html(cevap);},
			error: function(){ alert("Hata Oluştu "); }
			});
		}
	});
