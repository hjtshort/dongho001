<?php defined( '_VALID_MOS' ) or die( include("404.php") );

    class process
    {
        public $dbObj;
        
        function __construct()
        {
            $this->dbObj = new classDb();
        }
        public function get_max_id()
        {
            $query="select max(thutu) as max from sanpham_nhasanxuat";
            $data=$this->dbObj->SqlQueryOutputResult($query, array())->fetchAll();
            return $data;
        }
        public function insert($nhasanxuat,$sodienthoai,$diachi,$email,$ngaythem,$thutu)
        {
            $query="INSERT INTO `sanpham_nhasanxuat`
            (`nhasanxuat`, `sodienthoai`, `diachi`, `email`, `ngaythem`, `thutu`) 
            VALUES (?,?,?,?,?,?)";
            if($this->dbObj->SqlQueryInputResult($query,array($nhasanxuat,$sodienthoai,$diachi,$email,$ngaythem,$thutu)))
                return true;
            else
                return false;
        }
    }
    switch ($_POST['hidden']){
        case "":
        break;
        case "news.add":
            $myprocess = new process();      
            include_once("../libraries/validation/validation.php");
            $validator = new FormValidator();	
            $nhasanxuat=$_POST["nhasanxuat"];
            $sodienthoai=$_POST['dienthoai'];
            $diachi=$_POST['diachi'];
            $email=$_POST['email'];
            $ngaythem=$func->_formatdate($_POST['date']);
            $thutu=$myprocess->get_max_id();
            $validator->addValidation("nhasanxuat","req","Nhà sản xuất không được bỏ trống");
            $validator->addValidation("dienthoai","req","Số điện thoại không được bỏ trống");
            $validator->addValidation("dienthoai","numeric","Số điện thoại phải là số");
            $validator->addValidation("dienthoai","minlen=10","Số điện thoại chỉ được 10 hoặc 11 số");
            $validator->addValidation("dienthoai","maxlen=11","Số điện thoại chỉ được 10 hoặc 11 số");
            $validator->addValidation("diachi","req","Địa chỉ không được bỏ trống");
            $validator->addValidation("email","req","Email không được bỏ trống");
            $validator->addValidation("email","email","Email không đúng cú pháp");
            if($validator->ValidateForm())
            {
                if($_POST['act']=="save")
                {
                    if($myprocess->insert($nhasanxuat,$sodienthoai,$diachi,$email,$ngaythem,$thutu[0]['max']+1))
                    {
                        $_SESSION["message"]["notyfy"] = "Đã thêm nhà sản xuất <strong>$uid</strong> thành công !";
                        $func->_redirect($index_backend . "product/vendors/add.html");
                        exit;
                    }
                    else
                    {
                        $_SESSION["message"]["notyfy"] = "Thêm nhà sản xuất $uid không thực hiện được !";
                        $func->_redirect($index_backend);
                        exit;
                    }
                }
            }
            else {
                $error_hash = $validator->GetErrors();
					foreach($error_hash as $inpname => $inp_err)
					{
						@$_SESSION["validator"][$inpname] = '<p class="error help-block"><span style="color:red;">' . $inp_err . '</span></p>';
					}
            }
                		
            
        break;
        default:
        $func->_redirect(".");
        break;
    }
?>