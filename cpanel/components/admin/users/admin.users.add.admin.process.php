<?php defined( '_VALID_MOS' ) or die( include("404.php") );

    class process
    {
        public $dbObj;
        
        function __construct()
        {
            $this->dbObj = new classDb();
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
            $result = $this->dbObj->SqlQueryOutputResult($query, array())->fetchAll();
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
        
	    function process_adduser($uid, $pwd, $ho, $ten, $email , $gioitinh, $diachi, $dienthoai,$nhomchucnang_id, $chucnang, $thutu, $trangthai, $ngaythem,$facebook)
        {			
		    $sql = "Insert into taikhoanquantri(
						taikhoanquantri.uid,
						taikhoanquantri.pwd,
						taikhoanquantri.ho,
						taikhoanquantri.ten,
						taikhoanquantri.email,
						taikhoanquantri.gioitinh,
						taikhoanquantri.diachi,
						taikhoanquantri.dienthoai,
						taikhoanquantri.nhomchucnang_id,
						taikhoanquantri.chucnang,
						taikhoanquantri.thutu,
						taikhoanquantri.trangthai,
						taikhoanquantri.ngaythem,
						taikhoanquantri.facebook)
				    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            if ($this->dbObj->SqlQueryInputResult($sql, array($uid, $pwd, $ho, $ten, $email , $gioitinh, $diachi, $dienthoai, $nhomchucnang_id, $chucnang, $thutu, $trangthai, $ngaythem,$facebook)) <> FALSE) {
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
        
        case "news.add";
			if($_POST['act']="save"){

			
				include_once("../libraries/validation/validation.php");
				$check = false;
			
				$validator = new FormValidator();					
				
				$uid 		= $_POST["username"];
				$ho 		= $_POST["firstname"];
				$ten 		= $_POST["lastname"];
				$email		= $_POST["email"];
				$gioitinh	= $_POST["gender"];
				$diachi		= $_POST["address"];
				$dienthoai 	= $_POST['phone'];
				$facebook= $_POST["facebook"];
				
				$pwd		= $func->enscriptPass($_POST["password"]);
				
				$nhomchucnang_id	= $_POST["ddlRoleTypes"];
				$chucnang=json_encode($_POST['chucnang']);				
				$thutu		= $func->process_getmaxid("taikhoanquantri", "thutu");
				$trangthai 	= 1;
				$ngaythem	= $func->_formatdate($_POST["date_add"]);
				
				//user_fullname
				$validator->addValidation("username","req","Tên đăng nhập không được bỏ trống");
				$validator->addValidation("password","minlen=2","Tên đăng nhập phải lớn hơn 2 ký tự");
				//user_fullname
				$validator->addValidation("firstname","req","Họ đệm không được bỏ trống");
				//chuc vu
				$validator->addValidation("lastname","req","Tên không được bỏ trống");
				//Email
				$validator->addValidation("email","email","Email không được bỏ trống");
				//so dien thoai
				$validator->addValidation("phone","req","Số điện thoại không được bỏ trống");
				//mat khau
				$validator->addValidation("password","req","Mật khẩu không được bỏ trống");
				$validator->addValidation("password","minlen=5","Mật khẩu phải lớn hơn 5 ký tự");
				//xac nhan mat khau
				$validator->addValidation("confirm_password","req","Xác nhận mật khẩu không được bỏ trống");
				$validator->addValidation("confirm_password","minlen=5","Xác nhận mật khẩu phải lớn hơn 5 ký tự");
				$validator->addValidation("confirm_password","eqelmnt=password","Xác nhận mật khẩu không khớp với mật khẩu");
				
				//nhom quyen
				$validator->addValidation("ddlRoleTypes","dontselect=0","Chọn nhóm quyền cho tài khoản được cấp phát");
				
				if($validator->ValidateForm())
				{
					if($_POST["act"] == "save"){
					
						$myprocess = new process;
						$check = true;
						
						if($myprocess->process_adduser($uid, $pwd, $ho, $ten, $email , $gioitinh, $diachi, $dienthoai, $nhomchucnang_id, $chucnang, $thutu, $trangthai, $ngaythem) <> FALSE){
							$_SESSION["message"]["notyfy"] = "Đã thêm tài khoản <strong>$uid</strong> thành công !";
							$func->_redirect($index_backend . "admin/users/add.html");
							exit;
						} else {
							$_SESSION["message"]["notyfy"] = "Thêm tài khoản $uid không thực hiện được !";
							$func->_redirect($index_backend);
							exit;
						}
					}
					
				} else {
					
					$check = false;
					$error_hash = $validator->GetErrors();
					foreach($error_hash as $inpname => $inp_err)
					{
						@$_SESSION["validator"][$inpname] = '<p class="error help-block"><span style="color:red;">' . $inp_err . '</span></p>';
					}
				}
			}		           
			
		break;     
        default:
            $func->_redirect(".");
        break;
    }