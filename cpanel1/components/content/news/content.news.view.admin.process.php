<?php defined( '_VALID_MOS' ) or die( include("404.php") );

    class news_process extends content_category
    {
        public $dbObj;
        
        function __construct()
        {
            $this->dbObj = new classDb();
        }
		
		public function get_news_count( $search_value, $danhmuc_id = 0, $title = "%%", $condition= "" )
	    {
			@$condition = ""; @$danhmuc_id = intval( @$search_value[3] );
	
			if(!empty($search_value[0]) && !empty($search_value[1])){
				$condition .= " AND tintuc.ngaythem >= " . $this->_formatdate($search_value[0]) . " AND tintuc.ngaythem <= ". $this->_formatdate($search_value[1]);
			} 
			
			if(!empty($search_value[2])){
				$title = "%" . $search_value[2] . "%";
			}
			
			if($danhmuc_id > 0){
				$condition .= "AND tintuc.danhmuc_id IN (SELECT danhmuc_id FROM danhmuctintuc WHERE FIND_IN_SET($danhmuc_id, danhmuc_id_assoc))";
			}
			
		    $query = "SELECT COUNT(tintuc.Id) as `totalrow`
					FROM tintuc
					INNER JOIN danhmuctintuc ON danhmuctintuc.danhmuc_id = tintuc.danhmuc_id
					WHERE tintuc.tieude LIKE ? $condition";
		    $result = $this->dbObj->SqlQueryOutputResult($query, array( $title ));
			if ($row = $result->fetch()) {
				return $row['totalrow'];
			}
	    }
		
		public function get_news_view( $search_value, $offset, $limit, $danhmuc_id = 0, $title = "%%", $condition= "" )
	    {		
			
			@$condition = ""; @$danhmuc_id = intval( @$search_value[3] );
	
			if(!empty($search_value[0]) && !empty($search_value[1])){
				$condition .= " AND tintuc.ngaythem >= " . $this->_formatdate($search_value[0]) . " AND tintuc.ngaythem <= ". $this->_formatdate($search_value[1]);
			} 
			
			if(!empty($search_value[2])){
				$title = "%" . $search_value[2] . "%";
			}
			
			if($danhmuc_id > 0){
				$condition .= "AND tintuc.danhmuc_id IN (SELECT danhmuc_id FROM danhmuctintuc WHERE FIND_IN_SET($danhmuc_id, danhmuc_id_assoc))";
			}
			
		    $query = "SELECT
						tintuc.Id,
						tintuc.danhmuc_id,
						tintuc.tieude,
						tintuc.alias,
						tintuc.motangan,
						tintuc.motachitiet,
						tintuc.ngaythem,
						tintuc.filehinhanh,
						tintuc.chuthichanh,
						tintuc.hienthi,
						tintuc.thutu,
						tintuc.tinnoibat,
						tintuc.solanxem,
						danhmuctintuc.tieude as `danhmuc`
					FROM tintuc
					INNER JOIN danhmuctintuc ON danhmuctintuc.danhmuc_id = tintuc.danhmuc_id
					WHERE tintuc.tieude LIKE ? $condition
					ORDER BY danhmuctintuc.thutu DESC, `tintuc`.`thutu` DESC
					LIMIT $offset, $limit";
		    $result = $this->dbObj->SqlQueryOutputResult($query, array( $title ));
		    return $result;
	    }				
        
	    function sort_update($thutu, $news_id)
        {
			$query = "UPDATE tintuc SET `thutu` = ? WHERE Id = ?";
            
            if ($this->dbObj->SqlQueryInputResult($query, array($thutu, $news_id)) <> FALSE) {
                return true;
            } else {
                return false;
            }
	    }
		
		function lock_news($trangthai, $values)
        {
			$query = "UPDATE tintuc SET `hienthi` = ? WHERE Id = ?";
            
            if ($this->dbObj->SqlQueryInputResult($query, array($trangthai, $values)) <> FALSE) {
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
    
	$news_process = new news_process;
	
    switch(@$_POST["hidden"]){

        case "";
        	// khoi dau trang khong co gia tri submit. khong lam zi ca
        break;                       
        
        case "news.view";
		
			if($_POST["act"] == "sort"){
				
				$check = FALSE;
				$sort = $_POST["sort"]; $news_id = $_POST["newsId"];
				for ($row = 0; $row < count($sort); $row++){
					if($news_process->sort_update( $sort[$row], $news_id[$row] ) <> FALSE)
					$check = TRUE;
				}
				if($check == TRUE) $_SESSION["message"]["notyfy"] = NULL;
				else $_SESSION["message"]["notyfy"] = "Không thực hiện được, vui lòng thao tác lại !!! ";
			} else if($_POST["act"] == "lock" || $_POST["act"] == "lock-all"){
				$check = FALSE;
				$values = $_POST["chkItem"];
				for ($row = 0; $row < count($values); $row++){
					if($news_process->lock_news(0, $values[$row]) <> FALSE)
					$check = TRUE;
				}
				if($check == TRUE) $_SESSION["message"]["notyfy"] = NULL;
				else $_SESSION["message"]["notyfy"] = "Không thực hiện được, vui lòng thao tác lại !!! ";
			}
			
			else if($_POST["act"] == "unlock" || $_POST["act"] == "unlock-all"){
				$check = FALSE;
				$values = $_POST["chkItem"];
				for ($row = 0; $row < count($values); $row++){
					if($news_process->lock_news(1, $values[$row]) <> FALSE)
					$check = TRUE;
				}
				if($check == TRUE) $_SESSION["message"]["notyfy"] = NULL;
				else $_SESSION["message"]["notyfy"] = "Không thực hiện được, vui lòng thao tác lại !!! ";
			}
	
			else if($_POST["act"] == "delete" || $_POST["act"] == "delete-all"){
				$check = FALSE;
				$values = $_POST["chkItem"];
				for ($row = 0; $row < count($values); $row++){
					if($news_process->process_delete_news($values[$row]) <> FALSE)
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