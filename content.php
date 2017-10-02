<?php
/* ob_start();
if (empty($_GET['page'])) {
?>
	<div id="main_content">
		<?php include "include/tebak-skor.php"; ?>
	</div>
	<?php include "include/jawaban-togel.php"; ?>
	<?php include "include/input-4d.php"; ?>
<?php
}
else if(file_exists("include/".$_GET['page'].'.php')){
	include "include/".$_GET['page'].'.php';
}
else {
	if($page_data){
		echo $page_data['contents'];
	}
	else{
		echo 'Page not found.';
	}
}
$inc = ob_get_clean(); */
?>
<div id="content">
    <div id="side_left">
	    <?php include "side_left.php"; ?>
	</div>
	<div id="main">
<?php include "banner/main.php";
if (empty($_GET['page'])) {
	if($get_user['position'] == 2){
		include "include/admin-sgp.php";
		include "include/admin-togel.php";
	}
	else {
?>
		<div id="main_content">
			<?php include "include/tebak-skor-highlight.php"; ?>
		</div>
		<?php include "include/jawaban-togel.php"; ?>
		<?php include "include/input-4d.php"; ?>
<?php
	}
}
else if(file_exists("include/".$_GET['page'].'.php')){
	$pageuser[4] = array("football-match-adm", "football-setup-adm");
	$pageuser[5] = array("football-match-adm", "admin-tebak-skor");
	$restricted = 0;
	foreach ($pageuser as $pu){
		if(in_array($_GET['page'], $pu)){
			$restricted = 1;
		}
	}
	if($restricted == 1){
		if(empty($pageuser[$get_user['position']])){
			echo '<script>window.location=window.location.origin;</script>';
		}
		elseif(in_array($_GET['page'], $pageuser[$get_user['position']])){
			include "include/".$_GET['page'].'.php';
		}
		else{
			echo '<script>window.location=window.location.origin;</script>';
		}
	}
	elseif($restricted == 0){
		include "include/".$_GET['page'].'.php';
	}
}
else {
	if($page_data){
		echo $page_data['contents'];
	}
	else{
		echo 'Page not found.';
	}
}
?>
	</div>
	<div id="side_right">
	    <?php include "side_right.php"; ?>
	</div>