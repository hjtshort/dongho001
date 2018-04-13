<?php defined( '_VALID_MOS' ) or die( include("404.php") );

    class product_process extends product
    {
        public $dbObj;
        
        function __construct()
        {
            $this->dbObj = new classDb();
        }		
        
	    function process_add_product($Id, $danhmuc_id, $taikhoan_id, $masanpham, $tensanpham, $alias, $gia, $giathitruong,
						$giakhuyenmai, $phantramgiam, $giagoc, $dabaogomvat, $donvitinh, $hinhanh, $video,
						$motangan, $motachitiet, $solanxem, $hienthi, $ngaythem, $thutu, $chophepdathang, $chuthaythegia,
						$noidungbaohanh, $tinhtrang, $hienthitinhtrang, $tuychonnhomhienthi, $noidungnhomkhuyenmai,
						$ngaybatdaukhuyenmai, $ngayketthuckhuyenmai, $nhacungcap_id, $product_tags, $tuychon_ten, $tuychon_giatri, $thuoctinh_id,
						$sanphamlienquan, $seo_tieudetrang, $seo_thetukhoa, $seo_themota, $sanpham_tab)
        {			
		    $sql = "INSERT INTO sanpham(
						Id,	danhmuc_id, taikhoan_id, masanpham, tensanpham, alias, gia, giathitruong,
						giakhuyenmai, phantramgiam, giagoc, dabaogomvat, donvitinh, hinhanh, video,
						motangan, motachitiet, solanxem, hienthi, ngaythem, thutu, chophepdathang, chuthaythegia,
						noidungbaohanh, tinhtrang, hienthitinhtrang, tuychonnhomhienthi, noidungnhomkhuyenmai,
						ngaybatdaukhuyenmai, ngayketthuckhuyenmai, nhacungcap_id, tags, tuychon_ten, tuychon_giatri, thuoctinh_id,
						sanphamlienquan, seo_tieudetrang, seo_thetukhoa, seo_themota, sanpham_tab)
				    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            if ($this->dbObj->SqlQueryInputResult($sql, array($Id, $danhmuc_id, $taikhoan_id, $masanpham, $tensanpham, $alias, $gia, $giathitruong,
						$giakhuyenmai, $phantramgiam, $giagoc, $dabaogomvat, $donvitinh, $hinhanh, $video,
						$motangan, $motachitiet, $solanxem, $hienthi, $ngaythem, $thutu, $chophepdathang, $chuthaythegia,
						$noidungbaohanh, $tinhtrang, $hienthitinhtrang, $tuychonnhomhienthi, $noidungnhomkhuyenmai,
						$ngaybatdaukhuyenmai, $ngayketthuckhuyenmai, $nhacungcap_id, $product_tags, $tuychon_ten, $tuychon_giatri, $thuoctinh_id,
						$sanphamlienquan, $seo_tieudetrang, $seo_thetukhoa, $seo_themota, $sanpham_tab)) <> FALSE) {
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

			include_once("../libraries/validation/validation.php");
			$check = false;
		
			$validator = new FormValidator();
			
			//news_title
			$validator->addValidation("product_name","req","Tên sản phẩm không được bỏ trống");
			$validator->addValidation("product_name","minlen=2","Tên sản phẩm phải lớn hơn 2 ký tự");
			
			$validator->addValidation("parent_category","req","Vui lòng chọn danh mục cha");			
			
			if($validator->ValidateForm())
			{
				if($_POST["act"] == "save"){
				
					$product_process = new product_process;
					$check = true;					

					$Id						= rand();
					$danhmuc_id				= $_POST["parent_category"];
					$taikhoan_id			= $_SESSION["wti"]["Id"];
					$masanpham				= $_POST["product_code"];
					$tensanpham				= $_POST["product_name"]; 
					$alias					= $func->_removesigns($_POST["product_name"]);
					
					$gia					= str_replace(",", "", $_POST["product_price"]);
					$giathitruong			= str_replace(",", "", $_POST["product_price_market"]);
					$giakhuyenmai			= str_replace(",", "", $_POST["product_price_promo"]);
					$phantramgiam			= $_POST["product_percent_discount"];
					$giagoc					= str_replace(",", "", $_POST["product_price_cost"]);
					
					if($_POST["include_vat"]){ $dabaogomvat = 1; } else { $dabaogomvat = 0; }
					
					$donvitinh				= $_POST["product_unit"];
					
					$hinhanh = array(
						'hinhanh' => array(											 
							'image_src'			 => @$_POST['image_src'],
							'product_image_desc' => @$_POST['product_image_desc'],
							'choose'			 => @$_POST['choose'])
					);

					$hinhanh				= serialize($hinhanh);
					
					$video					= "video updating";
					$motangan				= ""; //$_POST["product_desc"];
					$motachitiet			= $_POST["product_detail"];
					$solanxem				= 1;

					if($_POST["product_display"]){ $hienthi	= 1; } else { $hienthi	= 0; }
					
					$ngaythem				= $func->_formatdate($_POST["date_add"]);
					$thutu					= $func->process_getmaxid("sanpham", "thutu");
					$chophepdathang			= $_POST["IsAllowPurchase"];
					$chuthaythegia			= $_POST["CallForPricingLabel"];
					$noidungbaohanh			= $_POST["quaranty"]; 
					$tinhtrang				= $_POST["product_old_new"];
					
					if($_POST["product_old_new_display"]){ $hienthitinhtrang = 1; } else { $hienthitinhtrang = 0; }
					
					$tuychonnhomhienthi = NULL;
					if(!empty($_POST["product_option_group"]) && $_POST["product_option_group"] != NULL){
						$tuychonnhomhienthi		=  implode(",", @$_POST["product_option_group"]);
					}
					
					$noidungnhomkhuyenmai	= $_POST["txtPromotionContent"];
					$ngaybatdaukhuyenmai	= $func->_formatdate($_POST["dateRangeFrom"]);
					$ngayketthuckhuyenmai	= $func->_formatdate($_POST["dateRangeTo"]);
					
					$nhacungcap_id			= $_POST["manufacturers"];
					$product_tags			= $_POST["product_tags"];
					
					$tuychon_ten			= serialize($_POST["product_properties_name"]);
					$tuychon_giatri			= serialize($_POST["product_properties_value"]);
					
					$thuoctinh_id			= 0;
					$sanphamlienquan		= "";
					$seo_tieudetrang		= $_POST["product_seo_title"];
					$seo_thetukhoa			= $_POST["product_seo_keyword"];
					$seo_themota			= $_POST["product_seo_desc"];
					$sanpham_tab			= "";

					if($product_process->process_add_product($Id, $danhmuc_id, $taikhoan_id, $masanpham, $tensanpham, $alias, $gia, $giathitruong,
						$giakhuyenmai, $phantramgiam, $giagoc, $dabaogomvat, $donvitinh, $hinhanh, $video,
						$motangan, $motachitiet, $solanxem, $hienthi, $ngaythem, $thutu, $chophepdathang, $chuthaythegia,
						$noidungbaohanh, $tinhtrang, $hienthitinhtrang, $tuychonnhomhienthi, $noidungnhomkhuyenmai,
						$ngaybatdaukhuyenmai, $ngayketthuckhuyenmai, $nhacungcap_id, $product_tags, $tuychon_ten, $tuychon_giatri, $thuoctinh_id,
						$sanphamlienquan, $seo_tieudetrang, $seo_thetukhoa, $seo_themota, $sanpham_tab) <> FALSE){

						
						$_SESSION["message"]["notyfy"] = "Đã thêm sản phẩm <strong>$tensanpham</strong> thành công !";
						//$func->_redirect($index_backend . "product/product/add.html");
						//exit;
					} else {
						$_SESSION["message"]["notyfy"] = "Thêm sản phẩm $tensanpham không thực hiện được !";
						//$func->_redirect($index_backend);
						exit;
					}
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
            $func->_redirect(".");
        break;
    }