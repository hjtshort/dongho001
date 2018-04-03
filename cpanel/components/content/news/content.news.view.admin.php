<?php defined('_VALID_MOS') or die(include("404.php"));
$news_process = new news_process();

/* xu ly link cho tim kiem va phan trang */
$self_link = $_GET["params"] . ".html?";

/* xu ly gia tri dau vao cho chuc nang tim kiem */
@$search_value = explode("|", @$_GET["search"]);

/* nhung file xu ly phan trang */
include_once('../include/paging.php');
/* lay tong so mau tin trong bang */
$tongsodong = $news_process->get_news_count(@$search_value);
/* so mau tin mac dinh tren trang */

/* phan trang */
if (!isset($_GET["page"])) $tranghientai = 1; else $tranghientai = intval($_GET["page"]);
if (!isset($_GET["record"])) $somautin = 10; else $somautin = intval($_GET["record"]);
@$pager = Pager::getPagerData($tongsodong, $somautin, $tranghientai, $self_link);

$chucnang_id_ql = 2; // Quản lý thông tin người dùng
$chucnang_id_them = 3; // thêm thông tin người dùng
$chucnang_id_sua = 4; // sữa thông tin người dùng
$chucnang_id_xoa = 5; // xoá thông tin người dùng
$chucnang_list = $_SESSION["wti"]["chucnang"];

?>


<link href="<?= $conf['template_admin']; ?>/assets/css/dataTables.bootstrap.css" rel="stylesheet"/>


<div class="page-content">
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs breadcrumbs-fixed">
        <div class="buttons-task col-xs-12 col-md-4">
            <ul class="breadcrumb breadcrumbs-fixed">
                <li><i class="fa fa-table"></i></li>
                <li class="toast-title">Quản lý tin tức</li>
            </ul>
        </div>
        <div class="text-align-right text-align-left-xs col-xs-12 col-md-8">
            <a href="content/news/add.html" class="btn btn-sky shiny">Thêm tin tức</a>
        </div>
    </div>
    <!-- /Page Breadcrumb -->
    <!-- Page Body -->
    <div class="page-body">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="widget">
                    <div class="widget-header with-footer">
                        <span class="widget-caption">Danh sách tin tức</span>
                        <div class="widget-buttons">
                            <a href="#" data-toggle="maximize">
                                <i class="fa fa-expand"></i>
                            </a>
                            <a href="#" data-toggle="collapse">
                                <i class="fa fa-minus"></i>
                            </a>
                            <a href="#" data-toggle="dispose">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="widget-body">
                        <div class="flip-scroll">
                            <form id="validateSubmitForm" name="myForm" method="post">
                                <div id="simpledatatable_wrapper">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6 text-align-right">
                                            <div id="simpledatatable_filter" class="dataTables_filter">
                                                <label>
                                                    <input name="search" type="search" class="form-control input-sm" placeholder=""
                                                           aria-controls="simpledatatable">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6 text-align-right">
                                            <div class="btn-group">
                                                <a class="btn btn-default">Chọn thao tác</a>
                                                <a class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                                ><i class="fa fa-angle-down"></i></a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="btn_submit" data-action="delete-all">Xóa tất cả tin
                                                            tức đã chọn</a>
                                                    </li>
                                                    <li>
                                                        <a class="btn_submit" data-action="lock-all">Ẩn tất cả tin tức
                                                            đã chọn</a>
                                                    </li>
                                                    <li>
                                                        <a class="btn_submit" data-action="unlock-all">Hiện tất cả tin
                                                            tức đã chọn</a>
                                                    </li>
                                                    <li>
                                                        <a class="btn_submit" data-action="sort">Cập nhật thứ tự</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>


                                    <table class="table table-hover table-bordered table-striped table-condensed flip-content">
                                        <thead class="flip-content bordered-palegreen">
                                        <tr>
                                            <th style="width: 1%;" class="center">#</th>
                                            <th style="width: 1%;" class="uniformjs">
                                                <label>
                                                    <input type="checkbox">
                                                    <span class="text"></span>
                                                </label>
                                            </th>
                                            <th>Tiêu đề</th>
                                            <th class="center" style="width: 20%;">Danh mục tin</th>
                                            <th class="center" style="width: 10%;">Ngày đăng</th>
                                            <th class="center" style="width: 10%;">Trạng thái</th>
                                            <th style="width: 10%;" class="center">Thứ tự</th>
                                            <th style="width: 7%;" class="center">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        /* goi ham truy van du lieu dua tren cac gia tri tim kiem */
                                        $result = $news_process->get_news_view(@$search_value, intval($pager->offset), intval($pager->limit));
                                        while ($row = $result->fetch()): @$i++; ?>

                                            <tr class="selectable">
                                                <td class="center"><?= $i; ?></td>
                                                <td class="center uniformjs">
                                                    <label>
                                                        <input class="chkItem" name="chkItem[]"
                                                               id="chkItem_<?= $row["Id"]; ?>" type="checkbox"
                                                               value="<?= $row["Id"]; ?>">
                                                        <span class="text"></span>
                                                    </label>

                                                </td>
                                                <td>
                                                    <a href="content/news/edit/<?= $row["Id"]; ?>.html"><?= $row["tieude"]; ?></a>
                                                </td>
                                                <td><?= $row["danhmuctieude"]; ?></td>
                                                <td class="center"><?= date("d/m/Y", $row["ngaythem"]); ?></td>
                                                <td class="center"><?= $row["hienthi"]?"<strong>Hiện</strong>":"Ẩn" ?></td>
                                                <td class="center">
                                                    <input name="newsId[]" id="newsId<?= $row["Id"]; ?>" type="hidden"
                                                           value="<?= $row["Id"]; ?>">
                                                    <input type="text"
                                                           style="width: 50px; margin-bottom:0px;text-align:center;"
                                                           value="<?= $row["thutu"]; ?>" name="sort[]">
                                                </td>
                                                <td class="center">
                                                    <div class="btn-group">
                                                        <button type="button"
                                                                class="btn btn-default dropdown-toggle  btn-circle btn-xs "
                                                                data-toggle="dropdown">
                                                            <i class="glyphicon glyphicon-list"></i>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="btn_submit" title="sao chép tin tức"
                                                                   data-action="copy"
                                                                   data-id="<?= $row["Id"]; ?>"
                                                                   data-link="content/news/copy/<?= $row["Id"]; ?>.html">Sao
                                                                    Chép</a>
                                                            </li>
                                                            <?php if ($func->_checkIdinArray($chucnang_id_sua, $chucnang_list)): ?>
                                                                <li>
                                                                    <a class="btn_submit" title="Sữa tin tức"
                                                                       data-action="edit"
                                                                       data-id="<?= $row["Id"]; ?>"
                                                                       data-link="content/news/edit/<?= $row["Id"]; ?>.html">Sửa</a>
                                                                </li>
                                                            <?php endif; ?>

                                                            <?php if ($func->_checkIdinArray($chucnang_id_xoa, $chucnang_list)): ?>
                                                                <li>
                                                                    <a class="btn_submit" title="Xoá tin tức"
                                                                       data-action="delete"
                                                                       data-id="<?= $row["Id"]; ?>">Xoá</a>
                                                                </li>
                                                            <?php endif; ?>

                                                            <?php if ($func->_checkIdinArray($chucnang_id_ql, $chucnang_list)): ?>
                                                                <li>
                                                                    <?php if ($row["hienthi"]): ?>
                                                                        <a class="btn_submit" title="Ẩn"
                                                                           data-action="lock"
                                                                           data-id="<?= $row["Id"]; ?>">Ẩn</a>
                                                                    <?php else: ?>
                                                                        <a class="btn_submit" title="Hiện"
                                                                           data-action="unlock"
                                                                           data-id="<?= $row["Id"]; ?>">Hiện</a>
                                                                    <?php endif; ?>
                                                                </li>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                    <div class="row DTTTFooter">
                                        <div class="col-sm-4">
                                            <div class="dataTables_info" id="simpledatatable_info" role="status"
                                                 aria-live="polite">Hiển thị <?= $pager->somautin ?> trong tổng
                                                số <?= $pager->tongsodong ?> mẫu tin
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div id="simpledatatable_paginate">
                                                <ul class="pagination">
                                                    <?= $pager->paging; ?>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="text-align-right" id="simpledatatable_length">
                                                <select onchange="javascript:location.href = '<?= $self_link; ?>record='+this.value;"
                                                        name="from" name="simpledatatable_length"
                                                        aria-controls="simpledatatable"
                                                        class="form-control input-sm">
                                                    <?php
                                                    $record_option = array(
                                                        array("10", "10 Bản ghi / trang"),
                                                        array("20", "20 Bản ghi / trang"),
                                                        array("30", "30 Bản ghi / trang"),
                                                        array("50", "50 Bản ghi / trang"),
                                                        array("100", "100 Bản ghi / trang"),
                                                        array("99999999999", "Tất cả Bản ghi / trang")
                                                    );
                                                    for ($i = 0; $i < count($record_option); $i++): ?>
                                                        <option
                                                            <?= ($record_option[$i][0] == $somautin)?"selected":''?>
                                                                value="<?= $record_option[$i][0]; ?>"><?= $record_option[$i][1]; ?>
                                                        </option>
                                                    <?php endfor; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="hidden" value="news.view"/>
                                <input type="hidden" name="act" id="act"/>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Body -->
</div>

<script language="javascript">
    superweb.utility.toolbar();
</script>
