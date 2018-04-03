<?php defined('_VALID_MOS') or die(include_once("../../404.php"));

class register extends core_class
{

    public $dbObj;

    function __construct()
    {
        $this->dbObj = new classDb();
    }
    /*
     * tạo thêm 1 database
     * */
    function create_database($schema)
    {
        $this->dbObj->run_sql("CREATE DATABASE $schema;");
    }
    /*
     * chạy lệnh sql tạo cấu trúc cho database
     * */
    function generate_structure_database($schema, $db_structure)
    {
        $this->dbObj->run_sql("USE $schema;" . $db_structure);
    }
    /*
     * lấy thông tin khi đăng ký để tạo ra tài khoản quản trị trên database mới
     * */
    function generate_user_admin($schema, $email, $full_name, $password, $phone_number, $domain)
    {
        $pwd = $this->enscriptPass($password);
        $date_create = time();
        $permission_default = '30,31,32,33,34,35,36,37,38,26,27,28,29,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,1,2,3,4,5,6,7,8,9,';
        $sql = "INSERT INTO taikhoanquantri VALUES (1, 'admin', ?, '', ? , ?,?, 'NAM','?' ,? , '', '', '', '', '', 1, ?, 1, 1, ?);";
        $sql = "USE $schema;" . $sql;
        $this->dbObj->SqlQueryInputResult($sql,array($pwd,$full_name,$email,$domain,$phone_number,$permission_default,$date_create));
    }
    /*
     * thêm dữ liệu giao diện mặc định cho bảng maugiaodien trên database mới
     * */
    function insert_template($schema, $id, $magiaodien, $tengiaodien, $anh_thumpnail, $trangthai, $nguoithem, $ngaysua, $ngaythem)
    {
        $sql = "USE $schema;INSERT INTO maugiaodien 
                            (
                            Id,
                            magiaodien, 
                            tengiaodien, 
                            anh_thumpnail,
                            trangthai, 
                            nguoithem, ngaysua, ngaythem
                            ) VALUE (?,?,?,?,?,?,?,?)";
        return $this->dbObj->SqlQueryInputResult($sql, array($id,$magiaodien, $tengiaodien, $anh_thumpnail, $trangthai, $nguoithem, $ngaysua, $ngaythem));
    }
    /*
     * kiểm tra thông tin khách hàng đã tồn tại trên database tổng hay chưa
     * */
    function customer_exists($uid, $email, $phone)
    {
        $sql = "SELECT count(*) AS count 
                FROM khachhang
                WHERE customer_uid LIKE ? OR customer_email LIKE ? OR customer_phone LIKE ?";
        $resutl = $this->dbObj->SqlQueryOutputResult($sql, array($uid, $email, $phone))->fetch();
        return $resutl['count'] == 0 ? false : true;
    }
    function customer_info_exists($email, $phone)
    {
        $sql = "SELECT count(*) AS count 
                FROM khachhang
                WHERE customer_email LIKE ? OR customer_phone LIKE ?";
        $resutl = $this->dbObj->SqlQueryOutputResult($sql, array($email, $phone))->fetch();
        return $resutl['count'] == 0 ? false : true;
    }
    /*
     * thêm thông tin khách hàng trên database tổng
     * */
    function insert_customer($uid, $fullname, $email, $phone, $date_create)
    {
        $sql = "INSERT INTO khachhang(customer_uid, customer_fullname, customer_email, customer_phone,customer_status,date_update, date_create)
				    VALUES (?,?,?,?,1,?,?)";

        return $this->dbObj->SqlQueryInputResult($sql, array($uid, $fullname, $email, $phone, $date_create, $date_create));
    }

    /*
     * thêm thông tin domain trên database tổng
     * */
    function insert_domain($domain,$uid)
    {
        $sql = "INSERT INTO domain(domain, user_id)
				    VALUES (?,?)";
        $last_insert_id = $this->dbObj->last_insert_id($sql, array($domain,$uid));
        return $this->insert_domain_map($domain,$last_insert_id);
    }
    /*
     * thêm thông tin domain ánh xạ trên database tổng
     * */
    function insert_domain_map($subdomain,$main_main_id)
    {
        $sql = "INSERT INTO domain_mapped(subdomain, domain_id,status)
				    VALUES (?,?,1)";
        return  $this->dbObj->SqlQueryInputResult($sql, array($subdomain,$main_main_id));
    }
    /*
     * tạo script chuyển hướng login
     * */
    function login($link, $email, $pwd)
    {
        ?>
        <form name="form_login" id="form_login" action="<?= $link ?>" method="post">
            <input type="hidden" name="username" value="<?= $email; ?>"/>
            <input type="hidden" name="password" value="<?= $pwd; ?>"/>
            <input type="hidden" name="hidden" value="login"/>
        </form>

        <script>
            $(document).ready(function () {
                $("#form_login").submit();
            });
        </script>
        <?php
    }
}


switch (@$_POST["hidden"]) {
    case "";

        // khoi dau trang khong co gia tri submit. khong lam zi ca
        break;

    case "register":
        include_once("../libraries/validation/validation.php");
        $check = false;

        $validator = new FormValidator();
        $register = new register();
        //category_title

        $validator->addValidation("password", "req", "Mật khẩu không được bỏ trống");
        $validator->addValidation("confirm_password", "req", "Mật khẩu xác nhận không được bỏ trống");
        $validator->addValidation("domain", "req", "Tên Webstie không được bỏ trống");
        $validator->addValidation("full_name", "req", "Họ tên không được bỏ trống");
        $validator->addValidation("email", "req", "Email không được bỏ trống");
        $validator->addValidation("phone", "req", "Số điện thoại không được bỏ trống");

        $validator->addValidation("password", "minlen=6", "Mật khẩu phải lớn hơn 6 ký tự");
        $validator->addValidation("confirm_password", "eqelmnt=password", "Mật khẩu xác nhận không chính xác");
        $validator->addValidation("domain", "minlen=2", "Tên Webstie phải lớn hơn 2 ký tự");
        $validator->addValidation("domain", "maxlen=25", "Tên Webstie phải nhỏ hơn 25 ký tự");
        $validator->addValidation("email", "email", "Email không chính xác");
        //$validator->addValidation("phone", "regexp=^0(([8-9][0-9]{8})|(1[0-9]{9}))$", "Số điện thoại không chính xác");


        if ($validator->ValidateForm()) {
            $default_template = $conf['default_template'];
            $default_template_id = '1';
            $domain = $func->_removesigns($_POST['domain']) . '.'.$conf['base_url'];
            $title = $_POST['domain'];
            $full_name = $_POST['full_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];


            $dir_user = REAL_PATH . "/data_setting/$domain";
            $file_template = REAL_PATH . "/templates/$default_template/$default_template.zip";
            $file_sql = REAL_PATH . "/templates/$default_template/$default_template.sql";
            $file_json_config = "$dir_user/setting_config.json";
            $file_json_database = "$dir_user/data_config.json";

            $db_schema = str_replace('-', '_', $func->_removesigns($_POST['domain'])) . '_data';
            $db_structure = file_get_contents($file_sql);

            $setting_config['config'] = [
                "site_status" => 1,
                "rooturl" => "//$domain",
                "website_title" => $title,
                "email_admin" => $email,
                "company_name" => $title,
                "address" => "",
                "phone" => $phone,
                "logo" => "logo.png",
                "template" => $default_template_id
            ];

            $data_config = ['db_schema' => $db_schema];

            if (!$register->customer_exists($domain, $email, $phone)) {
                if ($register->insert_domain($domain,'admin') &&
                    $register->insert_customer($domain, $full_name, $email, $phone, time())) {
                    mkdir($dir_user);
                    mkdir($dir_user . '/file_upload');
                    mkdir($dir_user . '/file_upload/images');
                    mkdir($dir_user . '/file_upload/product');
                    mkdir($dir_user . '/file_upload/video');
                    mkdir($dir_user . '/file_upload/files');
                    copy(REAL_PATH.'/images/logo.png',$dir_user . '/file_upload/images/logo.png');
                    if (fopen($file_json_config, "w") && fopen($file_json_database, "w")) {
                        file_put_contents($file_json_config, $func->json_encode_unicode($setting_config));
                        file_put_contents($file_json_database, $func->json_encode_unicode($data_config));
                        $register->create_database($db_schema);
                        $register->generate_structure_database($db_schema, $db_structure);
                        $register->generate_user_admin($db_schema, $email,$full_name, $password, $phone,$domain);
                    } else {
                        $_SESSION["message"]["notyfy"] = "Tạo file config thất bại";
                    }

                    $zip = new ZipArchive;
                    $res = $zip->open($file_template);
                    if ($res) {
                        $zip->extractTo("$dir_user/templates/$default_template_id/");
                        $register->insert_template($db_schema,$default_template_id,'default',$default_template,'',1,'admin',time(),time());
                        $zip->close();
                        $_SESSION["message"]["notyfy"] = "Tạo thành công";
                        $check = $res;
                    } else {
                        $_SESSION["message"]["notyfy"] = "Tạo template mặc định thất bại";
                    }

                } else {
                    $_SESSION["message"]["notyfy"] = "Đăng ký tài khoản thất bại";
                }
            } else {
                $_SESSION["message"]["notyfy"] = "Website đã tồn tại";
                if ($register->customer_info_exists($email, $phone)) {
                    $_SESSION["message"]["notyfy"] = "Thông tin đã được đăng ký cho website khác";
                }
            }


        } else {
            $check = false;
            $error_hash = $validator->GetErrors();
            foreach ($error_hash as $inpname => $inp_err) {
                @$_SESSION["validator"][$inpname] = '<p class="text-danger">' . $inp_err . '</p>';
            }
        }
        if ($check) {
            $register->login("http://$domain/cpanel", $email, $password);
            //$func->_redirect("http://$domain/cpanel");
        } else {
            $_SESSION['old'] = $_POST;
            $func->reload();
        }
        break;

    default:
        $func->reload();
        exit();
        break;
}
?>
