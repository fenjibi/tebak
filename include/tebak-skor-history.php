<?php 
include_once $_SERVER['DOCUMENT_ROOT']."/bet.php";
?>
<input type="text" id="match_date" placeholder="Tanggal" readonly="true" value="<?php echo date('Y-m-d'); ?>" date="<?php echo date('Y-m-d'); ?>" />
<select name="football_match" id="football_match">
	<option value=''>Laegue - Home Team : Away Team</option>
</select>
<button type="button" id="search_button" value="">CARI</button>
<div id="main_content" style="overflow-y: scroll;height: 850px;">
	<table id="tebak_skor_history" border="0" cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th>NAMA</th>
				<th>HOME</th>
				<th>JAWABAN</th>
				<th>AWAY</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>
<script>
$(function() {
	$("#match_date").datepicker( {
		dateFormat: "yy-mm-dd",
		maxDate: new Date(),
		onSelect: function(date) {
            get_match(date);
        }
	});
	$("#search_button").click(function() {
		$("#football_match").attr("mid", $("#football_match").val());
		get_tebak_skor();
	});
});
function get_match(date){
	var data = {
		page : "get_match",
		match_time : date,
		tekor : 1,
		ajax: ""
	};
	$.ajax({
		type: "POST",
		url: window.location.origin+"/football_match.php",
		data: data,
		dataType: "json",
		crossDomain: true,
		success: function (res) {
			var match_list = "";
			$.each(res, function(index, value) {
				match_list += "<option value='"+value.match_id+"'>"+value.league_name +" - "+value.home_team_name+" : "+value.away_team_name+"</option>";		
			});
			$("#football_match > option:not(:first-child)").remove();
			$("#football_match").append(match_list);	
		}
	});
	/* $.post("http://indofreebet.net/football_match.php", data, function(res) {
		var match_list = "";
		$.each(res, function(index, value) {
			match_list += "<option value='"+value.match_id+"'>"+value.league_name +" - "+value.home_team_name+" : "+value.away_team_name+"</option>";		
		});
		$("#football_match > option:not(:first-child)").remove();
		$("#football_match").append(match_list);		
	}, "json"); */
}
function get_tebak_skor(){
	var data = {
		page : "get_tebakan_skor",
		match_id : $("#football_match").attr("mid"),
		time_limit : $("#match_date").val(),
		order_by : " order by ts.time asc",
		ajax: ""
	};
	$.post(window.location.origin+"/bet.php", data, function( rst ) {
		var tebak_skor = "";
		$.each(rst.data, function(index, value) {
			tebak_skor += "<tr><td>"+value.username+"</td><td>"+value.home_team_name+"</td><td>"+value.tebak_home+"&nbsp;:&nbsp;"+value.tebak_away+"</td><td>"+value.away_team_name+"</td><td>"+value.tekor_time_format+"</td></tr>";			
		});
		$("#tebak_skor_history > tbody").html(tebak_skor);
	}, "json");
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
#search_button {
    padding: 5px;
	margin: 10px;
    color: #fff;
    background-color: #000;
    cursor: pointer;
    width: 60px;
}
#tebak_skor_history {
	width: 100%;
	color: #fff;
}
#tebak_skor_history > thead > tr > th {
	background-color: #0283ad;
    color: #000;
    padding: 5px;
}
#tebak_skor_history > tbody {
	font-size: 13px;
}
#tebak_skor_history > tbody > tr:nth-child(odd) > td {
	background-color: #363636;
    padding: 5px;
}
#tebak_skor_history > tbody > tr:nth-child(even) > td {
	background-color: #4d4d4d;
    padding: 5px;
}
#tebak_skor_history > tbody > tr > td:not(:first-child) {
    text-align: center;
}
#tebak_skor_history > tbody > tr > td:last-child {
    color: #838383;
    text-align: right;
}
</style>