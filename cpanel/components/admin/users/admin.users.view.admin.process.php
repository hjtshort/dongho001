<?php defined( '_VALID_MOS' ) or die( include("404.php") );

    class process
    {
        public $dbObj;
        
        function __construct()
        {
            $this->dbObj = new classDb();
        }
		
		/* lay du lieu nhom chuc nang quan tri */
		//LIMIT $offset, $limit
		public function get_user_list($search,$offset, $limit)
        {
			if($search==""){
				$query = "SELECT
								taikhoanquantri.Id,
								taikhoanquantri.uid,
								taikhoanquantri.ho,
								taikhoanquantri.ten,
								taikhoanquantri.email,
								taikhoanquantri.dienthoai,
								taikhoanquantri.thutu,
								taikhoanquantri.trangthai,
								taikhoanquantri.ngaythem
							FROM
								taikhoanquantri						
							ORDER BY `taikhoanquantri`.`thutu` DESC	
							Limit $offset,$limit				
							";
			}
			else{
				$a="%".$search."%";
				$query = "SELECT
								taikhoanquantri.Id,
								taikhoanquantri.uid,
								taikhoanquantri.ho,
								taikhoanquantri.ten,
								taikhoanquantri.email,
								taikhoanquantri.dienthoai,
								taikhoanquantri.thutu,
								taikhoanquantri.trangthai,
								taikhoanquantri.ngaythem
							FROM
								taikhoanquantri	
							where taikhoanquantri.uid like	?			
							ORDER BY `taikhoanquantri`.`thutu` DESC	
							Limit $offset,$limit				
							";
			}
            $result = $this->dbObj->SqlQueryOutputResult($query, array($a))->fetchAll();
			return $result;
			//return $query;
        }
		
		/* lay du lieu nhom chuc nang quan tri */
		public function get_user_list_count()
        {
			$query = "SELECT
							COUNT(taikhoanquantri.Id) as `totalrow`
						FROM
							taikhoanquantri";
            $result = $this->dbObj->SqlQueryOutputResult($query, array());
			if ($row = $result->fetch()) {
				return $row['totalrow'];
			}
        }
		
	    function lock_user($trangthai, $values)
        {
			$query = "UPDATE taikhoanquantri SET `trangthai` = ? WHERE Id = ?";
            
            if ($this->dbObj->SqlQueryInputResult($query, array($trangthai, $values)) <> FALSE) {
                return true;
            } else {
                return false;
            }
	    }

	    function process_delete_user($values)
        {
		    $sql = "DELETE from taikhoanquantri where Id = ?";
            
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
        
        case "news.view":
		
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
				foreach($values as $value){
					if($myprocess->process_delete_user($value) <> FALSE)
						$check = TRUE;
				}
				if($check == TRUE)
				$GLOBALS['msg'] = "";
				else $GLOBALS['msg'] = "Hiện tại hệ thống đang gặp lỗi, vui lòng liên hệ quản trị !!! ";
			}
			else if($_POST["act"] == "delete-all"){
				$check = FALSE;
				$values = $_POST["chkItem"];
				foreach($values as $value){
					if($myprocess->process_delete_user($value) <> FALSE)
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