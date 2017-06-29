<div id="main_content">
	<form action="<?php echo $home_url."football_match.php"; ?>" id="league_form" name="league_form" method="post" enctype="multipart/form-data">
	<h2 style="background: none; padding: 0 0 5px;">LIGA</h2>
		<input class="login" name="league_name" id="league_name" placeholder="Nama Liga" size="20" type="text" />
		<input type="file" name="league_icon" id="league_icon" />
		<input type="hidden" name="page" value="save_league" />
		<input type="submit" value="SUBMIT" class="tombol_submit" />
	</form>
	<table id="league_list">
		<thead>
			<tr>
				<th>LIGA</th>
				<th>ICON</th>
				<th>ACTION</th>
			</tr>
		</thead>
		<tbody>
<?php
include_once $_SERVER['DOCUMENT_ROOT']."/football_match.php";
$get_league = $football_match->get_league();
foreach($get_league as $league){
	echo "<tr id='".$league['league_id']."'>
		<td>
			<span name='old_league_name'>".$league['league_name']."</span>
			<span name='new_league_name' style='display: none;'>
				<input id='league_name_".$league['league_id']."' value='".$league['league_name']."' />
			</span>
		</td>
		<td name='league_icon'>
			<img src='".$league['league_icon']."' style='height: 35px;' />
			<input type='file' name='new_league_icon' style='display: none;' />
		</td>
		<td>
			<a onclick='edit_league(".$league['league_id'].")'>
				<img src='".$home_url."images/edit-blue.png' style='cursor: pointer;' />
			</a>
			<a onclick='update_league(".$league['league_id'].")' style='display: none;'>
				<img src='".$home_url."images/save-blue.png' style='cursor: pointer;' />
			</a>
			<a onclick='cancel_league(".$league['league_id'].")' style='display: none;'>
				<img src='".$home_url."images/edit-orange.png' style='cursor: pointer;' />
			</a>
			<a onclick='delete_league(".$league['league_id'].")'>
				<img src='".$home_url."images/close-sign.png' style='cursor: pointer;' />
			</a>
		</td>
	</tr>";
}
?>
		</tbody>
	</table>
	<br />
	<form action="<?php echo $home_url."football_match.php"; ?>" id="team_form" name="team_form" method="post" enctype="multipart/form-data">
		<h2 style="background: none; padding: 0 0 5px;">TEAM</h2>
		<input class="login" name="team_name" id="team_name" placeholder="Nama Team" size="20" type="text" />
		<input type="file" name="team_icon" id="team_icon" />
		<input type="hidden" name="page" value="save_team" />
		<input type="submit" value="SUBMIT" class="tombol_submit" />
	</form>
	<table id="team_list">
		<thead>
			<tr>
				<th>TEAM</th>
				<th>ICON</th>
				<th>ACTION</th>
			</tr>
		</thead>
		<tbody>
<?php
$get_team = $football_match->get_team();
foreach($get_team as $team){
	echo "<tr id='".$team['team_id']."'>
		<td>
			<span name='old_team_name'>".$team['team_name']."</span>
			<span name='new_team_name' style='display: none;'>
				<input id='team_name_".$team['team_id']."' value='".$team['team_name']."' />
			</span>
		</td>
		<td name='team_icon'>
			<img src='".$team['team_icon']."' style='height: 35px;' />
			<input type='file' name='new_team_icon' style='display: none;' />
		</td>
		<td>
			<a onclick='edit_team(".$team['team_id'].")'>
				<img src='".$home_url."images/edit-blue.png' style='cursor: pointer;' />
			</a>
			<a onclick='update_team(".$team['team_id'].")' style='display: none;'>
				<img src='".$home_url."images/save-blue.png' style='cursor: pointer;' />
			</a>
			<a onclick='cancel_team(".$team['team_id'].")' style='display: none;'>
				<img src='".$home_url."images/edit-orange.png' style='cursor: pointer;' />
			</a>
			<a onclick='delete_team(".$team['team_id'].")'>
				<img src='".$home_url."images/close-sign.png' style='cursor: pointer;' />
			</a>
		</td>
	</tr>";
}
?>
		</tbody>
	</table>
</div>
<style>
#team_form, #league_form {
	margin: 10px 0;
}
#league_list, #team_list {
	width: 100%;
}
#league_list > thead > tr > th, #team_list > thead > tr > th {
	background-color: #ff4949;
    color: #000;
	padding: 5px;
}
#league_list > tbody > tr:nth-child(odd) > td, #team_list > tbody > tr:nth-child(odd) > td {
	background-color: #fff;
	padding: 5px;
}
#league_list > tbody > tr:nth-child(even) > td, #team_list > tbody > tr:nth-child(even) > td {
	background-color: #e2e2e2;
	padding: 5px;
}
#league_list > tbody > tr > td:nth-child(n+2), #team_list > tbody > tr > td:nth-child(n+2) {
	text-align: center;
	width: 105px;
}
#league_list > tbody > tr > td:last-child > a, #team_list > tbody > tr > td:last-child > a {
	margin: 0 5px;
}
</style>
<script>
function delete_league(league_id){
	var del = confirm("Hapus liga "+$("#league_list tr#"+league_id+" [name='old_league_name']").text()+" ?");
	if(del){
		$.post(window.location.origin+"/football_match.php" , {page: "delete_league", league_id : league_id, ajax: ""}, function(data) {
			alert(data);
			if(data == "deleted"){
				$("#league_list tr#"+league_id).remove();
			}
		});
	}
}
function delete_team(team_id){
	var del = confirm("Hapus team "+$("#team_list tr#"+team_id+" [name='old_team_name']").text()+" ?");
	if(del){
		$.post(window.location.origin+"/football_match.php" , {page: "delete_team", team_id : team_id, ajax: ""}, function(data) {
			alert(data);
			if(data == "deleted"){
				$("#team_list tr#"+team_id).remove();
			}
		});
	}
}
function edit_league(league_id){
	$("#league_list tr#"+league_id+" [name='old_league_name']").hide();
	$("#league_list tr#"+league_id+" [name='new_league_name']").show();
	$("#league_list tr#"+league_id+" [name='league_icon'] img").hide();
	$("#league_list tr#"+league_id+" [name='league_icon'] [name='new_league_icon']").show();
	$("#league_list tr#"+league_id+" td:last-child a:first-child").hide();
	$("#league_list tr#"+league_id+" td:last-child a:nth-child(n+2):not(:last-child)").show();
}
function edit_team(team_id){
	$("#team_list tr#"+team_id+" [name='old_team_name']").hide();
	$("#team_list tr#"+team_id+" [name='new_team_name']").show();
	$("#team_list tr#"+team_id+" [name='team_icon'] img").hide();
	$("#team_list tr#"+team_id+" [name='team_icon'] [name='new_team_icon']").show();
	$("#team_list tr#"+team_id+" td:last-child a:first-child").hide();
	$("#team_list tr#"+team_id+" td:last-child a:nth-child(n+2):not(:last-child)").show();
}
function cancel_league(league_id){
	$("#league_list tr#"+league_id+" [name='old_league_name']").show();
	$("#league_list tr#"+league_id+" [name='new_league_name']").hide();
	$("#league_list tr#"+league_id+" [name='league_icon'] img").show();
	$("#league_list tr#"+league_id+" [name='league_icon'] [name='new_league_icon']").hide();
	$("#league_list tr#"+league_id+" td:last-child a:first-child").show();
	$("#league_list tr#"+league_id+" td:last-child a:nth-child(n+2):not(:last-child)").hide();
}
function cancel_team(team_id){
	$("#team_list tr#"+team_id+" [name='old_team_name']").show();
	$("#team_list tr#"+team_id+" [name='new_team_name']").hide();
	$("#team_list tr#"+team_id+" [name='team_icon'] img").show();
	$("#team_list tr#"+team_id+" [name='team_icon'] [name='new_team_icon']").hide();
	$("#team_list tr#"+team_id+" td:last-child a:first-child").show();
	$("#team_list tr#"+team_id+" td:last-child a:nth-child(n+2):not(:last-child)").hide();
}
function update_league(league_id){
	var new_league_name = $('#league_name_'+league_id).val();
	var old_league_name = $("#league_list tr#"+league_id+" [name='old_league_name']").text();
	var fileform = new FormData();
	if($('#league_list tr#'+league_id+' input[type=file][name="new_league_icon"]').prop('files').length > 0){
		fileform.append("new_league_icon", $('#league_list tr#'+league_id+' input[type=file][name="new_league_icon"]').prop('files')[0]);
	}
	fileform.append("league_name", new_league_name);
	fileform.append("page", "update_league");
	fileform.append("league_id", league_id);
	fileform.append("ajax", "");
	$.ajax({
		url: window.location.origin+"/football_match.php",
		type: 'POST',
		dataType: 'json',
		processData: false, // important
		contentType: false, // important
		data: fileform,
		success: function(result) {
			var msg = "";
			if (typeof result.img != "undefined"){
				msg += result.img;
			}
			alert(msg + " " + result.db);
			location.reload();
			// $("#league_list tr#"+league_id+" td[name='league_icon'] img").attr("src", result.img_src);
			// cancel_league(league_id);
		}
	});
	/* $.post(window.location.origin+"/football_match.php", {page: "update_league", data : fileform, ajax: ""}, function(result) {
		alert(result);
		if(data == "deleted"){
			$("#league_list tr#"+league_id).remove();
		}
	}); */
}
function update_team(team_id){
	var new_team_name = $('#team_name_'+team_id).val();
	var old_team_name = $("#team_list tr#"+team_id+" [name='old_team_name']").text();
	var fileform = new FormData();
	if($('#team_list tr#'+team_id+' input[type=file][name="new_team_icon"]').prop('files').length > 0){
		fileform.append("new_team_icon", $('#team_list tr#'+team_id+' input[type=file][name="new_team_icon"]').prop('files')[0]);
	}
	fileform.append("team_name", new_team_name);
	fileform.append("page", "update_team");
	fileform.append("team_id", team_id);
	fileform.append("ajax", "");
	$.ajax({
		url: window.location.origin+"/football_match.php",
		type: 'POST',
		dataType: 'json',
		processData: false, // important
		contentType: false, // important
		data: fileform,
		success: function(result) {
			var msg = "";
			if (typeof result.img != "undefined"){
				msg += result.img;
			}
			alert(msg + " " + result.db);
			location.reload();
			// $("#team_list tr#"+team_id+" td[name='team_icon'] img").attr("src", result.img_src);
			// cancel_team(team_id);
		}
	});
}
</script>