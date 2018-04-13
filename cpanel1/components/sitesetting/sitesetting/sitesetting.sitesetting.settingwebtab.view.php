<?php defined( '_VALID_MOS' ) or die( include("404.php") ); ?>
<form id="validateSubmitForm" name="myForm" method="post">
    <div id="wrapper">	
        <div id="content">
            <ul class="breadcrumb">
                <li><a href="." class="glyphicons home"><i></i> Cpanel</a></li>                
                <li class="divider"></li>
                <li>Thiết lập cấu hình website</li>
            </ul>
            <div class="separator bottom"></div>
    
            <div class="heading-buttons">
                <h3 class="glyphicons settings"><i></i> Thiết lập cấu hình website</h3>
                <div class="buttons pull-right">
                    <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a>
                    <button type="submit" class="btn btn-primary btn-icon glyphicons edit"><i></i>Cập nhật</button>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="separator bottom"></div>
    
            <div class="widget widget-2 widget-tabs">
                <div class="widget-head">
					<h4 class="heading glyphicons settings"><i></i>Cấu hình chung</h4>
				</div>
                <div class="widget-body" style="padding: 20px;">
                
                	<div class="row-fluid">
						<div class="span3">
							<strong>Thông tin chung</strong>
							<p class="muted">Thông tin thiết lập tình trạng website. Thẻ tiêu đề và thẻ mô tả giúp xác định cửa hàng của bạn xuất hiện trên công cụ tìm kiếm.</p>
						</div>
						<div class="span9">
							<label class="control-label">Link website: <strong>http://superweb.vn/webtienich</strong></label>
							<div class="separator"></div>
                            <label class="control-label">Ngày tạo: <strong>01/01/2018</strong></label>
							<div class="separator"></div>
                            <label class="control-label">Tình trạng: <input <?php if( $conf['app']['site_status'] ) { echo "checked"; } ?> value="1" type="checkbox" class="checkbox" name="site_status" id="site_status" onclick="javascript:Issitestatus();"/> Hoạt động
                            <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Lựa chọn tình trạng website cho phép hoạt động hay tạm dừng."></span></label>
                            <div class="row-fluid" id="pSiteCloseContent" style="display:none">
                                <div class="span3">	
                                    <label class="control-label" for="keyword">Nội dung bảo trì </label>
                                </div>
                                <div class="span9">
                                    <div class="controls">
                                        <textarea id="site_close_msg" name="site_close_msg" class="span6" rows="3"><?= $conf['app']['site_status']; ?></textarea>
                                        <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Nhập nội dung thông báo bảo trì website"></span>
                                    </div>                            
                                    <div class="separator"></div>
                                </div>
                            </div>
                            
							<div class="separator"></div>
									
							<label for="website_title">Tiêu đề website</label>
                            <input value="<?= $conf['app']['website_title']; ?>" type="text" id="website_title" name="website_title" class="span7" >
							<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Nhập nội dung tiêu đề website. Ví dụ một website chuyên bán mỹ phẩm có thể nhập tiêu đề như sau: Mỹ phẩm | Mỹ phẩm giá gốc | Mỹ phẩm nhau cừu"></span>
							<div class="separator"></div>
							
							<label for="keyword">Từ khóa</label>
                            <textarea id="keyword" name="keyword" class="span7" rows="3"><?= $conf['app']['keyword']; ?></textarea>
							<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Nhập nội dung các từ khóa bạn muốn SEO trên google vào"></span>
							<div class="separator"></div>
                            
                            <label for="description">Mô tả</label>
                            <textarea id="description" name="description" class="span7" rows="3"><?= $conf['app']['description']; ?></textarea>
                            <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Nhập nội dung miêu tả về website và sản phẩm vào, ví dụ như website bán mỹ phẩm có thể nhập mô tả như sau: mỹ phẩm giá gốc, Mỹ phẩm giá gốc giúp chị em chăm sóc da, Làm Sạch, Dưỡng da cơ bản,  trị nám, Trị mụn, Trắng da…"></span>
							<div class="separator"></div>
                            
                            <label for="email_admin">Email quản trị</label>
                            <input value="<?= $conf['app']['email_admin']; ?>" type="text" id="email_admin" name="email_admin" class="span7">
                            <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Tất cả các liên hệ hay đơn đặt hàng của khách hàng sẽ được gửi vào hệ thống quản trị website đồng thời đến email quản trị, và email quản trị này có thể thay đổi."></span>
                            <div style="font-style: italic;">(Các email phân cách nhau bởi dấu '<strong style="color: #F00;">;</strong>')</div>
							<div class="separator"></div>                                                        
                            
						</div>
					</div>
                    <hr class="separator bottom">
                    <div class="row-fluid">
						<div class="span3">
							<strong>Địa chỉ cửa hàng</strong>
							<p class="muted">Tên cửa hàng và địa chỉ sẽ xuất hiện trên háo đơn của bạn.</p>
						</div>
						<div class="span9">	
									
							<label for="company_name">Tên đăng ký giấy phép kinh doanh (GPKD) của doanh nghiệp</label>
                            <input type="text" id="company_name" name="company_name" class="span6" value="<?= $conf['app']['company_name']; ?>" >
                            <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Điền nội dung tên công ty hiển thị trên phần Liên hệ của website."></span>
							<div class="separator"></div>
							
							<label for="address">Địa chỉ</label>
                            <input type="text" id="address" name="address" class="span6" value="<?= $conf['app']['address']; ?>">
                            <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Số điện liên hệ của website."></span>
							<div class="separator"></div>
                            
                            <label for="phone">Điện thoại</label>
                            <input type="text" id="phone" name="phone" class="span3" value="<?= $conf['app']['phone']; ?>">
                            <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Số điện thoại hiển thị trong phần Liên hệ của website."></span>
							<div class="separator"></div>
                            
                            <label for="fax">Fax</label>
                            <input type="text" id="fax" name="fax" class="span3" value="<?= $conf['app']['fax']; ?>">
                            <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Địa chỉ Fax, hiển thị trong phần Liên hệ của website."></span>
							<div class="separator"></div>                                                       
                            
						</div>
					</div>                    
                    <hr class="separator bottom">
                    <div class="row-fluid">
						<div class="span3">
							<strong>Cấu hình website</strong>
							<p class="muted">Tùy chọn các thông số website theo yêu cầu của bạn.</p>
						</div>
						<div class="span9">                            
                            
                            <label for="page_default">Trang mặc định</label>
                            <select class="span3" id="page_default" name="page_default">
								<?php 
                                    $page_default = array(		
                                        array("1", "Trang chủ"),
                                        array("2", "Tin tức"),
                                        array("3", "Chi tiết sản phẩm")
                                    );
                                    for($i=0; $i < count($page_default); $i++){ ?>
                                        <option <?php if( $page_default[$i][0] == $conf['app']['page_default'] ) { echo "selected"; } ?> value="<?= $page_default[$i][0]; ?>"><?= $page_default[$i][1]; ?></option>
                                <?php } ?>
                            </select>
                            <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Lựa chọn trang đầu tiên hiện ra khi người dùng truy cập vào địa chỉ trang web"></span>
							<div class="separator"></div>
                            
                            <label for="default_language">Ngôn ngữ mặc định</label>
                            <select class="span3" id="default_language" name="default_language">                                           
								<?php 
                                    $default_language = array(		
                                        array("vi-VN", "Việt Nam"),
                                        array("en-US", "English")
                                    );
                                    for($i=0; $i < count($default_language); $i++){ ?>
                                        <option <?php if( $default_language[$i][0] == $conf['app']['default_language'] ) { echo "selected"; } ?> value="<?= $default_language[$i][0]; ?>"><?= $default_language[$i][1]; ?></option>
                                <?php } ?>
                            </select>
							<div class="separator"></div>
                            
                            <label for="www_redirect">Chuyển hướng www</label>
                            <select class="span3" id="www_redirect" name="www_redirect">
								<?php 
                                    $www_redirect = array(		
                                        array("-1", "Không chuyễn"),
                                        array("www", "Chuyển hướng từ không www sang www"),
                                        array("non-www", "Chuyển hướng từ www sang không www")
                                    );
                                    for($i=0; $i < count($www_redirect); $i++){ ?>
                                        <option <?php if( $www_redirect[$i][0] == $conf['app']['www_redirect'] ) { echo "selected"; } ?> value="<?= $www_redirect[$i][0]; ?>"><?= $www_redirect[$i][1]; ?></option>
                                <?php } ?>                                            
                            </select>
							<div class="separator"></div>
                            
                            <label for="smart_search">Sử dụng tìm kiếm thông minh</label>
                            <select class="span3" id="smart_search" name="smart_search">                                           
								<?php 
                                    $smart_search = array(		
                                        array("False", "Không"),
                                        array("True", "Có")
                                    );
                                    for($i=0; $i < count($smart_search); $i++){ ?>
                                        <option <?php if( $smart_search[$i][0] == $conf['app']['smart_search'] ) { echo "selected"; } ?> value="<?= $smart_search[$i][0]; ?>"><?= $smart_search[$i][1]; ?></option>
                                <?php } ?>
                            </select>
							<div class="separator"></div>
                            
                            <label for="search_product">Cấu hình tìm kiếm website</label>
                            <select class="span3" id="search_product" name="search_product">
                                <option value="OnlyProd" <?php if ($conf['app']['search_product'] == 'OnlyProd') echo ' selected="selected"'; ?>>Chỉ t&#236;m kiếm sản phẩm</option>
                                <option value="OnlyNews" <?php if ($conf['app']['search_product'] == 'OnlyNews') echo ' selected="selected"'; ?>>Chỉ t&#236;m kiếm tin tức</option>
                                <option value="BothProdAndNews" <?php if ($conf['app']['search_product'] == 'BothProdAndNews') echo ' selected="selected"'; ?>>Sản phẩm v&#224; tin tức</option>
                            </select>
							<div class="separator"></div>
                            
						</div>
					</div>
                    
                    <hr class="separator bottom">
                    <div class="row-fluid">
						<div class="span3">
							<strong>Cài đặt tracking web</strong>
							<p class="muted">Thiết lập Google Analytics và Facebook ApplicationID.</p>
						</div>
						<div class="span9">                            
                            
                            <div id="cph_Main_ctl00_ctl00_AdvanceSetting" style="display: block;">
                                <p>Để tích hợp Google Analytics vào website của bạn, bạn cần thực hiện các bước sau:</p>
                                <ul>
                                    <li><a href="http://www.google.com/analytics/" target="_blank">Tạo 1 tài khoản Google Analytics</a> và làm theo hướng dẫn để thêm trang web của bạn.</li>
                                    <li>Sao chép mã theo dõi từ Google Analytics vào ô phía dưới</li>
                                    <li>Ấn <strong>"Lưu"</strong> để Google Analytics được tích hợp vào website của bạn</li>
                                </ul>
                                <div class="separator bottom"></div>
                                <div class="row-fluid">
                                    <label for="GACode">Google Analytics Code:</label>                                    
                                    <input type="text" class="span3" name="GACode" id="GACode" value="<?= $conf['app']['ga_code']; ?>">
                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Đoạn mã Google Analytics, giúp bạn sử dụng một dịch vụ của Google để thống kê, phân tích website."></span>
                                    <?php 
                                        if(!empty($_SESSION["validator"]["GACode"])){
                                            echo $_SESSION["validator"]["GACode"];
                                        }
                                    ?>                                        
                                </div>
                                
                            </div>
							<div class="separator"></div>
                            
                            <label for="id_facebook">Facebook ApplicationID</label>
                            <input type="text" id="id_facebook" name="id_facebook" class="span3" value="<?= $conf['app']['id_facebook']; ?>" >
							<div class="separator"></div>
                            
						</div>
					</div>                    
                    
                </div>
            </div>
                
        </div>
        <!-- End Content -->
        <input type="hidden" name="hidden" value="sitesetting" />
    </div>
        
	<script type="text/javascript">
        <?php if(!empty($_SESSION["validator"])){ unset($_SESSION["validator"]); } ?>
        
        $.validator.setDefaults(
        {
            submitHandler: function(form) {
                //alert("submitted!");
                //var val = $("input[type=submit][clicked=true]").val();
                //alert(val);
                
                //var btn = $( ":input[type=submit]:focus" );
                //alert(btn.val());
                //$("#validateSubmitForm").submit();
                form.submit();
            },
            showErrors: function(map, list) 
            {
                this.currentElements.parents('label:first, .controls:first').find('.error').remove();
                this.currentElements.parents('.row-fluid:first').removeClass('error');
                
                $.each(list, function(index, error) 
                {
                    var ee = $(error.element);
                    var eep = ee.parents('label:first').length ? ee.parents('label:first') : ee.parents('.controls:first');
                    
                    ee.parents('.row-fluid:first').addClass('error');
                    eep.find('.error').remove();
                    eep.append('<p class="error help-block"><span class="label label-important">' + error.message + '</span></p>');
                });
                //refreshScrollers();
            }
        });
        
        $(function()
        {
            // validate signup form on keyup and submit
            $("#validateSubmitForm").validate({
                rules: {
                    website_title: "required",
                    keyword: "required",
                    description: "required",						
                    email_admin: {
                        required: true,
                        email: true
                    }						
                },
                messages: {
                    website_title: "Tiêu đề website không được bỏ trống",
                    keyword: "Từ khoá không được bỏ trống",
                    description: "Mô tả website không được bỏ trống",						
                    email_admin: "Email không được bỏ trống"						
                }
            });							
        });
        Issitestatus();
        function Issitestatus(){
            if(jQuery("[id$=site_status]").attr("checked") == "checked"){
                jQuery("#pSiteCloseContent").hide();
            }
            else{
                jQuery("#pSiteCloseContent").show();
            }
        }
    </script>
        
</form>