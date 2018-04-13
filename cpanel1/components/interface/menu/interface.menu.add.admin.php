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
                
                    <h4 class="heading glyphicons inbox"><i></i>Thêm mới nhóm Menu</h4>
                    
                    <div class="heading-buttons">
                        <div class="buttons pull-right">
                        	<a href="" class="btn btn-primary btn-icon glyphicons ok_2"><i></i> Lưu</a>
                            <a href="" class="btn btn-primary btn-icon glyphicons edit"><i></i> Cập nhật</a>
                            <a href="interface/menu/view.html" class="btn btn-primary btn-icon glyphicons unshare"><i></i> Quay lại</a>
                            
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
					<div class="span3">
						<br>
						<p class="muted">Tên nhóm Menu &nbsp;<span class="required">*</span></p>
                        
					</div>
					<div class="span9"><br>
						<input type="text" id="inputTitle" class="span4" value="" placeholder="">
<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Viết tên nhóm menu, thêm mới nhóm menu giúp bạn có thể tùy biến thêm mới một danh sách menu theo ý mình."></span>
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span3">	
						<p class="muted">Mô tả ngắn</p>
					</div>
					<div class="span9">
						<textarea name="message" class="span6" rows="5"></textarea>
                        &nbsp;<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Viết một vày nội dung mô tả nhóm menu."></span>
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