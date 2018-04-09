<?php defined( '_VALID_MOS' ) or die( include("404.php") );

    class process
    {
        public $dbObj;
        
        function __construct()
        {
            $this->dbObj = new classDb();
        }
		
		/* lay du lieu nhom chuc nang quan tri */
		public function get_user_list($user_id)
        {
			$query = "SELECT
							taikhoanquantri.Id,
							taikhoanquantri.uid,
							taikhoanquantri.ho,
							taikhoanquantri.ten,
							taikhoanquantri.email,
							taikhoanquantri.gioitinh,
							taikhoanquantri.diachi,
							taikhoanquantri.dienthoai,
							taikhoanquantri.facebook,
							taikhoanquantri.nhomchucnang_id,
							taikhoanquantri.chucnang
						FROM
							taikhoanquantri
						WHERE taikhoanquantri.Id = ?";
            $result = $this->dbObj->SqlQueryOutputResult($query, array( $user_id ));
			return $result;
        }
		
		/* lay du lieu nhom chuc nang quan tri */
		public function get_group_function_list()
        {
			$query = "SELECT
							nhomchucnangquantri.Id,
							nhomchucnangquantri.tukhoa,
							nhomchucnangquantri.tennhom
						FROM
							nhomchucnangquantri
						ORDER BY
						`nhomchucnangquantri`.`Id`";
            $result = $this->dbObj->SqlQueryOutputResult($query, array());
			return $result;
        }
		
		/* lay du lieu chuc nang quan tri */
		public function get_function_list($group_id)
        {
			$query = "SELECT
							chucnangquantri.Id,
							chucnangquantri.nhomchucnang_id,
							chucnangquantri.chucnang
						FROM
							chucnangquantri
						WHERE chucnangquantri.nhomchucnang_id = ?";
            $result = $this->dbObj->SqlQueryOutputResult($query, array( $group_id ));
			return $result;			          
        }
		       
	    function process_edituser_pass($pwd, $ho, $ten, $email , $gioitinh, $diachi, $dienthoai,$facebook, $nhomchucnang_id, $chucnang, $id)
        {
		    $sql = "UPDATE taikhoanquantri SET
						taikhoanquantri.pwd = ?,
						taikhoanquantri.ho = ?,
						taikhoanquantri.ten = ?,
						taikhoanquantri.email = ?,
						taikhoanquantri.gioitinh = ?,
						taikhoanquantri.diachi = ?,
						taikhoanquantri.dienthoai = ?,
						taikhoanquantri.facebook=?,
						taikhoanquantri.nhomchucnang_id = ?,
						taikhoanquantri.chucnang = ?
					WHERE taikhoanquantri.Id = ?";

            if ($this->dbObj->SqlQueryInputResult($sql, array($pwd, $ho, $ten, $email , $gioitinh, $diachi, $dienthoai,$facebook,$nhomchucnang_id, $chucnang, $id)) <> FALSE) {
                return true;
            } else {
                return false;
            }
	    }
		
		function process_edituser_nopass($ho, $ten, $email , $gioitinh, $diachi, $dienthoai,$facebook, $nhomchucnang_id, $chucnang, $id)
        {
		    $sql = "UPDATE taikhoanquantri SET
						taikhoanquantri.ho = ?,
						taikhoanquantri.ten = ?,
						taikhoanquantri.email = ?,
						taikhoanquantri.gioitinh = ?,
						taikhoanquantri.diachi = ?,
						taikhoanquantri.dienthoai = ?,
						taikhoanquantri.facebook=?,
						taikhoanquantri.nhomchucnang_id = ?,
						taikhoanquantri.chucnang = ?
					WHERE taikhoanquantri.Id = ?";

            if ($this->dbObj->SqlQueryInputResult($sql, array($ho, $ten, $email , $gioitinh, $diachi, $dienthoai,$facebook,$nhomchucnang_id, $chucnang, $id)) <> FALSE) {
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
    
    switch(@$_POST["hidden"]){

        case "";
        // khoi dau trang khong co gia tri submit. khong lam zi ca
        break;        
        
        case "edit.user";
						
			$ho 		= $_POST["firstname"];
			$ten 		= $_POST["lastname"];
			$email		= $_POST["email"];
			$gioitinh	= $_POST["gender"];
			$diachi		= $_POST["address"];
			$dienthoai 	= $_POST['phone'];
			$facebook   =$_POST['facebook'];

			$pwd		= $func->enscriptPass($_POST["password"]);
			
			$nhomchucnang_id	= $_POST["ddlRoleTypes"];
			$chucnang			= json_encode($_POST["chucnang"]);
			$url=$func->get_url("1|2|3|id");
			
			$id 		= intval($url['id']);
			
            if($_POST["act"] == "save"){
                $myprocess = new process;
				
				if($_POST["password"] != ""){
					if($myprocess->process_edituser_pass($pwd, $ho, $ten, $email , $gioitinh, $diachi, $dienthoai,$facebook, $nhomchucnang_id, $chucnang, $id) <> FALSE){
						$_SESSION["message"]["notyfy"] = "Đã thay đổi thông tin tài khoản <strong>$uid</strong> thành công !";
						$func->_redirect($index_backend . "admin/users/edit/$id.html");
						exit;
					} else {
						$_SESSION["message"]["notyfy"] = "Thay đổi thông tin tài khoản $uid không thực hiện được !";
						$func->_redirect($index_backend);
						exit;
					}
				} else {
					if($myprocess->process_edituser_nopass($ho, $ten, $email , $gioitinh, $diachi, $dienthoai,$facebook, $nhomchucnang_id, $chucnang, $id) <> FALSE){
						$_SESSION["message"]["notyfy"] = "Đã thay đổi thông tin tài khoản <strong>$uid</strong> thành công !";
						$func->_redirect($index_backend . "admin/users/edit/$id.html");
						exit;
					} else {
						$_SESSION["message"]["notyfy"] = "Thay đổi thông tin tài khoản $uid không thực hiện được !";
						$func->_redirect($index_backend);
						exit;
					}
				}
				
            }
        break;

        
        default:
            $func->_redirect(".");
        break;
    }