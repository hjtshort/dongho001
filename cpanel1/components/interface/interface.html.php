<?php defined( '_VALID_MOS' ) or die( include("404.php") );
if( isset($_SESSION["wti"]) || !empty($_SESSION["wti"]) ){	
	
	include_once("../libraries/validation/validation.php");
	$validator = new FormValidator();
	
	$chucnang_list = $_SESSION["wti"]["chucnang"];
	$conf['geturl'] = $func->get_url( "page|view|act|id" );

	switch ( $conf['geturl']['view']  ) {
	
		case "":
			include_once("404.php");
		break;

		case "menu":
		
			switch ( $conf['geturl']['act'] ) {
						
				case "":
					//include_once("header/header.html.php");
					//include_once("process/com_product.article.view.models.php");
					//include_once("product/com_product.product.view.admin.php");
				break;
			
				case "view":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("menu/interface.menu.view.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				
				case "add":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("menu/interface.menu.add.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
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
		
		case "skin":

			switch ($conf['geturl']['act']) {		
				case "view":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("skin/interface.skin.view.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;	
				case "edit":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("skin/interface.skin.edit.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;							
			}
			
		break;
		
		case "background":
			
			switch ($conf['geturl']['act']) {			
		
				case "view":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("background/interface.background.view.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				
			}
			
		break;
		
		case "skinmobile":
			
			switch ($conf['geturl']['act']) {		
				case "view":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("skinmobile/interface.skinmobile.view.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
			}
			
		break;
		
		case "banner":
			
			switch ($conf['geturl']['act']) {
			
				case "":
					//include_once("process/content.category.view.models.php");
					//include_once("category/content.category.view.admin.php");
				break;

				case "view":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("banner/interface.banner.view.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				
				case "add":
					//include_once($conf['components_path'] . "/header/header.html.php");
					//include_once("banner/interface.banner.add.admin.php");
					//include_once($conf['components_path'] . "/footer/footer.html.php");
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
		
		case "footer":
		
			switch ($conf['geturl']['act']) {
					
				case "":
					//include_once("header/header.html.php");
					//include_once("process/com_product.article.view.models.php");
					//include_once("product/com_product.product.view.admin.php");
				break;
			
				case "view":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("footer/interface.footer.view.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				
				case "add":
					//include_once($conf['components_path'] . "/header/header.html.php");
					//include_once("banner/banner.banner.add.admin.php");
					//include_once($conf['components_path'] . "/footer/footer.html.php");
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