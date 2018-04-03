<?php defined('_VALID_MOS') or die(include_once("../../404.php"));

class register
{
    public $dbObj;

    function __construct()
    {
        $this->dbObj = new classDb();
    }

    function create_databse($schema, $user_name, $password)
    {
        //CREATE USER '$user_name'@'localhost' IDENTIFIED BY '$password';
        //GRANT ALL ON `$schema`.* TO 'ganemct'@'localhost';
        //FLUSH PRIVILEGES;
        $this->dbObj->run_sql("CREATE DATABASE $schema;", array(0));
    }

    function ganeral_structure_databse($schema, $db_structure)
    {
        $this->dbObj->run_sql("USE $schema;" . $db_structure, array(0));
    }

}

$register = new register();
switch (@$_POST["hidden"]) {
    case "";

        // khoi dau trang khong co gia tri submit. khong lam zi ca
        break;

    case "register":
        include_once("../libraries/validation/validation.php");
        $check = false;

        $validator = new FormValidator();

        //category_title
        $validator->addValidation("username", "req", "Tên đăng nhập không được bỏ trống");
        $validator->addValidation("password", "req", "Mật khẩu không được bỏ trống");
        $validator->addValidation("title", "req", "Tên Webstie không được bỏ trống");
        $validator->addValidation("full_name", "req", "Họ tên không được bỏ trống");
        $validator->addValidation("email", "req", "Email không được bỏ trống");
        $validator->addValidation("phone", "req", "Số điện thoại không được bỏ trống");

        $validator->addValidation("username", "minlen=2", "Tên đăng nhập phải lớn hơn 2 ký tự");
        $validator->addValidation("password", "minlen=6", "Mật khẩu phải lớn hơn 6 ký tự");
        $validator->addValidation("title", "minlen=2", "Tên Webstie phải lớn hơn 2 ký tự");
        $validator->addValidation("email", "email", "Email không chính xác");
        //$validator->addValidation("phone", "regexp=^0(([8-9][0-9]{8})|(1[0-9]{9}))$", "Số điện thoại không chính xác");



        if ($validator->ValidateForm()) {
            $default_template = 'dongho-001';
            $username = $_POST['username'] ;//. '.ganemtuixachcantho.com';
            $title = $_POST['title'];
            $full_name = $_POST['full_name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];


            $dir_user = REAL_PATH . "/data_setting/$username";
            $file_template = REAL_PATH . "/templates/$default_template/$default_template.zip";
            $file_sql = REAL_PATH . "/templates/$default_template/$default_template.sql";
            $file_json_config = "$dir_user/setting_config.json";
            $file_json_database = "$dir_user/data_config.json";

            $db_schema = $_POST['username'];
            $db_user = $db_schema;
            $db_password = !empty($_POST['password']) ? $_POST['password'] : '123456';
            $db_structure = file_get_contents($file_sql);
            $register->create_databse($db_schema, $db_user, $db_password);
            $register->ganeral_structure_databse($db_schema, $db_structure);

            $config['config'] = [
                "site_status" => 1,
                "rooturl" => "//$username",
                "website_title" => $title,
                "email_admin" => $email,
                "company_name" => $title,
                "address" => "",
                "phone" => $phone,
            ];

            $data_config = [
                $username => array(
                    'db_schema' => $db_schema,
                    'db_host' => 'localhost',
                    'db_user' => 'root',//$db_user,
                    'db_password' => 'root',//$db_password,
                    'template' => $default_template
                )
            ];

            mkdir($dir_user);
            mkdir($dir_user . '/file_upload');
            if (fopen($file_json_config, "w") && fopen($file_json_database, "w")) {
                file_put_contents($file_json_config, str_replace('\/', '/', json_encode($config, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)));
                file_put_contents($file_json_database, json_encode($data_config, JSON_PRETTY_PRINT));
            } else {
                $_SESSION["message"]["notyfy"] = "Tạo file config thất bại";
            }

            $zip = new ZipArchive;
            $res = $zip->open($file_template);
            if ($res) {
                $zip->extractTo("$dir_user/templates/$default_template/");
                $zip->close();
                $_SESSION["message"]["notyfy"] = "Tạo thành công";
            } else {
                $_SESSION["message"]["notyfy"] = "Tạo template mặc định thất bại";
            }
            $func->_redirect("http://$username/cpanel");
        } else {

            $check = false;
            $error_hash = $validator->GetErrors();
            foreach ($error_hash as $inpname => $inp_err) {
                @$_SESSION["validator"][$inpname] = '<p class="text-danger">' . $inp_err . '</p>';
            }
        }
        break;

    default:
        $func->reload();
        exit();
        break;
}
?>
