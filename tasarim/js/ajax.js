var dv1="<div id=\"sonuc\" style=\"background-color:#F0C27B \"><span>";
var dv2="</span><input type=\"button\" id=\"kapat\" onclick=\"kapat()\" value=\"x\"/></div>";
	

$("#pol_id").change(function(){
		$.ajax({
		type:"POST", 
		url:"randevu_olustur.php?islem=doktor_listesi",
		data:$("form").serialize(),
		datatype:"html", 
		beforeSend : function(){ $("#doktor_id").html("Yükleniyor.."); },
		success :function(cevap){ $("#doktor_id").html(cevap);},
		error: function(){ alert("hata oluştu "); }
	});
});



$("#tarih").change(function(){
	
	if($("#doktor_id").val() !='' && $("#pol_id").val() !='')
	{
		$.ajax({
		type:"POST", 
		url:"randevu_olustur.php?islem=tarih",
		data:$("form").serialize(),
		datatype:"html", 
		beforeSend : function(){ $("#saat").html("Yükleniyor.."); },
		success :function(cevap){ $("#saat").html(cevap);},
		error: function(){ alert("hata oluştu "); }
		});
	}else
	{
		$("#islem_sonuc").html(dv1 + "Doktor veya poliklinik seçmediniz.."+dv2);
	}
});

$("#kaydet").click(function(){
	if($("#doktor_id").val() !='' && $("#pol_id").val() !='' && $("#saat").val !='')
	{
		$.ajax({
		type:"POST", 
		url:"randevu_olustur.php?islem=kaydet",
		data:$("form").serialize(),
		datatype:"html", 
		beforeSend : function(){ 
		$("#islem_sonuc").html(dv1 + "Yükleniyor.."+dv2);
		},
		success :function(cevap){ $("#islem_sonuc").html(cevap);},
		error: function(){ alert("hata oluştu "); }
		});
	}else
	{
			$("#islem_sonuc").html(dv1 + "Boş alanları doldurunuz.."+dv2);
	}
	return false;
});
