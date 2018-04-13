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
                
                    <h4 class="heading glyphicons truck"><i></i>Danh sách phương thức vận chuyển</h4>
                    
                    <div class="heading-buttons">
                        <div class="buttons pull-right">
                            <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a>
                            <a href="" class="btn btn-primary btn-icon glyphicons edit"><i></i> Cập nhật</a>
                            <a href="sitesetting/shipping/add.html" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i>Thêm mới</a>
                            <a href="" class="btn btn-primary btn-icon glyphicons delete"><i></i> Xóa </a>
                    </div>
                    <div class="clearfix"></div>
                    </div>
                    
                </div>
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
		<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
			<thead>
				<tr>
                    <th style="width: 4%;" class="center">#</th>
                   <th style="width: 4%;" class="uniformjs"><div id="uniform-undefined" style="position: relative;left: 3px;"><span><div  id="uniform-undefined"><span><div class="checker" id="uniform-undefined"><span><input type="checkbox" style="opacity: 0;"></span></div></span></div></span></div></th>
                    <th style="width: 22%;">Tên hiển thị</th>
                    <th style="width: 36%;">Phương thức vận chuyển</th>
                    <th style="width: 14%;">Thời gian giao hàng</th>
                    <th class="center" style="width: 12%;">Thứ tự</th>
                    
                    
					<th class="center" style="width: 75px;">Thao tác</th>
				</tr>
			</thead>
			<tbody>
				<tr class="selectable">
					<td class="center" style="width: 28px;">1</td>
                   <td class="center uniformjs"><input type="checkbox" /></td>
					<td class="important">Miễn phí trong phạm vi 5 Km</td>
                    <td>Miễn phí vận chuyển</td>
                    
                    
                    <td class="center">Trong ngày</td>
                    <td class="center"><input type="text" class="span1" value="1" style="top:6px;position:relative;"/></td>
                    <td class="center">
						<a href="../news/product_edit.html?lang=en" class="btn-action glyphicons pencil btn-success"><i></i></a>
                        <a href="#" class="btn-action glyphicons bin btn-danger"><i></i></a>
					</td>
				</tr> 																			
	      </tbody>
		</table> <br>       
	</div>
                
            </div>
        </div>
        <!-- End Content -->        
    </div>
   	<!-- End Wrapper -->
</div>