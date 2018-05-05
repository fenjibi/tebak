<?php
include 'config.php';
class bet{
	function __construct() {
		$this->mysqli = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	}
	function get_betting() {
		$periode_sql = " and periode = '".(isset($_REQUEST['periode']) ? $_REQUEST['periode'] : $this->get_periode())."'";
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
		$nobets = explode(",", $nobet);
		$countno = count($nobets);
		$periode = $this->get_periode();
		if(date('Hi') < "1600" && date('Hi') >= "1430"){
			echo "Waktu tebak togel jam 16:00 - 14:30";
			return;
		}
<<<<<<< HEAD
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
=======
		$periode_sql = "select * from bet 
			where user_id=".$uid." and periode='".$periode."'";
		$periode_chk = $this->mysqli->query($periode_sql);
		if($periode_chk->num_rows > 19){
			echo "Tebakan Anda untuk periode ini sudah limit.\nSetiap user hanya boleh submit 20 tebakan per periode.";
			return;
		}
		$c = 0;
		$remaining = 20 - $periode_chk->num_rows;
		while($bets = $periode_chk->fetch_assoc()){
			$number[] = $bets['number'];
		}
		foreach ($nobets as $nbet) {
			if($remaining > $c){
				$numbet = strlen($nbet) > 4 ? substr($nbet,0,4) : $nbet;
				if(empty($number)){
					$inserts[] = $numbet;
					$insert[] = "(".$uid.", '".$numbet."', '".$periode."')";
					$c++;
				}
				elseif (!in_array($numbet, $number)) {
					$inserts[] = $numbet;
					$insert[] = "(".$uid.", '".$numbet."', '".$periode."')";
					$c++;
				}
			}
		}
		if($c == 0){
			echo "Tebakan sudah ada. Silahkan submit nomor lainnya.";
>>>>>>> toto-win
		}
		else{
			$sql = "INSERT INTO bet (user_id, number, periode) 
				VALUES ".implode(", ",$insert);
			$bet = $this->mysqli->query($sql);
			if($bet){
				echo $c." Tebakan disimpan. Semoga beruntung.\n".implode(", ",$inserts);
			}
			else{
				echo "Gagal. Ada kesalahan.";
			}
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
			return "Tebak skor ini sudah di TUTUP.\nSilahkan pilih pertandingan yang lain.";
		}
		$tebak_skor_sql = "select * from tebakan_skor 
			where user_id=".$uid." and match_id=".$match_id;
		$tebak_skor_chk = $this->mysqli->query($tebak_skor_sql);
		if($tebak_skor_chk->num_rows > 0){
			echo "Tebakan Anda untuk pertandingan ini sudah ada.\nSetiap peserta hanya boleh menebak 1 x per pertandingan.";
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
	function get_tebakan_skor($match_id="", $tebak_hs="", $tebak_as="", $orderby="", $time_limit=""){
		$sql_mid = $match_id != "" ? " and ts.match_id=".$match_id : "";
		$sql_ths = $tebak_hs != "" ? " and ts.home_score=".$tebak_hs : "";
		$sql_tas = $tebak_as != "" ? " and ts.away_score=".$tebak_as : "";
		if($time_limit == "1day"){
			$sql_time = " and now() < m.time + interval 1 day";
		}
		elseif($time_limit != ""){
			$sql_time = " and m.time like '".$time_limit."%'";
		}
		else{
			$sql_time = "";
		}
		$sql = "select match_group, home_team_id, th.team_name home_team_name, away_team_id, ta.team_name away_team_name, 
				l.league_id, league_name, ts.tebakan_skor_id, ts.match_id, ts.home_score tebak_home, 
				ts.away_score tebak_away, ts.time, ts.user_id, username, dewahoki_username, jayabola_username, tebak_skor_win_id 
			from game_match m, team th, team ta, league l, user u, user_detail ud, tebakan_skor ts left join tebak_skor_win tsw on tsw.tebakan_skor_id=ts.tebakan_skor_id 
			where m.league_id=l.league_id and 
				m.home_team_id=th.team_id and 
				m.away_team_id=ta.team_id and 
				m.match_id=ts.match_id and 
				ts.user_id=u.user_id and 
				u.user_id=ud.user_id".$sql_mid.$sql_ths.$sql_tas.$sql_time.$orderby;
		$get_tebakan_skor = $this->mysqli->query($sql);
		$tekor = array();
		if($get_tebakan_skor->num_rows > 0){
			while($row = $get_tebakan_skor->fetch_assoc()){
				$bet_time = new DateTime($row['time']);
				$row['tekor_time_format'] = date_format($bet_time, 'D M j, g:i:sa');
				$tekor[] = $row;
			}
		}
		$tebakanskor['data'] = $tekor;
		if(isset($_POST['current_page'])){
			$start_row = ($_POST['current_page'] - 1)*$_POST['row_per_page'];
			$tebakanskor['data'] = array_slice($tekor, $start_row, $_POST['row_per_page']);
		}
		$tebakanskor['count'] = $get_tebakan_skor->num_rows;
		return $tebakanskor;
		$this->mysqli->close();
	}
	function set_tekor_winner($tekor_id){
		$sql = "INSERT INTO tebak_skor_win (tebakan_skor_id) VALUES (".$tekor_id.")";
		$tekorwin = $this->mysqli->query($sql);
		if($tekorwin){
			return "Pemenang berhasil disimpan.";
		}
		else{
			return "Gagal. Ada kesalahan.";
		}
		$this->mysqli->close();
	}
	function tekor_winner_list(){
		$tekorwinsql = "select ts.tebakan_skor_id, ts.time, u.user_id, username, dewahoki_username, 
				jayabola_username, tebak_skor_win_id, ts.home_score tebak_home, ts.away_score tebak_away, home_team_id, 
				th.team_name home_team_name, away_team_id, ta.team_name away_team_name, m.time match_time, l.league_id, league_name 
			from user u, user_detail ud, tebakan_skor ts, tebak_skor_win tsw, game_match m, team th, team ta, league l 
            where u.user_id=ts.user_id 
				and u.user_id=ud.user_id 
				and tsw.tebakan_skor_id=ts.tebakan_skor_id 
				and ts.match_id=m.match_id 
				and m.home_team_id=th.team_id 
				and m.away_team_id=ta.team_id 
				and m.league_id=l.league_id 
			order by ts.time desc";
		$get_tekor_winner = $this->mysqli->query($tekorwinsql);
		if($get_tekor_winner->num_rows > 0){
			while($row = $get_tekor_winner->fetch_assoc()){
				$tekorwinlist[] = $row;
			}
			$tebakanskorwinlist['data'] = $tekorwinlist;
			if(isset($_POST['current_page'])){
				$start_row = ($_POST['current_page'] - 1)*$_POST['row_per_page'];
				$tebakanskorwinlist['data'] = array_slice($tekorwinlist, $start_row, $_POST['row_per_page']);
			}
			$tebakanskorwinlist['count'] = $get_tekor_winner->num_rows;
			return $tebakanskorwinlist;
		}
		else{
			return '';
		}
		$this->mysqli->close();
	}
	function download_data($filename){
		header('Content-type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename='.$filename);
		$get_betting = $this->get_betting();
		if(is_array($get_betting)){
			$loaded_data = "ID\tTime\tUsername\tNumber\t899Cash\tJayaBola\n";
			foreach($get_betting as $totobet){
				$loaded_data .= $totobet['bet_id']."\t".$totobet['time']."\t".$totobet['username']."\t".$totobet['number']."\t".$totobet['dewahoki_username']."\t".$totobet['jayabola_username']."\n";
			}
		}
		echo $loaded_data;
	}
}
$bet = new bet();
switch($_POST['page']){
	case 'get_betting':
		$bet->get_betting();
		break;
	case 'get_rows_betting':
		$bet->get_rows_betting();
		break;
	case 'betting_toto':
		$bet->betting_toto($_POST['uid'], $_POST['nobet']);
		break;
	case 'set_toto_winner':
		$bet->set_toto_winner($_POST['bet_id']);
		break;
<<<<<<< HEAD
	case 'betting_football':
=======
	case betting_football:
>>>>>>> tebak-skor
		$betfootball = $bet->betting_football($_POST['uid'], $_POST['match_id'], $_POST['home_score'], $_POST['away_score']);
		if(isset($_POST['ajax'])){
			echo $betfootball;
		}
		break;
<<<<<<< HEAD
	case 'get_tebakan_skor':
=======
	case get_tebakan_skor:
>>>>>>> tebak-skor
		$tekor = $bet->get_tebakan_skor($_POST['match_id'], $_POST['home_score'], $_POST['away_score'], $_POST['order_by'], $_POST['time_limit']);
		if(isset($_POST['ajax'])){
			echo json_encode($tekor);
		}
		break;
<<<<<<< HEAD
	case 'set_tekor_winner':
=======
	case set_tekor_winner:
>>>>>>> tebak-skor
		$tekor_win = $bet->set_tekor_winner($_POST['tekor_id']);
		if(isset($_POST['ajax'])){
			echo $tekor_win;
		}
		break;
<<<<<<< HEAD
	case 'tekor_winner_list':
=======
	case tekor_winner_list:
>>>>>>> tebak-skor
		$tekor_winlist = $bet->tekor_winner_list();
		if(isset($_POST['ajax'])){
			echo json_encode($tekor_winlist);
		}
		break;
}
switch($_GET['page']){
<<<<<<< HEAD
	case 'download_data':
=======
	case download_data:
>>>>>>> tebak-skor
		$bet->download_data($_GET['filename']);
		break;
}
?>