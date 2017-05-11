<?php
include("config.php");
$ssql = "SELECT id FROM hasil_togel_sg WHERE tanggal = '".date('Y-m-d')."'";
$sresult = mysql_query($ssql);
$count = mysql_num_rows($sresult);

if($count == 1) {
	$sql = "UPDATE hasil_togel_sg SET nomor='".$_POST['val']."' WHERE tanggal='".date('Y-m-d')."'";
	$result = mysql_query($sql);
	$error = "Updated";
}
else {
	$sql = "INSERT INTO hasil_togel_sg (tanggal, nomor) VALUES ('".date('Y-m-d')."', '".$_POST['val']."')";
	$result = mysql_query($sql);
	if($result) {
		$error = "Inserted";
	}
	else {
		$error = "Error";
	}
}
echo $error;
?>