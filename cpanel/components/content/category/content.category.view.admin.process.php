<?php defined( '_VALID_MOS' ) or die( include("404.php") );

    class category_process extends content_model
    {
	    function sort_update($thutu, $danhmuc_id)
        {
			$query = "UPDATE danhmuctintuc SET thutu = ? WHERE danhmuc_id = ?";
            
            if ($this->dbObj->SqlQueryInputResult($query, array($thutu, $danhmuc_id)) <> FALSE) {
                return true;
            } else {
                return false;
            }
	    }

        function lock($trangthai, $id)
        {
            $query = "UPDATE danhmuctintuc SET hienthi = ? WHERE danhmuc_id = ?";

            if ($this->dbObj->SqlQueryInputResult($query, array($trangthai, $id)) <> FALSE) {
                return true;
            } else {
                return false;
            }
        }

        function delete($id)
        {
            $query = "DELETE from danhmuctintuc where danhmuc_id = ?";

            if ($this->dbObj->SqlQueryInputResult($query, array($id)) <> FALSE) {
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
    
	$category_process = new category_process;
	
    switch(@$_POST["hidden"]){

        case "";
        	// khoi dau trang khong co gia tri submit. khong lam zi ca
        break;                       
        
        case "category.view";
		
			if($_POST["act"] == "sort"){
				
				$check = FALSE;
				$sort = $_POST["sort"]; $danhmuc_id = $_POST["chkItem_sort"];
				for ($row = 0; $row < count($sort); $row++){
					if($category_process->sort_update( $sort[$row], $danhmuc_id[$row] ) <> FALSE)
					$check = TRUE;
				}
				if($check == TRUE) $_SESSION["message"]["notyfy"] = NULL;
				else $_SESSION["message"]["notyfy"] = "Không thực hiện được, vui lòng thao tác lại !!! ";
			}elseif($_POST["act"] == "lock" || $_POST["act"] == "lock-all"){
                $check = FALSE;
                $values = $_POST["chkItem"];
                for ($row = 0; $row < count($values); $row++){
                    if($category_process->lock(0, $values[$row]) <> FALSE)
                        $check = TRUE;
                }
                if($check == TRUE) $_SESSION["message"]["notyfy"] = NULL;
                else $_SESSION["message"]["notyfy"] = "Không thực hiện được, vui lòng thao tác lại !!! ";
            }else if($_POST["act"] == "unlock" || $_POST["act"] == "unlock-all"){
                $check = FALSE;
                $values = $_POST["chkItem"];
                for ($row = 0; $row < count($values); $row++){
                    if($category_process->lock(1, $values[$row]) <> FALSE)
                        $check = TRUE;
                }
                if($check == TRUE) $_SESSION["message"]["notyfy"] = NULL;
                else $_SESSION["message"]["notyfy"] = "Không thực hiện được, vui lòng thao tác lại !!! ";
            }else if($_POST["act"] == "delete" || $_POST["act"] == "delete-all"){
                $check = FALSE;
                $values = $_POST["chkItem"];
                for ($row = 0; $row < count($values); $row++){
                    if($category_process->delete($values[$row]) <> FALSE)
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