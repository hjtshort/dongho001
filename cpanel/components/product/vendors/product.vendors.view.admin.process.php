<?php defined( '_VALID_MOS' ) or die( include("404.php") );

    class vendors_process extends product
    {
        public $dbObj;
        
        function __construct()
        {
            $this->dbObj = new classDb();
        }				
		function process_get_vendors($offset,$limit,$search)
        {
			if($offset!="" || $limit!="")
				$limit1 ="Limit ".$offset.",".$limit;
			else 
				$limit1 ="";
		    $query = "SELECT
						sanpham_nhasanxuat.nhasanxuat_id,
						sanpham_nhasanxuat.nhasanxuat,
						sanpham_nhasanxuat.sodienthoai,
						sanpham_nhasanxuat.diachi,
						sanpham_nhasanxuat.email,
						sanpham_nhasanxuat.ngaythem,
						sanpham_nhasanxuat.thutu
					FROM sanpham_nhasanxuat
					Where sanpham_nhasanxuat.nhasanxuat like ?
					ORDER BY sanpham_nhasanxuat.thutu DESC ".$limit1;
					
		    $result = $this->dbObj->SqlQueryOutputResult($query, array($search));
			return $result;
	    }
		
		function process_delete_vendors($values)
        {
			$query = "DELETE from sanpham_nhasanxuat where nhasanxuat_id = ?";            
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
    
    $myprocess = new vendors_process;
	
    switch(@$_POST["hidden"]){

        case "";
        	// khoi dau trang khong co gia tri submit. khong lam zi ca
        break;                       
        
        case "news.view";
			if($_POST['act']=="delete"){
				if($myprocess->process_delete_vendors($_POST['chkItem'][0]))
				{
					$_SESSION["message"]["notyfy"] = "Đã xóa <strong></strong> thành công !";
					$func->_redirect($index_backend . "product/vendors/view.html");
				}
			}
			else if($_POST['act']=="delete-all")
			{
				$check=true;
				foreach($_POST['chkItem'] as $value){
					if($myprocess->process_delete_vendors($value)==false)
					{
						$check=false;
					
					}
				}
				if($check==true){
					$_SESSION["message"]["notyfy"] = "Đã xóa <strong></strong> thành công !";
					$func->_redirect($index_backend . "product/vendors/view.html");
				}
			}
        break;

        
        default:
            $func->_redirect(".");
        break;
	}
	
	
	