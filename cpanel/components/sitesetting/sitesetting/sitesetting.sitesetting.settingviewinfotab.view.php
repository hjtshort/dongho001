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
                        <li class="active"><a href="./sitesetting/sitesetting/view_settingviewinfotab.html" class="glyphicons display"><i></i>Cấu hình tên miền</a></li>
                        <li><a href="./sitesetting/sitesetting/view_settingurltab.html" class="glyphicons link"><i></i>Cài đặt Google Analytics</a></li>
                    </ul>
                </div>
                
                
                <div class="widget-body" style="padding: 20px;">
                    <div class="tab-pane" id="settingplustTab">
                    
                    	<div class="row-fluid">                
                            <p>Nhập tên miền bạn muốn sử dụng cho website. Nếu bạn chưa có tên miền riêng, có thể đăng ký mua tên miền <a href="http://www.webtienich.vn/dang-ky-ten-mien.html" target="_blank">tại đây</a>.</p>
                            <div class="separator bottom"></div>
                            
                            <div class="span1"><strong>Tên miền:</strong></div>                            
                            <div class="span10">
                                <div class="groupcheckbox">
                                    <input type="text" class="span4" name="add_namesite" id="add_namesite">
                                    <a style="margin-top:-8px;" class="btn-action glyphicons circle_plus btn-success" title="Thêm mới tên miền"><i></i></a>
                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Trỏ tên miền bạn muốn sử dụng bằng cách gõ tên miền vào ô Tên miền sau đó click vào dấu "+" để thêm tên miền"></span>
                                </div>
                            </div>                                                        
                        </div>
                        
                        <div class="row-fluid">                        
                            <table class="table table-bordered table-striped" style="width: 58%;">
                                <thead>
                                    <tr>
                                        <th style="width: 7%;" class="center">#</th>
                                       <th style="width: 79%;">Tền miền</th>
                                        <th style="width: 13%;" class="center">Mặc định</th>
                                        <th class="center" style="width: 7%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="selectable">
                                        <td class="center" style="width: 28px;">1</td>
                                       <td class="importan">igooseco.bizwebvietnam.com</td>
                                        <td class="center"><a href="product_edit.html?lang=en" class="btn-action glyphicons ok_2 btn-success"><i></i></a></td>
                                        <td class="center" style="width:40px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    </tr>                                                                     
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>

        	</div>
            <!-- End Content -->
            <input type="hidden" id="tab_active" name="tab_active" />
            <input type="hidden" name="hidden" value="sitesetting.settingwebtab.add" />
        </div>
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