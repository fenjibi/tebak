<<<<<<< Updated upstream
<script>
$("button").click(function(){
	var part;
	var save;
	if($(this).attr('id') == "result4d"){
		save = $("input[name='prize1']").val();
		part = "result";
	}
	else if($(this).attr('id') == "resulttoto"){
		save = $("input[name='toto8']").val();
		part = "result";
	}
	else if($(this).parents("table").attr('id') == "fourd"){
		part = "fourd";
	}
	else if($(this).parents("table").attr('id') == "toto"){
		part = "toto";
	}
	if(part == "toto" || part == "fourd"){
		save = "[";
		$("#"+part+" input").each(function() {
			save += '"'+$(this).val()+'",';
		});
		save = save.slice(0,-1);
		save += "]";
		$.post(window.location.origin + "/putartogel/toto_post.php",
		{
			v : part,
			val: save
		},
		function(data, status){
			alert("Saved: " + save);
		});
	}
	else if(part == "result"){
		$.post(window.location.origin + "/togel.php",
		{
			page : "save-result-sgp",
			val: save
		},
		function(data, status){
			alert(data);
		});
	}
});
$('.num').keypress(function(e) {
    var a = [];
    var k = e.which;

    for (i = 48; i < 58; i++)
        a.push(i);

    if (!(a.indexOf(k)>=0))
        e.preventDefault();
})
=======
<script>
$("button").click(function(){
	var part, name;
	var save;
	if($(this).attr('id') == "result4d"){
		save = $("input[name='prize1']").val();
		part = "result";
	}
	else if($(this).attr('id') == "resulttoto"){
		save = $("input[name='toto8']").val();
		part = "result";
	}
	else if($(this).parents("table").attr('id') == "fourd"){
		part = "fourd";
		name = "Singapore 4D";
	}
	else if($(this).parents("table").attr('id') == "toto"){
		part = "toto";
		name = "Singapore TOTO";
	}
	if(part == "toto" || part == "fourd"){
		save = "[";
		$("#"+part+" input").each(function() {
			save += '"'+$(this).val()+'",';
		});
		save = save.slice(0,-1);
		save += "]";
		
		var livedata = {
			page : "setlive",
			name : name,
			data : save,
			v : part,
			ajax: ""
		};
		$.post(window.location.origin + "/togel.php", livedata, function(rtn, status){
			alert(status + ' : ' + save);
		});
	}
	else if(part == "result"){
		$.post(window.location.origin + "/togel.php",
		{
			page : "save-result-sgp",
			val: save
		},
		function(data, status){
			alert(data);
		});
	}
});
$('.num').keypress(function(e) {
    var a = [];
    var k = e.which;

    for (i = 48; i < 58; i++)
        a.push(i);

    if (!(a.indexOf(k)>=0))
        e.preventDefault();
})
>>>>>>> Stashed changes
</script>