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
                
                    <h4 class="heading glyphicons list"><i></i>Thêm trang mới</h4>
                    
                    <div class="heading-buttons">
                        <div class="buttons pull-right">
                            <a href="" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i>Thêm mới</a>
                            <a href="" class="btn btn-primary btn-icon glyphicons edit"><i></i> Cập nhật</a>    
                            <a href="" class="btn btn-primary btn-icon glyphicons delete"><i></i> Xóa </a>
                            <a href="content/pages/view.html" class="btn btn-primary btn-icon glyphicons share"><i></i> Quay lại</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
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
                <div class="widget-body">
		 <div class="row-fluid">
					<div class="span3">
						<br>
						<p class="muted">Tên trang &nbsp;</p>
                        
					</div>
					<div class="span9"><br>
						<input type="text" id="inputTitle" class="span4" value="" placeholder="">
						<div class="separator"></div>
					</div>
				</div>       

    <div class="row-fluid">
					<div class="span3">	
					  <p class="muted">Tiêu đề trang</p>
					</div>
					<div class="span9">
						<input type="text" id="inputTitle" class="span4" value="" placeholder="">&nbsp;
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span3">	
					  <p class="muted">Mô tả</p>
					</div>
					<div class="span9">
						<textarea name="message" class="span4" rows="3"></textarea>
                        &nbsp;
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span3">	
						<p class="muted">Là trang con của</p>
					</div>
					<div class="span5">
						<select name="ctl00$cph_Main$ctl00$ctl00$ddl_SubPage" id="cph_Main_ctl00_ctl00_ddl_SubPage">
                            <option selected="selected" value="0">- Chọn -</option>
                            <option value="562200">Trang chủ</option>
                            <option value="562201">Giới thiệu</option>
                            <option value="562202">Sản phẩm</option>
                            <option value="562204">Tin tức</option>
                            <option value="562203">Chi tiết sản phẩm</option>
                            <option value="562205">Bản đồ</option>
                            <option value="562207">Tài khoản</option>
                            <option value="562206">Liên hệ</option>
                        </select>&nbsp;
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span3">	
						<p class="muted">Hiển thị</p>
					</div>
					<div class="span9">
<input type="checkbox" class="checkbox" value="1">
&nbsp;
					  <div class="separator"></div>
				  </div>
				</div>
                <div class="row-fluid">
					<div class="span3">	
						<p class="muted">Layout</p>
					</div>
					<div class="span4">
						<select name="SubPage" id="SubPage" class="span4">
                            
                        </select>&nbsp;
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span3">	
						<p class="muted">Khung nội dung</p>
					</div>
					<div class="span4">
						<select name="SubPage" id="SubPage" class="span4">
                            <option selected="selected" value="default">default</option>
							<option value="home">home</option>
                        </select>&nbsp;
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid" style="border: solid 1px #DDDDDD;">
					<div class="span2">	

					</div>
					<div class="span10">
						<label class="groupcheckbox" style="float: left;position: relative; top: 10px;">Loại Module &nbsp;
                        <select name="ctl00$cph_Main$ctl00$ctl00$ddl_ModuleDef" id="cph_Main_ctl00_ctl00_ddl_ModuleDef">
	<option selected="selected" value="1">Text HTML</option>
	<option value="20">Liên hệ</option>
	<option value="24">Bình chọn (Survey)</option>
	<option value="34">Lượt truy cập</option>
	<option value="50">Sơ đồ website (Sitemap)</option>
	<option value="82">Danh mục sản phẩm</option>
	<option value="94">Trình diễn ảnh</option>
	<option value="99">Thông tin thời tiết</option>
	<option value="100">Hỗ trợ trực tuyến</option>
	<option value="101">Thông tin tỷ giá</option>
	<option value="104">Bản đồ</option>
	<option value="105">Download</option>
	<option value="113">Danh mục tin tức</option>
	<option value="119">Hiển thị sản phẩm tùy chọn</option>
	<option value="120">Sản phẩm bán chạy</option>
	<option value="126">Bộ lọc sản phẩm theo thuộc tính</option>
	<option value="128">Menu dọc</option>
	<option value="129">Hiển thị tin tùy chọn</option>
	<option value="130">Giỏ hàng (Shopping Cart)</option>
	<option value="134">Hiển thị nguồn RSS</option>
	<option value="177">Đăng ký nhận Email</option>

</select>
                            &nbsp; Pane &nbsp;
                            <select name="ctl00$cph_Main$ctl00$ctl00$ddlPane" id="cph_Main_ctl00_ctl00_ddlPane">
	<option value="ContentPaneTop">ContentPaneTop</option>
	<option value="LeftPane">LeftPane</option>
	<option value="ContentPane">ContentPane</option>
	<option value="RightPane">RightPane</option>
	<option value="BottomPane">BottomPane</option>

</select>
                            &nbsp; Vị trí &nbsp;
                            <select name="ctl00$cph_Main$ctl00$ctl00$ddlOrder" id="cph_Main_ctl00_ctl00_ddlOrder">
	<option selected="selected" value="1">Top</option>
	<option value="99">Bottom</option>

</select><label class="groupcheckbox" style="position: relative; top: 10px;">Tên module &nbsp; &nbsp;<input type="text" id="inputTitle" class="span4" value="" placeholder=""><a href="" class="btn btn-default btn-icon glyphicons circle_plus" style=" bottom: 5px;left: 10px;"><i></i>Thêm module</a></label></label>
              			
<br>
                       
						<div class="separator"></div>
					</div>
                    	
                    
				</div>
                <div class="row-fluid">
					<div class="span5" style="padding-top: 13px;">	
						<p class="muted"><input type="checkbox" class="checkbox" value="1">&nbsp;Sửa thông tin các module Hiển Thị Trên Tất Cả Các Trang</p>
					</div>
					<div class="span4">
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
			<thead>
				<tr>
                    <th style="width: 4%;" class="center">#</th>
                    <th></th>
                    <th style="width: 32%;">Tên module</th>
                    <th style="width: 7%;" class="center">Kéo thả</th>
                    <th style="width: 27%;" class="center">Thai đổi</th>
                    <th style="width: 20%;" class="center">Thứ tự</th>
					<th class="center" style="width: 8%;">Thao tác</th>
				</tr>
			</thead>
			<tbody>
				<tr class="selectable">
					<td class="center">1</td>
					<td class="center"></td>
                    <td class="important">Tên module</td>
					<td class="center js-sortable-handle"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
					<td class="center"><select name="ctl00$cph_Main$ctl00$ctl00$ddlPane" id="cph_Main_ctl00_ctl00_ddlPane">
	<option value="ContentPaneTop">ContentPaneTop</option>
	<option value="LeftPane">LeftPane</option>
	<option value="ContentPane">ContentPane</option>
	<option value="RightPane">RightPane</option>
	<option value="BottomPane">BottomPane</option>

</select></td>
					<td class="center"><input type="text" style="width: 50px; margin-bottom:0px" value="1"></td>
					<td class="center">
						<a href="product_edit.html?lang=en" class="btn-action glyphicons pencil btn-success"><i></i></a>
						<a href="#" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
					</td>
                    </tr><tr class="selectable">
					<td class="center">2</td>
					<td class="center"><span class="glyphicons btn-action single picture" style="margin-right: 0;"><i></i></span></td>
                    <td class="important">Danh mục sản phẩm</td>
					<td class="center js-sortable-handle"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
					<td class="center"><select name="ctl00$cph_Main$ctl00$ctl00$ddlPane" id="cph_Main_ctl00_ctl00_ddlPane">
	<option value="ContentPaneTop">ContentPaneTop</option>
	<option value="LeftPane">LeftPane</option>
	<option value="ContentPane">ContentPane</option>
	<option value="RightPane">RightPane</option>
	<option value="BottomPane">BottomPane</option>

</select></td>
					<td class="center"><input type="text" style="width: 50px; margin-bottom:0px" value="1"></td>
					<td class="center">
						<a href="product_edit.html?lang=en" class="btn-action glyphicons pencil btn-success"><i></i></a>
						<a href="#" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
					</td>
				</tr> 
                <tr class="selectable">
					<td class="center">3</td>
					<td class="center"><span class="glyphicons btn-action single picture" style="margin-right: 0;"><i></i></span></td>
                    <td class="important">Thời tiết</td>
					<td class="center js-sortable-handle"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
					<td class="center"><select name="ctl00$cph_Main$ctl00$ctl00$ddlPane" id="cph_Main_ctl00_ctl00_ddlPane">
	<option value="ContentPaneTop">ContentPaneTop</option>
	<option value="LeftPane">LeftPane</option>
	<option value="ContentPane">ContentPane</option>
	<option value="RightPane">RightPane</option>
	<option value="BottomPane">BottomPane</option>

</select></td>
					<td class="center"><input type="text" style="width: 50px; margin-bottom:0px" value="1"></td>
					<td class="center">
						<a href="product_edit.html?lang=en" class="btn-action glyphicons pencil btn-success"><i></i></a>
						<a href="#" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
					</td>
				</tr>
				 																			
	      </tbody>
		</table>
					  <div class="separator"></div>
				  </div>
				</div>
                
            </div>
        </div>
        <!-- End Content -->        
    </div>
   	<!-- End Wrapper -->
</div>
<?php } ?>