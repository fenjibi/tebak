<?php
	date_default_timezone_set('Asia/Jakarta');
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
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/jquery.loading.js"></script>
<script type="text/javascript" src="js/latest.js"></script>
<script type="text/javascript" src="js/live.sgp.js"></script>
</head>
<body>
<div align="center" class="live_sgp">
<table align="center" border="0" class="live_4d" style="width: 490px;">
	<tbody>
		<tr>
			<td style="border-radius: 2px;" bgcolor="#E1F4FF">
			<table border="0" width="238px">
				<tbody>
					<tr>
						<td class="resultm4dlable"><img src="img/<?php echo $dd; ?>.gif" /><span style="margin-left:20px">SINGAPORE 4D</span></td>
					</tr>
				</tbody>
			</table>

			<table border="1" class="resultTable2">
				<tbody>
					<tr>
						<td class="resultdrawdate" id="resultdraw_date"></td>
						<td class="resultdrawdate" id="resultdraw_draw"></td>
					</tr>
				</tbody>
			</table>

			<table border="1" style="width: 238px;">
				<tbody>
					<tr>
						<td class="result_prize">1<sup>st</sup>&nbsp; &nbsp;Prize</td>
						<td class="resulttop1" id="prize_1"></td>
					</tr>
					<tr>
						<td class="result_prize">2<sup>nd</sup>&nbsp; &nbsp;Prize</td>
						<td class="resulttop" id="prize_2"></td>
					</tr>
					<tr>
						<td class="result_prize">3<sup>rd</sup>&nbsp; &nbsp;Prize</td>
						<td class="resulttop" id="prize_3"></td>
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
						<td class="resultbottom" id="Starter_10"></td>
						<td class="resultbottom" id="Starter_9"></td>
						<td class="resultbottom" id="Starter_8"></td>
						<td class="resultbottom" id="Starter_7"></td>
						<td class="resultbottom" id="Starter_6"></td>
					</tr>
					<tr>
						<td class="resultbottom" id="Starter_5"></td>
						<td class="resultbottom" id="Starter_4"></td>
						<td class="resultbottom" id="Starter_3"></td>
						<td class="resultbottom" id="Starter_2"></td>
						<td class="resultbottom" id="Starter_1"></td>
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
						<td class="resultbottom" id="Consolation_10"></td>
						<td class="resultbottom" id="Consolation_9"></td>
						<td class="resultbottom" id="Consolation_8"></td>
						<td class="resultbottom" id="Consolation_7"></td>
						<td class="resultbottom" id="Consolation_6"></td>
					</tr>
					<tr>
						<td class="resultbottom" id="Consolation_5"></td>
						<td class="resultbottom" id="Consolation_4"></td>
						<td class="resultbottom" id="Consolation_3"></td>
						<td class="resultbottom" id="Consolation_2"></td>
						<td class="resultbottom" id="Consolation_1"></td>
					</tr>
				</tbody>
			</table>
			</td>
			<td></td>
			<td style="border-radius: 2px;" bgcolor="#E1F4FF">
			<table border="0" width="238px">
				<tbody>
					<tr>
						<td class="resultm4dlable_toto"><img src="img/<?php echo $toto; ?>.gif" /><span style="margin-left:20px">SINGAPORE TOTO</span></td>
					</tr>
				</tbody>
			</table>

			<table border="1" class="resultTable2_toto">
				<tbody>
					<tr>
						<td class="resultdrawdate_toto" id="resultdrawdate_toto">21-04-2016 (Kamis)</td>
						<td class="resultdrawdate_toto" id="resultdrawdate_draw">Draw No: 3000</td>
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
						<td class="result_toto" id="winning_1"></td>
						<td class="result_toto" id="winning_2"></td>
						<td class="result_toto" id="winning_3"></td>
						<td class="result_toto" id="winning_4"></td>
						<td class="result_toto" id="winning_5"></td>
						<td class="result_toto" id="winning_6"></td>
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
						<td class="add_toto" colspan="2" id="add_toto">&nbsp;</td>
						<td style="border:none">&nbsp;</td>
						<td style="border:none">&nbsp;</td>
					</tr>
				</tbody>
			</table>

			<table border="0" class="jadwal_toto" style="width: 238px;">
				<tbody>
					<tr>
						<td align="center" class="result_49" colspan="6">RESULT&nbsp; &nbsp;<span class="resulttop_toto" id="resulttop_toto"></span></td>
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
