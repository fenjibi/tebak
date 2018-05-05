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
	<span class="free">MASUKKAN JAWABAN LOMBA TOGEL 4D DISINI (MAX 20 LN)</span>
	    <form style="margin: 14px 0 0 0;">
		<div class="chexbox" style="font-size: 13px;color: #93a3aa;margin-left: 10px;margin-top: 10px;width: 321px;">
		    <input name="chek" id="chek" type="checkbox" /> Saya sudah mengerti <a href="<?php echo $home_url; ?>syarat-kondisi">Syarat & Kondisi</a> lomba ini</div>
<<<<<<< HEAD
=======
		    <br/>
			<input type="text" placeholder="LN 1" maxlength="4" class="tebak_4d number" id="ln1">
			<input type="text" placeholder="LN 2" maxlength="4" class="tebak_4d number" id="ln2">
			<input type="text" placeholder="LN 3" maxlength="4" class="tebak_4d number" id="ln3">
			<input type="text" placeholder="LN 4" maxlength="4" class="tebak_4d number" id="ln4">
			<input type="text" placeholder="LN 5" maxlength="4" class="tebak_4d number" id="ln5">
			<input type="text" placeholder="LN 6" maxlength="4" class="tebak_4d number" id="ln6">
			<input type="text" placeholder="LN 7" maxlength="4" class="tebak_4d number" id="ln7">
			<input type="text" placeholder="LN 8" maxlength="4" class="tebak_4d number" id="ln8">
			<input type="text" placeholder="LN 9" maxlength="4" class="tebak_4d number" id="ln9">
			<input type="text" placeholder="LN 10" maxlength="4" class="tebak_4d number" id="ln10">
			<br/>
			<br/>
			<input type="text" placeholder="LN 11" maxlength="4" class="tebak_4d number" id="ln11">
			<input type="text" placeholder="LN 12" maxlength="4" class="tebak_4d number" id="ln12">
			<input type="text" placeholder="LN 13" maxlength="4" class="tebak_4d number" id="ln13">
			<input type="text" placeholder="LN 14" maxlength="4" class="tebak_4d number" id="ln14">
			<input type="text" placeholder="LN 15" maxlength="4" class="tebak_4d number" id="ln15">
			<input type="text" placeholder="LN 16" maxlength="4" class="tebak_4d number" id="ln16">
			<input type="text" placeholder="LN 17" maxlength="4" class="tebak_4d number" id="ln17">
			<input type="text" placeholder="LN 18" maxlength="4" class="tebak_4d number" id="ln18">
			<input type="text" placeholder="LN 19" maxlength="4" class="tebak_4d number" id="ln19">
			<input type="text" placeholder="LN 20" maxlength="4" class="tebak_4d number" id="ln20">
			<br/>
			<br/>
			<input type="button" value="SUBMIT" class="tombol_submit" onclick="<?php echo $submit_tebak; ?>">
		</form>
	</div>
	<div id="response" style="text-align: center;">&nbsp;</div>
</div>

<!-- div id="main_content">
    <div id="details" align="center">
	<span class="free">MASUKKAN JAWABAN LOMBA TOGEL 4D DISINI (MAX 20 LN)</span>
	    <form style="margin: 14px 0 0 0;">
		<div class="chexbox" style="font-size: 13px;color: #93a3aa;margin-left: 10px;margin-top: 10px;width: 321px;">
		    <input name="chek" id="chek" type="checkbox" /> Saya sudah mengerti <a href="<?php echo $home_url; ?>syarat-kondisi">Syarat & Kondisi</a> lomba ini</div>
>>>>>>> toto-win
		    <br/>
			<input type="text" placeholder="AS" maxlength="1" class="tebak_4d number" id="as">
			<input type="text" placeholder="KOP" maxlength="1" class="tebak_4d number" id="kop">
			<input type="text" placeholder="KEP" maxlength="1" class="tebak_4d number" id="kep">
			<input type="text" placeholder="EK" maxlength="1" class="tebak_4d number" id="ek">
			<input type="button" value="SUBMIT" class="tombol_submit" onclick="<?php echo $submit_tebak; ?>">
		</form>
	</div>
	<div id="response" style="text-align: center;">&nbsp;</div>
</div -->
<script>
function check_login(){
	alert("Silahkan login dahulu."); location.href="#side_right";
}
function check_tebak(){
	var num = [];
	$(".tebak_4d").each(function(i, v){
		if($(this).val().length < 4){
			$(this).val("");
		}
		else {
			if($.inArray($(this).val(), num) === -1){
				num.push($(this).val());
			}
		}
	});
	var nobet = num.join(',');
	if($("#chek").is(":not(:checked)")){
		alert('Syarat & Kondisi belum tercentang.');
	}
	else if(nobet == ""){
		alert('Tidak ada nomor disubmit.');
	}
	else{
<<<<<<< HEAD
		var nobet = $("#as").val()+$("#kop").val()+$("#kep").val()+$("#ek").val();
		$.post(window.location.origin+"/bet.php", {page: "betting_toto", nobet: nobet <?php echo (isset($_COOKIE['uid']) ? ', uid: '.$_COOKIE['uid'] : ''); ?>}, function( data ) {
			$("#response").html(data).css("opacity", "1").animate({opacity: 0}, 8000);
			if(data=="Tebakan disimpan. Semoga beruntung."){
				setTimeout( function(){location.reload();}, 6000);
			}
		});
=======
		if (confirm('Submit no :\n'+nobet)) {
			$.post(window.location.origin+"/bet.php", {page: "betting_toto", nobet: nobet <?php echo (isset($_COOKIE['uid']) ? ', uid: '.$_COOKIE['uid'] : ''); ?>}, function( data ) {
				alert(data);
				if(data.indexOf("Tebakan disimpan. Semoga beruntung.") !== -1){
					location.reload();
				}
			});
		}
>>>>>>> toto-win
	}
}
</script>