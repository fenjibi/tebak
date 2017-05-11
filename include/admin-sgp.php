<div id="main_content">
<?php
// session_start();
if($get_user['position'] == 2){
$data_path = $_SERVER['DOCUMENT_ROOT'].'/data/';

$sgptoto = fopen($data_path.'sgp_toto-json.php', "r") or die("Unable to open file!");
$sgptoto_data = fread($sgptoto,filesize($data_path.'sgp_toto-json.php'));
$sgptoto_arr = explode(',', $sgptoto_data);

$sgp4d = fopen($data_path.'sgp_4d-json.php', "r") or die("Unable to open file!");
$sgp4d_data = fread($sgp4d,filesize($data_path.'sgp_4d-json.php'));
$sgp4d_arr = explode(',', $sgp4d_data);

echo "<link rel='stylesheet' type='text/css' href='".$home_url."putartogel/toto.css'>";

echo "<table align='center' id='fourd' style='margin-bottom: 20px;'>".
	"<tr>"."<th colspan='5'><input type='text' class='head_4d' name='nm' value='".str_replace('"', '', trim(str_replace('[', '', $sgp4d_arr[0])))."'></th>"."</tr>".
	"<tr><td colspan='3'><input type='text' name='time' value='".str_replace('"', '', trim($sgp4d_arr[1]))."'></td>".
		"<td colspan='2'><input type='text' name='no' value='".str_replace('"', '', trim($sgp4d_arr[2]))."'></td></tr>".
	"<tr><td colspan='5' align='center'>
		<input type='text' name='prize1' maxlength='4' class='num' value='".str_replace('"', '', trim($sgp4d_arr[3]))."'>
		<button type='button' id='result4d'>Save Result</button>
	</td></tr>".
	"<tr><td colspan='5' align='center'><input type='text' name='prize2' maxlength='4' class='num' value='".str_replace('"', '', trim($sgp4d_arr[4]))."'></td></tr>".
	"<tr><td colspan='5' align='center'><input type='text' name='prize3' maxlength='4' class='num' value='".str_replace('"', '', trim($sgp4d_arr[5]))."'></td></tr>".
	"<tr><td><input type='text' class='result_starter num' name='starter1' maxlength='4' value='".str_replace('"', '', trim($sgp4d_arr[6]))."'></td>".
		"<td><input type='text' class='result_starter num' name='starter2' maxlength='4' value='".str_replace('"', '', trim($sgp4d_arr[7]))."'></td>".
		"<td><input type='text' class='result_starter num' name='starter3' maxlength='4' value='".str_replace('"', '', trim($sgp4d_arr[8]))."'></td>".
		"<td><input type='text' class='result_starter num' name='starter4' maxlength='4' value='".str_replace('"', '', trim($sgp4d_arr[9]))."'></td>".
		"<td><input type='text' class='result_starter num' name='starter5' maxlength='4' value='".str_replace('"', '', trim($sgp4d_arr[10]))."'></td></tr>".
	"<tr><td><input type='text' class='result_starter num' name='starter6' maxlength='4' value='".str_replace('"', '', trim($sgp4d_arr[11]))."'></td>".
		"<td><input type='text' class='result_starter num' name='starter7' maxlength='4' value='".str_replace('"', '', trim($sgp4d_arr[12]))."'></td>".
		"<td><input type='text' class='result_starter num' name='starter8' maxlength='4' value='".str_replace('"', '', trim($sgp4d_arr[13]))."'></td>".
		"<td><input type='text' class='result_starter num' name='starter9' maxlength='4' value='".str_replace('"', '', trim($sgp4d_arr[14]))."'></td>".
		"<td><input type='text' class='result_starter num' name='starter10' maxlength='4' value='".str_replace('"', '', trim($sgp4d_arr[15]))."'></td></tr>".
	"<tr><td><input type='text' class='result_consolation num' name='consolation1' maxlength='4' value='".str_replace('"', '', trim($sgp4d_arr[16]))."'></td>".
		"<td><input type='text' class='result_consolation num' name='consolation2' maxlength='4' value='".str_replace('"', '', trim($sgp4d_arr[17]))."'></td>".
		"<td><input type='text' class='result_consolation num' name='consolation3' maxlength='4' value='".str_replace('"', '', trim($sgp4d_arr[18]))."'></td>".
		"<td><input type='text' class='result_consolation num' name='consolation4' maxlength='4' value='".str_replace('"', '', trim($sgp4d_arr[19]))."'></td>".
		"<td><input type='text' class='result_consolation num' name='consolation5' maxlength='4' value='".str_replace('"', '', trim($sgp4d_arr[20]))."'></td></tr>".
	"<tr><td><input type='text' class='result_consolation num' name='consolation6' maxlength='4' value='".str_replace('"', '', trim($sgp4d_arr[21]))."'></td>".
		"<td><input type='text' class='result_consolation num' name='consolation7' maxlength='4' value='".str_replace('"', '', trim($sgp4d_arr[22]))."'></td>".
		"<td><input type='text' class='result_consolation num' name='consolation8' maxlength='4' value='".str_replace('"', '', trim($sgp4d_arr[23]))."'></td>".
		"<td><input type='text' class='result_consolation num' name='consolation9' maxlength='4' value='".str_replace('"', '', trim($sgp4d_arr[24]))."'></td>".
		"<td><input type='text' class='result_consolation num' name='consolation10' maxlength='4' value='".str_replace('"', '', trim(str_replace(']', '', $sgp4d_arr[25])))."'></td></tr>".
	"<tr><td colspan='5' align='center'><button type='button' id='save4d'>Submit</button></td></tr>".
"</table>";

echo "<table align='center' id='toto'>".
	"<tr>"."<th colspan='6'><input type='text' class='head_toto' name='nm' value='".str_replace('"', '', trim(str_replace('[', '', $sgptoto_arr[0])))."'></th>"."</tr>".
	"<tr><td colspan='3'><input type='text' name='time' value='".str_replace('"', '', trim($sgptoto_arr[1]))."'></td>".
		"<td colspan='3'><input type='text' name='no' value='".str_replace('"', '', trim($sgptoto_arr[2]))."'></td></tr>".
	"<tr><td><input type='text' class='rst_toto num' name='toto1' maxlength='2' value='".str_replace('"', '', trim($sgptoto_arr[3]))."'></td>".
		"<td><input type='text' class='rst_toto num' name='toto2' maxlength='2' value='".str_replace('"', '', trim($sgptoto_arr[4]))."'></td>".
		"<td><input type='text' class='rst_toto num' name='toto3' maxlength='2' value='".str_replace('"', '', trim($sgptoto_arr[5]))."'></td>".
		"<td><input type='text' class='rst_toto num' name='toto4' maxlength='2' value='".str_replace('"', '', trim($sgptoto_arr[6]))."'></td>".
		"<td><input type='text' class='rst_toto num' name='toto5' maxlength='2' value='".str_replace('"', '', trim($sgptoto_arr[7]))."'></td>".
	"<td><input type='text' class='rst_toto num' name='toto6' maxlength='2' value='".str_replace('"', '', trim($sgptoto_arr[8]))."'></td></tr>".
	"<tr><td colspan='6' align='center'><input type='text' class='adm_toto num' name='toto7' maxlength='2' value='".str_replace('"', '', trim($sgptoto_arr[9]))."'></td></tr>".
	"<tr><td colspan='6' align='center'>
		<input type='text' class='head_toto num' name='toto8'  maxlength='4' value='".str_replace('"', '', trim(str_replace(']', '', $sgptoto_arr[10])))."'>
		<button type='button' id='resulttoto'>Save Result</button>
	</td></tr>".
	"<tr><td colspan='6' align='center'><button type='button' id='savetoto'>Submit</button></td></tr>".
	"<tr><td colspan='6' align='right'>&nbsp;</td></tr>".
"</table>";
fclose($sgptoto);
fclose($sgp4d);
include($_SERVER['DOCUMENT_ROOT']."/putartogel/save.js");
}
?>
</div>