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
		
		if(!empty($_POST['name'])){
			$sql = "select * from live_togel where name = '".$_POST['name']."'";
			$get_live = $this->mysqli->query($sql);
			if($get_live->num_rows == 1){	
				$row = $get_live->fetch_assoc();
			}
			$get_live->close();
			$this->mysqli->close();
			return $row['name'].','.$row['data'];
		}
		
		$live_macau45toto = 'Macau 45 TOTO';
		$src_macau45toto = file_get_html('http://macau45balls.net/resultTOTO.php')->plaintext;
		if (strpos($src_macau45toto, '500 Internal Server Error') === false) {
			$live_macau45toto .= strstr(preg_replace('/[\[\]\"]/', '', $src_macau45toto), ',');
			$macau45toto = fopen($data_path.'macau45toto_toto.php', "w");
			fwrite($macau45toto, $live_macau45toto);
			fclose($macau45toto);
		}
		
		$live_macau45toto4d = 'Macau Lucky 4D';
		$src_macau45toto4d = file_get_html('http://macau45balls.net/resultLUCKY.php')->plaintext;
		if (strpos($src_macau45toto4d, '500 Internal Server Error') === false) {
			$live_macau45toto4d .= strstr(preg_replace('/[\[\]\"]/', '', $src_macau45toto4d), ',');
			$macau45toto4d = fopen($data_path.'macau45toto_4d.php', "w");
			fwrite($macau45toto4d, $live_macau45toto4d);
			fclose($macau45toto4d);
		}
		
		/* $live_sgp4d = 'Singapore 4D';
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
		fclose($sgptoto); */
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
		$this->mysqli->close();
		return $rst;
	}
	function setlive($name, $data){
		if(substr($name, 0, 9) == 'Singapore'){
			if($_POST['v'] == 'toto'){
				$file = "sgp_toto-json";
			}
			else if($_POST['v'] == 'fourd'){
				$file = "sgp_4d-json";
			}
			$live_toto = fopen($_SERVER['DOCUMENT_ROOT'].'/data/'.$file.".php", "w") or die("Unable to open file!");
			$toto_data = fwrite($live_toto, $data);
			fclose($live_toto);
		}
		
		$ltsql = "SELECT id FROM live_togel WHERE name = '".$name."'";
		$ltresult = $this->mysqli->query($ltsql);
		$data = preg_replace('/[\[\]\"]/', '', substr($data, strpos($data, ",") + 1)); // strstr(preg_replace('/[\[\]\"]/', '', $data), ',');
		if($ltresult->num_rows == 1){
			while($rst = $ltresult->fetch_assoc()){
				$sql = "UPDATE live_togel SET data='".$data."' WHERE id='".$rst['id']."'";
				$result = $this->mysqli->query($sql);
				$a = "Saved";
			}
		}
		else{
			$sql = "INSERT INTO live_togel (name, data) VALUES ('".$name."', '".$data."')";
			$result = $this->mysqli->query($sql);
			if($result) {
				$a = "Inserted";
			}
			else {
				$a = "Error";
			}
		}
		$ltresult->close();
		$this->mysqli->close();
		return $a;
	}
	function togel_detail($number){
		include 'tools/Math_Combinatorics/Math_Combinatorics-1.0.0/Combinatorics.php';
		$numbers = str_split($number, 1);
		$combinatorics = new Math_Combinatorics;
		foreach($combinatorics->combinations($numbers, 2) as $no) {
			$togeldet['no'][] = join('', $no). " = ".join('', array_reverse($no));
		}
		return $togeldet;
	}
	function get_shio($togel_date){
		$sql = "SELECT * FROM cny_calendar WHERE DATE(date) <= '".$togel_date."' ORDER BY date DESC LIMIT 1";
		$get_shio = $this->mysqli->query($sql);
		if($get_shio->num_rows > 0){	
			$shio = $get_shio->fetch_assoc();
		}
		$this->mysqli->close();
		return $shio;
	}
	/* function togel_shio($no){
		$sql_tsno = $no != "" ? " and no='".$no."'" : "";
		$sql = "select * from togel_shio where 1=1".$sql_tsno;
		$get_shio = $this->mysqli->query($sql);
		if($get_shio->num_rows > 0){	
			while($row = $get_shio->fetch_assoc()){
				$shio[] = $row;
			}
		}
		$this->mysqli->close();
		return $shio;
	} */
	function /* get_no_shio */togel_shio($shio, $no){
		$no = (int)$no == 0 ? 100 : $no;
		$no12 = ($no-1) % 12;
		$no_shio["anjing"] = ["anjing", "ayam", "monyet", "kambing", "kuda", "ular", "naga", "kelinci", "harimau", "kerbau", "tikus", "babi"];
		$no_shio["ayam"] = ["ayam", "monyet", "kambing", "kuda", "ular", "naga", "kelinci", "harimau", "kerbau", "tikus", "babi", "anjing"];
		$no_shio["monyet"] = ["monyet", "kambing", "kuda", "ular", "naga", "kelinci", "harimau", "kerbau", "tikus", "babi", "anjing", "ayam"];
		$no_shio["kambing"] = ["kambing", "kuda", "ular", "naga", "kelinci", "harimau", "kerbau", "tikus", "babi", "anjing", "ayam", "monyet"];
		$no_shio["kuda"] = ["kuda", "ular", "naga", "kelinci", "harimau", "kerbau", "tikus", "babi", "anjing", "ayam", "monyet", "kambing"];
		$no_shio["ular"] = ["ular", "naga", "kelinci", "harimau", "kerbau", "tikus", "babi", "anjing", "ayam", "monyet", "kambing", "kuda"];
		$no_shio["naga"] = ["naga", "kelinci", "harimau", "kerbau", "tikus", "babi", "anjing", "ayam", "monyet", "kambing", "kuda", "ular"];
		$no_shio["kelinci"] = ["kelinci", "harimau", "kerbau", "tikus", "babi", "anjing", "ayam", "monyet", "kambing", "kuda", "ular", "naga"];
		$no_shio["harimau"] = ["harimau", "kerbau", "tikus", "babi", "anjing", "ayam", "monyet", "kambing", "kuda", "ular", "naga", "kelinci"];
		$no_shio["kerbau"] = ["kerbau", "tikus", "babi", "anjing", "ayam", "monyet", "kambing", "kuda", "ular", "naga", "kelinci", "harimau"];
		$no_shio["tikus"] = ["tikus", "babi", "anjing", "ayam", "monyet", "kambing", "kuda", "ular", "naga", "kelinci", "harimau", "kerbau"];
		$no_shio["babi"] = ["babi", "anjing", "ayam", "monyet", "kambing", "kuda", "ular", "naga", "kelinci", "harimau", "kerbau", "tikus"];
		return $no_shio[$shio][$no12];
	}
}
$togel = new togel();
$togel->home_url = $home_url;
switch($_POST['page']){
	case "getlive":
		$getlive = $togel->getlive();
		if(isset($_POST['ajax'])){
			echo $getlive;
		}
		break;
	case "save-result-sgp":
		$togel->save_result_sgp();
		break;
	case "setlive":
		$setlive = $togel->setlive($_POST['name'], $_POST['data']);
		if(isset($_POST['ajax'])){
			echo $setlive;
		}
		break;
	case "togel-detail":
		$togel_detail = $togel->togel_detail($_POST['num']);
		if(isset($_POST['ajax'])){
			echo json_encode($togel_detail);
		}
		break;
	case "togel-shio":
		$togel_shio = $togel->togel_shio($_POST['shio'], $_POST['num']);
		if(isset($_POST['ajax'])){
			echo json_encode($togel_shio);
		}
		break;
}
?>