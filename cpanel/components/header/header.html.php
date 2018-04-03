<?php defined( '_VALID_MOS' ) or die( include("404.php") ); ?>

<!-- Start Content -->
<link href="templates/adminplus/common/theme/css/product-features.css" type="text/css" rel="stylesheet" />
<div class="container-fluid">
    
    <div class="navbar main hidden-print">
                
        <div class="LogoHeader">
            <div class="logoimage">
                <a class="SiteName" href="">
                    <img width="140" border="0" src="templates/adminplus/common/theme/images/wti_logo.png" alt="logo" title="logo">
                </a>
            </div>
            <div class="linkroot">
                <a class="SiteName" href="http://<?= $_SERVER['SERVER_NAME']; ?>" target="_blank">
                    <?= $_SERVER['SERVER_NAME']; ?>
                </a>
            </div>
        </div> 
                   
        <ul class="topnav pull-right">
            <li class="visible-desktop">
                <ul class="notif">
               	 <li><a href="admin/index/view.html" class="glyphicons home" data-toggle="tooltip" data-placement="bottom"><i></i> Trang chủ</a></li>
                    <li><a href="admin/users/view.html" class="glyphicons user" data-toggle="tooltip" data-placement="bottom"><i></i> Tài khoản quản trị</a></li>					
                </ul>
            </li>        
            <li class="visible-desktop">
                <ul class="notif">
                    <li><a href="" class="glyphicons envelope" data-toggle="tooltip" data-placement="bottom" data-original-title="5 new messages"><i></i> 5</a></li>
                    <li><a href="" class="glyphicons shopping_cart" data-toggle="tooltip" data-placement="bottom" data-original-title="1 new orders"><i></i> 1</a></li>
                    <li><a href="" class="glyphicons log_book" data-toggle="tooltip" data-placement="bottom" data-original-title="3 new activities"><i></i> 3</a></li>
                </ul>
            </li>
            <li class="dropdown visible-desktop">
                <a href="" data-toggle="dropdown" class="glyphicons cogwheel"><i></i>Thống kê <span class="caret"></span></a>
                <ul class="dropdown-menu pull-right">
                    <li><a href="#">Thống kê truy cập</a></li>
                    <li><a href="#">Thống kê dung lượng</a></li>
                    <li><a href="#">Thống kê đơn hàng</a></li>
                </ul>
            </li>
            <li class="hidden-phone">
                <a href="#" data-toggle="dropdown"><img src="./templates/adminplus/common/theme/images/lang/en.png" alt="en" /></a>
                <ul class="dropdown-menu pull-right">
                    <li class="active"><a href="?page=products&amp;lang=en" title="English"><img src="./templates/adminplus/common/theme/images/lang/en.png" alt="English"> English</a></li>
                    <li><a href="?page=products&amp;lang=ro" title="Romanian"><img src="./templates/adminplus/common/theme/images/lang/ro.png" alt="Romanian"> Romanian</a></li>
                    <li><a href="?page=products&amp;lang=it" title="Italian"><img src="./templates/adminplus/common/theme/images/lang/it.png" alt="Italian"> Italian</a></li>
                    <li><a href="?page=products&amp;lang=fr" title="French"><img src="./templates/adminplus/common/theme/images/lang/fr.png" alt="French"> French</a></li>
                    <li><a href="?page=products&amp;lang=pl" title="Polish"><img src="./templates/adminplus/common/theme/images/lang/pl.png" alt="Polish"> Polish</a></li>
                </ul>
            </li>
            <li class="account">
                <a data-toggle="dropdown" href="my_account.html?lang=en" class="glyphicons logout lock"><span class="hidden-phone text"><?= $_SESSION["wti"]["name"]; ?></span><i></i></a>
                <ul class="dropdown-menu pull-right">
                    <li><a href="my-accoutn.html?lang=en" class="glyphicons cogwheel">Cài đặt<i></i></a></li>
                    <li><a href="my_account.html?lang=en" class="glyphicons camera">Ảnh cá nhân<i></i></a></li>
                    <li class="highlight profile">
                        <span>
                            <span class="heading">Thông tin <a href="account/account/view.html" class="pull-right">Sữa</a></span>
                            <span class="img"></span>
                            <span class="details">
                                <a href="my_account.html?lang=en"><?= $_SESSION["wti"]["name"]; ?></a>
                                <?= $_SESSION["wti"]["email"]; ?>
                            </span>
                            <span class="clearfix"></span>
                        </span>
                    </li>
                    <li>
                        <span>
                            <a class="btn btn-default btn-small pull-right" style="padding: 2px 10px; background: #fff;" href="./login/logout.html">Thoát</a>
                        </span>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="clearfix"></div>
        <div class="siteinfo" style="font-size: 14px;color: #4a4a4a;float: right;display: block;margin-right:10px;">
            <ul style="padding: 0;margin: 0 0 10px 25px;">
                <li style="padding-top:5px;list-style: none;float: left;margin-left: 5px;">Bạn còn</li>
                <li class="block-time" style="border: solid 1px #e2e2e2;padding: 4px 5px;background-color: #f4f4f4;color: #22878E;font-weight: bold;font-size: 16px;list-style: none;float: left;margin-left: 5px;">14</li>
                <li style="margin-right:5px; padding-top:5px;list-style: none;float: left;margin-left: 5px;">ngày dùng thử miễn phí</li>
            </ul>
        </div>
    
    </div>
           
<style type="text/css">
	@charset "utf-8";
	/* CSS Document */
	
	.menu_top{
		width:100%;	
		height:38px;
		background:#37a6cd;	
	}
	.nav-container
	{
		padding-left: 10px;
	}
	
	.nav-container .navresponsive-controll
	{
		display:none;
	}
	
	.nav-container .nav-wrapper
	{
		list-style-type:none;
		margin:0; padding:0;
		width:100%;	
		margin:0 auto;
	}
	
	
	.nav-container .nav-wrapper li.nav-item
	{
		float:left;
		padding: 12px 20px 10px 20px;
		line-height:16px;
		color:#FFF;
		position:relative;
	}
	
	.nav-container .nav-wrapper .nav-item i
	{
		margin-right: 5px;
		vertical-align: text-top;
	}
	
	.nav-container .nav-wrapper .nav-item a
	{
		text-decoration:none;
		font-size:14px;
		color:#FFF;
		vertical-align: text-top;
	}
	
	.nav-container .nav-wrapper .nav-item .subnav-container
	{
		margin:0; padding:0;
		list-style-type:none;
		height:auto;
		display:none;
		min-width:225px;
		left: 0px;
		position:relative;
	}
	
	.nav-container .nav-wrapper .nav-item .subnav-container li.subitem
	{
		background-color:#55B5D6;
		padding: 0px 10px 0px 10px;
	}
	
	.nav-container .nav-wrapper .nav-item .subnav-container li.subitem a
	{
		display:block;
		border-bottom: 1px solid #7EC4DD;
		padding: 7px 10px 7px 10px;
	}
	@media (min-width:1280px)
	{
	
	.navbar.main .btn-navbar
	{
		display:none;
	}
	.nav-container
	{
		display:inline-block !important;
		height:auto;
	}
	
	
	.nav-container .navresponsive-controll
	{
		display:none !important;
	}
	.nav-container .nav-wrapper .nav-item .subnav-container
	{
		position:absolute;
		margin-top:10px;
		z-index:10000;
	}
	
	.nav-container .nav-wrapper .nav-item:hover
	{
		background-color:#55B5D6;
	}
	
	.nav-container .nav-wrapper .nav-item .subnav-container li.subitem:hover
	{
		background-color:#37a6cd;
	}
	}
	
	
	@media(max-width:660px)
	{
	.navbar.main .btn-navbar
	{
		display:block !important;
	}
	.nav-container
	{
		display:none;
	}
	
	.nav-container .nav-wrapper
	{
		width:100% !important;
	}
	
	.nav-container .navresponsive-controll
	{
		display:block !important;
	}
	
	.nav-container .nav-wrapper .nav-item
	{
		float:none !important;
		display:block;
		padding: 12px 20px 10px 20px;
		color:#FFF;
		border:none;
	}
}
</style>

<script type="text/javascript" language="javascript">
$(document).ready(function(e) {

    $(document).on('mouseenter', 'li.nav-item, li.nav-item a', function(e) {
        if(!$('.nav-container .navresponsive-controll').is(':hidden'))return;
        var cw = $(this).children('ul.subnav-container').innerHeight();
            $(this).children('ul.subnav-container').css({'display':'block', 'height':'0px'}).animate({'height':cw});
    });
    $(document).on('mouseleave', 'li.nav-item', function(e) {
        if(!$('.nav-container .navresponsive-controll').is(':hidden'))return;
        $(this).children('ul.subnav-container').css({'display':'none', 'height':'auto'});
    });
    
    $(document).on('click', 'li.nav-item', function(e) {
        
        if($('.nav-container .navresponsive-controll').is(':hidden'))return;
            if($('.nav-container .navresponsive-controll').is(':hidden'))return;
var cw = $(this).children('ul.subnav-container').innerHeight();
        if($(this).children('ul.subnav-container').is(':hidden'))
        {
            $('.subnav-container:not(:hidden)').each(function(index, element) {
            $(this).animate({'height':0}, function()
            {
                $(this).css({'display':'none', 'height':'auto'});
                });
            });
            $(this).children('ul.subnav-container').css({'display':'block', 'height':'0px'}).animate({'height':cw});
        }else
        {
            $(this).children('ul.subnav-container').animate({'height':0}, function()
            {
                $(this).css({'display':'none', 'height':'auto'});
            });
        }
    });
});
</script>
<div class="menu_top">
    <div class="nav-container">
        <span class="navresponsive-controll"></span>
        <ul class="nav-wrapper">
            <li class="nav-item">
                <i class="icon-shopping-cart"></i><a href="#">Đơn Hàng</a>
                <ul class="subnav-container">
                    <li class="subitem"><a href="orders/orders/view.html">Danh Sách Đơn Hàng</a></li>
                    <li class="subitem"><a href="orders/messages/view.html">Tin Nhắn Từ Khách Hàng</a></li>
                    <li class="subitem"><a href="orders/exportorders/view.html">Xuất Danh Sách Đơn Hàng</a></li>
                </ul>
            </li>
            
            <li class="nav-item">
                <i class="icon-tags"></i><a href="#">Sản Phẩm</a>
                <ul class="subnav-container">
                    <li class="subitem"><a href="product/product/view.html">Danh Sách Sản Phẩm</a></li>
                    <li class="subitem"><a href="product/category/view.html">Danh Mục Sản Phẩm</a></li>
                    <li class="subitem"><a href="product/vendors/view.html">Nhà Sản Xuất</a></li>
                    <!--<li class="subitem"><a href="product/customcategories/view.html">Danh Mục Tùy Chọn</a></li>-->
                    <li class="subitem"><a href="product/properties/view.html">Thuộc Tính Sản Phẩm</a></li>
                    <!--<li class="subitem"><a href="product/productoption/view.html">Nhóm Tùy Chọn Sản Phẩm</a></li>-->
                    <li class="subitem"><a href="product/productreviews/view.html">Đánh Gía, Phản Hồi Sản Phẩm</a></li>
                    <li class="subitem"><a href="product/import/view.html">Nhập Danh Sách Sản Phẩm</a></li>
                    <li class="subitem"><a href="product/export/view.html">Xuất Danh Sách Sản Phẩm</a></li>
                </ul>
            </li>
            
            <li class="nav-item">
                <i class="icon-th-large"></i><a href="#">Nội Dung</a>
                <ul class="subnav-container">
                    <li class="subitem"><a href="content/news/view.html">Quản Lý Tin Tức</a></li>
                    <li class="subitem"><a href="content/category/view.html">Danh Mục Tin</a></li>
                    <!--<li class="subitem"><a href="content/survey/view.html">Thăm Dò Ý Kiến</a></li>-->
                    <li class="subitem"><a href="content/gallery/view.html">Quản Lý ALbum Ảnh</a></li>
                    <!--<li class="subitem"><a href="content/download/view.html">Quản Lý Download</a></li>-->
                    <!--<li class="subitem"><a href="content/pages/view.html">Quản Lý Trang Chức Năng</a></li>-->
                    <li class="subitem"><a href="content/filemanager/view.html">Quản Lý Ảnh</a></li>
                </ul>
            </li>
    
    
            <li class="nav-item">
                <i class="icon-user"></i><a href="#">Khách Hàng</a>
                <ul class="subnav-container">
                    <li class="subitem"><a href="contacts/contacts/view.html">Liên Hệ Từ Khách Hàng</a></li>
                    <li class="subitem"><a href="contacts/customers/view.html">Danh Sách Khách Hàng</a></li>
					<li class="subitem"><a href="contacts/customergroups/view.html">Nhóm Khách Hàng</a></li>
                    <li class="subitem"><a href="contacts/emailsubscription/view.html">Danh Sách Email Đăng Ký</a></li>
                </ul>
            </li>
    
    
            <li class="nav-item">
                <i class="icon-globe"></i><a href="#">Tiếp Thị</a>
                <ul class="subnav-container">
                    <!--<li class="subitem"><a href="seo/seo/view.html">SEO Trên Google</a></li>-->
                    <li class="subitem"><a href="seo/promotion/view.html">Thiết Lập Khuyến Mãi</a></li>
                    <li class="subitem"><a href="seo/coupons/view.html">Mã Khuyến Mãi(Coupons)</a></li>
                    <li class="subitem"><a href="#">Tiếp Thị Qua Email</a></li>
                    <!--<li class="subitem"><a href="#">Quảng Cáo Trực Tuyến</a></li>-->
                </ul>
            </li>        
    		<!--
            <li class="nav-item">
                <i class="icon-plus"></i><a href="#">Tích Hợp</a>
                <ul class="subnav-container">
                    <li class="subitem"><a href="#">Gian Hàng</a></li>
                    <li class="subitem"><a href="#">Ứng Dụng Facebook</a></li>
                </ul>
            </li>
            -->    
            <li class="nav-item">
                <i class="icon-picture"></i><a href="#">Giao Diện</a>
                <ul class="subnav-container">
                    <li class="subitem"><a href="interface/menu/view.html">Quản Lý Menu</a></li>
                    <li class="subitem"><a href="interface/skin/view.html">Giao Diện Website</a></li>
                    <li class="subitem"><a href="interface/skin/edit.html">Cấu hình giao Diện</a></li>
                    <!--<li class="subitem"><a href="interface/skinmobile/view.html">Thiết Bị Di Động</a></li>-->
                    <!--<li class="subitem"><a href="interface/banner/view.html">Logo & Banner</a></li>-->
                    <!--<li class="subitem"><a href="interface/footer/view.html">Chân Trang (Footer)</a></li>-->
                    <!--<li class="subitem"><a href="interface/background/view.html">Thay Đổi Hình Nền</a></li>-->
                    <!--<li class="subitem"><a href="#">Template Thông Báo</a></li>-->
                </ul>
            </li>
    
    
            <li class="nav-item">
                <i class="icon-cogs"></i><a href="#">Cấu Hình</a>
                <ul class="subnav-container">
                    <li class="subitem"><a href="sitesetting/sitesetting/view.html">Cấu Hình Website</a></li>
                    <li class="subitem"><a href="sitesetting/currency/view.html">Cấu Hình Tiền Tệ</a></li>
                    <li class="subitem"><a href="sitesetting/payment/view.html">Cấu Hình Thanh Toán</a></li>
                    <li class="subitem"><a href="sitesetting/shipping/view.html">Cấu Hình Vận Chuyển</a></li>
                    <!--<li class="subitem"><a href="sitesetting/support/view.html">Hỗ Trợ Trực Tuyến</a></li>-->
                    <!--<li class="subitem"><a href="sitesetting/ftp/view.html">Cấu Hình FTP</a></li>-->
                    <li class="subitem"><a href="sitesetting/redirects/view.html">Chuyển Hướng 301</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>