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
                    <li class="active"><a href="./sitesetting/sitesetting/view_settinginfotab.html" class="glyphicons message_plus"><i></i>Thông tin liên hệ</a></li>
                    <li><a href="./sitesetting/sitesetting/view_settingmaptab.html" class="glyphicons google_maps"><i></i>Bản đồ</a></li>
                    <li><a href="./sitesetting/sitesetting/view_settingviewtab.html" class="glyphicons show_big_thumbnails"><i></i>Cấu hình hiển thị</a></li>
                    <li><a href="./sitesetting/sitesetting/view_settingviewinfotab.html" class="glyphicons display"><i></i>Cấu hình tên miền</a></li>
                    <li><a href="./sitesetting/sitesetting/view_settingurltab.html" class="glyphicons link"><i></i>Cài đặt Google Analytics</a></li>           
                </ul>
            </div>
            <div class="widget-body" style="padding: 20px;">
                <div class="tab-pane" id="settinginfoTab">
                   <div class="row-fluid">
                        <div class="span3">
                            <label class="control-label" for="company_name">Tên công ty <span class="required">*</span></label>
                        </div>
                        <div class="span9">
                        	<div class="controls">
                            	<input type="text" id="company_name" name="company_name" class="span6" value="<?= $conf['app']['site']['settinginfo']['company_name']; ?>" >
                                <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Điền nội dung tên công ty hiển thị trên phần Liên hệ của website."></span>
                            </div>                            
                            <div class="separator"></div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span3">
                            <label class="control-label" for="slogan">Slogan <span class="required">*</span></label>
                        </div>
                        <div class="span9">
                        	<div class="controls">
                            	<input type="text" id="slogan" name="slogan" class="span6" value="<?= $conf['app']['site']['settinginfo']['slogan']; ?>">
                                <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Điền nội dung Slogan của công ty"></span>
                            </div>                            
                            <div class="separator"></div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span3">
                            <label class="control-label" for="address">Địa chỉ <span class="required">*</span></label>
                        </div>
                        <div class="span9">
                        	<div class="controls">
                            	<input type="text" id="address" name="address" class="span6" value="<?= $conf['app']['site']['settinginfo']['address']; ?>">
                                <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Số điện liên hệ của website."></span>
                            </div>                            
                            <div class="separator"></div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span3"> 
                            <label class="control-label" for="phone">Số điện thoại <span class="required">*</span></label>                         
                        </div>
                        <div class="span9">
                        	<div class="controls">
                                <input type="text" id="phone" name="phone" class="span3" value="<?= $conf['app']['site']['settinginfo']['phone']; ?>">
                                <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Số điện thoại hiển thị trong phần Liên hệ của website."></span>
                            </div>
                            <div class="separator"></div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span3">
                            <label class="control-label" for="fax">FAX </label>
                        </div>
                        <div class="span9">
                        	<div class="controls">
                                <input type="text" id="fax" name="fax" class="span3" value="<?= $conf['app']['site']['settinginfo']['fax']; ?>">
                                <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Địa chỉ Fax, hiển thị trong phần Liên hệ của website."></span>
                            </div>
                            <div class="separator"></div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span3">
                            <label class="control-label" for="email">Email <span class="required">*</span></label>
                        </div>
                        <div class="span9">
                        	<div class="controls">
                                <input type="text" id="email" name="email" class="span3" value="<?= $conf['app']['site']['settinginfo']['email']; ?>">
                                <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Địa chỉ Email, hiển thị trong phần Liên hệ của website."></span>
                            </div>
                            <div class="separator"></div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span3">
                            <label class="control-label" for="website">Website <span class="required">*</span></label>
                        </div>
                        <div class="span9">
                        	<div class="controls">
                                <input type="text" id="website" name="website" class="span3" value="<?= $conf['app']['site']['settinginfo']['website']; ?>">
                                <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Địa chỉ website(có thể là một website khác), hiển thị trong phần Liên hệ của website."></span>
                            </div>
                            <div class="separator"></div>
                        </div>
                    </div>
                   
                </div>
            </div>
		</div>
            
    </div>
    <!-- End Content -->
    <input type="hidden" name="hidden" value="sitesetting.settinginfotab.add" />
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
        
    </script>
        
</form>