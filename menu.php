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
<<<<<<< HEAD
                    <li><a href="<?php echo $home_url; ?>hasil-sgp-2017">Hasil Lengkap</a></li>
					<li><a href="<?php echo $home_url; ?>shio">Shio</a></li>
					<li><a href="<?php echo $home_url; ?>buku-mimpi">Buku Mimpi</a></li>
				</ul>
            </li>
<?php
$admpos = array(1, 2);
=======
<<<<<<< Updated upstream
                    <li><a href="/hasil-togel/sgp-2017.php">Hasil Lengkap</a></li>
					<li><a href="/togel/shio.php">Shio</a></li>
					<li><a href="/togel/buku-mimpi.php">Buku Mimpi</a></li>
				</ul>
            </li>
            <li><a href="#">Lomba 4D</a></li>
            <li><a href="#">Hadiah</a></li>
            <li><a href="/about.php">About</a></li>
=======
                    <li><a href="<?php echo $home_url; ?>hasil-togel/sgp/2017">Hasil Lengkap</a></li>
					<li><a href="<?php echo $home_url; ?>shio">Shio</a></li>
					<li><a href="<?php echo $home_url; ?>buku-mimpi">Buku Mimpi</a></li>
				</ul>
            </li>
			<li><a href="<?php echo $home_url; ?>tebak-skor">Tebak Skor</a></li>
			<li><a href="<?php echo $home_url; ?>livescore">Live Score</a></li>
<?php
$admpos = array(1, 2);
$pageuser[4][1]['link'] = "#";
$pageuser[4][1]['label'] = "Football";
$pageuser[4][1][1]['link'] = "football-setup-adm";
$pageuser[4][1][1]['label'] = "Set Up";
$pageuser[4][1][2]['link'] = "football-match-adm";
$pageuser[4][1][2]['label'] = "Match";
$pageuser[5][1]['link'] = "#";
$pageuser[5][1]['label'] = "Football";
$pageuser[5][1][1]['link'] = "football-match-adm";
$pageuser[5][1][1]['label'] = "Match";
$pageuser[5][1][2]['link'] = "admin-tebak-skor";
$pageuser[5][1][2]['label'] = "Admin Tebak Skor";
>>>>>>> toto-win
if(in_array($get_user['position'], $admpos)){
?>
			<li><a href="<?php echo $home_url; ?>user-list">Daftar User</a></li>
<?php
}
<<<<<<< HEAD
?>
            <li><a href="<?php echo $home_url; ?>syarat-kondisi">Lomba 4D</a></li>
            <li><a href="<?php echo $home_url; ?>about">About</a></li>
			<!-- li><a href="#">Hadiah</a></li>
=======
elseif(array_key_exists($get_user['position'], $pageuser)) {
	foreach($pageuser[$get_user['position']] as $m){
		echo "<li><a href=".$m['link'].">".$m['label']."</a>";
		$smcount = 0;
		foreach($m as $k => $v){
			if(is_numeric($k)){
				$submenu .= "<li><a href='".$v['link']."'>".$v['label']."</a></li>";
				$smcount++;
			}
		}
		if($smcount > 0){
			echo "<ul class='sub-menu'>".$submenu."</ul>";
		}
		echo "</li>";
	}
}
?>
            <li><a href="<?php echo $home_url; ?>syarat-kondisi">Lomba 4D</a></li>
			<li><a href="<?php echo $home_url; ?>live-bola">Nonton Bola</a></li>
            <li><a href="<?php echo $home_url; ?>about">About</a></li>
			<!-- li><a href="#">Hadiah</a></li>
>>>>>>> Stashed changes
>>>>>>> toto-win
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