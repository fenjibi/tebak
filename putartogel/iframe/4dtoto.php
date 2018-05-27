<?php
	date_default_timezone_set('Asia/Jakarta');
	$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https:" : "http:";
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
?>
<!doctype html>
<html>
<head>
<title></title>
<link href="css/sg.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo $protocol."//".$_SERVER['SERVER_NAME']."/"; ?>js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="<?php echo $protocol."//".$_SERVER['SERVER_NAME']."/"; ?>js/live.js"></script>
<script type="text/javascript" src="js/jquery.loading.js"></script>
<script type="text/javascript" src="js/latest.js"></script>
</head>
<body>
<div align="center" class="live_sgp">
<table id="sgp" align="center" border="0" class="live_4d" style="width: 490px;">
	<tbody>
		<tr>
			<td style="border-radius: 2px;" bgcolor="#E1F4FF">
				<table border="0" width="238px">
					<tbody>
						<tr>
							<td class="resultm4dlable"><img src="img/<?php echo $dd; ?>.gif" /><span id="data-0" style="margin-left:20px">SINGAPORE 4D</span></td>
						</tr>
					</tbody>
				</table>
				<table border="1" class="resultTable2">
					<tbody>
						<tr>
							<td class="resultdrawdate" id="data-1"></td>
							<td class="resultdrawdate" id="data-2"></td>
						</tr>
					</tbody>
				</table>
				<table border="1" style="width: 238px;">
					<tbody>
						<tr>
							<td class="result_prize">1<sup>st</sup>&nbsp; &nbsp;Prize</td>
							<td class="resulttop1" id="data-3"></td>
						</tr>
						<tr>
							<td class="result_prize">2<sup>nd</sup>&nbsp; &nbsp;Prize</td>
							<td class="resulttop" id="data-4"></td>
						</tr>
						<tr>
							<td class="result_prize">3<sup>rd</sup>&nbsp; &nbsp;Prize</td>
							<td class="resulttop" id="data-5"></td>
						</tr>
					</tbody>
				</table>
				<table border="1" style="width: 238px;">
					<tbody>
						<tr>
							<td class="resultprizelable" colspan="5">Starter Prize</td>
						</tr>
					</tbody>
				</table>
				<table border="1" style="width: 238px;">
					<tbody>
						<tr>
							<td class="resultbottom" id="data-6"></td>
							<td class="resultbottom" id="data-7"></td>
							<td class="resultbottom" id="data-8"></td>
							<td class="resultbottom" id="data-9"></td>
							<td class="resultbottom" id="data-10"></td>
						</tr>
						<tr>
							<td class="resultbottom" id="data-11"></td>
							<td class="resultbottom" id="data-12"></td>
							<td class="resultbottom" id="data-13"></td>
							<td class="resultbottom" id="data-14"></td>
							<td class="resultbottom" id="data-15"></td>
						</tr>
					</tbody>
				</table>
				<table border="1" style="width: 238px;">
					<tbody>
						<tr>
							<td class="Consolation_Prize" colspan="5">Consolation Prize</td>
						</tr>
					</tbody>
				</table>
				<table border="1" style="width: 238px;">
					<tbody>
						<tr>
							<td class="resultbottom" id="data-16"></td>
							<td class="resultbottom" id="data-17"></td>
							<td class="resultbottom" id="data-18"></td>
							<td class="resultbottom" id="data-19"></td>
							<td class="resultbottom" id="data-20"></td>
						</tr>
						<tr>
							<td class="resultbottom" id="data-21"></td>
							<td class="resultbottom" id="data-22"></td>
							<td class="resultbottom" id="data-23"></td>
							<td class="resultbottom" id="data-24"></td>
							<td class="resultbottom" id="data-25"></td>
						</tr>
					</tbody>
				</table>
			</td>
			<td></td>
			<td style="border-radius: 2px;" bgcolor="#E1F4FF">
				<table border="0" width="238px">
					<tbody>
						<tr>
							<td class="resultm4dlable_toto"><img src="img/<?php echo $toto; ?>.gif" /><span id="toto-0" style="margin-left:20px">SINGAPORE TOTO</span></td>
						</tr>
					</tbody>
				</table>
				<table border="1" class="resultTable2_toto">
					<tbody>
						<tr>
							<td class="resultdrawdate_toto" id="toto-1">21-04-2016 (Kamis)</td>
							<td class="resultdrawdate_toto" id="toto-2">Draw No: 3000</td>
						</tr>
					</tbody>
				</table>
				<table border="0" style="width: 238px">
					<tbody>
						<tr>
							<td class="winning" colspan="6">Winning Numbers</td>
						</tr>
					</tbody>
				</table>
				<table border="1" style="width: 238px;border-radius:3px">
					<tbody>
						<tr style="border: 1px solid rgb(204, 204, 204);">
							<td class="result_toto" id="toto-3"></td>
							<td class="result_toto" id="toto-4"></td>
							<td class="result_toto" id="toto-5"></td>
							<td class="result_toto" id="toto-6"></td>
							<td class="result_toto" id="toto-7"></td>
							<td class="result_toto" id="toto-8"></td>
						</tr>
					</tbody>
				</table>
				<table border="0" style="width: 238px;">
					<tbody>
						<tr>
							<td class="additional" colspan="6">Additional Number</td>
						</tr>
					</tbody>
				</table>
				<table border="0" style="width: 238px;">
					<tbody>
						<tr>
							<td style="border:none">&nbsp;</td>
							<td style="border:none">&nbsp;</td>
							<td class="add_toto" colspan="2" id="toto-9">&nbsp;</td>
							<td style="border:none">&nbsp;</td>
							<td style="border:none">&nbsp;</td>
						</tr>
					</tbody>
				</table>
				<table border="0" class="jadwal_toto" style="width: 238px;">
					<tbody>
						<tr>
							<td align="center" class="result_49" colspan="6">RESULT&nbsp; &nbsp;<span class="resulttop_toto" id="toto-10"></span></td>
						</tr>
						<tr>
							<td>SINGAPORE 4D</td>
							<td>Pukul 17.32 WIB</td>
						</tr>
						<tr>
							<td>SINGAPORE TOTO</td>
							<td>Pukul 17.31 WIB</td>
						</tr>
						<tr>
							<td class="copyright" colspan="2">Support by: <a href="http://hasiltogel.club/" style="text-decoration:none" target="_blank"><span style="color:#06F">HasilTogel.Club</span></a></td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>
</div>
</body>
</html>
