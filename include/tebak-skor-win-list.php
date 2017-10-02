<div id="main_content">
	<p style="text-align: center;">
		<span style="font-size:15px; font-weight: bold; text-align: center;">Hadiah Freebet akan otomatis masuk ke ID Jayabola peserta dalam waktu 1x24 jam</span>
	</p>
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
		</tbody>
	</table>
</div>
<script>
$(function() {
	get_tekor_winner_list(1);
})
function get_tekor_winner_list(current_page){
	var data = {
		page : "tekor_winner_list",
		current_page : current_page,
		row_per_page: 20,
		ajax: ""
	};
	$.post(window.location.origin+"/bet.php", data, function( rst ) {
		var tekor_winner_list = "";
		$.each(rst.data, function(index, value) {
			tekor_winner_list += "<tr tekorwinid='"+value.tebak_skor_win_id+"'><td>"+value.match_time+"</td><td>"+value.league_name+"</td><td>"+value.username+"</td><td>"+value.home_team_name+"</td><td>"+value.tebak_home+"&nbsp;:&nbsp;"+value.tebak_away+"</td><td>"+value.away_team_name+"</td></tr>";			
		});
		$("#tekor-winlist > tbody").html(tekor_winner_list);
	}, "json")
	.done(function(res){
		var paging = {
			page: "pagination",
			current_page: current_page,
			total_rows: res.count,
			row_per_page: 20,
			func: "get_tekor_winner_list",
			ajax: ""
		};
		$.post(window.location.origin+"/common.php", paging, function(pagination){
			$("#tekor-winlist > tbody").append('<tr><td colspan="7"><div align="center">'+pagination+'</div></td></tr>');
		}, "html");
	});
}
</script>
<style>
#tekor-winlist {
	width: 100%;
}
#tekor-winlist > thead > tr > th {
	background-color: #c6ff00;
    color: #000;
	padding: 5px;
}
#tekor-winlist > tbody > tr:not(:last-child) > td {
	background-color: #fff;
    color: #000;
	font-size: 13px;
    padding: 5px;
	text-align: center;
}
#tekor-winlist > tbody > tr:last-child > td > div {
	margin: 20px;
}
.pagination li{
	display: inline;
	padding: 6px 10px 6px 10px;
	border: 1px solid #ddd;
	margin-right: -1px;
	background: #FFFFFF;
	box-shadow: inset 1px 1px 5px #F4F4F4;
}
.pagination li a{
	cursor: pointer;
    color: rgb(89, 141, 235);
}
.pagination li.first {
    border-radius: 5px 0px 0px 5px;
}
.pagination li.last {
    border-radius: 0px 5px 5px 0px;
}
.pagination li:hover{
	background: #CFF;
}
.pagination li.active{
	background: #F0F0F0;
	color: #333;
}
</style>