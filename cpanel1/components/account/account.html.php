<?php defined( '_VALID_MOS' ) or die( include("404.php") );
if($_SESSION["wti"]["key"] == "Supper Administrator" || $_SESSION["wti"]["key"] == "Administrator"){	

	switch ( $url[1] ) {	
	
		case "":
			include_once("404.php");
		break;

		case "account":
		
		$roles = $_SESSION["wti"]["key"];
			
			switch ( $roles ) {
				
				case "Supper Administrator":
				case "Administrator":
					
					switch ($url[2]) {
					
						case "":
							//include_once("header/header.html.php");
							//include_once("process/com_product.article.view.models.php");
							//include_once("product/com_product.product.view.admin.php");
						break;
					
						case "view":
							include_once("$com_folder/header/header.html.php");
							include_once("account/account.account.view.admin.php");
							include_once("$com_folder/footer/footer.html.php");
						break;
						
						case "add":
							//include_once("$com_folder/header/header.html.php");
							//include_once("promotion/seo.promotion.add.admin.php");
							//include_once("$com_folder/footer/footer.html.php");
						break;
						
						case "edit":
							//include_once("process/com_product.article.edit.models.php");
							//include_once("product/com_product.product.edit.admin.php");
						break;
						
					}
					
				break;			
				
			}
		
			break;
		
		default:
			include_once("404.php");
		break;
	
	}
}
?>