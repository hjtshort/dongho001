<?php defined( '_VALID_MOS' ) or die( include("404.php") );
if( isset($_SESSION["wti"]) || !empty($_SESSION["wti"]) ){	
	
	$chucnang_list = $_SESSION["wti"]["chucnang"];
	
	$conf['geturl'] = $func->get_url( "page|view|act|id" );	
	
	switch ( $conf['geturl']["view"] ) {	
	
		case "":
			include_once("404.php");
		break;

		case "category":
			
			switch ( $conf['geturl']['act'] ) {
					
				case "view":
				
					$chucnang_id_xem = 14; // Xem thông tin nhóm sản phẩm					
					if($func->_checkIdinArray( $chucnang_id_xem, $chucnang_list )){
						
						include_once("product.models.php");
						include_once("category/product.category.view.admin.process.php");
						include_once("category/product.category.view.admin.php");
						
					} else {
						include_once("accessdenied.php");	
					}
				break;
					
				case "add":
				
					$chucnang_id_them = 15; // Thêm mới thông tin nhóm sản phẩm					
					if($func->_checkIdinArray( $chucnang_id_them, $chucnang_list )){
						include_once("product.models.php");
						include_once("category/product.category.add.admin.process.php");
						include_once("category/product.category.add.admin.php");
					} else {
						include_once("accessdenied.php");	
					}
					
				break;
					
				case "edit":
					$chucnang_id_sua = 16; // Chỉnh sữa thông tin nhóm sản phẩm			
					if($func->_checkIdinArray( $chucnang_id_sua, $chucnang_list )){
						
						include_once("product.models.php");
						include_once("category/product.category.edit.admin.process.php");
						include_once("category/product.category.edit.admin.php");
					
					} else {
						include_once("accessdenied.php");	
					}
				break;
				
			}
			
		break;
		
		case "product":
		
			switch ( $conf['geturl']['act'] ) {
					
				case "view":					
					
					$chucnang_id_xem = 10; // Xem thông tin nhóm sản phẩm					
					if($func->_checkIdinArray( $chucnang_id_xem, $chucnang_list )){
						
						include_once("product.models.php");
						include_once("product/product.product.view.admin.process.php");
						include_once("product/product.product.view.admin.php");
						
					} else {
						include_once("accessdenied.php");	
					}
					
				break;
				
				case "add":
					
					$chucnang_id_xem = 11; // Xem thông tin nhóm sản phẩm					
					if($func->_checkIdinArray( $chucnang_id_xem, $chucnang_list )){
						
						include_once("product.models.php");
						include_once("product/product.product.add.admin.process.php");
						include_once("product/product.product.add.admin.php");
						
					} else {
						include_once("accessdenied.php");	
					}
					
				break;
				
				case "edit":
					
					$chucnang_id_xem = 12; // Xem thông tin nhóm sản phẩm					
					if($func->_checkIdinArray( $chucnang_id_xem, $chucnang_list )){
						
						include_once("product.models.php");
						include_once("product/product.product.edit.admin.process.php");
						include_once("product/product.product.edit.admin.php");
						
					} else {
						include_once("accessdenied.php");	
					}
					
				break;
				
				case "copy":
					
					$chucnang_id_xem = 12; // Xem thông tin nhóm sản phẩm					
					if($func->_checkIdinArray( $chucnang_id_xem, $chucnang_list )){
						
						include_once("product.models.php");
						include_once("product/product.product.copy.admin.process.php");
						include_once("product/product.product.copy.admin.php");
						
					} else {
						include_once("accessdenied.php");	
					}
					
				break;
			}
			
		break;
		
		case "vendors":
		
			switch ( $conf['geturl']['act'] ) {
					
				case "":
					//include_once("header/header.html.php");
					//include_once("process/com_product.article.view.models.php");
					//include_once("product/com_product.product.view.admin.php");
				break;
			
				case "view":
					include_once("product.models.php");
					include_once("vendors/product.vendors.view.admin.process.php");
					include_once("vendors/product.vendors.view.admin.php");
				break;
				
				case "add":
					include_once("vendors/product.vendors.add.admin.php");
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
		
		case "productreviews":
		
			switch ( $conf['geturl']['act'] ) {
					
				case "":
					//include_once("header/header.html.php");
					//include_once("process/com_product.article.view.models.php");
					//include_once("product/com_product.product.view.admin.php");
				break;
			
				case "view":
					include_once("productreviews/product.productreviews.view.admin.php");
				break;

				case "edit":
					include_once("productreviews/product.productreviews.edit.admin.php");
				break;
				
				
				default:
					include_once("process/com_product.article.view.models.php");
					include_once("product/com_product.product.view.admin.php");
				break;
				
			}
			
		break;
		
		case "import":
		
			switch ( $conf['geturl']['act'] ) {
					
				case "":
					//include_once("header/header.html.php");
					//include_once("process/com_product.article.view.models.php");
					//include_once("product/com_product.product.view.admin.php");
				break;
			
				case "view":
					include_once("import/product.import.view.admin.php");
				break;
				
			}
			
		break;
		
		case "customcategories":
			
			switch ( $conf['geturl']['act'] ) {
					
				case "":
					//include_once("header/header.html.php");
					//include_once("process/com_product.article.view.models.php");
					//include_once("product/com_product.product.view.admin.php");
				break;
			
				case "view":
					include_once("customcategories/product.customcategories.view.admin.php");
				break;
				
				case "add":
					include_once("customcategories/product.customcategories.add.admin.php");
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
		
		case "export":
		
			switch ( $conf['geturl']['act'] ) {
					
				case "":
					//include_once("header/header.html.php");
					//include_once("process/com_product.article.view.models.php");
					//include_once("product/com_product.product.view.admin.php");
				break;
			
				case "view":
					include_once("export/product.export.view.admin.php");
				break;
				
				case "add":
					//include_once($conf['components_path'] . "/header/header.html.php");
					//include_once("process/com_product.article.add.models.php");
					//include_once("product/product.product.add.admin.php");
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
		
		case "productoption":
		
			switch ( $conf['geturl']['act'] ) {
					
				case "":
					//include_once("header/header.html.php");
					//include_once("process/com_product.article.view.models.php");
					//include_once("product/com_product.product.view.admin.php");
				break;
			
				case "view":
					include_once("productoption/product.productoption.view.admin.php");
				break;
				
				case "add":
					//include_once($conf['components_path'] . "/header/header.html.php");
					//include_once("product/product.product.add.admin.php");
					//include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				
				case "addoptionset":
					include_once("productoption/product.productoption.addoptionset.admin.php");
				break;
				
				case "addoption":
					include_once("productoption/product.productoption.addoption.admin.php");
				break;
				
				case "edit":
					//include_once("process/com_product.article.edit.models.php");
					//include_once("product/com_product.product.edit.admin.php");
				break;
				
			}
		
		break;
		
		case "properties":
		
			switch ( $conf['geturl']['act'] ) {
			
				case "view":
					include_once("product.models.php");
					include_once("properties/product.properties.view.admin.process.php");
					include_once("properties/product.properties.view.admin.php");
				break;
				
				case "add":
					include_once("product.models.php");
					include_once("properties/product.properties.add.admin.process.php");
					include_once("properties/product.properties.add.admin.php");
				break;
				
				case "addgroup":
					include_once("product.models.php");
					include_once("properties/product.properties.addgroup.admin.php");
				break;
				
				case "edit":
					include_once("product.models.php");
					include_once("properties/product.properties.edit.admin.process.php");
					include_once("properties/product.properties.edit.admin.php");
				break;
				
				case "copy":
					//include_once("process/com_product.article.copy.models.php");
					//include_once("product/com_product.product.copy.admin.php");
				break;
									
			}

		break;
		
		default:
			include_once("404.php");
		break;
	
	}
}
?>