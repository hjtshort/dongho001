<?php defined( '_VALID_MOS' ) or die( include("404.php") );		

    class process
    {
        public $dbObj;
        
        function __construct()
        {
            $this->dbObj = new classDb();
        }		
		
	    function user_order($order, $id)
        {
			$query = "UPDATE taikhoanquantri SET `thutu` = ? WHERE Id = ?";
            
            if ($this->dbObj->SqlQueryInputResult($query, array($order, $id)) <> FALSE) {
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
	
    switch( $_POST["hashcode"] ){

        case "";
        // khoi dau trang khong co gia tri submit. khong lam zi ca
        break;
        
        case session_id():
				
			$idList 	= explode(",", substr($_POST["chkItemList"], 1));
			$orderList 	= count($idList);
			
			$check = FALSE;
			for ($row = 0; $row < count($idList); $row++){
				if($myprocess->user_order($orderList--, $idList[$row]) <> FALSE)
				$check = TRUE;
			}
			if($check == TRUE) $json = array('msg' => 'success');
			else $json = array('msg' => 'error');
	
			//$json = array('username' => 'phucvh', 'password' => '123456', 'email' => 'ahoangphuc@gmail.com');			
			echo json_encode($json);
			
			/* xu ly gia tri cho 2 dong ke nhau trong table
			$id_first 		= intval($_POST["id_first"]);
			$order_first 	= intval($_POST["order_first"]);
			$id_last 		= intval($_POST["id_last"]);
			$order_last 	= intval($_POST["order_last"]);
			
			if($myprocess->user_order($order_last, $id_first, $order_first, $id_last) <> FALSE) $json = array('msg' => 'success');
			else $json = array('msg' => 'error');
	
			echo json_encode($json);
			*/

        break;        

        default:
            //$func->_redirect(".");
        break;
    }