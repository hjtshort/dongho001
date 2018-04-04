<?php defined( '_VALID_MOS' ) or die( include("404.php") );

    class profile_process extends core_class
    {
        public $dbObj;
        
        function __construct()
        {
            $this->dbObj = new classDb();
        }
        public function get_data(){
            $query="SELECT `ho`, `ten`, `email`, `gioitinh`, `diachi`, 
            `dienthoai`,  `facebook`
             FROM `taikhoanquantri` WHERE uid='".$_SESSION['wti']['uid']."'";
             $data=$this->dbObj->SqlQueryOutPutResult($query,array(0))->fetchAll();
             return $data;
        }
        public function edit_data($ho,$ten,$email,$gioitinh,$diachi,$facebook,$dienthoai,$uid)
        {
            $query="UPDATE taikhoanquantri set 
                    ho=?,
                    ten=?,
                    email=?,
                    gioitinh=?,
                    diachi=?,
                    facebook=?,
                    dienthoai=?
                    where uid =? ";
                    if($this->dbObj->SqlQueryInputResult($query,array($ho,$ten,$email,$gioitinh,$diachi,$facebook,$dienthoai,$uid)))
                        return true;
                    else 
                        return false;
        }
    }
    $profile_process = new profile_process();
    switch($_POST['hidden']){
        case "edit":
            // include_once("../libraries/validation/validation.php");
            // $check = false;
		
            // $validator = new FormValidator();
            // $validator->addValidation("ho","req","Họ không được để trống");
            // $validator->addValidation("ten","req","Tên không được để trống");
            // $validator->addValidation("ten","minlen=4","Tên phải lớn hơn 4 ký tự");
            // $validator->addValidation("diachi","req","Địa chỉ không được để trống");
            // $validator->addValidation("diachi","minlen=4","Địa chỉ phải lớn hơn 4 ký tự");
            // $validator->addValidation("sdt","req","Số điện thọai không được để trống");
            // $validator->addValidation("sdt","minlen=10","Số điện thoại chỉ được 10 hoặc 11 số ");
            // $validator->addValidation("sdt","maxlen=11","Số điện thoại chỉ được 10 hoặc 11 số ");
            // $validator->addValidation("sdt","num","Số điện thoại phải là số");
            // $validator->addValidation("email","req","Email không được để trống ");
            // $validator->addValidation("email","minlen=10","Email phải lớn hơn 9 ký tự ");
            // $validator->addValidation("email","email","Email không hợp lệ ");
            // if($validator->ValidateForm())
			// {
               // $check=true;
                if($_POST["act"] == "save"){
                    $ho=strip_tags($_POST['ho']);
                    $ten=strip_tags($_POST['ten']);
                    $diachi=strip_tags($_POST['diachi']);   
                    $sdt=strip_tags($_POST['sdt']);
                    $email=strip_tags($_POST['email']);
                    $gioitinh=strip_tags($_POST['gioitinh']);
                    $_POST['facebook']==""? $facebook=" ":$facebook=strip_tags($_POST['facebook']);
                    if($profile_process->edit_data($ho,$ten,$email,$gioitinh,$diachi,$facebook,$sdt,$_SESSION['wti']['uid'])<> false){
                        $_SESSION["message"]["notyfy"] = "Đã sửa thành công !";
                        $func->_redirect($index_backend . "account/account/edit.html");
						exit;
                    }
                    else {
                        $_SESSION["message"]["notyfy"] = "Đã sửa thất bại !";
                        $func->_redirect($index_backend . "account/account/edit.html");
                        exit;
                    }


                 
                }
           // }
            // else {
            //     $check = false;
			// 	$error_hash = $validator->GetErrors();
			// 	foreach($error_hash as $inpname => $inp_err)
			// 	{
            //         @$_SESSION["validator"][$inpname] = '<p class="error help-block"><span style="color:red;">' . $inp_err . '</span></p>';
            //     }
            // }
            break;

    }
 
?>