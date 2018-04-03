<?php defined('_VALID_MOS') or die(include("../../content/news/404.php"));

/*TODO chua check neu la template cua chinh nguoi tao moi cho sua*/

class process extends interface_model
{
    public $path_template;
    public $Id_template;

    function __construct()
    {
        global $conf;
        parent::__construct();
        $this->Id_template = $template_id =intval($conf['geturl']['id']);
        $this->path_template = REAL_PATH . "/{$conf['data_user']}/templates/$template_id";
        if(!is_dir($this->path_template)){
            $this->_redirect($conf['rooturl_backend'] . "/interface/template/view.html");
            exit();
        }
    }
    function get_template_edit(){
        $sql  = "SELECT Id,magiaodien,tengiaodien FROM maugiaodien WHERE Id = ?";
        return $this->dbObj->SqlQueryOutputResult($sql,array($this->Id_template));
    }
    function update_template($template_name){
        $sql  = "UPDATE maugiaodien SET tengiaodien = ? WHERE Id = ?";
        return $this->dbObj->SqlQueryOutputResult($sql,array($template_name,$this->Id_template));
    }
    function write_file($file, $content)
    {
        if (file_exists($file)) {
            if (file_put_contents($file, $this->black_list_tags($content))) {
                $_SESSION["message"]["notyfy"] = "Sửa file thành công!";
            } else {
                $_SESSION["message"]["notyfy"] = "Oops! Lỗi lưu dữ liệu ...";
            }
        } else {
            $_SESSION["message"]["notyfy"] = "File " . $_GET["load"] . " không tồn tại";
        }
    }
}

$template_process = new process();
$path_template = $template_process->path_template;
switch (@$_POST["hidden"]) {

    case "";

        break;

    case "setting_data":
        $file = "$path_template/config/setting_data.json";
        $template_process->write_file($file, $_POST["content_setting"]);
        $func->reload();
        break;
    case "setting":

        $file = "$path_template/config/setting.html";
        $template_process->write_file($file, $_POST["content_setting"]);
        $func->reload();
        break;
    case "setting_config":

        $file = REAL_PATH . "/" . $conf['data_user'] . "/setting_config.json";
        $template_process->write_file($file, $_POST["content_setting"]);
        $func->reload();
        break;

    case "add.file":
        $type = empty($_POST['dir']) ? '' : '/' . $_POST['dir'];
        $name = $_POST['file_name'];
        $file = "$path_template/$type/$name.html";
        if ($_POST['dir'] == 'asset') {
            $file = "$path_template/assets/$name";
        }
        if (!file_exists($file)) {
            if (@fopen($file, "w")) {
                $_SESSION["message"]["notyfy"] = "Tạo file thành công!";
            } else {
                $_SESSION["message"]["notyfy"] = "Lỗi ghi dữ liệu!";
            }
        } else {
            $_SESSION["message"]["notyfy"] = "File Đã Tồn Tại!";
        }
        $func->reload();
        break;
    case "change.name":
        $template_name =$template_process->htmlsql_cleans($_POST['template_name']);
        $template_process->update_template($template_name);
        break;

    default:

        switch (@$_GET["act"]) {

            case "page";

                $file = "$path_template/pages/" . $_GET["load"];
                $template_process->write_file($file, $_POST["content_setting"]);
                $func->reload();
                break;

            case "module";

                $file = "$path_template/modules/" . $_GET["load"];
                $template_process->write_file($file, $_POST["content_setting"]);
                $func->reload();
                break;
            case "layout":

                $file = "$path_template/" . $_GET["load"];
                $template_process->write_file($file, $_POST["content_setting"]);
                $func->reload();
                break;
            case "asset":

                $file = "$path_template/assets/" . $_GET["load"];
                $template_process->write_file($file, $_POST["content_setting"]);
                $func->reload();
                break;
        }

        break;
}
