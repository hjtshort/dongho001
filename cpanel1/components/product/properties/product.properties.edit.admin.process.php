<?php defined( '_VALID_MOS' ) or die( include("404.php") );

    class product_process extends product
    {
        public $dbObj;
        
        function __construct()
        {
            $this->dbObj = new classDb();
        }		
        
	    function process_edit_properties($tennhom, $motanhom, $tenthuoctinh, $thuoctinh_id)
        {			
		    $sql = "UPDATE sanpham_thuoctinh SET
						sanpham_thuoctinh.tennhom = ?,
						sanpham_thuoctinh.motanhom = ?,
						sanpham_thuoctinh.tenthuoctinh = ?
				    WHERE sanpham_thuoctinh.thuoctinh_id = ?";

            if ($this->dbObj->SqlQueryInputResult($sql, array($tennhom, $motanhom, $tenthuoctinh, $thuoctinh_id)) <> FALSE) {
                return true;
            } else {
                return false;
            }
	    }
		
		public function get_properties_edit( $properties_id = 0 )
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
					WHERE sanpham_thuoctinh.thuoctinh_id = ?
					LIMIT 1";
		    $result = $this->dbObj->SqlQueryOutputResult($query, array( $properties_id ));
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
        
        case "properties.edit";
		
			include_once("../libraries/validation/validation.php");
			$check = false;
		
			$validator = new FormValidator();						
			
			//category_title
			$validator->addValidation("product_properties_title","req","Tên danh mục không được bỏ trống");
			$validator->addValidation("product_properties_title","minlen=5","Tên danh mục phải lớn hơn 5 ký tự");			
			
			if($validator->ValidateForm())
			{
				if($_POST["act"] == "save"){
				
					$product_process = new product_process;
					$check = true;
					
					$thuoctinh_id 		= intval($conf['geturl']['id']);
					
					$tennhom 			= $_POST["product_properties_title"];
					$motanhom 			= $_POST["product_properties_desc"];					
					
					$tenthuoctinh		= $_POST["product_properties_name"];					
					$tenthuoctinh 		= serialize($tenthuoctinh);
					
					if($product_process->process_edit_properties($tennhom, $motanhom, $tenthuoctinh, $thuoctinh_id) <> FALSE){
						$_SESSION["message"]["notyfy"] = "Đã cập nhật thuộc tính <strong>$tennhom</strong> thành công !";
						$func->_redirect($index_backend . "product/properties/edit/$thuoctinh_id.html");
						exit;
					} else {
						$_SESSION["message"]["notyfy"] = "cập nhật thuộc tính $tennhom không thực hiện được !";
						$func->_redirect($index_backend);
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