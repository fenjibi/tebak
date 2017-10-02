<?php
include 'config.php';
class togel {
	var $home_url;
	function __construct() {
		$this->mysqli = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	}
	function getlive(){
		require_once $_SERVER['DOCUMENT_ROOT'].'/tools/simple_html_dom.php';
		$data_path = $_SERVER['DOCUMENT_ROOT'].'/data/';
		
		$live_macau45toto = 'Macau 45 TOTO';
		$src_macau45toto = file_get_html('http://macau45balls.net/resultTOTO.php')->plaintext;
		$live_macau45toto .= strstr(preg_replace('/[\[\]\"]/', '', $src_macau45toto), ',');
		$macau45toto = fopen($data_path.'macau45toto_toto.php', "w");
		fwrite($macau45toto, $live_macau45toto);
		fclose($macau45toto);
		
		$live_macau45toto4d = 'Macau Lucky 4D';
		$src_macau45toto4d = file_get_html('http://macau45balls.net/resultLUCKY.php')->plaintext;
		$live_macau45toto4d .= strstr(preg_replace('/[\[\]\"]/', '', $src_macau45toto4d), ',');
		$macau45toto4d = fopen($data_path.'macau45toto_4d.php', "w");
		fwrite($macau45toto4d, $live_macau45toto4d);
		fclose($macau45toto4d);
		
		$live_sgp4d = 'Singapore 4D';
		$src_sgp4d = file_get_html($this->home_url.'data/sgp_4d-json.php')->plaintext;
		$live_sgp4d .= strstr(preg_replace('/[\[\]\"]/', '', $src_sgp4d), ',');
		$sgp4d = fopen($data_path.'sgp_4d.php', "w");
		fwrite($sgp4d, $live_sgp4d);
		fclose($sgp4d);
		
		$live_sgptoto = 'Singapore TOTO';
		$src_sgptoto = file_get_html($this->home_url.'data/sgp_toto-json.php')->plaintext;
		$live_sgptoto .= strstr(preg_replace('/[\[\]\"]/', '', $src_sgptoto), ',');
		$sgptoto = fopen($data_path.'sgp_toto.php', "w");
		fwrite($sgptoto, $live_sgptoto);
		fclose($sgptoto);
	}
	function save_result_sgp(){
		$ssql = "SELECT id FROM hasil_togel_sgp WHERE tanggal = '".date('Y-m-d')."'";
		$sresult = $this->mysqli->query($ssql);
		if($sresult->num_rows == 1){
			$sql = "UPDATE hasil_togel_sgp SET nomor='".$_POST['val']."' WHERE tanggal='".date('Y-m-d')."'";
			$result = $this->mysqli->query($sql);
			$a = "Updated";
		}
		else{
			$sql = "INSERT INTO hasil_togel_sgp (tanggal, nomor) VALUES ('".date('Y-m-d')."', '".$_POST['val']."')";
			$result = $this->mysqli->query($sql);
			if($result) {
				$a = "Inserted";
			}
			else {
				$a = "Error";
			}
		}
		echo $a;
		$sresult->close();
		$this->mysqli->close();
	}
	function get_hasil_togel($region, $year){
		$sql = "select * from hasil_togel_".$region." 
            where tanggal LIKE '".$year."-%' order by tanggal asc";
		$get_rst = $this->mysqli->query($sql);
		if($get_rst->num_rows > 0){	
			while($row = $get_rst->fetch_assoc()){
				$rst[] = $row;
			}
		}
		$rst['data'] = $rst;
		$rst['count'] = $get_rst->num_rows;
		return $rst;
		$this->mysqli->close();
	}
}
$togel = new togel();
$togel->home_url = $home_url;
switch($_POST['page']){
	case "getlive":
		$togel->getlive();
		break;
	case "save-result-sgp":
		$togel->save_result_sgp();
		break;
}
?>