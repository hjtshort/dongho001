<?php if (!defined('_VALID_MOS')) define( '_VALID_MOS', 1 );

    session_start();
	ob_start();
	
	ini_set('zlib_output_compression','On');
	ini_set('zlib_output_compression_level','5');

	header('Content-Type: text/html; charset=utf-8');

    define('REAL_PATH', str_replace('\\', '/', dirname(dirname(__FILE__))));
	
	/* Application Data */
    define('APP_DATA_FILE', REAL_PATH . '../application_data/' . $_SERVER['SERVER_NAME'] . '.data');
    include_once(REAL_PATH . "../include/app_variable.php");
    
    //include_once("../include/global_config.php");
	include_once("../include/core_class.php");
	include_once("../include/init.config.php");
	include_once("../include/db_class.php");	
	global $func;
    $func = new core_class();
    
    $core_class = new core_class();
	
	$url = $core_class->_extract_url($_GET['params'], '/');

    if( isset($_SESSION["wti"]) || !empty($_SESSION["wti"]) ){
		
	    switch (trim( $url[0] )) {
			
			/* Ajax Tuan*/			
			case "user_order":

				$chucnang_id_ql = 2; // quản lý thông tin người dùng
				$chucnang_list = $_SESSION["wti"]["chucnang"];
				
				if($core_class->_checkIdinArray( $chucnang_id_ql, $chucnang_list ) ){
			    	include_once("$com_folder/admin/users/admin.users.order.admin.ajax.php");
				} else {
					include_once("accessdenied.php");
				}
			break;
			case "report":
				include_once("components/orders/exportorders/orders.exportorders.report.admin.php");
				// $myprocess= new orders();
				// $data=$myprocess->get_data($_GET['ngay1'],$_GET['ngay2'],$_GET['status']);
				
					//$func->_redirect('orders/exportorders/view.html');
			break;
			
			/*Ajax Kiet*/
			
			/*Ajax Trung*/
			
			/*Ajax Dam*/
			
		    case "":
			    echo 'request data from server error !';
		    break;
	    
		    case "com_layout":
			    include_once("$com_folder/com_layout/com_layout.ajax.process.php");
		    break;
			
			case "com_product_new_tab":
				include_once("$com_folder/com_product/product/new_tab.html");
			break;
			
			case "export_excel":
				include_once("$com_folder/com_register/extract_excel.php");
			break;
		    
		    default:
			    echo 'request data from server error !';
		    break;
			
	    }
		
    } else{
	    echo "Warning: access denied !";
    }
	
	$html_content = ob_get_contents();
		
	ob_end_clean();

	print($html_content);