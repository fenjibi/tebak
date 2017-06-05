<?php
if(!isset($_COOKIE['uid'])){
	$submit_tebak = "check_login()";
}
else{
	$submit_tebak = "check_tebak()";
}
?>
<div id="main_content">
    <div id="details" align="center">
	<span class="free">Silahkan masukkan jawaban 4D disini</span>
	    <form style="margin: 14px 0 0 0;">
		<div class="chexbox" style="font-size: 13px;color: #93a3aa;margin-left: 10px;margin-top: 10px;width: 321px;">
		    <input name="chek" id="chek" type="checkbox" /> Saya sudah mengerti <a href="<?php echo $home_url; ?>syarat-kondisi">Syarat & Kondisi</a> lomba ini</div>
		    <br/>
			<input type="text" placeholder="AS" maxlength="1" class="tebak_4d number" id="as">
			<input type="text" placeholder="KOP" maxlength="1" class="tebak_4d number" id="kop">
			<input type="text" placeholder="KEP" maxlength="1" class="tebak_4d number" id="kep">
			<input type="text" placeholder="EK" maxlength="1" class="tebak_4d number" id="ek">
			<input type="button" value="SUBMIT" class="tombol_submit" onclick="<?php echo $submit_tebak; ?>">
		</form>
	</div>
	<div id="response" style="text-align: center;">&nbsp;</div>
</div>
<script>
function check_login(){
	alert("Silahkan login dahulu."); location.href="#side_right";
}
function check_tebak(){
	if($("#chek").is(":not(:checked)")){
		alert('Syarat & Kondisi belum tercentang.');
	}
	else if($("#as").val() == ""){		
		alert('AS belum diisi.');
	}
	else if($("#kop").val() == ""){
		alert('KOP belum diisi.');
	}
	else if($("#kep").val() == ""){
		alert('KEP belum diisi.');
	}
	else if($("#ek").val() == ""){
		alert('EK belum diisi.');
	}
	else{
		var nobet = $("#as").val()+$("#kop").val()+$("#kep").val()+$("#ek").val();
		$.post(window.location.origin+"/bet.php", {page: "betting_toto", nobet: nobet <?php echo (isset($_COOKIE['uid']) ? ', uid: '.$_COOKIE['uid'] : ''); ?>}, function( data ) {
			$("#response").html(data).css("opacity", "1").animate({opacity: 0}, 8000);
			if(data=="Tebakan disimpan. Semoga beruntung."){
				setTimeout( function(){location.reload();}, 6000);
			}
		});
	}
}
</script>