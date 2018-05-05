<a href="http://899bola.net/?ref=dewa303" target="_blank"><img alt="agen togel" title="agen togel" src="/images/banner/dewahoki.gif" style="width: 668px; height: 60px;"></a><?php include_once $_SERVER['DOCUMENT_ROOT']."/bet.php"; ?><h2>LOMBA TOGEL 4D</h2>
<span class="lomba-macau">MACAU 45 TOTO</span>
<span class="period">Periode: <?php echo $common->DateToIndo($bet->get_periode()); ?></span>
<div id="main_content" style="overflow: hidden;overflow-y: scroll;height: 249px;">
<table border="0" cellpadding="0" cellspacing="0" width="640px">
	<tbody><?php $bet_list = $bet->get_betting();if(is_array($bet_list)){	foreach($bet_list as $bl){		$bet_time = new DateTime($bl['time']);		echo "<tr>			<td class='member'>".$bl['username']/* $common->hide_username() */."</td>			<td class='jawaban'>".$bl['number']."</td>			<td class='date'>".date_format($bet_time, 'D M j, g:i:sa')."</td>		</tr>";	}}?>
	</tbody>
</table>
</div>