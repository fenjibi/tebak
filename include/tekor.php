<h3>PEMENANG TEBAK SKOR</h3>
<div id="winner" align="center">
	<table id="tekorwinner" cellpadding="0" cellspacing="0">
		<tbody>
<?php 
include_once $_SERVER['DOCUMENT_ROOT']."/bet.php";
$tekor_win_list = $bet->tekor_winner_list();
for($a = 0; $a < 5; $a++){
	echo "<tr>";
	for($b = $a; $b < 10; $b += 5){
		echo "<td>".(empty($tekor_win_list['data']) ? $common->hide_username("") : (empty($tekor_win_list['data'][$b]['username']) ? $common->hide_username("") : $tekor_win_list['data'][$b]['username']))."</td>";
	}
	echo "</tr>";
}
?>
		</tbody>
	</table>
	<span style="float: right; padding: 0 12px 0px 0;">
		<a href="<?php echo $home_url; ?>tebak-skor-win-list">View All</a>
	</span>
</div>
<style>
#winner {
	height: 150px;
}
table#tekorwinner {
	width: 250px;
}
table#tekorwinner > tbody > tr > td {
	width: 50%;
}
</style>