<?php
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https:" : "http:";
$home_url = $protocol."//".$_SERVER['SERVER_NAME']."/";
$home_title = "Info Freebet Bola, Free Chip, Lomba Togel, Live Draw Sgp";
$home_description = "Situs Info Freebet Bola, Free Chip, Lomba Togel, Live Draw Sgp Terbaru Tanpa Deposit. Lomba Togel 4D Dan Kuis Tebak Skor Setiap Hari Gratis";
$home_keywords = "lomba togel, live draw sgp, freebet bola, free chip" ;
$home_webmaster = "7ebSgcUY8uVnlBmZ4H70O_4Aya0To7rUJqb84eEbM0w" ;
$home_footer1 = "Info Freebet Bola, Free Chip, Lomba Togel, Live Draw Sgp" ;
$home_footer2 = "Situs Info Freebet Bola, Free Chip, Lomba Togel, Live Draw Sgp Terbaru Tanpa Deposit. Lomba Togel 4D Dan Kuis Tebak Skor Setiap Hari Gratis" ;

if($_SERVER['SERVER_NAME'] == "www.lombatogel.net"){
	$home_title = "Lomba Togel, Lomba Togel Macau, Lomba Togel 2D, Lomba Sgp";
	$home_description = "Situs Lomba Togel, Lomba Togel Macau, Lomba Togel 2D, Lomba Sgp. Ayo Daftar Sekarang Juga. Hadiah Rp 500.000 Untuk Setiap Pemenang. Daftar Gratis";
	$home_keywords = "lomba togel, lomba togel macau, lomba togel 2D, lomba sgp" ;
	$home_webmaster = "fcOgL4BS5yEINXMbW_Wnb4R50zNJsXjENdPV9_EiR5A" ;
	$home_footer1 = "Lomba Togel, Lomba Togel Macau, Lomba Togel 2D, Lomba Sgp" ;
	$home_footer2 = "Situs Lomba Togel, Lomba Togel Macau, Lomba Togel 2D, Lomba Sgp. Ayo Daftar Sekarang Juga. Hadiah Rp 500.000 Untuk Setiap Pemenang. Daftar Gratis" ;
}
else if($_SERVER['SERVER_NAME'] == "www.hasiltogel.club" || $_SERVER['SERVER_NAME'] == "www.putartogel.com"){
	$home_title = "live draw hasil keluaran togel online 4d singapore dan sgp";
	$home_description = "live result draw hasil keluaran togel online singapore sgp hari ini dan prediksi togel sgp";
	$home_keywords = "sg49, result sgp, togel sgp, togel, togel online, hasil togel, prediksi togel, live sgp, live singapore, live togel, keluaran togel" ;
	$home_webmaster = "p__rognQSX_JxuVyxKcwZSpQcCkj2f3O5IIu6j6UZqo" ;
	$home_footer1 = "live draw hasil keluaran togel online 4d singapore dan sgp" ;
	$home_footer2 = "live result draw hasil keluaran togel online singapore sgp hari ini dan prediksi togel sgp" ;
}

/*
indototo.club
$home_title = "TOGEL - Prediksi Jitu Togel Sgp Sydney Hongkong Hari Ini";
$home_description = "Rumus Prediksi Jitu Togel Sgp, Togel Sydney, Angka Jitu Hk, Bocoran Togel Hongkong Hari Ini";
$home_keywords = "togel, prediksi jitu, prediksi togel, prediksi togel sydney, togel prediksi hk, prediksi togel hongkong, Bocoran Togel, Rumus Togel" ;
$home_webmaster = "X_9E9mceg-ajxBdikwh-m7E3z-Mg3jI7di_vseIb5kE" ;
$home_footer1 = "TOGEL - Prediksi Jitu Togel Sgp Sydney Hongkong Hari Ini" ;
$home_footer2 = "Rumus Prediksi Jitu Togel Sgp, Togel Sydney, Angka Jitu Hk, Bocoran Togel Hongkong Hari Ini" ;
*/



define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'indofree_user');
define('DB_PASSWORD', 'tebaktog3L');
define('DB_DATABASE', 'indofree_bet');
?>