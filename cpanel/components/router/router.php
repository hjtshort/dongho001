<?php

if (!isset($_SESSION["wti"]) || empty($_SESSION["wti"])) {
    $conf['geturl'] =  $func->get_url( "page|view|act|id" );
    switch ($conf['geturl']['view']) {

        case "register":
            include_once($conf['components_path'] . "/register/register.html.php");
            break;
        case "template":
            if($conf['geturl']['act'] =='install'){
                $_SESSION['theme']['install']=[
                    'id'=> $_GET['themeid']
                ];
                $func->_redirect($conf['rooturl_backend'].'/auth/login.html?ContinueUrl=interface/template/install.html?themeid='.$_GET['themeid']);
            }
            break;
        default:
            include_once($conf['components_path'] . "/login/login.html.php");
            break;
    }


} else {

    @$com = trim($conf['geturl']["page"]);

    switch ($com) {
        case "":
            include_once("modules/left-side-bar.php");
            include_once("modules/chat-bar.php");
            include_once($conf['components_path'] . "/admin/admin.html.php");
            break;

        default:
            $file_path = $conf['components_path'] . "/$com/$com.html.php";

            if ($func->_routers($file_path)) {
                include_once("modules/left-side-bar.php");
                include_once("modules/chat-bar.php");
                include_once($file_path);
            } else {
                include_once("404.php");
            }
            break;
    }
}

?>