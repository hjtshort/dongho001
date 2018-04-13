<?php defined( '_VALID_MOS' ) or die( include("404.php") );

	class sitesetting extends core_class
	{
		public $dbObj;		
	
		function __construct()
		{
			 $this->dbObj = new classDb();			 
		}
		
		function save_global_config( $config )
		{
			global $func;
			global $conf;
			
			$json = $func->json_encode_unicode(array('config' => $config));
			
			if (file_put_contents(REAL_PATH."/".$conf['template_user']."/config/setting_config.json", $func->black_list_tags($json)))
				return true;
			else 
				return false;
		}	
	}
	
	switch( @$_POST["hidden"] )
	{
		case "";
			// khoi dau trang khong co gia tri submit. khong lam zi ca
		break;		
	
		case "sitesetting";
			
			$check = false;
			
			//settingwebtab
			$validator->addValidation("website_title","req","Tiêu đề không được bỏ trống");
			$validator->addValidation("website_title","minlen=5","Tiêu đề phải lớn hơn 5 ký tự");
			$validator->addValidation("keyword","req","Từ khóa không được bỏ trống");
			$validator->addValidation("description","req","Mô tả không được bỏ trống");	
			//settinginfotab
			$validator->addValidation("company_name","req","Tên công ty không được bỏ trống");
			$validator->addValidation("company_name","minlen=5","Tên công ty phải lớn hơn 5 ký tự");
			$validator->addValidation("address","req","Địa chỉ không được bỏ trống");
			$validator->addValidation("phone","req","Số điện thoại không được bỏ trống");
			$validator->addValidation("email_admin","req","Email không được bỏ trống");
			
			$sitesetting  = new sitesetting;
			
			if($validator->ValidateForm())
			{
				//settingwebtab
				$conf['app']['site_status']		 = $_POST['site_status'];
				$conf['app']['site_close_msg']	 = $_POST['site_close_msg'];
				$conf['app']['website_title']	 = $_POST['website_title'];
				$conf['app']['keyword']			 = $_POST['keyword'];
				$conf['app']['description']		 = $_POST['description'];
				$conf['app']['email_admin']		 = $_POST['email_admin'];
				$conf['app']['page_default']	 = $_POST['page_default'];
				$conf['app']['default_language'] = $_POST['default_language'];
				$conf['app']['www_redirect']	 = $_POST['www_redirect'];
				$conf['app']['smart_search']	 = $_POST['smart_search'];
				
				//settinginfotab
				$conf['app']['company_name']	= $_POST['company_name'];
				$conf['app']['slogan']			= $_POST['slogan'];
				$conf['app']['address']			= $_POST['address'];
				$conf['app']['phone']			= $_POST['phone'];
				$conf['app']['fax']				= $_POST['fax'];
				$conf['app']['email']			= $_POST['email'];
				$conf['app']['website']			= $_POST['website'];
				$conf['app']['smart_search']	= $_POST['smart_search'];
				
				$conf['app']['ga_code']			= $_POST['GACode'];
				$conf['app']['id_facebook']		= $_POST['id_facebook'];
												
				if($sitesetting->save_global_config( $conf['app'] )){
					$func->_redirect($index_backend . "sitesetting/sitesetting/view.html");
				}

			} else {
				
				$check = false;
				$error_hash = $validator->GetErrors();
				foreach($error_hash as $inpname => $inp_err)
				{
					@$_SESSION["validator"][$inpname] = '<p class="error help-block"><span class="label label-important">' . $inp_err . '</span></p>';
				}
			}
	
		break;
		
		default:
			$func->_redirect($index_backend);
		break;
	}