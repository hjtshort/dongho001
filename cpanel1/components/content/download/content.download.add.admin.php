<?php defined( '_VALID_MOS' ) or die( include("../../content/news/404.php") );
if($_SESSION["wti"]["key"] == "Supper Administrator" || $_SESSION["wti"]["key"] == "Administrator"){ 
	//$myprocess = new process();
?>
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
                
                    <h4 class="heading glyphicons download_alt"><i></i>Thêm mới thư mục</h4>
                    
                    <div class="heading-buttons">
                        <div class="buttons pull-right">
                                <a href="" class="btn btn-primary btn-icon glyphicons ok_2"><i></i> Lưu & Đóng</a>
                                <a href="" class="btn btn-primary btn-icon glyphicons edit"><i></i> Cập nhật</a>
                                <a href="content/download/view.html" class="btn btn-primary btn-icon glyphicons unshare"><i></i> Quay lại</a>
                            </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>	 
                <div class="widget-body">
                    <div class="row-fluid">
                        <div class="span2">
                            <br>
                            <p class="muted">Thư mục:&nbsp;<span class="required">*</span></p>
                        </div>
                        <div class="span9"><br>
                            <input type="text" id="inputTitle" class="span5" value="" placeholder="">
                            <div class="separator"></div>
                        </div>
                    </div>
 				<div class="row-fluid">
					<div class="span2">	
						<p class="muted">Mô tả</p>
					</div>
					<div class="span9">
						<textarea name="message" class="span6" rows="3"></textarea>
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