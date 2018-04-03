<?php defined( '_VALID_MOS' ) or die( include("404.php") );

    class template_process extends template
    {
	    function process_add_template($giaodien_id, $danhmuc_id, $taikhoan_id, $tengiaodien, $alias, $hinhanh, $video,
						$motangan, $motachitiet, $solanxem, $hienthi, $ngaythem, $thutu, $chophepdathang, $chuthaythegia,
						$noidungbaohanh, $tinhtrang, $hienthitinhtrang, $noidungnhomkhuyenmai,
						$ngaybatdaukhuyenmai, $ngayketthuckhuyenmai, $template_tags, $tuychon_ten,
						$giaodienlienquan, $seo_tieudetrang, $seo_themota, $tacgia_id,$url_demo)
        {			
		    $sql = "INSERT INTO giaodien(
						Id,	danhmuc_id, taikhoan_id, tengiaodien, alias, hinhanh, video,
						motangan, motachitiet, solanxem, hienthi, ngaythem, thutu, chophepdathang, chuthaythegia,
						noidungbaohanh, tinhtrang, hienthitinhtrang, noidungnhomkhuyenmai,
						ngaybatdaukhuyenmai, ngayketthuckhuyenmai, tags, tuychon_ten,
						giaodienlienquan, seo_tieudetrang, seo_themota, tacgia_id,url_demo)
				    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            return $this->dbObj->last_insert_id($sql, array($giaodien_id, $danhmuc_id, $taikhoan_id, $tengiaodien, $alias, $hinhanh, $video,
						$motangan, $motachitiet, $solanxem, $hienthi, $ngaythem, $thutu, $chophepdathang, $chuthaythegia,
						$noidungbaohanh, $tinhtrang, $hienthitinhtrang, $noidungnhomkhuyenmai,
						$ngaybatdaukhuyenmai, $ngayketthuckhuyenmai, $template_tags, $tuychon_ten,
						$giaodienlienquan, $seo_tieudetrang, $seo_themota, $tacgia_id,$url_demo));
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
        
        case "template.add";

			if ( $_FILES['files']['size'][0] > 0 && !empty($_FILES['files']['name'][0]) && $_FILES['files']['error'][0] == 0 ){

				include('../libraries/phpupload/class.fileuploader.php');
			
				//$uploadDir = '../data_setting/dongho001/file_upload/template/';
				$uploadDir = '../uploads/';
		
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
					'files' => null
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
				//print_r($fileList);
				//echo '</pre>';
				
				$hinhanh = array();
				foreach ($fileList as &$file) {
					//echo $file["name"] . "<br>";
					array_push($hinhanh, $file["name"]);
				}

			}

			include_once("../libraries/validation/validation.php");
			$check = false;
		
			$validator = new FormValidator();
			
			//news_title
			$validator->addValidation("template_name","req","Tên sản phẩm không được để trống");
			$validator->addValidation("template_name","minlen=2","Tên sản phẩm phải lớn hơn 2 ký tự");
			
			//$validator->addValidation("parent_category","req","Vui lòng chọn danh mục cha");			
			
			if($validator->ValidateForm())
			{
				if($_POST["act"] == "save"){
				
					$template_process = new template_process;
					$check = true;										

					$giaodien_id				= rand();
					
					$danhmuc_id				= $_POST["template_category"];
					if(!empty($danhmuc_id) && $danhmuc_id != null){
						$danhmuc_id			= $template_process->check_danhmuc_nhap( $danhmuc_id, "danhmuc_id", "danhmucgiaodien", "tieude" );
					}
					
					$taikhoan_id			= $_SESSION["wti"]["Id"];
					$tengiaodien				= $_POST["template_name"]; 
					$alias					= $func->_removesigns($_POST["template_name"]);

					$hinhanh				= json_encode($hinhanh);
					
					$video					= "video updating";
					$motangan				= ""; //$_POST["template_desc"];
					$motachitiet			= $_POST["template_detail"];
					$solanxem				= 1;

					if($_POST["template_display"]){ $hienthi	= 1; } else { $hienthi	= 0; }
					
					$lichhienthi			= $func->_formatdatetime($_POST["date_display"] ." ". date("H:i:s", strtotime($_POST["time_display"])));
					
					$ngaythem				= $func->_formatdate($_POST["date_add"]);
					
					$thutu					= $func->process_getmaxid("giaodien", "thutu");
					$chophepdathang			= $_POST["IsAllowPurchase"];
					$chuthaythegia			= $_POST["CallForPricingLabel"];
					$noidungbaohanh			= $_POST["quaranty"]; 
					$tinhtrang				= $_POST["template_old_new"];
					
					if($_POST["template_old_new_display"]){ $hienthitinhtrang = 1; } else { $hienthitinhtrang = 0; }
										
					$nhomhienthi			=  json_encode(@$_POST["template_option_group"]);
					

					$noidungnhomkhuyenmai	= $_POST["txtPromotionContent"];
					$ngaybatdaukhuyenmai	= $func->_formatdate($_POST["dateRangeFrom"]);
					$ngayketthuckhuyenmai	= $func->_formatdate($_POST["dateRangeTo"]);

                    $giaodienlienquan		= "";


					if($_POST["enable_option"]){
						$tuychon_ten 			= json_encode($_POST["template_option_name"]);
					} else {
						$tuychon_ten 			= json_encode(array(""));
					}
					
					$template_tags			= $_POST["template_tags"];
					
					$seo_tieudetrang		= $_POST["template_seo_title"];
					$seo_themota			= $_POST["template_seo_desc"];
                    $tacgia_id			    = $_POST["template_author"];
                    $url_demo			    = $_POST["url_demo"];

					$template_id = $template_process->process_add_template($giaodien_id, $danhmuc_id, $taikhoan_id, $tengiaodien, $alias, $hinhanh, $video,
						$motangan, $motachitiet, $solanxem, $hienthi, $ngaythem, $thutu, $chophepdathang, $chuthaythegia,
						$noidungbaohanh, $tinhtrang, $hienthitinhtrang, $noidungnhomkhuyenmai,
						$ngaybatdaukhuyenmai, $ngayketthuckhuyenmai, $template_tags, $tuychon_ten,
						$giaodienlienquan, $seo_tieudetrang, $seo_themota, $tacgia_id,$url_demo);
					
					// thêm phiên bản của sản phẩm
					if($template_id > 0){
                        $_SESSION["message"]["notyfy"] = "Đã thêm giao diện <strong>$tengiaodien</strong> thành công!";
						$func->_redirect($index_backend . "template/template/view.html");
						exit;
					} else {
						$_SESSION["message"]["notyfy"] = "Thêm giao diện $tengiaodien không thực hiện được!";
						//$func->_redirect($index_backend);
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