<div id="main_content">
	<input type="text" id="search_name" placeholder="Username" />
	<button type="button" id="search_button" value="" />CARI</button>
	<table id="user-list">
		<thead>
			<tr>
				<th>User ID</th>
				<th>Username</th>
				<th>Email</th>
				<th>No Handphone</th>
				<th>DewaHoki</th>
				<th>JayaBola</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>
<script>
$(function() {
	user_list(1);
	$("#search_button").click(function() {
		$(this).val($("#search_name").val());
		user_list(1);
	});
})
function user_list(current_page){
	$.post(window.location.origin+"/admin.php", {page: "user_list", ajax: "", search_name : $("#search_button").val(), current_page : current_page, row_per_page: 20}, function( data ) {
		var userlist = "";
		$.each(data.data, function(index, value) {
			/* var set_win = "";
			if(!value.togel_win_id) {
				set_win = "<a onclick='set_toto_winner("+value.bet_id+")'><img src='"+window.location.origin+"/images/champion-crown.png' alt='set win' width='28' style='cursor: pointer;' /></a>";
			} */
			userlist += "<tr uid='"+value.user_id+"'><td>"+value.user_id+"</td><td>"+value.username+"</td><td>"+value.email+"</td><td>"+value.nohp+"</td><td>"+value.dewahoki_username+"</td><td>"+value.jayabola_username+"</td></tr>";			
		});
		$("#user-list > tbody").html(userlist);
		$.post(window.location.origin+"/common.php", {page: "pagination", ajax: "", current_page : current_page, total_rows : data.count, row_per_page: 20, func: "user_list"}, function( pagination ) {
			$("#user-list > tbody").append('<tr><td colspan="6"><div align="center">'+pagination+'</div></td></tr>');
		}, "html")
	}, "json");
}
</script>
<style>
#search_name {
	padding: 5px;
    width: 120px;
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
#user-list {
	width: 100%;
}
#user-list > thead > tr > th {
	background-color: #c6ff00;
    color: #000;
	padding: 5px;
}
#user-list > tbody > tr:last-child > td > div {
	margin: 20px;
}
#user-list > tbody > tr:not(:last-child) > td {
	background-color: #fff;
    color: #000;
	font-size: 13px;
    padding: 5px;
	text-align: center;
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