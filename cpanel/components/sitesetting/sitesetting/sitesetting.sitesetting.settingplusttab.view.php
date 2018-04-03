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
                        <li><a href="./sitesetting/sitesetting/view_settingurltab.html" class="glyphicons link"><i></i>Cài đặt Google Analytics</a></li>
                    </ul>
                </div>
                
                <div class="widget-body" style="padding: 20px;">
                    <!-- Bộ lọc sản phẩm -->
                    <div class="tab-pane" id="settingplustTab">
                        <div class="row-fluid">
                            <div class="span2"><br>
                                <p class="muted">
                                    <img src="<?= $conf['template_admin']; ?>/html/images/minus1.gif">
                					<a onclick="show('AdvanceSetting','GroupView1_imgExpand','GroupView1_hdfExpand');return false;" id="GroupView1_lbtExpand" title="Ẩn/hiện nội dung" href="javascript:__doPostBack('GroupView1$lbtExpand','')">Cấu hình website</a>  
                                </p>                                
                            </div>
                            <div class="span9"><br>
                            <div class="GroupTitle" style="padding-top:3px;">                            
                            	<input type="hidden" name="Main$ctl00$ctl00$GroupView1$hdfExpand" id="GroupView1_hdfExpand" value="True">
                            </div>
                            <div id="cph_Main_ctl00_ctl00_AdvanceSetting" style="display: block;">
                                <table class="admintable" style="width: 100%;">
                                    <tbody>
                                    	<tr>
                                            <td class="muted" style="padding-top: 0px; text-align: right;">
                                            	<strong>Google Analytics Code:</strong>
                                            </td>
                                            <td style="padding-top: 6px;">
                                                <input name="ctl00$cph_Main$ctl00$ctl00$txtGACode" type="text" id="cph_Main_ctl00_ctl00_txtGACode" style="width:100px;">
                                                <a href="http://analytics.google.com" target="_blank">Get Google Analytics Code from analytics.google.com </a>
                                                <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Đoạn mã Google Analytics, giúp bạn sử dụng một dịch vụ của Google để thống kê, phân tích website."></span>
                                            </td>
                                    	</tr>
                                    	<tr>
                                            <td class="key"></td>
                                            <td>
                                                <input id="cph_Main_ctl00_ctl00_chkIsHasApproved" type="checkbox" name="ctl00$cph_Main$ctl00$ctl00$chkIsHasApproved" style="position:relative;float:left;">
                                                <label for="cph_Main_ctl00_ctl00_chkIsHasApproved" class="muted">&nbsp;Duyệt đánh giá, nhận xét về sản phẩm trước khi đăng
                                                <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Tích để lựa chọn có duyệt đánh giá, nhận xét về sản phẩm trước khi nhận xét đó được đăng."></span>
                                                </label>
                                            </td>
                                        </tr>
                                	</tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                        
                            <div class="span2"><br>
                                <p class="muted">
                                    <img src="<?= $conf['template_admin']; ?>/html/images/minus1.gif">
                <a onclick="show('AdvanceSetting','GroupView1_imgExpand','GroupView1_hdfExpand');return false;" id="GroupView1_lbtExpand" title="Ẩn/hiện nội dung" href="javascript:__doPostBack('GroupView1$lbtExpand','')">Thiết lập tên miền</a>  
                                </p>
                                
                            </div>
                            <div class="span9"><br>
                                <div class="GroupTitle" style="padding-top:3px;">
              
            <input type="hidden" name="Main$ctl00$ctl00$GroupView1$hdfExpand" id="GroupView1_hdfExpand" value="True">
            </div>
            <div id="cph_Main_ctl00_ctl00_AdvanceSetting" style="display: block;">
            <table class="admintable" style="width: 100%;">
                <tbody><tr>
                    <td class="muted" style="text-align:left;position:relative;left:73px;right: 7px;bottom: 7px;">
                        <label class="control-label" for="add_namesite"><strong>Tên miền:</strong></label>
                    </td>
                    <td style="padding-top: 6px;position:relative; right: 113px;bottom: 5px;">
                        <input name="add_namesite" type="text" id="add_namesite" class="span5" style="position:relative;bottom: 5px;">
                        <a href="product_edit.html?lang=en" class="btn-action glyphicons circle_plus btn-success" style="bottom: 5px;left: 14px;" title="Thêm mới tên miền"><i></i></a>
                        <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Trỏ tên miền bạn muốn sử dụng bằng cách gõ tên miền vào ô Tên miền sau đó click vào dấu “+” để thêm tên miền" style="bottom: 3px;left: 16px;"></span>
                    </td>
                </tr>
                
            </tbody></table>
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
                <br />
                        </div>
                    </div>
                        <!-- Bộ lọc sản phẩm END -->
                </div>
            </div>
                
        </div>
                    <!-- End Content -->
                    <input type="hidden" name="hidden" value="sitesetting.settingwebtab.add" />
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
						add_namesite: {
							required: true,
							url: true
						}						
					},
					messages: {
						add_namesite: "Tên miền không hợp lệ!"
						
					}
				});							
			});
			
		</script>
        
</form>