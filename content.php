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
			<?php include "include/tebak-skor.php"; ?>
		</div>
		<?php include "include/jawaban-togel.php"; ?>
		<?php include "include/input-4d.php"; ?>
<?php
	}
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
?>
	</div>
	<div id="side_right">
	    <?php include "side_right.php"; ?>
	</div>