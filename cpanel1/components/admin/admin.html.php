<?php defined( '_VALID_MOS' ) or die( include("404.php") );

if( isset($_SESSION["wti"]) || !empty($_SESSION["wti"]) ){
	
	$conf['geturl'] 		 	= $func->get_url( "com|view|act" );
	
	switch ( $conf['geturl']['view'] ) {
	
		case "":
		
			include_once($conf['components_path'] . "/header/header.html.php");
			include_once("index/admin.index.view.admin.php");
			include_once($conf['components_path'] . "/footer/footer.html.php");
			
		break;
		
		case "email":

			switch ( $conf['geturl']['act'] ) {
			
				case "view":
					include_once($conf['components_path'] . "/header/header.html.php");
					include_once("email/admin.email.view.admin.php");
					include_once($conf['components_path'] . "/footer/footer.html.php");
				break;

			}
		
		break;
		
		case "users":
		
			$chucnang_list = $_SESSION["wti"]["chucnang"];
					
			switch ( $conf['geturl']['act'] ) {
			
				case "view":
					$chucnang_id_xem = 1; // xem thông tin người dùng
					$chucnang_id_ql = 2; // quản lý thông tin người dùng
					$chucnang_id_them = 3; // them thông tin người dùng
					$chucnang_id_sua = 4; // sữa thông tin người dùng
					$chucnang_id_xoa = 5; // xoá thông tin người dùng
					
					$chucnang_list = $_SESSION["wti"]["chucnang"];

					if($func->_checkIdinArray( $chucnang_id_xem, $chucnang_list ) ||
					$func->_checkIdinArray( $chucnang_id_ql, $chucnang_list ) || 
					$func->_checkIdinArray( $chucnang_id_them, $chucnang_list ) ||
					$func->_checkIdinArray( $chucnang_id_sua, $chucnang_list ) ||
					$func->_checkIdinArray( $chucnang_id_xoa, $chucnang_list ) ){
						include_once($conf['components_path'] . "/header/header.html.php");
						include_once("users/admin.users.view.admin.process.php");
						include_once("users/admin.users.view.admin.php");
						include_once($conf['components_path'] . "/footer/footer.html.php");
					} else {
						include_once("accessdenied.php");
					}
				break;
				
				case "add":
					$chucnang_id = 3; // Thêm thông tin người dùng
					$chucnang_list = $_SESSION["wti"]["chucnang"];

					if($func->_checkIdinArray( $chucnang_id, $chucnang_list) ){
						include_once($conf['components_path'] . "/header/header.html.php");
						include_once("users/admin.users.add.admin.process.php");
						include_once("users/admin.users.add.admin.php");
						include_once($conf['components_path'] . "/footer/footer.html.php");
					} else {
						include_once("accessdenied.php");
					}
				break;
				
				case "edit":
					$chucnang_id = 4; // Cập nhật thông tin người dùng
					$chucnang_list = $_SESSION["wti"]["chucnang"];

					if($func->_checkIdinArray( $chucnang_id, $chucnang_list) ){
						include_once($conf['components_path'] . "/header/header.html.php");
						include_once("users/admin.users.edit.admin.process.php");
						include_once("users/admin.users.edit.admin.php");
						include_once($conf['components_path'] . "/footer/footer.html.php");
					} else {
						include_once("accessdenied.php");
					}
				break;
				
			}

		
		break;
		
		default:
					
			include_once($conf['components_path'] . "/header/header.html.php");
			include_once("index/admin.index.view.admin.php");
			include_once($conf['components_path'] . "/footer/footer.html.php");
			
		break;
	
	}
}
?>