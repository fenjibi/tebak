<?php 
include_once $_SERVER['DOCUMENT_ROOT']."/bet.php";
?>
<input type="text" id="match_date" placeholder="Tanggal" readonly="true" value="<?php echo date('Y-m-d'); ?>" date="<?php echo date('Y-m-d'); ?>" />
<select name="football_match" id="football_match">
	<option value=''>Laegue - Home Team : Away Team</option>
</select>
<select id='home_score'>
	<option value=''>Home</option>
<?php 
for($hs=0; $hs<10; $hs++){
	echo "<option value='".$hs."'>".$hs."</option>";
}
?>
</select>
<select id='away_score'>
	<option value=''>Away</option>
<?php 
for($as=0; $as<10; $as++){
	echo "<option value='".$as."'>".$as."</option>";
}
?>
</select>
<!-- input type="text" id="search_name" placeholder="Username" data="" / -->
<button type="button" id="search_button" value="">CARI</button>
<table id="adm_tebak_skor" border="0" cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th>Username</th>
			<th>Home</th>
			<th>Jawaban</th>
			<th>Away</th>
			<th>899Cash</th>
			<th>JayaBola</th>
			<th>Win</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	/* $tebakan_skor = $bet->get_tebakan_skor();
	foreach($tebakan_skor as $tekor){
		$bet_time = new DateTime($tekor['time']);
		echo "<tr>
			<td>".$common->hide_username($tekor['username'])."</td>
			<td>".$tekor['home_team_name']."</td>
			<td>".$tekor['tebak_home']."&nbsp;:&nbsp;".$tekor['tebak_away']."</td>
			<td>".$tekor['away_team_name']."</td>
			<td name='tebakan_skor_time'>".date_format($bet_time, 'D M j, g:i:sa')."</td>
		</tr>";
	} */
	?>
	</tbody>
</table>
<script>
$(function() {
	// get_match();
	$("#match_date").datepicker( {
		dateFormat: "yy-mm-dd",
		onSelect: function(date) {
            get_match(date);
        }
	});
	$("#search_button").click(function() {
		$("#football_match").attr("mid", $("#football_match").val());
		$("#home_score").attr("score", $("#home_score").val());
		$("#away_score").attr("score", $("#away_score").val());
		get_tebak_skor(1);
	});
});
function get_match(date){
	var data = {
		page : "get_match",
		match_time : date,
		tekor : 1,
		ajax: ""
	};
	$.post(window.location.origin+"/football_match.php", data, function(res) {
		var match_list = "";
		$.each(res, function(index, value) {
			match_list += "<option value='"+value.match_id+"'>"+value.league_name +" - "+value.home_team_name+" : "+value.away_team_name+"</option>";		
		});
		$("#football_match > option:not(:first-child)").remove();
		$("#football_match").append(match_list);
		/* var togel_list = "";
		$.each(data, function(index, value) {
			var set_win = "";
			if(!value.togel_win_id) {
				set_win = "<a onclick='set_toto_winner("+value.bet_id+")'><img src='"+window.location.origin+"/images/champion-crown.png' alt='set win' width='28' style='cursor: pointer;' /></a>";
			}
			togel_list += "<tr betid='"+value.bet_id+"'><td>"+value.bet_id+"</td><td>"+value.time+"</td><td>"+value.username+"</td><td class='tebakan'>"+value.number+"</td><td>"+value.dewahoki_username+"</td><td>"+value.jayabola_username+"</td><td>"+set_win+"</td></tr>";			
		});
		$("#football_match > tbody").html(togel_list);
	}, "json")
	.done(function(){
		var bet_rows = $.ajax({
			type: "POST",
			url: window.location.origin+"/bet.php",
			data: {page: "get_rows_betting", ajax: ""},
			dataType: "json",
			async: false
		}).responseJSON; 
		$.post(window.location.origin+"/bet.php" , {page: "get_rows_betting", ajax: "", search_num : $("#search_button").val(), search_name : $("#search_name").attr("data"), periode : $("#periode").attr("date")}, function(data) {
			$.post(window.location.origin+"/common.php", {page: "pagination", ajax: "", current_page : current_page, total_rows : data.total_rows, row_per_page: 15, func: "get_togel"}, function( pagination ) {
				$("#adm-togel > tbody").append('<tr><td colspan="6"><div align="center">'+pagination+'</div></td></tr>');
			}, "html")
		}, "json")*/
	}, "json");
}
function get_tebak_skor(current_page){
	var data = {
		page : "get_tebakan_skor",
		match_id : $("#football_match").attr("mid"),
		home_score : $("#home_score").attr("score"),
		away_score : $("#away_score").attr("score"),
		current_page : current_page,
		row_per_page: 2,
		ajax: ""
	};
	$.post(window.location.origin+"/bet.php", data, function( rst ) {
		var tebak_skor = "";
		$.each(rst.data, function(index, value) {
			var set_win = "";
			if(!value.tebak_skor_win_id) {
				set_win = "<a onclick='set_tekor_winner("+value.tebakan_skor_id+")'><img src='"+window.location.origin+"/images/champion-crown.png' alt='set win' width='28' style='cursor: pointer;' /></a>";
			}
			tebak_skor += "<tr tekorid='"+value.tebakan_skor_id+"'><td>"+value.username+"</td><td>"+value.home_team_name+"</td><td>"+value.tebak_home+"&nbsp;:&nbsp;"+value.tebak_away+"</td><td>"+value.away_team_name+"</td><td>"+value.dewahoki_username+"</td><td>"+value.jayabola_username+"</td><td>"+set_win+"</td></tr>";			
		});
		$("#adm_tebak_skor > tbody").html(tebak_skor);
	}, "json")
	.done(function(res){
		var paging = {
			page: "pagination",
			current_page: current_page,
			total_rows: res.count,
			row_per_page: 2,
			func: "get_tebak_skor",
			ajax: ""
		};
		$.post(window.location.origin+"/common.php", paging, function(pagination){
			$("#adm_tebak_skor > tbody").append('<tr><td colspan="7"><div align="center">'+pagination+'</div></td></tr>');
		}, "html");
	});
}
function set_tekor_winner(tekor_id){
	var r = confirm("Set "+$("tr[tekorid='"+tekor_id+"'] td:first").text()+" sebagai pemenang ?");
	if(r){
		$.post(window.location.origin+"/bet.php" , {page: "set_tekor_winner", tekor_id : tekor_id, ajax : ""}, function(data) {
			alert(data);
			if(data == "Pemenang berhasil disimpan."){
				$("tr[tekorid='"+tekor_id+"'] td:last").empty();
			}
		});
	}
}
</script>
<style>
#match_date {
    padding: 5px;
    border-radius: 4px;
    margin: 10px 0 10px 10px;
    width: 90px;
}
#football_match {
	padding: 5px;
    border-radius: 4px;
    margin: 10px 0 10px 10px;
    width: 250px;
}
#search_name {
    padding: 5px;
    width: 120px;
    border-radius: 4px;
    margin: 10px 0 10px 10px;
    font-weight: bold;
}
#search_button {
    padding: 5px;
	margin: 10px;
    color: #fff;
    background-color: #000;
    cursor: pointer;
    width: 60px;
}
#home_score, #away_score {
	padding: 5px;
	margin: 10px 0 10px 10px;
	border-radius: 4px;
    font-weight: bold;
}
#adm_tebak_skor {
	width: 100%;
	color: #fff;
}
#adm_tebak_skor > thead > tr > th {
	background-color: #0283ad;
    color: #000;
    padding: 5px;
}
#adm_tebak_skor > tbody {
	font-size: 13px;
}
#adm_tebak_skor > tbody > tr:nth-child(odd):not(:last-child) > td {
	background-color: #363636;
    padding: 5px;
}
#adm_tebak_skor > tbody > tr:nth-child(even):not(:last-child) > td {
	background-color: #4d4d4d;
    padding: 5px;
}
#adm_tebak_skor > tbody > tr:not(:last-child) > td {
    text-align: center;
}
#adm_tebak_skor > tbody > tr:last-child > td > div {
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