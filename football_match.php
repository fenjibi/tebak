<?php
include 'config.php';
class football_match {
	function __construct() {
		$this->mysqli = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	}
	function save_league(){
		include 'common.php';;
		$ext = ["jpeg", "jpg", "png"];
		$max_size = 1024000;
		$upload_img = $common->upload('league_icon', "images/", $ext, $max_size);
		if($upload_img == "uploaded"){
			$league_icon = "images/".$_FILES['league_icon']['name'];
			$upload_msg = "";
		}
		else{
			$league_icon = "";
			$upload_msg = $upload_img." ";
		}
		$sql = "INSERT INTO league (league_name, league_icon) VALUES ('".$_POST['league_name']."', '".$league_icon."')";
		$savel = $this->mysqli->query($sql);
		if($savel){
			return $upload_msg."League berhasil disimpan.";
		}
		else{
			return $upload_msg."Gagal. Ada kesalahan.";
		}
		$this->mysqli->close();
	}
	function get_league($league_id=""){
		$sql_lid = $league_id != "" ? " and league_id=".$league_id : "";
		$sql = "select * from league where 1=1".$sql_lid;
		$get_league = $this->mysqli->query($sql);
		$l = array();
		if($get_league->num_rows > 0){
			while($row = $get_league->fetch_assoc()){
				$l[] = $row;
			}
		}
		return $l;
		$this->mysqli->close();
	}
	function update_league($league_id){
		$league = $this->get_league($league_id);
		if($league[0]['league_icon'] != ""){
			unlink($league[0]['league_icon']);
		}
		include 'common.php';;
		$ext = ["jpeg", "jpg", "png"];
		$max_size = 1024000;
		$upload_img = $common->upload('new_league_icon', "images/", $ext, $max_size);
		if($upload_img == "uploaded"){
			$new_league_icon = "images/".$_FILES['new_league_icon']['name'];
		}
		else{
			$new_league_icon = "";
			$respond['img'] = $upload_img;
		}
		$sql = "update league set league_name='".$_POST['league_name']."', league_icon='".$new_league_icon."'
			where league_id=".$league_id;
		$updatel = $this->mysqli->query($sql);
		$respond['img_src'] = $new_league_icon;
		if($this->mysqli->affected_rows > 0){
			$respond['db'] = 'updated';
		}
		else{
			$respond['db'] = 'not updated';
		}
		return $respond;
		$this->mysqli->close();
	}
	function delete_league($league_id){
		$league = $this->get_league($league_id);
		$sql = "delete from league where league_id=".$league_id;
		$delleague = $this->mysqli->query($sql);
		if($this->mysqli->affected_rows > 0){
			if (file_exists($league[0]['league_icon'])) {
				unlink($league[0]['league_icon']);
			}
			return 'deleted';
		}
		else{
			return 'not deleted';
		}
		$this->mysqli->close();
	}
	function save_team(){
		include 'common.php';;
		$ext = ["jpeg", "jpg", "png"];
		$max_size = 1024000;
		$upload_img = $common->upload('team_icon', "images/", $ext, $max_size);
		if($upload_img == "uploaded"){
			$team_icon = "images/".$_FILES['team_icon']['name'];
			$upload_msg = "";
		}
		else{
			$team_icon = "";
			$upload_msg = $upload_img." ";
		}
		$sql = "INSERT INTO team (team_name, team_icon) VALUES ('".$_POST['team_name']."', '".$team_icon."')";
		$savet = $this->mysqli->query($sql);
		if($savet){
			return $upload_msg."Team berhasil disimpan.";
		}
		else{
			return $upload_msg."Gagal. Ada kesalahan.";
		}
		$this->mysqli->close();
	}
	function get_team($team_id=""){
		$sql_lid = $team_id != "" ? " and team_id=".$team_id : "";
		$sql = "select * from team where 1=1".$sql_lid;
		$get_team = $this->mysqli->query($sql);
		$l = array();
		if($get_team->num_rows > 0){
			while($row = $get_team->fetch_assoc()){
				$l[] = $row;
			}
		}
		return $l;
		$this->mysqli->close();
	}
	function update_team($team_id){
		$team = $this->get_team($team_id);
		if($team[0]['team_icon'] != ""){
			unlink($team[0]['team_icon']);
		}
		include 'common.php';;
		$ext = ["jpeg", "jpg", "png"];
		$max_size = 1024000;
		$upload_img = $common->upload('new_team_icon', "images/", $ext, $max_size);
		if($upload_img == "uploaded"){
			$new_team_icon = "images/".$_FILES['new_team_icon']['name'];
		}
		else{
			$new_team_icon = "";
			$respond['img'] = $upload_img;
		}
		$sql = "update team set team_name='".$_POST['team_name']."', team_icon='".$new_team_icon."'
			where team_id=".$team_id;
		$updatet = $this->mysqli->query($sql);
		$respond['img_src'] = $new_team_icon;
		if($this->mysqli->affected_rows > 0){
			$respond['db'] = 'updated';
		}
		else{
			$respond['db'] = 'not updated';
		}
		return $respond;
		$this->mysqli->close();
	}
	function delete_team($team_id){
		$team = $this->get_team($team_id);
		$sql = "delete from team where team_id=".$team_id;
		$delteam = $this->mysqli->query($sql);
		if($this->mysqli->affected_rows > 0){
			if (file_exists($team[0]['team_icon'])) {
				unlink($team[0]['team_icon']);
			}
			return 'deleted';
		}
		else{
			return 'not deleted';
		}
		$this->mysqli->close();
	}
	function save_match(){
		$match_time = $_POST['match_date']." ".$_POST['match_hour'].":".$_POST['match_minute'].":00";
		$sql = "INSERT INTO game_match (home_team_id, away_team_id, league_id, match_group, time) 
			VALUES (".$_POST['home_team'].", ".$_POST['away_team'].", ".$_POST['match_league'].", '".$_POST['match_group']."', '".$match_time."')";
		$savem = $this->mysqli->query($sql);
		if($savem){
			return "Pertandingan berhasil disimpan.";
		}
		else{
			return "Gagal. Ada kesalahan.";
		}
		$this->mysqli->close();
	}
	function get_match($match_id="", $time_limit="", $orderby="", $tekor=""){
<<<<<<< HEAD
		$sql_mid = $match_id != "" ? " and match_id=".$match_id : "";
		if($time_limit == "30minutes"){
			$sql_time = " and now() + interval 30 minute < time";
		}
		elseif($time_limit == "past"){
			$sql_time = " and now() - interval 4 day < time";
		}
=======
		$sql_mid = $match_id != "" ? " and m.match_id=".$match_id : "";
		if($time_limit == "30minutes"){
			$sql_time = " and now() + interval 30 minute < time";
		}
>>>>>>> tebak-skor
		elseif($time_limit != ""){
			$sql_time = " and time like '".$time_limit."%'";
		}
		else{
			$sql_time = "";
		}
		if($tekor != ""){
			$sql_tekor = " and tebak_skor=".$tekor;
		}
		$sql = "select m.*, th.team_name home_team_name, th.team_icon home_team_icon, ta.team_name away_team_name,  ta.team_icon away_team_icon, league_name, 
				league_icon, home_highlight, away_highlight 
			from team th, team ta, league l, game_match m left join football_highlight fh on m.match_id=fh.match_id 
			where m.league_id=l.league_id
				and m.home_team_id=th.team_id
				and m.away_team_id=ta.team_id".$sql_time.$sql_mid.$sql_tekor.$orderby;
		$get_match = $this->mysqli->query($sql);
		$m = array();
		if($get_match->num_rows > 0){
			while($row = $get_match->fetch_assoc()){
				$m[] = $row;
			}
		}
		return $m;
		$this->mysqli->close();
	}
	function delete_match($match_id){
		$sql = "delete from game_match where match_id=".$match_id;
		$delmatch = $this->mysqli->query($sql);
		if($this->mysqli->affected_rows > 0){
			return 'deleted';
		}
		else{
			return 'not deleted';
		}
		$this->mysqli->close();
	}
	function update_match($match_id){
		$sql = "update game_match set home_team_id=".$_POST['home_id'].", away_team_id=".$_POST['away_id'].", league_id=".$_POST['league_id'].", match_group='".$_POST['match_group']."', 
			time='".$_POST['match_time']."', tebak_skor=".$_POST['tebak_skor']." 
			where match_id=".$match_id;
		$updatem = $this->mysqli->query($sql);
		if($this->mysqli->affected_rows > 0){
			return 'updated';
		}
		else{
			return 'not updated';
		}
		$this->mysqli->close();
	}
	function update_score($match_id){
		$sql = "update game_match set home_score=".($_POST['home_score']=='' ? 'NULL' : $_POST['home_score']).", away_score=".($_POST['away_score']=='' ? 'NULL' : $_POST['away_score'])."
			where match_id=".$match_id;
		$updateskor = $this->mysqli->query($sql);
		if($this->mysqli->affected_rows > 0){
			return 'updated';
		}
		else{
			return 'not updated';
		}
		$this->mysqli->close();
	}
	function set_highlight($match_id, $home_highlight=0, $away_highlight=0){
		$sql = "insert into football_highlight (football_highlight_id, match_id, home_highlight, away_highlight) 
			values (1, ".$match_id.", ".$home_highlight.", ".$away_highlight.") on DUPLICATE key 
			update match_id=".$match_id.", home_highlight=".$home_highlight.", away_highlight=".$away_highlight;
		$savehl = $this->mysqli->query($sql);
		if($savehl){
			return "Highlighted";
		}
		else{
			return "Gagal. Ada kesalahan.";
		}
		$this->mysqli->close();
	}
}
$football_match = new football_match();
switch($_POST['page']){
	case save_league:
		$savel = $football_match->save_league();
		if(isset($_POST['ajax'])){
			echo $savel;
		}
		else{
			echo "<script>alert('".$savel."');window.location=window.location.origin+'/football-setup-adm';</script>";;
		}
		break;
	case delete_league:
		$delleague = $football_match->delete_league($_POST['league_id']);
		if(isset($_POST['ajax'])){
			echo $delleague;
		}
		break;
	case update_league:
		$upleague = $football_match->update_league($_POST['league_id']);
		if(isset($_POST['ajax'])){
			echo json_encode($upleague);
		}
		break;
	case save_team:
		$savet = $football_match->save_team();
		if(isset($_POST['ajax'])){
			echo $savet;
		}
		else{
			echo "<script>alert('".$savet."');window.location=window.location.origin+'/football-setup-adm';</script>";;
		}
		break;
	case delete_team:
		$delteam = $football_match->delete_team($_POST['team_id']);
		if(isset($_POST['ajax'])){
			echo $delteam;
		}
		break;
	case update_team:
		$upteam = $football_match->update_team($_POST['team_id']);
		if(isset($_POST['ajax'])){
			echo json_encode($upteam);
		}
		break;
	case save_match:
		$savem = $football_match->save_match();
		if(isset($_POST['ajax'])){
			echo $savem;
		}
		else{
			echo "<script>alert('".$savem."');window.location=window.location.origin+'/football-match-adm';</script>";;
		}
		break;
	case get_match:
		$fmatch = $football_match->get_match($_POST['match_id'], $_POST['match_time'], "", $_POST['tekor']);
		if(isset($_POST['ajax'])){
			echo json_encode($fmatch);
		}
		break;
	case delete_match:
		$delmatch = $football_match->delete_match($_POST['match_id']);
		if(isset($_POST['ajax'])){
			echo $delmatch;
		}
		break;
	case update_match:
		$upmatch = $football_match->update_match($_POST['match_id']);
		if(isset($_POST['ajax'])){
			echo $upmatch;
		}
		break;
	case update_score:
		$upscore = $football_match->update_score($_POST['match_id']);
		if(isset($_POST['ajax'])){
			echo $upscore;
		}
		break;
	case set_highlight:
		$savehl = $football_match->set_highlight($_POST['match_id'], $_POST['home_hl'], $_POST['away_hl']);
		if(isset($_POST['ajax'])){
			echo $savehl;
		}
}
?>