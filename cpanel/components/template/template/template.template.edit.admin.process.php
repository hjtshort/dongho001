<?php defined( '_VALID_MOS' ) or die( include("404.php") );

    class template_process extends template
    {
		function process_get_template_edit($template_id)
        {			
		    $query = "SELECT
						giaodien.Id,	giaodien.danhmuc_id,	giaodien.taikhoan_id, giaodien.tengiaodien,	giaodien.alias, giaodien.hinhanh,
						giaodien.video, giaodien.motangan, giaodien.motachitiet, giaodien.solanxem, giaodien.hienthi,
						giaodien.ngaythem, giaodien.thutu, giaodien.chophepdathang, giaodien.chuthaythegia, giaodien.noidungbaohanh, giaodien.tinhtrang,
						giaodien.hienthitinhtrang, giaodien.noidungnhomkhuyenmai, giaodien.ngaybatdaukhuyenmai, giaodien.ngayketthuckhuyenmai,
						giaodien.tags, giaodien.tuychon_ten, giaodien.giaodienlienquan, giaodien.seo_tieudetrang, giaodien.seo_themota,
						danhmucgiaodien.tieude as `tendanhmuc`, 
						taikhoanquantri.ten as ten_tacgia,
						taikhoanquantri.ho as ho_tacgia,
						tacgia_id,url_demo
					FROM giaodien
						LEFT JOIN danhmucgiaodien ON danhmucgiaodien.danhmuc_id = giaodien.danhmuc_id
						LEFT JOIN taikhoanquantri ON tacgia_id = taikhoanquantri.Id
					WHERE giaodien.Id = ?
					LIMIT 1";

            $result = $this->dbObj->SqlQueryOutputResult($query, array( $template_id ));
		    return $result;
	    }
        
	    function process_edit_template($danhmuc_id, $tengiaodien, $alias, $hinhanh,
						$motachitiet, $hienthi, $chophepdathang, $chuthaythegia,
						$tinhtrang, $hienthitinhtrang,
						$tuychon_ten, $giaodienlienquan, $seo_tieudetrang, $seo_themota, $tacgia_id,$url_demo, $giaodien_id)
        {			
		    $sql = "UPDATE giaodien SET
						danhmuc_id = ?, tengiaodien = ?, alias = ?, hinhanh = ?,
						motachitiet = ?, hienthi = ?, chophepdathang = ?, chuthaythegia = ?,
						tinhtrang = ?, hienthitinhtrang = ?, tuychon_ten = ?,
						giaodienlienquan = ?, seo_tieudetrang = ?, seo_themota = ?, tacgia_id = ?,url_demo = ?
					WHERE Id = ?";

            if ($this->dbObj->SqlQueryInputResult($sql, array($danhmuc_id, $tengiaodien, $alias, $hinhanh,
						$motachitiet, $hienthi, $chophepdathang, $chuthaythegia,
						$tinhtrang, $hienthitinhtrang, $tuychon_ten,
                        $giaodienlienquan, $seo_tieudetrang, $seo_themota, $tacgia_id,$url_demo, $giaodien_id)) <> FALSE) {
                return true;
            } else {
                return false;
            }
	    }
        public function check_danhmuc_nhap( $value, $colum, $table, $cond )
        {
            $query = "SELECT $colum FROM $table WHERE $cond = ?";
            $result = $this->dbObj->SqlQueryOutputResult($query, array($value));
            if($result->rowCount() > 0){
                $row = $result->fetch();
                return $row[0];
            } else {
                $sql = "INSERT INTO $table ($cond) VALUES (?)";
                $last_insert_id = $this->dbObj->last_insert_id($sql, array($value));
                if ($last_insert_id > 0) {
                    return $last_insert_id;
                } else {
                    return "";
                }
            }
        }
        public function get_list_author()
        {
            $sql = "SELECT taikhoanquantri.Id,ten, ho, uid, email
					FROM taikhoanquantri";
            $result = $this->dbObj->SqlQueryOutputResult($sql, array(0));
            return $result;
        }
    }
    
    /*  ___________________________
       |                           |
       |          HANDLER          |
       |___________________________|
    */
    
    switch(@$_POST["hidden"]){

        case "";
        	// khoi dau trang khong co gia tri submit. khong lam zi ca
        break;                       
        
        case "template.edit";

			include_once("../libraries/validation/validation.php");
			$check = false;
		
			$validator = new FormValidator();
			
			//news_title
			$validator->addValidation("template_name","req","Tên danh mục không được bỏ trống");
			$validator->addValidation("template_name","minlen=2","Tên danh mục phải lớn hơn 2 ký tự");
			
			if($validator->ValidateForm())
			{
				if($_POST["act"] == "save"){

					include_once('../libraries/phpupload/class.fileuploader.php');
				
					//$uploadDir = '../data_setting/dongho001/file_upload/template/';
                    $uploadDir = '../'.$conf['data_user'].'/file_upload/images/';
					
					$appendedFiles = array();
					
					$hinhanh_old = explode("|", $_POST["json_image"]);
					
					foreach ($hinhanh_old as $key => $file) {
						if(is_dir($file)) continue;
						
						// add file to our array
						// !important please follow the structure below
						$appendedFiles[] = array(
							"name" => $file,
							"type" => FileUploader::mime_content_type($uploadDir . $file),
							"size" => filesize($uploadDir . $file),
							"file" => $uploadDir . $file,
							"data" => array(
								"url" => $uploadDir . $file
							)
						);
					}
					
					// initialize FileUploader
					$FileUploader = new FileUploader('files', array(
						'limit' => 10,
						'maxSize' => 5,
						'fileMaxSize' => null,
						'extensions' => array('jpg', 'jpeg', 'png', 'gif', 'bmp'),
						'required' => false,
						'uploadDir' => $uploadDir,
						'title' => '{file_name}-{timestamp}',
						'replace' => false,
						'editor' => array(
							'maxWidth' => 800,
							'maxHeight' => 600,
							'quality' => 100
						),
						'listInput' => true,
						'files' => $appendedFiles
					));
				
					// unlink the files
					// !important only for appended files
					// you will need to give the array with appendend files in 'files' option of the fileUploader
					foreach($FileUploader->getRemovedFiles('file') as $key=>$value) {
						unlink($uploadDir . $value['name']);
					}
					
					// call to upload the files
					$data = $FileUploader->upload();
				
					// if uploaded and success
					if($data['isSuccess'] && count($data['files']) > 0) {
						// get uploaded files
						$uploadedFiles = $data['files'];
					}
					// if warnings
					if($data['hasWarnings']) {
						$warnings = $data['warnings'];
						
						echo '<pre>';
						print_r($warnings);
						echo '</pre>';
					}
					
					// get the fileList
					$fileList = $FileUploader->getFileList();
					
					// show
					//echo '<pre>';
					///print_r($fileList);
					//echo '</pre>';
					
					$hinhanh = array();
					foreach ($fileList as &$file) {
						//echo $file["name"] . "<br>";
						array_push($hinhanh, $file["name"]);
					}
						

					$template_process = new template_process;
					$check = true;					

					$giaodien_id				= intval( $conf['geturl']['id'] );
					
					$danhmuc_id				= $_POST["template_category"];
					if(!empty($danhmuc_id) && $danhmuc_id != null){
						$danhmuc_id			= $template_process->check_danhmuc_nhap( $danhmuc_id, "danhmuc_id", "danhmucgiaodien", "tieude" );
					}
					
					$tengiaodien				= $_POST["template_name"]; 
					$alias					= $func->_removesigns($_POST["template_name"]);					
					
					$hinhanh				= json_encode($hinhanh);					
					
					$motachitiet			= $func->txt_htmlspecialchars($_POST["template_detail"]);

					if(@$_POST["template_display"]){ $hienthi	= 1; } else { $hienthi	= 0; }
					
					$chophepdathang			= $_POST["IsAllowPurchase"];
					$chuthaythegia			= $_POST["CallForPricingLabel"];
					$noidungbaohanh			= $_POST["quaranty"]; 
					$tinhtrang				= $_POST["template_old_new"];
					
					if(@$_POST["template_old_new_display"]){ $hienthitinhtrang = 1; } else { $hienthitinhtrang = 0; }
					
					$tuychonnhomhienthi = NULL;
					if(!empty($_POST["template_option_group"]) && $_POST["template_option_group"] != NULL){
						$tuychonnhomhienthi		=  implode(",", @$_POST["template_option_group"]);
					}

					$nhasanxuat_id			= $_POST["manufacturers"];
					
					if($_POST["enable_option"]){
						$tuychon_ten 			= json_encode($_POST["template_option_name"]);
					} else {
						$tuychon_ten 			= json_encode(array(""));
					}
					
					$giaodienlienquan		= "";
					$seo_tieudetrang		= $_POST["template_seo_title"];
					$seo_themota			= $_POST["template_seo_desc"];
					$tacgia_id			    = $_POST["template_author"];
					$url_demo			    = $_POST["url_demo"];

					if($template_process->process_edit_template($danhmuc_id, $tengiaodien, $alias, $hinhanh,
						$motachitiet, $hienthi, $chophepdathang, $chuthaythegia,
						$tinhtrang, $hienthitinhtrang,
						$tuychon_ten, $giaodienlienquan, $seo_tieudetrang, $seo_themota, $tacgia_id,$url_demo, $giaodien_id) <> FALSE){
						
						$_SESSION["message"]["notyfy"] = "Đã cập nhật giao diện <strong>$tengiaodien</strong> thành công!";
						$func->reload();
						exit;
					} else {
						$_SESSION["message"]["notyfy"] = "Cập nhật giao diện $tengiaodien không thực hiện được!";
						$func->reload();
						exit;
					}

				}
				
			} else {
				
				$check = false;
				$error_hash = $validator->GetErrors();
				foreach($error_hash as $inpname => $inp_err)
				{
					@$_SESSION["message"][$inpname] = '<span class="help-block">'. $inp_err .'</span>';
				}
			}		           
			
        break;

        
        default:
            $func->_redirect(".");
        break;
    }