<?php defined('_VALID_MOS') or die(include("404.php"));


switch ($conf['geturl']['view']) {
    case "":
        include("login.process.php");
        include_once("login.login.php");
        break;

    case "login":
        include("login.process.php");
        include_once("login.login.php");
        break;

    case "register":
        include("login.register.process.php");
        include_once("login.register.php");
        break;

    case "logout":
        include_once("login.logout.php");
        break;

    default:
        include_once("login.login.php");
        break;
}
?>