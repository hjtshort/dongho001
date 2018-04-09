<?php defined( '_VALID_MOS' ) or die( include("404.php") );

    class change_process extends core_class
    {
        public $dbObj;
        
        function __construct()
        {
            $this->dbObj = new classDb();
        }
        public function change_password($pass,$id)
        {
            //enscriptPass
            $query="UPDATE `taikhoanquantri` SET pwd=? where uid=?";
            if($this->dbObj->SqlQueryInputResult($query,array($pass,$id)))
            {
                return true;
            }
            else 
                return false;

        }
        public function check_pass($id,$pass){
            $query="select pwd from taikhoanquantri where uid=? and pwd=?";
            if($this->dbObj->SqlQueryOutPutResult($query,array($id,$pass))->rowCount()==1)
                return true;
            else
                return false;

        }
    }
    switch($_POST['hidden']){
        case "":
        break;
        case "changpass":
            if($_POST['act']=="save")
            {
                $change_process=new change_process();
                include_once("../libraries/validation/validation.php");
                $validator = new FormValidator();
                $validator->addValidation("matkhaucu","req"," Mật khẩu cũ không được để trống");
                $validator->addValidation("matkhaucu","minlen=5"," Mật khẩu cũ phải lớn hơn 3 kí tự");
                $validator->addValidation("matkhaumoi","req"," Mật khẩu mới không được để trống");
                $validator->addValidation("matkhaumoi","alnum","Mật khấu mới có kí tự không hợp lệ");
                $validator->addValidation("matkhaumoi","minlen=5","Mật khấu mới phải lớn hơn 5 kí tự");
                $validator->addValidation("matkhaumoi2","req"," Xác nhận lại mật khẩu không được để trống");
                $validator->addValidation("matkhaumoi2","alnum","Xác nhận lại mật khẩu có kí tự không hợp lệ");
                $validator->addValidation("matkhaumoi2","minlen=5","Xác nhận lại mật khẩu phải lớn hơn 5 kí tự");

                if($validator->ValidateForm())
                {
                    $matkhaucu=strip_tags($_POST['matkhaucu']);
                    $matkhaumoi=strip_tags($_POST['matkhaumoi']);
                    $matkhaumoi2=strip_tags($_POST['matkhaumoi2']);
                    if($change_process->check_pass($_SESSION['wti']['uid'],$func->enscriptPass($matkhaucu))==true)
                    {
                        if( $matkhaumoi==$matkhaumoi2){
                            if($change_process->change_password($func->enscriptPass( $matkhaumoi),$_SESSION['wti']['uid'])){
                                $_SESSION["message"]["notyfy"] = "Đổi mật khẩu thành công !";
                                $func->_redirect($index_backend . "account/account/change.html");
                                exit;
                            }
                            else{
                                $_SESSION["message"]["notyfy"] = "Đổi mật khẩu thất bại !";
                                $func->_redirect($index_backend . "account/account/change.html");
                                exit;
                            }
                        }
                        else
                        {
                            $_SESSION['error']['1']='<p class="error help-block"><span class="label label-danger">Xác nhận mật khẩu mới không giống</span></p>';
                        }
                       
                    }
                    else{
                        $_SESSION['error']['0']='<p class="error help-block"><span class="label label-danger">Mật khẩu không chính xác</span></p>';
                    }
                    
                }
                else{
                    $error_hash = $validator->GetErrors();
                    foreach($error_hash as $inpname => $inp_err)
                    {
                        @$_SESSION["validator"][$inpname] = '<p class="error help-block"><span class="label label-danger">' . $inp_err . '</span></p>';
                    }
                }
            }
        break;
        default:
            $func->_redirect(".");
        break;
        
    }