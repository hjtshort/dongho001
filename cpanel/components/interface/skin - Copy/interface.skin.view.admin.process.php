<?php defined( '_VALID_MOS' ) or die( include("../../content/news/404.php") );

	// include('../libraries/htmldom/simple_html_dom.php');

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

        case "Save":
        		$myprocess = new PageData(true);

                // Get current theme
                $theme_config = $myprocess->read_theme_config();

                $page_data = array();

                $post = $_POST;

                $file = array_filter(getFixedFilesArray());
                include $_SERVER['DOCUMENT_ROOT'] . '/libraries/SimpleImage/SimpleImage.php';

                // Chỉ lấy giá trị trong pagelist, không lấy tất cả giá trị của _POST
                $page_list = array("home", "products", "product");
				
                foreach($page_list as $page){
					
					$page_data[$page] = $post[$page];
					
					/*echo $page . "<br>";
                    foreach($post[$page] as $section => $node) {
						var_dump($post[$page]) . "<br><br><br><br><br>";
                        $page_data[$page] = $post[$page];
                    }*/

                    // Hinh
					if(!empty($file[$page])){
						foreach ($file[$page] as $section => $element) {
							foreach ($element as $elem => $val) {
								if(!empty($file[$page][$section][$elem]["tmp_name"])){
	
									// Config
									$image_tmp_name = $file[$page][$section][$elem]["tmp_name"];
									$image_ext = pathinfo($file[$page][$section][$elem]["name"], PATHINFO_EXTENSION);
	
									// Kiem tra
									$mime = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $image_tmp_name);
									$allow_mimetype = array('image/png', 'image/jpeg', 'image/gif');
	
									if(in_array($mime, $allow_mimetype)){
										// Dinh dang duoc cho phep
										if(getimagesize($image_tmp_name)){
											// Chinh xac la hinh anh
											$image_path = $_SERVER['DOCUMENT_ROOT'] . '/file_upload/' . $_SERVER['SERVER_NAME'] . '/images/';
											$image_name =  $section . '_' . $elem . '.' . $image_ext;
	
											// Xoa file neu co ton tai
											if(file_exists($image_path . $image_name)){
												unlink($image_path . $image_name);
											}
	
											if(!is_dir($image_path) && !mkdir($image_path, 0755, true)){
												//echo 'Thu muc khong ton tai';
												$page_data[$page][$section][$elem] = $myprocess->page_data[$page][$section][$elem];
											} elseif (move_uploaded_file($image_tmp_name, $image_path . $image_name)){
												//echo 'Thanh cong' . $image_ext;
												//print_r($theme_config["page"][$page]["section"][$section]["element"][$elem]);
												if(isset($theme_config["page"][$page]["section"][$section]["element"][$elem]["size"])){
													list($img_width, $img_height) = explode("|", $theme_config["page"][$page]["section"][$section]["element"][$elem]["size"]);
	
													$image = new \claviska\SimpleImage();
													$image
														->fromFile($image_path . $image_name)                     // load image.jpg
														->autoOrient()                              // adjust orientation based on exif data
														->bestFit($img_width, $img_height)                          // resize to 320x200 pixels
														->toFile($image_path . $image_name);
												}
												$page_data[$page][$section][$elem] = $image_name;
											}
										} else {
											$page_data[$page][$section][$elem] = $myprocess->page_data[$page][$section][$elem];
										}
									} else {
										echo 'Vui long chi upload hinh co dinh dang JPG, PNG, GIF,...';
										$page_data[$page][$section][$elem] = $myprocess->page_data[$page][$section][$elem];
									}
									//echo '/images/' . $page . '/' . $section . '/' . $elem . '.' . $val['type'];
								} else {
									$page_data[$page][$section][$elem] = $myprocess->page_data[$page][$section][$elem];
								}
							}
						}
					}
                }
				
	        	$myprocess->save_page($page_data);
				
				//$func->_redirect("./interface/skin/view.html");
				
        	break;

        default:
        	$func->_redirect(".");
        break;
    }
