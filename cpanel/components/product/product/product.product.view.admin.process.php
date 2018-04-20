<?php defined( '_VALID_MOS' ) or die( include("404.php") );

    class product_process extends product
    {
        public $dbObj;
        
        function __construct()
        {
            $this->dbObj = new classDb();
        }
		
		// public function get_product_count( $search_value, $danhmuc_id, $status,$nhacungcap_id )
	    // {
		// 	@$condition = ""; 
		// 	if($danhmuc_id)
			
		// 	if(!empty($search_value)){
		// 		$title = "%" . $search_value . "%";
		// 	}
			
		// 	if($danhmuc_id > 0){
		// 		$condition .= "AND sanpham.danhmuc_id IN (SELECT danhmuc_id FROM danhmucsanpham WHERE FIND_IN_SET($danhmuc_id, danhmuc_id_assoc))";
		// 	}
			
		//     $query = "SELECT COUNT(sanpham.sanpham_id) as `totalrow`
		// 			FROM sanpham
		// 			INNER JOIN danhmucsanpham ON danhmucsanpham.danhmuc_id = sanpham.danhmuc_id
		// 			WHERE sanpham.tensanpham LIKE ? $condition";

		//     $result = $this->dbObj->SqlQueryOutputResult($query, array( $title ));
		// 	if ($row = $result->fetch()) {
		// 		return $row['totalrow'];
		// 	}
	    // }
		
		public function get_product_view( $search_value, $offset, $limit, $danhmuc_id, $status,$nhacungcap_id)
	    {			
			@$condition = "";
		
			if($danhmuc_id!='')
			{
				$condition.=" And sanpham.danhmuc_id=".$danhmuc_id."";
			}
			if($status!='')
			{
				$condition.=" And sanpham.hienthi=".$status."";	
			}
			if($nhacungcap_id!='')
			{
				$condition.=" And sanpham.nhasanxuat_id=".$nhacungcap_id."";
			}			
			if($search_value!=''){
				$title = "%" . $search_value. "%";
			}
			else
				$title="%%";
			if($offset!=''||$limit!='')
			{
				$lim="LIMIT ".$offset.",".$limit."";
			}
			
		    $query = "SELECT
						sanpham.sanpham_id,
						sanpham.danhmuc_id,
						sanpham.taikhoan_id,
						sanpham.tensanpham,
						sanpham.hinhanh,
						sanpham.hienthi,
						sanpham.chophepdathang,
						danhmucsanpham.tieude,
						sanpham_nhasanxuat.nhasanxuat
					FROM sanpham
					LEFT JOIN danhmucsanpham ON danhmucsanpham.danhmuc_id = sanpham.danhmuc_id
					LEFT JOIN sanpham_nhasanxuat ON sanpham_nhasanxuat.nhasanxuat_id = sanpham.nhasanxuat_id
					WHERE sanpham.tensanpham LIKE ? $condition
					ORDER BY danhmucsanpham.thutu DESC , `sanpham`.`thutu` DESC ".$lim;
			$result = $this->dbObj->SqlQueryOutputResult($query, array( $title ));
		    return $result;
	    }				
        
	    function sort_update($thutu, $product_id)
        {
			$query = "UPDATE sanpham SET `thutu` = ? WHERE Id = ?";
            
            if ($this->dbObj->SqlQueryInputResult($query, array($thutu, $product_id)) <> FALSE) {
                return true;
            } else {
                return false;
            }
	    }
		
		function lock_news($trangthai, $values)
        {
			$query = "UPDATE sanpham SET `hienthi` = ? WHERE sanpham_id = ?";
            
            if ($this->dbObj->SqlQueryInputResult($query, array($trangthai, $values)) <> FALSE) {
                return true;
            } else {
                return false;
            }
	    }

	    function process_delete_product($values)
        {
		    $query = "DELETE from sanpham where sanpham_id = ?";
            
            if ($this->dbObj->SqlQueryInputResult($query, array($values)) <> FALSE) {
                return true;
            } else {
                return false;
            }
		}
		public function sanpham_danhmuc()
		{
			$query ="Select danhmuc_id,tieude from danhmucsanpham";
			$result = $this->dbObj->SqlQueryOutputResult($query, array(0));
			return $result;
		}
		public function sanpham_nhasanxuat()
		{
			$query ="Select nhasanxuat_id,nhasanxuat from sanpham_nhasanxuat";
			$result = $this->dbObj->SqlQueryOutputResult($query, array(0));
			return $result;
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
        
        case "product.view";
		
			if($_POST["act"] == "sort"){
				$check = FALSE;
				$sort = $_POST["sort"]; $productId = $_POST["productId"];
				for ($row = 0; $row < count($sort); $row++){
					if($product_process->sort_update( $sort[$row], $productId[$row] ) <> FALSE)
					$check = TRUE;
				}
				if($check == TRUE) $_SESSION["message"]["notyfy"] = NULL;
				else $_SESSION["message"]["notyfy"] = "Không thực hiện được, vui lòng thao tác lại !!! ";
			} 
			else if($_POST["act"] == "lock" || $_POST["act"] == "lock-all"){
				$check = FALSE;
				$values = $_POST["chkItem"];
				for ($row = 0; $row < count($values); $row++){
					if($product_process->lock_news(0, $values[$row]) <> FALSE)
					$check = TRUE;
				}
				if($check == TRUE) $_SESSION["message"]["notyfy"] = NULL;
				else $_SESSION["message"]["notyfy"] = "Không thực hiện được, vui lòng thao tác lại !!! ";
			}
			
			else if($_POST["act"] == "unlock" || $_POST["act"] == "unlock-all"){
				$check = FALSE;
				$values = $_POST["chkItem"];
				for ($row = 0; $row < count($values); $row++){
					if($product_process->lock_news(1, $values[$row]) <> FALSE)
					$check = TRUE;
				}
				if($check == TRUE) $_SESSION["message"]["notyfy"] = NULL;
				else $_SESSION["message"]["notyfy"] = "Không thực hiện được, vui lòng thao tác lại !!! ";
			}
	
			else if($_POST["act"] == "delete" || $_POST["act"] == "delete-all"){
				$check = FALSE;
				$values = $_POST["chkItem"];
				for ($row = 0; $row < count($values); $row++){
					if($product_process->process_delete_product($values[$row]) <> FALSE)
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