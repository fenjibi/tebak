<?php include $_SERVER['DOCUMENT_ROOT']."/bet.php"; ?>
<input type="text" id="periode" placeholder="Periode" value="<?php echo $bet->get_periode(); ?>" date="<?php echo $bet->get_periode(); ?>" />
<input type="text" id="search_num" class="number" placeholder="Nomor" maxlength="4"/>
<button type="button" id="search_button" value="">CARI</button>
<table id="adm-togel">
	<thead>
		<tr>
			<th>ID</th>
			<th>Time</th>
			<th>Username</th>
			<th>Number</th>
			<th>DewaHoki</th>
			<th>JayaBola</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>
<script>
$(function() {
	get_togel(1);
	$("#search_button").click(function() {
		$(this).val($("#search_num").val());
		$("#periode").attr("date", $("#periode").val());
		get_togel(1);
	});
	$("#periode").datepicker( {dateFormat: "yy-mm-dd"} );
})
function get_togel(current_page){
	$.post(window.location.origin+"/bet.php", {page: "get_betting", ajax: "", search_num : $("#search_button").val(), current_page : current_page, periode : $("#periode").attr("date")}, function( data ) {
		var togel_list = "";
		$.each(data, function(index, value) {
			togel_list += "<tr><td>"+value.bet_id+"</td><td>"+value.time+"</td><td>"+value.username+"</td><td class='tebakan'>"+value.number+"</td><td>"+value.dewahoki_username+"</td><td>"+value.jayabola_username+"</td></tr>";			
		});
		$("#adm-togel > tbody").html(togel_list);
	}, "json")
	.done(function(){
		/* var bet_rows = $.ajax({
			type: "POST",
			url: window.location.origin+"/bet.php",
			data: {page: "get_rows_betting", ajax: ""},
			dataType: "json",
			async: false
		}).responseJSON; */
		$.post(window.location.origin+"/bet.php" , {page: "get_rows_betting", ajax: "", search_num : $("#search_button").val(), periode : $("#periode").attr("date")}, function(data) {
			$.post(window.location.origin+"/common.php", {page: "pagination", ajax: "", current_page : current_page, total_rows : data.total_rows}, function( pagination ) {
				$("#adm-togel > tbody").append('<tr><td colspan="6"><div align="center">'+pagination+'</div></td></tr>');
			}, "html")
		}, "json")
	});
}
</script>
<style>
#periode {
	padding: 5px;
    border-radius: 4px;
    margin: 0 0 10px 10px;
    width: 90px;
}
#search_num {
	padding: 5px;
    width: 57px;
    border-radius: 4px;
    margin: 0 10px 10px;
    font-weight: bold;
}
#search_button {
	padding: 5px;
    color: #fff;
    background-color: #000;
    cursor: pointer;
    width: 60px;
}
#adm-togel {
	width: 100%;
}
#adm-togel > thead > tr > th {
	background-color: #c6ff00;
    color: #000;
	padding: 5px;
}
#adm-togel > tbody > tr:last-child > td > div {
	margin: 20px;
}
#adm-togel > tbody > tr:not(:last-child) > td {
	background-color: #fff;
    color: #000;
	font-size: 13px;
    padding: 5px;
	text-align: center;
}
#adm-togel .tebakan {
	font-weight: bold;
    color: #ff0707 !important;
}
.pagination li{
	display: inline;
	padding: 6px 10px 6px 10px;
	border: 1px solid #ddd;
	margin-right: -1px;
	background: #FFFFFF;
	box-shadow: inset 1px 1px 5px #F4F4F4;
}
.pagination li a{
	cursor: pointer;
    color: rgb(89, 141, 235);
}
.pagination li.first {
    border-radius: 5px 0px 0px 5px;
}
.pagination li.last {
    border-radius: 0px 5px 5px 0px;
}
.pagination li:hover{
	background: #CFF;
}
.pagination li.active{
	background: #F0F0F0;
	color: #333;
}
</style>