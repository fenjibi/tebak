<?php 
include_once $_SERVER['DOCUMENT_ROOT']."/football_match.php";
$highlight_match = $football_match->get_match();
foreach($highlight_match as $highlight){
	if(!is_null($highlight['home_highlight'])){
		$hldt = new DateTime($highlight['time']);
		$hlhome_icon = $highlight['home_team_icon'];
		$hlhome_name = $highlight['home_team_name'];
		$hlhome = $highlight['home_highlight'];
		$hlaway = $highlight['away_highlight'];
		$hlaway_name = $highlight['away_team_name'];
		$hlaway_icon = $highlight['away_team_icon'];
	}
}
?>
<h2 style="background: none;padding: 0 0 18px 0px;">KUIS TEBAK SKOR</h2>
<table cellpadding="0" cellspacing="0" style="margin: 0 auto;" width="600">
	<tbody>
		<tr>
			<td valign="top" width="100" style="box-shadow: 2px 4px 9px #000000; border-radius: 6px; background: rgba(0,0,0,0.1);">
				<img height="100" style="padding: 18px 5px 0px 5px;" src="<?php echo $hlhome_icon; ?>" />
			</td>
			<td>
				<center>
					<b>
					<font size='2' style='color: #fff; font-size: 18px;'><?php echo $hlhome_name; ?>
						&nbsp;&nbsp;<font color='red' size='5'><?php echo $hlhome."&nbsp;:&nbsp;".$hlaway; ?></font>&nbsp;&nbsp;
					<?php echo $hlaway_name; ?></font>
					</b>
					<br />
					<font size='2'><?php echo $hldt->format('l, F d, Y H:i'); ?></font>
					<span id='start_date' style='display: none;'><?php echo $hldt->format('m/d/Y H:i'); ?></span>
					<center>
						<br />
						<b style="letter-spacing: 3px;font-size: 14px;color: #07f236;">KICKOFF COUNTDOWN:</b>
						<br />
						<span id="countdown">
							<table cellpadding="0" cellspacing="0" class="countdown_tbl">
								<tbody>
									<tr>
										<td></td>
										<td class="sep">|</td>
										<td></td>
										<td class="sep">|</td>
										<td></td>
										<td class="sep">|</td>
										<td></td>
									</tr>
									<tr>
										<th>days</th>
										<th>&nbsp;</th>
										<th>hrs</th>
										<th>&nbsp;</th>
										<th>mins</th>
										<th>&nbsp;</th>
										<th>secs</th>
									</tr>
								</tbody>
							</table>
						</span>
						<br />
						<span id="cnt_end" style="display:none">Match kicked off!</span>
					</center>
				</center>
			</td>
			<td align="right" valign="top" width="100" style="box-shadow: -2px 4px 9px #000000; border-radius: 6px; background: rgba(0,0,0,0.1);">
				<img height="100" style="padding: 18px 5px 0px 5px;" src="<?php echo $hlaway_icon; ?>" />
			</td>
		</tr>
	</tbody>
</table>
<table cellpadding="0" cellspacing="0" style="margin: 0 auto;text-align: center;">
	<tbody>
		<tr>
			<td>
				<a href="<?php echo $home_url; ?>live-bola">
					<span style="font-size: 16px;">Watch Live Here</span>
				</a>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td style="background-color: #0288d1; padding: 6px; box-shadow: 0px 2px 1px 1px #151515; border-radius: 5px; color: #fff;">
				<a href="<?php echo $home_url; ?>tebak-skor" style="color: #000000;font-weight: 700;">
					<span class="blink">TEBAK SEKARANG</span>
				</a>
			</td>
		</tr>
	</tbody>
</table>
<script type="text/javascript" src="<?php echo $home_url; ?>js/count.js"></script>
<script>
$(function() {
	init();
});
</script>
<!-- table cellpadding="0" cellspacing="0"><tbody><tr>

<td width="160" valign="top" align="left">

<img src="/images/458.png" width="100" height="100">

</td>

<td valign="top" nowrap="">

<center>

<b><font size="3" color="#000080"><a href="#" target="_blank">JayaBola</a> Head-to-Head

Statistics:<br>

</font></b>

<b>

<font size="2">Atletico Junior Barranquilla &nbsp;&nbsp;<font color="red" size="5">0 : 0</font>&nbsp;&nbsp; Millonarios</font></b>

<br><font size="2">

Thursday, March 30, 2017

07:45 HRS

<style type="text/css">.countdown_tbl th{font-size:10px;font-weight:400;}.countdown_tbl td{font-size:24px;color:336699;font-weight:700;width:36px;}.countdown_tbl .sep{font-size:16px;width:3px;font-weight:400;}.countdown_tbl{border:none;text-align:center;font-family:sans-serif;}div.countdown_tbl{font-size:18px;font-weight:700;}</style><script type="text/javascript">var hidden=[],of="all",pf="0",trgEl="countdown",trgDate,lbtype="fo";function init(){if(document.getElementById("start_date")){var a=document.getElementById("start_date").innerHTML;trgDate=new Date(a);trgDate.setTime(trgDate.getTime()-trgDate.getTimezoneOffset()*6E4);countdown();setInterval(countdown,1E3);typeof eID!="undefined"&&setInterval(refreshTab,3E4)}}function pad(a){return a>9?a:"0"+a} function countdown(){var a=new Date;a.setTime(a.getTime()+288E5);var c=trgDate.getTime()-a.getTime(),b;if(c<0)document.getElementById("cnt_end").style.display="inline",b="";else{var d;d=pad(Math.floor(c/864E5));b='<table cellspacing="0" cellpadding="0" class="countdown_tbl"><tr>';b+="<td>"+d+'</td><td class="sep">|</td>';c%=864E5;b+="<td>"+pad(Math.floor(c/36E5))+'</td><td class="sep">|</td>';c%=36E5;b+="<td>"+pad(Math.floor(c/6E4))+'</td><td class="sep">|</td>';c%=6E4;b+="<td>"+pad(Math.floor(c/ 1E3))+"</td>";b+="</tr><tr><th>days</th><th>&nbsp;</th><th>hrs</th><th>&nbsp;</th><th>mins</th><th>&nbsp;</th><th>secs</th></th></tr></table>"}if(document.getElementById(trgEl)&&b)document.getElementById(trgEl).innerHTML=b;if(document.getElementById("sing_time"))document.getElementById("sing_time").innerHTML=a.getUTCDate()+"."+pad(a.getUTCMonth()+1)+"."+a.getUTCFullYear()+" "+a.getUTCHours()+":"+pad(a.getUTCMinutes())+":"+pad(a.getUTCSeconds())};</script>

<center><br><b>Kickoff Countdown:</b><br><span id="countdown"><table cellspacing="0" cellpadding="0" class="countdown_tbl"><tbody><tr><td>00</td><td class="sep">|</td><td>06</td><td class="sep">|</td><td>02</td><td class="sep">|</td><td>25</td></tr><tr><th>days</th><th>&nbsp;</th><th>hrs</th><th>&nbsp;</th><th>mins</th><th>&nbsp;</th><th>secs</th></tr></tbody></table></span>

<span id="cnt_end" style="display:none"><br>Match kicked off!<br></span></center>

 <span id="start_date" style="visibility:hidden">03/30/2017 07:45</span></font>

<script>init();</script>



</center></td>

<td width="160" valign="top" align="right">

<img src="/images/465.png" width="100" height="100">

</td>

</tr>

</tbody></table -->