<?php defined('_VALID_MOS') or die(include("../../content/news/404.php"));
$process = new process;
if (!empty($_GET['themeid'])) {
    $_SESSION['theme']['install'] = [
        'id' => $_GET['themeid']
    ];
} ?>
<div class="page-content">

    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs breadcrumbs-fixed">
        <div class="buttons-task col-xs-12 col-md-4">
            <ul class="breadcrumb breadcrumbs-fixed">
                <li><i class="fa fa-table"></i></li>
                <li class="toast-title">Cài đặt giao diện</li>
            </ul>
        </div>
    </div>
    <!-- /Page Breadcrumb -->
    <!-- Page Body -->
    <div class="page-body">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <div class="widget-header bordered-bottom bordered-blue">
                        <span class="widget-caption">Đang cài đặt</span>

                        <div class="widget-buttons">
                            <a href="#" data-toggle="maximize">
                                <i class="fa fa-expand"></i>
                            </a>
                        </div>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main ">
                            <?php
                            if (!empty($_SESSION['theme']['install']['id'])){
                                if ($process->install_template(['id' => $_SESSION['theme']['install']['id']])) {
                                    $func->_redirect($conf['rooturl_backend'] . '/interface/template/view.html');
                                };
                            }
                            else{
                                $func->_redirect($conf['rooturl_backend'] . '/interface/template/view.html');
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /Page Body -->
</div>



