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
                
                    <h4 class="heading glyphicons check"><i></i>Đánh giá, phản hồi về sản phẩm</h4>
                    
                    <div class="heading-buttons">
                        <div class="buttons pull-right">
                            
                                
                                
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
                             <th style="width: 3%;" class="uniformjs"><input type="checkbox"></th>
                            <th style="width: 21%;"></th>
                            
                            
                            <th>Sản phẩm</th><th class="center" style="width: 10%;">Đánh giá</th>
                            <th class="center" style="width: 12%;">Người gửi</th>
                            <th class="center" style="width: 12%;">Ngày gửi</th>
                            <th class="center" style="width: 9%;">Trạng thái</th>
                            <th class="center" style="width: 9%;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="selectable">
                        	<td class="center">1</td>
                             <td class="center uniformjs"><input type="checkbox"></td>
                             <td class="important">Chương trình Khuyến mãi mừng phiên bản 4.5</td>
                             <td>Điều hòa Fujitsu Model AOY9R 2 chiều 9000BTU</td>  
                           	 <td class="center">
                             	<div class="rating-zero"></div>
                                <div id="star-1" class="rating-on"></div>
                                <div id="star-2" class="rating-on"></div>
                                <div id="star-3" class="rating-on"></div>
                                <div id="star-4" class="rating-on"></div>
                                <div id="star-5" class="rating-on"></div>
                                <div class="rating-zero"></div>
                             </td>
                             <td class="center">No name</td>
                             <td>08:24, 16/06/2014</td>
                             <td>Đã duyệt</td>
                             <td class="center">
                                 <a href="product/productreviews/edit.html" class="btn-action glyphicons pencil btn-success"><i></i></a>
                                 <a href="product_edit.html?lang=en" class="btn-action glyphicons bin btn-danger"><i></i></a>
                                        
                            </td>
                        </tr> 
                     </tbody>
                </table>
                <div class="separator top form-inline small">
                    <div class="pull-left">
                        <div class="checkboxs_actions hide pull-left" style="display: none;">
                            <label class="strong">Danh sách đơn hàng được chọn:</label>
                            <select class="selectpicker dropup" data-style="btn-default btn-small" style="display: none;">
                                <option>Xoá các đơn hàng được chọn</option>
                                <option>Ẩn các đơn hàng được chọn</option>
                                <option>Hiện các đơn hàng được chọn</option>
                            </select>
                        </div>
                    </div>       
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
        </div>
        <!-- End Content -->        
    </div>
   	<!-- End Wrapper -->
</div>
<style type="text/css">
div.rating-zero{ float: left; width: 10px; height: 15px; }
div.rating-on{ float: left; width: 15px; height: 15px; background: url('<?php echo $template_admin; ?>/html/images/rating.png'); background-repeat: no-repeat; background-position: left bottom; }
div.rating-off{ float: left; width: 15px; height: 15px; background: url('<?php echo $template_admin; ?>/html/images/rating.png'); background-repeat: no-repeat; background-position: left top; }
div.rating-hover{ float: left; width: 15px; height: 15px; background: url('<?php echo $template_admin; ?>/html/images/rating.png'); background-repeat: no-repeat; background-position: left center; }
</style>
