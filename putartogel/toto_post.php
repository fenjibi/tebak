<?php
if($_POST['v'] == 'toto'){
	$file = "sgp_toto-json";
}
else if($_POST['v'] == 'fourd'){
	$file = "sgp_4d-json";
}
$live_toto = fopen($_SERVER['DOCUMENT_ROOT'].'/data/'.$file.".php", "w") or die("Unable to open file!");
$toto_data = fwrite($live_toto,$_POST['val']);
fclose($live_toto);
?>