<?php defined( '_VALID_MOS' ) or die( include("404.php") );

    class template_process extends template
    {

		public function get_template_count( $search_value, $danhmuc_id = 0, $title = "%%", $condition= "" )
	    {
			@$condition = ""; @$danhmuc_id = intval( @$search_value[3] );
	
			if( @$search_value[0] != "" || @$search_value[1] != "" ){
				$condition .= " AND giaodien.gia >= " . intval(str_replace(",", "", $search_value[0])) . " AND giaodien.gia <= ". intval(str_replace(",", "", $search_value[1]));
			} 
			
			if(!empty($search_value[2])){
				$title = "%" . $search_value[2] . "%";
			}
			
			if($danhmuc_id > 0){
				$condition .= "AND giaodien.danhmuc_id IN (SELECT danhmuc_id FROM danhmucgiaodien WHERE FIND_IN_SET($danhmuc_id, danhmuc_id_assoc))";
			}
			
		    $query = "SELECT COUNT(giaodien.Id) as totalrow
					FROM giaodien
					INNER JOIN danhmucgiaodien ON danhmucgiaodien.danhmuc_id = giaodien.danhmuc_id
					WHERE giaodien.tengiaodien LIKE ? $condition";

		    $result = $this->dbObj->SqlQueryOutputResult($query, array( $title ));
			if ($row = $result->fetch()) {
				return $row['totalrow'];
			}
	    }
		
		public function get_template_view( $search_value, $offset, $limit, $danhmuc_id = 0, $title = "%%", $condition= "" )
	    {			
			@$condition = ""; @$danhmuc_id = intval( @$search_value[3] );
	
			if( @$search_value[0] != "" || @$search_value[1] != "" ){
				$condition .= " AND giaodien.gia >= " . intval(str_replace(",", "", $search_value[0])) . " AND giaodien.gia <= ". intval(str_replace(",", "", $search_value[1]));
			} 
			
			if(!empty($search_value[2])){
				$title = "%" . $search_value[2] . "%";
			}
			
			if($danhmuc_id > 0){
				$condition .= "AND giaodien.danhmuc_id IN (SELECT danhmuc_id FROM danhmucgiaodien WHERE FIND_IN_SET($danhmuc_id, danhmuc_id_assoc))";
			}
			
		    $query = "SELECT
						giaodien.Id,
						giaodien.danhmuc_id,
						giaodien.taikhoan_id,
						giaodien.tengiaodien,
						giaodien.tacgia_id,
						giaodien.hinhanh,
						giaodien.hienthi,
						giaodien.chophepdathang,
						taikhoanquantri.ten as ten_tacgia,
						taikhoanquantri.ho as ho_tacgia,
						danhmucgiaodien.tieude
					FROM giaodien
					LEFT JOIN danhmucgiaodien ON danhmucgiaodien.danhmuc_id = giaodien.danhmuc_id
					LEFT JOIN taikhoanquantri ON tacgia_id = taikhoanquantri.Id
					WHERE giaodien.tengiaodien LIKE ? $condition
					ORDER BY danhmucgiaodien.thutu DESC, giaodien.thutu DESC
					LIMIT $offset, $limit";
		    $result = $this->dbObj->SqlQueryOutputResult($query, array( $title ));
		    return $result;
	    }				
        
	    function sort_update($thutu, $template_id)
        {
			$query = "UPDATE giaodien SET thutu = ? WHERE Id = ?";
            
            if ($this->dbObj->SqlQueryInputResult($query, array($thutu, $template_id)) <> FALSE) {
                return true;
            } else {
                return false;
            }
	    }
		
		function lock_news($trangthai, $values)
        {
			$query = "UPDATE giaodien SET hienthi = ? WHERE Id = ?";
            
            if ($this->dbObj->SqlQueryInputResult($query, array($trangthai, $values)) <> FALSE) {
                return true;
            } else {
                return false;
            }
	    }

	    function process_delete_template($values)
        {
		    $query = "DELETE from giaodien where Id = ?";
            
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
    
	$template_process = new template_process;
	
    switch(@$_POST["hidden"]){

        case "";
        	// khoi dau trang khong co gia tri submit. khong lam zi ca
        break;                       
        
        case "template.view";
		
			if($_POST["act"] == "sort"){
				$check = FALSE;
				$sort = $_POST["sort"]; $templateId = $_POST["templateId"];
				for ($row = 0; $row < count($sort); $row++){
					if($template_process->sort_update( $sort[$row], $templateId[$row] ) <> FALSE)
					$check = TRUE;
				}
                $_SESSION["message"]["notyfy"] = $check?"Cập nhật thứ tự thành công!":"Không thực hiện được, vui lòng thao tác lại !!! ";
			} else if($_POST["act"] == "lock" || $_POST["act"] == "lock-all"){
				$check = FALSE;
				$values = $_POST["chkItem"];
				for ($row = 0; $row < count($values); $row++){
					if($template_process->lock_news(0, $values[$row]) <> FALSE)
					$check = TRUE;
				}
                $_SESSION["message"]["notyfy"] = $check?"Cập nhật trạng thái thành công!":"Không thực hiện được, vui lòng thao tác lại !!! ";
			}
			
			else if($_POST["act"] == "unlock" || $_POST["act"] == "unlock-all"){
				$check = FALSE;
				$values = $_POST["chkItem"];
				for ($row = 0; $row < count($values); $row++){
					if($template_process->lock_news(1, $values[$row]) <> FALSE)
					$check = TRUE;
				}
                $_SESSION["message"]["notyfy"] = $check?"Cập nhật trạng thái thành công!":"Không thực hiện được, vui lòng thao tác lại !!! ";
			}
	
			else if($_POST["act"] == "delete" || $_POST["act"] == "delete-all"){
				$check = FALSE;
				$values = $_POST["chkItem"];
				for ($row = 0; $row < count($values); $row++){
					if($template_process->process_delete_template($values[$row]) <> FALSE)
					$check = TRUE;
				}
                $_SESSION["message"]["notyfy"] = $check?"Xóa thành công!":"Không thực hiện được, vui lòng thao tác lại !!! ";
			}		           
			
        break;
        
        default:
            $func->_redirect(".");
        break;
    }