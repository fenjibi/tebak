<?php
include 'config.php';
class toto {
	function __construct() {
		$this->mysqli = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
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
$toto = new toto();
?>