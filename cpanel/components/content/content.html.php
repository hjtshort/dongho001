<?php defined( '_VALID_MOS' ) or die( include("404.php") );
if( isset($_SESSION["wti"]) || !empty($_SESSION["wti"]) ){	    	
	
	$chucnang_list = $_SESSION["wti"]["chucnang"];
	$conf['geturl'] 		 = $func->get_url( "page|view|act|id" );
		
	switch ( $conf['geturl']['view'] ) {	
	
		case "":
			include_once("404.php");
		break;

		case "category":
			
			switch ( $conf['geturl']['act'] ) {

				case "view":
				
					$chucnang_id_xem = 26; // Xem danh sách tin tức
					$chucnang_id_ql = 2; // quản lý Xem danh sách tin tức
					$chucnang_id_them = 27; // Thêm mới tin tức
					$chucnang_id_sua = 28; // Cập nhật tin tức
					$chucnang_id_xoa = 29; // Xoá tin tức
					if($func->_checkIdinArray( $chucnang_id_xem, $chucnang_list ) ||
					$func->_checkIdinArray( $chucnang_id_ql, $chucnang_list ) || 
					$func->_checkIdinArray( $chucnang_id_them, $chucnang_list ) ||
					$func->_checkIdinArray( $chucnang_id_sua, $chucnang_list ) ||
					$func->_checkIdinArray( $chucnang_id_xoa, $chucnang_list ) ){

						include_once("content.models.php");
						include_once("category/content.category.view.admin.process.php");
						include_once("category/content.category.view.admin.php");

					} else {
						include_once("accessdenied.php");
					}
					
				break;
				
				case "add":
					$chucnang_id = 27; // Thêm mới tin tức
					if($func->_checkIdinArray( $chucnang_id, $chucnang_list) ){

						include_once("content.models.php");
						include_once("category/content.category.add.admin.process.php");
						include_once("category/content.category.add.admin.php");

					} else {
						include_once("accessdenied.php");
					}
				break;
				
				case "edit":
					$chucnang_id = 28; // Cập nhật tin tức
					if($func->_checkIdinArray( $chucnang_id, $chucnang_list) ){

						include_once("content.models.php");
						include_once("category/content.category.edit.admin.process.php");
						include_once("category/content.category.edit.admin.php");

					} else {
						include_once("accessdenied.php");
					}
				break;				
				
			}
			
		break;
		
		case "news":
			
			switch ( $conf['geturl']['act'] ) {
				
				case "view":
				
					$chucnang_id_xem = 26; // Xem danh sách tin tức
					$chucnang_id_ql = 2; // quản lý Xem danh sách tin tức
					$chucnang_id_them = 27; // Thêm mới tin tức
					$chucnang_id_sua = 28; // Cập nhật tin tức
					$chucnang_id_xoa = 29; // Xoá tin tức
					if($func->_checkIdinArray( $chucnang_id_xem, $chucnang_list ) ||
					$func->_checkIdinArray( $chucnang_id_ql, $chucnang_list ) || 
					$func->_checkIdinArray( $chucnang_id_them, $chucnang_list ) ||
					$func->_checkIdinArray( $chucnang_id_sua, $chucnang_list ) ||
					$func->_checkIdinArray( $chucnang_id_xoa, $chucnang_list ) ){

						include_once("content.models.php");
						include_once("news/content.news.view.admin.process.php");
						include_once("news/content.news.view.admin.php");

					} else {
						include_once("accessdenied.php");
					}
					
				break;
				
				case "add":
					$chucnang_id = 27; // Thêm mới tin tức
					if($func->_checkIdinArray( $chucnang_id, $chucnang_list) ){

						include_once("content.models.php");
						include_once("news/content.news.add.admin.process.php");
						include_once("news/content.news.add.admin.php");

					} else {
						include_once("accessdenied.php");
					}
				break;
				
				case "edit":
					$chucnang_id = 28; // Cập nhật tin tức
					if($func->_checkIdinArray( $chucnang_id, $chucnang_list) ){

						include_once("content.models.php");
						include_once("news/content.news.edit.admin.process.php");
						include_once("news/content.news.edit.admin.php");

					} else {
						include_once("accessdenied.php");
					}
				break;
			}
			
		break;
		
		case "pages":
		
			switch ( $conf['geturl']['act'] ) {
					
				case "view":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("pages/content.pages.view.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				
				case "add":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("pages/content.pages.add.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;

			}
		
		break;
		
		case "survey":
		
			switch ( $conf['geturl']['act'] ) {					

				case "view":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("survey/content.survey.view.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				
				case "add":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("survey/content.survey.add.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;						
				
			}
		
		break;
		
		case "gallery":
			
			switch ( $conf['geturl']['act'] ) {			
		
				case "view":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("gallery/content.gallery.view.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				
				case "add":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("gallery/content.gallery.add.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;						
				
			}
			
		break;
		
		case "download":
			
			switch ( $conf['geturl']['act'] ) {
		
				case "view":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("download/content.download.view.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;
				
				case "add":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("download/content.download.add.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;						
				
			}
			
		break;				
        case 'filemanager':
            switch ( $conf['geturl']['act'] ) {
                case "view":
                    include_once("filemanager/content.filemanager.view.admin.php");
                    break;
            }
            break;
		default:
			include_once("404.php");
		break;
	
	}
}
?>