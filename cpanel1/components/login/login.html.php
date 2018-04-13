<?php defined( '_VALID_MOS' ) or die( include("404.php") ); 
    include("login.process.php");

	switch ( $conf['geturl']['view'] ) {
		case "":
			include_once("login.login.php");
		break;

		case "login":
			include_once("login.login.php");
		break;

		case "logout":
			include_once("login.logout.php");
		break;

		default:
			include_once("login.login.php");
		break;
	}
?>