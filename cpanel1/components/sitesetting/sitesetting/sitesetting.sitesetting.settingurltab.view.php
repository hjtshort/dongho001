<?php defined( '_VALID_MOS' ) or die( include("404.php") ); ?>
<form id="validateSubmitForm" name="myForm" method="post">
    <div id="wrapper">	
        <div id="content">
            <ul class="breadcrumb">
                <li><a href="index.html?lang=en" class="glyphicons home"><i></i> AdminPlus</a></li>
                <li class="divider"></li>
                <li>Online Shop</li>
                <li class="divider"></li>
                <li>Products</li>
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
                        <ul>
                            <li><a href="./sitesetting/sitesetting/view.html" class="glyphicons cogwheel"><i></i>Cấu hình website</a></li>
                            <li><a href="./sitesetting/sitesetting/view_settinginfotab.html" class="glyphicons message_plus"><i></i>Thông tin liên hệ</a></li>
                            <li><a href="./sitesetting/sitesetting/view_settingmaptab.html" class="glyphicons google_maps"><i></i>Bản đồ</a></li>
                            <li><a href="./sitesetting/sitesetting/view_settingviewtab.html" class="glyphicons show_big_thumbnails"><i></i>Cấu hình hiển thị</a></li>
                            <li><a href="./sitesetting/sitesetting/view_settingviewinfotab.html" class="glyphicons display"><i></i>Cấu hình tên miền</a></li>
                        	<li class="active"><a href="./sitesetting/sitesetting/view_settingurltab.html" class="glyphicons link"><i></i>Cài đặt Google Analytics</a></li>
                        </ul>
                    </div>
                    
                    <div class="widget-body" style="padding: 20px;">
                    
                        <div class="tab-pane" id="settingplustTab">
                        
                            <div class="row-fluid">
                                
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
                                            <div class="span3"><strong>Google Analytics Code:</strong></div>
                                            <div class="span9">
                                                <div class="controls">
                                                    <input type="text" class="span3" name="GACode" id="GACode" value="<?= $conf['app']['site']['settinginfo']['ga_code']; ?>">
                                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title=">Đoạn mã Google Analytics, giúp bạn sử dụng một dịch vụ của Google để thống kê, phân tích website."></span>
                                                </div>
                                            </div>
                                        </div>                                        
                                        
                                    </div>
                                </div>
                            </div>
    
                        </div>
                            <!-- Bộ lọc sản phẩm END -->
                    </div>
                </div>
                
        </div>
        <!-- End Content -->
        <input type="hidden" name="hidden" value="sitesetting.settingurltab.add" />
    </div>
        
	<script type="text/javascript">
        <?php if(!empty($_SESSION["message"]["notyfy"])){ ?>
            $(function () {
                func_notyfy("top", "information", "<?= $_SESSION["message"]["notyfy"]; ?>");
            });
        <?php unset($_SESSION["message"]["notyfy"]);} ?>
        
        $.validator.setDefaults(
        {
            submitHandler: function(form) {
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
                    GACode: "required"
                },
                messages: {
                    GACode: "Google Analytics Code không được bỏ trống"					
                }
            });							
        });
        
    </script>
        
</form>