<?php defined('_VALID_MOS') or die(include("../../content/news/404.php"));
$template_process = new template_process();

$result = $template_process->template_detail()->fetch();
$history_download = $template_process->history_download();
?>


<!--Page Related Scripts-->
<script src="<?= $conf['template_admin']; ?>/assets/js/charts/sparkline/jquery.sparkline.js"></script>
<script src="<?= $conf['template_admin']; ?>/assets/js/charts/sparkline/sparkline-init.js"></script>

<script src="<?= $conf['template_admin']; ?>/assets/js/charts/easypiechart/jquery.easypiechart.js"></script>
<script src="<?= $conf['template_admin']; ?>/assets/js/charts/easypiechart/easypiechart-init.js"></script>

<script src="<?= $conf['template_admin']; ?>/assets/js/charts/morris/raphael-2.0.2.min.js"></script>
<script src="<?= $conf['template_admin']; ?>/assets/js/charts/morris/morris.js"></script>
<script src="<?= $conf['template_admin']; ?>/assets/js/charts/morris/morris-init.js"></script>

<script src="<?= $conf['template_admin']; ?>/assets/js/charts/flot/jquery.flot.js"></script>
<script src="<?= $conf['template_admin']; ?>/assets/js/charts/flot/jquery.flot.orderBars.js"></script>
<script src="<?= $conf['template_admin']; ?>/assets/js/charts/flot/jquery.flot.tooltip.js"></script>
<script src="<?= $conf['template_admin']; ?>/assets/js/charts/flot/jquery.flot.resize.js"></script>
<script src="<?= $conf['template_admin']; ?>/assets/js/charts/flot/jquery.flot.selection.js"></script>
<script src="<?= $conf['template_admin']; ?>/assets/js/charts/flot/jquery.flot.crosshair.js"></script>
<script src="<?= $conf['template_admin']; ?>/assets/js/charts/flot/jquery.flot.stack.js"></script>
<script src="<?= $conf['template_admin']; ?>/assets/js/charts/flot/jquery.flot.time.js"></script>
<script src="<?= $conf['template_admin']; ?>/assets/js/charts/flot/jquery.flot.pie.js"></script>

<script src="<?= $conf['template_admin']; ?>/assets/js/charts/chartjs/Chart.js"></script>
<div class="page-content">
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs breadcrumbs-fixed">
        <div class="buttons-task col-xs-12 col-md-4">
            <ul class="breadcrumb breadcrumbs-fixed">
                <li><i class="fa fa-table"></i></li>
                <li class="toast-title">Thống kê - Báo cáo giao diện</li>
            </ul>
        </div>

    </div>
    <!-- /Page Breadcrumb -->
    <!-- Page Body -->
    <div class="page-body">
        <form id="validateSubmitForm" name="myForm" method="post">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="databox databox-vertical databox-xxxlg radius-bordered databox-shadowed">
                        <div class="databox-top bg-white bordered-bottom-1 bordered-platinum text-align-left padding-10">
                            <div class="databox-text darkgray">Báo cáo chi tiết giao diện</div>
                        </div>
                        <div class="databox-bottom bg-white no-padding ">
                            <div class="databox databox-xlg databox-halved radius-bordered databox-shadowed databox-vertical">
                                <div class="databox-top bg-white padding-10">
                                    <div class="col-lg-4 col-sm-4 col-xs-4">
                                        <img src="<?= $conf['template_admin']; ?>/assets/img/avatars/Sergey-Azovskiy.jpg"
                                             style="width:75px; height:75px;"
                                             class="image-circular bordered-3 bordered-palegreen">
                                    </div>
                                    <div class="col-lg-8 col-sm-8 col-xs-8 text-align-left padding-10">
                                        <span class="databox-header carbon no-margin"><?= $result['tengiaodien'] . ' - ' . $result['ho_tacgia'] . ' ' . $result['ten_tacgia'] ?></span>
                                        <span class="databox-text lightcarbon no-margin"> <?= $result['danhmuc'] ?> </span>
                                    </div>
                                </div>
                                <div class="databox-bottom bg-white no-padding">
                                    <div class="databox-row row-8">
                                        <div class="databox-row row-6 no-padding">
                                            <div class="databox-cell cell-4 no-padding text-align-center bordered-right bordered-platinum">
                                                <span class="databox-text sonic-silver  no-margin">Lượt tải</span>
                                                <span class="databox-number lightcarbon no-margin"><?= $result['luottai'] ?></span>
                                            </div>
                                            <div class="databox-cell cell-4 no-padding text-align-center bordered-right bordered-platinum">
                                                <span class="databox-text sonic-silver no-margin">Lượt xem</span>
                                                <span class="databox-number lightcarbon no-margin"><?= $result['solanxem'] ?></span>
                                            </div>
                                            <div class="databox-cell cell-4 no-padding text-align-center">
                                                <span class="databox-text sonic-silver no-margin">Mã</span>
                                                <span class="databox-number lightcarbon no-margin"><?= $result['magiaodien'] ?></span>
                                            </div>
                                        </div>
                                        <!--<div class="databox-row row-6 padding-10">
                                            <button class="btn btn-palegreen btn-sm pull-right">FOLLOW</button>
                                        </div>-->
                                    </div>
                                </div>
                            </div>

                            <div class="databox-row row-1 padding-10">
                                <div class="databox-text darkgray no-margin">DISTRIBUTION</div>
                            </div>
                            <div class="databox-row  no-padding bg-ivory bordered-bottom-1 bordered-platinum silver"
                                 style="font-size:12px;">
                                <table class="table table-condensed table-striped">
                                    <thead>
                                        <tr>
                                            <td>Domain</td>
                                            <td>Lượt tải</td>
                                            <td>Ngày gần nhất</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($history_download->fetchAll() as $history): ?>
                                        <tr>
                                            <td class="padding-left-10">
                                                <?= $history['customer_uid'] ?>
                                            </td>
                                            <td>
                                                <?= $history['luottai'] ?>
                                            </td>
                                            <td>
                                                <?= date("d/m/Y h:i:s A" ,$history['date_create']) ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="databox-row row-2 padding-20 bg-whitesmoke">
                                <a href="javascript:void(0);" class="btn btn-default pull-right">Save Report</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <input type="hidden" name="hidden" value="template.report"/>
            <input type="hidden" name="act" id="act"/>
        </form>
    </div>
    <!-- /Page Body -->
</div>
<script>
    InitiateEasyPieChart.init();
</script>