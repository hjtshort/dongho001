<?php defined( '_VALID_MOS' ) or die( include("../news/404.php") ); ?>
<link href="<?php echo $template_admin; ?>/common/theme/css/product-features.css" type="text/css" rel="stylesheet">
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
	<h3 class="glyphicons list"><i></i>Nhóm thuộc tính sản phẩm</h3>
	<div class="buttons pull-right">
        <a href="" class="btn btn-primary btn-icon glyphicons ok_2"><i></i> Lưu</a>
		<a href="" class="btn btn-primary btn-icon glyphicons edit"><i></i> Cập nhật</a>
		<a href="product/productfeatures/view.html" class="btn btn-primary btn-icon glyphicons unshare"><i></i>Quay lại</a>
	</div>
	<div class="clearfix"></div>
</div>
<div class="separator bottom"></div>

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
<div class="widget widget-2 widget-tabs">
	<div class="widget-head">
		<ul>
			<li class="active"><a href="#SEOWebTab" data-toggle="tab" class="glyphicons group"><i></i>Nhóm thuộc tính</a></li>
		</ul>
	</div>
	<div class="widget-body" style="padding: 10px;">
		<div class="tab-content"><br>
			<!-- Thiết lập SEO cho website -->
            <div class="tab-pane active" id="SEOWebTab">
            <!--------------------------------------->
            
                
                <div class="row-fluid">
                    <div class="span2">
                        <p class="muted">Tên nhóm<span class="required">*</span></p> 
                    </div>
                    <div class="span9">
                        <input type="text" id="inputTitle" class="span5" value="" placeholder="">
                        <div class="separator"></div>
                    </div>
                </div>
                <div class="row-fluid">
					<div class="span2">	
						<p class="muted">Mô tả</p>
					</div>
					<div class="span9">
						<textarea name="message" class="span6" rows="5"></textarea>
						<div class="separator"></div>
					</div>
				</div>
            <!------------------------------------------>
            </div>
			
		</div>
	</div>
</div>
				
		</div>
				<!-- End Content -->
				
		</div>