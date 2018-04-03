<?php defined('_VALID_MOS') or die(include("404.php"));
$menu_process = new menu_process();
$list_group_menu = $menu_process->get_list_group_menu()->fetchAll();
$group_menu_id = isset($_GET['group_menu_id']) ? $_GET['group_menu_id'] : $list_group_menu[0]['Id'];
$list_menu = $menu_process->get_list_menu($group_menu_id)->fetchAll();
$list_article = $menu_process->get_list_article()->fetchAll();
$list_product = $menu_process->get_list_product()->fetchAll();
$menu_tree = $menu_process->buildTree($list_menu);
$list_category_article = array();
$list_category_product = array();
$menu_process->category($menu_process->get_list_category_article()->fetchAll(), $list_category_article);
$menu_process->category($menu_process->get_list_category_product()->fetchAll(), $list_category_product);

?>


<link href="<?= $conf['template_admin']; ?>/assets/css/dataTables.bootstrap.css" rel="stylesheet"/>

<div class="page-content">

    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs breadcrumbs-fixed">
        <div class="buttons-task col-xs-12 col-md-4">
            <ul class="breadcrumb breadcrumbs-fixed">
                <li><i class="fa fa-table"></i></li>
                <li class="toast-title">Quản lý menu</li>
            </ul>
        </div>
        <div class="text-align-right text-align-left-xs col-xs-12 col-md-8">
            <button id="menu_save" class="btn btn-sky shiny">Lưu</button>
        </div>
    </div>
    <!-- /Page Breadcrumb -->
    <!-- Page Body -->
    <div class="page-body">
        <div class="row">
            <div class="col-lg-5 col-sm-5 col-xs-12">
                <div class="widget">
                    <div class="widget-header">
                        <span class="widget-caption">Nhóm Menu</span>
                    </div>

                    <div class="widget-body">
                        <?=@$_SESSION["validator"][$inpname]?>
                        <form id="form_group_menu" name="myForm">
                            <div class="form-group">
                                <label for="group_menu_id" class="control-label">Nhóm Menu</label>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-7 col-md-7">
                                        <select name="group_menu_id" id="group_menu_id" class="form-control">
                                            <?php foreach ($list_group_menu as $group_menu): ?>
                                                <option <?= $group_menu['Id'] == $group_menu_id ? 'selected' : '' ?>
                                                        value="<?= $group_menu['Id'] ?>"><?= $group_menu['title'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-sm-5 col-md-5">
                                        <button type="submit" class="btn btn-info">Chọn</button>
                                        <button id="btn-toggle-form-add" onclick="$(this).toggle()"
                                                data-toggle="collapse" data-target="#form-add-group-menu" aria-expanded="false" aria-controls="form-add-group-menu"
                                                type="button" class="btn btn-info">Thêm</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <form id="form-add-group-menu" action="" method="post" class="collapse">
                            <hr>
                            <div class="form-group">
                                <label for="group_menu_title">Tên Menu</label>
                                <div>
                                    <input required type="text" name="group_menu_title" id="group_menu_title" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div>
                                    <button name="act" value="save" class="btn btn-success"><i
                                                class="fa fa-plus"></i> Thêm
                                    </button>
                                    <button type="button" onclick="$('#btn-toggle-form-add').toggle()" class="btn"
                                            data-toggle="collapse" data-target="#form-add-group-menu" aria-expanded="false" aria-controls="form-add-group-menu">
                                        Ẩn
                                    </button>
                                </div>
                            </div>
                            <input type="hidden" name="hidden" value="groupmenu.add"/>
                        </form>
                    </div>
                </div>

                <div class="widget">
                    <div class="widget-header">
                        <span class="widget-caption">Liên Kết</span>
                    </div>

                    <div class="widget-body">
                        <div class="panel-group accordion" id="accordions">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse"
                                           data-parent="#accordions" href="#collapsePages">
                                            Trang
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapsePages" class="panel-collapse collapse in">
                                    <div class="panel-body border-gold">
                                        <!--<div class="form-group">
                                            <label for="menu_pages_title">Tiêu Đề</label>
                                            <div>
                                                <input type="text" id="menu_pages_title" class="form-control">
                                            </div>
                                        </div>-->
                                        <div class="form-group">
                                            <label for="menu_pages_link">Liên Kết</label>
                                            <div>
                                                <select id="menu_pages_link" class="form-control">
                                                    <option value="/">Trang Chủ</option>
                                                    <option value="/collection">Danh Mục Sản Phẩm</option>
                                                    <option value="/product">Sản Phẩm</option>
                                                    <option value="/blog">Danh Mục Tin Tức</option>
                                                    <option value="/article">Tin Tức</option>
                                                    <option value="/contact">Liên Hệ</option>
                                                    <option value="/search">Tìm Kiếm</option>
                                                    <option value="/cart">Giỏ Hàng</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <button onclick="addMenuPages()" type="button" class="btn btn-success">
                                                    <i
                                                            class="fa fa-plus"></i> Thêm
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle collapsed" data-toggle="collapse"
                                           data-parent="#accordions" href="#collapseCategoryArticle">
                                            Danh Mục Tin Tức
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseCategoryArticle" class="panel-collapse collapse">
                                    <div class="panel-body border-gold">
                                        <div class="panel-body border-gold">
                                            <div class="form-group">
                                                <label for="menu_category_article_link">Liên Kết</label>
                                                <div class="row">
                                                    <select id="menu_category_article_link"
                                                            class="col-sm-12 select-box-2">
                                                        <?php foreach ($list_category_article as $cat_art): ?>
                                                            <option data-title="<?= $cat_art['tieude'] ?>"
                                                                    value="<?= '/blog/' . $cat_art['alias'] . '-' . $cat_art['danhmuc_id'] ?>"><?= $cat_art['level'] . $cat_art['tieude'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    <button onclick="addMenuCategoryArticle()" type="button"
                                                            class="btn btn-success"><i
                                                                class="fa fa-plus"></i> Thêm
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle collapsed" data-toggle="collapse"
                                           data-parent="#accordions" href="#collapseCategoryProduct">
                                            Danh Mục Sản Phẩm
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseCategoryProduct" class="panel-collapse collapse">
                                    <div class="panel-body border-gold">
                                        <div class="form-group">
                                            <label for="menu_category_product_link">Liên Kết</label>
                                            <div class="row">
                                                <select id="menu_category_product_link" class="col-sm-12 select-box-2">
                                                    <?php foreach ($list_category_product as $cat_pro): ?>
                                                        <option data-title="<?= $cat_pro['tieude'] ?>"
                                                                value="<?= '/collection/' . $cat_pro['alias'] . '-' . $cat_pro['danhmuc_id'] ?>"><?= $cat_art['level'] . $cat_pro['tieude'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <button onclick="addMenuCategoryProduct()" type="button"
                                                        class="btn btn-success"><i
                                                            class="fa fa-plus"></i> Thêm
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle collapsed" data-toggle="collapse"
                                           data-parent="#accordions" href="#collapseProduct">
                                            Sản Phẩm
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseProduct" class="panel-collapse collapse">
                                    <div class="panel-body border-gold">
                                        <div class="form-group">
                                            <label for="menu_product_link">Liên Kết</label>
                                            <div class="row">
                                                <select id="menu_product_link" class="col-sm-12 select-box-2">
                                                    <?php foreach ($list_product as $product): ?>
                                                        <option value="<?= '/product/' . $product['alias'] . '-' . $product['Id'] ?>"><?= $product['tensanpham'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <button onclick="addMenuProduct()" type="button"
                                                        class="btn btn-success"><i
                                                            class="fa fa-plus"></i> Thêm
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle collapsed" data-toggle="collapse"
                                           data-parent="#accordions" href="#collapseArticle">
                                            Tin Tức
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseArticle" class="panel-collapse collapse">
                                    <div class="panel-body border-gold">
                                        <div class="form-group">
                                            <label for="menu_article_link">Liên Kết</label>
                                            <div class="row">
                                                <select id="menu_article_link" class="col-sm-12 select-box-2">
                                                    <?php foreach ($list_article as $article): ?>
                                                        <option value="<?= '/article/' . $article['alias'] . '-' . $article['Id'] ?>"><?= $article['tieude'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <button onclick="addMenuArticle()" type="button"
                                                        class="btn btn-success"><i
                                                            class="fa fa-plus"></i> Thêm
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordions"
                                           href="#collapseOption">
                                            Tuỳ Chỉnh
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOption" class="panel-collapse collapse">
                                    <div class="panel-body border-red">
                                        <div class="form-group">
                                            <label for="menu_option_title">Tiêu Đề</label>
                                            <div>
                                                <input type="text" id="menu_option_title" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="menu_option_link">Liên Kết</label>
                                            <div>
                                                <input type="text" id="menu_option_link" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <button onclick="addMenuOption()" type="button" class="btn btn-success">
                                                    <i
                                                            class="fa fa-plus"></i> Thêm
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-sm-7 col-xs-12">
                <div class="widget">
                    <div class="widget-header">
                        <span class="widget-caption">Menu</span>

                        <div class="widget-buttons">
                            <a href="#" data-toggle="maximize">
                                <i class="fa fa-expand"></i>
                            </a>
                        </div>
                    </div>

                    <div class="widget-body">
                        <form id="validateSubmitForm" name="myForm" method="post">
                            <div class="dd shadowed">
                                <ol class="dd-list">
                                    <?php $menu_process->recursiveMenu($menu_tree); ?>
                                </ol>
                            </div>
                            <input type="hidden" name="hidden" value="menu.view"/>
                            <input type="hidden" id="serialize_menu" name="serialize_menu" value="[]"/>
                            <input type="hidden" name="act" id="act"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /Page Body -->
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalEditLink" id="modal-edit-link"
         aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel">Liên Kết</h4>
                </div>
                <div class="modal-body">
                    <div class="panel-group accordion" id="accordions2" style="border-top-width: 1px !important;">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse"
                                       data-parent="#accordions2" href="#collapseEditPages">
                                        Trang
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseEditPages" class="panel-collapse collapse in">
                                <div class="panel-body border-gold">
                                    <div class="form-group">
                                        <label for="edit_menu_pages_link">Liên Kết</label>
                                        <div>
                                            <select id="edit_menu_pages_link" class="form-control">
                                                <option value="/">Trang Chủ</option>
                                                <option value="/collection">Danh Mục Sản Phẩm</option>
                                                <option value="/product">Sản Phẩm</option>
                                                <option value="/blog">Danh Mục Tin Tức</option>
                                                <option value="/article">Tin Tức</option>
                                                <option value="/contact">Liên Hệ</option>
                                                <option value="/search">Tìm Kiếm</option>
                                                <option value="/cart">Giỏ Hàng</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <button onclick="editMenuPages()" type="button" class="btn btn-success"
                                                    data-dismiss="modal"><i
                                                        class="fa fa-save"></i> Lưu
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse"
                                       data-parent="#accordions2" href="#collapseEditCategoryArticle">
                                        Danh Mục Tin Tức
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseEditCategoryArticle" class="panel-collapse collapse">
                                <div class="panel-body border-gold">
                                    <div class="panel-body border-gold">
                                        <div class="form-group">
                                            <label for="edit_menu_category_article_link">Liên Kết</label>
                                            <div class="row">
                                                <select id="edit_menu_category_article_link"
                                                        class="col-sm-12 select-box-2">
                                                    <?php foreach ($list_category_article as $cat_art): ?>
                                                        <option data-title="<?= $cat_art['tieude'] ?>"
                                                                value="<?= '/blog/' . $cat_art['alias'] . '-' . $cat_art['danhmuc_id'] ?>"><?= $cat_art['level'] . $cat_art['tieude'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <button onclick="editMenuCategoryArticle()" type="button"
                                                        class="btn btn-success" data-dismiss="modal"><i
                                                            class="fa fa-save"></i> Lưu
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse"
                                       data-parent="#accordions2" href="#collapseEditCategoryProduct">
                                        Danh Mục Sản Phẩm
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseEditCategoryProduct" class="panel-collapse collapse">
                                <div class="panel-body border-gold">
                                    <div class="form-group">
                                        <label for="edit_menu_category_product_link">Liên Kết</label>
                                        <div class="row">
                                            <select id="edit_menu_category_product_link" class="col-sm-12 select-box-2">
                                                <?php foreach ($list_category_product as $cat_pro): ?>
                                                    <option data-title="<?= $cat_pro['tieude'] ?>"
                                                            value="<?= '/collection/' . $cat_pro['alias'] . '-' . $cat_pro['danhmuc_id'] ?>"><?= $cat_art['level'] . $cat_pro['tieude'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <button onclick="editMenuCategoryProduct()" type="button"
                                                    class="btn btn-success" data-dismiss="modal"><i
                                                        class="fa fa-save"></i> Lưu
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse"
                                       data-parent="#accordions2" href="#collapseEditProduct">
                                        Sản Phẩm
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseEditProduct" class="panel-collapse collapse">
                                <div class="panel-body border-gold">
                                    <div class="form-group">
                                        <label for="edit_menu_product_link">Liên Kết</label>
                                        <div class="row">
                                            <select id="edit_menu_product_link" class="col-sm-12 select-box-2">
                                                <?php foreach ($list_product as $product): ?>
                                                    <option value="<?= '/product/' . $product['alias'] . '-' . $product['Id'] ?>"><?= $product['tensanpham'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <button onclick="editMenuProduct()" type="button" class="btn btn-success"
                                                    data-dismiss="modal"><i
                                                        class="fa fa-save"></i> Lưu
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse"
                                       data-parent="#accordions2" href="#collapseEditArticle">
                                        Tin Tức
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseEditArticle" class="panel-collapse collapse">
                                <div class="panel-body border-gold">
                                    <div class="form-group">
                                        <label for="edit_menu_article_link">Liên Kết</label>
                                        <div class="row">
                                            <select id="edit_menu_article_link" class="col-sm-12 select-box-2">
                                                <?php foreach ($list_article as $article): ?>
                                                    <option value="<?= '/article/' . $article['alias'] . '-' . $article['Id'] ?>"><?= $article['tieude'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <button onclick="editMenuArticle()" type="button" class="btn btn-success"
                                                    data-dismiss="modal"><i
                                                        class="fa fa-save"></i> Lưu
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordions2"
                                       href="#collapseEditOption">
                                        Tuỳ Chỉnh
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseEditOption" class="panel-collapse collapse">
                                <div class="panel-body border-red">
                                    <div class="form-group">
                                        <label for="edit_menu_option_title">Tiêu Đề</label>
                                        <div>
                                            <input type="text" id="edit_menu_option_title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_menu_option_link">Liên Kết</label>
                                        <div>
                                            <input type="text" id="edit_menu_option_link" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <button onclick="editMenuOption()" type="button" class="btn btn-success"
                                                    data-dismiss="modal">
                                                <i class="fa fa-save"></i> Lưu
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-default" onclick="$('#modal-edit-link').modal('hide')">Huỷ</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

</div>

<script src="<?= $conf['template_admin']; ?>/assets/js/nestable2/jquery.nestable.min.js"></script>
<link rel="stylesheet" href="<?= $conf['template_admin']; ?>/assets/js/nestable2/jquery.nestable.min.js">
<script src="<?= $conf['template_admin']; ?>/assets/js/select2/select2.min.js"></script>

<style>
    .dd-list .widget {
        margin: 0;
    }

    .dd-list .widget .widget-buttons {
        line-height: initial;
        height: auto;
    }

    .dd-list .widget .widget-header > .widget-caption {
        line-height: initial;
    }

    .dd-list .widget .widget-header {
        min-height: auto;
        border-bottom: none;
    }

    .dd-list .widget .widget-header .widget-buttons .fa-plus.fa-pencil:before {
        content: "\f040" !important;
    }
</style>
<script type="text/javascript">
    var GROUP_MENU_ID = '<?= $group_menu_id ?>',
        current_menu_edit = '';
    $(function ($) {
        $('.dd').nestable({
            maxDepth: 10
        });
        $('.dd-handle a').on('mousedown', function (e) {
            e.stopPropagation();
        });
        $('#menu_save').click(function (e) {
            e.preventDefault();
            $('#serialize_menu').val(JSON.stringify($('.dd').nestable('serialize')));
            $('#validateSubmitForm').submit();
        });
        $('body').on('click', 'a[data-remove]', function (e) {
            e.preventDefault();
            removeMenu(this);
        });

        $('body').on('change', '.menu_activated', function () {
            $(this).parents('li.dd-item:first').data('activated', Number($(this).prop('checked')));
        });
        $('body').on('change', '.menu_target', function () {
            $(this).parents('li.dd-item:first').data('target', $(this).val());
        });
        $('body').on('keyup', '.menu_title', function () {
            $(this).parents('.widget:first').find('span.widget-caption').text($(this).val()).parents('li.dd-item:first').data('title', $(this).val());
        });
        $('.select-box-2').select2();

    });

    /*
    * Thêm Menu
    * */
    function addMenuCategoryProduct() {
        var elem_title = $('select#menu_category_product_link option:selected');
        var elem_link = $('#menu_category_product_link');
        var title = $(elem_title).data('title') !== '' ? $(elem_title).data('title') : 'Mới';
        var link = $(elem_link).val() !== '' ? $(elem_link).val() : '/';
        var data = {
            id: '-1',
            title: title,
            group: GROUP_MENU_ID,
            action: 'add',
            activated: 1,
            target: '_self',
            link: link
        };
        addMenu(data);
    }

    function addMenuCategoryArticle() {
        var elem_title = $('select#menu_category_article_link option:selected');
        var elem_link = $('#menu_category_article_link');
        var title = $(elem_title).data('title') !== '' ? $(elem_title).data('title') : 'Mới';
        var link = $(elem_link).val() !== '' ? $(elem_link).val() : '/';
        var data = {
            id: '-1',
            title: title,
            group: GROUP_MENU_ID,
            action: 'add',
            activated: 1,
            target: '_self',
            link: link
        };
        addMenu(data);
    }

    function addMenuProduct() {
        var elem_title = $('select#menu_product_link option:selected');
        var elem_link = $('#menu_product_link');
        var title = $(elem_title).text() !== '' ? $(elem_title).text() : 'Mới';
        var link = $(elem_link).val() !== '' ? $(elem_link).val() : '/';
        var data = {
            id: '-1',
            title: title,
            group: GROUP_MENU_ID,
            action: 'add',
            activated: 1,
            target: '_self',
            link: link
        };
        addMenu(data);
    }

    function addMenuArticle() {
        var elem_title = $('select#menu_article_link option:selected');
        var elem_link = $('#menu_article_link');
        var title = $(elem_title).text() !== '' ? $(elem_title).text() : 'Mới';
        var link = $(elem_link).val() !== '' ? $(elem_link).val() : '/';
        var data = {
            id: '-1',
            title: title,
            group: GROUP_MENU_ID,
            action: 'add',
            activated: 1,
            target: '_self',
            link: link
        };
        addMenu(data);
    }

    function addMenuPages() {
        var elem_title = $('select#menu_pages_link option:selected');
        var elem_link = $('#menu_pages_link');
        var title = $(elem_title).text() !== '' ? $(elem_title).text() : 'Mới';
        var link = $(elem_link).val() !== '' ? $(elem_link).val() : '/';
        var data = {
            id: '-1',
            title: title,
            group: GROUP_MENU_ID,
            action: 'add',
            activated: 1,
            target: '_self',
            link: link
        };
        addMenu(data);
    }

    function addMenuOption() {
        var elem_title = $('#menu_option_title');
        var elem_link = $('#menu_option_link');
        var title = $(elem_title).val() !== '' ? $(elem_title).val() : 'Mới';
        var link = $(elem_link).val() !== '' ? $(elem_link).val() : '/';
        var data = {
            id: '-1',
            title: title,
            group: GROUP_MENU_ID,
            action: 'add',
            activated: 1,
            target: '_self',
            link: link
        };
        addMenu(data);
    }

    function addMenu(data) {
        var item = $('#template-item-menu').html();
        item = $(item).appendTo('.dd-list:first').data(data);
        $(item).find('input.menu_title').val(data.title);
        $(item).find('input.menu_link').val(data.link);
        $(item).find('span.widget-caption').text(data.title);
    }

    /*
    * Sửa Menu
    * */
    function editMenuCategoryProduct() {
        var elem_title = $('select#edit_menu_category_product_link option:selected');
        var elem_link = $('#edit_menu_category_product_link');
        var title = $(elem_title).data('title') !== '' ? $(elem_title).data('title') : 'Mới';
        var link = $(elem_link).val() !== '' ? $(elem_link).val() : '/';
        var data = {
            title: title,
            link: link
        };
        editMenuItem(data);
    }

    function editMenuCategoryArticle() {
        var elem_title = $('select#edit_menu_category_article_link option:selected');
        var elem_link = $('#edit_menu_category_article_link');
        var title = $(elem_title).data('title') !== '' ? $(elem_title).data('title') : 'Mới';
        var link = $(elem_link).val() !== '' ? $(elem_link).val() : '/';
        var data = {
            title: title,
            link: link
        };
        editMenuItem(data);
    }

    function editMenuProduct() {
        var elem_title = $('select#edit_menu_product_link option:selected');
        var elem_link = $('#edit_menu_product_link');
        var title = $(elem_title).text() !== '' ? $(elem_title).text() : 'Mới';
        var link = $(elem_link).val() !== '' ? $(elem_link).val() : '/';
        var data = {
            title: title,
            link: link
        };
        editMenuItem(data);
    }

    function editMenuArticle() {
        var elem_title = $('select#edit_menu_article_link option:selected');
        var elem_link = $('#edit_menu_article_link');
        var title = $(elem_title).text() !== '' ? $(elem_title).text() : 'Mới';
        var link = $(elem_link).val() !== '' ? $(elem_link).val() : '/';
        var data = {
            title: title,
            link: link
        };
        editMenuItem(data);
    }

    function editMenuPages() {
        var elem_title = $('select#edit_menu_pages_link option:selected');
        var elem_link = $('#edit_menu_pages_link');
        var title = $(elem_title).text() !== '' ? $(elem_title).text() : 'Mới';
        var link = $(elem_link).val() !== '' ? $(elem_link).val() : '/';
        var data = {
            title: title,
            link: link
        };
        editMenuItem(data);
    }

    function editMenuOption() {
        var elem_title = $('#edit_menu_option_title');
        var elem_link = $('#edit_menu_option_link');
        var title = $(elem_title).val() !== '' ? $(elem_title).val() : 'Mới';
        var link = $(elem_link).val() !== '' ? $(elem_link).val() : '/';
        var data = {
            title: title,
            link: link
        };
        editMenuItem(data);
    }

    function editMenuItem(data) {
        var item = $(current_menu_edit).parents('.dd-item:first').data(data).addClass('bordered-danger');
        console.log(item, data);
        $(item).find('input.menu_title').val(data.title);
        $(item).find('input.menu_link').val(data.link);
        $(item).find('span.widget-caption').text(data.title);
    }

    /*
    * Xoá Menu
    * */
    function removeMenu(that) {
        var item = that;
        bootbox.confirm("Bạn chắc chắn muốn xoá", function (result) {
            if (result) {
                $(item).parents('li.dd-item:first').data('action', 'delete').hide();
            }
        });
    }
</script>

<script id="template-item-menu" type="text/template">
    <li class="dd-item bordered-palegreen" data-id="">
        <div class="widget collapsed">
            <div class="dd-handle widget-header">
                <span class="widget-caption"></span>
                <div class="widget-buttons dd-nodrag">
                    <a href="#" data-toggle="collapse">
                        <i class="fa fa-pencil blue "></i>
                    </a>
                    <a href="#" data-remove="">
                        <i class="fa fa-trash-o  danger "></i>
                    </a>
                </div>
            </div>
            <div class="widget-body" style="margin-top: -5px">
                <div class="form-group">
                    <label for="">Tiêu đề trang <i
                                class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip"
                                data-placement="right"
                                data-original-title="Tiêu đề menu"></i></label>
                    <div>
                        <input name="" type="text" id=""
                               class="form-control menu_title" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Liên Kết <i
                                class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip"
                                data-placement="right"
                                data-original-title="liên kết của menu"></i></label>
                    <div class="row">
                        <div class="col-xs-8 col-sm-10 col-md-10">
                            <input readonly name="" type="text" id=""
                                   class="form-control menu_link" value="">
                        </div>
                        <div class="col-xs-4 col-sm-1 col-md-1">
                            <button onclick="current_menu_edit=this" type="button" class="btn btn-default"
                                    data-toggle="modal" data-target="#modal-edit-link">Sửa
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="">Kiểu Menu <i
                                        class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip"
                                        data-placement="right"
                                        data-original-title="Tiêu đề menu"></i></label>
                            <div>
                                <select name="" id="" class="form-control menu_target">
                                    <?php foreach ($menu_process->target as $_target): ?>
                                        <option value="<?= $_target ?>"><?= $_target ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="">Hiển thị <i
                                        class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip"
                                        data-placement="top"
                                        data-original-title="Lựa chọn để menu hiển thị trên website"></i></label>
                            <div class="margin-top-5">
                                <label>
                                    <input checked name="" value="1" class="checkbox-slider colored-blue menu_activated"
                                           type="checkbox">
                                    <span class="text"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </li>
</script>

<?php unset($_SESSION["validator"]) ?>