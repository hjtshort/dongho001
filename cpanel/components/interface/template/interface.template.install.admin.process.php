<?php

class process extends interface_model
{
    function add_template_database($magiaodien, $tengiaodien, $anh_thumpnail, $trangthai, $nguoithem, $ngaysua, $ngaythem)
    {
        $sql = "INSERT INTO maugiaodien 
                            (
                            magiaodien, 
                            tengiaodien, 
                            anh_thumpnail,
                            trangthai, 
                            nguoithem, ngaysua, ngaythem
                            ) VALUE (?,?,?,?,?,?,?)";
        $result = $this->dbObj->last_insert_id($sql, array( $magiaodien, $tengiaodien, $anh_thumpnail, $trangthai, $nguoithem, $ngaysua, $ngaythem));
        return $result;
    }

    function install_template($template)
    {
        global $conf;
        $zip = new ZipArchive;
        $template_original_id = $template['id'];
        $file_template = REAL_PATH . "/templates/$template_original_id/$template_original_id.zip";
        $dir_template_user = REAL_PATH . "/{$conf['data_user']}/templates";
        $template_id_for_user = $this->add_template_database($template_original_id, $template_original_id,  "", 0, $_SESSION['wti']['uid'], time(), time());
        $res = $zip->open($file_template);
        if ($res
            && mkdir("$dir_template_user/$template_id_for_user")
            && is_dir("$dir_template_user/$template_id_for_user")) {
            $zip->extractTo("$dir_template_user/$template_id_for_user/");
            $zip->close();
            unset($_SESSION['theme']);
            return true;
        } else {
            return false;
        }
    }
}


