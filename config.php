<?php
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https:" : "http:";
$home_url = $protocol."//".$_SERVER['SERVER_NAME']."/";
$home_title = "123";
$home_description = "abc";
$home_keywords = "456" ;
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'indofree_dev');
define('DB_PASSWORD', 'tebaktog3L');
define('DB_DATABASE', 'indofree_betdev');
?>