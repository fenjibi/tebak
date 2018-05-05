<div id="main_content">
<?php 
include_once $_SERVER['DOCUMENT_ROOT']."/football_match.php";
$get_team = $football_match->get_team();
if($get_user['position'] == 4){
	$skor = '';
	$action = '<th>ACTION</th>';
?>
	<form action="<?php echo $home_url."football_match.php"; ?>" id="match_form" name="match_form" method="post">
		<div>
			<input type="text" name="match_date" placeholder="Tanggal" value="<?php echo date("Y-m-d"); ?>" />
			<select name="match_hour">
				<option value=''>Jam</option>
		<?php
		for($h=0; $h<24; $h++){
			$hour = $h < 10 ? "0".$h : $h;
			echo "<option value='".$hour."'>".$hour."</option>";
		}
		?>
			</select>
			<select name="match_minute">
				<option value=''>Menit</option>
		<?php
		for($m=0; $m<60; $m++){
			$minute = $m < 10 ? "0".$m : $m;
			echo "<option value='".$minute."'>".$minute."</option>";
		}
		?>
			</select>
			<select name="match_league">
				<option value=''>League</option>
		<?php
		$get_league = $football_match->get_league();
		foreach($get_league as $league){
			echo "<option value='".$league['league_id']."'>".$league['league_name']."</option>";
		}
		?>
			</select>
			<input type="text" name="match_group" placeholder="Group" />
		</div>
		<div style="margin: 5px;">
			<select name="home_team">
				<option value=''>Home Team</option>
		<?php
		foreach($get_team as $team){
			echo "<option value='".$team['team_id']."'>".$team['team_name']."</option>";
		}
		?>
			</select>&nbsp;-&nbsp;
			<select name="away_team">
				<option value=''>Away Team</option>
		<?php
		foreach($get_team as $team){
			echo "<option value='".$team['team_id']."'>".$team['team_name']."</option>";
		}
		?>
			</select>
			<!-- span class="checkbox">
				<label style="font-size: 1.5em">
					<input type="checkbox" value=""  />
					<span class="cr"><i class="cr-icon fa fa-check"></i></span>
					Tebak Skor
				</label>
			</span -->
			<input type="hidden" name="page" value="save_match" />
			<input type="submit" value="SUBMIT" class="tombol_submit" />
		</div>
	</form>
<?php 
}
elseif($get_user['position'] == 5){
	$skor = '<th>SKOR</th>';
	$action = '<th>&nbsp;</th>';
}
?>
	<table id="match_list">
		<thead>
			<tr>
				<th>WAKTU</th>
				<th>LIGA</th>
				<th>GROUP</th>
				<th>HOME</th>
				<?php echo $skor; ?>
				<th>AWAY</th>
				<?php echo $action; ?>
			</tr>
		</thead>
		<tbody>
<?php 
$get_match = $football_match->get_match("", "past");
foreach($get_match as $match){
	echo "<tr id='".$match['match_id']."'>
		<td name='match_time'>".$match['time']."</td>
		<td name='league_name' idd='".$match['league_id']."'>".$match['league_name']."</td>
		<td name='group'>".$match['match_group']."</td>
		<td name='home_team_name' idd='".$match['home_team_id']."'>".$match['home_team_name']."</td>";
	if($get_user['position'] == 4){
		$act = "<input type='hidden' name='h_highlight' value='".$match['home_highlight']."' />
			<input type='hidden' name='a_highlight' value='".$match['away_highlight']."' />
			<input type='hidden' name='tebak_skor' value='".$match['tebak_skor']."' />
			<a onclick='edit_match(".$match['match_id'].")'>
				<img src='".$home_url."images/edit-blue.png' style='cursor: pointer;' />
			</a>
			<a onclick='delete_match(".$match['match_id'].")'>
				<img src='".$home_url."images/close-sign.png' style='cursor: pointer;' />
			</a>";
	}
	elseif($get_user['position'] == 5){
		echo "<td name='match_score'>
			<input type='text' name='home_score' class='number' value='".$match['home_score']."' />".
			"&nbsp;-&nbsp;".
			"<input type='text' name='away_score' class='number' value='".$match['away_score']."' />
		</td>";
		$act = "<a onclick='update_score(".$match['match_id'].")'>
				<img src='".$home_url."images/update-blue.png' style='cursor: pointer;' />
			</a>";
	}
		echo "<td name='away_team_name' idd='".$match['away_team_id']."'>".$match['away_team_name']."</td>
		<td>".$act."</td>
	</tr>";
}
?>
		</tbody>
	</table>
</div>
<?php
if($get_user['position'] == 4){
?>
<div id="umatch_modal" class="modal">
	<div class="modal-content">
		<div class="modal-header">
			<span class="close">×</span>
			<h3>Edit Match</h3>
		</div>
		<div class="modal-body">
			<div id="highlight_match">
				<input type="text" id="home_highlight" /> : <input type="text" id="away_highlight" />
				<input type="button" value="HIGHLIGHT" class="tombol_red" id="umatch_highlight" style="width: 120px;" onclick="set_highlight();" />
			</div>
			<div>
				<input type="text" name="match_date" id="new_match_date" placeholder="Tanggal" />
				<select name="match_hour" id="new_match_hour">
					<option value=''>Jam</option>
			<?php
			for($h=0; $h<24; $h++){
				$hour = $h < 10 ? "0".$h : $h;
				echo "<option value='".$hour."'>".$hour."</option>";
			}
			?>
				</select>
				<select name="match_minute" id="new_match_minute">
					<option value=''>Menit</option>
			<?php
			for($m=0; $m<60; $m++){
				$minute = $m < 10 ? "0".$m : $m;
				echo "<option value='".$minute."'>".$minute."</option>";
			}
			?>
				</select>
				<select name="match_league" id="new_match_league">
					<option value=''>League</option>
			<?php
			foreach($get_league as $league){
				echo "<option value='".$league['league_id']."'>".$league['league_name']."</option>";
			}
			?>
				</select>
				<input type="text" name="match_group" id="new_match_group" placeholder="Group" />
			</div>
			<div style="margin: 5px;">
				<select name="home_team" id="new_home_team">
					<option value=''>Home Team</option>
			<?php
			foreach($get_team as $team){
				echo "<option value='".$team['team_id']."'>".$team['team_name']."</option>";
			}
			?>
				</select>&nbsp;-&nbsp;
				<select name="away_team" id="new_away_team">
					<option value=''>Away Team</option>
			<?php
			foreach($get_team as $team){
				echo "<option value='".$team['team_id']."'>".$team['team_name']."</option>";
			}
			?>
				</select>
				<span class="checkbox">
					<label style="font-size: 1.5em">
						<input type="checkbox" name='set_tebak_skor' value=""  />
						<span class="cr"><i class="cr-icon fa fa-check"></i></span>
						Tebak Skor
					</label>
				</span>
				<input type="button" value="SAVE" class="tombol_submit" id="umatch_save" />
			</div>
			<div></div>
		</div>
	</div>
</div>
<?php 
}
?>
<script>
$(function() {
	$("[name='match_date']").datepicker( {dateFormat: "yy-mm-dd"} );
})
$('#match_form').submit(function() {
	if($("[name='match_date']").val() == ""){
		alert('Tanggal belum diisi.');
		return false;
	}
	else if($("[name='match_hour']").val() == ""){
		alert('Jam belum dipilih.');
		return false;
	}
	else if($("[name='match_minute']").val() == ""){
		alert('Menit belum dipilih.');			
		return false;		
	}		
	else if($("[name='match_league']").val() == ""){
		alert('Liga belum dipilih.');			
		return false;		
	}
	else if($("[name='home_team']").val() == ""){
		alert('Home Team belum dipilih.');		
		return false;		
	}
	else if($("[name='away_team']").val() == ""){
		alert('Away Team belum dipilih.');	
		return false;		
	}
});
$('#umatch_save').click(function() {
	var data = {
		page : "update_match",
		match_id : $(this).attr("idd"),
		match_time : $("#new_match_date").val()+" "+$("#new_match_hour").val()+":"+$("#new_match_minute").val()+":00",
		league_id : $("#new_match_league").val(),
		match_group : $("#new_match_group").val(),
		home_id : $("#new_home_team").val(),
		away_id : $("#new_away_team").val(),
		tebak_skor : $("[name='set_tebak_skor']").is(":checked") ? 1 : 0,
		ajax: ""
	};
	$.post(window.location.origin+"/football_match.php" , data, function(res) {
		$(".modal-body div:last-child").html(res);
		if(res == "updated"){
			$(".modal-body div").not(":last-child").slideUp("slow");
			setTimeout( function(){location.reload();}, 2000);
		}
	});
});
function edit_match(match_id){
	$("#umatch_modal #home_highlight").val($("#match_list tr#"+match_id+" [name='h_highlight']").val());
	$("#umatch_modal #away_highlight").val($("#match_list tr#"+match_id+" [name='a_highlight']").val());
	$(".modal-body div:last-child").html("");
	$("#umatch_modal").show();
	var umatch_time = $("#match_list tr#"+match_id+" [name='match_time']").text().split(' ');
	var umatch_tekor = $("#match_list tr#"+match_id+" [name='tebak_skor']").val() == "0" ? false : true;
	$("#umatch_modal #new_match_date").val(umatch_time[0]);
	$("#umatch_modal select#new_match_hour").val(umatch_time[1].split(':')[0]);
	$("#umatch_modal select#new_match_minute").val(umatch_time[1].split(':')[1]);
	$("#umatch_modal select#new_match_league").val($("#match_list tr#"+match_id+" [name='league_name']").attr("idd"));
	$("#umatch_modal #new_match_group").val($("#match_list tr#"+match_id+" [name='group']").text());
	$("#umatch_modal select#new_home_team").val($("#match_list tr#"+match_id+" [name='home_team_name']").attr("idd"));
	$("#umatch_modal select#new_away_team").val($("#match_list tr#"+match_id+" [name='away_team_name']").attr("idd"));
	$("#umatch_modal [name='set_tebak_skor']").prop('checked',umatch_tekor);
	$("#umatch_save").attr("idd", match_id);
}
$(".close").click(function() {
	$("#umatch_modal").hide();
})
function delete_match(match_id){
	var del = confirm("Hapus pertandingan "+$("#match_list tr#"+match_id+" [name='home_team_name']").text()+" - "+$("#match_list tr#"+match_id+" [name='away_team_name']").text()+" ?");
	if(del){
		$.post(window.location.origin+"/football_match.php" , {page: "delete_match", match_id : match_id, ajax: ""}, function(data) {
			alert(data);
			if(data == "deleted"){
				$("#match_list tr#"+match_id).remove();
			}
		});
	}
}
function update_score(match_id){
	var data = {
		page : "update_score",
		match_id : match_id,
		home_score : $("#match_list tr#"+match_id+" [name='home_score']").val(),
		away_score : $("#match_list tr#"+match_id+" [name='away_score']").val(),
		ajax: ""
	};
	$.post(window.location.origin+"/football_match.php" , data, function(res) {
		alert(res);
		/* $(".modal-body div:last-child").html(res);
		if(res == "updated"){
			$(".modal-body div").not(":last-child").slideUp("slow");
			setTimeout( function(){location.reload();}, 2000);
		} */
	});
}
function set_highlight(){
	var match_id = $("#umatch_save").attr("idd");
	var home_hl = $("#home_highlight").val()=="" ? 0 : $("#home_highlight").val();
	var away_hl = $("#away_highlight").val()=="" ? 0 : $("#away_highlight").val();
	var data = {
		page : "set_highlight",
		match_id : match_id,
		home_hl : home_hl,
		away_hl : away_hl,
		ajax: ""
	};
	$.post(window.location.origin+"/football_match.php" , data, function(res) {
		$(".modal-body div:last-child").html(res);
		if(res == "Highlighted"){
			$("#match_list tr [name='h_highlight'], #match_list tr [name='a_highlight']").val('');
			$("#match_list tr#"+match_id+" [name='h_highlight']").val(home_hl);
			$("#match_list tr#"+match_id+" [name='a_highlight']").val(away_hl);
			setTimeout( function(){$(".close").click();}, 1000);
		}
	});
}
</script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<style>
#match_form {
	text-align: center;
}
[name="match_date"], [name="match_group"] {
	padding: 5px;
    border-radius: 4px;
    width: 90px;
}
[name="match_hour"], [name="match_minute"], [name="match_league"], [name="home_team"], [name="away_team"], [name="home_score"], [name="away_score"] {
	border-radius: 4px;
	padding: 5px;
}
[name="match_league"] {
	max-width: 300px;
}
[name="home_team"], [name="away_team"] {
	max-width: 170px;
}
#match_list {
	width: 100%;
}
#match_list > thead > tr > th {
	background-color: #ff4949;
    color: #000;
	padding: 5px;
}
#match_list > tbody > tr:nth-child(odd) > td {
	background-color: #fff;
	padding: 5px;
}
#match_list > tbody > tr:nth-child(even) > td {
	background-color: #e2e2e2;
	padding: 5px;
}
[name="home_score"], [name="away_score"] {
	width: 30px;
}
[name="match_score"], [name="match_time"], [name="group"] {
	text-align: center;
}
[name="match_score"] {
	width: 80px;
}
[name="match_time"] {
    width: 85px;
}
[name="group"] {
    width: 60px;
}

.modal {
    display: none;
    position: fixed;
    z-index: 1;
    padding-top: 350px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto; /* Enable scroll if needed */
    background-color: rgba(0,0,0,0.4);
}
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    border: 1px solid #888;
    width: 680px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}
@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}
.close:hover,
.close:focus {
    color: #000;
    cursor: pointer;
}
.modal-header {
    padding: 2px 16px;
    background-color: #37484E;
}
.modal-header h3 {
	padding: 1em 16px 0;
	color: white;
}
.modal-body {
	padding: 15px;
	text-align: center;
}
#highlight_match {
	margin: 0 0 10px;
    border-radius: 5px;
    border: 1px solid #f11200;
    padding: 10px;
	font-size: 1.5em;
    font-weight: bold;
}
#home_highlight, #away_highlight {
	padding: 5px;
    border-radius: 4px;
    width: 40px;
}

.checkbox {
	vertical-align: middle;
    display: inline-block;
    line-height: 1.4;
	margin-left: 5px;
}
.checkbox label:after, 
.radio label:after {
    content: '';
    display: table;
    clear: both;
}
.checkbox .cr,
.radio .cr {
    position: relative;
    display: inline-block;
    border: 1px solid #a9a9a9;
    border-radius: .25em;
    width: 1.3em;
    height: 1.3em;
    float: left;
    margin-right: .2em;
}
.radio .cr {
    border-radius: 50%;
}
.checkbox .cr .cr-icon,
.radio .cr .cr-icon {
    position: absolute;
    font-size: .8em;
    line-height: 0;
    top: 50%;
    left: 20%;
}
.radio .cr .cr-icon {
    margin-left: 0.04em;
}
.checkbox label input[type="checkbox"],
.radio label input[type="radio"] {
    display: none;
}
.checkbox label input[type="checkbox"] + .cr > .cr-icon,
.radio label input[type="radio"] + .cr > .cr-icon {
    transform: scale(3) rotateZ(-20deg);
    opacity: 0;
    transition: all .3s ease-in;
}
.checkbox label input[type="checkbox"]:checked + .cr > .cr-icon,
.radio label input[type="radio"]:checked + .cr > .cr-icon {
    transform: scale(1) rotateZ(0deg);
    opacity: 1;
}
.checkbox label input[type="checkbox"]:disabled + .cr,
.radio label input[type="radio"]:disabled + .cr {
    opacity: .5;
}
</style>
<!-- input type="text" id="search_num" class="number" placeholder="Nomor" maxlength="4"/>
<input type="text" id="search_name" placeholder="Username" data="" />
<button type="button" id="search_button" value="">CARI</button>
<table id="adm-togel">
	<thead>
		<tr>
			<th>ID</th>
			<th>Time</th>
			<th>Username</th>
			<th>Number</th>
			<th>JayaBola</th>
			<th>Win</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>
<script>
$(function() {
	get_togel(1);
	$("#search_button").click(function() {
		$(this).val($("#search_num").val());
		$("#periode").attr("date", $("#periode").val());
		$("#search_name").attr("data", $("#search_name").val());
		get_togel(1);
	});
	$("#periode").datepicker( {dateFormat: "yy-mm-dd"} );
})
-->