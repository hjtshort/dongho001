<?php defined( '_VALID_MOS' ) or die( include("404.php") );
if( isset($_SESSION["wti"]) || !empty($_SESSION["wti"]) ){	    	
	
	$chucnang_list = $_SESSION["wti"]["chucnang"];
	$conf['geturl'] 		 = $func->get_url( "page|view|act|id" );
		
	switch ( $conf['geturl']['view'] ) {	
	
		case "":
			include_once("404.php");
		break;

		case "promotion":
		
			switch ( $conf['geturl']['act'] ) {
						
				case "":
					//include_once("header/header.html.php");
					//include_once("process/com_product.article.view.models.php");
					//include_once("product/com_product.product.view.admin.php");
				break;
			
				case "view":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("promotion/seo.promotion.view.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				
				case "add":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("promotion/seo.promotion.add.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				
				case "edit":
					//include_once("process/com_product.article.edit.models.php");
					//include_once("product/com_product.product.edit.admin.php");
				break;
				
			}
		
		break;
		
		case "coupons":
		
			switch ( $conf['geturl']['act'] ) {
					
				case "":
					//include_once("header/header.html.php");
					//include_once("process/com_product.article.view.models.php");
					//include_once("product/com_product.product.view.admin.php");
				break;
			
				case "view":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("coupons/seo.coupons.view.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				
				case "add":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("coupons/seo.coupons.add.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				
				case "edit":
					//include_once("process/com_product.article.edit.models.php");
					//include_once("product/com_product.product.edit.admin.php");
				break;
				
			}
		
		break;
		
		case "seo":
		
			switch ( $conf['geturl']['act'] ) {
					
				case "":
					//include_once("header/header.html.php");
					//include_once("process/com_product.article.view.models.php");
					//include_once("product/com_product.product.view.admin.php");
				break;
			
				case "view":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("seo/seo.seo.view.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				
				case "add":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("seo/seo.seo.add.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				
				case "edit":
					//include_once("process/com_product.article.edit.models.php");
					//include_once("product/com_product.product.edit.admin.php");
				break;
				
			}
		
		break;
		
		default:
			include_once("404.php");
		break;
	
	}
}
?>