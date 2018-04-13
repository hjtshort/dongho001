<?php defined( '_VALID_MOS' ) or die( include("404.php") );

    class product_process extends product
    {
        public $dbObj;
        
        function __construct()
        {
            $this->dbObj = new classDb();
        }
		
		public function get_product_count( $search_value, $danhmuc_id = 0, $title = "%%", $condition= "" )
	    {
			@$condition = ""; @$danhmuc_id = intval( @$search_value[3] );
	
			if( @$search_value[0] != "" || @$search_value[1] != "" ){
				$condition .= " AND sanpham.gia >= " . intval(str_replace(",", "", $search_value[0])) . " AND sanpham.gia <= ". intval(str_replace(",", "", $search_value[1]));
			} 
			
			if(!empty($search_value[2])){
				$title = "%" . $search_value[2] . "%";
			}
			
			if($danhmuc_id > 0){
				$condition .= "AND sanpham.danhmuc_id IN (SELECT danhmuc_id FROM danhmucsanpham WHERE FIND_IN_SET($danhmuc_id, danhmuc_id_assoc))";
			}
			
		    $query = "SELECT COUNT(sanpham.Id) as `totalrow`
					FROM sanpham
					INNER JOIN danhmucsanpham ON danhmucsanpham.danhmuc_id = sanpham.danhmuc_id
					WHERE sanpham.tensanpham LIKE ? $condition";

		    $result = $this->dbObj->SqlQueryOutputResult($query, array( $title ));
			if ($row = $result->fetch()) {
				return $row['totalrow'];
			}
	    }
		
		public function get_product_view( $search_value, $offset, $limit, $danhmuc_id = 0, $title = "%%", $condition= "" )
	    {			
			@$condition = ""; @$danhmuc_id = intval( @$search_value[3] );
	
			if( @$search_value[0] != "" || @$search_value[1] != "" ){
				$condition .= " AND sanpham.gia >= " . intval(str_replace(",", "", $search_value[0])) . " AND sanpham.gia <= ". intval(str_replace(",", "", $search_value[1]));
			} 
			
			if(!empty($search_value[2])){
				$title = "%" . $search_value[2] . "%";
			}
			
			if($danhmuc_id > 0){
				$condition .= "AND sanpham.danhmuc_id IN (SELECT danhmuc_id FROM danhmucsanpham WHERE FIND_IN_SET($danhmuc_id, danhmuc_id_assoc))";
			}
			
		    $query = "SELECT
						sanpham.Id,
						sanpham.danhmuc_id,
						sanpham.taikhoan_id,
						sanpham.masanpham,
						sanpham.tensanpham,
						sanpham.gia,
						sanpham.giakhuyenmai,
						sanpham.hinhanh,
						sanpham.hienthi,
						sanpham.chophepdathang,
						sanpham.thutu
					FROM sanpham
					INNER JOIN danhmucsanpham ON danhmucsanpham.danhmuc_id = sanpham.danhmuc_id
					WHERE sanpham.tensanpham LIKE ? $condition
					ORDER BY danhmucsanpham.thutu DESC, `sanpham`.`thutu` DESC
					LIMIT $offset, $limit";
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
			$query = "UPDATE sanpham SET `hienthi` = ? WHERE Id = ?";
            
            if ($this->dbObj->SqlQueryInputResult($query, array($trangthai, $values)) <> FALSE) {
                return true;
            } else {
                return false;
            }
	    }

	    function process_delete_product($values)
        {
		    $query = "DELETE from sanpham where Id = ?";
            
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
			} else if($_POST["act"] == "lock" || $_POST["act"] == "lock-all"){
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