<?php defined( '_VALID_MOS' ) or die( include("404.php") );

    class process
    {
        public $dbObj;
        
        function __construct()
        {
            $this->dbObj = new classDb();
        }
		

		public function get_domain_list($offset=0, $limit=10, $domain = '%%' )
        {
			$query = "SELECT
							*
						FROM
							domain
						WHERE domain.domain LIKE ?
						LIMIT $offset, $limit ";
            $result = $this->dbObj->SqlQueryOutputResult($query, array( $domain ));
			return $result;
        }
		

		public function get_domain_list_count($domain = '%%')
        {
			$query = "SELECT COUNT(id) as `totalrow`
					  FROM domain
					  WHERE domain.domain LIKE ?";
            $result = $this->dbObj->SqlQueryOutputResult($query, array($domain));
			if ($row = $result->fetch()) {
				return $row['totalrow'];
			}
        }
		
	    function lock_domain($trangthai, $values)
        {
			$query = "UPDATE domain_mapped SET status = ? WHERE id = ?";
            
            if ($this->dbObj->SqlQueryInputResult($query, array($trangthai, $values)) <> FALSE) {
                return true;
            } else {
                return false;
            }
	    }

	    function process_delete_domain($values)
        {
		    $sql = "DELETE from domain where id = ?";
            
            if ($this->dbObj->SqlQueryInputResult($sql, array($values)) <> FALSE) {
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
    
	// khai bao doi tuong cho lop xu ly
	$myprocess = new process;
	
    switch(@$_POST["hidden"]){

        case "";
        // khoi dau trang khong co gia tri submit. khong lam zi ca
        break;
        
        case "domain.view":
		
			if($_POST["act"] == "lock" || $_POST["act"] == "lock-all"){
				$check = FALSE;
				$values = $_POST["chkItem"];
				for ($row = 0; $row < count($values); $row++){
					if($myprocess->lock_user(0, $values[$row]) <> FALSE)
					$check = TRUE;
				}
				if($check == TRUE) $_SESSION["message"]["notyfy"] = NULL;
				else $_SESSION["message"]["notyfy"] = "Không thực hiện được, vui lòng thao tác lại !!! ";
			}
			
			else if($_POST["act"] == "unlock" || $_POST["act"] == "unlock-all"){
				$check = FALSE;
				$values = $_POST["chkItem"];
				for ($row = 0; $row < count($values); $row++){
					if($myprocess->lock_user(1, $values[$row]) <> FALSE)
					$check = TRUE;
				}
				if($check == TRUE) $_SESSION["message"]["notyfy"] = NULL;
				else $_SESSION["message"]["notyfy"] = "Không thực hiện được, vui lòng thao tác lại !!! ";
			}
	
			else if($_POST["act"] == "delete"){
				$check = FALSE;
				$values = $_POST["chkItem"];
				for ($row = 0; $row < count($values); $row++){
					if($myprocess->process_delete_user($values[$row]) <> FALSE)
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