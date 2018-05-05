<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<title><?php echo $home_title; ?></title>
	<meta name="description" content="<?php echo $home_description; ?>" />
	<meta name="keywords" content="<?php echo $home_keywords; ?>">
	<meta content="index, follow" name="robots" />
	<meta content="1 days" name="revisit-after" />
	<meta content="general" name="rating" />
	<meta content="id" name="geo.country" />
	<meta content="Indonesia" name="geo.placename" />
	<meta content="Indofreebet" name="author" />
	<meta content="all" name="Slurp" />
	<meta name="google-site-verification" content="<?php echo $home_webmaster; ?>" />
	
	<link href="<?php echo $home_url; ?>css/main.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $home_url; ?>js/jquery-ui-1.12.1/jquery-ui.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo $home_url; ?>js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="<?php echo $home_url; ?>js/jquery-ui-1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" src="<?php echo $home_url; ?>tools/bootstrap-3.3.7/js/bootstrap.min.js"></script>
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