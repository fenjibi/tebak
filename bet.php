<?php
include 'config.php';
class bet{
	function __construct() {
		$this->mysqli = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	}
	function get_betting() {
		$periode_sql = " and periode = '".(isset($_POST['periode']) ? $_POST['periode'] : $this->get_periode())."'";
		if(trim($_POST['search_num']) != ''){
			$search_sql = " and b.number LIKE '%".$_POST['search_num']."%'";
		}
		if(isset($_POST['current_page'])){
			$row_per_page = 15;
			$start_row = ($_POST['current_page'] - 1)*$row_per_page;
			$limit = " limit ".$start_row.", ".$row_per_page;
		}
		$sql = "select b.bet_id, b.time, number, periode, u.user_id, username, dewahoki_username, jayabola_username, togel_win_id
			from user u, user_detail ud, bet b left join togel_win tw on tw.bet_id=b.bet_id 
            where u.user_id=b.user_id 
				and u.user_id=ud.user_id".$periode_sql.$search_sql.$limit;
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
		$csql = "select count(*) total_rows from bet b, user u, user_detail ud
			where u.user_id=b.user_id 
				and u.user_id=ud.user_id".$periode_sql.$search_sql;
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
		if(date('Hi') < "1600" && date('Hi') >= "1430"){
			echo "Waktu tebak togel jam 16:00 - 14:30";
			return;
		}
		$periode = $this->get_periode();
		/* $periode_sql = "select * from bet 
			where user_id=".$uid." and periode='".$periode."'";
		$periode_chk = $this->mysqli->query($periode_sql);
		if($periode_chk->num_rows > 0){
			echo "Tebakan Anda untuk periode ini sudah ada.<br />Setiap user hanya boleh submit tebakan 1 x per periode.";
			return;
		} */
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
				and tw.bet_id=b.bet_id";
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
}
?>