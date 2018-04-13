<?php defined( '_VALID_MOS' ) or die( include("404.php") );
if( isset($_SESSION["wti"]) || !empty($_SESSION["wti"]) ){	    	
	
	$chucnang_list = $_SESSION["wti"]["chucnang"];
	$conf['geturl'] 		 = $func->get_url( "page|view|act|id" );
		
	switch ( $conf['geturl']['view'] ) {
	
		case "":
			include_once("404.php");
		break;

		case "orders":
		
			switch ( $conf['geturl']['act'] ) {
					
				case "":
					//include_once("header/header.html.php");
					//include_once("process/com_product.article.view.models.php");
					//include_once("product/com_product.product.view.admin.php");
				break;
			
				case "view":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("orders/orders.orders.view.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				
				case "add":
					//include_once("$com_folder/header/header.html.php");
					//include_once("orders/orders.orders.add.admin.php");
					//include_once("$com_folder/footer/footer.html.php");
				break;
				
				case "edit":
					//include_once("process/com_product.article.edit.models.php");
					//include_once("product/com_product.product.edit.admin.php");
				break;
				
				case "copy":
					//include_once("process/com_product.article.copy.models.php");
					//include_once("product/com_product.product.copy.admin.php");
				break;
				
				case "invoice":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("orders/orders.orders.invoice.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				
			}
		
		break;

		case "messages":
			
			switch ( $conf['geturl']['act'] ) {
			
				case "":
					//include_once("process/content.category.view.models.php");
					//include_once("category/content.category.view.admin.php");
				break;

				case "view":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("messages/orders.messages.view.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				
				case "add":
					//include_once("$com_folder/header/header.html.php");
					//include_once("category/content.category.add.admin.php");
					//include_once("$com_folder/footer/footer.html.php");
				break;
				
				case "edit":
					//include_once("process/content.category.edit.models.php");
					//include_once("category/content.category.edit.admin.php");
				break;
				
				default:
					//include_once("process/content.category.view.models.php");
					//include_once("category/content.category.view.admin.php");
				break;
				
			}
			
		break;
		
		case "exportorders":
			
			switch ( $conf['geturl']['act'] ) {
					
				case "":
					//include_once("header/header.html.php");
					//include_once("process/com_product.article.view.models.php");
					//include_once("product/com_product.product.view.admin.php");
				break;
			
				case "view":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("exportorders/orders.exportorders.view.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				
				case "add":
					//include_once("$com_folder/header/header.html.php");
					//include_once("banner/banner.banner.add.admin.php");
					//include_once("$com_folder/footer/footer.html.php");
				break;
				
				case "edit":
					//include_once("process/com_product.article.edit.models.php");
					//include_once("product/com_product.product.edit.admin.php");
				break;
				
				case "copy":
					//include_once("process/com_product.article.copy.models.php");
					//include_once("product/com_product.product.copy.admin.php");
				break;
				
				default:
					//include_once("process/com_product.article.view.models.php");
					//include_once("product/com_product.product.view.admin.php");
				break;
				
			}
			
		break;		
		
		default:
			include_once("404.php");
		break;
	
	}
}
?>