<?php defined( '_VALID_MOS' ) or die( include("../../content/news/404.php") ); ?>
<div id="wrapper">	
    <div id="content">
        <ul class="breadcrumb">
            <li><a href="../../content/news/index.html?lang=en" class="glyphicons home"><i></i>AdminPlus</a></li>
            <li class="divider"></li>
            <li>Online Shop</li>
            <li class="divider"></li>
            <li>Products</li>
        </ul>
		<div class="separator bottom"></div>
        <div class="innerLR">
            <div class="widget widget-2">
                <div class="widget-head">
                
                    <h4 class="heading glyphicons picture"><i></i>Thiết lập giao diện Mobile</h4>
                    
                    <div class="heading-buttons">
                        <div class="buttons pull-right">
                            <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a>
                            <a href="" class="btn btn-primary btn-icon glyphicons edit"><i></i> Cập nhật</a>
                    </div>
                    <div class="clearfix"></div>
                    </div>
                    
                </div>
                 <div class="modal hide fade" id="modal-simple" aria-hidden="true" style="display: none;">
                    
                    <!-- Modal heading -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3>Modal header</h3>
                    </div>
                    <!-- // Modal heading END -->
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                    <!-- // Modal body END -->
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <a href="#" class="btn btn-default" data-dismiss="modal">Close</a> 
                    </div>
                    <!-- // Modal footer END -->
                    
                </div>               
                <div class="widget-body">
                <div class="row-fluid">
					<div class="span2">	
						<p class="muted">Giao diện Mobile</p>
					</div>
					<div class="span10"><h5 class="muted">
<input type="checkbox" class="checkbox" value="1">
&nbsp; Sử dụng giao diện mobile cho các thiết bị di động</h5>
<p class="muted">( Phiên bản giao diện mobile được tối ưu hóa cho các thiết bị chạy hệ điều hành iOS (iPhone, iPad, iTouch), các máy chạy hệ điều hành Android, Window Phone )</p>
					  <div class="separator"></div>
				  </div>
				</div>
		        	<div class="row-fluid">
					<div class="span2">
						<p class="muted">Giao diện đang sử dụng &nbsp;</p>
					</div>
					<div class="span9">
                    	<p class="muted" style="font-weight:bold;">Default</p>
						<img id="imgCurentSkin" src="<?php echo $template_admin; ?>/html/images/skinmobile/Default.master.mini.gif" style="width:160px;">
						<div class="separator"></div>
					</div>
				</div>
                
                <div class="row-fluid">
					<div class="span2">	
					  <p class="muted">Mobile Banner</p>
					</div>
					<div class="span9">
						<div class="fileupload fileupload-new" data-provides="fileupload"><input type="hidden" value="" name="">
						  	<div class="input-append">
						    	<div class="uneditable-input span3"><i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"></span></div><span class="btn btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span><input type="file" name=""></span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
						  	</div><a href="" class="btn btn-default btn-icon glyphicons upload" style="position:relative; bottom: 5px; left: 10px;"><i></i> Tải lên</a>
                        </div>
                        
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span2">	
						<p class="muted">Chọn giao diện</p>
					</div>
					<div class="span10">
                      <div class="TemplateListContainer">
						<table id="dlPublicSkins" cellspacing="0" cellpadding="1" style="border-width:0px;width:1000px;border-collapse:collapse;">
	<tbody><tr>
		<td align="center" valign="top">
                            <div class="skinitem">
                                <div class="TemplateHeading">
                                    <span class="TemplateName">m.Ecom96</span>
                                </div>
                                <a href="#skin" class="skin">
                                    <img src="<?php echo $template_admin; ?>/html/images/skin/Ecom96.master.mini.gif" style="border: none;" alt="">
                                </a>
                                <div class="TemplateBottom">
                                    <a href="#activeskin" class="activeskin">
                                        Sử dụng giao diện này</a>
                                </div>
                            </div>
                        </td><td align="center" valign="top">
                            <div class="skinitem">
                                <div class="TemplateHeading">
                                    <span class="TemplateName">m.Ecom95</span>
                                </div>
                                <a href="#skin" class="skin">
                                    <img src="<?php echo $template_admin; ?>/html/images/skin/Ecom95.master.mini.gif" style="border: none;" alt="">
                                </a>
                                <div class="TemplateBottom">
                                    <a href="#activeskin">
                                        Sử dụng giao diện này</a>
                                </div>
                            </div>
                        </td><td align="center" valign="top">
                            <div class="skinitem">
                                <div class="TemplateHeading">
                                    <span class="TemplateName">
m.Ecom94</span>
                                </div>
                                <a href="#skin" class="skin">
                                    <img src="<?php echo $template_admin; ?>/html/images/skin/Ecom94.master.mini.gif" style="border: none;" alt="">
                                </a>
                                <div class="TemplateBottom">
                                    <a href="#activeskin" class="activeskin">
                                        Sử dụng giao diện này</a>
                                </div>
                            </div>
                        </td><td align="center" valign="top">
                            <div class="skinitem">
                                <div class="TemplateHeading">
                                    <span class="TemplateName">m.Ecom93</span>
                                </div>
                                <a href="#skin" class="skin">
                                    <img src="<?php echo $template_admin; ?>/html/images/skin/Ecom93.master.mini.gif" style="border: none;" alt="">
                                </a>
                                <div class="TemplateBottom">
                                    <a href="#activeskin" class="activeskin">
                                        Sử dụng giao diện này</a>
                                </div>
                            </div>
                        </td><td align="center" valign="top">
                            <div class="skinitem">
                                <div class="TemplateHeading">
                                    <span class="TemplateName">m.Ecom92</span>
                                </div>
                                <a href="#skin" class="skin">
                                    <img src="<?php echo $template_admin; ?>/html/images/skin/Ecom92.master.mini.gif" style="border: none;" alt="">
                                </a>
                                <div class="TemplateBottom">
                                    <a href="#activeskin" class="activeskin">
                                        Sử dụng giao diện này</a>
                                </div>
                            </div>
                        </td>
	</tr>
</tbody></table></div>
						<div class="separator"></div>
					</div>
				</div>
                
				</div>
            </div>
        </div>
        <!-- End Content -->        
    </div>
   	<!-- End Wrapper -->
</div>