<?php
if( $conf['geturl']['view'] == "logout" ){
	unset($_SESSION["wti"]);
	if(!isset($_SESSION["wti"])){
		$func->_redirect( $conf['rooturl_backend'] ); exit();
	} else {
		$func->_redirect( $conf['rooturl_backend'] ); exit();
	}
}
?>