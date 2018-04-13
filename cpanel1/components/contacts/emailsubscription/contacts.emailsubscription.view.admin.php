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
                    <h4 class="heading glyphicons envelope"><i></i>Danh sách Email đăng ký</h4>
                    <div class="heading-buttons">
                        <div class="buttons pull-right"> <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a> <a href="" class="btn btn-primary btn-icon glyphicons delete"><i></i> Xóa</a> <a href="" class="btn btn-primary btn-icon glyphicons ok_2"><i></i> Xóa tất cả</a> <a href="" class="btn btn-primary btn-icon glyphicons ok_2"><i></i> Xuất Excel</a> </div>
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
                    <div class="modal-footer"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a> </div>
                    <!-- // Modal footer END --> 
                    
                </div>
                <!-- // Modal END -->
                <div class="widget-body">
                    <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
                        <thead>
                            <tr>
                                <th style="width: 3%;" class="center">#</th>
                                <th style="width: 1%;" class="uniformjs"><input type="checkbox"></th>
                                <th style="width: 28%;">Tên nhóm</th>
                                <th style="width: 7%;" class="center">Giảm giá</th>
                                <th style="width: 1%;" class="center">Drag</th>
                                <th style="width: 23%;">Phương thức</th>
                                <th class="center" style="width: 7%;">Mặc định</th>
                                <th class="center" style="width: 8%;">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="selectable">
                                <td class="center" style="width: 4px;">1</td>
                                <td class="center uniformjs"><input type="checkbox"></td>
                                <td class="important">khách hàng ưu tiên</td>
                                <td class="center">0,00</td>
                                <td class="center js-sortable-handle"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
                                <td class="center"></td>
                                <td class="center"><input type="image" name="default" id="default_0" src="<?php echo $template_admin; ?>/html/images/green-ok.gif" style="height:16px;width:16px;"></td>
                                <td class="center"><a href="contacts/customergroups/edit.html" class="btn-action glyphicons pencil btn-success"><i></i></a> <a href="product_edit.html?lang=en" class="btn-action glyphicons bin btn-danger"><i></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content --> 
</div>
<!-- End Wrapper -->
</div>
