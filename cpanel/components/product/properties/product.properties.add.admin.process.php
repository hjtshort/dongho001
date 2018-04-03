<?php defined( '_VALID_MOS' ) or die( include("404.php") );

    class product_process extends product
    {
        public $dbObj;
        
        function __construct()
        {
            $this->dbObj = new classDb();
        }		
        
	    function process_add_properties($tennhom, $motanhom, $tenthuoctinh, $macdinh, $ngaythem , $thutu)
        {			
		    $sql = "INSERT INTO sanpham_thuoctinh(
						sanpham_thuoctinh.tennhom,
						sanpham_thuoctinh.motanhom,
						sanpham_thuoctinh.tenthuoctinh,
						sanpham_thuoctinh.macdinh,
						sanpham_thuoctinh.ngaythem,
						sanpham_thuoctinh.thutu)
				    VALUES (?, ?, ?, ?, ?, ?)";

            if ($this->dbObj->SqlQueryInputResult($sql, array($tennhom, $motanhom, $tenthuoctinh, $macdinh, $ngaythem , $thutu)) <> FALSE) {
                return true;
            } else {
                return false;
            }
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
        
        case "properties.add";
		
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
					
					$tennhom 			= $_POST["product_properties_title"];
					$motanhom 			= $_POST["product_properties_desc"];					
					
					$tenthuoctinh		= $_POST["product_properties_name"];
					$giatrithuoctinh	= $_POST["product_properties_value"];					
					
					$tenthuoctinh 		= serialize($tenthuoctinh);
					$giatrithuoctinh 	= serialize($giatrithuoctinh);
					
					if(isset($_POST["product_properties_active"])){
						$macdinh		= 1;
					} else {
						$macdinh		= 0;
					}
					
					$ngaythem			= $func->_formatdate($_POST["date_add"]);
					$sort				= $func->process_getmaxid("sanpham_thuoctinh", "thutu");										
					
					if($product_process->process_add_properties($tennhom, $motanhom, $tenthuoctinh, $giatrithuoctinh, $macdinh, $ngaythem , $sort) <> FALSE){
						$_SESSION["message"]["notyfy"] = "Đã thêm thuộc tính <strong>$tennhom</strong> thành công !";
						$func->_redirect($index_backend . "product/properties/add.html");
						exit;
					} else {
						$_SESSION["message"]["notyfy"] = "Thêm danh mục $tennhom không thực hiện được !";
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