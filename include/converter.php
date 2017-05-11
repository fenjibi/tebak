<h3>CONVERTER</h3>
<table align="center" border="0" bordercolor="#111111" cellpadding="0" cellspacing="0" height="37" id="AutoNumber15" style="border-collapse: collapse;margin: 0 auto;" width="250">
							<tbody>
								<tr>
									<td height="242" valign="top" width="97%">
									<p style="text-align: center;"><em><span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;color: whitesmoke;">Masukkan bola terkecil terlebih dahulu</span></span></em></p>
									<script language="javascript">
function fCheckNum(Isi){
if(isNaN(Isi.value)==true){ Isi.value="";Isi.focus();}else{fCalculate();}

}
function fCalculate(){
  var ekor=0;
  var ekor1=0
  var kop=0;
  var asi=0;
  var j;
  //with (document.all.item("totfrm").tags("INPUT")){
  with (document.getElementById("totfrm").getElementsByTagName("INPUT")){
  for(j=0;j<7;j++){
    if (item(j).value==""){
       ekor=parseInt(ekor);
       }else{
       if (j==1||j==2||j==3||j==4){
          ekor1=parseInt(ekor1)+parseInt(item(j).value);
          if (j==1||j==2){
             asi=parseInt(asi)+parseInt(item(j).value);
          }else{
             kop=parseInt(kop)+parseInt(item(j).value);
          }
       }else{ekor=parseInt(ekor)+parseInt(item(j).value);}
       }
  }
  ekor = ekor+ekor1*2;
  ekor=ekor.toString();
  ekor=ekor.substr(parseInt(ekor.length)-2);
  asi=asi.toString();
  asi=asi.substr(parseInt(asi.length)-1);
  kop=kop.toString();
  kop=kop.substr(parseInt(kop.length)-1);
  item(7).value=asi+kop+ekor;
  }
  //document.getElementByName("varCrtl").value=document.getElementById("totfrm").getElementsByTagName("INPUT").item(7).value;
}
function fHapus(){
  var j;
  with (document.getElementById("totfrm").getElementsByTagName("INPUT")){
  for(j=0;j<8;j++)
      item(j).value="";
}
document.getElementById("totfrm").getElementsByTagName("INPUT").item(0).focus();
}
</script>

									<form id="totfrm" name="totfrm">
									<div align="center">
									<center>
									<table border="0" bordercolor="#111111" cellpadding="0" cellspacing="0" height="203" style="border-collapse: collapse" width="250">
										<tbody>
											<tr>
												<td bgcolor="#666666" colspan="6" height="16" width="250">
												<p align="center" style="margin-top: 0; margin-bottom: 0;text-shadow: 1px 1px 1px #333;"><b><font color="#F18E02" face="Arial" size="2">Winning Numbers</font></b></p>
												</td>
											</tr>
											<tr>
												<td align="center" height="36" width="40"><input class="inp1" maxlength="2" onkeyup="fCheckNum(this)" size="1" style="text-align:center;font-weight:bold;color:blue" type="text"></td>
												<td align="center" height="36" width="40"><input class="inp1" maxlength="2" onkeyup="fCheckNum(this)" size="1" style="text-align:center;font-weight:bold;color:blue" type="text"></td>
												<td align="center" height="36" width="40"><input class="inp1" maxlength="2" onkeyup="fCheckNum(this)" size="1" style="text-align:center;font-weight:bold;color:blue" type="text"></td>
												<td align="center" height="36" width="40"><input class="inp1" maxlength="2" onkeyup="fCheckNum(this)" size="1" style="text-align:center;font-weight:bold;color:blue" type="text"></td>
												<td align="center" height="36" width="40"><input class="inp1" maxlength="2" onkeyup="fCheckNum(this)" size="1" style="text-align:center;font-weight:bold;color:blue" type="text"></td>
												<td align="center" height="36" width="40"><input class="inp1" maxlength="2" onkeyup="fCheckNum(this)" size="1" style="text-align:center;font-weight:bold;color:blue" type="text"></td>
											</tr>
											<tr>
												<td bgcolor="#666666" colspan="6" height="16" width="250">
												<p align="center" style="margin:5px;text-shadow: 1px 1px 1px #333;"><b><font color="#F18E02" face="Arial" size="2">Additional Number</font></b></p>
												</td>
											</tr>
											<tr>
												<td colspan="6" height="35" width="250">
												<p align="center"><input class="inp1" maxlength="2" name="1" onkeyup="fCheckNum(this)" size="1" style="text-align:center;font-weight:bold;color:red"></p>
												</td>
											</tr>
											<tr>
												<td bgcolor="#666666" colspan="6" height="16" width="250">
												<p align="center" style="margin:15px;text-shadow: 1px 1px 1px #333;"><font color="#F18E02" face="Arial" size="3">Results&nbsp;&nbsp;</font> <span style="background-color: #00FFFF"><font face="Times New Roman"><input name="Tickt" readonly="true" size="3" style="border:1px solid #fff; font-family:Arial; font-weight:bold; font-size:14pt; background-color:#000; text-align:center; color:yellow" type="text"></font></span></p>
												</td>
											</tr>
											<tr>
												<td colspan="6" height="36" width="250">
												<p align="center" style="margin-top: 0; margin-bottom: 0"><tr'><input id="hapus0" name="hapus" onclick="fHapus()" type="button" value="Clear"></tr'><font color="#000" face="Arial" size="2">&nbsp;&nbsp;<a href="http://www.hasiltogel.club/" style="color:#06F;text-decoration: none;"><em>www.HasilTogel.Club</em></a></font></p>
												</td>
											</tr>
										</tbody>
									</table>
									</center>
									</div>
									</form>
									</td>
								</tr>
							</tbody>
						</table>