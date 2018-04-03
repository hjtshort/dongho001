<?php defined('_VALID_MOS') or die(include("404.php"));


switch ($conf['geturl']['view']) {
    case "":
        include_once("register.register.process.php");
        include_once("register.register.php");
        break;
    case "register":
        include_once("register.register.process.php");
        include_once("register.register.php");
        break;
}
?>