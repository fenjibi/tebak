$(function() {
	$('.number').keypress(function(e) {
		var a = [];
		var k = e.which;

		for (i = 48; i < 58; i++)
			a.push(i);

		if (!(a.indexOf(k)>=0))
			e.preventDefault();
	});
});