<?php defined( '_VALID_MOS' ) or die( include("404.php") );

    class product_process extends product
    {
        public $dbObj;
        
        function __construct()
        {
            $this->dbObj = new classDb();
        }		
        
	    function process_add_product($sanpham_id, $danhmuc_id, $taikhoan_id, $nhasanxuat_id, $tensanpham, $alias, $hinhanh, $video,
						$motangan, $motachitiet, $solanxem, $hienthi, $lichhienthi, $ngaythem, $thutu, $chophepdathang, $chuthaythegia,
						$noidungbaohanh, $tinhtrang, $hienthitinhtrang, $nhomhienthi, $noidungnhomkhuyenmai,
						$ngaybatdaukhuyenmai, $ngayketthuckhuyenmai, $product_tags, $tuychon_ten,
						$sanphamlienquan, $seo_tieudetrang, $seo_themota, $sanpham_tab)
        {			
		    $sql = "INSERT INTO sanpham(
						sanpham_id,	danhmuc_id, taikhoan_id, nhasanxuat_id, tensanpham, alias, hinhanh, video,
						motangan, motachitiet, solanxem, hienthi, lichhienthi, ngaythem, thutu, chophepdathang, chuthaythegia,
						noidungbaohanh, tinhtrang, hienthitinhtrang, nhomhienthi, noidungnhomkhuyenmai,
						ngaybatdaukhuyenmai, ngayketthuckhuyenmai, tags, tuychon_ten,
						sanphamlienquan, seo_tieudetrang, seo_themota, sanpham_tab)
				    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            return $this->dbObj->last_insert_id($sql, array($sanpham_id, $danhmuc_id, $taikhoan_id, $nhasanxuat_id, $tensanpham, $alias, $hinhanh, $video,
						$motangan, $motachitiet, $solanxem, $hienthi, $lichhienthi, $ngaythem, $thutu, $chophepdathang, $chuthaythegia,
						$noidungbaohanh, $tinhtrang, $hienthitinhtrang, $nhomhienthi, $noidungnhomkhuyenmai,
						$ngaybatdaukhuyenmai, $ngayketthuckhuyenmai, $product_tags, $tuychon_ten,
						$sanphamlienquan, $seo_tieudetrang, $seo_themota, $sanpham_tab));
	    }
		
		function process_add_sanpham_phienban($masanpham, $mavach, $giaban, $giasosanh, $phantramgiam,
						$dabaogomvat, $quanlykho, $soluong, $donvitinh, $tuychon_giatri, $hinhanh, $sanpham_id)
        {			
		    $sql = "INSERT INTO sanpham_phienban(masanpham, mavach, giaban, giasosanh, phantramgiam,
						dabaogomvat, quanlykho, soluong, donvitinh, tuychon_giatri, hinhanh, sanpham_id)
				    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
					
            if ($this->dbObj->SqlQueryInputResult($sql, array($masanpham, $mavach, $giaban, $giasosanh, $phantramgiam,
						$dabaogomvat, $quanlykho, $soluong, $donvitinh, $tuychon_giatri, $hinhanh, $sanpham_id)) <> FALSE) {
                return true;
            } else {
                return false;
            }
	    }
		
		public function get_properties( )
	    {			
		    $query = "SELECT
						sanpham_thuoctinh.thuoctinh_id,
						sanpham_thuoctinh.tennhom,
						sanpham_thuoctinh.motanhom,
						sanpham_thuoctinh.tenthuoctinh,
						sanpham_thuoctinh.macdinh,
						sanpham_thuoctinh.ngaythem,
						sanpham_thuoctinh.thutu
					FROM
						sanpham_thuoctinh
					WHERE sanpham_thuoctinh.macdinh = 1
					LIMIT 1";
		    $result = $this->dbObj->SqlQueryOutputResult($query, array( 0 ));
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
        
        case "product.add";

			if ( $_FILES['files']['size'][0] > 0 && !empty($_FILES['files']['name'][0]) && $_FILES['files']['error'][0] == 0 ){

				include('../libraries/phpupload/class.fileuploader.php');
			
				//$uploadDir = '../data_setting/dongho001/file_upload/product/';
				$uploadDir = REAL_PATH."/{$conf['data_user']}/file_upload/product/";

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
			$validator->addValidation("product_name","req","Tên sản phẩm không được để trống");
			$validator->addValidation("product_name","minlen=2","Tên sản phẩm phải lớn hơn 2 ký tự");
			
			//$validator->addValidation("parent_category","req","Vui lòng chọn danh mục cha");			
			
			if($validator->ValidateForm())
			{
				if($_POST["act"] == "save"){
				
					$product_process = new product_process;
					$check = true;										

					$sanpham_id				= rand();
					
					$danhmuc_id				= $_POST["product_category"];
					if(!empty($danhmuc_id) && $danhmuc_id != null){
						$danhmuc_id			= $product_process->check_danhmuc_nhap( $danhmuc_id, "danhmuc_id", "danhmucsanpham", "tieude" );
					}
					
					$taikhoan_id			= $_SESSION["wti"]["Id"];
					$tensanpham				= $_POST["product_name"]; 
					$alias					= $func->_removesigns($_POST["product_name"]);

					$hinhanh				= json_encode($hinhanh);
					
					$video					= "video updating";
					$motangan				= ""; //$_POST["product_desc"];
					$motachitiet			= $_POST["product_detail"];
					$solanxem				= 1;

					if($_POST["product_display"]){ $hienthi	= 1; } else { $hienthi	= 0; }
					
					$lichhienthi			= $func->_formatdatetime($_POST["date_display"] ." ". date("H:i:s", strtotime($_POST["time_display"])));
					
					$ngaythem				= $func->_formatdate($_POST["date_add"]);
					
					$thutu					= $func->process_getmaxid("sanpham", "thutu");
					$chophepdathang			= $_POST["IsAllowPurchase"];
					$chuthaythegia			= $_POST["CallForPricingLabel"];
					$noidungbaohanh			= $_POST["quaranty"]; 
					$tinhtrang				= $_POST["product_old_new"];
					
					if($_POST["product_old_new_display"]){ $hienthitinhtrang = 1; } else { $hienthitinhtrang = 0; }
										
					$nhomhienthi			=  json_encode(@$_POST["product_option_group"]);
					
					/*
					$noidungnhomkhuyenmai	= $_POST["txtPromotionContent"];
					$ngaybatdaukhuyenmai	= $func->_formatdate($_POST["dateRangeFrom"]);
					$ngayketthuckhuyenmai	= $func->_formatdate($_POST["dateRangeTo"]);
					*/
					
					$nhasanxuat_id			= $_POST["manufacturers"];
					if(!empty($nhasanxuat_id) && $nhasanxuat_id != null){
						$nhasanxuat_id		= $product_process->check_danhmuc_nhap( $nhasanxuat_id, "nhasanxuat_id", "sanpham_nhasanxuat", "nhasanxuat" );
					}
					
					if($_POST["enable_option"]){
						$tuychon_ten 			= json_encode($_POST["product_option_name"]);
					} else {
						$tuychon_ten 			= json_encode(array(""));
					}
					
					$product_tags			= $_POST["product_tags"];
					
					$seo_tieudetrang		= $_POST["product_seo_title"];
					$seo_themota			= $_POST["product_seo_desc"];
					$sanpham_tab			= "";										

					$product_id = $product_process->process_add_product($sanpham_id, $danhmuc_id, $taikhoan_id, $nhasanxuat_id, $tensanpham, $alias, $hinhanh, $video,
						$motangan, $motachitiet, $solanxem, $hienthi, $lichhienthi, $ngaythem, $thutu, $chophepdathang, $chuthaythegia,
						$noidungbaohanh, $tinhtrang, $hienthitinhtrang, $nhomhienthi, $noidungnhomkhuyenmai,
						$ngaybatdaukhuyenmai, $ngayketthuckhuyenmai, $product_tags, $tuychon_ten,
						$sanphamlienquan, $seo_tieudetrang, $seo_themota, $sanpham_tab);
					
					// thêm phiên bản của sản phẩm
					if($product_id > 0){
						
						if($_POST["enable_option"]){
							$product_option_name = $_POST['product_option_name'];
										
							for($i = 0; $i < count($product_option_name); $i++){
								if($i == 0){
									$masanpham 		= $_POST["product_code"];
									$mavach 		= $_POST["product_barcode"];
									$giaban 		= str_replace(",", "", $_POST["product_price"]);
									$giasosanh 		= str_replace(",", "", $_POST["product_price_compare"]);
									$phantramgiam	= $_POST["product_percent_discount"];
									$dabaogomvat	= $_POST["include_vat"];
									$quanlykho		= $_POST["inventory_management"];
									$soluong		= $_POST["inventory_quantity"];
									$donvitinh		= $_POST["unit"];
								}
								
								$hinhanh		= "";
								$sanpham_id		= $product_id;					
								$tuychon_giatri = json_encode(@$_POST['product_option_value']);
									
								if($product_process->process_add_sanpham_phienban($masanpham, $mavach, $giaban, $giasosanh, $phantramgiam,
										$dabaogomvat, $quanlykho, $soluong, $donvitinh, $tuychon_giatri, $hinhanh, $sanpham_id) <> FALSE){
									$_SESSION["message"]["notyfy"] = "Notify('Đã thêm sản phẩm <strong>$tensanpham</strong> thành công!', 'bottom-right', '5000', 'sky', 'fa-check', true); return false;";							
								}
							}

						} else {
							$masanpham 		= $_POST["product_code"];
							$mavach 		= $_POST["product_barcode"];
							$giaban 		= str_replace(",", "", $_POST["product_price"]);
							$giasosanh 		= str_replace(",", "", $_POST["product_price_compare"]);
							$phantramgiam	= $_POST["product_percent_discount"];
							$dabaogomvat	= $_POST["include_vat"];
							$quanlykho		= $_POST["inventory_management"];
							$soluong		= $_POST["inventory_quantity"];
							$donvitinh		= $_POST["unit"];
							//$tuychon_giatri	= json_encode($_POST["product_option_name"]);
							
							$hinhanh		= "";
							$sanpham_id		= $product_id;
							$tuychon_giatri = json_encode(array(""));
								
							if($product_process->process_add_sanpham_phienban($masanpham, $mavach, $giaban, $giasosanh, $phantramgiam,
									$dabaogomvat, $quanlykho, $soluong, $donvitinh, $tuychon_giatri, $hinhanh, $sanpham_id) <> FALSE){
								$_SESSION["message"]["notyfy"] = "Notify('Đã thêm sản phẩm <strong>$tensanpham</strong> thành công!', 'bottom-right', '5000', 'sky', 'fa-check', true); return false;";							
							}	
						}
						
						//$func->_redirect($index_backend . "product/product/add.html");
						//exit;													
					} else {
						$_SESSION["message"]["notyfy"] = "Notify('Thêm sản phẩm $tensanpham không thực hiện được!', 'bottom-right', '5000', 'sky', 'fa-warning', true); return false;";
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