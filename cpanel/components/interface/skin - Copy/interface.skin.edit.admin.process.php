<?php defined( '_VALID_MOS' ) or die( include("../../content/news/404.php") );

	include('../libraries/htmldom/simple_html_dom.php');
/*
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL); 
*/
	class process
    {
        public $dbObj;

        function __construct()
        {
            $this->dbObj = new classDb();
				$this->theme_path = REAL_PATH . '/templates/' . $GLOBALS['MAP'][$_SERVER['SERVER_NAME']]['template'] . '/';
        }

        function get_module_list(){
			  // Scan modules trong file module.config.json

       	//  	$query = "SELECT
			// 				sys_modules.module_id,
			// 				sys_modules.tieude,
			// 				sys_modules.duongdanmodule,
			// 				sys_modules.module,
			// 				sys_modules.mota
			// 			FROM
			// 				sys_modules
			// 			WHERE
			// 				sys_modules.hienthi = 1
			// 			ORDER BY
			// 				`sys_modules`.`module_id`";
         // $result = $this->dbObj->SqlQueryOutputResult($query, array());
			// return $result;

			// Scan thư mục modules trong theme
			return json_decode(file_get_contents($this->theme_path . '/module.config.json'), true);
        }

        function get_module_name_by_name($module_name){
			// Trả về tên module bằng path, ví dụ trả về Website Logo khi $module_name == mod_logo

       	//  	$query = "SELECT
			// 				sys_modules.tieude
			// 			FROM
			// 				sys_modules
			// 			WHERE
			// 				sys_modules.module = ?";
         //    $result = $this->dbObj->SqlQueryOutputResult($query, array($name));
         //    if($row = $result->fetch()){
         //    	return $row['tieude'];
         //    }
			// return false;
			$module_config = json_decode(file_get_contents($this->theme_path . '/module.config.json'), true);
			foreach ($module_config as $key => $value) {
				if($value == $module_name) return $key;
			}
        }

        function get_pages_list(){
        	$query = "SELECT
							pages.pages_id,
							pages.pages_title
						FROM
							pages
						WHERE
							pages.hienthi = 1
						ORDER BY
							`pages`.`pages_id`";
            $result = $this->dbObj->SqlQueryOutputResult($query, array());
			return $result;
        }

        function get_module_by_layout($pages_id, $file){
        	$query = "SELECT
							pages_html.html
						FROM
							pages_html
						WHERE
							pages_html.pages_id = ?";
            $result = $this->dbObj->SqlQueryOutputResult($query, array($pages_id));
            if($row = $result->fetch()){
            	$layout = unserialize($row['html']);
            	$html_file = $layout['pages_' . $file];
            	$html = new simple_html_dom();
        		$html->load($html_file);
        		foreach($html->find('div[type="module"]') as $element){
        			$element->innertext = '<h5>' . $this->get_module_name_by_name($element->name) . '</h5>';
        			$element->innertext .= '<div class="form-group">
        									 <input type="text" class="form-control custom-class" value="' . $element->class .'" placeholder="Class">
        								    </div>';
        			$element->class = 'module-item';
        			@$module .= $element;
        		}
				return @$module;
			}
			return false;
        }

        function get_layout_file($pages_id){
			$query = "SELECT
							layout.layout_file
						FROM
							layout
						INNER JOIN
							pages
						ON
							pages.layout_id = layout.layout_id
						WHERE
							pages.pages_id = ?";
            $result = $this->dbObj->SqlQueryOutputResult($query, array($pages_id));
            if($row = $result->fetch()){
				return $row['layout_file'];
			}
			return false;
        }

        function get_layout_list(){
        	$query = "SELECT
							layout.layout_id,
							layout.layout_file,
							layout.layout_img
						FROM
							layout
						WHERE
							layout.hienthi = 1
						ORDER BY
							`layout`.`thutu`";
            $result = $this->dbObj->SqlQueryOutputResult($query, array());
			return $result;
        }

        function get_layout_id($layout_file){
        	$query = "SELECT
							layout.layout_id
						FROM
							layout
						WHERE
							layout.layout_file = ? ";
            $result = $this->dbObj->SqlQueryOutputResult($query, array($layout_file));
			if ($row = $result->fetch()) {
				return $row['layout_id'];
			}
			return false;
        }

		  function get_layout_name($layout_file){
			  // Input top.center.bottom
			  // Output Top Center bottom
				return implode(" ", explode(".", $layout_file));
		  }

        function is_pages_exists($pages_id){
        	$query = "SELECT
        					COUNT(pages_html.id) as `totalrow`
						FROM
							pages_html
						WHERE
							pages_html.pages_id = ?";
			$result = $this->dbObj->SqlQueryOutputResult($query, array($pages_id));
			if ($row = $result->fetch()) {
				if($row['totalrow'] >= 1) return true;
				return false;
			}
        }

        function get_layout($pages_id){
        	$query = "SELECT pages_content
						FROM pages
						WHERE pages_id = ?";
			$result = $this->dbObj->SqlQueryOutputResult($query, array($pages_id));
			if ($row = $result->fetch()) {
				return $row['pages_content'];
			}
        }

        function save_layout($pages_id, $pages_content){        	
			// Save pages_html_id về pages
			$query = "UPDATE pages SET pages_content = ? WHERE pages.pages_id = ?";
			$result = $this->dbObj->SqlQueryOutputResult($query, array(serialize($pages_content), $pages_id));
        }
    }

    switch(@$_POST["hidden"]){

        case "";
        	// khoi dau trang khong co gia tri submit. khong lam zi ca
        break;

        case "savelayout":
			if( $_POST['pages_html'] && $_POST['pages_id'] ){
				//var_dump($_POST);
				$myprocess = new process;
				$myprocess->save_layout($_POST['pages_id'], $_POST['pages_html']);
			}
        break;
		
        default:
        	$func->_redirect(".");
        break;
    }
