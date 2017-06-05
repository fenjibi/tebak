<div id="main_content">
	<table id="togel-winlist">
		<thead>
			<tr>
				<th>Periode</th>
				<th>Username</th>
				<th>Number</th>
			</tr>
		</thead>
		<tbody>
<?php
include $_SERVER['DOCUMENT_ROOT']."/bet.php";
$winner_list = $bet->toto_winner_list();
if(is_array($winner_list)){
	foreach ($winner_list as $wlist){
		echo "<tr towinid='".$wlist['togel_win_id']."'><td>".$wlist['periode']."</td><td>".($get_user['position'] == 2 ? $wlist['username'] : $common->hide_username($wlist['username']))."</td><td class='tebakan'>".$wlist['number']."</td></tr>";
	}
}
?>
		</tbody>
	</table>
</div>
<style>
#togel-winlist {
	width: 100%;
}
#togel-winlist > thead > tr > th {
	background-color: #c6ff00;
    color: #000;
	padding: 5px;
}
#togel-winlist > tbody > tr > td {
	background-color: #fff;
    color: #000;
	font-size: 13px;
    padding: 5px;
	text-align: center;
}
#togel-winlist .tebakan {
	font-weight: bold;
    color: #ff0707;
}
</style>