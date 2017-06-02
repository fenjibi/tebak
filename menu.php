<!-- div class="menu">
	<div align="center">
		<table border="0" cellpadding="0" cellspacing="0" height="100%" width="980">
			<tbody>
				<tr>
					<td align="left">
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
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div align="center">
	<marquee class="text_info" onmouseout="this.start()" onmouseover="this.stop()" scrollamount="6" scrolldelay="1">KARTUQ.ORG AGEN BANDARQ, POKER ONLINE, DOMINO ONLINE, QQ ONLINE</marquee>
</div -->

<div class="menu-wrap">
    <nav class="menu">
        <ul class="clearfix">
            <li><a href="<?php echo $home_url; ?>">Home</a></li>
            <li><a href="<?php echo $home_url; ?>syarat-kondisi">Lomba 4D</a></li>
            <li><a href="<?php echo $home_url; ?>about">About</a></li>
			<!-- li>
                <a href="#">Togel <span class="arrow">&#9660;</span></a>
 
                <ul class="sub-menu">
                    <li><a href="/hasil-togel/sgp-2017.php">Hasil Lengkap</a></li>
					<li><a href="/togel/shio.php">Shio</a></li>
					<li><a href="/togel/buku-mimpi.php">Buku Mimpi</a></li>
				</ul>
            </li>
			<li><a href="#">Hadiah</a></li>
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