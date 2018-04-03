<?php defined( '_VALID_MOS' ) or die( include("404.php") );

    class product_process extends product
    {
        public $dbObj;
        
        function __construct()
        {
            $this->dbObj = new classDb();
        }
		
		function process_get_product_edit($product_id)
        {			
		    $query = "SELECT
						sanpham.sanpham_id,	sanpham.danhmuc_id,	sanpham.taikhoan_id, sanpham.nhasanxuat_id, sanpham.tensanpham,	sanpham.alias, sanpham.hinhanh,
						sanpham.video, sanpham.motangan, sanpham.motachitiet, sanpham.solanxem, sanpham.hienthi,
						sanpham.ngaythem, sanpham.lichhienthi, sanpham.thutu, sanpham.chophepdathang, sanpham.chuthaythegia, sanpham.noidungbaohanh, sanpham.tinhtrang,
						sanpham.hienthitinhtrang, sanpham.nhomhienthi, sanpham.noidungnhomkhuyenmai, sanpham.ngaybatdaukhuyenmai, sanpham.ngayketthuckhuyenmai,
						sanpham.tags, sanpham.tuychon_ten, sanpham.sanphamlienquan, sanpham.seo_tieudetrang, sanpham.seo_themota, sanpham.sanpham_tab,
						danhmucsanpham.tieude as `tendanhmuc`, sanpham_nhasanxuat.nhasanxuat
					FROM sanpham
						LEFT JOIN danhmucsanpham ON danhmucsanpham.danhmuc_id = sanpham.danhmuc_id
						LEFT JOIN sanpham_nhasanxuat ON sanpham_nhasanxuat.nhasanxuat_id = sanpham.nhasanxuat_id
					WHERE sanpham.sanpham_id = ?
					LIMIT 1";

            $result = $this->dbObj->SqlQueryOutputResult($query, array( $product_id ));
		    return $result;
	    }
        
	    function process_edit_product($danhmuc_id, $nhasanxuat_id, $tensanpham, $alias, $hinhanh,
						$motachitiet, $hienthi, $lichhienthi, $chophepdathang, $chuthaythegia,
						$tinhtrang, $hienthitinhtrang, $nhomhienthi,
						$tuychon_ten, $sanphamlienquan, $seo_tieudetrang, $seo_themota, $sanpham_tab, $sanpham_id)
        {			
		    $sql = "UPDATE sanpham SET
						danhmuc_id = ?, nhasanxuat_id = ?, tensanpham = ?, alias = ?, hinhanh = ?,
						motachitiet = ?, hienthi = ?, lichhienthi = ?, chophepdathang = ?, chuthaythegia = ?,
						tinhtrang = ?, hienthitinhtrang = ?, nhomhienthi = ?, tuychon_ten = ?,
						sanphamlienquan = ?, seo_tieudetrang = ?, seo_themota = ?, sanpham_tab = ?
					WHERE sanpham_id = ?";

            if ($this->dbObj->SqlQueryInputResult($sql, array($danhmuc_id, $nhasanxuat_id, $tensanpham, $alias, $hinhanh,
						$motachitiet, $hienthi, $lichhienthi, $chophepdathang, $chuthaythegia,
						$tinhtrang, $hienthitinhtrang, $nhomhienthi,
						$tuychon_ten, $sanphamlienquan, $seo_tieudetrang, $seo_themota, $sanpham_tab, $sanpham_id)) <> FALSE) {
                return true;
            } else {
                return false;
            }
	    }
		
		public function get_phienban( $sanpham_id )
	    {			
		    $query = "SELECT
							sanpham_phienban.phienban_id,
							sanpham_phienban.masanpham,
							sanpham_phienban.mavach,
							sanpham_phienban.giaban,
							sanpham_phienban.giasosanh,
							sanpham_phienban.phantramgiam,
							sanpham_phienban.dabaogomvat,
							sanpham_phienban.quanlykho,
							sanpham_phienban.soluong,
							sanpham_phienban.donvitinh,
							sanpham_phienban.tuychon_giatri,
							sanpham_phienban.hinhanh,
							sanpham_phienban.sanpham_id
						FROM
						sanpham_phienban
					WHERE sanpham_phienban.sanpham_id = ?";
		    $result = $this->dbObj->SqlQueryOutputResult($query, array( $sanpham_id ));
		    return $result;
	    }
		
		public function get_nhasanxuat( )
	    {			
		    $query = "SELECT
						sanpham_nhasanxuat.nhasanxuat_id,
						sanpham_nhasanxuat.nhasanxuat,
						sanpham_nhasanxuat.ngaythem,
						sanpham_nhasanxuat.thutu
					FROM
						sanpham_nhasanxuat";
		    $result = $this->dbObj->SqlQueryOutputResult($query, array(0));
		    return $result;
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
		
		public function get_nhomsanpham( )
	    {			
		    $query = "SELECT
						sanpham_nhom.nhom_id,
						sanpham_nhom.tieude,
						sanpham_nhom.ngaythem,
						sanpham_nhom.thutu
					FROM
						sanpham_nhom";
		    $result = $this->dbObj->SqlQueryOutputResult($query, array(0));
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
        
        case "product.edit";

			include_once("../libraries/validation/validation.php");
			$check = false;
		
			$validator = new FormValidator();
			
			//news_title
			$validator->addValidation("product_name","req","Tên danh mục không được bỏ trống");
			$validator->addValidation("product_name","minlen=2","Tên danh mục phải lớn hơn 2 ký tự");
			
			if($validator->ValidateForm())
			{
				if($_POST["act"] == "save"){

					include_once('../libraries/phpupload/class.fileuploader.php');
				
					//$uploadDir = '../data_setting/dongho001/file_upload/product/';
					$uploadDir = REAL_PATH."/{$conf['data_user']}/file_upload/product/";
					
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
						

					$product_process = new product_process;
					$check = true;					

					$sanpham_id				= intval( $conf['geturl']['id'] );
					
					$danhmuc_id				= $_POST["product_category"];
					if(!empty($danhmuc_id) && $danhmuc_id != null){
						$danhmuc_id			= $product_process->check_danhmuc_nhap( $danhmuc_id, "danhmuc_id", "danhmucsanpham", "tieude" );
					}
					
					$tensanpham				= $_POST["product_name"]; 
					$alias					= $func->_removesigns($_POST["product_name"]);					
					
					$hinhanh				= json_encode($hinhanh);					
					
					$motachitiet			= $func->txt_htmlspecialchars($_POST["product_detail"]);

					if(@$_POST["product_display"]){ $hienthi	= 1; } else { $hienthi	= 0; }
					
					$chophepdathang			= $_POST["IsAllowPurchase"];
					$chuthaythegia			= $_POST["CallForPricingLabel"];
					$noidungbaohanh			= $_POST["quaranty"]; 
					$tinhtrang				= $_POST["product_old_new"];
					
					if(@$_POST["product_old_new_display"]){ $hienthitinhtrang = 1; } else { $hienthitinhtrang = 0; }
					
					$tuychonnhomhienthi = NULL;
					if(!empty($_POST["product_option_group"]) && $_POST["product_option_group"] != NULL){
						$tuychonnhomhienthi		=  implode(",", @$_POST["product_option_group"]);
					}

					$nhasanxuat_id			= $_POST["manufacturers"];
					
					if($_POST["enable_option"]){
						$tuychon_ten 			= json_encode($_POST["product_option_name"]);
					} else {
						$tuychon_ten 			= json_encode(array(""));
					}
					
					$sanphamlienquan		= "";
					$seo_tieudetrang		= $_POST["product_seo_title"];
					$seo_themota			= $_POST["product_seo_desc"];
					$sanpham_tab			= "";

					if($product_process->process_edit_product($danhmuc_id, $nhasanxuat_id, $tensanpham, $alias, $hinhanh,
						$motachitiet, $hienthi, $lichhienthi, $chophepdathang, $chuthaythegia,
						$tinhtrang, $hienthitinhtrang, $nhomhienthi,
						$tuychon_ten, $sanphamlienquan, $seo_tieudetrang, $seo_themota, $sanpham_tab, $sanpham_id) <> FALSE){
						
						$_SESSION["message"]["notyfy"] = "Notify('Đã cập nhật sản phẩm <strong>$tensanpham</strong> thành công!', 'bottom-right', '5000', 'sky', 'fa-check', true); return false;";						
						//$func->_redirect($index_backend . "product/product/add.html");
						//exit;
					} else {
						$_SESSION["message"]["notyfy"] = "Notify('Cập nhật sản phẩm $tensanpham không thực hiện được!', 'bottom-right', '5000', 'sky', 'fa-warning', true); return false;";
						$func->_redirect($index_backend);
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