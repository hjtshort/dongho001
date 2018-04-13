<?php defined( '_VALID_MOS' ) or die( include("404.php") ); ?>
<script src="<?php echo $template_admin; ?>/common/theme/scripts/productoption.js"></script>
<div id="wrapper">	
    <div id="content">
        <ul class="breadcrumb">
            <li><a href="index.html?lang=en" class="glyphicons home"><i></i>AdminPlus</a></li>
            <li class="divider"></li>
            <li>Online Shop</li>
            <li class="divider"></li>
            <li>Products</li>
        </ul>
		<div class="separator bottom"></div>
        <div class="innerLR">
            <div class="widget widget-2">
                <div class="widget-head">
                
                    <h4 class="heading glyphicons qrcode"><i></i>Thêm mới thông tin tùy chọn sản phẩm</h4>
                    
                    <div class="heading-buttons">
                        <div class="buttons pull-right">
                            <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a>   
                            <a href="" class="btn btn-primary btn-icon glyphicons ok_2"><i></i> Lưu</a>
                            <a href="" class="btn btn-primary btn-icon glyphicons edit"><i></i> Cập nhật</a>
                            <a href="product/productoption/view.html" class="btn btn-primary btn-icon glyphicons unshare"><i></i> Quay lại</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>
<!-- Modal inline -->

<!-- Modal -->
<div class="modal hide fade" id="modal-simple">
	
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
						<br>
						<p class="muted">Tên tùy chọn<span class="required">*</span></p>
					</div>
					<div class="span9"><br>
						<input type="text" id="inputTitle" class="span5" value="" placeholder="">

						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span2">	
					  <p class="muted">Tên hiển thị</p>
					</div>
					<div class="span9">
						<input type="text" id="inputTitle" class="span5" value="" placeholder="">&nbsp;
						<div class="separator"></div>
					</div>
				</div>
                
                <div class="row-fluid">
					<div class="span2">	
						<p class="muted">Kiểu tùy chọn<span class="required">*</span></p>
					</div>
					<div class="span5">
						<select class="span5" name="ddlDataType" id="ddlDataType">
								<option value="1">Tùy chọn thông thường</option>
                                <option value="2">Tùy chọn màu sắc</option>
						</select>&nbsp;
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid" id="displayType">
					<div class="span2">	
						<p class="muted">Kiểu hiển thị<span class="required">*</span></p>
					</div>
					<div class="span5">
						<select class="span5" name="ddlDisplayType" id="ddlDisplayType">
							<option value="2">Rectangle (hình chữ nhật)</option>
							<option value="1">Radio Box</option>
							<option value="3">Select Box</option>
						</select>&nbsp;
						<div class="separator"></div>
					</div>
				</div>
               <div class="row-fluid">
					<div class="span2">	
						<p class="muted">Nhóm tùy chọn:</p>
					</div>
					<div class="span9">
						<textarea name="message" class="span7" rows="8"></textarea>
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span2">	
					  <p class="muted">Giá trị thuộc tính</p>
					</div>
					<div class="span9">
						<input type="text" id="inputTitle" class="span5" value="" placeholder="">&nbsp;
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