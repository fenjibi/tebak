<body>
<div id="top">
    <div id="topwrap">
	<h1><a href="<?php echo $home_url; ?>">LOMBA TOGEL 4D</a></h1>
	<!-- div id="login_container">
<?php 
if(isset($_COOKIE['uid'])){
	include 'user.php';
	$get_user = $user->get_user($_COOKIE['uid']);
}
/* if(!isset($_COOKIE['uid'])){
?>
		<form method="post" action="user.php">
			<input type="text" id="user_name" name="user_name" class="login" placeholder="Username" size="20">
			<input type="password" id="login_password" name="login_password" class="login" placeholder="Password" size="20">
			<input type="hidden" name="page" value="login">
			<button type="submit" id="login_button" class="login">LOGIN</button>
		</form>
<?php
}
else{
	include 'user.php';
	$get_user = $user->get_user($_COOKIE['uid']);
	echo "Hi, ".$get_user['username']." | <a onclick='logout(".$_COOKIE['uid'].")'>Log Out</a>";
?>
<script>
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
*/ ?>
	</div -->
	<?php include 'menu.php'; ?>
	</div>
</div>