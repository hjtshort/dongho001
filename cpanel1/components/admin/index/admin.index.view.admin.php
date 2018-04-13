<?php defined( '_VALID_MOS' ) or die( include("404.php") );
if( isset($_SESSION["wti"]) || !empty($_SESSION["wti"]) ){
?>
 <div id="wrapper">		
		<div id="content" style="padding: 10px 10px 0px 10px;">
		<ul class="breadcrumb">
            <li><a href="index.html?lang=en" class="glyphicons home"><i></i> AdminPlus</a></li>
            <li class="divider"></li>
            <li>Online Shop</li>
            <li class="divider"></li>
            <li>Add product</li>
        </ul>
<div class="separator bottom"></div>
<div class="heading-buttons">
	<h3 class="glyphicons display"><i></i>Bảng điều khiển</h3>
	<div class="clearfix"></div>
</div>
<div class="separator bottom"></div>
<!-- Modal Email Hide-->
                    <div class="modal hide fade" id="modal-simple" style="width: 80%;left:32%">
                        <!-- Modal heading -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3>Contact</h3>
                        </div>
                        <!-- // Modal heading END -->
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="mosaic-line mosaic-line-2">
                                <div class="container-960 center">
                                    <h2 class="margin-none"><strong class="text-primary">Web Tiện Ích</strong> <span class="hidden-phone">luôn sẵn sàng lắng nghe những yêu cầu và đóng góp của bạn</span></h2>
                                </div>
                            </div>
                            <div class="container-960 innerTB">
                            <div class="separator bottom"></div>
                            <div class="row-fluid">
                                <div class="span7">
                                    <h3 class="glyphicons google_maps"><i></i>Contact us</h3>
                                    <form class="row-fluid margin-none">
                                        <div class="span6">
                                            <input type="text" class="span12" name="name" placeholder="YOUR NAME">
                                        </div>
                                        <div class="span6"> 
                                            <input type="text" class="span12" name="phone" placeholder="PHONE">
                                        </div>
                                        <textarea name="message" class="span12" rows="5" placeholder="YOUR MESSAGE"></textarea>
                                        <div class="right">
                                            <button class="btn btn-primary btn-icon glyphicons envelope"><i></i> Send message</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="span5">
                                    <div class="well margin-none">
                                        <address class="margin-none">
                                            <h2>John Doe</h2>
                                            <strong>Business manager</strong> at 
                                            <strong><a href="#">Business</a></strong><br> 
                                            <abbr title="Work email">e-mail:</abbr> <a href="mailto:#">john.doe@mybiz.com</a><br> 
                                            <abbr title="Work Phone">phone:</abbr> (012) 345-678-901<br>
                                            <abbr title="Work Fax">fax:</abbr> (012) 678-132-901
                                            <div class="separator line"></div>
                                            <p class="margin-none"><strong>You can also find us:</strong><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tristique rutrum libero, vel bibendum nunc consectetur sed.</p>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- // Modal body END -->
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <a href="#" class="btn btn-default" data-dismiss="modal">Đóng</a> 
                        </div>
                        <!-- // Modal footer END -->
                        
                    </div>
<!-- // Modal END -->	

<div class="innerLR">
	<div class="row-fluid">
		<div class="span6">
			<div class="widget widget-3">
	<div class="widget-head">
		<h4 class="heading glyphicons volume_up" style="float:left;"><i></i>Thông báo</h4>
	</div>
    <div class="widget-body" style="padding: 4px;">
	<div class="accordion accordion-2" id="accordion" style="margin: 0 0 20px;">
						<div class="accordion-group">
							<div class="accordion-heading">
								<a class="accordion-toggle glyphicons circle_info collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-1">
									<i></i>Thông báo thời gian nâng cấp phiên bản webtienich 4.0</a>
						    </div>
						    <div id="collapse-1" class="accordion-body collapse" style="height: 0px;">
						      	<div class="accordion-inner">
						        	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
						      	</div>
						    </div>
					  	</div>
					  	<div class="accordion-group">
						    <div class="accordion-heading">
						      	<a class="accordion-toggle glyphicons circle_info collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-2">
						        	<i></i>Ra mắt phiên bản mới Bizweb 4.5 với chương trình khuyến mại cực khủng</a>
						    </div>
						    <div id="collapse-2" class="accordion-body collapse" style="height: 0px;">
						    	<div class="accordion-inner">
						        	It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
						      	</div>
						    </div>
					  	</div>
					  	<div class="accordion-group">
						    <div class="accordion-heading">
						      	<a class="accordion-toggle glyphicons circle_info collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-3">
						        	<i></i>Thông báo bảo trì hệ thống máy chủ Bizweb</a>
						    </div>
						    <div id="collapse-3" class="accordion-body collapse" style="height: 0px;">
						    	<div class="accordion-inner">
						        	<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
									<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
						      	</div>
						    </div>
					  	</div>
					  	<div class="accordion-group">
						    <div class="accordion-heading">
						      	<a class="accordion-toggle glyphicons circle_info collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-4">
						        	<i></i>Thông báo thay đổi chính sách gửi email của Yahoo và Gmail</a>
						    </div>
						    <div id="collapse-4" class="accordion-body collapse" style="height: 0px;">
						    	<div class="accordion-inner">
						        	There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
						      	</div>
						    </div>
					  	</div>
					</div></div>
</div>
		</div>
		<div class="span6">
			<div class="widget widget-3">
                <div class="widget-head">
                    <h4 class="heading glyphicons headset" style="float:left;"><i></i>Hổ trợ trực tuyến</h4>
                </div>
                <div class="widget-body">
                                <div class="row-fluid">
                                    <div class="span3 center">
							
								<!-- Profile Photo -->
								<a href="" class="thumb"><img data-src="holder.js/150x105/gray" alt="Profile" /></a>
								<div class="separator bottom"></div>
								<!-- // Profile Photo END -->
								
								<!-- Social Icons -->
								<a href="" class="glyphicons bluestandard primary facebook"><i></i></a>
								<a href="" class="glyphicons bluestandard skype"><i></i></a>
								<a href="" class="glyphicons bluestandard yahoo"><i></i></a>
                                <a href="#modal-simple" data-toggle="modal" class="glyphicons bluestandard e-mail"><i></i></a>
								<div class="clearfix separator bottom"></div>
								<!-- // Social Icons END -->
							</div>
                         <div class="span8" style="float:right">
                                    <div class="groupcheckbox">
                                        <div>
                                            <p>Hỗ trợ trực tiếp: <strong class="important">Nguyễn Anh Tuấn</strong></p>
                                        </div>
                                        <div>
                                            <p>Điện thoại: <strong>0164 796 1737</strong> <img class="ymsupporter" src="http://opi.yahoo.com/online?u=bizweb_hotro&amp;m=g&amp;t=1" alt=""></p>
                                        </div>
                                        <div>
                                            <p>Hoặc quý khách có thể liên hệ với:<img class="ymsupporter" src="http://opi.yahoo.com/online?u=bizweb_hotro&amp;m=g&amp;t=1" alt=""><strong>Bộ phận CSKH</strong></p>
                                        </div>
                                        <div>
                                            <p><strong>Điện thoại:</strong> 04.6674.5832 - <strong>Email:</strong> support@bizweb.vn</p>
                                        </div>
                                        <div>
                                            <p><a class="btn btn-danger btn-icon glyphicons circle_arrow_right" href="#"><i></i>Yêu cầu tính năng</a>
                                            <a class="btn btn-success btn-icon glyphicons leaf" href="#"><i></i>Trợ giúp</a></p>
                                        </div>
                                       </div>
                                        <div class="separator"></div>
                                    </div>           
                                </div>     
                            </div>
            </div>
		</div>
	</div>
</div>
<div class="separator bottom"></div>

<div class="innerLR">
	<div class="row-fluid">
		<div class="span6">
			<div class="widget widget-3">
	<div class="widget-head">
		<h4 class="heading glyphicons flash" style="float:left;"><i></i>Truy cập nhanh</h4>
	</div>
    <div class="widget-body" style="padding: 10px;">
    <div class="box-generic">

	<!-- Stats Widgets -->
	<div class="row-fluid">
	  
            <div class="span3">
            
                <!-- Stats Widget -->
                <a href="" class="widget-stats">
                    <span class="glyphicons circle_plus"><i></i></span>
                    <span class="txt">Thêm sản phẩm mới</span>
                    <div class="clearfix"></div>
                </a>
                <!-- // Stats Widget END -->
                
            </div>
            <div class="span3">
            
                <!-- Stats Widget -->
                <a href="" class="widget-stats">
                    <span class="glyphicons shopping_cart"><i></i></span>
                    <span class="txt">Danh sách đơn hàng</span>
                    <div class="clearfix"></div>
                </a>
                <!-- // Stats Widget END -->
                
            </div>
            <div class="span3">
            
                <!-- Stats Widget -->
                <a href="" class="widget-stats">
                    <span class="glyphicons list"><i></i></span>
                    <span class="txt">Danh mục sản phẩm</span>
                    <div class="clearfix"></div>
                </a>
                <!-- // Stats Widget END -->
                
            </div>
            <div class="span3">
            
                <!-- Stats Widget -->
                <a href="" class="widget-stats">
                    <span class="glyphicons qrcode"><i></i></span>
                    <span class="txt2">Thêm tin mới</span>
                    <div class="clearfix"></div>
                </a>
                <!-- // Stats Widget END -->
                
            </div>
	</div>
    <div class="row-fluid" style="padding-top: 10px;">
	  
            <div class="span3">
            
                <!-- Stats Widget -->
                <a href="" class="widget-stats">
                    <span class="glyphicons picture"><i></i></span>
                    <span class="txt">Giao diện website</span>
                    <div class="clearfix"></div>
                </a>
                <!-- // Stats Widget END -->
                
            </div>
            <div class="span3">
            
                <!-- Stats Widget -->
                <a href="" class="widget-stats">
                    <span class="glyphicons credit_card"><i></i></span>
                    <span class="txt2">Logo &amp; Banner</span>
                    <div class="clearfix"></div>
                </a>
                <!-- // Stats Widget END -->
                
            </div>
            <div class="span3">
            
                <!-- Stats Widget -->
                <a href="" class="widget-stats">
                    <span class="glyphicons cogwheel"><i></i></span>
                    <span class="txt2">Quản lý Menu</span>
                    <div class="clearfix"></div>
                </a>
                <!-- // Stats Widget END -->
                
            </div>
            <div class="span3">
            
                <!-- Stats Widget -->
                <a href="" class="widget-stats">
                    <span class="glyphicons settings"><i></i></span>
                    <span class="txt">Cấu hình website</span>
                    <div class="clearfix"></div>
                </a>
                <!-- // Stats Widget END -->
                
            </div>
	</div>
	<!-- // Row END -->
	</div>
	</div>
</div>
		</div>
		<div class="span6">
			<div class="widget widget-2 widget-tabs">
				
		<!-- Tabs Heading -->
		<div class="widget-head">
			<ul>
				<li class="active"><a class="glyphicons warning_sign" href="#tab-1" data-toggle="tab"><i></i><strong>Vấn đề thường gặp</strong></a></li>
				<li class=""><a class="glyphicons facetime_video" href="#tab-2" data-toggle="tab"><i></i><strong>Video hướng dẫn</strong></a></li>
                <li class=""><a class="glyphicons shopping_cart" href="#tab-3" data-toggle="tab"><i></i><strong>Giúp bạn bán hàng</strong></a></li>
			</ul>
		</div>
		<!-- // Tabs Heading END -->
		
		<div class="widget-body">
			<div class="tab-content">
			
				<!-- Tab content -->
				<div class="tab-pane active" id="tab-1">
					<div id="rssfeedsSupport" class="rssFeedDisplay">
                        <div class="item">
                            <a class="titlefield" target="_new" href="http://bizweb.vn/tro-giup/tong-quan-ve-bizweb-c2.html#item_9" rel="nofollow">Đăng ký gói giải pháp bán hàng trực tuyến</a><span class="datefield"></span></div>
                        <div class="item">
                            <a class="titlefield" target="_new" href="http://bizweb.vn/tro-giup/tong-quan-ve-bizweb-c2.html#item_14" rel="nofollow">Các dịch vụ BizWEB cung cấp </a><span class="datefield"></span>
                        </div>
                        <div class="item">
                            <a class="titlefield" target="_new" href="http://bizweb.vn/tro-giup/tich-hop-hang-tot-c53.html" rel="nofollow">Hướng dẫn sử dụng tính năng Tích hợp hàng tốt </a><span class="datefield">
                                </span>
                        </div>
                        <div class="item">
                            <a class="titlefield" target="_new" href="http://bizweb.vn/tro-giup/tong-quan-ve-bizweb-c2.html#item_15" rel="nofollow">Quy định sử dụng </a><span class="datefield"></span>
                        </div>
                        <div class="item">
                            <a class="titlefield" target="_new" href="http://bizweb.vn/tro-giup/tong-quan-ve-bizweb-c2.html#item_16" rel="nofollow">Chính sách bảo mật</a><span class="datefield"></span></div>
                        <div class="item">
                            <a class="titlefield" target="_new" href="http://bizweb.vn/tro-giup/tong-quan-ve-bizweb-c2.html#item_13" rel="nofollow">BizWeb là gì?</a><span class="datefield"></span></div>
                        <div class="item">
                            <a class="titlefield" target="_new" href="http://bizweb.vn/tro-giup/tong-quan-ve-bizweb-c2.html#item_12" rel="nofollow">Đăng ký dịch vụ thiết kế web đồ họa </a><span class="datefield">
                            </span>
                        </div>
                        <div class="item">
                            <a class="titlefield" target="_new" href="http://bizweb.vn/tro-giup/tong-quan-ve-bizweb-c2.html#item_10" rel="nofollow">Đăng ký tên miền trực tuyến </a><span class="datefield"></span>
                        </div>
                    </div>
				</div>
				<!-- // Tab content END -->
				
				<!-- Tab content -->
				<div class="tab-pane" id="tab-2">
					
				</div>
				<!-- // Tab content END -->
				
                <!-- Tab content -->
				<div class="tab-pane" id="tab-2">
					
				</div>
				<!-- // Tab content END -->
			</div>
		</div>
	</div>
		</div>
	</div>
</div>
<div class="separator bottom"></div>
<div class="well">
<div class="row-fluid">
		<div class="span6">
			<h4 class="glyphicons clock"><i></i> Thống kê nhanh</h4>
			<div class="btn-group btn-group-vertical block">
				<a class="btn btn-icon btn-default btn-block glyphicons group count"><i></i> <span>5,986</span>Tổng số khách hàng</a>
				<a class="btn btn-icon btn-default btn-block glyphicons user_add count"><i></i> <span>98</span>Khách hàng mới</a>
				<a class="btn btn-icon btn-default btn-block glyphicons shopping_cart count"><i></i> <span>305</span>Sản phẩm</a>
                <a class="btn btn-icon btn-default btn-block glyphicons table count"><i></i> <span>305</span>Danh mục sản phẩm</a>
			</div>
		</div>
		<div class="span6" style="position:relative;top: 28px">
			<div class="btn-group btn-group-vertical block">
				<a class="btn btn-icon btn-default btn-block glyphicons cargo count"><i></i> <span>687</span>Đơn hàng</a>
				<a class="btn btn-icon btn-default btn-block glyphicons download count"><i></i> <span>15</span>Đơn hàng đang chờ xuất</a>
				<a class="btn btn-icon btn-default btn-block glyphicons download count"><i></i> <span>3</span>Đơn hàng đang chờ nhận</a>
				<a class="btn btn-icon btn-primary btn-block glyphicons fire count"><i></i> <span>5</span>Liên hệ</a>
			</div>
		</div>
	</div>
<div class="separator bottom"></div>
<div class="separator bottom"></div>
<div class="row-fluid">
	<div class="span12">
		<div class="widget widget-2 widget-tabs">
			<div class="widget-head">
				<ul>
					<li class="active"><a class="glyphicons stats" href="#dataTableSourcesTab" data-toggle="tab"><i></i><strong>Thống kê bán hàng</strong></a></li>
					<li class=""><a class="glyphicons share_alt" href="#dataOrderTab" data-toggle="tab"><i></i><strong>Phản hồi đơn hàng</strong></a></li>
                    <li class=""><a class="glyphicons star" href="#dataRatingTab" data-toggle="tab"><i></i><strong>Đánh giá sản phẩm</strong></a></li>
				</ul>
			</div>
			<div class="widget-body">
				<div class="tab-content">
					<div class="tab-pane active" id="dataTableSourcesTab">
						<div id="dataTableSources">
                        <div class="innerLR">
	<div class="widget-activity">
		<ul class="filters">
			<li>Filter by</li>
			<li class="glyphicons user_add active"><i></i></li>
			<li class="glyphicons shopping_cart"><i></i></li>
			<li class="glyphicons envelope"><i></i></li>
			<li class="glyphicons link"><i></i></li>
			<li class="glyphicons camera"><i></i></li>
		</ul>
		<div class="clearfix"></div>
		<ul class="activities">
						<li class="highlight">
				<span class="glyphicons activity-icon shopping_cart"><i></i></span>
				<a href="">Client name</a> bought 10 items worth of €50 (<a href="">order #2301</a>)
			</li>
						<li>
				<span class="glyphicons activity-icon shopping_cart"><i></i></span>
				<a href="">Client name</a> bought 10 items worth of €50 (<a href="">order #2302</a>)
			</li>
						<li>
				<span class="glyphicons activity-icon shopping_cart"><i></i></span>
				<a href="">Client name</a> bought 10 items worth of €50 (<a href="">order #2303</a>)
			</li>
					</ul>
	</div>
</div>
                        </div>
					</div>
					<div class="tab-pane" id="dataOrderTab">
						<table class="table table-bordered table-condensed">
				<thead>
					<tr>
						<th class="center">No.</th>
						<th>Column Heading</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="center">1</td>
						<td>Lorem ipsum dolor</td>
					</tr>
					<tr>
						<td class="center">2</td>
						<td>Lorem ipsum dolor</td>
					</tr>
					<tr>
						<td class="center">3</td>
						<td>Lorem ipsum dolor</td>
					</tr>
				</tbody>
			</table>
					</div>
                    <div class="tab-pane" id="dataRatingTab">
						<div id="dataTableSources"></div>
					</div>
			</div>
		</div>
		<!-- <a href="" class="btn btn-block btn-icon right btn-inverse glyphicons cardio" style="margin-bottom: 20px;"><i></i> Full Analytics</a> -->
	</div>
</div>
</div>

				<!-- End Content -->
		</div>
        
		<div class="separator bottom"></div>
        <div class="widget widget-2 widget-tabs">
	<div class="widget-head">
		<ul>
			<li class="active"><a class="glyphicons cardio" href="#website-traffic-tab" data-toggle="tab"><i></i>Thống kê truy cập</a></li>
			<li><a class="glyphicons cardio" href="#website-traffic-tab2" data-toggle="tab"><i></i>Thống kê đơn hàng</a></li>
		</ul>
	</div>
	<div class="widget-body">
    	<div class="tab-content">
            <div class="tab-pane active" id="website-traffic-tab">
                <div class="btn-group separator bottom pull-right">
                    <button id="websiteTraffic24Hours" class="btn btn-small btn-default">24 Hours</button>
                    <button id="websiteTraffic7Days" class="btn btn-small btn-default">7 Days</button>
                    <button id="websiteTraffic14Days" class="btn btn-small btn-default">14 Days</button>
                    <button id="websiteTrafficClear" class="btn btn-small btn-default" disabled="disabled">Clear</button>
                </div>
                <div class="clearfix" style="clear: both;"></div>
                <div id="placeholder" style="height: 200px;"></div>
                <div id="overview" style="height: 40px;"></div>
            </div>
            <div class="tab-pane" id="website-traffic-tab2">
    			
            </div>
            </div>
	</div>
</div>
				<!-- End Wrapper -->
	</div>
				<!-- End Wrapper -->
</div>
 <div id="themer" class="collapse">
		<div class="wrapper">
			<span class="close2">&times; close</span>
			<h4>Themer <span>color options</span></h4>
			<ul>
				<li>Theme: <select id="themer-theme" class="pull-right"></select><div class="clearfix"></div></li>
				<li>Primary Color: <input type="text" data-type="minicolors" data-default="#ffffff" data-slider="hue" data-textfield="false" data-position="left" id="themer-primary-cp" /><div class="clearfix"></div></li>
				<li>
					<span class="link" id="themer-custom-reset">reset theme</span>
					<span class="pull-right"><label>advanced <input type="checkbox" value="1" id="themer-advanced-toggle" /></label></span>
				</li>
			</ul>
			
		</div>
	</div>     
<?php } ?>
	<!-- Holder Plugin -->
	<script src="<?php echo $template_admin; ?>/common/theme/scripts/plugins/other/holder/holder.js"></script>
	<script>Holder.add_theme("dark", {background:"#000", foreground:"#aaa", size:9})</script>
	
	
	
	<!-- Colors -->
	<script>
	var primaryColor = '#4a8bc2',
		dangerColor = '#b55151',
		successColor = '#609450',
		warningColor = '#ab7a4b',
		inverseColor = '#45484d';
	</script>
	
	<!-- Themer -->
	<script>
	var themerPrimaryColor = '#DA4C4C';
	</script>
	<script src="<?php echo $template_admin; ?>/common/theme/scripts/plugins/system/jquery.cookie.js"></script>
	<script src="<?php echo $template_admin; ?>/common/theme/scripts/demo/themer.js"></script>
	
	<!-- Global -->
	<script>
	var basePath = '',
		commonPath = '<?php echo $template_admin; ?>/common/',

		
		// charts data
		charts_data = {
			
			// 24 hours
			graph24hours: {
				from: 1370210400000,
				to: 1370296800000			},

			// 7 days
			graph7days: {
				from: 1369692000000,
				to: 1370296800000			},

			// 14 days
			graph14days: {
				from: 1369087200000,
				to: 1370296800000			},

			// main dashboard graph - website traffic
			website_traffic: {
				d1: [[1367791200000, 3167],[1367877600000, 3809],[1367964000000, 3107],[1368050400000, 2643],[1368136800000, 3049],[1368223200000, 3063],[1368309600000, 3346],[1368396000000, 2959],[1368482400000, 3962],[1368568800000, 2151],[1368655200000, 2898],[1368741600000, 3939],[1368828000000, 2020],[1368914400000, 2482],[1369000800000, 2497],[1369087200000, 3342],[1369173600000, 3283],[1369260000000, 2540],[1369346400000, 3193],[1369432800000, 3841],[1369519200000, 3658],[1369605600000, 2192],[1369692000000, 3590],[1369778400000, 3322],[1369864800000, 3740],[1369951200000, 3682],[1370037600000, 2875],[1370124000000, 2455],[1370210400000, 3529],[1370296800000, 3401]],
				d2: [[1367791200000, 433],[1367877600000, 463],[1367964000000, 423],[1368050400000, 501],[1368136800000, 434],[1368223200000, 484],[1368309600000, 604],[1368396000000, 596],[1368482400000, 672],[1368568800000, 473],[1368655200000, 680],[1368741600000, 605],[1368828000000, 675],[1368914400000, 535],[1369000800000, 472],[1369087200000, 596],[1369173600000, 649],[1369260000000, 553],[1369346400000, 441],[1369432800000, 699],[1369519200000, 634],[1369605600000, 502],[1369692000000, 563],[1369778400000, 441],[1369864800000, 431],[1369951200000, 500],[1370037600000, 619],[1370124000000, 466],[1370210400000, 587],[1370296800000, 452]]	
			}

		};
		
		jQuery(function()
		{
			// initialize charts
			if (typeof charts != 'undefined') 
			charts.initIndex();
		});
	</script>
	
	<!-- Dashboard Custom Script -->
	<script type="text/javascript" src="<?php echo $template_admin; ?>/common/theme/scripts/demo/index.js"></script>
	
	
		
	
		<!--  Flot (Charts) JS -->
	<script src="<?php echo $template_admin; ?>/common/theme/scripts/plugins/charts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="<?php echo $template_admin; ?>/common/theme/scripts/plugins/charts/flot/jquery.flot.pie.js" type="text/javascript"></script>
	<script src="<?php echo $template_admin; ?>/common/theme/scripts/plugins/charts/flot/jquery.flot.tooltip.js" type="text/javascript"></script>
	<script src="<?php echo $template_admin; ?>/common/theme/scripts/plugins/charts/flot/jquery.flot.selection.js"></script>
	<script src="<?php echo $template_admin; ?>/common/theme/scripts/plugins/charts/flot/jquery.flot.resize.js" type="text/javascript"></script>
	<script src="<?php echo $template_admin; ?>/common/theme/scripts/plugins/charts/flot/jquery.flot.orderBars.js" type="text/javascript"></script>
	
	<!-- Charts Helper Demo Script -->
	<script src="<?php echo $template_admin; ?>/common/theme/scripts/demo/charts.helper.js?1370451130"></script>
	