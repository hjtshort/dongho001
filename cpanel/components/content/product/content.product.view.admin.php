<?php defined( '_VALID_MOS' ) or die( include("404.php") );
if($_SESSION["wti"]["key"] == "Supper Administrator" || $_SESSION["wti"]["key"] == "Administrator"){ 
	//$myprocess = new process();
?>
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
	<h3 class="glyphicons shopping_cart"><i></i> Danh sách sản phẩm</h3>
	<div class="buttons pull-right">
		<a href="" class="btn btn-default btn-icon glyphicons inbox"><i></i> Manage categories</a>
		<a href="" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i> Thêm mới</a>
	</div>
	<div class="clearfix"></div>
</div>
<div class="separator bottom"></div>
<!-- Modal inline -->
	<div class="modal" style="position: relative; top: auto; left: auto; right: auto; margin: 0 auto; z-index: 1; max-width: 100%; width: 100%;">
		<!-- Modal footer -->
		<div class="modal-footer"> 
			<a href="#modal-simple" data-toggle="modal" class="btn btn-primary">Trợ giúp</a>
            <a href=""	class="btn btn-primary">Thêm mới</a>
            <a href=""	class="btn btn-primary">Cập nhật giá</a>
            <a href=""	class="btn btn-primary">Xóa</a>
		</div>
		<!-- // Modal footer END -->		
	</div>
  
<!-- Modal -->
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
<!-- // Modal END -->	 
	<div class="separator bottom"></div>
	<!-- // Modal inline END -->
<div class="widget widget-2" style="margin: 0;">
    <br>
    <div class="filter-bar filter-bar-2" style="margin-bottom: 0px;">
	<form>
		<div class="lbl glyphicons cogwheel"><i></i>Lọc sản phẩm</div>
		<div>
			<label>Từ:</label>
			<div class="input-append">
				<input type="text" name="from" id="dateRangeFrom" class="input-mini" value="08/05/13" style="width: 53px;" />
				<span class="add-on glyphicons calendar"><i></i></span>
			</div>
		</div>
		<div>
			<label>Đến:</label>
			<div class="input-append">
				<input type="text" name="to" id="dateRangeTo" class="input-mini" value="08/18/13" style="width: 53px;" />
				<span class="add-on glyphicons calendar"><i></i></span>
			</div>
		</div>
		<div>
			<label>Giá từ:</label>
			<div class="input-append">
				<input type="text" name="from" class="input-mini" style="width: 90px;" value="100" />
				<span class="add-on glyphicons euro"><i></i></span>
			</div>
		</div>
		<div>
			<label>Giá đến:</label>
			<div class="input-append">
				<input type="text" name="from" class="input-mini" style="width: 90px;" value="500" />
				<span class="add-on glyphicons euro"><i></i></span>
			</div>
		</div>
        <div>
			<label>Nhập:</label>
			<div class="input-append">
				<input type="text" name="from" class="input-mini" style="width: 200px;" value="Tên sản phẩm" />
			</div>
		</div>
        <div>
			<label>Chọn:</label>
			<div >
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
		<div class="clearfix"></div>
	</form>
</div>
	<div class="widget-body">
		
		<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable">
			<thead>
				<tr>
					<th style="width: 1%;" class="uniformjs"><input type="checkbox" /></th>
                    <th style="width: 10%;" class="center">Ảnh</th>
                    <th style="width: 8%;" class="center">Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th style="width: 5%;" class="center">Kéo thả</th>
                    <th style="width: 8%;" class="center">Giá</th>
                    <th style="width: 8%;" class="center">Giá khuyến mại</th>
                    <th style="width: 5%;" class="center">Trạng thái</th>
					<th style="width: 5%;" class="center">Thứ tự</th>
                    <th style="width: 5%;" class="center">Kho hàng</th>
					<th class="center" style="width: 60px;">Thao tác</th>
				</tr>
			</thead>
			<tbody>
				<tr class="selectable">
					<td class="center uniformjs"><input type="checkbox" /></td>
					<td class="center"><span class="img"><img src="images/1.jpg"></span></td>
					<td class="center form-inline small">
						<input type="text" style="width: 60px;" value="6" />
					</td>
					<td class="important">Lorem Dolor Ipsum</td>
					<td class="center js-sortable-handle"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
					<td class="center form-inline small">
						<input type="text" style="width: 75px;" value="&euro;28" />
					</td>
					<td class="center form-inline small">
						<input type="text" style="width: 75px;" value="0" />
					</td>
					<td class="center form-inline small">
						<select name="from" style="width: 90px;">
                            <option>Đang bán</option>
                            <option>Chỉ hiển thị</option>
                            <option>Hiển thị chữ thay thế</option>
						</select>
					</td>
					<td class="center">1</td>
					<td class="center">123</td>
					<td class="center">
						<a href="product_edit.html?lang=en" class="btn-action glyphicons pencil btn-success"><i></i></a>
						<a href="#" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
					</td>
				</tr>
		<tr class="selectable selected">
					<td class="center uniformjs"><input type="checkbox" /></td>
					<td class="center"><span class="img"><img src="images/2.jpg"></span></td>
					<td class="center form-inline small">
						<input type="text" style="width: 60px;" value="6" />
					</td>
					<td class="important">Lorem Dolor Ipsum</td>
					<td class="center js-sortable-handle"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
					<td class="center form-inline small">
						<input type="text" style="width: 75px;" value="&euro;28" />
					</td>
					<td class="center form-inline small">
						<input type="text" style="width: 75px;" value="0" />
					</td>
					<td class="center form-inline small">
						<select name="from" style="width: 90px;">
                            <option>Đang bán</option>
                            <option>Chỉ hiển thị</option>
                            <option>Hiển thị chữ thay thế</option>
						</select>
					</td>
					<td class="center">2</td>
					<td class="center">123</td>
					<td class="center">
						<a href="product_edit.html?lang=en" class="btn-action glyphicons pencil btn-success"><i></i></a>
						<a href="#" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
					</td>
				</tr>
                <tr class="selectable selected">
					<td class="center uniformjs"><input type="checkbox" /></td>
					<td class="center"><span class="img"><img src="images/3.jpg"></span></td>
					<td class="center form-inline small">
						<input type="text" style="width: 60px;" value="6" />
					</td>
					<td class="important">Lorem Dolor Ipsum</td>
					<td class="center js-sortable-handle"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
					<td class="center form-inline small">
						<input type="text" style="width: 75px;" value="&euro;28" />
					</td>
					<td class="center form-inline small">
						<input type="text" style="width: 75px;" value="0" />
					</td>
					<td class="center form-inline small">
						<select name="from" style="width: 90px;">
                            <option>Đang bán</option>
                            <option>Chỉ hiển thị</option>
                            <option>Hiển thị chữ thay thế</option>
						</select>
					</td>
					<td class="center">3</td>
					<td class="center">123</td>
					<td class="center">
						<a href="product_edit.html?lang=en" class="btn-action glyphicons pencil btn-success"><i></i></a>
						<a href="#" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
					</td>
				</tr>																			
	      </tbody>
		</table>
        <br>
		<div class="separator top form-inline small">
			<div class="pull-left">
			<span class="pull-left" style="padding: 0 5px;">Tổng số sản phẩm: 26</span>
			<div class="checkboxs_actions hide pull-left">
				<label class="strong">| With selected:</label>
				<select class="selectpicker dropup" data-style="btn-default btn-small">
					<option>Action</option>
					<option>Action</option>
					<option>Action</option>
				</select>
			</div>
		</div>
			<div class="pagination pagination-small pull-right" style="margin: 0;">
				<ul>
					<li class="disabled"><a href="#">&laquo;</a></li>
					<li class="active"><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">&raquo;</a></li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<br/>	
<!-- End Content -->
</div>		
<!-- End Wrapper -->
</div>
<?php } ?>