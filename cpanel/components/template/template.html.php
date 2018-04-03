<?php defined('_VALID_MOS') or die(include("404.php"));
if (isset($_SESSION["wti"]) || !empty($_SESSION["wti"])) {

    $chucnang_list = $_SESSION["wti"]["chucnang"];

    $conf['geturl'] = $func->get_url("page|view|act|id");

    switch ($conf['geturl']["view"]) {

        case "":
            include_once("404.php");
            break;

        case "category":

            switch ($conf['geturl']['act']) {

                case "view":

                    $chucnang_id_xem = 14; // Xem thông tin nhóm sản phẩm
                    if ($func->_checkIdinArray($chucnang_id_xem, $chucnang_list)) {

                        include_once("template.models.php");
                        include_once("category/template.category.view.admin.process.php");
                        include_once("category/template.category.view.admin.php");

                    } else {
                        include_once("accessdenied.php");
                    }
                    break;

                case "add":

                    $chucnang_id_them = 15; // Thêm mới thông tin nhóm sản phẩm
                    if ($func->_checkIdinArray($chucnang_id_them, $chucnang_list)) {
                        include_once("template.models.php");
                        include_once("category/template.category.add.admin.process.php");
                        include_once("category/template.category.add.admin.php");
                    } else {
                        include_once("accessdenied.php");
                    }

                    break;

                case "edit":
                    $chucnang_id_sua = 16; // Chỉnh sữa thông tin nhóm sản phẩm
                    if ($func->_checkIdinArray($chucnang_id_sua, $chucnang_list)) {
                        include_once("template.models.php");
                        include_once("category/template.category.edit.admin.process.php");
                        include_once("category/template.category.edit.admin.php");

                    } else {
                        include_once("accessdenied.php");
                    }
                    break;

            }

            break;
        case "report":
            {
                switch ($conf['geturl']['act']) {

                    case "view":

                        $chucnang_id_xem = 10; // Xem thông tin nhóm sản phẩm
                        if ($func->_checkIdinArray($chucnang_id_xem, $chucnang_list)) {

                            include_once("template.models.php");
                            include_once("report/template.template.view.admin.process.php");
                            include_once("report/template.template.view.admin.php");

                        } else {
                            include_once("accessdenied.php");
                        }

                        break;
                    case "detail":

                        $chucnang_id_xem = 10; // Xem thông tin nhóm sản phẩm
                        if ($func->_checkIdinArray($chucnang_id_xem, $chucnang_list)) {

                            include_once("template.models.php");
                            include_once("report/template.template.detail.admin.process.php");
                            include_once("report/template.template.detail.admin.php");

                        } else {
                            include_once("accessdenied.php");
                        }

                        break;
                    default:
                        include_once("404.php");
                        break;
                }
                break;
            }
        case "template":

            switch ($conf['geturl']['act']) {

                case "view":

                    $chucnang_id_xem = 10; // Xem thông tin nhóm sản phẩm
                    if ($func->_checkIdinArray($chucnang_id_xem, $chucnang_list)) {

                        include_once("template.models.php");
                        include_once("template/template.template.view.admin.process.php");
                        include_once("template/template.template.view.admin.php");

                    } else {
                        include_once("accessdenied.php");
                    }

                    break;

                case "add":

                    $chucnang_id_xem = 11; // Xem thông tin nhóm sản phẩm
                    if ($func->_checkIdinArray($chucnang_id_xem, $chucnang_list)) {

                        include_once("template.models.php");
                        include_once("template/template.template.add.admin.process.php");
                        include_once("template/template.template.add.admin.php");

                    } else {
                        include_once("accessdenied.php");
                    }

                    break;

                case "edit":

                    $chucnang_id_xem = 12; // Xem thông tin nhóm sản phẩm
                    if ($func->_checkIdinArray($chucnang_id_xem, $chucnang_list)) {

                        include_once("template.models.php");
                        include_once("template/template.template.edit.admin.process.php");
                        include_once("template/template.template.edit.admin.php");

                    } else {
                        include_once("accessdenied.php");
                    }

                    break;

                case "copy":

                    $chucnang_id_xem = 12; // Xem thông tin nhóm sản phẩm
                    if ($func->_checkIdinArray($chucnang_id_xem, $chucnang_list)) {

                        include_once("template.models.php");
                        include_once("template/product.product.copy.admin.process.php");
                        include_once("template/template.template.copy.admin.php");

                    } else {
                        include_once("accessdenied.php");
                    }

                    break;
            }

            break;

        default:
            include_once("404.php");
            break;

    }
}
?>