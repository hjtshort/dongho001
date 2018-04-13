<?php defined( '_VALID_MOS' ) or die( include("404.php") );
	$vendors_process = new vendors_process();
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
                
                    <h4 class="heading glyphicons briefcase"><i></i>Nhà sản xuất</h4>
                    
                    <div class="heading-buttons">
                        <div class="buttons pull-right">
                            <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a>
                                <a href="product/vendors/add.html" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i>Thêm mới</a>
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
                <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable">
                    <thead>
                        <tr>
                        	<th style="width: 3%;" class="center">#</th>
                             <th style="width: 3%;" class="uniformjs"><input type="checkbox"></th>
                            <th>Nhà sản xuất</th>
                            <th class="center" style="width: 10%;">Số điện thoại</th>
                            <th class="center" style="width: 26%;">Địa chỉ</th>
                            <th class="center" style="width: 18%;">Email</th>
                            <th class="center" style="width: 8%;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                    	 <?php 							
							/* goi ham truy van du lieu dua tren cac gia tri tim kiem */
							$result = $vendors_process->process_get_vendors( ); 								
							if($result->rowCount() > 0){
							while($row = $result->fetch()){ @$i++; 
						?>
                        <tr class="selectable">
                        	<td class="center">1</td>
                            <td class="center uniformjs"><input type="checkbox" /></td>
                            <td class="important"><?= $row["nhasanxuat"]; ?></td>
                            <td class="center"><?= $row["sodienthoai"]; ?></td>
                            <td><?= $row["diachi"]; ?></td>
                            <td><?= $row["email"]; ?></td>
                            <td class="center">
                                <a href="product/vendors/add.html" class="btn-action glyphicons pencil btn-success"><i></i></a>
                                <a href="#" class="btn-action glyphicons bin btn-danger"><i></i></a>
                            </td>
                        </tr> 
                        <?php }
							} else { ?>
                            <tr class="selectable">
                                <td colspan="10" class="center">Không có sản phẩm nào được tìm thấy</td>
                            </tr>
                        <?php } ?>
                     </tbody>
                </table>
                <div class="separator top form-inline small">
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