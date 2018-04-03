<?php defined( '_VALID_MOS' ) or die( include("../news/404.php") );
if($_SESSION["wti"]["key"] == "Supper Administrator" || $_SESSION["wti"]["key"] == "Administrator"){ 
	//$myprocess = new process();
?>
<div id="wrapper">	
		<div id="content">
		<ul class="breadcrumb">
	<li><a href="../category/index.html?lang=en" class="glyphicons home"><i></i> AdminPlus</a></li>
	<li class="divider"></li>
	<li>Online Shop</li>
	<li class="divider"></li>
	<li>Products</li>
</ul>
<div class="separator bottom"></div>

<div class="heading-buttons">
	<h3 class="glyphicons picture"><i></i> Danh sách thư mục ảnh trình diển</h3>
	<div class="buttons pull-right">
		<a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a>   
        <a href="content/gallery/add.html" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i>Thêm mới</a>
		<a href="content/gallery/view.html" class="btn btn-primary btn-icon glyphicons unshare"><i></i> Quay lại</a>
	</div>
	<div class="clearfix"></div>
</div>
<div class="separator bottom"></div>

<!-- Modal inline -->

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
<div class="widget widget-2 widget-tabs">
	<div class="widget-head">
		<ul>
			<li class="active"><a href="#quanlyanhTab" data-toggle="tab" class="glyphicons posterous_spaces"><i></i>Quản lý ảnh</a></li>
			<li><a href="#xoathumucTab" data-toggle="tab" class="glyphicons folder_flag"><i></i>Thư mục ảnh</a></li>
            
		</ul>
	</div>
	<div class="widget-body" style="padding: 10px;">
		<div class="tab-content"><br>
			<!-- Thông tin chung -->
			<div class="tab-pane active" id="quanlyanhTab">
            <div class="row-fluid">
					<div class="span3">
						<br>
						<p class="muted">Tiêu đề ảnh &nbsp;</p>
					</div>
					<div class="span9"><br>
						<input type="text" id="inputTitle" class="span6" value="" placeholder="">
<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Tiêu đề ảnh sẽ hiển thị cùng slideshow ảnh, có thể ghi tên hình ảnh sản phẩm hoặc slogan về sản phẩm."></span>
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span3">	
					  <p class="muted">Chọn ảnh</p>
					</div>
					<div class="span9">
						<div class="fileupload fileupload-new" data-provides="fileupload"><input type="hidden" value="" name="">
						  	<div class="input-append">
						    	<div class="uneditable-input span3"><i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"></span></div><span class="btn btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span><input type="file" name=""></span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
						  	</div>
						</div>
						<div class="separator"></div>
					</div>
				</div>
              <div class="row-fluid">
					<div class="span3">	
					  <p class="muted">Liên kết</p>
					</div>
					<div class="span9">
						<input type="text" id="inputTitle" class="span6" value="" placeholder="">&nbsp;<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Copy trang liên kết với hình ảnh tại đây, khi người dùng kích vào hình ảnh sẽ dẫn tới trang liên kết này"></span>
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span3">	
						<p class="muted">Mở liên kết ở</p>
					</div>
					<div class="span5">
						<select class="span5">
								<option>Trang hiện hành</option>
                                <option>Cửa sổ mới</option>
						</select>&nbsp;<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Lựa chọn cửa sổ mới sẽ dẫn người dùng sang liên kết trên tab mới của trình duyệt hoặc mở liên kết trên tab cũ khi lựa chọn trang hiện hành."></span>
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span3">	
						<p class="muted">Hiển thị</p>
					</div>
					<div class="span9"><label class="groupcheckbox">
<input type="checkbox" class="checkbox" value="1" checked="checked">
&nbsp;&nbsp;<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Lựa chọn để có hoặc không hiển thị ảnh ngoài website."></span></label>
					  <div class="separator"></div>
				  </div>
				</div>
                <div class="row-fluid">
					<div class="span3">	
					  <p class="muted">Thứ tự</p>
					</div>
					<div class="span4">
						<input type="text" id="inputTitle" class="span2" value="222" placeholder="">&nbsp;<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Ghi nội dung chú thích cho ảnh tại đây"></span>
						<div class="separator"></div>
					</div>
				</div>
               <div class="row-fluid">
					<div class="span3">	
						<p class="muted">Mô tả</p>
					</div>
					<div class="span9">
						<textarea name="message" class="span6" rows="5"></textarea>
                        &nbsp;<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Viết mô tả ngắn gọn về sản phẩm"></span>
						<div class="separator"></div>
					</div>
				</div>
                
                
			</div>
			<!-- Thông tin chung END -->
			
            <!-- SEO -->
			<div class="tab-pane" id="xoathumucTab">
				<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
			<thead>
				<tr>
                    <th style="width: 4%;" class="center">#</th>
                   <th style="width: 4%;" class="uniformjs"><div id="uniform-undefined" style="position: relative;left: 3px;"><span><input type="checkbox" style="opacity: 0;"></span></div></th>
                    <th style="width: 39%;">Tên Gallery</th>
                    <th style="width: 7%;" class="center">Kéo thả</th>
                    <th style="width: 6%;" class="center">Thứ tự</th>
                    <th>Mô tả</th>
				</tr>
			</thead>
			<tbody>
				<tr class="selectable selected">
					<td class="center" style="width: 28px;">1</td>
                   <td class="center uniformjs"><input type="checkbox" /></td>
					<td class="important" style="width: 275px;">Demo</td>
					<td class="center js-sortable-handle" style="width: 53px;"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
					
					<td class="center">1</td>
					<td>Mô tả</td>
				</tr> 																			
	      </tbody>
		</table>   
	</div>
			<!-- SEO END -->

		</div>
        
	</div>
</div>
				
		</div>
				<!-- End Content -->
				
		</div>
<?php } ?>