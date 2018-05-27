<?php
	date_default_timezone_set('Asia/Jakarta');
	include_once $_SERVER['DOCUMENT_ROOT']."/togel.php";
	if($dd== ""){
                $dd= "live2";
		$weekdays = array("Wednesday", "Saturday", "Sunday");
		if(in_array(date('l'), $weekdays)){
		if (date('Hi') >= "1730" && date('Hi') <= "1740"){
			$dd= "live";
			}
		}
		
	}
	if($toto== ""){
        $toto= "live2";
		$weekdays = array("Monday", "Thursday");
		if(in_array(date('l'), $weekdays)){
			if (date('Hi') >= "1729" && date('Hi') <= "1734"){
				$toto= "live";
			}
		}
	}
	$togel->__construct();
	$sgptoto_date = $togel->get_shio(date("Y-m-d"));
	$sgptoto_shio = $sgptoto_date['shio'];
	$urlref = array("");
	if(in_array(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST), $urlref)){
?>
<div id="sgp">
<h3><span id="toto-0">SINGAPORE TOTO</span><img src="<?=$home_url?>images/<?php echo $toto; ?>.gif" style="float: right;" /></h3>

<div align="center" class="live_sgp">
<table align="center" border="0" class="live_4d" style="width: 100%;padding: 0 0 16px 0px;">
	<tbody>
		<tr>
			<td style="border-radius: 2px;" bgcolor="#2f3d41">
			<table border="0" class="resultTable2_toto">
				<tbody>
					<tr>
						<td class="resultdrawdate_toto" id="resultdrawdate_toto"><span id="toto-1">-- --- ---- (---)</span></td>
						<td class="resultdrawdate_toto" id="resultdrawdate_draw"><span id="toto-2">Draw No. -</span></td>
					</tr>
				</tbody>
			</table>

			<table border="0" style="width: 100%">
				<tbody>
					<tr>
						<td class="winning" colspan="6">Winning Numbers</td>
					</tr>
				</tbody>
			</table>

			<table border="0" style="width: 100%; border-radius:3px">
				<tbody>
					<tr style="border: 1px solid rgb(204, 204, 204);">
						<td class="result_toto" id="winning_1"><span id="toto-3">--</span></td>
						<td class="result_toto" id="winning_2"><span id="toto-4">--</span></td>
						<td class="result_toto" id="winning_3"><span id="toto-5">--</span></td>
						<td class="result_toto" id="winning_4"><span id="toto-6">--</span></td>
						<td class="result_toto" id="winning_5"><span id="toto-7">--</span></td>
						<td class="result_toto" id="winning_6"><span id="toto-8">--</span></td>
					</tr>
				</tbody>
			</table>

			<table border="0" style="width: 100%;">
				<tbody>
					<tr>
						<td class="additional" colspan="6">Additional Number</td>
					</tr>
				</tbody>
			</table>

			<table border="0" style="width: 100%;">
				<tbody>
					<tr>
						<td style="border:none">&nbsp;</td>
						<td style="border:none">&nbsp;</td>
						<td class="add_toto" colspan="2" id="add_toto"><span id="toto-9">--</span></td>
						<td style="border:none">&nbsp;</td>
						<td style="border:none">&nbsp;</td>
					</tr>
				</tbody>
			</table>

			<table border="0" class="jadwal_toto" style="width: 100%;">
				<tbody>
					<tr>
						<td align="center" class="result_49" colspan="6">RESULT :&nbsp; &nbsp;<span class="resulttop_toto" id="resulttop_toto"><span id="toto-10" animal="<?php echo $sgptoto_shio; ?>">--</span></span></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td></td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
	</tbody>
</table>
</div>
</div>
<?php 
	include_once $_SERVER['DOCUMENT_ROOT']."/include/togel-detail.php";
	}
?>