<?php defined( '_VALID_MOS' ) or die( include("404.php") );

    class category_process extends content_category
    {
        public $dbObj;
        
        function __construct()
        {
            $this->dbObj = new classDb();
        }		
        
	    function sort_update($thutu, $danhmuc_id)
        {
			$query = "UPDATE danhmuctintuc SET `thutu` = ? WHERE danhmuc_id = ?";
            
            if ($this->dbObj->SqlQueryInputResult($query, array($thutu, $danhmuc_id)) <> FALSE) {
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
				$sort = $_POST["sort"]; $danhmuc_id = $_POST["chkItem"];
				for ($row = 0; $row < count($sort); $row++){
					if($category_process->sort_update( $sort[$row], $danhmuc_id[$row] ) <> FALSE)
					$check = TRUE;
				}
				if($check == TRUE) $_SESSION["message"]["notyfy"] = NULL;
				else $_SESSION["message"]["notyfy"] = "Không thực hiện được, vui lòng thao tác lại !!! ";
			}
			
        break;

        
        default:
            $func->_redirect(".");
        break;
    }