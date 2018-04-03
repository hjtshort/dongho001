<?php defined( '_VALID_MOS' ) or die( include("404.php") );
if($_SESSION["wti"]["key"] == "Supper Administrator" || $_SESSION["wti"]["key"] == "Administrator"){ 
	//$myprocess = new process();
?>
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
                
                    <h4 class="heading glyphicons qrcode"><i></i>Thêm mới thông tin nhà sản xuất</h4>
                    
                    <div class="heading-buttons">
                        <div class="buttons pull-right">
                            <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a>   
                            <a href="" class="btn btn-primary btn-icon glyphicons ok_2"><i></i> Lưu lại</a>
                            <a href="" class="btn btn-primary btn-icon glyphicons edit"><i></i> Cập nhật</a>
                            <a href="product/vendors/view.html" class="btn btn-primary btn-icon glyphicons unshare"><i></i> Quay lại</a>
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
						<p class="muted">Nhà sản xuất<span class="required">*</span></p>
					</div>
					<div class="span7"><br>
						<input type="text" id="inputTitle" class="span6" value="" placeholder="">

						<div class="separator"></div>
					</div>
				</div>
              <div class="row-fluid">
					<div class="span2">	
					  <p class="muted">Số điện thoại</p>
					</div>
					<div class="span5">
						<input type="text" id="inputTitle" class="span4" value="" placeholder="">&nbsp;
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span2">
						<p class="muted">Địa chỉ</p>
					</div>
					<div class="span7">
						<input type="text" id="inputTitle" class="span6" value="" placeholder="">

						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span2">
						<p class="muted">Email</p>
					</div>
					<div class="span7">
						<input type="text" id="inputTitle" class="span6" value="" placeholder="">

						<div class="separator"></div>
					</div>
				</div>
               <div class="row-fluid">
					<div class="span2">	
						<p class="muted">Mô tả</p>
					</div>
					<div class="span7">
						<textarea name="message" class="span6" rows="5"></textarea>
                        &nbsp;
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
<?php } ?>