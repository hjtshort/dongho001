<?php defined( '_VALID_MOS' ) or die( include("404.php") );
if( isset($_SESSION["wti"]) || !empty($_SESSION["wti"]) ){	
	
	include_once("../libraries/validation/validation.php");
	$validator = new FormValidator();
	
	$chucnang_list = $_SESSION["wti"]["chucnang"];
	$conf['geturl'] 		 = $func->get_url( "page|view|act|id" );
	
	switch ( $conf['geturl']['view']  ) {	
	
		case "":
			include_once("404.php");
		break;
		
		case "currency":			
				
			switch ( $conf['geturl']['act'] ) {
		
				case "":
					//include_once("process/product.category.view.models.php");
					//include_once("category/product.category.view.admin.php");
				break;
				case "view":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("currency/sitesetting.currency.view.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				case "add":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("currency/sitesetting.currency.add.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				case "edit":
					//include_once("process/product.category.edit.models.php");
					//include_once("category/product.category.edit.admin.php");
				break;
				default:
					//include_once("process/product.category.view.models.php");
					//include_once("category/product.category.view.admin.php");
				break;
				
			}

		break;
		
		case "payment":
			
			switch ($conf['geturl']['act']) {
			
				case "":
					//include_once("process/product.category.view.models.php");
					//include_once("category/product.category.view.admin.php");
				break;
				case "view":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("payment/sitesetting.payment.view.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				case "add":
					//include_once($conf['components_path'] . "/header/header.html.php");
					//include_once("payment/sitesetting.payment.add.admin.php");
					//include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				case "edit":
					//include_once("process/product.category.edit.models.php");
					//include_once("category/product.category.edit.admin.php");
				break;
				default:
					//include_once("process/product.category.view.models.php");
					//include_once("category/product.category.view.admin.php");
				break;
				
			}
			
		break;
		
		case "shipping":
			
			switch ($conf['geturl']['act']) {
			
				case "":
					//include_once("process/product.category.view.models.php");
					//include_once("category/product.category.view.admin.php");
				break;
				case "view":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("shipping/sitesetting.shipping.view.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
					break;
				case "add":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("shipping/sitesetting.shipping.add.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				case "edit":
					//include_once("process/product.category.edit.models.php");
					//include_once("category/product.category.edit.admin.php");
				break;
				default:
					//include_once("process/product.category.view.models.php");
					//include_once("category/product.category.view.admin.php");
				break;
				
			}
			
		break;
		
		case "support":
			
			switch ($conf['geturl']['act']) {
			
				case "":
					//include_once("process/product.category.view.models.php");
					//include_once("category/product.category.view.admin.php");
				break;
				case "view":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("support/sitesetting.support.view.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				case "add":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("support/sitesetting.support.add.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				case "edit":
					//include_once("process/product.category.edit.models.php");
					//include_once("category/product.category.edit.admin.php");
				break;
				default:
					//include_once("process/product.category.view.models.php");
					//include_once("category/product.category.view.admin.php");
				break;
				
			}
			
		break;
		
		case "ftp":
			
			switch ($conf['geturl']['act']) {
			
				case "":
					//include_once("process/product.category.view.models.php");
					//include_once("category/product.category.view.admin.php");
				break;
				case "view":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("ftp/sitesetting.ftp.view.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				case "add":
					//include_once($conf['components_path'] . "/header/header.html.php");
					//include_once("support/sitesetting.support.add.admin.php");
					//include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				case "edit":
					//include_once("process/product.category.edit.models.php");
					//include_once("category/product.category.edit.admin.php");
				break;
				default:
					//include_once("process/product.category.view.models.php");
					//include_once("category/product.category.view.admin.php");
				break;
				
			}
			
		break;
		
		case "redirects":
			
			switch ($conf['geturl']['act']) {
			
				case "":
					//include_once("process/product.category.view.models.php");
					//include_once("category/product.category.view.admin.php");
				break;
				case "view":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("redirects/sitesetting.redirects.view.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				case "add":
					//include_once($conf['components_path'] . "/header/header.html.php");
					//include_once("support/sitesetting.support.add.admin.php");
					//include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				case "edit":
					//include_once("process/product.category.edit.models.php");
					//include_once("category/product.category.edit.admin.php");
				break;
				default:
					//include_once("process/product.category.view.models.php");
					//include_once("category/product.category.view.admin.php");
				break;
				
			}
			
		break;
		
		case "sitesetting":		
		
			switch ($conf['geturl']['act']) {
			
				case "":
					//include_once("header/header.html.php");
					//include_once("process/com_product.article.view.models.php");
					//include_once("product/com_product.product.view.admin.php");
				break;
			
				case "view":
					$chucnang_id = 9; // xoá thông tin người dùng
					$chucnang_list = $_SESSION["wti"]["chucnang"];
					if($func->_checkIdinArray( $chucnang_id, $chucnang_list) ){
						include_once($conf['components_path'] . "/header/header.html.php");
						include_once("sitesetting/sitesetting.sitesetting.view.process.php");
						include_once("sitesetting/sitesetting.sitesetting.settingwebtab.view.php");
						include_once($conf['components_path'] . "/footer/footer.html.php");
					}
				break;
				
				case "view_settinginfotab":
					$chucnang_id = 9; // xoá thông tin người dùng
					$chucnang_list = $_SESSION["wti"]["chucnang"];
					if($func->_checkIdinArray( $chucnang_id, $chucnang_list) ){
						include_once($conf['components_path'] . "/header/header.html.php");
						include_once("sitesetting/sitesetting.sitesetting.view.process.php");
						include_once("sitesetting/sitesetting.sitesetting.settinginfotab.view.php");
						include_once($conf['components_path'] . "/footer/footer.html.php");
					}
				break;
				
				case "view_settingmaptab":
					$chucnang_id = 9; // xoá thông tin người dùng
					$chucnang_list = $_SESSION["wti"]["chucnang"];
					if($func->_checkIdinArray( $chucnang_id, $chucnang_list) ){
						include_once($conf['components_path'] . "/header/header.html.php");
						include_once("sitesetting/sitesetting.sitesetting.view.process.php");
						include_once("sitesetting/sitesetting.sitesetting.settingmaptab.view.php");
						include_once($conf['components_path'] . "/footer/footer.html.php");
					}
				break;
				
				case "view_settingviewtab":
					$chucnang_id = 9; // xoá thông tin người dùng
					$chucnang_list = $_SESSION["wti"]["chucnang"];
					if($func->_checkIdinArray( $chucnang_id, $chucnang_list) ){
						include_once($conf['components_path'] . "/header/header.html.php");
						include_once("sitesetting/sitesetting.sitesetting.view.process.php");
						include_once("sitesetting/sitesetting.sitesetting.settingviewtab.view.php");
						include_once($conf['components_path'] . "/footer/footer.html.php");
					}
				break;
				
				case "view_settingplusttab":
					$chucnang_id = 9; // xoá thông tin người dùng
					$chucnang_list = $_SESSION["wti"]["chucnang"];
					if($func->_checkIdinArray( $chucnang_id, $chucnang_list) ){
						include_once($conf['components_path'] . "/header/header.html.php");
						include_once("sitesetting/sitesetting.sitesetting.view.process.php");
						include_once("sitesetting/sitesetting.sitesetting.settingplusttab.view.php");
						include_once($conf['components_path'] . "/footer/footer.html.php");
					}
				break;
				
				case "view_settingviewinfotab":
					$chucnang_id = 9; // xoá thông tin người dùng
					$chucnang_list = $_SESSION["wti"]["chucnang"];
					if($func->_checkIdinArray( $chucnang_id, $chucnang_list) ){
						include_once($conf['components_path'] . "/header/header.html.php");
						include_once("sitesetting/sitesetting.sitesetting.view.process.php");
						include_once("sitesetting/sitesetting.sitesetting.settingviewinfotab.view.php");
						include_once($conf['components_path'] . "/footer/footer.html.php");
					}
				break;
				
				case "view_settingurltab":
					$chucnang_id = 9; // xoá thông tin người dùng
					$chucnang_list = $_SESSION["wti"]["chucnang"];
					if($func->_checkIdinArray( $chucnang_id, $chucnang_list) ){
						include_once($conf['components_path'] . "/header/header.html.php");
						include_once("sitesetting/sitesetting.sitesetting.view.process.php");
						include_once("sitesetting/sitesetting.sitesetting.settingurltab.view.php");
						include_once($conf['components_path'] . "/footer/footer.html.php");
					}
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