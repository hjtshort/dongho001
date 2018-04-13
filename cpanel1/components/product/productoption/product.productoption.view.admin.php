<?php defined( '_VALID_MOS' ) or die( include("../news/404.php") ); ?>

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
	<h3 class="glyphicons list"><i></i>Nhóm tùy chọn sản phẩm</h3>
	<div class="buttons pull-right">
        <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a>
        <a href="product/productoption/addoptionset.html" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i>Thêm mới nhóm sp</a>
        <a href="product/productoption/addoption.html" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i>Thêm mới tùy chọn sp</a>
        <a href="" class="btn btn-primary btn-icon glyphicons delete"><i></i> Xóa </a>
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
			<li class="active"><a href="#SEOWebTab" data-toggle="tab" class="glyphicons group"><i></i>Nhóm tùy chọn sản phẩm</a></li>
			
            <li class=""><a href="#ProductListTab" data-toggle="tab" class="glyphicons share_alt"><i></i>Tùy chọn sản phẩm</a></li>
            
            
		</ul>
	</div>
	<div class="widget-body" style="padding: 10px;">
		<div class="tab-content"><br>
			<!-- Thiết lập SEO cho website -->
            <div class="tab-pane active" id="SEOWebTab">
            <!--------------------------------------->
            <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
			<thead>
				<tr>
                    <th style="width: 4%;" class="center">#</th>
                   <th style="width: 4%;" class="uniformjs"><input type="checkbox"></th>
                    <th>Nhóm tùy chọn</th>
                    <th style="width: 43%;">Áp dụng</th>
					<th class="center" style="width: 75px;">Thao tác</th>
				</tr>
			</thead>
			<tbody>
				<tr class="selectable">
					<td class="center" style="width: 28px;">1</td>
                   <td class="uniformjs"><input type="checkbox"></td>
					<td class="important">Nhóm tùy chọn mới</td>
                    <td>o sản phẩm</td>
                    <td class="center">
						<a href="file:///C|/xampp/htdocs/cpanel_cms4/components/export/export/product_edit.html?lang=en" class="btn-action glyphicons pencil btn-success"><i></i></a>
                        <a href="#" class="btn-action glyphicons bin btn-danger"><i></i></a>	
					</td>
				</tr> 																			
	      </tbody>
		</table>
                
            
                
            <!------------------------------------------>
            </div>
            
            <!-- Thiết lập SEO cho page -->
			
			
            <!-- Danh mục sản phẩm -->
			<div class="tab-pane" id="ProductListTab">
				<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
			<thead>
				<tr>
                    <th style="width: 4%;" class="center">#</th>
                   <th style="width: 4%;" class="uniformjs"><input type="checkbox"></th>
                    <th>Tùy chọn</th>
                    <th style="width: 23%;">Tên hiển thị</th>
                    <th style="width: 23%;">Kiểu hiển thị</th>
					<th class="center" style="width: 75px;">Thao tác</th>
				</tr>
			</thead>
			<tbody>
				<tr class="selectable">
					<td class="center" style="width: 28px;">1</td>
                   <td class="uniformjs"><input type="checkbox"></td>
					<td class="important">Nhóm tùy chọn mới</td>
                    <td>tên hiển thị</td>
                    <td>Rectangle (hình chữ nhật)</td>
                    <td class="center">
						<a href="file:///C|/xampp/htdocs/cpanel_cms4/components/export/export/product_edit.html?lang=en" class="btn-action glyphicons pencil btn-success"><i></i></a>
                        <a href="#" class="btn-action glyphicons bin btn-danger"><i></i></a>	
					</td>
				</tr> 																			
	      </tbody>
		</table>
			</div>
			<!-- Danh mục tin tức -->
			
		</div>
	</div>
</div>
				
		</div>
				<!-- End Content -->
				
		</div>