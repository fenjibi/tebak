<?php
include 'config.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<link href="<?php echo $home_url; ?>css/main.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo $home_url; ?>js/jquery-3.1.1.js"></script>
</head>
<body style="min-width:100%;">
<div id="top">
	<img src="<?php echo $home_url; ?>images/logo.png" style="margin:15px;">
</div>
<!-- link href="<?php echo $home_url; ?>css/form.css" media="screen" rel="stylesheet" type="text/css" / -->
<div id="content" style="width:100%">
	<div class="category">PENDAFTARAN</div>
	<div class="daftar" style="padding:20px;">
		<span style="color:#FF0000;">* Harap Mengisi data dengan benar</span>
		<form action="user.php" id="formdaftar" name="formdaftar" method="post">
			<table border="0" cellspacing="0" class="form1" width="950">
				<tbody>
					<tr valign="top">
						<td width="48%">
							<h4>Username</h4>
							<input class="validate[required] labelinput" id="username" name="username" type="text" value="" />
							<h4>Email</h4>
							<input class="validate[custom[email], required] labelinput" id="email" name="email" type="text" value="" />
							<h4>No. Hp</h4>
							<input class="validate[required] labelinput" id="nohp" name="nohp" type="text" value="" />
						</td>
						<td style="padding-left:20px;">
							<h4>Bank</h4>
							<select class="labelinput" id="bank" name="bank">
								<option value="bca">BCA</option>
								<option value="mandiri">MANDIRI</option>
								<option value="bni">BNI</option>
								<option value="danamon">DANAMON</option>
								<option value="bri">BRI</option>
							</select>
							<h4>Account Name</h4>
							<input class="validate[required] labelinput" id="namarek" name="namarek" type="text" value="" />
							<h4>Account No.</h4>
							<input class="validate[required] labelinput" id="norek" name="norek" type="text" value="" />
							<!-- table border="0" cellpadding="0" cellspacing="0">
								<tbody>
									<tr>
										<td>
											<p><br />
												<a href="#" onclick="document.getElementById('captcha').src = '<?php echo $home_url; ?>tools/securimage/securimage_show.php?' + Math.random(); return false">
													<img id="captcha" align="absmiddle" class="mtop20" src="<?php echo $home_url; ?>tools/securimage/securimage_show.php" alt="CAPTCHA Image" />
												</a>
											</p>
										</td>
										<td>
											<span style="font-size:14px;color:#fff;margin: -25px;">&nbsp; &nbsp; *) Type the text</span><br />
											<input type="text" name="captcha_code" size="10" maxlength="6" style="    height: 45px;font-size: 31px;width: 130px;text-align: center;"/>
										</td>
									</tr>
								</tbody>
							</table -->
							<p style="margin-top:15px;text-align: left;">
								<input type="hidden" name="page" value="register">
								<input class="register-button" id="simpan" name="simpan" type="submit" value="" />
							</p>
							<div id="izy-loader" style="display:none;">Loading, please wait ...</div>
							<p>&nbsp;</p>
							<div class="clear">&nbsp;</div>
						</td>
					</tr>
				</tbody>
			</table>
		</form>
		<fieldset id="registrasiSukses" style="display:none; border:none;">
			<h4>Terima Kasih,</h4>
			Pendaftaran anda sudah berhasil, Terima kasih telah berpartisipasi dalam kontes ini.
		</fieldset>
	</div>
	<p>&nbsp;</p>
</div>
</body>
<script type="text/javascript">
$(function() {
	$('#formdaftar').submit(function() {
		if($("#nama").val() == ""){
			alert('Nama belum diisi.');
			return false;
		}
		else if($("#email").val() == ""){
			alert('Email belum diisi.');
			return false;
		}
		else if($("#nohp").val() == ""){
			alert('No HP belum diisi.');
			return false;
		}
		else if($("#url").val() == ""){
			alert('URL website belum diisi.');
			return false;
		}
		else if($("#norek").val() == ""){
			alert('No rekening belum diisi.');
			return false;
		}
		else if($("#namarek").val() == ""){
			alert('Nama rekening belum diisi.');
			return false;
		}
		/* $.ajax({
			type: 'POST',
			data: $(this).serialize(),
			url: $(this).attr('action'),
			success: function(data) {
				$('#mytext').tinymce().setContent('');
			}
		}) */
		// return false;
	});
});

function disableForm(){
	if(jqxhr != null){
		jqxhr.abort();
	}
	document.querySelector("#izy-loader").style.display = "block";
	document.querySelector('[type=submit]').disabled = 'disabled';
	document.querySelector('[type=submit]').style.display = 'none';
}

function enableForm(){
	document.querySelector("#izy-loader").style.display = "none";
	document.querySelector('[type=submit]').disabled = '';
	document.querySelector('[type=submit]').style.display = 'block';
}

var jqxhr = null;
function ajaxValidationCallback(status, form, json, options){
	if (status === true) {
		jqxhr = $.post('query/insert-peserta.php', $('#frmregister').serialize(), function(data){
			var result = $.trim(data);
			if(result == "berhasil"){
				$("#frmregister").fadeOut();
				$("#registrasiSukses").fadeIn();
			}else{
				$("#simpan").removeAttr("disabled");
				alert(data);
				enableForm();
			}
		});
	}else{
		enableForm();
	}

	return false;
}
</script>