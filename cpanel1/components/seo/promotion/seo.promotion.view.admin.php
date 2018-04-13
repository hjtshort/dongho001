<?php defined( '_VALID_MOS' ) or die( include("../news/404.php") ); ?>

<div id="wrapper">
    <div id="content">
        <ul class="breadcrumb">
            <li><a href="../news/index.html?lang=en" class="glyphicons home"><i></i>AdminPlus</a></li>
            <li class="divider"></li>
            <li>Online Shop</li>
            <li class="divider"></li>
            <li>Products</li>
        </ul>
        <div class="separator bottom"></div>
        <div class="innerLR">
            <div class="widget widget-2">
                <div class="widget-head">
                    <h4 class="heading glyphicons gift"><i></i>Thiết lập khuyến mãi</h4>
                    <div class="heading-buttons">
                        <div class="buttons pull-right"> <a href="seo/promotion/add.html" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i> Thêm mới</a> </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!--scrollbar hiddent-->
                
                <div id="hiddenToolBarScroll" class="scrollBox hidden">
                    <div class="widget widget-2">
                        <div class="widget-head">
                            <h4 class="heading glyphicons list"><i></i>Danh mục tin tức</h4>
                            <div class="heading-buttons">
                                <div class="buttons pull-right"> <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a> <a href="" class="btn btn-primary btn-icon glyphicons edit"><i></i> Cập nhật</a> <a href="" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i> Thêm mới</a> </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end croll --> 
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
                    <div class="modal-footer"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a> </div>
                    <!-- // Modal footer END --> 
                    
                </div>
                <div class="widget-body">
                    <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
                        <thead>
                            <tr>
                                <th style="width: 4%;" class="center">#</th>
                                <th>Tên khuyến mãi</th>
                                <th style="width: 7%;" class="center">Kéo thả</th>
                                <th style="width: 10%;">Ngày bắt đầu</th>
                                <th style="width: 11%;" class="center">Ngày kết thúc</th>
                                <th style="width: 20%;" class="center">Số lượng mua được áp dụng</th>
                                <th style="width: 9%;" class="center">Trạng thái</th>
                                <th style="width: 75px;" class="center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="selectable">
                                <td class="center">1</td>
                                <td class="important">Khuyến mãi mới</td>
                                <td class="center js-sortable-handle"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
                                <td>16/06/2014 00:00</td>
                                <td class="center">29/06/2014 00:00</td>
                                <td class="center"></td>
                                <td class="center"><input type="image" name="default" id="default_0" src="<?php echo $template_admin; ?>/html/images/green-ok.gif" style="height:16px;width:16px;"></td>
                                <td class="center"><a href="../news/product_edit.html?lang=en" class="btn-action glyphicons pencil btn-success"><i></i></a> <a href="#" class="btn-action glyphicons bin btn-danger"><i></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="separator top form-inline small">
                        <div class="pull-right"> Tổng số mẫu tin: 6 / 500
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
