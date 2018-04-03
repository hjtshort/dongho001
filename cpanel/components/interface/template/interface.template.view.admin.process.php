<?php

class process extends interface_model
{
    public function get_list_template($offset = 0, $limit = 100)
    {
        $user = $_SESSION["wti"]['uid'] == 'admin' ? '%' : $_SESSION["wti"]['uid'];
        $query = "SELECT Id,magiaodien,tengiaodien,anh_thumpnail,ngaythem,ngaysua,trangthai
					FROM maugiaodien
					WHERE nguoithem LIKE ?
					ORDER BY  trangthai DESC ,ngaysua DESC
					LIMIT $offset, $limit";
        $result = $this->dbObj->SqlQueryOutputResult($query, array($user));
        return $result;
    }
    public function get_template_by_id($id){
        $query = "SELECT Id,magiaodien,tengiaodien,anh_thumpnail,ngaythem,ngaysua,trangthai
					FROM maugiaodien
					WHERE maugiaodien.Id LIKE ?";
        $result = $this->dbObj->SqlQueryOutputResult($query, array($id));
        return $result;
    }
    function unzip_file_template($file)
    {
        $file_name = $file['name'];
        $source = $file["tmp_name"];
        if (!is_dir(REAL_PATH . '/temp')) {
            mkdir(REAL_PATH . '/temp');
        }
        $target_path = REAL_PATH . '/temp/' . $file_name;
        $dir_extract = REAL_PATH . '/temp/' . $this->md10(rand(0, 10000000));
        if (move_uploaded_file($source, $target_path)) {
            $zip = new ZipArchive();
            $x = $zip->open($target_path);
            if ($x && mkdir($dir_extract)) {
                $zip->extractTo("$dir_extract"); // change this to the correct site path
                $zip->close();
                //$_SESSION["message"]["notyfy"] = "Upload $file_name Thành Công";
            } else {
                //$_SESSION["message"]["notyfy"] = "Mở $file_name không Thành Công";
                $this->remove_folder($dir_extract);
            }
        } else {
            $_SESSION["message"]["notyfy"] = "There was a problem with the upload. Please try again.";
        }
        if (file_exists($target_path)) unlink($target_path);
        return $dir_extract;
    }

    function add_database($magiaodien, $tengiaodien, $anh_thumpnail, $trangthai, $nguoithem, $ngaysua, $ngaythem)
    {
        $sql = "INSERT INTO maugiaodien 
                            (
                            magiaodien, 
                            tengiaodien, 
                            anh_thumpnail,
                            trangthai, 
                            nguoithem, ngaysua, ngaythem
                            ) VALUE (?,?,?,?,?,?,?)";
        return $this->dbObj->last_insert_id($sql, array($magiaodien, $tengiaodien, $anh_thumpnail, $trangthai, $nguoithem, $ngaysua, $ngaythem));
    }

    function copy_tempalte($template_info, $dir_extract,$move_dir = true)
    {
        global $conf;
        $template_name = $template_info['name'];
        $template_alias = $template_info['alias'];
        $template_id = $this->add_database($template_alias, $template_name,'', 0, $_SESSION['wti']['uid'], time(), time());
        if (!is_dir(REAL_PATH . "/templates/$template_id")) {
            if($move_dir){
                rename("$dir_extract", REAL_PATH . '/' . $conf['data_user'] . "/templates/$template_id");
            }else{
                $this->recurse_copy("$dir_extract", REAL_PATH . '/' . $conf['data_user'] . "/templates/$template_id");
            }
            return true;
        } else {
            $_SESSION["message"]["notyfy"] = "Giao diện đã tồn tại";
            return false;
        }
    }

    public function update_status($id)
    {
        $query = "UPDATE maugiaodien SET trangthai = 0;
                  UPDATE maugiaodien SET trangthai = 1 WHERE Id = ?";
        $result = $this->dbObj->SqlQueryInputResult($query, array($id));
        return $result;
    }

    function delete($magiaodien)
    {
        $query = "DELETE  FROM maugiaodien
				  WHERE Id = ?";
        if ($this->dbObj->SqlQueryInputResult($query, array($magiaodien))) {
            $this->delete_folder($magiaodien);
            return true;
        };
        return false;
    }

    function delete_folder($magiaodien)
    {
        global $conf;
        $dir_template = REAL_PATH . '/' . $conf['data_user'] . "/templates/$magiaodien";
        $this->remove_folder($dir_template);
    }
}

switch (@$_POST["hidden"]) {

    case "";
        break;
    case "template.view";
        $interface_model = new process();
        switch ($_POST["act"]) {
            case 'delete':
                $id = $_POST["template_id"];
                if (!empty($id) && $id != $conf['app']['template']) {
                    $_SESSION["message"]["notyfy"] = $interface_model->delete($id) ? "Xóa Thành Công" : "Hiện tại hệ thống đang gặp lỗi, vui lòng liên hệ quản trị !!! ";
                }
                $func->reload();
                break;
            case 'change':
                $file = REAL_PATH . '/' . $conf['data_user'] . '/setting_config.json';
                $content = ['config' => $conf['app']];
                $content['config']['template'] = $_POST['template_id'];
                if (file_exists($file)) {
                    if (file_put_contents($file, $func->json_encode_unicode($content)) && $interface_model->update_status($_POST['template_id'])) {
                        $_SESSION["message"]["notyfy"] = "Đổi giao diện thành công!";
                        $func->_redirect($index_backend . 'interface/template/view.html');
                    } else
                        $_SESSION["message"]["notyfy"] = "Oops! Lỗi lưu dữ liệu ...";
                } else {
                    $_SESSION["message"]["notyfy"] = "File " . $file . " không tồn tại";
                }
                $func->reload();
                break;
            case 'upload':
                $file = $_FILES['file_upload'];
                $dir_extract = $interface_model->unzip_file_template($file);
                if (file_exists("$dir_extract/info.json")) {
                    $template_info = json_decode(file_get_contents("$dir_extract/info.json"), true);
                    if ($interface_model->copy_tempalte($template_info, $dir_extract)) {
                        $_SESSION["message"]["notyfy"] = "Upload Thành Công";
                    }
                    $interface_model->remove_folder($dir_extract);
                }
                $func->reload();
                break;
            case 'copy':
                $template_id_original = $_POST["template_id"];
                $template_info_original = $interface_model->get_template_by_id($template_id_original)->fetch();
                $template_info = [
                    'name'=>'Bản sao của '.$template_info_original['tengiaodien'],
                    'alias'=>'copy_'.$template_info_original['tengiaodien']
                ];
                $template_dir_original = REAL_PATH . '/' . $conf['data_user'] ."/templates/$template_id_original";
                if ($interface_model->copy_tempalte($template_info, $template_dir_original,false)) {
                    $_SESSION["message"]["notyfy"] = "Sao chép Thành Công";
                }
                $func->reload();
                break;
            default:
                $func->reload();
                break;
        }
        break;
    default:
        $func->_redirect(".");
        break;
}
