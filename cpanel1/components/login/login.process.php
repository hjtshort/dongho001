<?php defined( '_VALID_MOS' ) or die( include_once("../../404.php") );
	
	class process{
	
		public $dbObj;
		
		function __construct()
		{
			 $this->dbObj = new classDb();
		}
		
		function process_login($uid, $pass)
        {
			$sql = "SELECT
						taikhoanquantri.Id,
						taikhoanquantri.uid,
						taikhoanquantri.ho,
						taikhoanquantri.ten,
						taikhoanquantri.email,
						taikhoanquantri.chucnang
					FROM
						taikhoanquantri
					WHERE `taikhoanquantri`.`uid` = ? And `taikhoanquantri`.`pwd` = ? AND trangthai = 1";
	
			$result = $this->dbObj->SqlQueryOutputResult($sql, array($uid, $pass));
		
			if ($row = $result->fetch())
            {
				$_SESSION["wti"] = array(   "Id" => $row['Id'],
											"uid" => $row['uid'],
											"name" => $row['ho'] . " " . $row['ten'],
											"email" => $row['email'],
											"chucnang" => $row['chucnang']
                );
				
                if (isset($_SESSION["wti"]["Id"]) && isset($_SESSION["wti"]["uid"]) && isset($_SESSION["wti"]["name"]) && isset($_SESSION["wti"]["email"]) && isset($_SESSION["wti"]["chucnang"])) {
				    return true;
                }
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
    
    switch(@$_POST["hidden"])
    {
        case "";
        // khoi dau trang khong co gia tri submit. khong lam zi ca
        break;
        
        case "login":
            $myprocess = new process;
			
			$uid = $_POST["username"];
			$pwd = $func->enscriptPass($_POST["password"]);
			
            if($myprocess->process_login($uid, $pwd) <> FALSE)
            {
                $func->_redirect(".");exit();
            } else {
				$_SESSION["message"]["notyfy"] = "Lỗi đăng nhập, sai tên đăng nhập hoặc mật khẩu !";
                $func->_redirect( $conf['rooturl_backend'] );
            }
        break;
        
        default:
            $func->_redirect($index_backend); exit();
        break;
    }