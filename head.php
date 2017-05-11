<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<title><?php echo $page_data['title']; ?></title>
	<meta name="description" content="<?php echo $page_data['description']; ?>" />
	<link href="<?php echo $home_url; ?>css/main.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $home_url; ?>js/jquery-ui-1.12.1/jquery-ui.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo $home_url; ?>js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="<?php echo $home_url; ?>js/jquery-ui-1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" src="<?php echo $home_url; ?>js/common.js"></script>
	<script>
	function getCookie(cname) {
		var name = cname + "=";
		var decodedCookie = decodeURIComponent(document.cookie);
		var ca = decodedCookie.split(';');
		for(var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
				c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
				return c.substring(name.length, c.length);
			}
		}
		return "";
	}
	</script>
</head>