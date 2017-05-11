<div class="box" style="height: 300px;">
	<h3>Member Area</h3>
	<ul style="width: 100%;">
	<?php
	if(!isset($_COOKIE['uid'])){
	?>
		<li style="background:none">
			<form method="post" action="user.php">
				<input type="text" id="user_name" name="user_name" class="login_regis" placeholder="Username" size="20">
				<input type="password" id="login_password" name="login_password" class="login_regis" placeholder="Password" size="20">
				<input type="hidden" name="page" value="login">
				<button type="submit" id="login_button" class="tombol_login">LOGIN</button>
			</form>
		</li>
		<li><a href="<?php echo $home_url; ?>register" style="font-style: italic;">Daftar</a></li>
		<li><a style='cursor:pointer;' onclick="toggle_resetpass()">Lupa password&nbsp;<span id='navsign'>&or;</span></a></li>
		<li style="display: none;">
			<input type="text" id="username_reset" name="username_reset" class="login" placeholder="Username Reset Password" style="margin: 10px 8px 0; width: 200px;">
			<button type="button" id="resetpass_button" class="tombol_login">RESET PASSWORD</button>
		</li>
	<script>
	function toggle_resetpass(){
		if($("#username_reset").parent("li").is(':visible')){
			$("span#navsign").html("&or;");
			$("#username_reset").parent("li").slideUp();
		}
		else{
			$("span#navsign").html("&and;");
			$("#username_reset").parent("li").slideDown();
		}
	}
	$('#resetpass_button').click(function() {
		if($("#username_reset").val() == ""){
			alert('Username untuk reset password belum diisi.');
		}
		else {
			$.post(window.location.origin+"/user.php", {page: 'reset_password', uname: $('#username_reset').val()}, function( data ) {
				alert(data);
			});
		}
	});
	</script>
	<?php
	}
	else{
		echo "<li class='member_area'><span>Hi, ".$get_user['username']."</span>".
				"<a style='float:right; cursor:pointer;' onclick='logout(".$_COOKIE['uid'].")'>Log&nbsp;Out</a></li>".
			"<li class='member_area'>ID DEWAHOKI : ".$get_user['dewahoki_username']."</li>".
			"<li class='member_area'>ID JAYABOLA : ".$get_user['jayabola_username']."</li>";
	?>
		<li><a style='cursor:pointer;' id='chpass' onclick='toggle_chpass()'>Ubah&nbsp;Password&nbsp;<span id='navsign'>&or;</span></a></li>
		<li style="display: none;">
			<form id="formchpass" name="formchpass">
				<input type="password" id="old-password" name="old-password" class="login" placeholder="Password Lama" size="20">
				<input type="password" id="new-password" name="new-password" class="login" placeholder="Password Baru" size="20">
				<input type="password" id="repassword" name="repassword" class="login" placeholder="Ulangi Password Baru" size="20">
				<input type="hidden" name="page" value="set_user">
				<button type="submit" id="login_button" class="tombol_login" style="margin: 10px 8px 10px 5px; width: 190px;">UBAH</button>
			</form>
		</li>
	<style>
	#formchpass .login {
		margin: 5px;
	}
	</style>
	<script>
	$('#formchpass').submit(function(e) {
		e.preventDefault();
		if($("#old-password").val() == ""){
			alert('Password Lama belum diisi.');
		}
		else if($("#new-password").val() == ""){		
			alert('Password Baru belum diisi.');
		}
		else if($("#new-password").val() != $("#repassword").val()){		
			alert('Password Baru dan Pengulangannya harus sama.');
		}
		else{
			$.post(window.location.origin+"/user.php", $("#formchpass").serialize()+'&uid='+getCookie('uid'), function( data ) {
				alert(data);
				if(data == 'updated'){
					toggle_chpass();
					$("form#formchpass").find("input[type=password]").val("");
				}
				else{
					$("#old-password").select();
				}
				// $("#response").html(data).css("opacity", "1").animate({opacity: 0}, 8000);
			});
		}
	});
	function toggle_chpass(){
		if($("form#formchpass").parent("li").is(':visible')){
			$("span#navsign").html("&or;");
			$("form#formchpass").parent("li").slideUp();
		}
		else{
			$("span#navsign").html("&and;");
			$("form#formchpass").parent("li").slideDown();
		}
	}
	function logout(uid){
		var pdata = {};
		pdata['page'] = 'logout';
		pdata['uid'] = uid;
		$.post("user.php", pdata).done(function() {
			window.location=window.location.origin;
		});
	}
	</script>
	<?php
	}
	?>
	</ul>
</div>