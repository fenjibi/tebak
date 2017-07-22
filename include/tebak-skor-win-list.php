<div id="main_content">
	<table id="tekor-winlist">
		<thead>
			<tr>
				<th>Waktu Pertandingan</th>
				<th>Liga</th>
				<th>Username</th>
				<th>Home</th>
				<th>Jawaban</th>
				<th>Away</th>
			</tr>
		</thead>
		<tbody>
<?php
if (!isset($bet)) {
	include $_SERVER['DOCUMENT_ROOT']."/bet.php";
}
$tekor_winner_list = $bet->tekor_winner_list();
if(is_array($tekor_winner_list)){
	foreach ($tekor_winner_list as $twlist){
		echo "<tr tekorwinid='".$twlist['tebak_skor_win_id']."'>
			<td>".$twlist['match_time']."</td>
			<td>".$twlist['league_name']."</td>
			<td>".($get_user['position'] == 2 ? $twlist['username'] : $common->hide_username($twlist['username']))."</td>
			<td>".$twlist['home_team_name']."</td>
			<td>".$twlist['tebak_home']."&nbsp;:&nbsp;".$twlist['tebak_away']."</td>
			<td>".$twlist['away_team_name']."</td>
		</tr>";
	}
}
?>
		</tbody>
	</table>
</div>
<style>
#tekor-winlist {
	width: 100%;
}
#tekor-winlist > thead > tr > th {
	background-color: #c6ff00;
    color: #000;
	padding: 5px;
}
#tekor-winlist > tbody > tr > td {
	background-color: #fff;
    color: #000;
	font-size: 13px;
    padding: 5px;
	text-align: center;
}
</style>