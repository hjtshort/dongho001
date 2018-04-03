<?php defined('_VALID_MOS') or die(include("404.php"));
$index_process = new index_process();

$list_order = array_map(function ($item) use ($index_process) {
    switch ($item['order_status']) {
        case index_process::ORDER_WAIT:
            $item['status']['title'] = "Đang Chờ";
            $item['status']['icon'] = "info";
            $item['status']['color'] = "yellow";
            break;
        case index_process::ORDER_SHIPPING:
            $item['status']['title'] = "Đã Giao";
            $item['status']['icon'] = "truck";
            $item['status']['color'] = "info";
            break;
        case index_process::ORDER_PAYMENT :
            $item['status']['title'] = "Đã Thanh Toán";
            $item['status']['icon'] = "check";
            $item['status']['color'] = "success";
            break;
        case index_process::ORDER_CANCEL:
            $item['status']['title'] = "Đã Huỷ";
            $item['status']['icon'] = "times";
            $item['status']['color'] = "darkorange";
            break;
        default :
            $item['status']['title'] = "Không xác định";
            $item['status']['icon'] = "warning";
            $item['status']['color'] = "default";
            break;
    }


    return $item;
}, $index_process->get_list_order())
?>

<!--Flot Charts Needed Scripts-->
<script src="<?= $conf['template_admin']; ?>/assets/js/charts/flot/jquery.flot.js"></script>
<script src="<?= $conf['template_admin']; ?>/assets/js/charts/flot/jquery.flot.resize.js"></script>
<script src="<?= $conf['template_admin']; ?>/assets/js/charts/flot/jquery.flot.pie.js"></script>
<script src="<?= $conf['template_admin']; ?>/assets/js/charts/flot/jquery.flot.tooltip.js"></script>
<script src="<?= $conf['template_admin']; ?>/assets/js/charts/flot/jquery.flot.orderBars.js"></script>

<div class="page-content">
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs breadcrumbs-fixed">
        <ul class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="#">Trang Chủ</a>
            </li>
            <li class="active">Bảng Điều Khiển</li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->
    <!-- Page Header -->
    <!--<div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Bảng Điều Khiển
            </h1>
        </div>
        <div class="header-buttons">
            <a class="sidebar-toggler" href="#">
                <i class="fa fa-arrows-h"></i>
            </a>
            <a class="refresh" id="refresh-toggler" href="">
                <i class="glyphicon glyphicon-refresh"></i>
            </a>
            <a class="fullscreen" id="fullscreen-toggler" href="#">
                <i class="glyphicon glyphicon-fullscreen"></i>
            </a>
        </div>
    </div>-->
    <!-- /Page Header -->
    <!-- Page Body -->
    <div class="page-body">

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="widget">
                    <div class="widget-header bg-blue">
                        <i class="widget-icon fa fa-bullhorn"></i>
                        <span class="widget-caption">Thông Báo</span>
                        <div class="widget-buttons">
                            <a href="#" data-toggle="collapse">
                                <i class="fa fa-minus"></i>
                            </a>
                            <a href="#" data-toggle="dispose">
                                <i class="fa fa-times"></i>
                            </a>
                        </div><!--Widget Buttons-->
                    </div><!--Widget Header-->
                    <div class="widget-body">
                        <div class="widget-main ">
                            <div class="panel-group accordion" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading ">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle collapsed" data-toggle="collapse"
                                               data-parent="#accordion" href="#collapseOne">
                                                <i class="fa fa-warning"></i> Thông báo #1
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse">
                                        <div class="panel-body border-red">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                            dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
                                            tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                            assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                            wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                            vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                                            synth nesciunt you probably haven't heard of them accusamus labore
                                            sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle collapsed" data-toggle="collapse"
                                               data-parent="#accordion" href="#collapseTwo">
                                                <i class="fa fa-warning"></i> Thông báo #2
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse">
                                        <div class="panel-body border-palegreen">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                            dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
                                            tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                            assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                            wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                            vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                                            synth nesciunt you probably haven't heard of them accusamus labore
                                            sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle collapsed" data-toggle="collapse"
                                               data-parent="#accordion" href="#collapseThree">
                                                <i class="fa fa-warning"></i> Thông báo #3
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                        <div class="panel-body border-magenta">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                            dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
                                            tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                            assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                            wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                            vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                                            synth nesciunt you probably haven't heard of them accusamus labore
                                            sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle collapsed" data-toggle="collapse"
                                               data-parent="#accordion" href="#collapseThree">
                                                <i class="fa fa-warning"></i> Thông báo #3
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                        <div class="panel-body border-magenta">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                            dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
                                            tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                            assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                            wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                            vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                                            synth nesciunt you probably haven't heard of them accusamus labore
                                            sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle collapsed" data-toggle="collapse"
                                               data-parent="#accordion" href="#collapseThree">
                                                <i class="fa fa-warning"></i> Thông báo #3
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                        <div class="panel-body border-magenta">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                            dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
                                            tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                            assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                            wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                            vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                                            synth nesciunt you probably haven't heard of them accusamus labore
                                            sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--Widget Body-->
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="widget">
                    <div class="widget-header bg-blue">
                        <i class="widget-icon fa fa-headphones"></i>
                        <span class="widget-caption">Hỗ Trợ Trực Tuyến</span>
                        <div class="widget-buttons">
                            <a href="#" data-toggle="collapse">
                                <i class="fa fa-minus"></i>
                            </a>
                            <a href="#" data-toggle="dispose">
                                <i class="fa fa-times"></i>
                            </a>
                        </div><!--Widget Buttons-->
                    </div><!--Widget Header-->
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-sm-4 text-center margin-top-30">

                                <!-- Profile Photo -->
                                <a href="" class="thumbnail">
                                    <img src="resource/images/support.jpg" alt="Profile">
                                </a>
                                <div class="horizontal-space"></div>

                                <!-- Social Icons -->
                                <a href=""><i class="fa fa-facebook"></i></a>
                                <a href=""><i class="fa fa-skype"></i></a>
                                <a href=""><i class="fa fa-yahoo"></i></a>
                                <a href="" data-toggle="modal"><i class="fa fa-google"></i></a>
                                <div class="clearfix separator bottom"></div>
                                <!-- // Social Icons END -->
                            </div>
                            <div class="col-sm-8" style="float:right">
                                <div class="groupcheckbox">
                                    <div>
                                        <p>Hỗ trợ trực tiếp: <strong class="important">Nguyễn Anh Tuấn</strong></p>
                                    </div>
                                    <div>
                                        <p>Điện thoại: <strong>0164 796 1737</strong></p>
                                    </div>
                                    <div>
                                        <p>Hoặc quý khách có thể liên hệ với:<strong>Bộ phận CSKH</strong></p>
                                    </div>
                                    <div>
                                        <p><strong>Điện thoại:</strong> 04.6674.5832</p>
                                        <p><strong>Email:</strong> support@superweb.vn</p>
                                    </div>
                                    <div>
                                        <p><a class="btn btn-danger btn-icon glyphicons circle_arrow_right"
                                              href="#"><i></i>Yêu cầu tính năng</a>
                                            <a class="btn btn-success btn-icon glyphicons leaf" href="#"><i></i>Trợ giúp</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="separator"></div>
                            </div>
                        </div>
                    </div><!--Widget Body-->
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="widget">
                    <div class="widget-header bg-blue">
                        <i class="widget-icon fa fa-flash"></i>
                        <span class="widget-caption">Truy Cập Nhanh</span>
                        <div class="widget-buttons">

                            <a href="#" data-toggle="collapse">
                                <i class="fa fa-minus"></i>
                            </a>
                            <a href="#" data-toggle="dispose">
                                <i class="fa fa-times"></i>
                            </a>
                        </div><!--Widget Buttons-->
                    </div><!--Widget Header-->
                    <div class="widget-body">
                        <div class="widget-main ">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="dashboard-box">
                                        <div class="box-visits">
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-6 col-xs-12">
                                                    <div class="notification">
                                                        <div class="clearfix">
                                                            <div class="notification-icon">
                                                                <i class="fa fa-truck palegreen bordered-1 bordered-palegreen"></i>
                                                            </div>
                                                            <div class="notification-body">
                                                                <a href="/cpanel/product/product/add.html"
                                                                   class="title">Thêm Sản Phẩm</a>
                                                                <span class="description">Thêm sản phẩm mới cho Website</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-6 col-xs-12">
                                                    <div class="notification">
                                                        <div class="clearfix">
                                                            <div class="notification-icon">
                                                                <i class="fa fa-thumb-tack azure bordered-1 bordered-azure"></i>
                                                            </div>
                                                            <div class="notification-body">
                                                                <a href="/cpanel/content/news/add.html" class="title">Thêm
                                                                    Bài Viết</a>
                                                                <span class="description">Thêm bài viết mới cho Website</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-6 col-xs-12">
                                                    <div class="notification">
                                                        <div class="clearfix">
                                                            <div class="notification-icon">
                                                                <i class="fa  fa-shopping-cart yellow bordered-1 bordered-yellow"></i>
                                                            </div>
                                                            <div class="notification-body">
                                                                <a class="title">Quản Lý Đơn Hàng</a>
                                                                <span class="description">Danh sách đơn hàng đã đặt</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-6 col-xs-12">
                                                    <div class="notification">
                                                        <div class="clearfix">
                                                            <div class="notification-icon">
                                                                <i class="fa fa-user orange bordered-1 bordered-orange"></i>
                                                            </div>
                                                            <div class="notification-body">
                                                                <a class="title">Quản Lý Khách hàng</a>
                                                                <span class="description">Danh sách khách hàng của bạn</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-6 col-xs-12">
                                                    <div class="notification">
                                                        <div class="clearfix">
                                                            <div class="notification-icon">
                                                                <i class="fa fa-desktop pink bordered-1 bordered-pink"></i>
                                                            </div>
                                                            <div class="notification-body">
                                                                <a href="/cpanel/interface/template/setting.html"
                                                                   class="title">Quản Lý Giao Diện</a>
                                                                <span class="description">Cấu hình giao diện Website</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-6 col-xs-12">
                                                    <div class="notification">
                                                        <div class="clearfix">
                                                            <div class="notification-icon">
                                                                <i class="fa fa-cog blueberry bordered-1 bordered-blueberry"></i>
                                                            </div>
                                                            <div class="notification-body">
                                                                <a class="title">Cấu Hình</a>
                                                                <span class="description">Cấu hình cho Website</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--Widget Body-->
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="tabbable">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active">
                            <a data-toggle="tab" href="#home">
                                <i class="fa fa-warning"></i> Vấn đề thường giặp
                            </a>
                        </li>

                        <li class="tab-red">
                            <a data-toggle="tab" href="#profile">
                                <i class="fa fa-video-camera"></i> Video hướng dẫn
                            </a>
                        </li>

                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="fa fa-shopping-cart"></i> Giúp bán hàng
                                <b class="caret"></b>
                            </a>

                            <ul class="dropdown-menu dropdown-blue">
                                <li>
                                    <a data-toggle="tab" href="#dropdown1">@fat</a>
                                </li>

                                <li>
                                    <a data-toggle="tab" href="#dropdown2">@mdo</a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="home" class="tab-pane in active">
                            <p>Raw denim you probably haven't heard of them jean shorts Austin.</p>
                        </div>

                        <div id="profile" class="tab-pane">
                            <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee
                                squid.</p>
                        </div>

                        <div id="dropdown1" class="tab-pane">
                            <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's
                                organic lomo retro fanny pack lo-fi farm-to-table readymade.</p>
                        </div>

                        <div id="dropdown2" class="tab-pane">
                            <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold
                                out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack
                                portland seitan DIY, art party locavore wolf cliche high life echo park Austin.</p>
                        </div>
                    </div>
                </div>
                <div class="horizontal-space"></div>

            </div>
        </div>


        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <div class="widget-header bordered-bottom bordered-themeprimary">
                        <i class="widget-icon fa fa-tasks themeprimary"></i>
                        <span class="widget-caption themeprimary">Thống Kê Nhanh</span>
                    </div><!--Widget Header-->
                    <div class="widget-body">
                        <div class="row">
                            <div class="col=lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="databox databox-lg databox-inverted radius-bordered databox-shadowed databox-graded databox-vertical">
                                    <div class="databox-top bg-palegreen no-padding">
                                        <div class="databox-stat white bg-palegreen font-120">
                                            <i class="stat-icon fa fa-caret-down icon-xlg"></i>
                                        </div>
                                        <div class="horizontal-space space-lg"></div>
                                        <div class="databox-sparkline no-margin">
                                    <span data-sparkline="compositebar" data-height="82px" data-width="100%"
                                          data-barcolor="#b0dc81"
                                          data-barwidth="10px" data-barspacing="5px"
                                          data-fillcolor="false" data-linecolor="#fff" data-spotradius="3"
                                          data-linewidth="2"
                                          data-spotcolor="#fafafa" data-minspotcolor="#fafafa" data-maxspotcolor="#fff"
                                          data-highlightspotcolor="#fff" data-highlightlinecolor="#fff"
                                          data-composite="7, 6, 5, 7, 9, 10, 8, 7, 6, 6, 4, 7, 8">
                                        8,4,1,2,4,6,2,4,4,8,10,7,10
                                    </span>
                                        </div>
                                    </div>
                                    <div class="databox-bottom no-padding">
                                        <div class="databox-row">
                                            <div class="databox-cell cell-6 text-align-left">
                                                <span class="databox-text">Tổng Doanh Thu</span>
                                                <span class="databox-number"><?= $func->convertIntToMoney($index_process->sum_total_order_by_date()); ?>
                                                    VNĐ</span>
                                            </div>
                                            <div class="databox-cell cell-6 text-align-right">
                                                <span class="databox-text">Tháng <?= date('n') ?></span>
                                                <span class="databox-number font-70"><?= $func->convertIntToMoney($index_process->sum_total_order_by_month(date('Y-m'))); ?>
                                                    VNĐ</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col=lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="databox databox-lg databox-inverted radius-bordered databox-shadowed databox-graded databox-vertical">
                                    <div class="databox-top bg-orange no-padding">
                                        <div class="databox-stat white bg-orange font-120">
                                            <i class="stat-icon fa fa-caret-up icon-xlg"></i>
                                        </div>
                                        <div class="horizontal-space space-lg"></div>
                                        <div class="databox-sparkline no-margin">
                                    <span data-sparkline="compositebar" data-height="82px" data-width="100%"
                                          data-barcolor="#fb7d64"
                                          data-barwidth="10px" data-barspacing="5px"
                                          data-fillcolor="false" data-linecolor="#fff" data-spotradius="3"
                                          data-linewidth="2"
                                          data-spotcolor="#fafafa" data-minspotcolor="#fafafa" data-maxspotcolor="#fff"
                                          data-highlightspotcolor="#fff" data-highlightlinecolor="#fff"
                                          data-composite="7, 6, 5, 7, 9, 10, 8, 6,2,4,1,2,7">
                                        10,7,10,8,4,6, 6, 4, 7, 8 ,4,4,8
                                    </span>
                                        </div>
                                    </div>
                                    <div class="databox-bottom no-padding">
                                        <div class="databox-row">
                                            <div class="databox-cell cell-6 text-align-left">
                                                <span class="databox-text">Users Total</span>
                                                <span class="databox-number">76,109</span>
                                            </div>
                                            <div class="databox-cell cell-6 text-align-right">
                                                <span class="databox-text">New</span>
                                                <span class="databox-number font-70">7,540</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col=lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="databox databox-lg databox-inverted radius-bordered databox-shadowed databox-graded databox-vertical">
                                    <div class="databox-top bg-azure no-padding">
                                        <div class="databox-stat white bg-azure font-120">
                                            <i class="stat-icon fa fa-caret-up icon-xlg"></i>
                                        </div>
                                        <div class="horizontal-space space-lg"></div>
                                        <div class="databox-sparkline no-margin">
                                    <span data-sparkline="compositebar" data-height="82px" data-width="100%"
                                          data-barcolor="#3bcbef"
                                          data-barwidth="10px" data-barspacing="5px"
                                          data-fillcolor="false" data-linecolor="#fff" data-spotradius="3"
                                          data-linewidth="2"
                                          data-spotcolor="#fafafa" data-minspotcolor="#fafafa" data-maxspotcolor="#fff"
                                          data-highlightspotcolor="#fff" data-highlightlinecolor="#fff"
                                          data-composite="8,4,1,2,4,6,2,4,4,8,10,7,7">
                                        7, 6, 5, 7, 9, 10, 8, 7, 6, 6, 4, 7, 8
                                    </span>
                                        </div>
                                    </div>
                                    <div class="databox-bottom no-padding">
                                        <div class="databox-row">
                                            <div class="databox-cell cell-6 text-align-left">
                                                <span class="databox-text">Visits Total</span>
                                                <span class="databox-number">990,541</span>
                                            </div>
                                            <div class="databox-cell cell-6 text-align-right">
                                                <span class="databox-text">September</span>
                                                <span class="databox-number font-70">292,123</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tabbable">
                                    <ul class="nav nav-tabs" id="myTab">
                                        <li class="active">
                                            <a data-toggle="tab" href="#report-order">
                                                Thống kê bán hàng
                                            </a>
                                        </li>

                                        <li class="tab-red">
                                            <a data-toggle="tab" href="#report-feelback">
                                                Phản hồi khách hàng
                                            </a>
                                        </li>

                                        <li class="tab-red">
                                            <a data-toggle="tab" href="#report-product">
                                                Đánh giá sản phẩm
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div id="report-order" class="tab-pane in active">
                                            <div class="tickets-container">
                                                <ul class="tickets-list">
                                                    <?php foreach ($list_order as $order): ?>
                                                        <li class="ticket-item">
                                                            <div class="row">
                                                                <div class="ticket-user col-lg-6 col-sm-12">
                                                                    <a href="#">#<?= $order['id'] ?></a>
                                                                    <span class="user-name"><?= $order['bill_name'] ?></span>
                                                                    <span class="user-at">-</span>
                                                                    <span class="user-company"><?= $order['bill_address'] ?></span>
                                                                </div>
                                                                <div class="ticket-time  col-lg-4 col-sm-6 col-xs-12">
                                                                    <div class="divider hidden-md hidden-sm hidden-xs"></div>
                                                                    <i class="fa fa-clock-o"></i>
                                                                    <span class="time"><?= date('d-m-Y h:i A', $order['date_create']) ?> ( <?= $func->getTimeInterval($order['date_create']) ?> )</span>
                                                                </div>
                                                                <div class="ticket-type  col-lg-2 col-sm-6 col-xs-12">
                                                                    <span class="divider hidden-xs"></span>
                                                                    <span class="type"><?= $order['status']['title'] ?></span>
                                                                </div>
                                                                <div class="ticket-state bg-<?= $order['status']['color'] ?>">
                                                                    <i class="fa fa-<?= $order['status']['icon'] ?>"></i>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>

                                        <div id="report-feelback" class="tab-pane">
                                            <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla
                                                single-origin coffee squid.</p>
                                        </div>

                                        <div id="report-product" class="tab-pane">
                                            <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out
                                                mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table
                                                readymade.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--Widget Body-->
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="databox databox-xxlg databox-vertical databox-inverted">
                    <div class="databox-top bg-whitesmoke no-padding">
                        <div class="databox-row row-2 bg-orange no-padding">
                            <div class="databox-cell cell-1 text-align-center no-padding padding-top-5">
                                <span class="databox-number white"><i class="fa fa-bar-chart-o no-margin"></i></span>
                            </div>
                            <div class="databox-cell cell-8 no-padding padding-top-5 text-align-left">
                                <span class="databox-number white">Lượt Xem</span>
                            </div>
                            <div class="databox-cell cell-3 text-align-right padding-10">
                                <span class="databox-text white"><?= date('d \T\h\á\n\g n') ?></span>
                            </div>
                        </div>
                        <div class="databox-row row-4">
                            <div class="databox-cell cell-4 no-padding padding-10 padding-left-20 text-align-left">
                                <span class="databox-number orange no-margin"><?= $index_process->count_visit() ?></span>
                                <span class="databox-text sky no-margin">TỔNG</span>
                            </div>
                            <div class="databox-cell cell-2 no-padding padding-10 text-align-left">
                                <span class="databox-number orange no-margin"><?= $index_process->count_visit(date('Y-m-d', strtotime('-7 day'))) ?></span>
                                <span class="databox-text darkgray no-margin">TUẦn</span>
                            </div>
                            <div class="databox-cell cell-2 no-padding padding-10 text-align-left">
                                <span class="databox-number orange no-margin"><?= $index_process->count_visit(date('Y-m-d', strtotime('-1 day'))) ?></span>
                                <span class="databox-text darkgray no-margin">HÔM QUA</span>
                            </div>
                            <div class="databox-cell cell-2 no-padding padding-10 text-align-left">
                                <span class="databox-number orange no-margin"><?= $index_process->count_visit(date('Y-m-d')) ?></span>
                                <span class="databox-text darkgray no-margin">HÔM NAY</span>
                            </div>
                            <div class="databox-cell cell-2 no-padding padding-10 text-align-left">
                                <span class="databox-number orange no-margin"><?= $index_process->count_visit_present(20) ?></span>
                                <span class="databox-text darkgray no-margin">ONLINE</span>
                            </div>
                        </div>
                        <div class="databox-row row-6 no-padding">
                            <div class="databox-sparkline">
                                <span data-sparkline="line" data-height="126px" data-width="100%"
                                      data-fillcolor="#37c2e2" data-linecolor="#37c2e2"
                                      data-spotcolor="#fafafa" data-minspotcolor="#fafafa" data-maxspotcolor="#ffce55"
                                      data-highlightspotcolor="#f5f5f5 " data-highlightlinecolor="#f5f5f5"
                                      data-linewidth="2" data-spotradius="0">
                                    5,7,6,5,9,4,3,7,2
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="databox-bottom bg-sky no-padding">
                        <div class="databox-cell cell-2 text-align-center no-padding padding-top-5">
                            <span class="databox-header white">T2</span>
                        </div>
                        <div class="databox-cell cell-2 text-align-center no-padding padding-top-5">
                            <span class="databox-header white">T3</span>
                        </div>
                        <div class="databox-cell cell-2 text-align-center no-padding padding-top-5">
                            <span class="databox-header white">T4</span>
                        </div>
                        <div class="databox-cell cell-2 text-align-center no-padding padding-top-5">
                            <span class="databox-header white">T5</span>
                        </div>
                        <div class="databox-cell cell-2 text-align-center no-padding padding-top-5">
                            <span class="databox-header white">T6</span>
                        </div>
                        <div class="databox-cell cell-2 text-align-center no-padding padding-top-5">
                            <span class="databox-header white">T7</span>
                        </div>

                    </div>
                </div>
            </div>

            <!--   <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                   <div class="databox databox-xxlg databox-vertical databox-shadowed bg-white radius-bordered padding-5">
                       <div class="databox-top">
                           <div class="databox-row row-12">
                               <div class="databox-cell cell-3 text-center">
                                   <div class="databox-number number-xxlg sonic-silver">164</div>
                                   <div class="databox-text storm-cloud">online</div>
                               </div>
                               <div class="databox-cell cell-9 text-align-center">
                                   <div class="databox-row row-6 text-left">
                                       <span class="badge badge-palegreen badge-empty margin-left-5"></span>
                                       <span class="databox-inlinetext uppercase darkgray margin-left-5">NEW</span>
                                       <span class="badge badge-yellow badge-empty margin-left-5"></span>
                                       <span class="databox-inlinetext uppercase darkgray margin-left-5">RETURNING</span>
                                   </div>
                                   <div class="databox-row row-6">
                                       <div class="progress bg-yellow progress-no-radius">
                                           <div class="progress-bar progress-bar-palegreen" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 78%">
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="databox-bottom">
                           <div class="databox-row row-12">
                               <div class="databox-cell cell-7 text-center  padding-5">
                                   <div id="dashboard-pie-chart-sources" class="chart"></div>
                               </div>
                               <div class="databox-cell cell-5 text-center no-padding-left padding-bottom-30">
                                   <div class="databox-row row-2 bordered-bottom bordered-ivory padding-10">
                                       <span class="databox-text sonic-silver pull-left no-margin">Type</span>
                                       <span class="databox-text sonic-silver pull-right no-margin uppercase">PCT</span>
                                   </div>
                                   <div class="databox-row row-2 bordered-bottom bordered-ivory padding-10">
                                       <span class="badge badge-blue badge-empty pull-left margin-5"></span>
                                       <span class="databox-text darkgray pull-left no-margin hidden-xs">FEED</span>
                                       <span class="databox-text darkgray pull-right no-margin uppercase">46%</span>
                                   </div>
                                   <div class="databox-row row-2 bordered-bottom bordered-ivory padding-10">
                                       <span class="badge badge-orange badge-empty pull-left margin-5"></span>
                                       <span class="databox-text darkgray pull-left no-margin hidden-xs">PREFERRAL</span>
                                       <span class="databox-text darkgray pull-right no-margin uppercase">21%</span>
                                   </div>
                                   <div class="databox-row row-2 bordered-bottom bordered-ivory padding-10">
                                       <span class="badge badge-pink badge-empty pull-left margin-5"></span>
                                       <span class="databox-text darkgray pull-left no-margin hidden-xs">DIRECT</span>
                                       <span class="databox-text darkgray pull-right no-margin uppercase">12%</span>
                                   </div>
                                   <div class="databox-row row-2 bordered-bottom bordered-ivory padding-10">
                                       <span class="badge badge-palegreen badge-empty pull-left margin-5"></span>
                                       <span class="databox-text darkgray pull-left no-margin hidden-xs">EMAIL</span>
                                       <span class="databox-text darkgray pull-right no-margin uppercase">11%</span>
                                   </div>
                                   <div class="databox-row row-2 padding-10">
                                       <span class="badge badge-yellow badge-empty pull-left margin-5"></span>
                                       <span class="databox-text darkgray pull-left no-margin hidden-xs">ORGANIC</span>
                                       <span class="databox-text darkgray pull-right no-margin uppercase">10%</span>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>-->

        </div>

        <!--  <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="row">
                      <div class="col-xs-12">
                          <div class="dashboard-box">
                              <div class="box-header">
                                  <div class="deadline">
                                      Remaining Days: 109
                                  </div>
                              </div>
                              <div class="box-progress">
                                  <div class="progress-handle">day 20</div>
                                  <div class="progress progress-xs progress-no-radius bg-whitesmoke">
                                      <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                      </div>
                                  </div>
                              </div>
                              <div class="box-tabbs">
                                  <div class="tabbable">
                                      <ul class="nav nav-tabs tabs-flat  nav-justified" id="myTab11">
                                          <li class="active">
                                              <a data-toggle="tab" href="#realtime">
                                                  Real-Time
                                              </a>
                                          </li>
                                          <li>
                                              <a data-toggle="tab" href="#visits">
                                                  Visits
                                              </a>
                                          </li>

                                          <li>
                                              <a data-toggle="tab" id="contacttab" href="#bandwidth">
                                                  Bandwidth
                                              </a>
                                          </li>
                                          <li>
                                              <a data-toggle="tab" href="#sales">
                                                  Sales
                                              </a>
                                          </li>
                                      </ul>
                                      <div class="tab-content tabs-flat no-padding">
                                          <div id="realtime" class="tab-pane active padding-5 animated fadeInUp">
                                              <div class="row">
                                                  <div class="col-lg-12">
                                                      <div id="dashboard-chart-realtime" class="chart chart-lg no-margin"></div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div id="visits" class="tab-pane  animated fadeInUp">
                                              <div class="row">
                                                  <div class="col-lg-12 chart-container">
                                                      <div id="dashboard-chart-visits" class="chart chart-lg no-margin" style="width:100%"></div>
                                                  </div>
                                              </div>

                                          </div>

                                          <div id="bandwidth" class="tab-pane padding-10 animated fadeInUp">
                                              <div class="databox-sparkline bg-themeprimary">
                                                  <span id="dashboard-bandwidth-chart" data-sparkline="compositeline" data-height="250px" data-width="100%" data-linecolor="#fff" data-secondlinecolor="#eee"
                                                        data-fillcolor="rgba(255,255,255,.1)" data-secondfillcolor="rgba(255,255,255,.25)"
                                                        data-spotradius="0"
                                                        data-spotcolor="#fafafa" data-minspotcolor="#fafafa" data-maxspotcolor="#ffce55"
                                                        data-highlightspotcolor="#fff" data-highlightlinecolor="#fff"
                                                        data-linewidth="2" data-secondlinewidth="2"
                                                        data-composite="500, 400, 100, 450, 300, 200, 100, 200">
                                                      300,300,400,300,200,300,300,200
                                                  </span>
                                              </div>
                                          </div>
                                          <div id="sales" class="tab-pane animated fadeInUp no-padding-bottom" style="padding:20px 20px 0 20px;">
                                              <div class="row">
                                                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                      <div class="databox databox-xlg databox-vertical databox-inverted databox-shadowed">
                                                          <div class="databox-top">
                                                              <div class="databox-sparkline">
                                                                  <span data-sparkline="line" data-height="125px" data-width="100%" data-fillcolor="false" data-linecolor="themesecondary"
                                                                        data-spotcolor="#fafafa" data-minspotcolor="#fafafa" data-maxspotcolor="#ffce55"
                                                                        data-highlightspotcolor="#ffce55" data-highlightlinecolor="#ffce55"
                                                                        data-linewidth="1.5" data-spotradius="2">
                                                                      1,2,4,3,5,6,8,7,11,14,11,12
                                                                  </span>
                                                              </div>
                                                          </div>
                                                          <div class="databox-bottom no-padding text-align-center">
                                                              <span class="databox-number lightcarbon no-margin">224</span>
                                                              <span class="databox-text lightcarbon no-margin">Sale Unit / Hour</span>

                                                          </div>
                                                      </div>

                                                  </div>
                                                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                      <div class="databox databox-xlg databox-vertical databox-inverted databox-shadowed">
                                                          <div class="databox-top">
                                                              <div class="databox-sparkline">
                                                                  <span data-sparkline="line" data-height="125px" data-width="100%" data-fillcolor="false" data-linecolor="themefourthcolor"
                                                                        data-spotcolor="#fafafa" data-minspotcolor="#fafafa" data-maxspotcolor="#8cc474"
                                                                        data-highlightspotcolor="#8cc474" data-highlightlinecolor="#8cc474"
                                                                        data-linewidth="1.5" data-spotradius="2">
                                                                      100,208,450,298,450,776,234,680,1100,1400,1000,1200
                                                                  </span>
                                                              </div>
                                                          </div>
                                                          <div class="databox-bottom no-padding text-align-center">
                                                              <span class="databox-number lightcarbon no-margin">7063$</span>
                                                              <span class="databox-text lightcarbon no-margin">Income / Hour</span>

                                                          </div>
                                                      </div>

                                                  </div>
                                                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                      <div class="databox databox-xlg databox-vertical databox-inverted databox-shadowed">
                                                          <div class="databox-top">
                                                              <div class="databox-piechart">
                                                                  <div data-toggle="easypiechart" class="easyPieChart block-center"
                                                                       data-barcolor="themeprimary" data-linecap="butt" data-percent="80" data-animate="500"
                                                                       data-linewidth="8" data-size="125" data-trackcolor="#eee">
                                                                      <span class="font-200"><i class="fa fa-gift themeprimary"></i></span>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="databox-bottom no-padding text-align-center">
                                                              <span class="databox-number lightcarbon no-margin">9</span>
                                                              <span class="databox-text lightcarbon no-margin">NEW ORDERS</span>

                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                      <div class="databox databox-xlg databox-vertical databox-inverted  databox-shadowed">
                                                          <div class="databox-top">
                                                              <div class="databox-piechart">
                                                                  <div data-toggle="easypiechart" class="easyPieChart block-center"
                                                                       data-barcolor="themethirdcolor" data-linecap="butt" data-percent="40" data-animate="500"
                                                                       data-linewidth="8" data-size="125" data-trackcolor="#eee">
                                                                      <span class="white font-200"><i class="fa fa-tags themethirdcolor"></i></span>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="databox-bottom no-padding text-align-center">
                                                              <span class="databox-number lightcarbon no-margin">11</span>
                                                              <span class="databox-text lightcarbon no-margin">NEW TICKETS</span>

                                                          </div>
                                                      </div>
                                                  </div>

                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="box-visits">
                                  <div class="row">
                                      <div class="col-lg-4 col-sm-4 col-xs-12">
                                          <div class="notification">
                                              <div class="clearfix">
                                                  <div class="notification-icon">
                                                      <i class="fa fa-gift palegreen bordered-1 bordered-palegreen"></i>
                                                  </div>
                                                  <div class="notification-body">
                                                      <span class="title">Kate birthday party</span>
                                                      <span class="description">08:30 pm</span>
                                                  </div>
                                                  <div class="notification-extra">
                                                      <i class="fa fa-calendar palegreen"></i>
                                                      <i class="fa fa-clock-o palegreen"></i>
                                                      <span class="description">at home</span>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-lg-4 col-sm-4 col-xs-12">
                                          <div class="notification">
                                              <div class="clearfix">
                                                  <div class="notification-icon">
                                                      <i class="fa fa-check azure bordered-1 bordered-azure"></i>
                                                  </div>
                                                  <div class="notification-body">
                                                      <span class="title">Hanging out with kids</span>
                                                      <span class="description">03:30 pm - 05:15 pm</span>
                                                  </div>
                                                  <div class="notification-extra">
                                                      <i class="fa fa-clock-o azure"></i>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-lg-4 col-sm-4 col-xs-12">
                                          <div class="notification">
                                              <div class="clearfix">
                                                  <div class="notification-icon">
                                                      <i class="fa fa-phone bordered-1 bordered-orange orange"></i>
                                                  </div>
                                                  <div class="notification-body">
                                                      <span class="title">Meeting with Patty</span>
                                                      <span class="description">01:00 pm</span>
                                                  </div>
                                                  <div class="notification-extra">
                                                      <i class="fa fa-clock-o orange"></i>
                                                      <span class="description">office</span>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>-->
    </div>
    <!-- /Page Body -->
</div>
<!--Page Related Scripts-->
<!--Sparkline Charts Needed Scripts-->
<script src="<?= $conf['template_admin']; ?>/assets/js/charts/sparkline/jquery.sparkline.js"></script>
<script src="<?= $conf['template_admin']; ?>/assets/js/charts/sparkline/sparkline-init.js"></script>

<!--Easy Pie Charts Needed Scripts-->
<script src="<?= $conf['template_admin']; ?>/assets/js/charts/easypiechart/jquery.easypiechart.js"></script>
<script src="<?= $conf['template_admin']; ?>/assets/js/charts/easypiechart/easypiechart-init.js"></script>

<script>
    // If you want to draw your charts with Theme colors you must run initiating charts after that current skin is loaded
    $(window).bind("load", function () {

        /*Sets Themed Colors Based on Themes*/
        themeprimary = getThemeColorFromCss('themeprimary');
        themesecondary = getThemeColorFromCss('themesecondary');
        themethirdcolor = getThemeColorFromCss('themethirdcolor');
        themefourthcolor = getThemeColorFromCss('themefourthcolor');
        themefifthcolor = getThemeColorFromCss('themefifthcolor');

        //Sets The Hidden Chart Width
        $('#dashboard-bandwidth-chart')
            .data('width', $('.box-tabbs')
                .width() - 20);

        //-------------------------Visitor Sources Pie Chart----------------------------------------//
        /* var data = [
             {
                 data: [[1, 21]],
                 color: '#fb6e52'
             },
             {
                 data: [[1, 12]],
                 color: '#e75b8d'
             },
             {
                 data: [[1, 11]],
                 color: '#a0d468'
             },
             {
                 data: [[1, 10]],
                 color: '#ffce55'
             },
             {
                 data: [[1, 46]],
                 color: '#5db2ff'
             }
         ];
         var placeholder = $("#dashboard-pie-chart-sources");
         placeholder.unbind();

         $.plot(placeholder, data, {
             series: {
                 pie: {
                     innerRadius: 0.45,
                     show: true,
                     stroke: {
                         width: 4
                     }
                 }
             }
         });*/

        //------------------------------Visit Chart------------------------------------------------//
        /*  var data2 = [{
              color: themesecondary,
              label: "Direct Visits",
              data: [[3, 2], [4, 5], [5, 4], [6, 11], [7, 12], [8, 11], [9, 8], [10, 14], [11, 12], [12, 16], [13, 9],
              [14, 10], [15, 14], [16, 15], [17, 9]],

              lines: {
                  show: true,
                  fill: true,
                  lineWidth: .1,
                  fillColor: {
                      colors: [{
                          opacity: 0
                      }, {
                          opacity: 0.4
                      }]
                  }
              },
              points: {
                  show: false
              },
              shadowSize: 0
          },
              {
                  color: themeprimary,
                  label: "Referral Visits",
                  data: [[3, 10], [4, 13], [5, 12], [6, 16], [7, 19], [8, 19], [9, 24], [10, 19], [11, 18], [12, 21], [13, 17],
                  [14, 14], [15, 12], [16, 14], [17, 15]],
                  bars: {
                      order: 1,
                      show: true,
                      borderWidth: 0,
                      barWidth: 0.4,
                      lineWidth: .5,
                      fillColor: {
                          colors: [{
                              opacity: 0.4
                          }, {
                              opacity: 1
                          }]
                      }
                  }
              },
              {
                  color: themethirdcolor,
                  label: "Search Engines",
                  data: [[3, 14], [4, 11], [5, 10], [6, 9], [7, 5], [8, 8], [9, 5], [10, 6], [11, 4], [12, 7], [13, 4],
                  [14, 3], [15, 4], [16, 6], [17, 4]],
                  lines: {
                      show: true,
                      fill: false,
                      fillColor: {
                          colors: [{
                              opacity: 0.3
                          }, {
                              opacity: 0
                          }]
                      }
                  },
                  points: {
                      show: true
                  }
              }
          ];
          var options = {
              legend: {
                  show: false
              },
              xaxis: {
                  tickDecimals: 0,
                  color: '#f3f3f3'
              },
              yaxis: {
                  min: 0,
                  color: '#f3f3f3',
                  tickFormatter: function (val, axis) {
                      return "";
                  },
              },
              grid: {
                  hoverable: true,
                  clickable: false,
                  borderWidth: 0,
                  aboveData: false,
                  color: '#fbfbfb'

              },
              tooltip: true,
              tooltipOpts: {
                  defaultTheme: false,
                  content: " <b>%x May</b> , <b>%s</b> : <span>%y</span>",
              }
          };
          var placeholder = $("#dashboard-chart-visits");
          var plot = $.plot(placeholder, data2, options);*/

        //------------------------------Real-Time Chart-------------------------------------------//
        /*var realTimedata = [],
            realTimedata2 = [],
            totalPoints = 300;

        var getSeriesObj = function () {
            return [
            {
                data: getRandomData(),
                lines: {
                    show: true,
                    lineWidth: 1,
                    fill: true,
                    fillColor: {
                        colors: [
                            {
                                opacity: 0
                            }, {
                                opacity: 1
                            }
                        ]
                    },
                    steps: false
                },
                shadowSize: 0
            }, {
                data: getRandomData2(),
                lines: {
                    lineWidth: 0,
                    fill: true,
                    fillColor: {
                        colors: [
                            {
                                opacity: .5
                            }, {
                                opacity: 1
                            }
                        ]
                    },
                    steps: false
                },
                shadowSize: 0
            }
            ];
        };
        function getRandomData() {
            if (realTimedata.length > 0)
                realTimedata = realTimedata.slice(1);

            // Do a random walk

            while (realTimedata.length < totalPoints) {

                var prev = realTimedata.length > 0 ? realTimedata[realTimedata.length - 1] : 50,
                    y = prev + Math.random() * 10 - 5;

                if (y < 0) {
                    y = 0;
                } else if (y > 100) {
                    y = 100;
                }
                realTimedata.push(y);
            }

            // Zip the generated y values with the x values

            var res = [];
            for (var i = 0; i < realTimedata.length; ++i) {
                res.push([i, realTimedata[i]]);
            }

            return res;
        }
        function getRandomData2() {
            if (realTimedata2.length > 0)
                realTimedata2 = realTimedata2.slice(1);

            // Do a random walk

            while (realTimedata2.length < totalPoints) {

                var prev = realTimedata2.length > 0 ? realTimedata[realTimedata2.length] : 50,
                    y = prev - 25;

                if (y < 0) {
                    y = 0;
                } else if (y > 100) {
                    y = 100;
                }
                realTimedata2.push(y);
            }


            var res = [];
            for (var i = 0; i < realTimedata2.length; ++i) {
                res.push([i, realTimedata2[i]]);
            }

            return res;
        }
        // Set up the control widget
        var updateInterval = 500;
        var plot = $.plot("#dashboard-chart-realtime", getSeriesObj(), {
            yaxis: {
                color: '#f3f3f3',
                min: 0,
                max: 100,
                tickFormatter: function (val, axis) {
                    return "";
                }
            },
            xaxis: {
                color: '#f3f3f3',
                min: 0,
                max: 100,
                tickFormatter: function (val, axis) {
                    return "";
                }
            },
            grid: {
                hoverable: true,
                clickable: false,
                borderWidth: 0,
                aboveData: false
            },
            colors: ['#eee', themeprimary],
        });

        function update() {

            plot.setData(getSeriesObj());

            plot.draw();
            setTimeout(update, updateInterval);
        }
        update();*/


        //-------------------------Initiates Easy Pie Chart instances in page--------------------//
        InitiateEasyPieChart.init();

        //-------------------------Initiates Sparkline Chart instances in page------------------//
        InitiateSparklineCharts.init();
    });

</script>
