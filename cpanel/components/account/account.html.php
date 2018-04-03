<?php defined( '_VALID_MOS' ) or die( include("404.php") );

//if($_SESSION["wti"]["key"] == "Supper Administrator" || $_SESSION["wti"]["key"] == "Administrator"){	
if( isset($_SESSION["wti"]) || !empty($_SESSION["wti"]) ){
	$conf['geturl'] 		 	= $func->get_url( "com|view|act" );
	switch ( $conf['geturl']['view']  ) {	
	
		case "":
			include_once("404.php");
		break;

		case "account":
		
		$roles = 'Administrator'; //$_SESSION["wti"]["key"];
			
			switch ( $roles ) {
				
				case "Supper Administrator":
			
				case "Administrator":
					
					switch ($conf['geturl']['act']) {
					
						case "":
							//include_once("header/header.html.php");
							//include_once("process/com_product.article.view.models.php");
							//include_once("product/com_product.product.view.admin.php");
						break;
					
						case "view":
							//include_once("$com_folder/header/header.html.php");
							
							//include_once("$com_folder/footer/footer.html.php");
						break;
						
						case "add":
							//include_once("$com_folder/header/header.html.php");
							//include_once("promotion/seo.promotion.add.admin.php");
							//include_once("$com_folder/footer/footer.html.php");
						break;
						
						case "edit":
							include_once("account/account.account.view.admin.proccess.php");
							include_once("account/account.account.view.admin.php");
							//include_once("account/account.account.changepassword.admin.php");
							//include_once("process/com_product.article.edit.models.php");
							//include_once("product/com_product.product.edit.admin.php");
						break;
						
					}
					
				break;			
				
			}
		
			break;
		
		default:
			echo "<script>alert('aaa')</script>";
			include_once("404.php");
		break;
	
	}
}
?>