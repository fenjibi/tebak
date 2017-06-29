<?php
/*include 'user.php';
$user = $user->get_user($_COOKIE['uid']);
switch($user['position']){
	case 3:
		$menu = array("Home");
		break;
	default:
		$menu = array("Daftar Tebakan", "Daftar User");
}
if($user['position'] == 3){
	$menu = array("Daftar Tebakan", "BMW", "Toyota");
}
foreach ($page as $plist) {
    if($plist['slug'] == ""){
		echo "<div class='bt menus' style='width: 50px;'><a href='#".$home_url."'><img src='".$home_url."img/home.png' style='padding:5px' /></a></div>";
	}
	else{
		echo "<div class='bt menus'><a href='#".$home_url."?page=".$plist['slug']."'>".$plist['name']."</a></div>";
	}
}
/* while($page = $post->pages_list()){
	if($page['slug'] == ""){
		echo "<div class='bt menus' style='width: 50px;'><a href='".$home_url."'><img src='".$home_url."img/home.png' style='padding:5px' /></a></div>";
	}
	else{
		echo "<div class='bt menus'><a href='".$home_url."?page=".$page['slug']."'>".$page['name']."</a></div>";
	}
} */
?>
<div class="menu-wrap">
    <nav class="menu">
        <ul class="clearfix">
            <li><a href="<?php echo $home_url; ?>">Home</a></li>
			<li>
                <a style="cursor: pointer;">Togel <span class="arrow">&#9660;</span></a>
                <ul class="sub-menu">
                    <li><a href="<?php echo $home_url; ?>hasil-sgp-2017">Hasil Lengkap</a></li>
					<li><a href="<?php echo $home_url; ?>shio">Shio</a></li>
					<li><a href="<?php echo $home_url; ?>buku-mimpi">Buku Mimpi</a></li>
				</ul>
            </li>
<?php
$admpos = array(1, 2);
if(in_array($get_user['position'], $admpos)){
?>
			<li><a href="<?php echo $home_url; ?>user-list">Daftar User</a></li>
<?php
}
?>
            <li><a href="<?php echo $home_url; ?>syarat-kondisi">Lomba 4D</a></li>
            <li><a href="<?php echo $home_url; ?>about">About</a></li>
			<!-- li><a href="#">Hadiah</a></li>
			<li><a href="#">Nonton Bareng</a></li>
			<li><a href="#">FAQ</a></li -->
<?php
/* if(!isset($_COOKIE['uid'])){
	echo "<li><a href='/register'><!-- a onclick='window.open(window.location.origin+\"/daftar\", \"\", \"width=800,height=600\");' -->DAFTAR</a></li>";
} */
?>
        </ul>
    </nav>
</div>