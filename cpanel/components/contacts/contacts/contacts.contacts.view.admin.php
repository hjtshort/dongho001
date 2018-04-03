<?php defined( '_VALID_MOS' ) or die( include("../../content/news/404.php") ); ?>

<link href="<?= $conf['template_admin']; ?>/assets/css/dataTables.bootstrap.css" rel="stylesheet"/>
<div class="page-content">
    <div class="page-breadcrumbs breadcrumbs-fixed">
        <div class="buttons-task col-xs-12 col-md-4">
            <ul class="breadcrumb breadcrumbs-fixed">
                <li><i class="fa fa-table"></i></li>
                <li class="toast-title">Liên hệ khách hàng</li>
            </ul>
        </div>
    </div>
    <!-- Page Body -->
    <div class="page-body">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="widget">
                    <div class="widget-header with-footer">
                        <span class="widget-caption">Liên hệ khách hàng</span>
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
                                            <th>Khách hàng</th>
                                            <th class="center" style="width: 10%;">Drag</th>
                                            <th class="center" style="width: 10%;">Thời gian đặt hàng</th>
                                            <th style="width: 10%;" class="center">Trạng thái</th>
                                            <th style="width: 7%;" class="center">Tin nhắn</th>
                                            <th style="width: 7%;" class="center">Tổng</th>
                                            <th style="width: 7%;" class="center">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <tr class="selectable">
                                                <td class="center"></td>
                                                <td class="center uniformjs">
                                                    <label>
                                                        <input class="chkItem" name="chkItem[]"
                                                                type="checkbox"
                                                               value="">
                                                        <span class="text"></span>
                                                    </label>

                                                </td>
                                                <td>
                                                   Thuận
                                                </td>
                                                <td>
                                                    <a href="content/news/edit/.html">123</a>
                                                </td>
                                                <td class="center">1</td>
                                                <td class="center">
                                                    123
                                                </td>
                                                <td class="center">
                                                    26/04/2017
                                                </td>
                                                <td class="center">
                                                   Chưa đọc 
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
                                                                   data-id=""
                                                                   data-link="content/news/copy/.html">Sao
                                                                    Chép</a>
                                                            </li>
                                                           
                                                                <li>
                                                                    <a class="btn_submit" title="Sữa tin tức"
                                                                       data-action="edit"
                                                                       data-id=""
                                                                       data-link="content/news/edit/.html">Sửa</a>
                                                                </li>
                                                        

                                                            
                                                                <li>
                                                                    <a class="btn_submit" title="Xoá tin tức"
                                                                       data-action="delete"
                                                                       data-id="">Xoá</a>
                                                                </li>
                                                         

                                                     
                                                                <li>
                                                                
                                                                        <a class="btn_submit" title="Ẩn"
                                                                           data-action="lock"
                                                                           data-id="">Ẩn</a>
                                                                  
                                                                        <a class="btn_submit" title="Hiện"
                                                                           data-action="unlock"
                                                                           data-id="">Hiện</a>
                                                                  
                                                                </li>
                                                          
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        
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
                                                <select onchange="javascript:location.href = ''record='+this.value;"
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
                                                        <option <?php if ($record_option[$i][0] == $somautin) {
                                                            echo "selected";
                                                        } ?> value="<?= $record_option[$i][0]; ?>"><?= $record_option[$i][1]; ?></option>
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

<script src="<?= $conf['template_admin']; ?>/assets/js/bootbox/bootbox.js"></script>
<script language="javascript">

    $(function () {

        $('.btn_submit').click(function (e) {

            var self = $(this);

            if (self.data("action") == "lock-all") {

                if ($(".chkItem:checked").length <= 0) {
                    bootbox.alert("Vui lòng check chọn bản tin cần khóa !", function (result) {
                    });
                } else {
                    $("#act").val(self.data("action"));
                    $("#validateSubmitForm").submit();
                }

            } else if (self.data("action") == "unlock-all") {

                if ($(".chkItem:checked").length <= 0) {
                    bootbox.alert("Vui lòng check chọn bản tin cần mở khóa !", function (result) {
                    });
                } else {
                    $("#act").val(self.data("action"));
                    $("#validateSubmitForm").submit();
                }

            } else if (self.data("action") == "delete-all") {

                if ($(".chkItem:checked").length <= 0) {
                    bootbox.alert("Vui lòng check chọn bản tin cần xoá !", function (result) {
                    });
                } else {
                    $("#act").val(self.data("action"));
                    $("#validateSubmitForm").submit();
                }

            } else if (self.data("action") == "delete") {

                $('.checkboxs thead :checkbox').prop('checked', false).parent().removeClass('checked');
                $('.checkboxs tbody :checkbox').prop('checked', false).parent().removeClass('checked');
                $('.checkboxs tbody tr.selectable').removeClass('selected');

                $('#chkItem_' + self.data("id")).prop('checked', true).parent().addClass('checked');

                bootbox.confirm("Bạn có chắc chắn xoá các bản tin được chọn hay không !", function (result) {
                    if (result) {
                        $("#act").val(self.data("action"));
                        $("#validateSubmitForm").submit();
                    }
                });

            } else if (self.data("action") == "lock") {

                $('.checkboxs thead :checkbox').prop('checked', false).parent().removeClass('checked');
                $('.checkboxs tbody :checkbox').prop('checked', false).parent().removeClass('checked');
                $('.checkboxs tbody tr.selectable').removeClass('selected');

                $('#chkItem_' + self.data("id")).prop('checked', true).parent().addClass('checked');

                $("#act").val(self.data("action"));
                $("#validateSubmitForm").submit();

            } else if (self.data("action") == "unlock") {

                $('.checkboxs thead :checkbox').prop('checked', false).parent().removeClass('checked');
                $('.checkboxs tbody :checkbox').prop('checked', false).parent().removeClass('checked');
                $('.checkboxs tbody tr.selectable').removeClass('selected');

                $('#chkItem_' + self.data("id")).prop('checked', true).parent().addClass('checked');

                $("#act").val(self.data("action"));
                $("#validateSubmitForm").submit();

            } else if (self.data("action") == "add") {
                location.href = self.data("link");
            } else if (self.data("action") == "edit") {
                location.href = self.data("link");
            } else if (self.data("action") == "search") {
                var dateRangeFrom = $("#dateRangeFrom").val();
                var dateRangeTo = $("#dateRangeTo").val();
                var searchinput = $("#searchinput").val();
                var parent_category = $("#parent_category").val();
                location.href = self.data("link") + "search=" + dateRangeFrom + "|" + dateRangeTo + "|" + searchinput + "|" + parent_category;
            } else if (self.data("action") == "un-filter") {
                location.href = self.data("link");
            } else if (self.data("action") == "sort") {
                $("#act").val(self.data("action"));
                $("#validateSubmitForm").submit();
            }
        });

    });

</script>
