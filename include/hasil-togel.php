<?php 
$uri_data = explode("/", $_GET['data']);
$togel_region = strtoupper($uri_data[0])." ".$uri_data[1];
?>
<h2 style="margin-bottom: 10px;"><a href="<?php echo $home_url.substr($_SERVER['REQUEST_URI'], 1); ?>" style="color: #c6ff00; text-decoration: underline;">HASIL TOGEL <?php echo $togel_region; ?></a></h2>
<table border="0" cellpadding="1" id="hasil_togel" width="100%">
	<tbody>
		<tr>
			<th>SENIN</th>
			<th>RABU</th>
			<th>KAMIS</th>
			<th>SABTU</th>
			<th>MINGGU</th>
		</tr>
<?php 
include_once $_SERVER['DOCUMENT_ROOT']."/togel.php";
$hasil_togel = $togel->get_hasil_togel($uri_data[0], $uri_data[1]);
$row = $hasil_togel['data'];
$a = 0;
$nomor = '';
while ($a < $hasil_togel['count']) {
	echo "<tr>";
	for($i=0; $i<5; $i++){
		if($nomor != ''){
			$a++;
		}
		switch ($i) {
			case 0:
			$nomor = (date( 'l',strtotime($row[$a]['tanggal']) ) == 'Monday') ? $row[$a]['nomor'] : '';
			break;
			case 1:
			$nomor = (date( 'l', strtotime($row[$a]['tanggal']) ) == 'Wednesday') ? $row[$a]['nomor'] : '';
			break;
			case 2:
			$nomor = (date( 'l', strtotime($row[$a]['tanggal']) ) == 'Thursday') ? $row[$a]['nomor'] : '';
			break;
			case 3:
			$nomor = (date( 'l', strtotime($row[$a]['tanggal']) ) == 'Saturday') ? $row[$a]['nomor'] : '';
			break;
			case 4:
			$nomor = (date( 'l', strtotime($row[$a]['tanggal']) ) == 'Sunday') ? $row[$a]['nomor'] : '';
			break;
		}
		$togel->__construct();
		$togel_date = $togel->get_shio($row[$a]['tanggal']);
		$shio = $togel_date['shio'];
		echo "<td align='center' style='border:0px;' width='20%'>".($nomor!='' ? "<span class='todet' animal='".$shio."'>".$nomor."</span>" : $nomor)."</td>";
	}
	echo "</tr>";
}
?>
	</tbody>
</table>
<?php 
include_once $_SERVER['DOCUMENT_ROOT']."/include/togel-detail.php";
?>