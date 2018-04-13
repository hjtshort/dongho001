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
                
                    <h4 class="heading glyphicons picture"><i></i>Thiết lập Banner & Logo</h4>
                    
                    <div class="heading-buttons">
                        <div class="buttons pull-right">
                            <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a>
                            <a href="" class="btn btn-primary btn-icon glyphicons edit"><i></i> Cập nhật</a>
	</div>
                    <div class="clearfix"></div>
                    </div>
                    
                </div>
                 <div class="modal hide fade" id="modal-simple">
                    
                    <!-- Modal heading -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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
                                 <label class="important">Banner &nbsp;</label>  
                                </div>
                                <div class="span10">
                          <div class="widget widget-2">
                            <div class="widget-head">
                                <h4 class="heading glyphicons history"><i></i>Loại Banner</h4>
                                
                            </div>
                            <div class="widget-body list">
                                <ul>
                                    <li>
                                        <span><input type="radio" name="banner" checked id="banner"/></span>
                                        <span>Banner mặc định</span>
                                    </li>
                                    <li>
                                        <span><input type="radio" name="banner"id="banner"/></span>
                                        <span>Chọn banner</span>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                        <div class="widget widget-2">
                            <div class="widget-head">
                                <h4 class="heading glyphicons history"><i></i>Banner riêng</h4>
                            </div>
                            <div class="widget-body">
                                <img src="<?php echo $template_admin; ?>/html/images/banner2.png"></span>
                            </div>		
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
					<div class="span2">	
						<label class="important">Kích thước Banner</label>
					</div>
					<div class="span9"><div class="groupcheckbox">
						<input type="text" class="span1" value="">
                        &nbsp;x &nbsp;&nbsp;<input type="text" class="span1" value="">&nbsp;rộng x cao
                        <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Kích thước Banner"></span></div>
							<div class="separator"></div>
						</div></div>
                <div class="row-fluid">
					<div class="span2">
						<label class="important">Cầu hình Logo &nbsp;</label>
					</div>
					<div class="span10">
              <div class="widget widget-2">
				<div class="widget-head">
					<h4 class="heading glyphicons history"><i></i>Loại Logo</h4>
				</div>
				<div class="widget-body list">
					<ul>
						<li>
							<span><input type="radio" name="logo" checked id="banner"/></span>
							<span>Logo Text</span>
						</li>
						<li>
							<span><input type="radio" name="logo"id="banner"/></span>
							<span>Logo Images</span>
						</li>
                        <li>
							<span><input type="radio" name="logo"id="banner"/></span>
							<span>Không hiển thị Logo</span>
						</li>
					</ul>
				</div>
                <div class="widget widget-2">
				<div class="widget-head">
					<h4 class="heading glyphicons history"><i></i>Chọn Logo</h4>
				</div>
				<div class="widget-body list" style="padding-top: 15px;padding-bottom:15px">
					<ul>
						<li>
							<span style="bottom: 5px; position: relative;">Tên Logo</span>
							<span><input type="text" name="logoname" checked="" id=""></span>
						</li>
						<li>
							<span>Slogan</span>
							<span style="left: 14px; top: 7px; position: relative;"><input type="text" name="slogan" id=""></span>
						</li>
					</ul>	
				</div>		
			</div>
			</div>
		</div>
	</div>
	</div>
                
            </div>
        </div>
        <!-- End Content -->        
    </div>
   	<!-- End Wrapper -->
</div>