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
                
                    <h4 class="heading glyphicons list"><i></i>Danh mục tùy chọn</h4>
                    
                    <div class="heading-buttons">
                        <div class="buttons pull-right">
                            <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a>
                            	<a href="" class="btn btn-primary btn-icon glyphicons edit"><i></i> Cập nhật</a>
                                <a href="product/customcategories/add.html" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i>Thêm mới</a>
                                <a href="" class="btn btn-primary btn-icon glyphicons delete"><i></i> Xóa</a>
                            </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>
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
<!-- // Modal END -->	 
                <div class="widget-body">
                <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
                    <thead>
                        <tr>
                        	<th style="width: 3%;" class="center">#</th>
                             <th style="width: 3%;" class="uniformjs"><div class="checker" id="uniform-undefined"><span><input type="checkbox" style="opacity: 0;"></span></div></th>
                            <th>Tên</th>
                            
                            <th style="width: 43%;">Mô tả</th>
                            <th class="center" style="width: 9%;">Trạng thái</th>
                            <th class="center" style="width: 8%;">Thứ tự</th>
                            <th class="center" style="width: 10%;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="selectable">
                        	<td class="center">1</td>
                            <td class="center uniformjs"><div class="checker" id="uniform-undefined"><span><input type="checkbox" style="opacity: 0;"></span></div></td>
                            <td class="important">Samsung Co</td>
                               
                            <td>0988233333</td>
                            <td>Hiển thị</td>
                            <td class="center"><input type="text"  value="1" class="span1" style="width: 50px; margin-bottom:0px"/></td>
                            <td class="center">
                                <a href="product/customcategories/add.html" class="btn-action glyphicons pencil btn-success"><i></i></a>
                                <a href="product_edit.html?lang=en" class="btn-action glyphicons bin btn-danger"><i></i></a>
                            </td>
                        </tr> 
                     </tbody>
                </table>
                <br />
            </div>   
            </div>
        </div>
        <!-- End Content -->        
    </div>
   	<!-- End Wrapper -->
</div>