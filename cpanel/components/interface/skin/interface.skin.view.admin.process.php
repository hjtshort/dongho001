<?php 

	class process
    {
        public $dbObj;
		
		function __construct()
        {
            $this->dbObj = new classDb();
        }
		
		function get_type_product_json( ){
			$this->dbObj = new classDb();
			$sql = "SELECT
						loaisanpham.loai_id,
						loaisanpham.tieude,
						loaisanpham.alias,
						loaisanpham.ngaythem,
						loaisanpham.ngaysua,
						loaisanpham.thutu,
						loaisanpham.hienthi
					FROM
						loaisanpham
					WHERE `loaisanpham`.`hienthi` = 1";
            $result = $this->dbObj->SqlQueryOutputResult($sql, array(0));
			$type_product = "[";
			while ($row = $result->fetch()){
				if($i>0) $type_product .= ",";
				$type_product .= '{"id":"'.$row["loai_id"].'","name":"'.$row["tieude"].'"}';
				$i++;
			}
			$type_product .= "]";
			return $type_product;
		}
		
		function get_collection_product_json()
		{
			$result = $this->get_category_view();
			$table_row = $result->fetchAll();			
			
			$category = array();
			$this->category($table_row, $category);
			
			$collection_product = "[";
			foreach($category as $key => $row){
				if($i>0) $collection_product .= ",";
				$collection_product .= '{"id":"'.$row["danhmuc_id"].'","name":"'.$row["level"] . $row["tieude"].'"}';
				@$i++;
			}
			$collection_product .= "]";
			return $collection_product;
		}
		
		public function get_category_view()
	    {
		    $sql = "SELECT danhmucsanpham.danhmuc_id, danhmucsanpham.tieude, danhmucsanpham.danhmuccha,
						   danhmucsanpham.hienthi, danhmucsanpham.tomtat, danhmucsanpham.thutu
					FROM danhmucsanpham
				    ORDER BY `thutu` ASC, `ngaythem` DESC";
		    $result = $this->dbObj->SqlQueryOutputResult($sql, array(0));
		    return $result;
	    }
		
		function category($table_row, &$category, $danhmuccha = 0, $level = "")
		{
			foreach($table_row as $key => $row){
				if($row['danhmuccha'] == $danhmuccha){
					$category[] = array(
						'danhmuc_id'	=>	$row['danhmuc_id'],
						'tieude'		=>	$row["tieude"],
						'danhmuccha'	=>	$row["danhmuccha"],
						'tomtat'		=>	$row["tomtat"],
						'hienthi'		=>	$row["hienthi"],
						'thutu'			=>	$row["thutu"],
						'level'			=>	$level
					);
					unset($table_row[$key]);
					$this->category($table_row, $category, $row['danhmuc_id'], $level . '&nbsp;&nbsp;&nbsp └ ');
					//$synbold = "└";
				}
			}
		}
	}
	
    function getFixedFilesArray() {
        $walker = function ($arr, $fileInfokey, callable $walker) {
            $ret = array();
            foreach ($arr as $k => $v) {
                if (is_array($v)) {
                    $ret[$k] = $walker($v, $fileInfokey, $walker);
                } else {
                    $ret[$k][$fileInfokey] = $v;
                }
            }
            return $ret;
        };

        $files = array();
        foreach ($_FILES as $name => $values) {
            // init for array_merge
            if (!isset($files[$name])) {
                $files[$name] = array();
            }
            if (!is_array($values['error'])) {
                // normal syntax
                $files[$name] = $values;
            } else {
                // html array feature
                foreach ($values as $fileInfoKey => $subArray) {
                    $files[$name] = array_replace_recursive($files[$name], $walker($subArray, $fileInfoKey, $walker));
                }
            }
        }

        return $files;
    }

	include('../modules/modules.models.php');

    switch(@$_POST["hidden"]){

        case "";
        break;
		
		case "save":
	
			$data_old = $conf['data'];
			$data 	  = array();
			
			foreach($_POST as $key => $value) {
				//echo $key ." : ". $value . "<br>";
				if(substr($key, -6) != "--size" && substr($key, -6) != "hidden" ){
					$data[$key] =  $value;
				}				
			}
			
			$file = array_filter(getFixedFilesArray());
            include $_SERVER['DOCUMENT_ROOT'] . '/libraries/SimpleImage/SimpleImage.php';
			
			foreach ($_FILES as $name => $values) {
				if(!empty($file[$name]["tmp_name"])){
					
					$image_tmp_name = $file[$name]["tmp_name"];
					$image_ext = pathinfo($file[$name]["name"], PATHINFO_EXTENSION);

					// Kiem tra
					$mime = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $image_tmp_name);
					$allow_mimetype = array('image/png', 'image/jpeg', 'image/gif');

					if(in_array($mime, $allow_mimetype)){
						// Dinh dang duoc cho phep
						if(getimagesize($image_tmp_name)){
							// Chinh xac la hinh anh
							$image_path = $_SERVER['DOCUMENT_ROOT'] . '/data_setting/' . $_SERVER['SERVER_NAME'] . '/file_upload/images/';
							$image_name = $file[$name]["name"];

							// Xoa file neu co ton tai
							if(file_exists($image_path . $image_name)){
								unlink($image_path . $image_name);
							}

							if(!is_dir($image_path) && !mkdir($image_path, 0755, true)){
								echo 'Thu muc khong ton tai';
							} elseif (move_uploaded_file($image_tmp_name, $image_path . $image_name)){
								
								$size = @$_POST[$name . "-size"];

								list($img_width, $img_height) = explode("|", $size);
								
								if($img_width > 0 && $img_height > 0){
									$image = new \claviska\SimpleImage();
									$image
										->fromFile($image_path . $image_name)       // load image.jpg
										->autoOrient()                              // adjust orientation based on exif data
										->bestFit($img_width, $img_height)          // resize to 320x200 pixels
										->toFile($image_path . $image_name);
								} else {
									$image = new \claviska\SimpleImage();
									$image
										->fromFile($image_path . $image_name)       // load image.jpg
										->autoOrient()                              // adjust orientation based on exif data
										->bestFit(1366, 768)          // resize to 320x200 pixels
										->toFile($image_path . $image_name);
								}
								$data[$name] = $values["name"];
							}
						}
					} else {
						echo 'Vui long chi upload hinh co dinh dang JPG, PNG, GIF,...';
					} 
				} else {
					// if khong chọn file thì lấy file cũ từ config
					$data[$name] = $data_old[$name];
				}
			}

			$json = $func->json_encode_unicode(array('data' => $data));
			
			if (file_put_contents(REAL_PATH."/".$conf['template_user']."/config/setting_data.json", $func->black_list_tags($json)))
            {
                $_SESSION["message"]["notyfy"] = "Đã cập nhật giao diện thành công !";
                $func->_redirect($index_backend . "interface/skin/view.html");
            }


			else 
				echo "Oops! Lỗi lưu dữ liệu ...";

		break;      

        default:
        	$func->_redirect(".");
        break;
    }
