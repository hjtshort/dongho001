<?php defined( '_VALID_MOS' ) or die( include("404.php") );

    class process
    {
        public $dbObj;
        
        function __construct()
        {
            $this->dbObj = new classDb();
        }
        public function get_value($id)
        {
            $query="select *  from sanpham_nhasanxuat where nhasanxuat_id=?";
            $data=$this->dbObj->SqlQueryOutputResult($query, array($id))->fetchAll();
            return $data;
        }
        public function update($nhasanxuat,$sodienthoai,$diachi,$email,$id)
        {
            // $query="INSERT INTO `sanpham_nhasanxuat`
            // (`nhasanxuat`, `sodienthoai`, `diachi`, `email`, `ngaythem`, `thutu`) 
            // VALUES (?,?,?,?,?,?)";
            $query="Update sanpham_nhasanxuat SET nhasanxuat=?,sodienthoai=?,diachi=?,email=?
            where nhasanxuat_id=?
            ";
            if($this->dbObj->SqlQueryInputResult($query,array($nhasanxuat,$sodienthoai,$diachi,$email,$id)))
                return true;
            else
                return false;
        }
    }
    switch ($_POST['hidden']){
        case "":
        break;
        case "news.edit":
            $myprocess = new process();      
            include_once("../libraries/validation/validation.php");
            $validator = new FormValidator();	
            $nhasanxuat=$_POST["nhasanxuat"];
            $sodienthoai=$_POST['dienthoai'];
            $diachi=$_POST['diachi'];
            $email=$_POST['email'];
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
                    $url=$func->get_url('1|2|3|id');
                    if($myprocess->update($nhasanxuat,$sodienthoai,$diachi,$email,$url['id']))
                    {
                        $_SESSION["message"]["notyfy"] = "Đã sửa nhà sản xuất <strong>$uid</strong> thành công !";
                        $func->_redirect($index_backend . "product/vendors/edit/".$url['id'].".html");
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