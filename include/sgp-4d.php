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
	$sgp4d_date = $togel->get_shio(date("Y-m-d"));
	$sgp4d_shio = $sgp4d_date['shio'];
?>
<div id="sgp">
<h3><span id="data-0">SINGAPORE 4D</span><img src="<?=$home_url?>images/<?php echo $dd; ?>.gif" style="float: right;" /></h3>

<div align="center" class="live_sgp">
<table align="center" border="0" class="live_4d" style="width: 100%;/*padding: 0 0 16px 0px;*/">
	<tbody>
		<tr>
			<td style="border-radius: 2px;" bgcolor="#2f3d41">
			<table border="0" class="resultTable2">
				<tbody>
					<tr>
						<td class="resultdrawdate" id="resultdraw_date"><span id="data-1"></span></td>
						<td class="resultdrawdate" id="resultdraw_draw"><span id="data-2"></span></td>
					</tr>
				</tbody>
			</table>

			<table border="0" style="width: 100%;">
				<tbody>
					<tr>
						<td class="result_prize">1<sup>st</sup>&nbsp; &nbsp;Prize</td>
						<td class="resulttop1" id="prize_1"><span id="data-3" animal="<?php echo $sgp4d_shio; ?>"></span></td>
					</tr>
					<tr>
						<td class="result_prize">2<sup>nd</sup>&nbsp; &nbsp;Prize</td>
						<td class="resulttop" id="prize_2"><span id="data-4"></span></td>
					</tr>
					<tr>
						<td class="result_prize">3<sup>rd</sup>&nbsp; &nbsp;Prize</td>
						<td class="resulttop" id="prize_3"><span id="data-5"></span></td>
					</tr>
				</tbody>
			</table>

			<table border="0" style="width: 100%;">
				<tbody>
					<tr>
						<td class="resultprizelable" colspan="5">Starter Prize</td>
					</tr>
				</tbody>
			</table>

			<table border="0" style="width: 100%;">
				<tbody>
					<tr>
						<td class="resultbottom" id="Starter_10"><span id="data-6"></span></td>
						<td class="resultbottom" id="Starter_9"><span id="data-7"></span></td>
						<td class="resultbottom" id="Starter_8"><span id="data-8"></span></td>
						<td class="resultbottom" id="Starter_7"><span id="data-9"></span></td>
						<td class="resultbottom" id="Starter_6"><span id="data-10"></span></td>
					</tr>
					<tr>
						<td class="resultbottom" id="Starter_5"><span id="data-11"></span></td>
						<td class="resultbottom" id="Starter_4"><span id="data-12"></span></td>
						<td class="resultbottom" id="Starter_3"><span id="data-13"></span></td>
						<td class="resultbottom" id="Starter_2"><span id="data-14"></span></td>
						<td class="resultbottom" id="Starter_1"><span id="data-15"></span></td>
					</tr>
				</tbody>
			</table>

			<table border="0" style="width: 100%;">
				<tbody>
					<tr>
						<td class="Consolation_Prize" colspan="5">Consolation Prize</td>
					</tr>
				</tbody>
			</table>

			<table border="0" style="width: 100%;">
				<tbody>
					<tr>
						<td class="resultbottom" id="Consolation_10"><span id="data-16"></span></td>
						<td class="resultbottom" id="Consolation_9"><span id="data-17"></span></td>
						<td class="resultbottom" id="Consolation_8"><span id="data-18"></span></td>
						<td class="resultbottom" id="Consolation_7"><span id="data-19"></span></td>
						<td class="resultbottom" id="Consolation_6"><span id="data-20"></span></td>
					</tr>
					<tr>
						<td class="resultbottom" id="Consolation_5"><span id="data-21"></span></td>
						<td class="resultbottom" id="Consolation_4"><span id="data-22"></span></td>
						<td class="resultbottom" id="Consolation_3"><span id="data-23"></span></td>
						<td class="resultbottom" id="Consolation_2"><span id="data-24"></span></td>
						<td class="resultbottom" id="Consolation_1"><span id="data-25"></span></td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
	</tbody>
</table>
<div class="menu_4d">
    <span style="background: #00293f;"><a href="<?php echo $home_url; ?>mobile/" target="_blank">View Mobile</a></span>
    <span><a href="<?php echo $home_url; ?>hasil-togel/sgp/2018">Hasil SGP</a></span>
</div>
</div>
</div>
<?php 
include_once $_SERVER['DOCUMENT_ROOT']."/include/togel-detail.php";
?>