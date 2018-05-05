<div id="togel_modal" class="modal">
	<div class="modal-content">
		<div class="modal-header">
			<span class="close">X TUTUP</span>
			<h3>&nbsp;</h3>
		</div>
		<div class="modal-body">
			<table style="border:1px solid #ccc" cellpadding="0" cellspacing="0" width="100%">
				<tbody>
					<tr bgcolor="#006699" style="color:white">
						<td rowspan="2" width="40%">GAMES</td>
						<td colspan="4" width="60%">ABCD, A=As, B=Kop, C=Kepala, D=Ekor</td>
					</tr>
					<tr bgcolor="#006699" style="color:white">
						<td width="15%">As</td>
						<td width="15%">Kop</td>	
						<td width="15%">Kepala</td>
						<td width="15%">Ekor</td>
					</tr>
					<tr>
						<td width="40%">4D</td>
						<td width="15%" id="fourd0"></td>
						<td width="15%" id="fourd1"></td>
						<td width="15%" id="fourd2"></td>
						<td width="15%" id="fourd3"></td>
					</tr>
					<tr>
						<td width="40%">3D</td>
						<td width="15%" id="threed0">-</td>
						<td width="15%" id="threed1"></td>
						<td width="15%" id="threed2"></td>
						<td width="15%" id="threed3"></td>
					</tr>
					<tr>
						<td width="40%">2D</td>
						<td width="15%" id="twod0">-</td>
						<td width="15%" id="twod1">-</td>
						<td width="15%" id="twod2"></td>
						<td width="15%" id="twod3"></td>
					</tr>
					<tr>
						<td width="40%">Colok&nbsp;&nbsp;Bebas</td>
						<td width="15%" id="cbebas0"></td>
						<td width="15%" id="cbebas1"></td>
						<td width="15%" id="cbebas2"></td>
						<td width="15%" id="cbebas3"></td>
					</tr>
					<tr>
						<td width="40%">Kombinasi</td>
						<td width="15%" id="koddeven0"></td>
						<td width="15%" id="koddeven1"></td>
						<td width="15%" id="koddeven2"></td>
						<td width="15%" id="koddeven3"></td>
					</tr>
					<tr>
						<td width="15%">&nbsp;</td>
						<td width="15%" id="ksmallbig0"></td>
						<td width="15%" id="ksmallbig1"></td>
						<td width="15%" id="ksmallbig2"></td>
						<td width="15%" id="ksmallbig3"></td>
					</tr>
					<tr>
						<td width="40%">Colok&nbsp;&nbsp;Jitu</td>
						<td width="15%" id="cjitu0"></td>
						<td width="15%" id="cjitu1"></td>
						<td width="15%" id="cjitu2"></td>
						<td width="15%" id="cjitu3"></td>
					</tr>
					<tr>
						<td width="40%">50-50</td>
						<td width="15%" id="foddeven0"></td>
						<td width="15%" id="foddeven1"></td>
						<td width="15%" id="foddeven2"></td>
						<td width="15%" id="foddeven3"></td>
					</tr>
					<tr>
						<td width="40%">&nbsp;</td>
						<td width="15%" id="fsmallbig0"></td>
						<td width="15%" id="fsmallbig1"></td>
						<td width="15%" id="fsmallbig2"></td>
						<td width="15%" id="fsmallbig3"></td>
					</tr>
					<tr bgcolor="#006699">
						<td colspan="5" width="100%">&nbsp;</td>
					</tr>
					<tr>
						<td width="40%">Colok&nbsp;&nbsp;Bebas&nbsp;&nbsp;2D</td>
						<td width="15%"><strong id="cb2d0"></strong></td>
						<td width="15%"><strong id="cb2d1"></strong></td>
						<td width="15%"><strong id="cb2d2"></strong></td>
						<td width="15%"><strong id="cb2d3"></strong></td>
					</tr>
					<tr align="center">
						<td width="40%">&nbsp;</td>
						<td width="15%"><strong id="cb2d4"></strong></td>
						<td width="15%"><strong id="cb2d5"></strong></td>
						<td width="15%">&nbsp;</td>
						<td width="15%">&nbsp;</td>
					</tr>
					<tr align="center">
						<td width="40%">Shio</td>
						<td colspan="4" width="60%" id="shio"></td>
					</tr>
					<tr align="center">
						<td width="40%">Silang&nbsp;&nbsp;Homo</td>
						<td colspan="4" width="60%" id="silanghomo"></td>
					</tr>
					<tr align="center">
						<td width="40%">Tengah&nbsp;&nbsp;Tepi</td>
						<td colspan="4" width="60%" id="tengahtepi"></td>
					</tr>
					<tr align="center">
						<td width="40%">Kembang&nbsp;&nbsp;Kempis&nbsp;&nbsp;Kembar</td>
						<td colspan="4" width="60%" id="kem3"></td>
					</tr>
					<tr align="center">
						<td width="40%">Dasar</td>
						<td colspan="4" width="60%"><span id="dasar1"></span>&nbsp;&nbsp;-&nbsp;&nbsp;<span id="dasar2"></span></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
$(".close").click(function() {
	$("#togel_modal").hide();
})
function todet() {
	var arr = $(this).text().split('');
	var gage, gage1, sm;
	$.each(arr, function( k, v ) {
		$("#fourd"+k).text(v);
		$("#cbebas"+k).text(v);
		$("#cjitu"+k).text(v);
		k > 0 && $("#threed"+k).text(v);
		k > 1 && $("#twod"+k).text(v);
		gage = v%2 == 0 ? "Genap" : "Ganjil";
		sm = v > 4 ? "Besar" : "Kecil";
		$("#koddeven"+k+", #foddeven"+k).text(gage);
		$("#ksmallbig"+k+", #fsmallbig"+k).text(sm);
		k == 2 && (gage1=gage);
	});
	var silangh = gage1==gage ? "Homo" : "Silang";
	$("#silanghomo").text(silangh);
	var twod = arr[2]+arr[3];
	var duad = parseInt(twod);
	$("#tengahtepi").text(duad<25 || duad>75 ? "Tepi" : "Tengah");
	$("#kem3").text(arr[2]>arr[3] ? "Kempis" : arr[2]<arr[3] ? "Kembang" : "Kembar");
	$("#dasar1").text(gage);
	$("#dasar2").text(sm);
	var data = {
		page : "togel-detail",
		num : $(this).text(),
		ajax: ""
	};
	var data1 = {
		page : "togel-shio",
		shio : $(this).attr("animal"),
		num : twod,
		ajax: ""
	};
	/* $.ajax({
        url: window.location.origin+'/togel.php',
        type: 'POST',
        data: data,
		dataType: 'json',
		success: function(togeldet) {
			for(var i in togeldet.no) {
				$("#cb2d"+i).text(togeldet.no[i]);
			}
			$.ajax({/* params here });
		}
     }); */
	$.post(window.location.origin+"/togel.php" , data, function(togeldet) {
		for(var i in togeldet.no) {
			$("#cb2d"+i).text(togeldet.no[i]);
		}
		$.post(window.location.origin+"/togel.php" , data1, function(togelshio) {
			$("#shio").text(togelshio/* [0]['name'] */);
		}, "json");
		$("#togel_modal").show();
	}, "json");
}
$(".todet").click(todet);
</script>
<style>
.todet {
	text-decoration: underline;
}
.todet:hover {
	cursor: pointer;
}
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto; /* Enable scroll if needed */
    background-color: rgba(0,0,0,0.4);
}
.modal-content {
    position: relative;
    background-color: #000;
    margin: auto;
    border: 8px solid #fff;
    width: 725px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s;
}
.modal-body td {
    border: 1px solid #414141;
    color: #f4efef;
    text-align: center;
    height: 25px;
}
.close {
	background: #fff;
	cursor: pointer;
    padding: 5px 50px 5px 50px;
    font-size: 16px;
    color: #000;
    font-weight: 700;
    float: right;
}
#shio {
	text-transform:capitalize;
}
</style>