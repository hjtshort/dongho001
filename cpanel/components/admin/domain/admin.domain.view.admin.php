<?php defined( '_VALID_MOS' ) or die( include("404.php") );

	$myprocess = new process();		
	
	/* nhung file xu ly phan trang */
	include_once('../include/paging.php');

	/* so mau tin mac dinh tren trang */
	
	/* xu ly link cho tim kiem va phan trang */
	$self_link = $_GET["params"] . ".html?";
	if(isset($_GET["search"])) { $self_link .= "search=" . $_GET["search"] . "&"; }
	if(isset($_GET["record"])) { $self_link .= "record=" . $_GET["record"] . "&"; }
	
	/* xu ly gia tri dau vao cho chuc nang tim kiem */	
	@$search_value = explode("|", @$_GET["search"]);
	$domain = "%%";
    if(!empty($search_value[2]) && $search_value[3] == "domain"){
    $domain = "%" . $search_value[2] . "%";
    }
    /* lay tong so mau tin trong bang */
    $tongsodong = $myprocess->get_domain_list_count($domain);
	/* phan trang */
	$tranghientai   = isset($_GET["page"])  ?intval($_GET["page"]):1;
	$somautin       = isset($_GET["record"])?intval($_GET["record"]):10;
	@$pager         = Pager::getPagerData( $tongsodong, $somautin, $tranghientai, $self_link );

    /* goi ham truy van du lieu dua tren cac gia tri tim kiem */
	$result = $myprocess->get_domain_list(intval($pager->offset), intval($pager->limit),$domain);

	
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
                <li class="toast-title">Quản lý domain</li>
            </ul>
        </div>

    </div>
    <!-- /Page Breadcrumb -->
    <!-- Page Body -->
    <div class="page-body">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="widget">
                    <div class="widget-header with-footer">
                        <span class="widget-caption">Danh sách doamin</span>
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
                                            <th>Domain</th>

                                            <th class="center" style="width: 10%;">Trạng thái</th>

                                            <th style="width: 7%;" class="center">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        while ($row = $result->fetch()): @$stt++; ?>

                                            <tr class="selectable">
                                                <td class="center"><?= $stt; ?></td>
                                                <td class="center uniformjs">
                                                    <label>
                                                        <input class="chkItem" name="chkItem[]"
                                                               id="chkItem_<?= $row["id"]; ?>" type="checkbox"
                                                               value="<?= $row["id"]; ?>">
                                                        <span class="text"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <a href="admin/domain/edit/<?= $row["id"]; ?>.html"><?= $row["domain"]; ?></a>
                                                </td>
                                                <td class="center"><?= $row["hienthi"]?"<strong>Hiện</strong>":"Ẩn" ?></td>

                                                <td class="center">
                                                    <div class="btn-group">
                                                        <button type="button"
                                                                class="btn btn-default dropdown-toggle  btn-circle btn-xs "
                                                                data-toggle="dropdown">
                                                            <i class="glyphicon glyphicon-list"></i>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <?php if ($func->_checkIdinArray($chucnang_id_sua, $chucnang_list)): ?>
                                                                <li>
                                                                    <a class="btn_submit" title="Sữa tin tức"
                                                                       data-action="edit"
                                                                       data-id="<?= $row["Id"]; ?>"
                                                                       data-link="admin/domain/edit/<?= $row["Id"]; ?>.html">Sửa</a>
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

                                <input type="hidden" name="hidden" value="domain.view"/>
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


