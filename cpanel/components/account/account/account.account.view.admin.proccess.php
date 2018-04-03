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
            `dienthoai`, `yahoo`, `msn`, `skype`, `aol`, `gtalk`
             FROM `taikhoanquantri` WHERE uid='".$_SESSION['wti']['uid']."'";
             $data=$this->dbObj->SqlQueryOutPutResult($query,array(0))->fetchAll();
             return $data;
        }
    }
    $profile_process = new profile_process();
    switch($_POST['hidden']){
        case "edit":
            include_once("../libraries/validation/validation.php");
            $check = false;
		
            $validator = new FormValidator();
            $validator->addValidation("ho","req","Họ không được để trống");
            $validator->addValidation("ten","req","Tên không được để trống");
            $validator->addValidation("ten","minlen=4","Tên phải lớn hơn 4 ký tự");
            $validator->addValidation("diachi","req","Địa chỉ không được để trống");
            $validator->addValidation("diachi","minlen=4","Địa chỉ phải lớn hơn 4 ký tự");
            $validator->addValidation("sdt","req","Số điện thọai không được để trống");
            $validator->addValidation("sdt","minlen=10","Số điện thoại chỉ được 10 hoặc 11 số ");
            $validator->addValidation("sdt","maxlen=11","Số điện thoại chỉ được 10 hoặc 11 số ");
            $validator->addValidation("email","req","Email không được để trống ");
            $validator->addValidation("email","minlen=10","Email phải lớn hơn 9 ký tự ");
            break;

    }
 
?>