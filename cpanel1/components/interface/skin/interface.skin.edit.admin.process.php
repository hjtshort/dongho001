<?php defined( '_VALID_MOS' ) or die( include("../../content/news/404.php") );

	class process
    {
        public $dbObj;

        function __construct()
        {
            $this->dbObj = new classDb();
        }        
    }	

    switch(@$_POST["hidden"]){

        case "";
        	//$func->_redirect(".");
        break;

        case "setting_data":
			$file = REAL_PATH."/".$conf['template_user']."/config/setting_data.json";
			if(file_exists($file)){
				if (file_put_contents($file, $func->black_list_tags($_POST["content_setting"])))
					$func->reload();
				else 
					echo "Oops! Lỗi lưu dữ liệu ...";
			} else {
				echo "File ".$_GET["load"]." không tồn tại";
			}

        break;
		
		case "setting_config":
			
			$file = REAL_PATH."/".$conf['template_user']."/config/setting_config.json";
			if(file_exists($file)){
				if (file_put_contents($file, $func->black_list_tags($_POST["content_setting"])))
					$func->reload();
				else 
					echo "Oops! Lỗi lưu dữ liệu ...";
			} else {
				echo "File ".$_GET["load"]." không tồn tại";
			}			

        break;
		
		case "setting":
			
			$file = REAL_PATH."/".$conf['template_user']."/config/setting.html";
			if(file_exists($file)){
				if (file_put_contents($file, $func->black_list_tags($_POST["content_setting"])))
					$func->reload();
				else 
					echo "Oops! Lỗi lưu dữ liệu ...";
			} else {
				echo "File ".$_GET["load"]." không tồn tại";
			}
			
        break;
		
		case "theme":
		
			$file = REAL_PATH."/".$conf['template_user']."/index.html";
			if(file_exists($file)){
				if (file_put_contents($file, $func->black_list_tags($_POST["content_setting"])))
					$func->reload();
				else 
					echo "Oops! Lỗi lưu dữ liệu ...";
			} else {
				echo "File ".$_GET["load"]." không tồn tại";
			}						

        break;
		
        default:
        	
			switch(@$_GET["act"]){
								
				case "page";
									
					$page = REAL_PATH . "/".$conf['template_user']."/pages/" . $_GET["load"];
					if(file_exists($page)){
						if (file_put_contents($page, $func->black_list_tags($_POST["content_setting"])))
							$func->reload();
						else 
							echo "Oops! Lỗi lưu dữ liệu ...";
					} else {
						echo "Trang ".$_GET["load"]." không tồn tại";
					}
						
				break;
				
				case "module";
									
					$page = REAL_PATH . "/".$conf['template_user']."/modules/" . $_GET["load"];
					if(file_exists($page)){
						if (file_put_contents($page, $func->black_list_tags($_POST["content_setting"])))
							$func->reload();
						else 
							echo "Oops! Lỗi lưu dữ liệu ...";
					} else {
						echo "Module ".$_GET["load"]." không tồn tại";
					}
						
				break;
			}
			
        break;
    }
