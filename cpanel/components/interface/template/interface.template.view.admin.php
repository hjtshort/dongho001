<?php defined('_VALID_MOS') or die(include("../../content/news/404.php"));
$myprocess = new process();

?>

<link href="<?= $conf['template_admin']; ?>/assets/css/dataTables.bootstrap.css" rel="stylesheet"/>
<div class="page-content">
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs breadcrumbs-fixed">
        <div class="buttons-task col-xs-12 col-md-4">
            <ul class="breadcrumb breadcrumbs-fixed">
                <li><i class="fa fa-table"></i></li>
                <li class="toast-title">Quản lý Giao diện</li>
            </ul>
        </div>
        <div class="text-align-right text-align-left-xs col-xs-12 col-md-8">
            <button type="button" data-toggle="modal" data-target="#modal_upload" class="btn btn-sky shiny">Tải Giao diện</button>
        </div>
    </div>
    <!-- /Page Breadcrumb -->
    <!-- Page Body -->
    <div class="page-body">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="widget">
                    <div class="widget-header with-footer">
                        <span class="widget-caption">Danh sách Giao diện</span>
                    </div>
                    <div class="widget-body">
                        <div class="flip-scroll">
                            <form id="validateSubmitForm" name="myForm" method="post">
                                <div class="row">
                                    <?php
                                    $result = $myprocess->get_list_template();

                                    foreach ($result->fetchAll() as $key => $row):?>
                                        <div class="col-lg-4 col-sm-4 col-xs-12">
                                            <div class="widget radius-bordered">
                                                <div class="widget-header <?= ($row["Id"] == $conf['app']['template']) ? 'bg-palegreen' : '' ?>">
                                                    <span class="widget-caption"><?= $row["tengiaodien"]; ?> <?= ($row["Id"] == $conf['app']['template']) ? '(chính)' : '' ?></span>

                                                    <div class="widget-buttons buttons-bordered">
                                                        <button class="btn btn-default btn-sm">Xem Thử</button>
                                                    </div>
                                                    <?php if ($row["Id"] != $conf['app']['template']): ?>
                                                        <div class="widget-buttons buttons-bordered">
                                                            <button data-action="change-template"
                                                                    value="<?= $row["Id"]; ?>"
                                                                    class="btn_submit btn btn-default btn-sm">Áp Dụng
                                                            </button>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="widget-body text-center">
                                                    <div class="btn-group">
                                                        <a href="interface/template/setting/<?= $row["Id"]; ?>.html"
                                                           class="btn btn-default"><i class="fa fa-cogs"></i> Cấu
                                                            Hình</a>
                                                        <a class="btn btn-default"
                                                           href="interface/template/edit/<?= $row["Id"]; ?>.html"><i
                                                                    class="fa fa-pencil"></i> Hiệu Chỉnh</a>

                                                        <div class="btn-group">
                                                            <button type="button"
                                                                    class="btn btn-default dropdown-toggle"
                                                                    data-toggle="dropdown" aria-expanded="false">
                                                                Thêm <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a data-action="copy-template"
                                                                       data-id="<?= $row["Id"]; ?>"
                                                                       class="btn_submit">Sao Chép</a>
                                                                </li>
                                                                <?php if ($row["Id"] != $conf['app']['template']): ?>
                                                                    <li>
                                                                        <a data-action="delete-template"
                                                                           data-id="<?= $row["Id"]; ?>"
                                                                           class="btn_submit">Xóa</a>
                                                                    </li>
                                                                <?php endif; ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                    <?php if(!empty($_SESSION['theme']['install']['id'])): ?>
                                    <div class="col-lg-4 col-sm-4 col-xs-12">
                                        <div class="widget radius-bordered">
                                            <div class="widget-header">
                                                <span class="widget-caption"><?= $_SESSION['theme']['install']['id'] ?>(Chờ cài đặt)</span>
                                            </div>
                                            <div class="widget-body text-center">
                                                <div class="btn-group">
                                                    <a href="interface/template/install.html"
                                                       class="btn btn-default"><i class="fa fa-cogs"></i> Cài đặt</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>

                                <input type="hidden" name="hidden" value="template.view"/>
                                <input type="hidden" name="act" id="act"/>
                                <input type="hidden" name="template_id" id="template_id"/>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Body -->
</div>

<!--Small Modal Templates-->
<div class="modal fade" id="modal_upload" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="mySmallModalLabel">Upload Giao Diện Mới</h4>
            </div>
            <div class="modal-body">
                <form id="form-add-template" action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="label-control">Chọn tệp</label>
                        <input class="form-control" type="file" name="file_upload">
                    </div>

                    <div class="form-group">
                        <button name="act" value="upload" class="btn btn-info">Tải Lên
                        </button>
                    </div>

                    <input type="hidden" name="hidden" value="template.view">
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--End Small Modal Templates-->

<script language="javascript">
    superweb.utility.toolbar();
    $('.btn_submit').click(function (e) {
        var self = $(this);
        if (self.data("action") == "change-template") {
            $('#act').val('change');
            $('#template_id').val(self.val());

        }  if (self.data("action") == "copy-template") {
            $('#act').val('copy');
            $('#template_id').val(self.data('id'));
            $("#validateSubmitForm").submit();

        } else if (self.data("action") == "delete-template") {
            bootbox.confirm("Bạn có chắc chắn xoá giao diện được chọn hay không !", function (result) {
                if (result) {
                    $('#act').val('delete');
                    $('#template_id').val(self.data('id'));
                    $("#validateSubmitForm").submit();
                }
            });
        }
    });
</script>