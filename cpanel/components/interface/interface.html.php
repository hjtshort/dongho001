<?php defined('_VALID_MOS') or die(include("404.php"));
if (isset($_SESSION["wti"]) || !empty($_SESSION["wti"])) {

    include_once("../libraries/validation/validation.php");
    include_once("interface.model.php");
    $validator = new FormValidator();

    $chucnang_list = $_SESSION["wti"]["chucnang"];
    $conf['geturl'] = $func->get_url("page|view|act|id");

    switch ($conf['geturl']['view']) {

        case "":
            include_once("404.php");
            break;

        case "menu":

            switch ($conf['geturl']['act']) {

                case "":
                    include_once("404.php");
                    break;

                case "view":

                    include_once("menu/interface.menu.view.admin.process.php");
                    include_once("menu/interface.menu.view.admin.php");
                    break;

                default:

                    break;

            }

            break;

        case "skin":

            switch ($conf['geturl']['act']) {
                case "view":
                    include_once("skin/interface.skin.view.admin.process.php");
                    include_once("skin/interface.skin.view.admin.php");

                    break;

            }

            break;

        case "template":

            switch ($conf['geturl']['act']) {
                case "install":
                    include_once ("template/interface.template.install.admin.process.php");
                    include_once ("template/interface.template.install.admin.php");
                    break;
                case "view":
                    $chucnang_id_xem = 26; // Xem danh sách tin tức
                    $chucnang_id_ql = 2; // quản lý Xem danh sách tin tức
                    $chucnang_id_them = 27; // Thêm mới tin tức
                    $chucnang_id_sua = 28; // Cập nhật tin tức
                    $chucnang_id_xoa = 29; // Xoá tin tức
                    include_once("template/interface.template.view.admin.process.php");
                    include_once("template/interface.template.view.admin.php");
                    break;
                case "edit":
                    $chucnang_id = 28; // Cập nhật tin tức
                    include("../libraries/phpFileTree/php_file_tree.php");
                    include_once("template/interface.template.edit.admin.process.php");
                    include_once("template/interface.template.edit.admin.php");
                    break;
                case "setting":
                    $chucnang_id = 28; // Cập nhật tin tức

                    include_once("template/interface.template.setting.admin.process.php");
                    include_once("template/interface.template.setting.admin.php");
                    break;
                case "add":
                    $chucnang_id = 28; // Cập nhật tin tức
                    include_once("template/interface.template.add.admin.process.php");
                    include_once("template/interface.template.add.admin.php");
                    break;
            }

            break;
        default:
            include_once("404.php");
            break;

    }
}
?>