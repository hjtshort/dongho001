<?php defined( '_VALID_MOS' ) or die( include("404.php") );

    class vendors_process extends product
    {
        public $dbObj;
        
        function __construct()
        {
            $this->dbObj = new classDb();
        }		
        
	    function sort_update($thutu, $danhmuc_id)
        {
			$query = "UPDATE danhmucsanpham SET `thutu` = ? WHERE danhmuc_id = ?";
            
            if ($this->dbObj->SqlQueryInputResult($query, array($thutu, $danhmuc_id)) <> FALSE) {
                return true;
            } else {
                return false;
            }
	    }
		
		function process_get_vendors()
        {
		    $query = "SELECT
						sanpham_nhasanxuat.nhacungcap_id,
						sanpham_nhasanxuat.nhasanxuat,
						sanpham_nhasanxuat.sodienthoai,
						sanpham_nhasanxuat.diachi,
						sanpham_nhasanxuat.email,
						sanpham_nhasanxuat.ngaythem,
						sanpham_nhasanxuat.thutu
					FROM sanpham_nhasanxuat
					ORDER BY sanpham_nhasanxuat.thutu DESC";
		    $result = $this->dbObj->SqlQueryOutputResult($query, array( 0 ));
		    return $result;
	    }
		
		function process_delete_category($values)
        {
			$query = "DELETE from danhmucsanpham where danhmuc_id = ?";            
			if ($this->dbObj->SqlQueryInputResult($query, array($values)) <> FALSE) {
				return true;
			} else {
				return false;
			}
	    }
		
		function lock_product_category($trangthai, $values)
        {
			$query = "UPDATE danhmucsanpham SET `hienthi` = ? WHERE danhmuc_id = ?";
            
            if ($this->dbObj->SqlQueryInputResult($query, array($trangthai, $values)) <> FALSE) {
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
    
	$vendor_process = new vendors_process;
	
    switch(@$_POST["hidden"]){

        case "";
        	// khoi dau trang khong co gia tri submit. khong lam zi ca
        break;                       
        
        case "category.view";
		
			if($_POST["act"] == "sort"){
				
				$check = FALSE;
				$sort = $_POST["sort"]; $danhmuc_id = $_POST["catId"];
				for ($row = 0; $row < count($sort); $row++){
					if($category_process->sort_update( $sort[$row], $danhmuc_id[$row] ) <> FALSE)
					$check = TRUE;
				}
				if($check == TRUE) $_SESSION["message"]["notyfy"] = NULL;
				else $_SESSION["message"]["notyfy"] = "Không thực hiện được, vui lòng thao tác lại !!! ";				
			
			} else if($_POST["act"] == "lock" || $_POST["act"] == "lock-all"){
				
				$check = FALSE;
				$values = $_POST["chkItem"];
				for ($row = 0; $row < count($values); $row++){
					if($category_process->lock_product_category(0, $values[$row]) <> FALSE)
					$check = TRUE;
				}
				if($check == TRUE) $_SESSION["message"]["notyfy"] = NULL;
				else $_SESSION["message"]["notyfy"] = "Không thực hiện được, vui lòng thao tác lại !!! ";
				
			}
			
			else if($_POST["act"] == "unlock" || $_POST["act"] == "unlock-all"){
				
				$check = FALSE;
				$values = $_POST["chkItem"];
				for ($row = 0; $row < count($values); $row++){
					if($category_process->lock_product_category(1, $values[$row]) <> FALSE)
					$check = TRUE;
				}
				if($check == TRUE) $_SESSION["message"]["notyfy"] = NULL;
				else $_SESSION["message"]["notyfy"] = "Không thực hiện được, vui lòng thao tác lại !!! ";
				
			} else if($_POST["act"] == "delete" || $_POST["act"] == "delete-all"){
				
				$check = FALSE;
				$values = $_POST["chkItem"];
				for ($row = 0; $row < count($values); $row++){
					if(!$category_process->process_chk_existed_category($values[$row])){
						if($category_process->process_delete_category($values[$row]) <> FALSE){
							if($check == TRUE)
							$GLOBALS['msg'] = "";
							else $GLOBALS['msg'] = "Hiện tại hệ thống đang gặp lỗi, vui lòng liên hệ quản trị !!! ";
						}
					} else {
						$GLOBALS['msg'] = "Đang tồn tại sản phẩm trong danh mục, xóa sản phẩm con trước khi xóa danh mục !!! ";
					}	
				}				
			}	
			
        break;

        
        default:
            $func->_redirect(".");
        break;
    }