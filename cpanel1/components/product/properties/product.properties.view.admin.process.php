<?php defined( '_VALID_MOS' ) or die( include("404.php") );

    class product_process extends product
    {
        public $dbObj;
        
        function __construct()
        {
            $this->dbObj = new classDb();
        }

		public function get_product_properties( )
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
							sanpham_thuoctinh";
		    $result = $this->dbObj->SqlQueryOutputResult($query, array( ));
		    return $result;
	    }				
        
	    function setdefault($macdinh, $thuoctinh_id)
        {
			$query = "UPDATE sanpham_thuoctinh SET `macdinh` = 0; UPDATE sanpham_thuoctinh SET `macdinh` = ? WHERE thuoctinh_id = ?";
            
            if ($this->dbObj->SqlQueryInputResult($query, array($macdinh, $thuoctinh_id)) <> FALSE) {
                return true;
            } else {
                return false;
            }
	    }
		
	    function process_delete_news($values)
        {
		    $query = "DELETE from tintuc where Id = ?";
            
            if ($this->dbObj->SqlQueryInputResult($query, array($values)) <> FALSE) {
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
    
	$product_process = new product_process;
	
    switch(@$_POST["hidden"]){

        case "";
        	// khoi dau trang khong co gia tri submit. khong lam zi ca
        break;                       
        
        case "properties.view";
		
			if($_POST["act"] == "setdefault"){
				
				if($product_process->setdefault( 1, @$_POST["setdefault"] ) <> FALSE){
					$_SESSION["message"]["notyfy"] = "Cập nhật thuộc tính thành công !";
					$func->_redirect($index_backend . "product/properties/view.html");
					exit;
				} else {
					$_SESSION["message"]["notyfy"] = "Không thực hiện được, vui lòng thao tác lại !!! ";
					$func->_redirect($index_backend . "product/properties/view.html");
					exit;
				}				
			}
	
			else if($_POST["act"] == "delete" || $_POST["act"] == "delete-all"){
				$check = FALSE;
				$values = $_POST["chkItem"];
				for ($row = 0; $row < count($values); $row++){
					if($product_process->process_delete_news($values[$row]) <> FALSE)
					$check = TRUE;
				}
				if($check == TRUE)
				$GLOBALS['msg'] = "";
				else $GLOBALS['msg'] = "Hiện tại hệ thống đang gặp lỗi, vui lòng liên hệ quản trị !!! ";
			}		           
			
        break;

        
        default:
            $func->_redirect(".");
        break;
    }