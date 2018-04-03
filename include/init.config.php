<?php defined( '_VALID_MOS' ) or die( include("404.php") );

    $GLOBALS['MAP'] = array();
    $file_data_config = REAL_PATH.'/data_setting/'.$_SERVER['SERVER_NAME'].'/data_config.json';
    if (file_exists($file_data_config)) {
        $data_config_json = file_get_contents($file_data_config);
        $GLOBALS['MAP'] = json_decode($data_config_json, true);
    }
    // Đọc thông tin về website
    function mapping($attr)
    {
        $cur = @$GLOBALS['MAP'][$_SERVER['SERVER_NAME']];

        if (!is_array($cur)) {
            $cur = @$GLOBALS['MAP'][$cur];
        }

        if (is_array($cur)) {
            return $cur[$attr];
        }
        else {
            return null;
        }
    }

	// class truy xuất database PDO
	include_once(__DIR__."/db_class.php");      	
	
    session_start();

	class wti_registry {

		public $conf = array( );

      	public function __construct( ){
		//public function wti_registry( ){

			global $conf; global $func;

			$conf['host']				= 'localhost';
			$conf['rooturl']			= "http://" . $_SERVER['SERVER_NAME'];
			$conf['rootpath']			= $_SERVER['DOCUMENT_ROOT'].'/';

			$conf['ext']				= ".html";
			$conf['components_path']	= "components";
			$conf['modules_path']		= "modules";

			$chucnang_id = 9; // được phép cấu hình hệ thống
			$chucnang_list = @$_SESSION["wti"]["chucnang"];
			            
			if($func->_checkIdinArray( $chucnang_id, $chucnang_list) ){
				$conf['admin_edit_module']	= true;
			}

			//config for frontend
			$conf['rooturl_backend'] 	= "http://" . $_SERVER['SERVER_NAME'] . "/cpanel";
			// template path
			$conf['template_user'] 	 	= 'data_setting/'.$_SERVER['SERVER_NAME'].'/templates/' . mapping('template');
			$conf['data_user'] 	 	    = 'data_setting/'.$_SERVER['SERVER_NAME'];
			$conf['template_admin']  	= 'templates/byadmin';
			
			$conf['template_admin1']  	= 'templates/adminplus';

			$file_config_app            = REAL_PATH . "/" . $conf['data_user'] ."/setting_config.json";
			$file_config_templates      = REAL_PATH . "/" . $conf['template_user'] ."/config/setting_data.json";
            $conf['app']                = array('site_status'=>0);
            $conf['data']               = array();

			if (file_exists($file_config_app)) {
                $config_json =  file_get_contents($file_config_app);
                $conf['app'] = json_decode($config_json,true)['config'];
            }
			if (file_exists($file_config_templates)) {
                $data_json    =  file_get_contents($file_config_templates);
                $conf['data'] = json_decode($data_json,true)['data'];
            }			

			$conf['data']               = array_merge($conf['data'],$conf['app']);

			// enable seo url
			$conf['seo_url']		 	= 1;

			// khai bao tham so url mặc định. Ví dụ: page=product&view=detail&id=1234
			$conf['geturl'] 		 	= $func->get_url( "page|view|id" );

            if (!$conf['app']['site_status']) {
                flush();
                include_once("webclose.php");
                exit();
            }
		}

	}
