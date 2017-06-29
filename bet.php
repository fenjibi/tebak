<?php
include 'config.php';
class bet{
	function __construct() {
		$this->mysqli = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	}
	function get_betting() {
		$periode_sql = " and periode = '".(isset($_POST['periode']) ? $_POST['periode'] : $this->get_periode())."'";
		if(trim($_POST['search_num']) != ''){
			$search_sql = " and b.number like '%".$_POST['search_num']."%'";
		}
		if(trim($_POST['search_name']) != ''){
			$name_sql = " and concat(username, dewahoki_username, jayabola_username) like '%".$_POST['search_name']."%'";
		}
		if(isset($_POST['current_page'])){
			$row_per_page = 15;
			$start_row = ($_POST['current_page'] - 1)*$row_per_page;
			$limit = " limit ".$start_row.", ".$row_per_page;
		}
		$sql = "select b.bet_id, b.time, number, periode, u.user_id, username, dewahoki_username, jayabola_username, togel_win_id
			from user u, user_detail ud, bet b left join togel_win tw on tw.bet_id=b.bet_id 
            where u.user_id=b.user_id 
				and u.user_id=ud.user_id".$periode_sql.$search_sql.$name_sql.$limit;
		$get_bet = $this->mysqli->query($sql);
		if($get_bet->num_rows > 0){	
			while($row = $get_bet->fetch_assoc()){
				$b[] = $row;
			}
			if(isset($_POST['ajax'])){
				echo json_encode($b);
			}
			else{
				return $b;
			}
		}
		else{
			if(isset($_POST['ajax'])){
				echo json_encode([]);
			}
			else{
				return '';
			}
		}
		$this->mysqli->close();
	}
	function get_rows_betting(){
		$periode_sql = " and periode = '".(isset($_POST['periode']) ? $_POST['periode'] : $this->get_periode())."'";
		if(trim($_POST['search_num']) != ''){
			$search_sql = " and b.number LIKE '%".$_POST['search_num']."%'";
		}
		if(trim($_POST['search_name']) != ''){
			$name_sql = " and concat(username, dewahoki_username, jayabola_username) like '%".$_POST['search_name']."%'";
		}
		$csql = "select count(*) total_rows from bet b, user u, user_detail ud
			where u.user_id=b.user_id 
				and u.user_id=ud.user_id".$periode_sql.$search_sql.$name_sql;
		$getc = $this->mysqli->query($csql);
		if($getc->num_rows > 0){
			$count = $getc->fetch_assoc();
		}
		if(isset($_POST['ajax'])){
			echo json_encode($count);
		}
		else{
			return $count;
		}
	}
	function betting_toto($uid, $nobet){
		if(strlen($nobet) > 4){
			echo "Tebakan togel tidak bisa lebih dari 4 digit.";
			return;
		}
		if(date('Hi') < "1600" && date('Hi') >= "1430"){
			echo "Waktu tebak togel jam 16:00 - 14:30";
			return;
		}
		$periode = $this->get_periode();
		$periode_sql = "select * from bet 
			where user_id=".$uid." and periode='".$periode."'";
		$periode_chk = $this->mysqli->query($periode_sql);
		if($periode_chk->num_rows > 19){
			echo "Tebakan Anda untuk periode ini sudah ada.<br />Setiap user hanya boleh submit tebakan 20 x per periode.";
			return;
		}
		$sql = "INSERT INTO bet (user_id, number, periode) 
			VALUES (".$uid.", '".$nobet."', '".$periode."')";
		$bet = $this->mysqli->query($sql);
		if($bet){
			echo "Tebakan disimpan. Semoga beruntung.";
		}
		else{
			echo "Gagal. Ada kesalahan.";
		}
		$this->mysqli->close();
	}
	function set_toto_winner($bet_id){
		$sql = "INSERT INTO togel_win (bet_id) VALUES (".$bet_id.")";
		$towin = $this->mysqli->query($sql);
		if($towin){
			echo "Pemenang berhasil disimpan.";
		}
		else{
			echo "Gagal. Ada kesalahan.";
		}
		$this->mysqli->close();
	}
	function toto_winner_list(){
		$wlistsql = "select b.bet_id, b.time, number, periode, u.user_id, username, dewahoki_username, jayabola_username, togel_win_id
			from user u, user_detail ud, bet b, togel_win tw 
            where u.user_id=b.user_id 
				and u.user_id=ud.user_id
				and tw.bet_id=b.bet_id
			order by time desc";
		$get_toto_winner = $this->mysqli->query($wlistsql);
		if($get_toto_winner->num_rows > 0){	
			while($row = $get_toto_winner->fetch_assoc()){
				$winlist[] = $row;
			}
			return $winlist;
		}
		else{
			return '';
		}
		$this->mysqli->close();
	}
	function get_periode(){
		if(date('Hi') >= "1600"){
			$periode = date("Y-m-d", strtotime("+1 day"));
		}
		else { // (date('Hi') < "1430")
			$periode = date("Y-m-d");
		}
		return $periode;
	}
	function betting_football($uid, $match_id, $home_score, $away_score){
		include $_SERVER['DOCUMENT_ROOT']."/football_match.php";
		$match = $football_match->get_match($match_id, "30minutes");
		if(empty($match)){
			return "Tebakan skor pertandingan ini tidak berhasil disimpan.\nWaktu menebak s/d 30 menit sebelum waktunya.";
		}
		$tebak_skor_sql = "select * from tebakan_skor 
			where user_id=".$uid." and match_id=".$match_id;
		$tebak_skor_chk = $this->mysqli->query($tebak_skor_sql);
		if($tebak_skor_chk->num_rows > 0){
			echo "Tebakan Anda untuk pertandingan ini sudah ada.\nSetiap user hanya boleh menebak 1 x per pertandingan.";
			return;
		}
		$sql = "INSERT INTO tebakan_skor (user_id, match_id, home_score, away_score) 
			VALUES (".$uid.", ".$match_id.", ".$home_score.", ".$away_score.")";
		$fbet = $this->mysqli->query($sql);
		if($fbet){
			return "Tebakan skor disimpan. Semoga beruntung.";
		}
		else{
			return "Gagal. Ada kesalahan.";
		}
		$this->mysqli->close();
	}
	function get_tebakan_skor($match_id="", $time_limit=""){
		$sql_mid = $match_id != "" ? " and ts.match_id=".$match_id : "";
		$sql_time = $time_limit != "" ? " and now() + interval 30 minute < m.time" : "";
		$sql = "select match_group, home_team_id, th.team_name home_team_name, away_team_id, ta.team_name away_team_name, 
				l.league_id, league_name, tebakan_skor_id, ts.match_id, ts.home_score tebak_home, 
				ts.away_score tebak_away, ts.time, ts.user_id, username, dewahoki_username, jayabola_username 
			from tebakan_skor ts, game_match m, team th, team ta, league l, user u, user_detail ud 
			where m.league_id=l.league_id and 
				m.home_team_id=th.team_id and 
				m.away_team_id=ta.team_id and 
				m.match_id=ts.match_id and 
				ts.user_id=u.user_id and 
				u.user_id=ud.user_id".$sql_time.$sql_mid;
		$get_tebakan_skor = $this->mysqli->query($sql);
		$tekor = array();
		if($get_tebakan_skor->num_rows > 0){
			while($row = $get_tebakan_skor->fetch_assoc()){
				$tekor[] = $row;
			}
		}
		return $tekor;
		$this->mysqli->close();
	}
}
$bet = new bet();
switch($_POST['page']){
	case get_betting:
		$bet->get_betting();
		break;
	case get_rows_betting:
		$bet->get_rows_betting();
		break;
	case betting_toto:
		$bet->betting_toto($_POST['uid'], $_POST['nobet']);
		break;
	case set_toto_winner:
		$bet->set_toto_winner($_POST['bet_id']);
		break;
	case betting_football:
		$betfootball = $bet->betting_football($_POST['uid'], $_POST['match_id'], $_POST['home_score'], $_POST['away_score']);
		if(isset($_POST['ajax'])){
			echo $betfootball;
		}
		break;
}
?>