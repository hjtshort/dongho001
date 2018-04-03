<?php defined( '_VALID_MOS' ) or die( include("404.php") );
	$category_process = new category_process();
?>
<link href="<?= $conf['template_admin']; ?>/assets/css/dataTables.bootstrap.css" rel="stylesheet"/>
<div class="page-content">
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs breadcrumbs-fixed">
        <div class="buttons-task col-xs-12 col-md-4">
            <ul class="breadcrumb breadcrumbs-fixed">
                <li><i class="fa fa-table"></i></li>
                <li class="toast-title">Quản lý Danh mục</li>
            </ul>
        </div>
        <div class="text-align-right text-align-left-xs col-xs-12 col-md-8">
            <a href="content/category/add.html" class="btn btn-sky shiny">Thêm Danh mục</a>
        </div>
    </div>
    <!-- /Page Breadcrumb -->
    <!-- Page Body -->
    <div class="page-body">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="widget">
                    <div class="widget-header with-footer">
                        <span class="widget-caption">Danh sách Danh mục</span>
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
                                                        <a class="btn_submit" data-action="lock-all">Ẩn tất cả Danh mục
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
                                            <th style="width: 4%;" class="center">#</th>
                                            <th style="width: 1%;" class="uniformjs">
                                                <label>
                                                    <input type="checkbox">
                                                    <span class="text"></span>
                                                </label>
                                            </th>
                                            <th>Danh mục tin</th>
                                            <th style="width: 30%;">Mô tả</th>
                                            <th style="width: 10%;" class="center">Trạng thái</th>
                                            <th style="width: 10%;" class="center">Thứ tự</th>
                                            <th class="center" style="width: 10%;">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $result = $category_process->get_category_view();
                                        $table_row = $result->fetchAll();

                                        $category = array();
                                        $category_process->category($table_row, $category);

                                        foreach($category as $key => $row): @$i++;?>
                                            <tr class="selectable">
                                                <td class="center"><?= @$i; ?></td>
                                                <td class="center uniformjs">
                                                    <label>
                                                        <input class="chkItem" name="chkItem[]"
                                                               id="chkItem_<?= $row["danhmuc_id"]; ?>" type="checkbox"
                                                               value="<?= $row["danhmuc_id"]; ?>">
                                                        <span class="text"></span>
                                                    </label>

                                                </td>
                                                <td><a href="content/category/edit/<?= $row["danhmuc_id"]; ?>.html"><?= $row["level"] , $row["tieude"]; ?></a></td>
                                                <td><?= $row["tomtat"]; ?></td>
                                                <td class="center"><?= $row["hienthi"]?"<strong>Hiện</strong>":"Ẩn"; ?></td>
                                                <td class="center">
                                                    <input name="chkItem_sort[]" id="chkItem_sort_<?= $row["danhmuc_id"]; ?>" type="hidden" value="<?= $row["danhmuc_id"]; ?>">
                                                    <input type="text" style="width: 50px; margin-bottom:0;text-align:center;" value="<?= $row["thutu"]; ?>" name="sort[]">
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
                                                                <a class="btn_submit" title="sao chép Danh mục"
                                                                   data-action="copy"
                                                                   data-id="<?= $row["danhmuc_id"]; ?>"
                                                                   data-link="content/category/copy/<?= $row["danhmuc_id"]; ?>.html">Sao
                                                                    Chép</a>
                                                            </li>
                                                            <?php if ($func->_checkIdinArray($chucnang_id_sua, $chucnang_list)): ?>
                                                                <li>
                                                                    <a class="btn_submit" title="Sửa"
                                                                       data-action="edit"
                                                                       data-id="<?= $row["danhmuc_id"]; ?>"
                                                                       data-link="content/category/edit/<?= $row["danhmuc_id"]; ?>.html">Sửa</a>
                                                                </li>
                                                            <?php endif; ?>

                                                            <?php if ($func->_checkIdinArray($chucnang_id_xoa, $chucnang_list)): ?>
                                                                <li>
                                                                    <a class="btn_submit" title="Xoá Danh mục"
                                                                       data-action="delete"
                                                                       data-id="<?= $row["danhmuc_id"]; ?>">Xoá</a>
                                                                </li>
                                                            <?php endif; ?>

                                                            <?php if ($func->_checkIdinArray($chucnang_id_ql, $chucnang_list)): ?>
                                                                <li>
                                                                    <?php if ($row["hienthi"]): ?>
                                                                        <a class="btn_submit" title="Ẩn"
                                                                           data-action="lock"
                                                                           data-id="<?= $row["danhmuc_id"]; ?>">Ẩn</a>
                                                                    <?php else: ?>
                                                                        <a class="btn_submit" title="Hiện"
                                                                           data-action="unlock"
                                                                           data-id="<?= $row["danhmuc_id"]; ?>">Hiện</a>
                                                                    <?php endif; ?>
                                                                </li>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>

                                <input type="hidden" name="hidden" value="category.view" />
                                <input type="hidden" name="act" id="act" />
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

