<div class="container">

	<ul class="tabs">
<?php 
include_once $_SERVER['DOCUMENT_ROOT']."/football_match.php";
$get_league = $football_match->get_league();
$c = 0;
foreach($get_league as $league){
	$cur = $c==0 ? "class='current'" : "";
	echo "<li ".$cur." data-tab='tab-".$league['league_id']."'>".$league['league_name']."</li>";
	$c++;
}
?>
	</ul>
<?php 
$get_match = $football_match->get_match("", "", " order by time asc");
$a = 0;
$hari = array ('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
foreach($get_league as $league){
	$active = $a==0 ? "current" : "";
	echo "<div id='tab-".$league['league_id']."' class='tab-content ".$active."'>
		<div name='league_desc'>
			<img src='".$league['league_icon']."' style='height: 35px; margin-right: 5px;'  />
			<span name='league_name'>".$league['league_name']."</span>
		</div>
		<table class='hasil_bola' cellpadding='0' cellspacing='0'>
			<thead>
				<tr>
					<th colspan='4' align='right'>Home Team</th>
					<th>Score</th>
					<th colspan='2' align='left'>Away Team</th>
				</tr>
			</thead>
			<tbody>";
	$date = "";
	foreach($get_match as $match){
		if($match['league_id'] == $league['league_id']){
			$dt = new DateTime($match['time']);
			if($date!=$dt->format('Y-m-d')){
				echo "<tr class='match_bydate'>
						<td colspan='7'>".$hari[(int)$dt->format('w')].", ".$common->DateToIndo($dt->format('Y-m-d'))."</td>
					</tr>";
				$date=$dt->format('Y-m-d');
			}
			echo "<tr class='match_row' id='".$match['match_id']."'>
					<td style='width: 20px;'>&nbsp;</td>
					<td class='match_time'>".$dt->format('H:i')."</td>
					<td class='home_name'>".$match['home_team_name']."</td>
					<td class='home_icon'><img src='".$match['home_team_icon']."' style='width: 15px;' /></td>
					<td align='center'>".$match['home_score']."&nbsp;-&nbsp;".$match['away_score']."</td>
					<td class='away_icon'><img src='".$match['away_team_icon']."' style='width: 15px;' /></td>
					<td class='away_name'>".$match['away_team_name']."</td>
				</tr>";
		}
	}
	echo "</tbody>
		</table>
	</div>";
	$a++;
}
?>
</div><!-- container -->
<script>
$(document).ready(function(){
	$('ul.tabs li').click(function(){
		var tab_id = $(this).attr('data-tab');
		$('ul.tabs li').removeClass('current');
		$('.tab-content').removeClass('current');
		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
	})
})
</script>
<style>
.container{
	margin: 0 auto;
}
ul.tabs li{
	background: #ededed;
	color: #222;
	display: inline-block;
	padding: 10px 15px;
	cursor: pointer;
}
ul.tabs li.current{
	background: #0087b1;
	color: #222;
}
.tab-content{
	display: none;
	background: #cce4ff;
}
.tab-content.current{
	display: inherit;
}
[name='league_desc'] {
	display: table;
    padding: 10px 10px 0;
}
[name='league_name'] {
	display: table-cell;
    vertical-align: middle;
    font-weight: bold;
}
.hasil_bola {
	width: 100%;
}
.hasil_bola > tbody {
	font-size: 13px;
}
.hasil_bola th, .hasil_bola td {
	padding: 5px;
}
.match_bydate {
	background: linear-gradient(to bottom, #edf1f6 0%,#dde1e6 100%);
    padding-left: 8px;
    border-bottom: 1px solid #ccd0d5;
    border-top: 1px solid #ccd0d5;
}
.match_row {
	background-color: #e3f0ff;
}
.match_time {
	width: 40px;
}
.home_icon, .away_icon {
	width: 15px;
}
.home_name {
	text-align: right;
}
.away_name {
	text-align: left;
}
</style>