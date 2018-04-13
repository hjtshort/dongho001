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
	<h3 class="glyphicons list"><i></i>Chỉnh sửa danh mục tùy chọn</h3>
	<div class="buttons pull-right">
		<a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a>   
		<a href="" class="btn btn-primary btn-icon glyphicons ok_2"><i></i> Lưu</a>
        <a href="" class="btn btn-primary btn-icon glyphicons edit"><i></i> Cập nhật</a>
        <a href="" class="btn btn-primary btn-icon glyphicons delete"><i></i> Xóa </a>
        <a href="product/customcategories/view.html" class="btn btn-primary btn-icon glyphicons share"><i></i> Quay lại</a>
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
			<li class="active"><a href="#productDescriptionTab" data-toggle="tab" class="glyphicons font"><i></i>Thông tin danh mục</a></li>
			<li class=""><a href="#productSeoTab" data-toggle="tab" class="glyphicons pie_chart"><i></i>Sản phẩm thuộc danh mục</a></li>
            
		</ul>
	</div>
	<div class="widget-body" style="padding: 10px;">
		<div class="tab-content">
		
			<!-- Thông tin chung -->
			<div class="tab-pane active" id="productDescriptionTab">
				
                <div class="row-fluid">
					<div class="span2">
						<br>
						<p class="muted">Tên danh mục tùy chọn<span class="required">*</span></p>
                        
					</div>
					<div class="span7"><br>
						<input type="text" id="inputTitle" class="span6" value="" placeholder="">
<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Tùy biến tên danh mục sản phẩm theo nhiều tiêu chí nổi bật (VD Sản phẩm khuyến mại tháng 8)"></span>
						<div class="separator"></div>
					</div>
				</div>
                
                <div class="row-fluid">
					<div class="span2">
						<p class="muted">Mô tả</p>
					</div>
					<div class="span9">
						<textarea id="textDescription" class="wysihtml5" style="width:70%" rows="7"></textarea>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span2">	
						<p class="muted">Thứ tự</p>
					</div>
					<div class="span9">
					  <input type="text" id="inputTitle" class="span2" value="" placeholder="1">&nbsp;<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Thứ tự hiển thị của danh mục sản phẩm tùy chọn"></span>
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span2">	
						<p class="muted">Hiển thị</p>
					</div>
					<div class="span9">
<input type="checkbox" class="checkbox" value="1">
&nbsp;<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Lựa chọn để danh mục sản phẩm tùy chọn hiển thị trên website"></span>
					  <div class="separator"></div>
				  </div>
				</div>
                <div class="row-fluid">
					<div class="span2">
						<p class="muted">Tiêu đề trang</p> 
					</div>
					<div class="span7">
						<input type="text" id="inputTitle" class="span6" value="" placeholder="">
<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Nội dung được hiển thị dưới dạng tiêu đề trong kết quả tìm kiếm và trên trình duyệt của người dùng."></span>
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span2">
						<p class="muted">Thẻ từ khóa</p>
					</div>
					<div class="span7">
						<input type="text" id="inputTitle" class="span6" value="" placeholder="">
<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Mô tả từ khóa chính của website."></span>
						<div class="separator"></div>
					</div>
				</div>	
                <div class="row-fluid">
					<div class="span2">	
						<p class="muted">Thẻ mô tả</p>
					</div>
					<div class="span7">
						<textarea name="message" class="span6" rows="5"></textarea>
                        &nbsp;<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Cung cấp một mô tả ngắn của trang. Trong vài trường hợp, mô tả này được sử dụng như một phần của đoạn trích được hiển thị trong kết quả tìm kiếm."></span>
						<div class="separator"></div>
					</div>
				</div>
			</div>
			<!-- Thông tin chung END -->
			
            <!-- SEO -->
			<div class="tab-pane" id="productSeoTab">
				<div class="widget-body">
                    <div class="separator bottom form-inline small">    	
                        <div class="filter-bar filter-bar-2" style="margin-bottom: 0px;">
                            <form>
                                <div class="pull-right">
                                    Tổng số mẫu tin: 6 / 500
                                    <select name="from" style="width: 200px;" class="input-mini">
                                        <option value="10">10 Bản ghi / trang</option>
                                        <option selected="selected" value="20">20 Bản ghi / trang</option>
                                        <option value="30">30 Bản ghi / trang</option>
                                        <option value="50">50 Bản ghi / trang</option>
                                        <option value="100">100 Bản ghi / trang</option>
                                    </select>
                                </div> 
                                	<div style="position:relative;float: right;left: 22px;">
                                        <div style="top:1px;position:relative;">
                                            <label>Nhập:</label>
                                            <div class="input-append">
                                                <input type="text" name="from" class="input-mini" style="width: 200px;" value="Tên sản phẩm">
                                            </div>
                                        </div>
                                        <div style="position:relative;right: 20px;">
                                            <label>Chọn:</label>
                                            <div class="input-append">
                                                <select name="from" style="width: 200px;" class="input-mini">
                                                <option selected="selected" value="-1">-- Danh mục sản phẩm --</option>
                                                <option value="1053569">Blackberry</option>
                                                <option value="1053570">└-------- Blackberry Bold</option>
                                                <option value="1053571">└-------- Blackberry Curve</option>
                                                <option value="1053572">└-------- Blackberry Storm</option>
                                                <option value="1053573">Android</option>
                                                <option value="1053574">└-------- Android HTC</option>
                                                <option value="1053575">└-------- Android SamSung</option>
                                                <option value="1053576">└-------- Android Sony</option>
                                                <option value="1053577">WindowPhone</option>
                                                <option value="1053578">└-------- WindowPhone HTC</option>
                                                <option value="1053579">└-------- WindowPhone Nokia</option>
                                                <option value="1053580">└-------- Window Mobile</option>
                                            </select>
                                            </div>
                                </div>
                                <a href="" class="btn btn-primary" style="position:relative;float: right;right: 34px;"><i></i>Tìm kiếm</a>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>    
                    </div>
                    
                <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
                    <thead>
                        <tr>
                            <th style="width: 3%;" class="center">#</th>
                            <th style="width: 1%;" class="uniformjs"><input type="checkbox"></th>
                            <th style="width: 7%;" class="center">Ảnh</th>
                            <th>Sản phẩm</th>
                            <th style="width: 7%;" class="center">Kéo thả</th>
                            <th style="width: 27%;" class="center">Thuộc danh mục chọn</th>
                            <th style="width: 7%;" class="center">Thứ tự</th>
                            <th class="center" style="width: 9%;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
								<tr class="selectable">
                                <td class="center">1</td>
					<td class="center uniformjs" style="width: 24px;"><input type="checkbox"></td>
					<td class="center" style="width: 52px;"><span class="img"><img src="<?php echo $template_admin; ?>/html/images/1.jpg"></span></td>
					<td class="important" style="width: 692px;">Lorem Dolor Ipsum</td>
					<td class="center js-sortable-handle" style="width: 64px;"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
                    <td></td>
					<td class="center form-inline small" style="width: 76px;">
						<input type="text" style="width: 40px;" value="1">
					</td>
					<td class="center" style="width: 64px;">
						<a href="#" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
					</td>
				</tr>																			
	      </tbody>
		</table>
                 <div class="separator top form-inline small">
                    <div class="pull-right">
                        Tổng số mẫu tin: 6 / 500
                        <select name="from" style="width: 200px;" class="input-mini">
                            <option value="10">10 Bản ghi / trang</option>
                            <option selected="selected" value="20">20 Bản ghi / trang</option>
                            <option value="30">30 Bản ghi / trang</option>
                            <option value="50">50 Bản ghi / trang</option>
                            <option value="100">100 Bản ghi / trang</option>
                        </select>
                    </div></div>
                    <div class="clearfix"></div>
                    <center>
                    <div class="pagination pagination-small">
                        <ul>
                            <li class="disabled"><a href="#">«</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>  
                    </center>       
                    <div class="clearfix"></div>
                </div>
            </div>
			</div>
			<!-- SEO END -->
		
			<!-- Danh mục tin liên quan -->
			
			<!-- Danh mục tin liên quan END -->
			
		</div>
	</div>
</div>
				
		</div>
				<!-- End Content -->
				
		</div>