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
                    <h4 class="heading glyphicons list"><i></i>Quản lý trang</h4>
                    <div class="heading-buttons">
                        <div class="buttons pull-right"> <a href="" class="btn btn-primary btn-icon glyphicons edit"><i></i> Cập nhật</a> <a href="content/pages/add.html" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i>Thêm mới</a> <a href="" class="btn btn-primary btn-icon glyphicons delete"><i></i> Xóa </a> </div>
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
                    <div class="modal-footer"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a> </div>
                    <!-- // Modal footer END --> 
                    
                </div>
                <!-- // Modal END -->
                <div class="widget-body">
                    <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
                        <thead>
                            <tr>
                                <th style="width: 4%;" class="center">#</th>
                                <th style="width: 4%;" class="uniformjs"><div id="uniform-undefined" style="position: relative;left: 3px;"><span>
                                        <input type="checkbox" style="opacity: 0;">
                                        </span></div></th>
                                <th>Tên trang</th>
                                <th style="width: 42%;">Mô tả</th>
                                <th style="width: 7%;" class="center">Kéo thả</th>
                                <th style="width: 15%;" class="center">Trạng thái</th>
                                <th class="center" style="width: 75px;">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="selectable">
                                <td class="center" style="width: 28px;">1</td>
                                <td class="center uniformjs"><input type="checkbox" /></td>
                                <td class="important">Tiêu đề</td>
                                <td >Liên kết</td>
                                <td class="center js-sortable-handle"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
                                <td class="center">Hiển thị</td>
                                <td class="center"><a href="product_edit.html?lang=en" class="btn-action glyphicons bin btn-danger"><i></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="separator top form-inline small">
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
